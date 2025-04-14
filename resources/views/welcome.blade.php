<x-layouts.main>
    <div class="container mx-auto my-8 grid grid-cols-12 gap-4">
        <!-- Slider -->
        <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "dotsItemClasses": "hs-carousel-active:bg-black hs-carousel-active:border-black size-3 border border-gray-400 rounded-full cursor-pointer",
    "isAutoHeight": true,
    "isAutoPlay": true
  }' class="relative col-span-8">
            <div class="hs-carousel relative overflow-hidden w-full min-h-96 rounded-lg">
                <div
                    class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                    <div class="hs-carousel-slide">
                        <a href="#">
                            <img class="w-full"
                                 src="https://kimostore.net/cdn/shop/files/Delivery-Eng_88c7626c-461a-4493-b7a8-f39802e433b2.png?v=1718106405&width=1400">
                        </a>
                    </div>
                    <div class="hs-carousel-slide">
                        <a href="#">
                            <img class="w-full"
                                 src="https://kimostore.net/cdn/shop/files/Delivery-Eng_88c7626c-461a-4493-b7a8-f39802e433b2.png?v=1718106405&width=1400">
                        </a>
                    </div>
                    <div class="hs-carousel-slide">
                        <a href="#">
                            <img class="w-full"
                                 src="https://kimostore.net/cdn/shop/files/Delivery-Eng_88c7626c-461a-4493-b7a8-f39802e433b2.png?v=1718106405&width=1400">
                        </a>
                    </div>
                </div>
            </div>

            <button type="button"
                    class="hs-carousel-prev cursor-pointer hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 start-2 inline-flex justify-center items-center size-10 bg-white border border-gray-100 text-gray-800 rounded-full shadow-2xs hover:bg-gray-100 -translate-y-1/2 focus:outline-hidden">
                <span class="text-2xl" aria-hidden="true">
                  <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"></path>
                  </svg>
                </span>
                <span class="sr-only">Previous</span>
            </button>
            <button type="button"
                    class="hs-carousel-next cursor-pointer hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 end-2 inline-flex justify-center items-center size-10 bg-white border border-gray-100 text-gray-800 rounded-full shadow-2xs hover:bg-gray-100 -translate-y-1/2 focus:outline-hidden">
                <span class="sr-only">Next</span>
                <span class="text-2xl" aria-hidden="true">
                  <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                       viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                  </svg>
                </span>
            </button>

            <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 flex gap-x-2"></div>
        </div>
        <!-- End Slider -->

        <div class="col-span-4 grid grid-cols-2 gap-4">
            <a href="#" class="rounded-lg overflow-hidden">
                <img src="https://sigma-computer.com/image/catalog/banners/1671706997.jpg">
            </a>
            <a href="#" class="rounded-lg overflow-hidden">
                <img src="https://sigma-computer.com/image/catalog/banners/1671706997.jpg">
            </a>
            <a href="#" class="rounded-lg overflow-hidden">
                <img src="https://sigma-computer.com/image/catalog/banners/1671706997.jpg">
            </a>
            <a href="#" class="rounded-lg overflow-hidden">
                <img src="https://sigma-computer.com/image/catalog/banners/1671706997.jpg">
            </a>
        </div>

        <!-- Slider -->
        <div data-hs-carousel='{
  "loadingClasses": "opacity-0",
  "isAutoHeight": true,
  "slidesQty": {
        "xs": 3,
        "sm": 4,
        "md": 5,
        "lg": 6
    }
}' class="relative col-span-full group">
            <div class="hs-carousel w-full overflow-hidden rounded-lg dark:bg-neutral-900">
                <div class="relative min-h-72 -mx-1">
                    <!-- transition-transform duration-700 -->
                    <div
                        class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 transition-transform duration-700">
                        @foreach($featuredCategories as $category)
                            <div class="hs-carousel-slide px-1">
                                <a href="#" class="flex flex-col items-center font-semibold text-gray-800 text-lg">
                                    <img class="w-56"
                                         src="{{ $category->getFirstMediaUrl("*") }}">
                                    <h4>{{ $category->name }}</h4>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                <button type="button"
                        class="cursor-pointer hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 start-2 inline-flex justify-center items-center size-10 bg-gray-800 text-white rounded-full shadow-2xs hover:bg-black -translate-y-1/2 focus:outline-hidden">
                <span class="text-2xl" aria-hidden="true">
                  <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                       viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"></path>
                  </svg>
                </span>
                    <span class="sr-only">Previous</span>
                </button>
                <button type="button"
                        class="cursor-pointer hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 end-2 inline-flex justify-center items-center size-10 bg-gray-800 text-white rounded-full shadow-2xs hover:bg-black -translate-y-1/2 focus:outline-hidden">
                    <span class="sr-only">Next</span>
                    <span class="text-2xl" aria-hidden="true">
                  <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                       viewBox="0 0 24 24"
                       fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                       stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                  </svg>
                </span>
                </button>
            </div>
        </div>
        <!-- End Slider -->

        <div class="col-span-full my-4">
            <div class="flex items-center justify-between mb-5 bg-black p-3">
                <h5 class="font-bold text-white text-2xl">New Arrivals</h5>
                <a class="text-white font-medium hover:underline text-lg" href="#">
                    View More
                </a>
            </div>
            <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "slidesQty": {
        "xs": 1,
        "sm": 2,
        "md": 3,
        "lg": 4,
        "xl": 5,
        "2xl": 6
    }
}' class="relative group">
                <div class="hs-carousel w-full overflow-hidden rounded-lg">
                    <div class="relative min-h-96 -mx-1">
                        <!-- transition-transform duration-700 -->
                        <div
                            class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 transition-transform duration-700">
                            @foreach($newArrivals as $product)
                                <div class="hs-carousel-slide px-1 group/item">
                                    <div
                                        class="rounded-lg border border-gray-200 bg-white p-4 flex flex-col relative h-full">
                                        @if($product->discount)
                                            <span class="bg-red-600 text-white absolute top-3 left-0 py-1 px-3 text-xs">SAVE {{ ceil($product->price - $product->final_price) }} USD</span>
                                        @endif
                                        <a href="#" class="w-full rounded-md overflow-hidden mb-3">
                                            <img class="w-full h-full object-contain group-hover/item:hidden"
                                                 src="{{ $product->getFirstMediaUrl() }}">
                                            <img class="hidden w-full h-full object-contain group-hover/item:block" src="{{ $product->getMedia()[1]?->getFullUrl() }}">
                                        </a>
                                        <a href="#" class="font-semibold text-gray-800">
                                            <h4 class="line-clamp-2">{{ $product->title }}</h4>
                                        </a>
                                        <a class="text-gray-500 hover:text-gray-700 text-sm flex-start" href="#">{{ $product->brand->name }}</a>
                                        <div class="mt-3 flex items-center gap-3">
                                            <span class="font-bold text-lg @if($product->discount) text-red-700 @endif">{{ $product->final_price }} USD</span>
                                            @if($product->discount)
                                                <span class="text-gray-600"><del>{{ $product->price }} USD</del></span>
                                            @endif
                                        </div>
                                        <button
                                            class="flex items-center justify-center gap-3 bg-black text-white rounded-md py-2 px-4 mt-3 hover:bg-gray-800 transition duration-200 cursor-pointer">
                                            <x-heroicon-c-shopping-cart class="size-4"/>
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="transition-opacity duration-200 opacity-0 group-hover:opacity-100">
                    <button type="button"
                            class="cursor-pointer hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 start-2 inline-flex justify-center items-center size-10 bg-gray-800 text-white rounded-full shadow-2xs hover:bg-black -translate-y-1/2 focus:outline-hidden">
            <span class="text-2xl" aria-hidden="true">
              <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m15 18-6-6 6-6"></path>
              </svg>
            </span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button type="button"
                            class="cursor-pointer hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:cursor-default absolute top-1/2 end-2 inline-flex justify-center items-center size-10 bg-gray-800 text-white rounded-full shadow-2xs hover:bg-black -translate-y-1/2 focus:outline-hidden">
                        <span class="sr-only">Next</span>
                        <span class="text-2xl" aria-hidden="true">
              <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
              </svg>
            </span>
                    </button>
                </div>
            </div>
            </div>
    </div>
</x-layouts.main>
