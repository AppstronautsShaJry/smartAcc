<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total-row {
            background-color: #f9f9f9;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h2>Transaction Report</h2>
<p><strong>Date:</strong> {{ now()->format('d-m-Y') }}</p>

<table>
    <thead>
    <tr>
        <th>No</th>
        <th>Party Name</th>
        <th>Date</th>
        <th>Bill No</th>
        <th>Payment Method</th>
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
    @foreach($transactions as $index => $transaction)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ ucfirst($transaction->party->name) }}</td>
            <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d-m-y') }}</td>
            <td>{{ $transaction->bill_no }}</td>
            <td>{{ $transaction->payment_method }}</td>

            @if($transaction->trans_type == 'Pay')
                @php $totalCredit += $transaction->amount @endphp
                <td>{{ number_format($transaction->amount, 2) }}</td>
            @else
                <td></td>
            @endif

            @if($transaction->trans_type == 'Receive')
                @php $totalDebit += $transaction->amount @endphp
                <td>{{ number_format($transaction->amount, 2) }}</td>
            @else
                <td></td>
            @endif

            <td>{{ number_format($totalCredit - $totalDebit, 2) }}</td>
        </tr>
    @endforeach
    <tr class="total-row">
        <td colspan="6" style="text-align: right;">Total Balance</td>
        <td colspan="2">{{ number_format($totalCredit - $totalDebit, 2) }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>
