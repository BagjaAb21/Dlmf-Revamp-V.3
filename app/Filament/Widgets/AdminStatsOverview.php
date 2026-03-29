<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $totalUsers    = User::where('role', 'siswa')->count();
        $newUsersToday = User::where('role', 'siswa')
            ->whereDate('created_at', today())
            ->count();

        $totalPayments   = Payment::count();
        $paidPayments    = Payment::where('status', 'paid')->count();
        $pendingPayments = Payment::where('status', 'pending')->count();

        $totalProducts  = Product::where('is_active', true)->count();
        $totalRevenue   = Payment::where('status', 'paid')->sum('amount');

        return [
            Stat::make('Total Siswa Terdaftar', number_format($totalUsers))
                ->description($newUsersToday > 0 ? "+{$newUsersToday} hari ini" : 'Belum ada pendaftar baru hari ini')
                ->descriptionIcon($newUsersToday > 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-minus')
                ->color($newUsersToday > 0 ? 'success' : 'gray')
                ->icon('heroicon-o-users'),

            Stat::make('Total Transaksi', number_format($totalPayments))
                ->description("{$paidPayments} lunas · {$pendingPayments} pending")
                ->descriptionIcon('heroicon-m-credit-card')
                ->color('info')
                ->icon('heroicon-o-shopping-cart'),

            Stat::make('Total Produk Aktif', number_format($totalProducts))
                ->description('Produk yang tersedia di katalog')
                ->descriptionIcon('heroicon-m-book-open')
                ->color('warning')
                ->icon('heroicon-o-academic-cap'),

            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Dari transaksi lunas')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success')
                ->icon('heroicon-o-currency-dollar'),
        ];
    }
}
