<div id="sidebar" class="h-screen w-16 menu bg-white text-white px-4 flex items-center nunito static fixed shadow">

    <ul class="list-reset ">
        <li class="my-2 md:my-0">
            <a href="{{ route('admin.dashboard', app()->getLocale()) }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400 @if($nav == 'dashboard') text-indigo-400 @endif">
                <i class="fas fa-home fa-fw mr-3"></i><span class="w-full inline-block pb-1 mt-1 md:pb-0 text-sm">Dashboard</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="{{ route('admin.products', app()->getLocale()) }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400 items-center @if($nav == 'products') text-indigo-400 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 inline-block" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd" />
                </svg><span class="w-full pb-1 mt-1 md:pb-0 text-sm">Products</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="{{ route('admin.categories', app()->getLocale()) }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400 @if($nav == 'categories') text-indigo-400 @endif">
                <i class="fas fa-tasks fa-fw mr-3"></i><span class="w-full inline-block pb-1 mt-1 md:pb-0 text-sm">Categories</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="{{ route('admin.labels', app()->getLocale()) }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400 @if($nav == 'labels') text-indigo-400 @endif">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 inline-block" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd" />
                </svg><span class="w-full inline-block pb-1 mt-1 md:pb-0 text-sm">Labels</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fas fa-chart-area fa-fw mr-3"></i><span class="w-full inline-block pb-1 mt-1 md:pb-0 text-sm">Analytics</span>
            </a>
        </li>
        <li class="my-2 md:my-0">
            <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-600 no-underline hover:text-indigo-400">
                <i class="fa fa-wallet fa-fw mr-3"></i><span class="w-full inline-block pb-1 mt-1 md:pb-0 text-sm">Payments</span>
            </a>
        </li>
    </ul>

</div>
