@props(['name', 'text'])


@php
    $errorClass = $errors->has($name) ? 'border-red-500' : '';
    $validClass = $errors->count() == 0 && !old($name) ? '' : ($errors->has($name) ? '' : 'border-green-500');
@endphp

<div class="flex flex-col mobile:mt-[1.5rem] mt-[1rem]">
    <label class="font-bold" for='{{ $name }}'>{{ $text }}</label>
    <div class="w-[21.4rem] h-[3.5rem] flex items-center border-[2px] rounded mt-[0.5rem] focus-within:border-primaryBlue  focus-within:ring focus:shadow-shadow {{ $errorClass }} {{ $validClass }}">
<div class=" w-[21.4rem] flex flex-row items-center justify-center">
    
    <input class="w-[17rem] h-[3rem]  outline-none "
        name='{{ $name }}' id="{{ $name }}" {{ $attributes }}  />
        @if ($validClass)   
        <img src="{{ asset('images/Vector1.png') }}" class="w-[20px] h-[20px]"  />
        @endif
</div>

    </div>
    @if ($errors->has($name))
        <div class="flex flex-row w-[400px] items-center mt-[5px]">

            <img class="w-[20px] h-[20px]" src="{{ asset('images/Vector.png') }}" />
            <p class="ml-[6px] w-[300px] text-red-500 text-xs mt-1 whitespace-wrap">{{ $errors->first($name) }}</p>
        </div>
    @endif

</div>
