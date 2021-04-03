<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
@if($msg = session()->get('msg'))
    <li>{{$msg}}</li>
@endif

@if($errors->any())
    @foreach($errors->all() as $err)
        <li>{{$err}}</li>
    @endforeach
@endif
<form action="/order" method ="get">
<button style = "font-size:30px; margin:5% 40%;"> Order Here</button>
</form>
    
    <button style = "font-size:30px; margin:1% 40%;" onclick="log()" >login</button>

    <div id = "lo" style="display:none">
        <form action="/login" method="post">
        @csrf
            <label for="">Username</label><br>
            <input type="text" name = "uname"><br><br>

            <label for="">Password</label><br>
            <input type="password" name="pw"><br><br>

            <input type="submit" value="login">
        </form>
    
    </div>

    <script>
        function log(){
            if(document.getElementById('lo').style.display == "block"){
                document.getElementById('lo').style.display = "none";
            }else{
                document.getElementById('lo').style.display = "block"
            }
        }
    </script>
</body>
</html>