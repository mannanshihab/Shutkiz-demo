<div>
    <!-- shutki video blog Start-->
    <section class="py-14 font-poppins">
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
            <!-- pagination start -->
            <div class="mt-6">
                {{ $recipes ->links() }}
            </div>
            <!-- pagination end -->
        </div>
    </section>
    <!-- shutki video blog End -->
</div>
