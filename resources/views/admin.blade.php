<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
@if($msg = session()->get('msg'))
    <li>{{$msg}}</li>
@endif
    <table border = "2px">
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Customer Phone</th>
        <th>Supplier Id</th>
        <th>Delivery date</th>
        <th>Pizza Type</th>
        <th>Pizza Size</th>
        <th>Quantity</th>
        <th>Bill</th>
        <th>Issue</th>
        <th>Cancell</th>
    </tr>

    @foreach ($order as $ord)
        <tr>
            <td>{{$ord->id}}</td>
            <td>{{$ord->cname}}</td>
            <td>{{$ord->cphone}}</td>
            <td>{{$ord->supid}}</td>
            <td>{{$ord->ddate}}</td>
            <td>{{$ord->ptype}}</td>
            <td>{{$ord->psize}}</td>
            <td>{{$ord->qty}}</td>
            <td>{{$ord->bill}}</td>
            <td>
                <a href="/issue/{{$ord->id}}">Issue</a>
            </td>
            <td>
                <a style="color:red" href="/Delete/{{$ord->id}}">cancell order</a>
            </td>
        </tr>
        
    @endforeach
    
    </table>

    <h4>Revenue</h4>

    <form action="/rev" method="post">
    @csrf
        <label for="">Date</label>
        <input type="date" name = "date">

        <input type="submit" value ="search">
    </form>
    <table border = "4px">
    <tr>
        <th>Type</th>
        <th>Size</th>
        <th>Income</th>
        </tr>
@if($ins = session()->get('income'))
@foreach ($ins as $in)
    <tr>
            <td>{{$in->ptype}}</td>
            <td>{{$in->psize}}</td>
            <td>{{$in->sum}}</td>
        </tr>
@endforeach
        
        @endif
    </table>
</body>
</html>