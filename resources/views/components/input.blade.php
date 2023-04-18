@props(['name'])
<div class="flex flex-col mobile:mt-[1.5rem] mt-[1rem]">
    <label class="font-bold"  for='{{$name}}'>{{$name}}</label>
    <input
    class="w-[21.4rem] h-[3.5rem] border rounded mt-[0.5rem]" 
    name='{{$name}}'
    id="{{$name}}"
    {{$attributes}}
   
    />
   
</div>