@props(['name', 'text'])


@php
    $errorClass = $errors->has($name) ? 'border-red-500' : '';
    $validClass = $errors->count() == 0 && !old($name) ? '' : ($errors->has($name) ? '' : 'border-green-500');
@endphp

<div class="flex flex-col mobile:mt-[1.5rem] mt-[1rem]">
    <label class="font-bold" for='{{ $name }}'>{{ $text }}</label>
    <input class="w-[21.4rem] h-[3.5rem] border rounded mt-[0.5rem] {{ $errorClass }} {{ $validClass }}"
        name='{{ $name }}' id="{{ $name }}" {{ $attributes }} />
    @if ($errors->has($name))
        <div class="flex flex-row w-[400px] items-center mt-[5px]">

            <img class="w-[20px] h-[20px]" src="{{ asset('images/Vector.png') }}" />
            <p class="ml-[6px] w-[300px] text-red-500 text-xs mt-1 whitespace-wrap">{{ $errors->first($name) }}</p>
        </div>
    @endif

</div>
