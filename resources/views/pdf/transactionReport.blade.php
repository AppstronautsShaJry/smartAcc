<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 10px;
            margin: 0;
            padding: 0;
            background-color: #f9fafc;
        }

        .container {
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            border-radius: 50%;
            margin-right: 10px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .header p {
            font-size: 10px;
            color: #777;
        }

        .sub-header {
            color: #dc3545;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 20px;
        }

        .party-details {
            padding: 10px;
            background-color: #ebf7f7;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .party-details p {
            margin: 3px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 10px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9fafc;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .totals-row {
            font-weight: bold;
            background-color: #f1f3f5;
        }

        .text-red {
            color: #dc3545;
        }

        .text-green {
            color: #28a745;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{ public_path('images/ruppee.jpg') }}" alt="Logo" height="50">
        <h1>Tabasam I Mart</h1>
    </div>
    <p>Kolavoor, Mangalore | Contact: 786006321</p>

    <div class="sub-header">
        CREDIT DEBIT SHORT REPORT OF ALL PERSON
    </div>

    <div class="party-details">
        <p><strong>{{$party->name}}</strong></p>
        <p>{{$party->email}} , {{$party->phone}}</p>
        <p>{{$party->adrs_1}}</p>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Bill Details</th>
            <th>Item Name</th>
            <th>Item Quantity</th>
            <th>Item Price</th>
            <th>Debit</th>
            <th>Credit</th>
            <th>Balance</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transactions as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ \Carbon\Carbon::parse($row->date)->format('d-M-Y') }}</td>
                <td>{{ $row->bill_no }}, {{ $row->payment_method }}</td>
                <td>
                    @foreach($row->items as $item)
                        <p>{{ $item['item_name'] }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach($row->items as $item)
                        <p>{{ $item['item_quantity'] }}</p>
                    @endforeach
                </td>
                <td>
                    @foreach($row->items as $item)
                        <p>₹ {{ $item['item_price'] }}</p>
                    @endforeach
                </td>
                <td class="text-red">₹ {{ $row->debit }}</td>
                <td class="text-green">₹ {{ $row->credit }}</td>
                <td>₹ {{ $row->balance }}</td>
            </tr>
        @endforeach

        <tr class="totals-row">
            <td colspan="6" style="text-align: right;">Totals:</td>
            <td class="text-red">₹ {{ $totalDebit }}</td>
            <td class="text-green">₹ {{ $totalCredit }}</td>
            <td>₹ {{ $totalBalance }}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
