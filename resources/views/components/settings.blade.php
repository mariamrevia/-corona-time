
<section class="mobile:mt-10 mt-[1.5rem] ml-[1rem]  mobile:ml-108 flex flex-col">

    <h1 class="{{ App::getLocale() === 'en' ?  'text-[1.6rem]' : 'text-[1.2rem]' }} font-bold mb-8 h-30 w-[20rem]">
        {{ $heading }}
    </h1>
    
    <div class="flex flex-col">
        <aside class="w-48 flex-shrink-0"> 
            <div class="w-[22rem] flex flex-row gap-[24px]">
                <div class="w-[100px]">
                    <a href="{{route('worldwide.show')}}"
                    class="{{ request()->is('dashboard/worldwide') ? 'font-bold' : '' }}">{{__('dashboard.Worldwide')}}</a>
                    <div class="{{ request()->is('dashboard/worldwide') ? 'w-[80px] h-[2px] bg-black mt-[16px] ' : 'w-0' }}"></div>

                </div>
                <div class="w-[100px]">
                    <a href="{{route('statistics.show')}}"
                    class="{{ request()->is('dashboard/byCountry') ? 'font-bold' : '' }}"
                    >{{__('dashboard.ByCountry')}}</a>
                    <div class="{{ request()->is('dashboard/byCountry') ? 'w-[85px] h-[2px] bg-black mt-[16px] ' : 'w-0' }}"></div>

                </div>
                
                
            </div>
        </aside>
        <div class=" bg-lightGr h-0.5  w-[24rem] mobile:w-[76.3rem]"></div>
        <main class="flex-1 flex-col w-[23rem] mobile:w-[76rem]">
          
                {{ $slot }}
            
        </main>
    </div>

</section>