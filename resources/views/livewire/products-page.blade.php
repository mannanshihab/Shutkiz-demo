<div>
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
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
        <section class="py-10 bg-gray-50 font-poppins dark:bg-gray-800 rounded-lg">
            <!-- Header -->
            <div class="px-6 py-4 flex justify-between border-b border-gray-200 dark:border-neutral-700">
              <!-- Select -->
              <div class="sm:col-span-1">
                <select wire:model.live="sort" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800" aria-label="Sort-by-price">
                    <option value="latest" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">Sort by latest</option>
                    <option value="price" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">Sort by Price</option>
                </select>
              </div>
              <!-- End Select -->
                
              <!-- Filter -->
              <div class="sm:col-span-1">
                <div class="flex justify-end gap-x-2">
                    <div class="hs-dropdown [--placement:bottom-right] relative inline-block" data-hs-dropdown-auto-close="inside">
                        <button id="hs-as-table-table-filter-dropdown" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800">
                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                        Filter
                        <span class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                            
                        </span>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" aria-labelledby="hs-as-table-table-filter-dropdown">
                        <div class="divide-y divide-gray-200 dark:divide-neutral-700 max-h-100 overflow-y-scroll">
                            <div class="p-4 m-3 shadow-md bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                                <h2 class="text-2xl font-bold dark:text-gray-400">Product Status</h2>
                                <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                                <ul>
                                <li class="mb-4">
                                    <label for="Featured" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="featured" value="1" wire:model.live="featured_product" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Featured Product</span>
                                    </label>
                                </li>
                                <li class="mb-4">
                                    <label for="On Sale" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="on_sale" value="1" wire:model.live="on_sale" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">On Sale</span>
                                    </label>
                                </li>
                                </ul>
                            </div>
                            <div class="p-4 m-3 shadow-md bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                                <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
                                <div class="font-semibold">{{Number::currency($price_range, 'BDT')}} </div>
                                <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                                <div>
                                    <input type="range" wire:model.live="price_range" class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer" max="500000" value="300000" step="1000">
                                    <div class="flex justify-between ">
                                        <span class="inline-block text-lg font-bold text-blue-400 ">{{ Number::currency(1000, 'BDT') }}</span>
                                        <span class="inline-block text-lg font-bold text-blue-400 ">{{ Number::currency(500000, 'BDT') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Filter -->
            </div>
            <!-- End Header -->

            <!-- Product Feature Part -->
            <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
                <div class="flex flex-wrap mb-24 -mx-3">
                    <div class="w-full pr-2 lg:w-1/4 lg:block">
                        <div class="divide-y divide-gray-200 dark:divide-neutral-700 hidden md:block">
                            <!--Start Product Status  -->
                            <div class="p-4 m-3 shadow-md bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                                <h2 class="text-2xl font-bold dark:text-gray-400">Product Status</h2>
                                <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                                <ul>
                                <li class="mb-4">
                                    <label for="Featured" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="featured" value="1" wire:model.live="featured_product" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">Featured Product</span>
                                    </label>
                                </li>
                                <li class="mb-4">
                                    <label for="On Sale" class="flex items-center dark:text-gray-300">
                                    <input type="checkbox" id="on_sale" value="1" wire:model.live="on_sale" class="w-4 h-4 mr-2">
                                    <span class="text-lg dark:text-gray-400">On Sale</span>
                                    </label>
                                </li>
                                </ul>
                            </div>
                            <!--End Product Status  -->

                            <!--Start Price Range  -->
                            <div class="p-4 m-3 shadow-md bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
                                <h2 class="text-2xl font-bold dark:text-gray-400">Price</h2>
                                <div class="font-semibold">{{Number::currency($price_range, 'BDT')}} </div>
                                <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
                                <div>
                                    <input type="range" wire:model.live="price_range" class="w-full h-1 mb-4 bg-blue-100 rounded appearance-none cursor-pointer" max="500000" value="300000" step="1000">
                                    <div class="flex justify-between ">
                                        <span class="inline-block text-lg font-bold text-blue-400 ">{{ Number::currency(300, 'BDT') }}</span>
                                        <span class="inline-block text-lg font-bold text-blue-400 ">{{ Number::currency(2000, 'BDT') }}</span>
                                    </div>
                                </div>
                            </div>
                            <!--End Price Range  -->
                        </div>
                    </div>
                    <div class="w-full px-3 mt-3 lg:w-3/4">
                        <div class="flex flex-wrap items-center">
                            @foreach( $products as $product)
                                <!--Start product card -->
                                <div class="w-full px-3 mb-6 sm:w-1/2 md:w-1/3" wire:key="{{ $product -> id }}">
                                    <div class="border border-gray-300 dark:border-gray-700">
                                        <div class="relative bg-gray-200">
                                            <a href="/products/{{ $product->slug }}">
                                                <img src="{{ url('storage', $product -> images[0] )}}" alt="{{ $product -> name}}" class="object-cover w-full h-56 mx-auto ">
                                            </a>
                                        </div>
                                        <div class="p-3 ">
                                            <div class="flex items-center justify-between gap-2 mb-2">
                                                <h3 class="text-md font-medium dark:text-gray-400">
                                                    {{ $product -> name}}
                                                </h3>
                                            </div>
                                        </div>
                                       {{--  @foreach($product->ProductPrice as $PriceRange)
                                            <div class="p-4 border-t border-gray-300 dark:border-gray-700">
                                                <a href="#" alt="{{ $PriceRange->price }}" class="flex justify-between">
                                                    <span> Weight: {{ $PriceRange->weight }}</span> 
                                                    <span>{{ Number::currency( $PriceRange->price, 'BDT') }}</span>
                                                </a>
                                            </div>
                                        @endforeach --}}
                                        <div class="flex justify-center p-4 border-t border-gray-300 dark:border-gray-700">
                                            <a lazy wire:click.prevent="addToCart({{ $product->id }})" href="#" class="text-gray-500 flex items-center space-x-2 dark:text-gray-400 hover:text-blue-500 dark:hover:text-blue-200">
                                                <svg wire:loading.remove wire:target='addToCart({{ $product->id }})' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 bi bi-cart3 " viewBox="0 0 16 16">
                                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
                                                </svg>
                                                <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to Cart</span>
                                                <span wire:loading wire:target='addToCart({{ $product->id }})'>
                                                    <div class="animate-spin inline-block size-6 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--End product card -->
                            @endforeach 
                        </div>
                        <!-- pagination start -->
                        <div class="mt-6">
                            {{ $products->links() }}
                        </div>
                        <!-- pagination end -->
                    </div>
                </div>
            </div>
            <!--End Product Feature Part -->
        </section>
    </div>
</div>
