<x-layouts.main>
    <div class="container mx-auto my-10">
        <div class="grid grid-cols-2 gap-10">
            <div>
                <div class="bg-white border rounded-md p-5 grid grid-cols-12 gap-5">
                    <div class="flex flex-col gap-2 col-span-2">
                        @foreach($product->getMedia() as $media)
                            <img onclick="document.getElementById('gallery-image').src = this.src; document.querySelectorAll('.border-gray-600').forEach(el => el.classList.remove('border-gray-600')); this.classList.add('border-gray-600');" class="w-36 aspect-square rounded border-2 cursor-pointer @if($loop->first) border-gray-600 @endif" src="{{ $media->getFullUrl() }}">
                        @endforeach
                    </div>
                    <div class="col-span-10">
                        <img id="gallery-image" src="{{ $product->getFirstMediaUrl() }}">
                    </div>
                </div>
            </div>
            <div>
                <div class="bg-white border rounded-md p-7">
                    <div class="flex items-center justify-between">
                        <h2 class="text-3xl font-bold mb-3">{{ $product->title }}</h2>
                        <a href="#" class="border rounded p-3 hover:bg-gray-50 transition shrink-0">
                            <img class="w-20" src="{{ $product->brand->getFirstMediaUrl() }}">
                        </a>
                    </div>
                    <div class="flex items-center gap-4">
                        @if($product->discount)
                            <span class="text-xl font-bold text-red-500"><del>{{ $product->price }}</del></span>
                        @endif
                        <span class="text-2xl font-bold">{{ $product->final_price }}</span>
                    </div>
                    @if($product->quantity > 0)
                        <span class="px-2 py-1 bg-green-600 text-white font-medium rounded text-sm">IN STOCK</span>
                    @else
                        <span class="px-2 py-1 bg-red-600 text-white font-medium rounded text-sm">SOLD OUT</span>
                    @endif
                    <!-- Input Number -->
                    <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg mt-10" data-hs-input-number='{
  "min": 1,
  "max": {{ $product->quantity }}
}'>
                        <div class="w-full flex justify-between items-center gap-x-5">
                            <div class="grow">
                                <span class="block text-xs text-gray-500">Select quantity</span>
                                <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none" style="-moz-appearance: textfield;" type="number" aria-roledescription="Number field" value="1" data-hs-input-number-input="">
                            </div>
                            <div class="flex justify-end items-center gap-x-1.5">
                                <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" tabindex="-1" aria-label="Decrease" data-hs-input-number-decrement="">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                    </svg>
                                </button>
                                <button type="button" class="size-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5v14"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- End Input Number -->

                    @if($product->quantity)
                        <button class="bg-black w-full mt-5 text-white font-medium rounded-lg text-2xl py-3 cursor-pointer hover:shadow-xl transition">Add to Cart</button>
                    @endif
                    <div class="border-t pt-4 text-lg mt-10">
                        <span class="font-semibold text-gray-800">Categories: </span>
                        @foreach($product->categories as $category)
                            <a class="text-gray-600 hover:text-gray-800" href="#">{{ $category->name }}</a>@if(!$loop->last), @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="border-t">
        <div class="container mx-auto my-10 bg-white rounded-lg shadow p-5">
            <div class="border-b border-gray-200">
                <nav class="-mb-0.5 flex justify-center gap-x-6" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                    <button type="button" class="cursor-pointer hs-tab-active:font-semibold hs-tab-active:border-black hs-tab-active:text-black py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-lg whitespace-nowrap text-gray-500 hover:text-black focus:outline-hidden focus:text-black disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 active" id="horizontal-alignment-item-1" aria-selected="true" data-hs-tab="#horizontal-alignment-1" aria-controls="horizontal-alignment-1" role="tab">
                        Description
                    </button>
                    <button type="button" class="cursor-pointer hs-tab-active:font-semibold hs-tab-active:border-black hs-tab-active:text-black py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-lg whitespace-nowrap text-gray-500 hover:text-black focus:outline-hidden focus:text-black disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400" id="horizontal-alignment-item-2" aria-selected="false" data-hs-tab="#horizontal-alignment-2" aria-controls="horizontal-alignment-2" role="tab">
                        Return Policy
                    </button>
                </nav>
            </div>

            <div class="mt-3">
                <div id="horizontal-alignment-1" role="tabpanel" aria-labelledby="horizontal-alignment-item-1">
                    {!! $product->description !!}
                </div>
                <div id="horizontal-alignment-2" class="hidden" role="tabpanel" aria-labelledby="horizontal-alignment-item-2">
                    {!! $product->return_policy !!}
                </div>
            </div>
        </div>
    </div>

</x-layouts.main>
