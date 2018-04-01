<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <h4 class="card-title">Elige una matriz y el programa le dirá cuantas veces la palabra OIE fue encontrada en 8 sentidos.</h4>

                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card bg-secondary">
                          <div class="card-body">
                            <h5 class="card-title">Primera matriz</h5>
                            <p class="card-text">3x3 - OIE IIX EXE</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card bg-secondary">
                          <div class="card-body">
                            <h5 class="card-title">Segunda matriz</h5>
                            <p class="card-text">1x10 - EIOIEIOEIO</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card bg-secondary">
                          <div class="card-body">
                            <h5 class="card-title">Tercera matriz</h5>
                            <p class="card-text">5x5 - EAEAE AIIIA EIOIE AIIIA EAEAE</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card bg-secondary">
                          <div class="card-body">
                            <h5 class="card-title">Cuarta matriz</h5>
                            <p class="card-text">7x2 - OX IO EX II OX IE EX</p>
                            
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    <div class="card" style="margin-top: 1rem;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Seleccionar
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" id="1" onclick="buscar(this)">Primera matriz</a>
                                        <a class="dropdown-item" id="2" onclick="buscar(this)">Segunda matriz</a>
                                        <a class="dropdown-item" id="3" onclick="buscar(this)">Tercera matriz</a>
                                        <a class="dropdown-item" id="4" onclick="buscar(this)">Cuarta matriz</a>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div id="miDiv" class="col-lg-9 d-none">
                                        <h3>Cantidad de OIE encontrados: <b id="resultado"></b></h3> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
 
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script>
        function buscar(opcion){
         
            var matriz = 'opcion=' + opcion.id
        
            $.ajax({
                type: 'POST',
                url: 'opcion',
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: matriz,
                success: function(cantidad){  
                $("#resultado").html(cantidad)
                $("#miDiv").removeClass('d-none');
                }
            });
        }
    </script>
</body>
</html>