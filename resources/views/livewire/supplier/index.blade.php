<div>
    <x-slot name="header">Supplier</x-slot>
    <div class="flex justify-end py-5">
        <button class="px-4 py-2 bg-green-600 text-white rounded-md font-lex " wire:click="save">New</button>
    </div>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <!-- Caption -------------------------------------------------------------------------------------------------->

        <div class="flex gap-3">
            <x-table.caption caption="Supplier">
                {{$list->count()}}
            </x-table.caption>
        </div>

        <x-table.form>

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="5%"/>

                <x-table.header-text sortIcon="none" left>
                    Name
                </x-table.header-text>

                <x-table.header-text sortIcon="none" left>
                    Balance
                </x-table.header-text>

                <x-table.header-action/>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">

                @foreach($list as $index=>$row)
                    <x-table.row>

                        <x-table.cell-text><a href="{{route('transactions.index',[$row->id])}}">{{$index+1}}</a></x-table.cell-text>

                        <x-table.cell-text left><span class="capitalize">{{$row->name}}</span></x-table.cell-text>

                        <x-table.cell-text>

                             <span class="font-semibold @if($row->balance < 0) text-red-600 @else text-green-600 @endif">
                             ₹ {{ number_format($row->balance, 2) }}
                                </span>

                        </x-table.cell-text>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach

            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

    </x-forms.m-panel>

    <x-forms.create :id="$vid">
        <div class="w-full flex gap-5">
            <div class="w-full flex flex-col gap-5">
                <div class="flex gap-5">
                    <x-radio.btn value="1" wire:model="party_type" checked>Customer</x-radio.btn>
                    <x-radio.btn value="2" wire:model="party_type">Supplier</x-radio.btn>
                </div>
                <x-input.floating label="Name" wire:model="name"/>
                <x-input.floating label="Email" wire:model="email"/>
                <x-input.floating label="Phone" wire:model="phone"/>
            </div>
            <div class="w-full flex flex-col gap-5">
                <x-input.floating label="Flat/Building No" wire:model="adrs_1"/>
                <x-input.floating label="Area" wire:model="adrs_2"/>
                <x-input.floating label="City" wire:model="city"/>
                <x-input.floating label="State" wire:model="state"/>
                <x-input.floating label="Pincode" wire:model="pincode"/>
{{--                <x-input.floating label="Country" wire:model="country"/>--}}
            </div>
        </div>
    </x-forms.create>

</div>
