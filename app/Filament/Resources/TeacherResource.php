<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Guru';

    protected static ?string $modelLabel = 'Guru';

    protected static ?string $pluralModelLabel = 'Guru';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\FileUpload::make('photo')
                            ->label('Foto')
                            ->image()
                            ->disk('public')
                            ->directory('teachers')
                            ->visibility('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                            ]),

                        Forms\Components\Select::make('level')
                            ->label('Level Bahasa')
                            ->options([
                                'A1' => 'A1 - Beginner',
                                'A2' => 'A2 - Elementary',
                                'B1' => 'B1 - Intermediate',
                                'B2' => 'B2 - Upper Intermediate',
                                'C1' => 'C1 - Advanced',
                                'C2' => 'C2 - Proficient',
                            ])
                            ->required(),

                        Forms\Components\TextInput::make('education')
                            ->label('Lulusan')
                            ->placeholder('Contoh: Sastra Jerman Universitas Indonesia')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('experience')
                            ->label('Pengalaman Mengajar')
                            ->placeholder('Contoh: 1.5 tahun')
                            ->required()
                            ->maxLength(50),

                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->required(),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('level')
                    ->label('Level')
                    ->colors([
                        'success' => ['A1', 'A2'],
                        'warning' => ['B1', 'B2'],
                        'danger' => ['C1', 'C2'],
                    ]),

                Tables\Columns\TextColumn::make('education')
                    ->label('Lulusan')
                    ->limit(30),

                Tables\Columns\TextColumn::make('experience')
                    ->label('Pengalaman'),

                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('level')
                    ->options([
                        'A1' => 'A1',
                        'A2' => 'A2',
                        'B1' => 'B1',
                        'B2' => 'B2',
                        'C1' => 'C1',
                        'C2' => 'C2',
                    ]),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order')
            ->defaultSort('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        $user = Auth::user();
        return $user && $user->isAdmin(); // Only allow admins to view the list of teachers
    }

    public static function canCreate(): bool
    {
        $user = Auth::user();
        return $user && $user->isAdmin(); // Only allow admins to create new teachers
    }
}
