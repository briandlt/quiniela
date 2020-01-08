<?php

    class Quiniela extends Conexion{

        private $stmt;

        public function Quiniela(){
            parent::__construct();
        }

        public function obtenerJornada($jornada){
            $jornadas = 'jornadas';
            $query = "SELECT * FROM $jornadas WHERE idJornada = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->execute();
            $this->return = $this->stmt->fetchAll(PDO::FETCH_BOTH);

            return $this->return;
        }

        public function getResults($jornada, $usuario){
            $query = 'SELECT idJornada FROM jornadas WHERE idJornada = ? AND now() > fechaFin';
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->execute();
            $mostrarJornada = $this->stmt->fetch(PDO::FETCH_ASSOC);
            if(!empty($mostrarJornada)){ // SI YA SE CUMPLIO EL PLAZO PARA SUBIR LA QUINIELA, MOSTRARA LOS RESULTADOS DE CADA PARTICIPANTE.
                $query = 'SELECT * FROM vwresultados WHERE idJornada = ?';
                $this->stmt = $this->conexion->prepare($query);
                $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
                $this->stmt->execute();
                $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

                return $this->result;
            }else{ // DE LO CONTRARIO MOSTRARA SOLO EL RESULTADO DEL USUARIO CON LA SESION ACTIVA
                if($usuario != 'null'){
                    $query = "SELECT * FROM vwresultados WHERE idJornada = ? AND idParticipante = ?";
                    $this->stmt = $this->conexion->prepare($query);
                    $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
                    $this->stmt->bindParam(2, $usuario, PDO::PARAM_STR);
                    $this->stmt->execute();
                    $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $this->result;
                }
            }
        }

        public function getResultsCorrect($jornada){
            $query = 'SELECT * FROM resultados_correctos WHERE idJornada = ?';
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_BOTH);
            die(json_encode($this->result));
        }

        public function obtenerFormJornada(){
            $fechaActual = date('Y-m-d H:i:s');
            $query = "SELECT * FROM jornadas WHERE fechaInicio <= '$fechaActual' AND fechaFin >= '$fechaActual'";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_BOTH);
            return $this->result;
        }

        public function comprobarQuiniela($user){
            $fechaActual = date('Y-m-d H:i:s');
            $query = "SELECT * FROM jornadas WHERE fechaInicio <= '$fechaActual' AND fechaFin >= '$fechaActual'";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->execute();
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            $jornada = $this->result['idJornada'];

            $query = "SELECT * FROM vwresultados WHERE idJornada = ? AND idParticipante = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->bindParam(2, $user, PDO::PARAM_STR);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            if($this->result){
                return(true);
            }else{
                return(false);
            }
        }

        public function guardarQuiniela($user, $jornada, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9){
            $query = "SELECT * FROM vwresultados WHERE idJornada = ? AND idParticipante = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_STR);
            $this->stmt->bindParam(2, $user, PDO::PARAM_STR);
            $this->stmt->execute();
            $resultado = $this->stmt->fetch(PDO::FETCH_ASSOC);
            if(!$resultado){
                $query = "INSERT INTO resultados (idParticipante, idJornada, j1, j2, j3, j4, j5, j6, j7, j8, j9, aciertos) VALUES (?,?,?,?,?,?,?,?,?,?,?,0)";
                $this->stmt = $this->conexion->prepare($query);
                $this->stmt->bindParam(1, $user, PDO::PARAM_INT);
                $this->stmt->bindParam(2, $jornada, PDO::PARAM_INT);
                $this->stmt->bindParam(3, $p1, PDO::PARAM_STR);
                $this->stmt->bindParam(4, $p2, PDO::PARAM_STR);
                $this->stmt->bindParam(5, $p3, PDO::PARAM_STR);
                $this->stmt->bindParam(6, $p4, PDO::PARAM_STR);
                $this->stmt->bindParam(7, $p5, PDO::PARAM_STR);
                $this->stmt->bindParam(8, $p6, PDO::PARAM_STR);
                $this->stmt->bindParam(9, $p7, PDO::PARAM_STR);
                $this->stmt->bindParam(10, $p8, PDO::PARAM_STR);
                $this->stmt->bindParam(11, $p9, PDO::PARAM_STR);
                $this->stmt->execute();
            }
            header('Location: ./index.php?jornada='.$jornada);
        }

        // AGREGA EL RESULTADO CORRECTO DE UN PARTIDO PARA DESPUES OBTENER LOS PARTICIPANTES QUE ACERTARON Y CONTABILIZARLO
        public function contabilizarAciertos($jornada, $partido, $resultado){
            $query = "UPDATE resultados_correctos SET $partido = ? WHERE idJornada = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $resultado, PDO::PARAM_STR);
            $this->stmt->bindParam(2, $jornada, PDO::PARAM_INT);
            $this->stmt->execute();

            $query = "SELECT t1.idParticipante FROM resultados AS t1 JOIN resultados_correctos AS t2 WHERE t1.idJornada = $jornada AND t2.idJornada = $jornada AND t1.$partido=t2.$partido";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->execute();
            $personasAcertaron = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($personasAcertaron as $acerto){
                $query = "UPDATE resultados SET aciertos = aciertos + 1  WHERE idParticipante = ? AND idJornada = ?";
                $this->stmt = $this->conexion->prepare($query);
                $this->stmt->bindParam(1, $acerto['idParticipante'], PDO::PARAM_INT);
                $this->stmt->bindParam(2, $jornada, PDO::PARAM_INT);
                $this->stmt->execute();
            }
            header('Location: ./index.php?jornada='.$jornada);
        }

        public function listarLideres(){
            $query = "SELECT * FROM vwaciertos_totales";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->result;
        }

        public function cambiarPassword($npassword, $username){
            $query = "UPDATE participantes SET passwd = ? WHERE nombre = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $npassword, PDO::PARAM_STR);
            $this->stmt->bindParam(2, $username, PDO::PARAM_STR);
            $this->stmt->execute();
        }

        public function iniciarSesion($user, $pass){
            $query = "SELECT * FROM participantes WHERE userName = ? AND passwd = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $user, PDO::PARAM_STR);
            $this->stmt->bindParam(2, $pass, PDO::PARAM_STR);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            if($this->result){
                $_SESSION['idUser'] = $this->result[0]['idParticipante'];
                $_SESSION['user'] = $this->result[0]['nombre'];
            }else{
            ?>
                <script>
                    alert("usuario o contraseña incorrectos");
                </script>
            <?php
            }
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
        }

    }