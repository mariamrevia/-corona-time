@props(['trigger'])

<div x-data="{show: false}" @click.away="show=false" class="relative">

<div @click=" show = ! show">
   {{ $trigger }}
</div>


<div x-show="show" class="py-2 absolute bg-gray-100 items-center  mt-2 rounded-xl w-[100px] z-50  overflow-auto max-h-52 right-0 " style="display:none">

{{ $slot }}

</div>
    

</div>