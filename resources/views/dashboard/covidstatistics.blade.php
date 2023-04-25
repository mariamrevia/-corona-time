<x-dashlayout>
    <x-settings heading="Statistics by country">
        <form method="GET" action="#" class="mt-[2.5rem]">
            <input type="text" name="search" placeholder="Search by country"
                class="w-[15rem] h-[3.5rem] border rounded mt-[0.5rem] bg-transparent placeholder-gray font-semibold text-sm"
                value="{{ request('search') }}">
        </form>

        <div
            class=" flex flex-row  relative overflow-x-auto overflow-y-scroll max-h-[37rem] mt-[2.5rem] w-[23rem] mobile:w-[76rem]">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                    <tr>
                        <th scope="col" class="px-6 py-3 flex flex-row ">
                            Country
                            <x-sorting name="name" />
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex flex-row items-center">
                                <span class="mr-2">Deaths</span>
                                <x-sorting name="deaths" />
                            </div>
                        </th>
                        

                        <th scope="col" class="px-6 py-3">
                            <div class="flex flex-row items-center">
                                <span class="mr-2">Recovered</span>
                                <x-sorting name="recovered" />
                            </div>
                        </th>



                        <th scope="col" class="px-6 py-3 flex flex-row">
                            Confirmed
                            <x-sorting name="confirmed" />
                        </th>



                    </tr>

                </thead>
                <tbody>

                    @foreach ($statistics as $statistic)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 white-space: pre-wrap font-medium text-gray-900  whitespace-nowrap dark:text-white">
                                {{ json_decode($statistic->country, true)['en'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ number_format($statistic->deaths) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($statistic->recovered) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($statistic->confirmed) }}
                            </td>
                        </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </x-settings>
</x-dashlayout>
