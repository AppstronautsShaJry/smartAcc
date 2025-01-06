<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Report.</title>

    <style>
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-family: 'DejaVu Sans', sans-serif;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #f8f9fa;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background-color: #e9ecef;
            font-weight: bold;
            color: #495057;
            text-transform: uppercase;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }

        td[style*="color: green"] {
            color: #28a745 !important;
            font-weight: bold;
        }

        td[style*="color: red"] {
            color: #dc3545 !important;
            font-weight: bold;
        }
    </style>

</head>
<body style="border: 1px solid gray;">
<table style="width: 100%; border-bottom: gray 1px solid; padding: 20px;background-color: #ebf7f7;">
    <tr style="text-align: start" width="10%">
        <td width="10%">
            <img src="{{ public_path('images/ruppee.jpg') }}" alt="" width="" height="25px"
                 style="border-radius: 100%">
        </td>
        <td style="90%"><h1 style="font-size: 30px; padding-right: 40px">Tabasam I Mart </h1></td>
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
<table class="" style="width: 100%; border-bottom:  1px solid gray ">
    <tr class="" style="vertical-align: top">
        <td >
            <div class="" style="line-height: 0.5; padding: 0 20px;">
                <p style="font-size: 20px"> <b>{{$party->name}}</b></p>
                <p>{{$party->email.'   ,   '.$party->phone}}</p>

                <p> {{$party->adrs_1}}</p>
            </div>
        </td>
    </tr>
</table>
<table width="100%">
    <thead>
    <tr>
        <th>S. No.</th>
        <th>Date</th>
        <th>Bill Details</th>
        <th>Items</th>
        <th>Credit</th>
        <th>Debit</th>
        <th>Balance</th>
    </tr>
    </thead>
    <tbody>
    @foreach($transactions as $index => $row)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ \Carbon\Carbon::parse($row->date)->format('d-M-Y') }}</td>
            <td>{{ $row->bill_no . ',' . $row->payment_method }}</td>

            {{-- Display the items --}}
            <td>
                @foreach($row->items as $item)
                    <p>
                        <strong>Name:</strong> {{ $item['item_name'] }} |
                        <strong>Qty:</strong> {{ $item['item_quantity'] }} |
                        <strong>Price:</strong> ₹ {{ $item['item_price'] }}
                    </p>
                @endforeach
            </td>

            {{-- Display Credit --}}
            <td style="color: green;">
                ₹ {{ $row->credit }}
            </td>

            {{-- Display Debit --}}
            <td style="color: red;">
                ₹ {{ $row->debit }}
            </td>

            {{-- Display Balance --}}
            <td>
                ₹ {{ $row->balance }}
            </td>
        </tr>
    @endforeach

    {{-- Totals Row --}}
    <tr>
        <td colspan="4" style="text-align: right;"><strong>Totals:</strong></td>
        <td style="color: green;"><strong>₹ {{ $totalCredit }}</strong></td>
        <td style="color: red;"><strong>₹ {{ $totalDebit }}</strong></td>
        <td><strong>₹ {{ $totalBalance }}</strong></td>
    </tr>
    </tbody>
</table>




</body>
</html>
