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
    
    <div class="my-24 max-w-7xl mx-auto min-h-1/2vh">
        @include('store.component.search')
        <div class="grid grid-cols-4 gap-4">

            @foreach ($items as $item)
                <div
                    class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('user.item.show', $item) }}">
                        <img class="p-4 rounded-t-lg object-scale-down h-48 w-full" src="{{ asset($item->image_location) }}"
                            alt="product image" />
                    </a>
                    <div class="px-5 pb-5 content-center">
                        <a href="{{ route('user.item.show', $item) }}">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $item->name }}</h5>
                        </a>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <title>Rating star</title>
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <p class="ml-2 text-sm font-bold text-gray-900 dark:text-white">{{$item->item_ratings->avg('rating')}}</p>
                            <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $items->links() }}
    </div>
    @include('store.component.footer')
</body>

</html>
