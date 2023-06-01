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
@include('layouts.user_navigation')

<div class="my-24 max-w-7xl mx-auto">
<div class="flex flex-row justify-between">
    {{$item}}
</div>
<form method="POST" action="{{route('user.cart', $item)}}" id="item-to-cart">
    @csrf
    <input type="hidden" name="item_id" value="{{$item}}">
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>

</div>

  
</body>
</html>