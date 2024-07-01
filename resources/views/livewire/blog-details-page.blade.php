<div>
    <!-- Blog Article -->
    <div class="max-w-[80rem] px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="grid lg:grid-cols-3 gap-y-8 lg:gap-y-0 lg:gap-x-6">
            <!-- Content -->
            <div class="lg:col-span-2">
                <div class="py-8 lg:pe-8">
                    <div class="space-y-5 lg:space-y-8">
                    <a class="inline-flex items-center gap-x-1.5 text-sm text-gray-600 decoration-2 hover:underline dark:text-blue-500" href="/blogs">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                        Back to Blog
                    </a>

                    <h2 class="text-3xl font-bold lg:text-5xl dark:text-white">{{$blog -> name}}</h2>
                    <figure>
                        <img class="w-full object-cover rounded-xl" src="{{ url('storage', $blog -> images )}}" alt="{{$blog -> slug}}">
                        <figcaption class="mt-3 text-sm text-center text-gray-500 dark:text-neutral-500">
                            {{$blog -> slug}}
                        </figcaption>
                    </figure>

                    <div class="space-y-3">
                    {!! Str::markdown( $blog -> description )!!}
                    </div>

                    <div class="grid lg:flex lg:justify-between lg:items-center gap-y-5 lg:gap-y-0">
                        <!-- Badges/Tags -->
                        <div>
                            <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200" href="#">
                                Plan
                            </a>
                            <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200" href="#">
                                Web development
                            </a>
                            <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200" href="#">
                                Free
                            </a>
                            <a class="m-0.5 inline-flex items-center gap-1.5 py-2 px-3 rounded-full text-sm bg-gray-100 text-gray-800 hover:bg-gray-200 dark:bg-neutral-800 dark:hover:bg-neutral-700 dark:text-neutral-200" href="#">
                                Team
                            </a>
                        </div>
                        <!-- End Badges/Tags -->
                    </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

            <!-- Sidebar -->
            <div class="lg:col-span-1 lg:w-full lg:h-full lg:bg-gradient-to-r lg:from-gray-50 lg:via-transparent lg:to-transparent dark:from-neutral-800">
                <div class="sticky top-0 start-0 py-8 lg:ps-8">
                    <!-- Avatar Media -->
                    <div class="group flex items-center gap-x-3 border-b border-gray-200 pb-8 mb-8 dark:border-neutral-700">
                        <a class="block flex-shrink-0" href="#">
                            <img class="size-10 rounded-full" src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
                        </a>

                        <a class="group grow block" href="">
                            <h5 class="group-hover:text-gray-600 text-sm font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                            Leyla Ludic
                            </h5>
                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                            UI/UX enthusiast
                            </p>
                        </a>

                        <div class="grow">
                            <div class="flex justify-end">
                            <button type="button" class="py-1.5 px-2.5 inline-flex items-center gap-x-2 text-xs font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" x2="19" y1="8" y2="14"/><line x1="22" x2="16" y1="11" y2="11"/></svg>
                                Follow
                            </button>
                            </div>
                        </div>
                    </div>
                    <!-- End Avatar Media -->

                    <div class="space-y-6">
                        <!--Latest Blog -->
                        <a class="group flex items-center gap-x-6" href="#">
                            <div class="grow">
                                <span class="text-sm font-bold text-gray-800 group-hover:text-blue-600 dark:text-neutral-200 dark:group-hover:text-blue-500">
                                    5 Reasons to Not start a UX Designer Career in 2022/2023
                                </span>
                            </div>

                            <div class="flex-shrink-0 relative rounded-lg overflow-hidden size-20">
                                <img class="size-full absolute top-0 start-0 object-cover rounded-lg" src="https://images.unsplash.com/photo-1567016526105-22da7c13161a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1480&q=80" alt="Image Description">
                            </div>
                        </a>
                        <!-- End Media -->
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->
        </div>
    </div>
    <!-- End Blog Article -->
</div>
