<x-filament-widgets::widget>
    <x-filament::section heading="Certificates Overview" icon="heroicon-o-academic-cap">
        {{-- Breakdown by organizer --}}
        <div class="space-y-2 mb-5">
            <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mb-3">By Organizer</p>
            @foreach ($this->getCertificatesByOrganizer() as $item)
                @php
                    $colors = [
                        'Codepolitan' => 'bg-blue-500',
                        'Ruangguru'   => 'bg-green-500',
                        'Dicoding'    => 'bg-purple-500',
                        'MySkill'     => 'bg-orange-500',
                        'BNSP'        => 'bg-red-500',
                    ];
                    $color = $colors[$item['issuer']] ?? 'bg-gray-500';
                    $total = \App\Models\Certificate::count();
                    $percent = $total > 0 ? round(($item['total'] / $total) * 100) : 0;
                @endphp
                <div>
                    <div class="flex justify-between items-center mb-1">
                        <span class="text-xs text-gray-300">{{ $item['issuer'] }}</span>
                        <span class="text-xs font-semibold text-white">{{ $item['total'] }}</span>
                    </div>
                    <div class="w-full bg-gray-700/50 rounded-full h-1.5">
                        <div
                            class="{{ $color }} h-1.5 rounded-full transition-all duration-500"
                            style="width: {{ $percent }}%"
                        ></div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Divider --}}
        <div class="border-t border-gray-700/50 my-4"></div>

        {{-- Recent Certificates --}}
        <p class="text-xs font-medium text-gray-400 uppercase tracking-wider mb-3">Recent</p>
        <div class="space-y-2.5">
            @foreach ($this->getRecentCertificates() as $cert)
                <div class="flex items-center gap-3">
                    @if ($cert->image)
                        <img
                            src="{{ $cert->image }}"
                            alt="{{ $cert->title }}"
                            class="w-10 h-10 rounded-lg object-cover shrink-0 border border-gray-700"
                        />
                    @else
                        <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center shrink-0">
                            <x-heroicon-o-academic-cap class="w-5 h-5 text-gray-500" />
                        </div>
                    @endif
                    <div class="min-w-0">
                        <p class="text-xs font-medium text-white truncate">{{ $cert->program }}</p>
                        <p class="text-[11px] text-gray-400">
                            {{ $cert->issuer }}
                            @if ($cert->issued_at)
                                · {{ \Carbon\Carbon::parse($cert->issued_at)->format('M Y') }}
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
