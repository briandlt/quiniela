<!DOCTYPE html>
<html lang="es">
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
                <a class="navbar-brand" href="./">Quiniela Mamalona</a>
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
                        <a class="nav-link" href="#puntuacion">Puntuación</a>
                    </li>

                    <?php if(isset($_SESSION['user'])): ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userLog" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo ucwords($_SESSION['user']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-center" id="cerrarSesion" href="">Cerrar sesión</a>
                            <a class="nav-link dropdown-toggle text-center px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cambia contraseña
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form class="px-4 py-3" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="">Nuevo password</label>
                                    <input type="password" class="form-control" id="nuevoPass" placeholder="Contraseña" name="npass" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Confirme password<a href=""></a></label>
                                    <input type="password" class="form-control" id="confirmPass" placeholder="Contraseña" name="consfirmPass" required>
                                    <input type="hidden" name="username" value="<?php echo $_SESSION['user']; ?>">
                                </div>
                                <button type="submit" name="login" class="btn btn-primary" id="cambiarPass">Cambiar</button>
                            </form>
                            <div class="dropdown-divider"></div>
                        </div>
                        </div>
                    </li>

                    <?php else: ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form class="px-4 py-3" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="form-group">
                                    <label for="exampleDropdownFormEmail1">Usuario</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormEmail1" placeholder="elcacas12" name="user" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleDropdownFormPassword1">Contraseña<a href=""></a></label>
                                    <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Contraseña" name="pass" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#contraseña">Cambia tu contraseña</a>
                        </div>
                    </li>
                    <?php endif; ?>
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
                    <option class="1" value="1">Jornada 1</a></option>
                    <option value="2">Jornada 2</a></option>
                    <option value="3">Jornada 3</a></option>
                    <option value="4">Jornada 4</a></option>
                    <option value="5">Jornada 5</a></option>
                    <option value="6">Jornada 6</a></option>
                    <option value="7">Jornada 7</a></option>
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
                            <?php
                                $j = 3;
                                for($i=1; $i<10; $i++): 
                            ?>
                            <th class="res<?php echo $i; ?>"><img src="./imgs/equipos/<?php echo $getJornada[0][$j]; ?>.png" class="j<?php echo $i; ?>l local" width="22px">vs<img src="./imgs/equipos/<?php echo $getJornada[0][$j+1]; ?>.png" class="j<?php echo $i; ?>v visitante" width="22px"></th>
                            <?php 
                                $j += 2;
                                endfor; 
                            ?>
                        </tr>
                    </thead>
                    
                    <tbody class="bg-white">
                        <?php 
                            if(!empty($getResultados)):
                            foreach($getResultados as $resultado):
                        ?>
                            <tr>
                                <td class="participante<?php echo $resultado['idParticipante'] ?> py-0 px-2"><img src="./imgs/participantes/<?php echo $resultado['nombre']; ?>.jpg" alt="<?php echo $resultado['nombre']; ?>" height='40px' width='30'></td>
                                <td class='res1'><img src="" alt="<?php echo $resultado['j1'] ?>"></td>
                                <td class='res2'><img src="" alt="<?php echo $resultado['j2'] ?>"></td>
                                <td class='res3'><img src="" alt="<?php echo $resultado['j3'] ?>"></td>
                                <td class='res4'><img src="" alt="<?php echo $resultado['j4'] ?>"></td>
                                <td class='res5'><img src="" alt="<?php echo $resultado['j5'] ?>"></td>
                                <td class='res6'><img src="" alt="<?php echo $resultado['j6'] ?>"></td>
                                <td class='res7'><img src="" alt="<?php echo $resultado['j7'] ?>"></td>
                                <td class='res8'><img src="" alt="<?php echo $resultado['j8'] ?>"></td>
                                <td class='res9'><img src="" alt="<?php echo $resultado['j9'] ?>"></td>
                            </tr>
                        <?php 
                            endforeach;
                            else:
                        ?>
                            <tr>
                                <td colspan="10">No se encontraron resultados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row formQuiniela text-white py-5 justify-content-center" id="puntuacion">
            <div class="col-12 col-lg-10 text-center my-3">
                <p class="h4 text-center mb-3">Tabla de puntuación</p>
                <table class="table bg-white table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">Jugador</th>
                            <th scope="col">No. aciertos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>8</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($jornadaActiva && isset($_SESSION['user'])): ?>
        <div class="row text-dark py-5 justify-content-center" id="quiniela">
            <div class="col-12 col-lg-10 text-center">
                <p class="h4 text-center mb-3 numeroJornada">Jornada <span><?php echo $jornadaActiva[0][0]; ?></span></p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="bg-white py-4">
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
                                <input required value="gana" type="radio" name="p<?php echo $i;?>" id="p<?php echo $i;?>">
                                <label for=""><img src="./imgs/equipos/<?php echo $jornadaActiva[0][$c]; ?>.png" width="30px"></label>
                            </div>
                            <div class="col text-center">
                                <input required value="empata" type="radio" name="p<?php echo $i;?>" id="p<?php echo $i;?>">
                            </div>
                            <div  class="col text-center">
                                <label for=""><img src="./imgs/equipos/<?php echo $jornadaActiva[0][$c+1]; ?>.png" width="30px"></label>
                                <input required value="pierde" type="radio" name="p<?php echo $i;?>" id="p<?php echo $i;?>">
                            </div>
                        </div>
                    <?php  
                        $c = $c+2;
                        endfor; 
                    ?>
                        <div class="col">
                            <input type="hidden" name="jornadaInsert" value="<?php echo $jornadaActiva[0][0]; ?>">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
                        </div>
                        <div class="col text-center">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                        </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
        <footer class="page-footer font-small">
            <div class="text-center py-3 font-weight-bold ">©<?php echo date('Y') ?> Derechos reservados - Brian Esparza
            </div>
        </footer>
    </div>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/js.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>
</html>