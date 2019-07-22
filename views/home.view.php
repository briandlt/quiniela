<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiniela mamalona</title>
    <link rel="stylesheet" href="./css/bootstrap-grid.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./fonts/fonts.css">
</head>
<body>
    <div class="contImg">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Quiniela Mamalona</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#resultados">Resultados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quiniela">Quiniela</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Puntuación</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Salir</a>
                        </div>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center py-5" id="resultados">
            <p class="h3 col-12 text-center mb-4">Resultados</p>
            <div class="col-12 text-center mb-3" id="selectJ">
                <select name="jornadas" id="jornadas">
                    <option value="1">Jornada 1</option>
                    <option value="2">Jornada 2</option>
                    <option value="3">Jornada 3</option>
                    <option value="4">Jornada 4</option>
                    <option value="5">Jornada 5</option>
                    <option value="6">Jornada 6</option>
                    <option value="7">Jornada 7</option>
                    <option value="8">Jornada 8</option>
                    <option value="9">Jornada 9</option>
                    <option value="10">Jornada 10</option>
                    <option value="11">Jornada 11</option>
                    <option value="12">Jornada 12</option>
                    <option value="13">Jornada 13</option>
                    <option value="14">Jornada 14</option>
                    <option value="15">Jornada 15</option>
                    <option value="16">Jornada 16</option>
                    <option value="17">Jornada 17</option>
                    <option value="18">Jornada 18</option>
                    <option value="19">Jornada 19</option>
                </select>    
            </div>
            <div class="col-12 col-lg-10 text-center">
                <table class="table text-center table-striped table-hover table-responsive-md">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <th><img src="./imgs/equipos/puebla.png" class="j1l" width="22px">vs<img src="./imgs/equipos/tijuana.png" class="j1v" width="22px"></th>
                            <th><img src="./imgs/equipos/atlas.png" class="j2l" width="22px">vs<img src="./imgs/equipos/juarez.png" class="j2v" width="22px"></th>
                            <th><img src="./imgs/equipos/san luis.png" class="j3l" width="22px">vs<img src="./imgs/equipos/pumas.png" class="j3v" width="22px"></th>
                            <th><img src="./imgs/equipos/pachuca.png" class="j4l" width="22px">vs<img src="./imgs/equipos/leon.png" class="j4v" width="22px"></th>
                            <th><img src="./imgs/equipos/america.png" class="j5l" width="22px">vs<img src="./imgs/equipos/monterrey.png" class="j5v" width="22px"></th>
                            <th><img src="./imgs/equipos/necaxa.png" class="j6l" width="22px">vs<img src="./imgs/equipos/cruz azul.png" class="j6v" width="22px"></th>
                            <th><img src="./imgs/equipos/tigres.png" class="j7l" width="22px">vs<img src="./imgs/equipos/morelia.png" class="j7v" width="22px"></th>
                            <th><img src="./imgs/equipos/toluca.png" class="j8l" width="22px">vs<img src="./imgs/equipos/queretaro.png" class="j8v" width="22px"></th>
                            <th><img src="./imgs/equipos/santos.png" class="j9l" width="22px">vs<img src="./imgs/equipos/chivas.png" class="j9v" width="22px"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row formQuiniela text-white p-5" id="quiniela">
            <div class="col-12">
                <p class="h4 text-center mb-3">Jornada <?php echo $jornadaActiva[0][0]; ?></p>
                <form action="" class="bg-white py-4">
                    <div class="row my-3">
                        <div class="col text-center">
                            <p class="text-dark font-weight-bold">Local</p>
                        </div>
                        <div class="col text-center">
                            <p class="text-dark font-weight-bold">Empate</p>
                        </div>
                        <div  class="col text-center">
                            <p class="text-dark font-weight-bold">Visitante</p>
                        </div>
                    </div>
                    <?php 
                        $c=3;
                        for($i=1; $i<10; $i++): 
                    ?>
                        <div class="row my-3 filaPrartido">
                            <div class="col text-center">
                                <input type="radio" name="p<?php echo $i;?>" id="p<?php echo $i;?>">
                                <label for=""><img src="./imgs/equipos/<?php echo $jornadaActiva[0][$c]; ?>.png" width="30px"></label>
                            </div>
                            <div class="col text-center">
                                <input type="radio" name="p<?php echo $i;?>" id="p<?php echo $i;?>">
                            </div>
                            <div  class="col text-center">
                                <label for=""><img src="./imgs/equipos/<?php echo $jornadaActiva[0][$c+1]; ?>.png" width="30px"></label>
                                <input type="radio" name="p<?php echo $i;?>" id="p<?php echo $i;?>">
                            </div>
                        </div>
                    <?php  
                        $c = $c+2;
                        endfor; 
                    ?>
                        <div class="col text-center">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                        </div>
                </form>
            </div>
            <div class="col-12 mt-5">
                <p class="h4 text-center mb-3">Tabla de puntuación</p>
            </div>
        </div>
    </div>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/js.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>
</html>