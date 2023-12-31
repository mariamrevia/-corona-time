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
<div class=" flex flex-col mobile:items-center desktop:w-[90rem] h-[56.25rem] mobile:w-[23.4rem]">
    <div class="mt-[2.635rem] ml-[16px]">
        <img src="{{asset("images/Group1.png")}}" class="w-[10.6rem] h-[2.6rem]"/>
    </div>
    <div class=" mt-[40px] mobile:mt-144  flex flex-col items-center">

       
            {{ $slot }}

    </div>
   
    </div>