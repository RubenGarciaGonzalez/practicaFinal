<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="{{asset('img/fondo/icon.png')}}" >
    <title>AmazonES</title>
</head>
<body style="background:url('{{asset('img/fondo/default.jpg')}}')">
    <h3 class="text-center mt-3">AmazonES</h3>
    <div class="container mt-3 text-center">
    <img src="{{asset('img/articulos/amazon.jpg')}}" width="600px" height="500px">
    <br><br>
    <a href="{{route('articulos.index')}}" class="btn btn-info mr-1">Articulos</a>
    <a href="{{route('categorias.index')}}" class="btn btn-info ml-1">Categorias</a>
    <a href="{{route('vendedores.index')}}" class="btn btn-info ml-1">Vendedores</a>
    </div>
</body>
</html>