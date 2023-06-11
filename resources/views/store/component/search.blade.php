<form class="flex items-center mb-8" action="{{ route('user.item.search') }}" method="GET">

    <button id="dropdownRadioBgHoverButton" data-dropdown-toggle="dropdownRadioBgHover"
        class="mr-4 text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-black dark:hover:bg-black dark:focus:ring-black"
        type="button">Filter <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg></button>

    <!-- Dropdown menu -->
    <div id="dropdownRadioBgHover"
        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioBgHoverButton">
            <li>
                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input id="default-radio-4" type="radio" value="name" name="type"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="default-radio-4"
                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">item name</label>
                </div>
            </li>
            <li>
                <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                    <input checked id="default-radio-5" type="radio" value="category" name="type"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                    <label for="default-radio-5"
                        class="w-full ml-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">category</label>
                </div>
            </li>
        </ul>
    </div>

    <label for="simple-search" class="sr-only">Search</label>
    <div class="w-1/2">
        <input name="query" type="text" id="simple-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Search">
    </div>
    <button type="submit"
        class="p-2.5 ml-2 text-sm font-medium text-white bg-black rounded-lg border border-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-black dark:bg-black dark:hover:bg-black dark:focus:black">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
        </svg>
        <span class="sr-only">Search</span>
    </button>
</form>
