<div class="">
    <div class="bg-white d-none d-lg-block shadow fixed-top  h-100" id="navi" style="width: 325px">
        <div class="px-4 py-2 bg-white d-block w-100">
            <p class="lead h3 fw-bold mt-2">Admin Panel</p>
        </div>
        <div class="border-bottom border-secondary w-100"></div>
        <div class="d-flex flex-column pb-0">
            <div>
                <div class="py-3 px-4">
                    <p class="mt-3 px-3 py-1 ps-1 rounded-3 pointer {{ $nav == 'dashboard' ? 'nav-active' : '' }}"
                       onclick="window.location.href='{{ route('admin.dashboard', app()->getLocale()) }}'"
                    >
                        <i class="bi bi-house-door me-2"></i> Dashboard
                    </p>
                </div>
                <div class="border-bottom"></div>
                <div class="py-3 px-4">
                    <div class="text-uppercase ps-1 h6 py-2 fw-bolder text-dark text-muted">Shop</div>
                    <div class="mt-2 px-3 py-1 ps-1 rounded-3 pointer text-dark {{ $nav == 'products' ? 'nav-active' : '' }}"
                         onclick="window.location.href='{{ route('admin.products', app()->getLocale()) }}'"
                    >
                        <i class="bi bi-lightning-charge me-2"></i> Products
                    </div>
                    <div class="mt-1 px-3 py-1 ps-1 rounded-3 pointer text-dark {{ $nav == 'categories' ? 'nav-active' : '' }}"><i class="bi bi-layers me-2"></i> Categories</div>
                    <div class="mt-1 px-3 py-1 ps-1 rounded-3 pointer text-dark {{ $nav == 'orders' ? 'nav-active' : '' }}"><i class="bi bi-bag me-2"></i> Orders</div>
                    <div class="mt-1 px-3 py-1 ps-1 rounded-3 pointer text-dark {{ $nav == 'customers' ? 'nav-active' : '' }}"><i class="bi bi-people me-2"></i> Customers</div>
                    <div class="mt-1 px-3 py-1 ps-1 rounded-3 pointer text-dark {{ $nav == 'finances' ? 'nav-active' : '' }}"><i class="bi bi-graph-up-arrow me-2"></i> Finances</div>
                </div>
            </div>
            <div class="py-3 px-4 border-top position-fixed bottom-0" style="min-width: 325px">
                <p class="mt-3 px-3 py-1 ps-1 rounded-3 pointer text-danger fw-bolder"
                   onclick="window.location.href='{{ route('admin.logout', app()->getLocale()) }}'"
                >
                    <i class="bi bi-arrow-bar-right me-2"></i> Sign out
                </p>
            </div>
        </div>
    </div>
</div>
