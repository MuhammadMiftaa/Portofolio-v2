<x-filament-widgets::widget>
    <x-filament::section heading="Tech Stack" icon="heroicon-o-cpu-chip">
        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 lg:grid-cols-10 xl:grid-cols-13 gap-3">
            @foreach ($this->getTeches() as $tech)
                <div
                    class="group flex flex-col items-center gap-1.5 p-2 rounded-xl bg-gray-800/40 border border-gray-700/30 hover:border-primary-500/50 hover:bg-primary-500/5 transition-all duration-200 cursor-default"
                    title="{{ $tech->name }}"
                >
                    @if ($tech->icon)
                        <img
                            src="{{ $tech->icon }}"
                            alt="{{ $tech->name }}"
                            class="w-8 h-8 object-contain group-hover:scale-110 transition-transform duration-200"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'"
                        />
                        <div class="w-8 h-8 hidden items-center justify-center">
                            <x-heroicon-o-cpu-chip class="w-6 h-6 text-gray-500" />
                        </div>
                    @else
                        <div class="w-8 h-8 flex items-center justify-center">
                            <x-heroicon-o-cpu-chip class="w-6 h-6 text-gray-500" />
                        </div>
                    @endif
                    <span class="text-[10px] text-gray-400 group-hover:text-primary-300 text-center leading-tight transition-colors truncate w-full text-center">
                        {{ $tech->name }}
                    </span>
                </div>
            @endforeach

            {{-- Add new --}}
            <a
                href="{{ route('filament.superadmin.resources.teches.create') }}"
                class="flex flex-col items-center gap-1.5 p-2 rounded-xl border border-dashed border-gray-600/50 hover:border-primary-500/50 hover:bg-primary-500/5 transition-all duration-200"
                title="Add new tech"
            >
                <div class="w-8 h-8 flex items-center justify-center">
                    <x-heroicon-o-plus class="w-5 h-5 text-gray-600 hover:text-primary-400 transition-colors" />
                </div>
                <span class="text-[10px] text-gray-600 text-center">Add</span>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
