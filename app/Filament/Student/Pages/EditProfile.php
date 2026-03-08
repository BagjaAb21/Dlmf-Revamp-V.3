<?php

/**
 * FILE: app/Filament/Student/Pages/EditProfile.php
 *
 * Halaman edit profil siswa.
 * Menggunakan Filament Form dengan 3 section:
 *  1. Data Akun (name, phone)
 *  2. Data Pribadi (alamat, lahir, institusi)
 *  3. Informasi Kelas (jadwal, level, tujuan belajar)
 *
 * Data disimpan ke 2 tabel: users + student_profiles.
 */

namespace App\Filament\Student\Pages;

use App\Data\IndonesiaRegions;
use App\Models\StudentProfile;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class EditProfile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon  = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profil Saya';
    protected static ?string $title           = 'Edit Profil';
    protected static ?int    $navigationSort  = 2;
    protected static string  $view            = 'filament.student.pages.edit-profile';

    // ── State form ────────────────────────────────────────────────────────
    public ?array $data = [];

    public function mount(): void
    {
        $user    = Auth::user();
        // firstOrCreate: jika siswa belum punya profile record, buat dulu
        $profile = $user->studentProfile()->firstOrCreate(
            ['user_id' => $user->id],
            ['country' => 'Indonesia']
        );

        // Gabungkan data user + profile ke dalam form state
        $this->form->fill([
            // Dari tabel users
            'name'  => $user->name,
            'phone' => $user->phone,

            // Dari tabel student_profiles
            'address_detail'   => $profile->address_detail,
            'city'             => $profile->city,
            'province'         => $profile->province,
            'country'          => $profile->country ?? 'Indonesia',
            'birth_date'       => $profile->birth_date?->format('Y-m-d'),
            'institution'      => $profile->institution,
            'class_schedule'   => $profile->class_schedule,
            'level'            => $profile->level,
            'class_start_date' => $profile->class_start_date?->format('Y-m-d'),
            'learning_goal'    => $profile->learning_goal,
        ]);
    }

    // ── Form Schema ───────────────────────────────────────────────────────

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                // ── Section 1: Data Akun ───────────────────────────────────
                Section::make('Data Akun')
                    ->description('Informasi dasar akun kamu.')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Lengkap')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->default(fn () => Auth::user()->email)
                            ->disabled()
                            ->helperText('Email tidak bisa diubah.'),

                        TextInput::make('phone')
                            ->label('Nomor HP')
                            ->tel()
                            ->maxLength(20)
                            ->placeholder('08xxxxxxxxxx'),
                    ])
                    ->columns(2),

                // ── Section 2: Data Pribadi ────────────────────────────────
                Section::make('Data Pribadi')
                    ->description('Informasi domisili dan identitas.')
                    ->icon('heroicon-o-map-pin')
                    ->schema([
                        Textarea::make('address_detail')
                            ->label('Alamat Detail')
                            ->placeholder('Contoh: Jl. Mawar No.12, RT 03/RW 05, Kel. Kebon Jeruk...')
                            ->rows(2)
                            ->columnSpanFull(),

                        // Provinsi — dropdown semua provinsi Indonesia
                        Select::make('province')
                            ->label('Provinsi')
                            ->options(IndonesiaRegions::provinces())
                            ->searchable()
                            ->native(false)
                            ->placeholder('Pilih provinsi...')
                            ->live()         // react → update city options
                            ->afterStateUpdated(fn ($set) => $set('city', null)),

                        // Kota/Kabupaten — dropdown bergantung pada provinsi
                        Select::make('city')
                            ->label('Kota / Kabupaten')
                            ->options(fn (Get $get): array =>
                                IndonesiaRegions::cities($get('province') ?? '')
                            )
                            ->searchable()
                            ->native(false)
                            ->placeholder('Pilih kota / kabupaten...')
                            ->disabled(fn (Get $get) => blank($get('province')))
                            ->helperText('Pilih provinsi terlebih dahulu.'),

                        TextInput::make('country')
                            ->label('Negara')
                            ->maxLength(100)
                            ->default('Indonesia'),

                        DatePicker::make('birth_date')
                            ->label('Tanggal Lahir')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->placeholder('Pilih tanggal lahir')
                            ->closeOnDateSelection()
                            ->maxDate(now()->subYears(5)),

                        TextInput::make('institution')
                            ->label('Asal Institusi / Pekerjaan')
                            ->placeholder('Nama kampus / perusahaan / lainnya')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                // ── Section 3: Informasi Kelas ─────────────────────────────
                Section::make('Informasi Kelas')
                    ->description('Data untuk membantu admin mengatur kelas kamu.')
                    ->icon('heroicon-o-academic-cap')
                    ->schema([
                        Select::make('class_schedule')
                            ->label('Pilihan Jadwal Kelas')
                            ->options(StudentProfile::SCHEDULE_LABELS)
                            ->searchable()
                            ->native(false)
                            ->placeholder('Pilih jadwal kelas')
                            ->helperText('Pilih sesi yang paling nyaman untukmu.'),

                        Select::make('level')
                            ->label('Level Bahasa Jerman')
                            ->options(StudentProfile::LEVEL_LABELS)
                            ->searchable()
                            ->native(false)
                            ->placeholder('Pilih level bahasa Jermanmu')
                            ->helperText('Tidak tahu levelmu? Pilih A1 untuk pemula.'),

                        DatePicker::make('class_start_date')
                            ->label('Rencana Mulai Kelas')
                            ->native(false)
                            ->displayFormat('d M Y')
                            ->placeholder('Pilih tanggal rencana mulai')
                            ->closeOnDateSelection()
                            ->minDate(now()),

                        Textarea::make('learning_goal')
                            ->label('Tujuan Belajar')
                            ->placeholder('Contoh: Ingin bisa berkomunikasi dalam Bahasa Jerman untuk keperluan studi ke Jerman...')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

            ])
            ->statePath('data');
    }

    // ── Actions (tombol) ──────────────────────────────────────────────────

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Perubahan')
                ->action('save')
                ->color('primary'),
        ];
    }

    // ── Save Logic ────────────────────────────────────────────────────────

    public function save(): void
    {
        $data    = $this->form->getState();
        $user    = Auth::user();

        // Update tabel users
        $user->update([
            'name'  => $data['name'],
            'phone' => $data['phone'] ?? null,
        ]);

        // updateOrCreate: aman meski record profile belum ada
        $user->studentProfile()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'address_detail'   => $data['address_detail'] ?? null,
                'city'             => $data['city'] ?? null,
                'province'         => $data['province'] ?? null,
                'country'          => $data['country'] ?? 'Indonesia',
                'birth_date'       => $data['birth_date'] ?? null,
                'institution'      => $data['institution'] ?? null,
                'class_schedule'   => $data['class_schedule'] ?? null,
                'level'            => $data['level'] ?? null,
                'class_start_date' => $data['class_start_date'] ?? null,
                'learning_goal'    => $data['learning_goal'] ?? null,
            ]
        );

        Notification::make()
            ->success()
            ->title('Profil berhasil diperbarui!')
            ->body('Data profil kamu sudah disimpan.')
            ->send();
    }
}
