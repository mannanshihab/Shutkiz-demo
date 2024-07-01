<div>
    <!-- hero section start -->
    <div class="relative" data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isAutoPlay": true }'>
        <div class="hs-carousel relative overflow-hidden w-full lg:min-h-96 md:min-h-64 min-h-32 bg-white rounded-sm">
            <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                @foreach( $carousels as $carousel)
                <div class="hs-carousel-slide">
                    <img src="{{ url('storage', $carousel->image )}}" class="w-full" alt="cover-image">
                </div>
                @endforeach
            </div>
        </div>
        <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-200 hover:bg-gray-300/10 rounded-s-lg dark:text-white dark:hover:bg-white/10">
            <span class="text-2xl" aria-hidden="true">
              <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
              </svg>
            </span>
            <span class="sr-only">Previous</span>
          </button>
          <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-200 hover:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10">
            <span class="sr-only">Next</span>
            <span class="text-2xl" aria-hidden="true">
              <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
              </svg>
            </span>
          </button>
        <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
            @foreach($carousels as $carousel)
                <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
            @endforeach
        </div>
        
    </div>
    <!-- hero section End -->
    
    <!-- shutki Items Start-->
    <section class="py-14 font-poppins bg-white">
        <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
            <div class="max-w-xl mx-auto">
                <div class="text-center ">
                    <div class="relative flex flex-col items-center">
                        <h1 class="text-2xl font-bold dark:text-gray-200"> 
                            কেমিক্যাল মুক্ত অর্গানিক 
                            <span class="text-blue-500"> শুঁটকি </span> 
                        </h1>
                        <div class="flex w-40 mt-4 mb-6 overflow-hidden rounded">
                            <div class="flex-1 h-2 bg-blue-200">
                            </div>
                            <div class="flex-1 h-2 bg-blue-400">
                            </div>
                            <div class="flex-1 h-2 bg-blue-600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
                @foreach($products as $product)
                <div class="max-w-sm rounded overflow-hidden shadow-lg" wire:key="{{ $product -> id }}">
                    <a href="/products/{{ $product->slug }}">
                        <img class="w-full" src="{{ url('storage', $product -> images )}}" alt="{{$product -> name}}">
                    </a>
                    <div class="px-6 py-4 text-center">
                        <div class="font-bold text-sm mb-2">{{$product -> name}}</div>
                        @foreach($product->ProductPrice as $PriceRange)
                            <!-- <div class="w-full text-gray-700 text-base border-4 border-blue-200 m-2">
                                Weight: {{ $PriceRange->weight }} {{ Number::currency( $PriceRange->price, 'BDT') }}
                            </div> -->
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- shutki Items End -->

    <!-- shutki blog Start-->
    <section class="py-14 font-poppins">
        <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
            <div class="max-w-xl mx-auto">
                <div class="text-center ">
                    <div class="relative flex flex-col items-center">
                        <h1 class="text-2xl font-bold dark:text-gray-200"> 
                            আমাদের <span class="text-blue-500"> শুটকির </span>  রেসিপিগুলো 
                        </h1>
                        <div class="flex w-40 mt-4 mb-6 overflow-hidden rounded">
                            <div class="flex-1 h-2 bg-blue-200">
                            </div>
                            <div class="flex-1 h-2 bg-blue-400">
                            </div>
                            <div class="flex-1 h-2 bg-blue-600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                @foreach($blogs as $blog)
                <div class="bg-white border-solid border-4 border-blue-200 rounded-xl shadow-sm sm:flex dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70">
                    <div class="flex-shrink-0 relative w-full rounded-t-xl overflow-hidden pt-[40%] sm:rounded-s-xl sm:max-w-60 md:rounded-se-none md:max-w-xs">
                        <img class="size-full absolute top-0 start-0 object-cover" src="{{ url('storage', $blog -> images )}}" alt="{{$blog -> slug}}">
                    </div>
                    <div class="flex flex-wrap">
                        <div class="p-4 flex flex-col h-full sm:p-7">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                            {{$blog -> name}}
                        </h3>
                        <p class="mt-1 mb-5 text-gray-500 dark:text-neutral-400">
                        {{$limitedDescription = Str::limit($blog -> description, 50)}}
                        </p>
                        <div class="mt-5 sm:mt-auto">
                            <a href="/blogs/{{ $blog->slug }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500 dark:hover:border-blue-600">
                                বিস্তারিত পড়ুন
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- shutki blog End -->

    <!-- shutki video blog Start-->
    <section class="py-14 font-poppins bg-white">
        <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
            <div class="max-w-xl mx-auto">
                <div class="text-center ">
                    <div class="relative flex flex-col items-center">
                        <h1 class="text-2xl font-bold dark:text-gray-200">
                        
                            আমাদের <span class="text-blue-500"> শুটকির রেসিপি</span>   ভিডিও  
                        </h1>
                        <div class="flex w-40 mt-4 mb-6 overflow-hidden rounded">
                            <div class="flex-1 h-2 bg-blue-200">
                            </div>
                            <div class="flex-1 h-2 bg-blue-400">
                            </div>
                            <div class="flex-1 h-2 bg-blue-600">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-4 m-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
                @foreach($recipes as $recipe)
                <div class="aspect-w-16 overflow-hidden aspect-h-9 shadow-lg border-solid border-4 border-blue-200">
                    <iframe src="https://www.youtube.com/embed/{{$recipe->youtubeLink}}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>
                @endforeach  
            </div>
        </div>
    </section>
    <!-- shutki video blog End -->
</div>