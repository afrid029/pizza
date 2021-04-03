<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>
<body style = "width:100%;">
@if($errors->any())
    @foreach($errors->all() as $err)
        <li>{{$err}}</li>
    @endforeach
@endif
    <div style = "width:40%; margin-right:5%; float:left">
        <form action="/sendorder" method ="post">
        @csrf
            <label for="">Customer name: </label>
            <input type="text" name = "name"><br><br>

            <label for="">Customer phone: </label>
            <input type="number" name = "phone"><br><br>

            <label for="">Supplier Id:  </label>
            <select  name="sup" id="">
              <option value="" selected disabled hidden>Choose here</option>
                @foreach ($sup as $s)
                    <option value="{{$s->supid}}">{{$s->name}}</option>
                @endforeach
            </select>
            
            <br><br>

            <label for="">Delivery date: </label>
            <input type="date" name = "date"><br><br>

            <label for="">Pizza type: </label>

            <select name="type" id="">
                <option value="" selected disabled hidden>Choose here</option>

                <option value="chicken">Chicken</option>
                <option value="beef">Beef</option>
                <option value="veg">Vegeterian</option>
            </select>
            <br><br>

            <label for="">pizza Size: </label>
             <select name="size" id="">
                <option value="" selected disabled hidden>Choose here</option>

                <option value="large">Large</option>
                <option value="medium">Medium</option>
                <option value="small">Small</option>
            </select>
            <br><br>

            <label for="">Quantity: </label>
            <input type="number" name = "qty"><br><br><br>

            <input type="submit" value = "Order">


        </form>
    </div>
    <div style="width:40%; margin-left:5%; float:right">
        <table style="width:40%;" border ="1px">
           
            <tr>
                <th>Type</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
            @foreach ($pizza as $piz)
                <tr>
                    <td>{{$piz->type}}</td>
                    <td>{{$piz->size}}</td>
                    <td>{{$piz->price}}</td>
                </tr>
            @endforeach
                
            </table>
        
        </table>
    </div>
</body>
</html>