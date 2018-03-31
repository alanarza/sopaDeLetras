<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Sopa de Letras</title>
</head>
<body>
<div class="container">
    <div class="row ">
        <div class="col-lg-12">
            <div class="card border-primary mb-3" style="margin-top: 10rem;">
              <div class="card-header"><h1>Sopa de Letras</h1></div>
              <div class="card-body">
                <h4 class="card-title">Elejir una sopa de letras y el programa le dira cuantas veces la palabra OIE fue encontrada en 8 sentidos.</h4>
                
                <div class="col-lg-6">
                    <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Seleccionar
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="opcion1">Primera matriz</a>
                        <a class="dropdown-item" href="opcion2">Segunda matriz</a>
                        <a class="dropdown-item" href="opcion3">Tercera matriz</a>
                        <a class="dropdown-item" href="opcion4">Cuarta matriz</a>
                      </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @if(isset($cantidad))
                        Cantidad de oie encontrados: {{ $cantidad }}
                    @endif
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
