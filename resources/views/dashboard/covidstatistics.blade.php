<x-dashlayout>
    <x-settings heading="Statistics by country">
        <form method="GET" action="#" class="mt-[2.5rem]">
            <input type="text" name="search" placeholder="Search by country"
                class="w-[15rem] h-[3.5rem] border rounded mt-[0.5rem] bg-transparent font-semibold text-sm"
                value="{{ request('search') }}">
        </form>

        <div class="flex flex-row relative max-h-[37rem] mt-[2.5rem] w-375">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 ">
                    <tr class="">
                        <th scope="col" class="px-2 flex flex-row mt-[0.8rem] items-start">
                            <div class="flex flex-row">

                                <h2>Country</h2>
                                <x-sorting name="name" />

                            </div>
                        </th>
                        <th scope="col" class="px-2 py-2">
                            <div class="flex flex-row items-center">
                                <span class="mr-1">New Cases</span>
                                <x-sorting name="confirmed" />
                            </div>
                        </th>
                        <th scope="col" class="px-2 py-2 ">
                            <div class="flex flex-row items-center">
                                <span class="mr-1">Deaths</span>
                                <x-sorting name="deaths" />
                            </div>
                        </th>
                        <th scope="col" class="px-2 py-3 flex flex-row">
                            Recovered
                            <x-sorting name="recovered" />
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-2 py-4 white-space: pre-wrap font-medium text-gray-900  whitespace-nowrap dark:text-white">
                            Total
                        </th>
                        <td class="px-2 py-4">
                            {{ number_format($totals['totalConfirmed']) }}
                        </td>
                        <td class="px-2 py-4">
                            {{ number_format($totals['totalDeaths']) }}
                        </td>
                        <td class="px-2 py-4">
                            {{ number_format($totals['totalRecovered']) }}
                        </td>
                    </tr>
                    @foreach ($statistics as $statistic)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-2 py-4 white-space: pre-wrap font-medium text-gray-900  whitespace-nowrap dark:text-white">
                                {{ json_decode($statistic->country, true)['en'] }}
                            </th>
                            <td class="px-2 py-4">
                                {{ number_format($statistic->confirmed) }}
                            </td>
                            <td class="px-2 py-4">
                                {{ number_format($statistic->deaths) }}
                            </td>
                            <td class="px-2 py-4">
                                {{ number_format($statistic->recovered) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-settings>
</x-dashlayout>
