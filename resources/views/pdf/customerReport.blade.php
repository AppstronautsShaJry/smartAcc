<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body style="border: solid 1px #ddd;">
<table style="width: 100%; border-bottom: gray 1px solid; padding: 20px;background-color: #ebf7f7;">
    <tr style="text-align: start">
        <td>
            <img src="{{ public_path('images/ruppee.jpg') }}" alt="" width="25px" height="25px"
                 style="border-radius: 100%">
        </td>
        <td><h1 style="font-size: 30px; padding-right: 40px">Tabasam I Mart </h1></td>
    </tr>
    <tr style="">
        <td width="" colspan="2" style="font-size: 10px; padding: 5px 0; color: gray;">Kolavoor Mangalore Contact:
            786006321
        </td>
    </tr>
    <tr style=" color: red; padding-bottom: 5px;">
        <td colspan="2"><strong>CREDIT DEBIT SHORT REPORT OF ALL PERSON</strong></td>
    </tr>
</table>
<table style="width: 90%; margin: 0 auto;">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Name</th>
            <th>Total Credit</th>
            <th>Total Debit</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>
        @php
            // Initialize sums
            $totalCreditSum = 0;
            $totalDebitSum = 0;
            $totalBalanceSum = 0;
        @endphp
        @foreach($list as $index => $party)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($party->created_at)->format('d-M-Y') }}</td>
                <td>{{ $party->name }}</td>
                <td>₹ {{ number_format($party->totalCredit, 2) }}</td>
                <td>₹ {{ number_format($party->totalDebit, 2) }}</td>
                <td>
                        <span class="{{ $party->balance < 0 ? 'text-red' : 'text-green' }}">
                            ₹ {{ number_format($party->balance, 2) }}
                        </span>
                </td>
            </tr>
            @php
                // Accumulate sums
                $totalCreditSum += $party->totalCredit;
                $totalDebitSum += $party->totalDebit;
                $totalBalanceSum += $party->balance;
            @endphp

        @endforeach
        <tr>
            <td colspan="3" style="text-align: right;"><strong>Total:</strong></td>
            <td>₹ {{ number_format($totalCreditSum, 2) }}</td>
            <td>₹ {{ number_format($totalDebitSum, 2) }}</td>
            <td>
        <span class="{{ $totalBalanceSum < 0 ? 'text-red' : 'text-green' }}">
            ₹ {{ number_format($totalBalanceSum, 2) }}
        </span>
            </td>
        </tr>
        </tbody>
    </table>
</table>
</body>
</html>


