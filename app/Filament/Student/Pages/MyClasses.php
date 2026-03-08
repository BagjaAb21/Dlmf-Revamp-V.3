<?php

/**
 * FILE: app/Filament/Student/Pages/MyClasses.php
 *
 * Halaman daftar kelas siswa.
 * EnrollmentTable dirender langsung di blade view, bukan via footer widget,
 * agar tidak tampil ganda (Filament auto-render footer + blade manual render).
 */

namespace App\Filament\Student\Pages;

use App\Filament\Student\Widgets\EnrollmentTable;
use Filament\Pages\Page;

class MyClasses extends Page
{
    protected static ?string $navigationIcon  = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Kelas Saya';
    protected static ?string $title           = 'Kelas Saya';
    protected static ?int    $navigationSort  = 3;
    protected static string  $view            = 'filament.student.pages.my-classes';

    /**
     * Override: kembalikan array kosong supaya Filament TIDAK auto-render
     * footer widget. Widget dirender manual di blade via x-filament-widgets.
     */
    protected function getFooterWidgets(): array
    {
        return [];
    }

    /**
     * Sediakan widget list untuk dipakai di blade template.
     */
    public function getEnrollmentWidgets(): array
    {
        return [EnrollmentTable::class];
    }
}
