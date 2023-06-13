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
    <div class="mt-24 mx-36 max-w-7xl">
        <h1 class="text-5xl font-extrabold dark:text-white">About Us</h1>
        <hr class="my-4">
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perspiciatis officia, nam labore quae quasi
            omnis soluta? Maxime at veniam veritatis optio porro fugit sapiente quo eveniet maiores voluptatibus nostrum
            dignissimos mollitia sint distinctio, nesciunt magnam, perferendis ipsam consectetur! Blanditiis ab fuga
            quis rerum fugit quaerat reprehenderit. Quia, quo provident? Lorem ipsum dolor, sit amet consectetur
            adipisicing elit. Odit est cumque facilis, labore magni harum repellat, atque minus aliquam laboriosam autem
            at. Commodi quaerat accusamus quasi similique nam officiis reiciendis corrupti, aut, delectus minus,
            distinctio animi vero ea maiores voluptates. Doloribus placeat ipsa mollitia voluptas iste iure tenetur,
            impedit perferendis?
        </p>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perspiciatis officia, nam labore quae quasi
            omnis soluta? Maxime at veniam veritatis optio porro fugit sapiente quo eveniet maiores voluptatibus nostrum
            dignissimos mollitia sint distinctio, nesciunt magnam, perferendis ipsam consectetur! Blanditiis ab fuga
            quis rerum fugit quaerat reprehenderit. Quia, quo provident? Lorem ipsum dolor, sit amet consectetur
            adipisicing elit. Odit est cumque facilis, labore magni harum repellat, atque minus aliquam laboriosam autem
            at. Commodi quaerat accusamus quasi similique nam officiis reiciendis corrupti, aut, delectus minus,
            distinctio animi vero ea maiores voluptates. Doloribus placeat ipsa mollitia voluptas iste iure tenetur,
            impedit perferendis?
        </p>
        <p class="mb-4">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perspiciatis officia, nam labore quae quasi
            omnis soluta? Maxime at veniam veritatis optio porro fugit sapiente quo eveniet maiores voluptatibus nostrum
            dignissimos mollitia sint distinctio, nesciunt magnam, perferendis ipsam consectetur! Blanditiis ab fuga
            quis rerum fugit quaerat reprehenderit. Quia, quo provident? Lorem ipsum dolor, sit amet consectetur
            adipisicing elit. Odit est cumque facilis, labore magni harum repellat, atque minus aliquam laboriosam autem
            at. Commodi quaerat accusamus quasi similique nam officiis reiciendis corrupti, aut, delectus minus,
            distinctio animi vero ea maiores voluptates. Doloribus placeat ipsa mollitia voluptas iste iure tenetur,
            impedit perferendis?
        </p>
    </div>
    @include('store.component.footer')
</body>
