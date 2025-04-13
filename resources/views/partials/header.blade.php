<header class="py-10 bg-white">
    <div class="flex justify-between items-center gap-5 container mx-auto">
        <div>
            <img class="h-20"
                 src="https://printrado.com/wp-content/uploads/2024/05/Printrado-logo-RGB-Final-2048x1027.png.webp">
        </div>
        <form class="relative grow">
            <input name="query" type="text"
                   class="peer py-2.5 sm:py-3 px-5 ps-11 block w-full bg-gray-200 rounded-full"
                   placeholder="Search for products" autocomplete="off">
            <div
                class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                <x-heroicon-o-magnifying-glass class="shrink-0 size-4 text-gray-500"/>
            </div>
        </form>
        <div class="flex items-center gap-3">
            @guest()
                <a href="{{ route('login') }}"
                   class="p-2.5 bg-gray-100 rounded-full hover:bg-gray-200 transition flex items-center gap-2">
                    <x-heroicon-o-user class="size-6 text-gray-500"/>
                    Login / Register
                </a>
            @else
                <a href="{{ route('dashboard') }}"
                   class="p-2.5 bg-gray-100 rounded-full hover:bg-gray-200 transition flex items-center gap-2">
                    <x-heroicon-o-user class="size-6 text-gray-500"/>
                    My Account
                </a>
            @endguest
            <a href="#" class="p-2.5 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                <x-heroicon-o-shopping-cart class="size-6 text-gray-500"/>
            </a>
            <a href="#" class="p-2.5 bg-gray-100 rounded-full hover:bg-gray-200 transition">
                <x-heroicon-o-heart class="size-6 text-gray-500"/>
            </a>
        </div>
    </div>
</header>

<nav class="py-4 bg-black text-white font-semibold border-t border-gray-200 relative">
    <div class="container mx-auto flex gap-7">
        <div class="hs-dropdown [--strategy:static] sm:[--strategy:absolute] [--adaptive:none] [--is-collapse:true] sm:[--is-collapse:false] ">
            <button id="hs-mega-menu" type="button" class="flex items-center gap-2 cursor-pointer">
                <x-heroicon-c-bars-3 class="size-5"/>
                Browse Categories
            </button>

            <div
                class="hs-dropdown-menu sm:transition-[opacity,margin] sm:ease-in-out sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 w-full hidden z-10 sm:mt-3 top-full start-0 min-w-60 bg-white sm:shadow-md py-6 sm:px-2 before:absolute"
                role="menu" aria-orientation="vertical" aria-labelledby="hs-mega-menu">
                <div class="sm:grid sm:grid-cols-5 gap-5 container mx-auto overflow-y-scroll h-96">
                    @foreach($categories as $category)
                        <div class="flex flex-col">
                            <a class="border-b py-2 my-2 text-black font-bold" href="#">
                                {{ $category->name }}
                            </a>
                            @foreach($category->children as $subcategory)
                                <a class="py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100"
                                   href="#">
                                    {{ $subcategory->name }}
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="#">
            Home
        </a>
        <a href="#">
            New Arrivals
        </a>
        <a href="#">
            Top Rated
        </a>
        <a href="#">
            All Products
        </a>
        <a href="#">
            Contact Us
        </a>
    </div>
</nav>
