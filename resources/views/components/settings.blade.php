
<section class="mt-10 ml-[1rem] mobile:ml-108 flex flex-col">

    <h1 class=" font-bold mb-8 h-30 w-[16rem] text-[1.6rem]">
        {{ $heading }}
    </h1>

    <div class="flex flex-col">
        <aside class="w-48 flex-shrink-0"> 
            <div>
                <a href="{{route('worldwide.show')}}"
                    class="{{ request()->is('dashboard/worldwide') ? 'font-bold' : '' }}">Worldwide</a>
'
                <a 
                   >By Country</a>

            </div>
        </aside>
        <main class="flex-1 flex-col w-[23rem] mobile:w-[76rem]">
          
                {{ $slot }}
            
        </main>
    </div>

</section>