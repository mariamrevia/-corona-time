<x-dashlayout>
    <x-settings :heading="__('dashboard.Heading_C')">
        <form method="GET" action="#" class="mt-[2.5rem]">
            <input type="text" name="search" placeholder="{{__('dashboard.Search_Ph')}}"
                class="w-[15rem] h-[3.5rem] border rounded mt-[0.5rem] bg-transparent font-semibold text-sm"
                value="{{ request('search') }}">
            <input type="hidden" name="sort" value="{{ request('sort') }}" />
            <input type="hidden" name="order" value="{{ request('order') }}" />
        </form>

            <div class="mobile:overflow-y-scroll scrollbar scrollbar-thumb-darkGray scrollbar-thumb-rounded-md scrollbar-w-[6px] flex flex-row relative max-h-[37rem] mt-[2.5rem]  ">
                <table class=" w-full text-xs text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                        <tr class="text-[18px] align-middle">
                            <th scope="col" class=" px-1 py-4 flex flex-row items-center text-[8px] md:text-lg">
                                <div class="flex flex-row">
                                    <h2 class="break-all">{{__('dashboard.Country')}}</h2>
                                    <x-sorting name="name" />
                                </div>
                            </th>
                            <th scope="col" class="px-1 py-2  text-[8px] md:text-lg">
                                <div class="flex flex-row items-center">
                                    <span class="mr-1">{{__('dashboard.New_cases')}}</span>
                                    <x-sorting name="confirmed" />
                                </div>
                            </th>
                            <th scope="col" class="px-1 py-2 text-[8px] md:text-lg">
                                <div class="flex flex-row items-center">
                                    <span class="mr-1">{{__('dashboard.Deaths')}}</span>
                                    <x-sorting name="deaths" />
                                </div>
                            </th>
                            <th scope="col" class="px-1 py-4 flex flex-row text-[8px] md:text-lg">
                                {{__('dashboard.Recovered')}}
                                <x-sorting name="recovered" />
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr class="bg-white text-[20px] border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row text-xl "
                                class="px-1 py-4 white-space: pre-wrap font-medium text-gray-900 text-[12px] md:text-lg  dark:text-white">
                                {{__('dashboard.Total')}}
                            </th>
                            <td class="px-1 py-4 text-sm md:text-lg">
                                {{ number_format($totals['totalConfirmed']) }}
                            </td>
                            <td class="px-1 py-4  text-sm md:text-lg">
                                {{ number_format($totals['totalDeaths']) }}
                            </td>
                            <td class="px-1 py-4 text-sm md:text-lg">
                                {{ number_format($totals['totalRecovered']) }}
                            </td>
                        </tr>
                        @foreach ($statistics as $statistic)
                            <tr class=" text-[20px] whitespace-wrap bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-1 py-4 white-space: pre-wrap font-medium text-gray-900 text-[12px] md:text-lg dark:text-white">
                                     {{$statistic->getTranslation ('country', session('locale', 'en')) }}
                                </th>
                                <td class="px-1 py-4 text-sm md:text-lg">
                                    {{ number_format($statistic->confirmed) }}
                                </td>
                                <td class="px-1 py-4 text-sm md:text-lg">
                                    {{ number_format($statistic->deaths) }}
                                </td>
                                <td class="px-1 py-4 text-sm md:text-lg">
                                    {{ number_format($statistic->recovered) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
              
           
           
    </x-settings>
    <x-slot name="username">
        {{ auth()->user()->username }}
    </x-slot>
</x-dashlayout>


