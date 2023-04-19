<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class=" flex flex-row justify-between desktop:w-[90rem] h-[56.25rem] mobile:w-[23.4rem]">
        <div class="flex flex-col mobile:ml-[6.5rem] ml-[1rem] ">
            <div class="mt-[2.635rem]">
                <img src={{asset("images/Group1.png")}} class="w-[10.6rem] h-[2.6rem]"/>
            </div>
            {{ $slot }}
        </div>

       

        <div>
            <img src={{asset("images/Rectangle1.png")}} class=" hidden sm:block"/>
        </div>
        </div>
    </div>
</body>