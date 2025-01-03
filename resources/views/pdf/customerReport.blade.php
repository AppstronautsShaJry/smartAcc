<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Customer Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .table th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h1>Filtered Customer Report</h1>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th> Credit</th>
        <th>Debit</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Total Credit</th>
        <th>Total Debit</th>
        <th>Balance</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach($list as $index => $party)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{$party->totalCredit}}</td>
            <td>{{$party->totalDebit}}</td>
            <td>{{ $party->name }}</td>
            <td>{{ $party->email }}</td>
            <td>{{ $party->phone }}</td>
            <td>₹ {{ number_format($party->totalCredit, 2) }}</td>
            <td>₹ {{ number_format($party->totalDebit, 2) }}</td>
            <td>
                        <span class="{{ $party->balance < 0 ? 'text-red' : 'text-green' }}">
                            ₹ {{ number_format($party->balance, 2) }}
                        </span>
            </td>
            <td>{{ \Carbon\Carbon::parse($party->created_at)->format('d-M-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
