<div id="sidebar" class="h-screen w-16 menu bg-white text-white px-4 flex items-center nunito static fixed shadow">

    <ul class="list-reset ">
        <li class="my-2 md:my-0">
            <a href="{{ route('admin.dashboard', app()->getLocale()) }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400 @if($nav == 'dashboard') text-indigo-400 @endif">
                <i class="fas fa-home fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Dashboard</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="{{ route('admin.products', app()->getLocale()) }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400 items-center @if($nav == 'products') text-indigo-400 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 inline-block" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                </svg><span class="w-full pb-1 md:pb-0 text-sm">Products</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="{{ route('admin.categories', app()->getLocale()) }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400 @if($nav == 'categories') text-indigo-400 @endif">
                <i class="fas fa-tasks fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Categories</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fa fa-envelope fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Labels</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fas fa-chart-area fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Analytics</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fa fa-wallet fa-fw mr-3"></i><span class="w-full inline-block pb-1 md:pb-0 text-sm">Payments</span>
            </a>
        </li>
    </ul>

</div>
