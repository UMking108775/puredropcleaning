<!-- Services Grid for Home Page -->
<section class="py-12 sm:py-16 lg:py-20 bg-light">
    <div class="max-w-7xl mx-auto px-0 sm:px-6 lg:px-8">
        <div class="text-center mb-6 sm:mb-10 px-4 sm:px-0">
            <span class="inline-block px-3 py-1.5 bg-primary/10 text-primary rounded-full text-xs sm:text-sm font-semibold mb-3">Our Services</span>
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-dark">Professional <span class="text-primary">Cleaning Solutions</span></h2>
        </div>
        
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-[1px] sm:gap-4 lg:gap-6 bg-gray-200 sm:bg-transparent">
            @foreach($services as $service)
            <div class="bg-white sm:rounded-xl overflow-hidden group sm:border sm:border-gray-100 sm:shadow-sm hover:shadow-lg transition-shadow">
                <!-- Image -->
                <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}" class="block w-full aspect-[4/3] overflow-hidden bg-light">
                    <img src="{{ $service->image_url }}"
                         alt="{{ $service->title }}"
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                </a>
                <!-- Content -->
                <div class="p-3 sm:p-4 lg:p-5">
                    <h3 class="text-sm sm:text-base lg:text-lg font-semibold text-dark mb-1 sm:mb-2 leading-tight line-clamp-1">{{ $service->title }}</h3>
                    <p class="text-gray text-xs sm:text-sm mb-2 sm:mb-3 line-clamp-2">{{ $service->description }}</p>
                    <a href="{{ route('service.show', ['slug' => $service->slug ?? Str::slug($service->title)]) }}" class="text-primary font-medium text-xs sm:text-sm flex items-center group-hover:text-accent transition-colors">
                        More Details
                        <svg class="w-3 h-3 sm:w-4 sm:h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
