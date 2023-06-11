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

    <div class="flex flex-row mt-24 mx-32 justify-center">
        <div class="mb-8 max-w-7xl ">
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('user.item.show', $item) }}">
                    <img class="p-8 rounded-t-lg object-scale-down h-48 w-96" src="{{ asset($item->image_location) }}"
                        alt="product image" />
                </a>
                <div class="px-5 pb-5 content-center">
                    <a href="{{ route('user.item.show', $item) }}">
                        <h4 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $item->name }}
                        </h4>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Rating star</title>
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">{{$ave}}</p>
                            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        </div>
                    </div>
                    <hr>
                    <div class="mt-2 mb-4">
                        <h6 class="text-md font-bold dark:text-white">Category:</h6>
                        <p>{{ $item->category }}</p>
                    </div>
                    <div class="mt-2 mb-4">
                        <h6 class="text-md font-bold 
                        dark:text-white">description: </h6>
                        <p>{{ $item->description }}</p>
                    </div>
                    <div class="mt-2 mb-4">
                        <h6 class="text-md font-bold 
                        dark:text-white">Price: </h6>
                        <p>{{ $item->price }}</p>
                    </div>
                    <div class="mt-2 mb-4">
                        <h6 class="text-md font-bold 
                        dark:text-white">Stock: </h6>
                        <p>{{ $item->stock }}</p>
                    </div>
                    <hr>
                    <div class="mt-2 mb-4">
                        <div class="max-w-sm">
                            <form method="POST" action="{{ route('user.cart.add', $item) }}" id="item-to-cart">
                                @csrf
                                <div class="mb-4">
                                    <label for="quantity"
                                        class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Quantity
                                        (max:
                                        {{ $item->stock + $in_cart_qty }})</label>
                                    <input type="number" name="quantity" id="quantity"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="in your cart: {{ $in_cart_qty }}" required min="0" max="{{ $item->stock + $in_cart_qty }}">
                                </div>

                                <input type="hidden" name="item_id" value="{{ $item }}">
                                <input type="hidden" name="old_cart_qty" value="{{ $in_cart_qty }}">
                                <button type="submit"
                                    class="disabled text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-black dark:hover:bg-balck dark:focus:ring-black">Add
                                    to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mb-8 max-w-xl mx-auto">
        <form class="mb-8" action="{{ route('user.review.post', $item) }}" method="post">
            @csrf
            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Write item
                review</label>
            <input type="number" name="rating" id="rating"
                class="mb-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" required min="1" max="5">
            <textarea name="review" id="review" rows="4"
                class="mb-4 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Item review here..."></textarea>
            <button type="submit"
                class="mb-4 disabled text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                review</button>
        </form>

        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Item rating & review</h5>
        <hr class="my-4">
        @foreach ($item->item_ratings as $rating)
            <article>
                <div class="flex items-center mb-4 space-x-4">
                    <img class="w-10 h-10 rounded-full" src="{{asset('item_image/account.png')}}" alt="">
                    <div class="space-y-1 font-medium dark:text-white">
                        <p>{{$rating->user->name}}</p>
                    </div>
                </div>
                <div class="flex items-center mb-5">
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Rating star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">{{ $rating->rating }}</p>
                    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                </div>
                <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $rating->review }}</p>
            </article>
            <hr>
        @endforeach
    </div>


    @include('store.component.footer')
</body>

</html>
