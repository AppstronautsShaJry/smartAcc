<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .text-right {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .font-bold {
            font-weight: bold;
        }
        .text-green {
            color: green;
        }
        .text-red {
            color: red;
        }
    </style>
</head>
<body>

<h1 class="text-center">Transactions Report</h1>
<p>Search Term: {{ $searchTerm }}</p>
<p>Date Filter: {{ ucfirst($dateFilter) }}</p>
@if($dateFilter == 'custom_range')
    <p>From: {{ \Carbon\Carbon::parse($start_date)->format('d-M-Y') }} To: {{ \Carbon\Carbon::parse($end_date)->format('d-M-Y') }}</p>
@endif

<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Party Details</th>
        <th>Items</th>
        <th>Credit</th>
        <th>Debit</th>
        <th>Balance</th>
    </tr>
    </thead>
    <tbody>
    @php
        $totalCredit = 0;
        $totalDebit = 0;
    @endphp
    @foreach($list as $index => $row)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                <div><strong>Name:</strong> {{ $row->party->name }}</div>
                <div><strong>Date:</strong> {{ \Carbon\Carbon::parse($row->date)->format('d-M-Y') }}</div>
                <div><strong>Bill No:</strong> {{ $row->bill_no }} - <strong>Trans:</strong> {{ $row->payment_method }}</div>
            </td>
            <td>
                @php
                    $items = json_decode($row->items, true) ?? [];
                    $itemTotal = 0;
                @endphp
                @foreach($items as $item)
                    <div>
                        <strong>Name:</strong> {{ $item['item_name'] ?? 'N/A' }},
                        <strong>Qty:</strong> {{ $item['item_quantity'] ?? 0 }},
                        <strong>Price:</strong> ₹ {{ number_format($item['item_price'] ?? 0, 2) }}
                    </div>
                    @php
                        $itemTotal += ($item['item_quantity'] ?? 0) * ($item['item_price'] ?? 0);
                    @endphp
                @endforeach
            </td>
            <td class="text-right text-green">
                @if($row->trans_type == 'Receive')
                    @php
                        $totalCredit += $row->amount + $itemTotal;
                    @endphp
                    ₹ {{ number_format($row->amount + $itemTotal, 2) }}
                @endif
            </td>
            <td class="text-right text-red">
                @if($row->trans_type == 'Pay')
                    @php
                        $totalDebit += $row->amount + $itemTotal;
                    @endphp
                    ₹ {{ number_format($row->amount + $itemTotal, 2) }}
                @endif
            </td>
            <td class="text-right">
                ₹ {{ number_format($totalCredit - $totalDebit, 2) }}
            </td>
        </tr>
    @endforeach
    <tr>
        <td colspan="5" class="text-right font-bold">Total Balance</td>
        <td class="text-right font-bold">
            ₹ {{ number_format($totalCredit - $totalDebit, 2) }}
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
