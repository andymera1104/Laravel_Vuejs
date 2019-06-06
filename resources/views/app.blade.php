<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>FRONTEND</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-xs-offset-2">
            <div id="app">
               <formulario></formulario>
            </div>
        </div>   
    </div>
</div>    
    <script src="{{asset('js/app.js')}}">  </script>
</body>
</html>