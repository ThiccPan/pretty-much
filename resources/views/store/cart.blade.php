<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('store.component.user_navigation')
    <div class="px-8 flex flex-row justify-center my-24 max-w-7xl mx-auto min-h-1/2vh">
        <div class="mx-8">
            <div
                class="w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Cart items</h5>
                </div>
                <div class="flow-root">
                    <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($cart as $cart_item)
                            <li class="py-3 sm:py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="w-16 h-16 rounded-full"
                                            src="{{ asset($cart_item->item->image_location) }}" alt="Neil image">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-md font-semibold text-gray-900 truncate dark:text-white">
                                            {{ $cart_item->item->name }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Qty: {{ $cart_item->quantity }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        Rp. {{ $cart_item->total_price }}
                                    </div>
                                    <a href="{{ route('user.cart.item.delete', $cart_item->item_id) }}"
                                        class="font-medium text-red-600 dark:text-blue-500 hover:underline"
                                        onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $cart_item->item_id }}').submit();">
                                        Delete
                                    </a>

                                    <form id="delete-form-{{ $cart_item->item_id }}"
                                        action="{{ route('user.cart.item.delete', $cart_item->item_id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="cart_item_id" value="{{$cart_item->item_id}}">
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        {{-- payment --}}
        <form action="{{ route('user.checkout') }}" method="post" id="payment-form">
            @csrf

            <div
                class="max-w-sm h-fit p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Total price</h5>
                <p class="mb-3 font-bold text-gray-700 dark:text-gray-400">Rp. {{ $total_price }}</p>

                <!-- Dropdown payment -->
                <button id="dropdownRadioBgHoverButton" data-dropdown-toggle="dropdownRadioBgHover"
                    class="bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                    type="button">Payment <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg></button>
                <div id="dropdownRadioBgHover"
                    class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownRadioBgHoverButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="default-radio-4" type="radio" value="cash" name="payment_method" required
                                    class="w-4 h-4 text-gray-600 bg-gray-100 focus:ring-gray-500 dark:focus:ring-gray-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="default-radio-4"
                                    class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">cash</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                <input id="default-radio-4" type="radio" value="credit" name="payment_method" required
                                    value="credit"
                                    class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 focus:ring-blue-gray dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                <label for="default-radio-4"
                                    class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">credit</label>
                            </div>
                        </li>
                    </ul>
                </div>

                {{-- buy button --}}
                <button type="submit" form="payment-form" value="submit"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Buy</button>
            </div>
        </form>
    </div>
    @include('store.component.footer')
</body>

</html>
