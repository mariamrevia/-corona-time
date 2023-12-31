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
    <div class=" flex flex-row justify-between desktop:w-[90rem] h-full mobile:w-[23.4rem]">
        <div class="flex flex-col mobile:ml-[6.5rem] ml-[1rem] w-[21.4rem]">
            <div class="flex flex-row justify-between">

                <div class="mt-[2.635rem] w-[12rem] h-[3rem]">
                    <img src={{asset("images/Group1.png")}} class="w-[10.6rem] h-[2.6rem]"/>
                </div>
                @php
                    $locale = session('locale', 'en');
                @endphp
                <div class="mt-[3rem] w-[6rem] h-[2rem]">
                    <form method="POST" action="{{ route('languages.switch', $locale) }}">
                        @csrf
                        <select name="locale" onchange="this.form.submit()">
                            <option value="en" {{ $locale === 'en' ? 'selected' : '' }}>English</option>
                            <option value="ka" {{ $locale === 'ka' ? 'selected' : '' }}>Georgian</option>
                        </select>
                    </form>
                
                </div>
            </div>
            {{ $slot }}
        </div>
        
           

        <div>
            <img src={{asset("images/Rectangle1.png")}} class=" hidden sm:block h-full"/>
        </div>
        </div>
    </div>
</body>