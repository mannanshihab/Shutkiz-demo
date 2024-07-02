<div>
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
                            <a wire:navigate href="/blogs/{{ $blog->slug }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500 dark:hover:border-blue-600">
                                বিস্তারিত পড়ুন
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- pagination start -->
            <div class="mt-6">
                {{ $blogs ->links() }}
            </div>
            <!-- pagination end -->
        </div>
    </section>
    <!-- shutki blog End -->
</div>
