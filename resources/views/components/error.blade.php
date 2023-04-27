@props(['name'])
@error($name)
    <div class="flex flex-row w-[400px] items-center mt-[5px]">

        <img class="w-[20px] h-[20px]" src="{{ asset('images/Vector.png') }}" />
        <p class="ml-[6px] w-[300px] text-red-500 text-xs mt-1 whitespace-wrap">{{ $message }}</p>
    </div>
@enderror
