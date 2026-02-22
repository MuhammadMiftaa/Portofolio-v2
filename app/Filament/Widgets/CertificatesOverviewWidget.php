<?php

namespace App\Filament\Widgets;

use App\Models\Certificate;
use Filament\Widgets\Widget;

class CertificatesOverviewWidget extends Widget
{
    protected static ?int $sort = 4;

    protected int | string | array $columnSpan = 1;

    protected static string $view = 'filament.widgets.certificates-overview';

    public function getCertificatesByOrganizer(): array
    {
        return Certificate::selectRaw('issuer, COUNT(*) as total')
            ->groupBy('issuer')
            ->orderByDesc('total')
            ->get()
            ->map(fn ($row) => [
                'issuer' => $row->issuer ?? 'Unknown',
                'total'  => $row->total,
            ])
            ->toArray();
    }

    public function getRecentCertificates()
    {
        return Certificate::whereNotNull('issued_at')
            ->orderByDesc('issued_at')
            ->limit(4)
            ->get();
    }
}
