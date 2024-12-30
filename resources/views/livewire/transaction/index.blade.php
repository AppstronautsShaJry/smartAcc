<div >
    <x-slot name="header">Transactions</x-slot>
    <div class="flex justify-between py-5 gap-x-5">

        <div class="flex items-center justify-start gap-5">
            <!-- Start Date Filter -->
            <x-input.floating label="Start Date" type="date" wire:model="start_date"/>

            <!-- End Date Filter -->
            <x-input.floating label="End Date" type="date" wire:model="end_date"/>

            <!-- Apply Filter Button -->
            <button class="max-w-max px-4 py-2 bg-blue-600 text-white rounded-md" wire:click="applyDateFilter">Filter</button>
        </div>

        <div class="flex justify-between gap-4">
            <button class="px-4 py-2 bg-green-600 text-white rounded-md font-lex " wire:click="save">New Transaction</button>
            <button class="px-4 py-2 bg-purple-600 text-white rounded-md"
                    wire:click="downloadTransactionReport({{ $party->id ?? 0 }})">
                Download Report
            </button>
        </div>

    </div>
    <x-forms.m-panel>

        <!-- Top Controls --------------------------------------------------------------------------------------------->

        <!-- Caption -------------------------------------------------------------------------------------------------->

        <div class="flex gap-3">
            <x-table.caption caption="Transactions">
                {{$list->count()}}
            </x-table.caption>
        </div>

        <x-table.form>

            <!-- Table Header ----------------------------------------------------------------------------------------->

            <x-slot:table_header name="table_header" class="bg-green-600">
                <x-table.header-serial width="5%"/>

                <x-table.header-text sortIcon="none" left>
                    Party Name
                </x-table.header-text>

                <x-table.header-text sortIcon="none" left>
                    Date
                </x-table.header-text>
                <x-table.header-text sortIcon="none" left>
                    Bill No
                </x-table.header-text>

                <x-table.header-text sortIcon="none" left>
                    Payment Method
                </x-table.header-text>

                <x-table.header-text sortIcon="none" left>
                    Credit
                </x-table.header-text>
                <x-table.header-text sortIcon="none" left>
                    Debit
                </x-table.header-text>
                <x-table.header-text sortIcon="none" left>
                    Balance
                </x-table.header-text>
                <x-table.header-action/>
            </x-slot:table_header>

            <!-- Table Body ------------------------------------------------------------------------------------------->

            <x-slot:table_body name="table_body">

                @php
                    $totalCredit = 0;
                    $totalDebit = 0;
                @endphp
                @foreach($list as $index=>$row)
                    <x-table.row>

                        <x-table.cell-text>{{$index+1}}</x-table.cell-text>

                        <x-table.cell-text left><span class="capitalize">
                               {{$row->party->name}}
                            </span></x-table.cell-text>
                        <x-table.cell-text>{{\Carbon\Carbon::parse($row->date)->format('d-m-y')}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->bill_no}}</x-table.cell-text>
                        <x-table.cell-text>{{$row->payment_method}}</x-table.cell-text>
                        {{--                        <x-table.cell-text>{{$row->desc}}</x-table.cell-text>--}}
                        <x-table.cell-text right class="text-green-600 font-semibold">

                            @if($row->trans_type == 'Receive')
                                @php
                                    $totalCredit += $row->amount;
                                @endphp
                                ₹ {{$row->amount}}
                            @endif
                        </x-table.cell-text>
                        <x-table.cell-text right class="text-red-400 font-semibold">
                            @if($row->trans_type == 'Pay')
                                @php
                                    $totalDebit += $row->amount;
                                @endphp
                                ₹ {{$row->amount}}
                            @endif
                        </x-table.cell-text>
                        {{--                        @php--}}
                        {{--                            $balance = $totalCredit - $totalDebit--}}
                        {{--                        @endphp--}}
                        <x-table.cell-text right>
                            ₹ {{ number_format($totalCredit - $totalDebit, 2) }}</x-table.cell-text>
                        <x-table.cell-action id="{{$row->id}}"/>
                    </x-table.row>
                @endforeach
                <x-table.row class="bg-slate-100">
                    <x-table.cell-text colspan="7" class="text-blue-600 font-semibold">Total Balance</x-table.cell-text>

                    <x-table.cell-text right class="font-semibold">
                        ₹ {{ number_format($totalCredit - $totalDebit,2) }}</x-table.cell-text>
                    <x-table.cell-text>&nbsp;</x-table.cell-text>
                </x-table.row>
            </x-slot:table_body>

        </x-table.form>

        <x-modal.delete/>

    </x-forms.m-panel>

    <x-forms.create :id="$vid">
        <div class="w-full flex gap-5">
            <div class="w-full flex flex-col gap-5">
                <x-input.floating label="Amount" wire:model="amount"/>
                <x-radio.btn value="Pay" wire:model="trans_type" checked>Pay</x-radio.btn>
                <x-radio.btn value="Receive" wire:model="trans_type">Receive</x-radio.btn>
                <x-input.floating label="Payment Method" wire:model="payment_method"/>
                <x-input.floating label="Bill No" wire:model="bill_no"/>
                <x-input.floating label="Description" wire:model="desc"/>
                <x-input.floating type="date" label="Transaction Date" wire:model="date"/>
            </div>
            <div class="w-full flex flex-col gap-5">
                {{--                <x-input.floating label="Active Status" wire:model="active_id"/>--}}
                <x-input.floating label="Transaction Image" wire:model="image" type="file"/>
            </div>
        </div>
    </x-forms.create>

    <script>
        Livewire.on('refreshComponent', () => {
            Livewire.emit('refresh');
        });
    </script>
</div>
