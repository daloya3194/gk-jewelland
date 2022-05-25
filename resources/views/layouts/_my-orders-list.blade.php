@if(!isset($orders[0]))
    <div class="h-full flex justify-center items-center">
        <p class="text-xl font-semibold">You don't have any orders yet &#x1F615;</p>
    </div>
@endif

@isset($orders[0])
    @foreach($orders as $order)
        <div class="border border-1 shadow-md p-5">
            <div class="flex justify-between items-center text-xl font-semibold">
                <div>Invoice Nr: {{ $order->invoice_number }}</div>
                <div>Invoice date: {{ date_format($order->created_at, 'd M Y') }}</div>
            </div>
            <div class="mt-2 text-lg">Number of product: {{ $order->cart->total_quantity }} Products</div>
            <div class="mt-2 flex justify-between items-center">
                <div class="font-bold">Total price: {{ $order->cart->total_price }}€</div>
                <a class="flex gap-x-2 items-center cursor-pointer text-bordeaux hover:scale-105"
                     href="{{ $order->invoice_pdf }}" target="_blank"
                >
                    <div class="font-bold">
                        Download Invoice
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
@endisset

