<div>
    <div class="bg-white p-4 shadow rounded-lg flex justify-between items-center mb-6">
        {{--        <h1 class="text-xl font-semibold ">Dashboard</h1>--}}
        <x-forms.head header="Supplier"/>
        <!-- Search & Filter Container -->
        <div class="flex items-center gap-4">
            <!-- Search Bar -->
            <x-filter.search/>
            <!-- Filter Button -->
            <x-filter.btn/>
            <x-button.excel>Excel</x-button.excel>
            <x-button.pdf>Pdf</x-button.pdf>
        </div>
    </div>

    <x-filter.drop-section>
        <div class="w-28 border rounded-md md:w-auto">
            <x-input.floating
                label="Start Date"
                type="date"
            />
        </div>
        <div class="w-28 border rounded-md md:w-auto">
            <x-input.floating
                label="End Date"
                type="date"
            />
        </div>
        <div>
            <x-button.filter>Filter</x-button.filter>
        </div>
    </x-filter.drop-section>

    <!-- Transactions Table -->
    <x-table.temp title="Supplier">
        <x-slot name="head">
            {{--                <th class="p-2 text-left">#</th>--}}
            {{--            <x-table.th>#</x-table.th>--}}
            <th class="p-2 text-left" width="5%">#</th>
            <th class="p-2 text-left" width="auto">Supplier Details</th>
            <th class="p-2 text-left" width="15%">Balance</th>
            <th class="p-2 text-left" width="15%">Status</th>
            <th class="p-2 text-center" width="15%">Actions</th>
        </x-slot>

        <tr class="border-t font-lex font-semibold tracking-wider">
            <td class="p-2">1</td>
            <td class="p-2 inline-flex items-center">
                <div class="flex items-center gap-x-3">
                    <div>John Doe</div>
                    <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                        <span class="text-gray-500 font-semibold">Cr:</span>
                        <span class="text-green-500">₹10,000</span>
                    </div>
                    <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                        <span class="text-gray-500 font-semibold">Db :</span>
                        <span class="text-red-500">₹5900</span>
                    </div>
                </div>
            </td>
            <td class="p-2 text-green-500 text-left">₹10,000</td>
            <td class="p-2 text-left">
                <x-badge.success>New</x-badge.success>
            </td>
            <td class="p-2 text-center">
                <span><x-button.edit/></span>
                <span><x-button.delete/></span>
            </td>
        </tr>
        <tr class="border-t font-lex font-semibold tracking-wider">
            <td class="p-2">1</td>
            <td class="p-2 inline-flex items-center">
                <div class="flex items-center gap-x-3">
                    <div>John Doe</div>
                    <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                        <span class="text-gray-500 font-semibold">Cr:</span>
                        <span class="text-green-500">₹10,000</span>
                    </div>
                    <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                        <span class="text-gray-500 font-semibold">Db :</span>
                        <span class="text-red-500">₹5900</span>
                    </div>
                </div>
            </td>
            <td class="p-2 text-green-500">₹10,000</td>
            <td class="p-2">
                <x-badge.info>Pending</x-badge.info>
            </td>
            <td class="p-2 text-center">
                <span><x-button.edit/></span>
                <span><x-button.delete/></span>
            </td>
        </tr>
        <tr class="border-t font-lex font-semibold tracking-wider">
            <td class="p-2">1</td>
            <td class="p-2 inline-flex items-center">
                <div class="flex items-center gap-x-3">
                    <div>John Doe</div>
                    <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                        <span class="text-gray-500 font-semibold">Cr:</span>
                        <span class="text-green-500">₹10,000</span>
                    </div>
                    <div class="inline-flex items-center text-xs pt-1 gap-x-2 ">
                        <span class="text-gray-500 font-semibold">Db :</span>
                        <span class="text-red-500">₹5900</span>
                    </div>
                </div>
            </td>
            <td class="p-2 text-green-500">₹10,000</td>
            <td class="p-2">
                <x-badge.light>Closed</x-badge.light>
            </td>
            <td class="p-2 text-center">
                <span><x-button.edit/></span>
                <span><x-button.delete/></span>
            </td>
        </tr>
    </x-table.temp>

{{--    <x-forms.create :id="$vid">--}}
{{--        <div class="w-full flex gap-5">--}}
{{--            <div class="w-full flex flex-col gap-5">--}}
{{--                <div class="flex gap-5">--}}
{{--                    <x-radio.btn value="1" wire:model="party_type" checked>Customer</x-radio.btn>--}}
{{--                    <x-radio.btn value="2" wire:model="party_type">Supplier</x-radio.btn>--}}
{{--                </div>--}}
{{--                <x-input.floating label="Name" wire:model="name"/>--}}
{{--                @error('name')--}}
{{--                <span class="text-red-600 text-xs font-lex">{{ $message }}</span>--}}
{{--                @enderror--}}
{{--                <x-input.floating label="Phone" wire:model="phone"/>--}}
{{--                <x-input.floating label="Address/Category" wire:model="other"/>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </x-forms.create>--}}

    <div
        class="fixed bottom-0 bg-white p-4 font-lex  shadow rounded-lg mt-4 max-w-max mb-4 flex items-center justify-start gap-x-6">
        <div class="inline-flex items-center ">
            <span class="text-gray-400 font-semibold">Total Balance :</span>
            <span class="font-semibold  text-blue-500 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                    <path d="M7 9l11 0"/>
                </svg>
                24,000
            </span>
        </div>
        <div class="inline-flex items-center">
            <span class="text-gray-400 font-semibold">Total Credit :</span>
            <span class="font-semibold  text-green-500 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                    <path d="M7 9l11 0"/>
                </svg>
                24,000
            </span>
        </div>
        <div class="inline-flex items-center">
            <span class="text-gray-400 font-semibold">Total Debit :</span>
            <span class="font-semibold  text-red-500 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="size-5 icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6"/>
                    <path d="M7 9l11 0"/>
                </svg>
                24,000
            </span>
        </div>
    </div>
    <div class="fixed bottom-1 right-6 max-w-max py-4 ">
        <x-button.add wire:click="save">Add Supplier</x-button.add>
    </div>
</div>
