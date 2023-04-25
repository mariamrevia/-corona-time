
<section class="mobile:mt-10 mt-[1.5rem] ml-[1rem] mobile:ml-108 flex flex-col">

    <h1 class=" font-bold mb-8 h-30 w-[16rem] text-[1.6rem]">
        {{ $heading }}
    </h1>
    
    <div class="flex flex-col">
        <aside class="w-48 flex-shrink-0"> 
            <div>
                <a href="{{route('worldwide.show')}}"
                class="{{ request()->is('dashboard/worldwide') ? 'font-bold' : '' }}">Worldwide</a>
                '
                <a href="{{route('statistics.show')}}"
                class="{{ request()->is('dashboard/byCountry') ? 'font-bold' : '' }}""
                >By Country</a>
                
            </div>
        </aside>
        <div class=" bg-lightGr mt-[1rem] h-0.5  w-[24rem] mobile:w-[76.3rem]"></div>
        <main class="flex-1 flex-col w-[23rem] mobile:w-[76rem]">
          
                {{ $slot }}
            
        </main>
    </div>

</section>