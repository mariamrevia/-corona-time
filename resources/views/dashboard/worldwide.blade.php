<x-dashlayout>
    <x-settings :heading="__('dashboard.Heading_W')">
        <div class="flex flex-col md:flex-row mobile:w-[76.3rem] mt-10 gap-[1.5rem]">
                <div class="flex  justify-center mobile:w-[24.5rem] mobile:h-[16rem] w-[23rem] h-[12rem] m-0 bg-blueO shadow-stone-400 border rounded-lg ">
                    <div class=" flex flex-col  align-middle mt-[24px] mobile:mt-[40px] w-[100px]">
                        <img src=" /images/Group 1797.png" class="flex justify-center" />
                        <p class=" flex justify-center font-medium mt-[16px]  text-[1rem] text-center {{ App::getLocale() === 'en' ?  'text-[1.2rem] mt-[10px]' : 'text-[12px] font-bold' }}">{{__('dashboard.New_cases')}}</p>
                        <p class=" mobile:text-[2rem] text-[1.5rem]  text-blue  flex justify-center font-extrabold">{{number_format( $totals['totalConfirmed']) }}</p> 
                    </div>
                </div>
                <div class="flex flex-row gap-[1.5rem] desktop:mb-[3.5rem]">
                <div class="flex  justify-center mobile:w-[24.5rem] mobile:h-[16rem] w-[11rem] h-[12rem] m-0 bg-greenO shadow-stone-400 border rounded-lg ">
                    <div class=" flex flex-col  align-middle mt-[31px] mobile:mt-[55px]  w-[100px]">
                        <img src="/images/Group 1799.png" class="flex justify-center" />
                        <p class=" break-normal flex justify-center font-medium mt-[16px] mobile:mt-[24px] text-[1rem] {{ App::getLocale() === 'en' ?  'text-[1.2rem]' : 'text-[12px] font-bold' }}">{{__('dashboard.Recovered')}}</p>
                        <p class="mobile:text-[2rem] text-[1.5rem]  text-green  flex justify-center font-extrabold"> {{number_format( $totals['totalRecovered']) }}</p>
                    </div>
                </div>
           
            <div class="flex  justify-center mobile:w-[24.5rem] mobile:h-[16rem] w-[11rem] h-[12rem] m-0 bg-yellowO shadow-stone-400 border rounded-lg ">
                <div class=" flex flex-col  align-middle mt-[31px] mobile:mt-[40px]  w-[100px]">
                    <img src="/images/Group 1798.png" class="flex justify-center"/>
                    <p class="flex justify-center font-medium mt-[8px] mobile:mt-[24px] text-[1rem] {{ App::getLocale() === 'en' ?  'text-[1.2rem]' : 'text-[12px] font-bold' }}">{{__('dashboard.Deaths')}}</p>
                  <p class=" mobile:text-[2rem] text-[1.5rem]  text-yellow flex justify-center font-extrabold">{{number_format( $totals['totalDeaths']) }}</p>  
                </div>
            </div>
        </div>
        </div>
    </x-settings>
    <x-slot name="username">
        {{ auth()->user()->username }}
    </x-slot>
</x-dashlayout>
