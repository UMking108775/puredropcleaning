@extends('layouts.admin')

@section('title', 'Edit Why Choose Us Section')
@section('page-title', 'Why Choose Us Section')

@section('content')
<div class="max-w-4xl">
    <div class="mb-4">
        <p class="text-gray text-sm">Edit the "Why Choose Us" section content that appears on the homepage.</p>
    </div>

    @if(session('success'))
    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('admin.sections.why-choose-us.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Style Picker -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                </svg>
                Section Style
            </h3>
            <p class="text-xs text-gray mb-4">Choose a layout style for the Why Choose Us section on your homepage</p>
            
            <div class="grid sm:grid-cols-3 gap-4">
                <!-- Style 1 -->
                <label class="style-option cursor-pointer group" data-style="style1">
                    <input type="radio" name="wcu_style" value="style1" class="sr-only" {{ ($data['wcu_style'] ?? 'style1') === 'style1' ? 'checked' : '' }}>
                    <div class="border-2 rounded-xl p-3 transition-all duration-200 {{ ($data['wcu_style'] ?? 'style1') === 'style1' ? 'border-primary bg-primary/5 ring-2 ring-primary/20' : 'border-gray-200 hover:border-primary/40' }}">
                        <!-- Mini Preview -->
                        <div class="bg-white rounded-lg p-3 mb-3 border border-gray-100 aspect-[4/3] flex items-center">
                            <div class="w-full grid grid-cols-2 gap-2">
                                <div class="space-y-1.5">
                                    <div class="h-1.5 w-10 bg-accent/30 rounded-full"></div>
                                    <div class="h-2 w-full bg-gray-200 rounded"></div>
                                    <div class="h-1 w-3/4 bg-gray-100 rounded"></div>
                                    <div class="space-y-1 mt-2">
                                        <div class="flex items-center gap-1"><div class="w-3 h-3 bg-primary/20 rounded"></div><div class="h-1.5 w-full bg-gray-100 rounded"></div></div>
                                        <div class="flex items-center gap-1"><div class="w-3 h-3 bg-primary/20 rounded"></div><div class="h-1.5 w-full bg-gray-100 rounded"></div></div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-1">
                                    <div class="bg-primary/20 rounded p-1"><div class="text-[6px] font-bold text-primary">10+</div></div>
                                    <div class="bg-accent/20 rounded p-1"><div class="text-[6px] font-bold text-accent">5K</div></div>
                                    <div class="bg-sky/20 rounded p-1"><div class="text-[6px] font-bold text-sky">15+</div></div>
                                    <div class="bg-gray-100 rounded p-1"><div class="text-[6px] font-bold text-gray">98%</div></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="font-semibold text-sm text-dark">Classic</div>
                            <div class="text-xs text-gray">Side-by-side layout</div>
                        </div>
                    </div>
                </label>

                <!-- Style 2 -->
                <label class="style-option cursor-pointer group" data-style="style2">
                    <input type="radio" name="wcu_style" value="style2" class="sr-only" {{ ($data['wcu_style'] ?? 'style1') === 'style2' ? 'checked' : '' }}>
                    <div class="border-2 rounded-xl p-3 transition-all duration-200 {{ ($data['wcu_style'] ?? 'style1') === 'style2' ? 'border-primary bg-primary/5 ring-2 ring-primary/20' : 'border-gray-200 hover:border-primary/40' }}">
                        <div class="bg-white rounded-lg p-3 mb-3 border border-gray-100 aspect-[4/3] flex flex-col items-center justify-center">
                            <div class="text-center mb-2">
                                <div class="h-1.5 w-8 bg-primary/20 rounded-full mx-auto mb-1"></div>
                                <div class="h-2 w-20 bg-gray-200 rounded mx-auto"></div>
                            </div>
                            <div class="grid grid-cols-4 gap-1 w-full mb-2">
                                <div class="bg-gray-50 rounded p-1 text-center"><div class="w-3 h-3 bg-primary/20 rounded mx-auto mb-0.5"></div><div class="h-1 bg-gray-200 rounded"></div></div>
                                <div class="bg-gray-50 rounded p-1 text-center"><div class="w-3 h-3 bg-primary/20 rounded mx-auto mb-0.5"></div><div class="h-1 bg-gray-200 rounded"></div></div>
                                <div class="bg-gray-50 rounded p-1 text-center"><div class="w-3 h-3 bg-primary/20 rounded mx-auto mb-0.5"></div><div class="h-1 bg-gray-200 rounded"></div></div>
                                <div class="bg-gray-50 rounded p-1 text-center"><div class="w-3 h-3 bg-primary/20 rounded mx-auto mb-0.5"></div><div class="h-1 bg-gray-200 rounded"></div></div>
                            </div>
                            <div class="w-full bg-primary/15 rounded p-1.5">
                                <div class="grid grid-cols-4 gap-1 text-center">
                                    <div class="text-[5px] font-bold text-primary">10+</div>
                                    <div class="text-[5px] font-bold text-primary">5K</div>
                                    <div class="text-[5px] font-bold text-primary">15+</div>
                                    <div class="text-[5px] font-bold text-primary">98%</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="font-semibold text-sm text-dark">Cards Grid</div>
                            <div class="text-xs text-gray">Centered with stat bar</div>
                        </div>
                    </div>
                </label>

                <!-- Style 3 -->
                <label class="style-option cursor-pointer group" data-style="style3">
                    <input type="radio" name="wcu_style" value="style3" class="sr-only" {{ ($data['wcu_style'] ?? 'style1') === 'style3' ? 'checked' : '' }}>
                    <div class="border-2 rounded-xl p-3 transition-all duration-200 {{ ($data['wcu_style'] ?? 'style1') === 'style3' ? 'border-primary bg-primary/5 ring-2 ring-primary/20' : 'border-gray-200 hover:border-primary/40' }}">
                        <div class="bg-gray-800 rounded-lg p-3 mb-3 border border-gray-700 aspect-[4/3] flex flex-col items-center justify-center">
                            <div class="text-center mb-2">
                                <div class="h-1.5 w-8 bg-accent/30 rounded-full mx-auto mb-1"></div>
                                <div class="h-2 w-20 bg-gray-600 rounded mx-auto"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-1 w-full">
                                <div class="space-y-1">
                                    <div class="bg-white/5 border border-white/10 rounded p-1"><div class="h-1 bg-gray-600 rounded"></div></div>
                                    <div class="bg-white/5 border border-white/10 rounded p-1"><div class="h-1 bg-gray-600 rounded"></div></div>
                                </div>
                                <div class="grid grid-cols-2 gap-1">
                                    <div class="bg-primary/30 rounded p-1"><div class="text-[5px] font-bold text-white">10+</div></div>
                                    <div class="bg-accent/30 rounded p-1"><div class="text-[5px] font-bold text-white">5K</div></div>
                                    <div class="bg-white/5 border border-white/10 rounded p-1"><div class="text-[5px] font-bold text-accent">15+</div></div>
                                    <div class="bg-white/5 border border-white/10 rounded p-1"><div class="text-[5px] font-bold text-primary">98%</div></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="font-semibold text-sm text-dark">Dark Modern</div>
                            <div class="text-xs text-gray">Glassmorphism effect</div>
                        </div>
                    </div>
                </label>
            </div>
        </div>

        <!-- Section Header -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                Section Header
            </h3>
            <div class="space-y-4">
                <div>
                    <label for="wcu_badge" class="block text-sm font-medium text-dark mb-1">Badge Text</label>
                    <input type="text" id="wcu_badge" name="wcu_badge" 
                        value="{{ $data['wcu_badge'] }}"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                </div>
                <div>
                    <label for="wcu_heading" class="block text-sm font-medium text-dark mb-1">Heading <span class="text-xs text-gray">(HTML allowed for styling)</span></label>
                    <input type="text" id="wcu_heading" name="wcu_heading" 
                        value="{{ $data['wcu_heading'] }}"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                    <p class="mt-1 text-xs text-gray">Use &lt;span class="text-primary"&gt;text&lt;/span&gt; to highlight words</p>
                </div>
                <div>
                    <label for="wcu_subtitle" class="block text-sm font-medium text-dark mb-1">Subtitle</label>
                    <textarea id="wcu_subtitle" name="wcu_subtitle" rows="2"
                        class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm resize-none">{{ $data['wcu_subtitle'] }}</textarea>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Features (4 Items)
            </h3>
            <div class="space-y-6">
                @for($i = 1; $i <= 4; $i++)
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs font-semibold text-primary mb-3 uppercase tracking-wider">Feature {{ $i }}</div>
                    <div class="grid sm:grid-cols-2 gap-3">
                        <div>
                            <label for="wcu_feature{{ $i }}_title" class="block text-sm font-medium text-dark mb-1">Title</label>
                            <input type="text" id="wcu_feature{{ $i }}_title" name="wcu_feature{{ $i }}_title" 
                                value="{{ $data['wcu_feature'.$i.'_title'] }}"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                        </div>
                        <div>
                            <label for="wcu_feature{{ $i }}_desc" class="block text-sm font-medium text-dark mb-1">Description</label>
                            <input type="text" id="wcu_feature{{ $i }}_desc" name="wcu_feature{{ $i }}_desc" 
                                value="{{ $data['wcu_feature'.$i.'_desc'] }}"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Stats -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-sky" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Statistics (4 Boxes)
            </h3>
            <div class="grid sm:grid-cols-2 gap-4">
                @for($i = 1; $i <= 4; $i++)
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="text-xs font-semibold text-primary mb-3 uppercase tracking-wider">Stat {{ $i }}</div>
                    <div class="space-y-2">
                        <div>
                            <label for="wcu_stat{{ $i }}_value" class="block text-xs font-medium text-dark mb-1">Value</label>
                            <input type="text" id="wcu_stat{{ $i }}_value" name="wcu_stat{{ $i }}_value" 
                                value="{{ $data['wcu_stat'.$i.'_value'] }}"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                                placeholder="e.g., 10+">
                        </div>
                        <div>
                            <label for="wcu_stat{{ $i }}_label" class="block text-xs font-medium text-dark mb-1">Label</label>
                            <input type="text" id="wcu_stat{{ $i }}_label" name="wcu_stat{{ $i }}_label" 
                                value="{{ $data['wcu_stat'.$i.'_label'] }}"
                                class="w-full px-3 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary text-sm"
                                placeholder="e.g., Years Experience">
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Save -->
        <div class="flex justify-end">
            <button type="submit" class="btn btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.style-option').forEach(function(option) {
        option.addEventListener('click', function() {
            // Reset all
            document.querySelectorAll('.style-option > div').forEach(function(div) {
                div.className = 'border-2 rounded-xl p-3 transition-all duration-200 border-gray-200 hover:border-primary/40';
            });
            // Activate selected
            var selectedDiv = this.querySelector('div');
            selectedDiv.className = 'border-2 rounded-xl p-3 transition-all duration-200 border-primary bg-primary/5 ring-2 ring-primary/20';
        });
    });
</script>
@endpush
