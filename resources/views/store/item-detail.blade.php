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

    <div class="flex mt-24 ">

        <div class="mb-8 max-w-7xl ">
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="{{ route('user.item.show', $item) }}">
                    <img class="p-8 rounded-t-lg object-scale-down h-48 w-96" src="{{ asset($item->image_location) }}"
                        alt="product image" />
                </a>
                <div class="px-5 pb-5 content-center">
                    <a href="{{ route('user.item.show', $item) }}">
                        <h4 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                            {{ $item->name }}
                            </h5>
                    </a>
                    <div class="flex items-center mt-2.5 mb-5">
                        <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>First star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        <span
                            class="bg-gray-200 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">5.0</span>
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
                </div>
            </div>
        </div>

        <div class="max-w-sm">
            <form method="POST" action="{{ route('user.cart.add', $item) }}" id="item-to-cart">
                @csrf
                <div class="mb-4">
                    <label for="quantity" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Quantity
                        (max:
                        {{ $item->stock }})</label>
                    <input type="number" name="quantity" id="quantity"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required min="0" max="{{ $item->stock }}">
                </div>

                <input type="hidden" name="item_id" value="{{ $item }}">
                <button type="submit"
                    class="disabled text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                    to cart</button>
            </form>
        </div>
    </div>

    <div class="mb-8 max-w-sm ">
        <form action="{{route('user.review.post', $item)}}" method="post">
            @csrf
            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Write item
                review</label>
            <input type="number" name="rating" id="rating"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="" required min="0" max="{{ $item->stock }}">
            <textarea name="review" id="review" rows="4"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Item review here..."></textarea>
            <button type="submit"
                class="disabled text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                review</button>
        </form>
    </div>

    @include('store.component.footer')
</body>

</html>
