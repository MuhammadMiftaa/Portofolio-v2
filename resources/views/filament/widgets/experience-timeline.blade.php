<x-filament-widgets::widget>
    <x-filament::section heading="Work Experience Timeline" icon="heroicon-o-briefcase">
        <div class="relative pl-6">
            {{-- Vertical line --}}
            <div class="absolute left-2 top-0 bottom-0 w-0.5 bg-primary-500/30"></div>

            @foreach ($this->getExperiences() as $experience)
                <div class="relative mb-8 last:mb-0">
                    {{-- Dot --}}
                    <div class="absolute -left-4 top-1.5 w-3 h-3 rounded-full bg-primary-500 ring-2 ring-primary-500/30"></div>

                    <div class="bg-gray-800/50 rounded-xl p-4 border border-gray-700/50 hover:border-primary-500/50 transition-colors">
                        <div class="flex items-start gap-3">
                            {{-- Company Logo --}}
                            @if ($experience->logo)
                                <img
                                    src="{{ $experience->logo }}"
                                    alt="{{ $experience->company }}"
                                    class="w-10 h-10 rounded-lg object-cover shrink-0 bg-white p-0.5"
                                    onerror="this.style.display='none'"
                                />
                            @endif

                            <div class="flex-1 min-w-0">
                                {{-- Title & Company --}}
                                <p class="font-semibold text-white text-sm leading-tight">{{ $experience->title }}</p>
                                <p class="text-primary-400 text-xs mt-0.5">{{ $experience->company }}</p>

                                {{-- Date & Location --}}
                                <div class="flex items-center gap-3 mt-1.5 text-xs text-gray-400">
                                    <span class="flex items-center gap-1">
                                        <x-heroicon-m-calendar class="w-3 h-3" />
                                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }}
                                        —
                                        {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Present' }}
                                    </span>
                                    @if ($experience->location)
                                        <span class="flex items-center gap-1">
                                            <x-heroicon-m-map-pin class="w-3 h-3" />
                                            {{ $experience->location }}
                                        </span>
                                    @endif
                                </div>

                                {{-- Tech Stack Badges --}}
                                @if ($experience->techStacks->isNotEmpty())
                                    <div class="flex flex-wrap gap-1 mt-2">
                                        @foreach ($experience->techStacks->take(5) as $tech)
                                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-medium bg-primary-500/10 text-primary-300 border border-primary-500/20">
                                                {{ $tech->name }}
                                            </span>
                                        @endforeach
                                        @if ($experience->techStacks->count() > 5)
                                            <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] text-gray-500">
                                                +{{ $experience->techStacks->count() - 5 }} more
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
