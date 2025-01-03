<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .text-right {
            text-align: right;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Transaction Report</h1>
<p><strong>Party:</strong> {{ $party->name }}</p>

{{-- Display Search Term Filter --}}
@if($search)
    <p><strong>Search Term:</strong> {{ $search }}</p>
@endif

{{-- Display Date Filter or Custom Date Range --}}
@if($dateFilter == 'custom_range')
    <p><strong>Date Range:</strong> {{ $start_date }} <strong>to</strong> {{ $end_date }}</p>
@elseif($dateFilter != 'all')
    <p><strong>Date Filter:</strong> {{ ucfirst(str_replace('_', ' ', $dateFilter)) }}</p>
@endif

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Party Details</th>
        <th>Items</th>
        <th>Transaction Type</th>
        <th>Credit (₹)</th>
        <th>Debit (₹)</th>
        <th>Balance (₹)</th>
    </tr>
    </thead>
    <tbody>
    @php
        $totalCredit = 0;
        $totalDebit = 0;
        $balance = 0;
    @endphp
    @foreach($transactions as $index => $transaction)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <div>{{ $transaction->party->name }}</div>
                <div>{{ \Carbon\Carbon::parse($transaction->date)->format('d-M-Y') }}</div>
                <div>B.No: {{ $transaction->bill_no }} - Trans: {{ $transaction->payment_method }}</div>
            </td>
            <td>
                @foreach(json_decode($transaction->items, true) ?? [] as $item)
                    <div>{{ $item['item_quantity'] }} x {{ $item['item_name'] }} @ ₹{{ $item['item_price'] }}</div>
                @endforeach
            </td>
            <td>{{ $transaction->trans_type }}</td>
            <td class="text-right">{{ number_format($transaction->item_total, 2) }}</td>
            <td class="text-right">{{ number_format($transaction->debit_amount, 2) }}</td>
            <td class="text-right">{{ number_format($transaction->balance, 2) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
