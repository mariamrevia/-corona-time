<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>


<body>

    <div class="flex flex-row justify-between w-[23rem] mobile:w-[90rem] h-[5rem]">


        <div class="flex flex-col mobile:ml-[6.5rem] ml-[1rem] mt-[2.635rem]">
            <img src="/images/Group1.png" class="w-[10.6rem] h-[2.6rem]" />
        </div>


        <div class="flex flex-row justify-items-end items-center mt-[2.635rem] gap-[3rem]  mobile:mr-108">
            <div class="flex flex-row mobile:block gap-4">
                @php
                    $locale = session('locale', 'en');
                @endphp
                <div class="w-[6rem] h-[2rem]">
                    <form method="POST" action="{{ route('languages.switch', $locale) }}">
                        @csrf
                        <select name="locale" onchange="this.form.submit()">
                            <option value="en" {{ $locale === 'en' ? 'selected' : '' }}>English</option>
                            <option value="ka" {{ $locale === 'ka' ? 'selected' : '' }}>Georgian</option>
                        </select>
                    </form>

                </div>


                <div class="block md:hidden mt-[5px]">
                    <x-dropdown>
                        <x-slot name="trigger">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0H18V2H0V0ZM6 7H18V9H6V7ZM0 14H18V16H0V14Z" fill="#09121F" />
                            </svg>
                        </x-slot>

                        <h2 class="flex font-bold justify-center">{{ $username }}</h2>

                        <div class="justify-center gap-[7px] flex flex-row">
                            <form method="POST" action={{ route('logout') }}>
                                @csrf
                                <button class="items-center" type="submit">Log Out</button>
                            </form>
                        </div>
                    </x-dropdown>
                </div>

                <div class="md:block hidden">
                    <div class="flex flex-row gap-[24px]">
                        <h2 class="flex font-bold justify-center">{{ $username }}</h2>
                        <div class="justify-center gap-[7px] flex flex-row">
                            <form method="POST" action={{ route('logout') }}>
                                @csrf
                                <button class="items-center" type="submit">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
    <div class=" bg-lightGr mt-[1rem] h-0.5  w-[24rem] mobile:w-[90rem]"></div>

    {{ $slot }}


</body>
