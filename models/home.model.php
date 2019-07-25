<?php

    class Quiniela extends Conexion{

        private $stmt;

        public function Quiniela(){
            parent::__construct();
        }

        public function obtenerJornada($jornada){
            $query = "SELECT * FROM jornadas WHERE idJornada = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->execute();
            $this->return = $this->stmt->fetchAll(PDO::FETCH_BOTH);

            return $this->return;
        }

        public function getResults($jornada){
            $query = 'SELECT * FROM vwresultados WHERE idJornada = ?';
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            return $this->result;
        }

        public function obtenerResults($jornada){
            $query = 'SELECT * FROM resultados WHERE idJornada = ?';
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            die(json_encode($this->result));
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
            $query = "SELECT * FROM jornadas WHERE fechaInicio <= now() AND fechaFin >= now()";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_BOTH);
            return $this->result;
        }

        public function comprobarQuiniela($jornada, $user){
            $query = "SELECT * FROM vwresultados WHERE idJornada = ? AND nombre = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $jornada, PDO::PARAM_INT);
            $this->stmt->bindParam(2, $user, PDO::PARAM_STR);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            if($this->result){
                die(json_encode($this->result));
            }else{
                die("sin resultados");
            }
        }

        public function guardarQuiniela($user, $jornada, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9){
            $query = "INSERT INTO resultados (idParticipante, idJornada, j1, j2, j3, j4, j5, j6, j7, j8, j9) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
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
            header('Location: ./');
        }

        public function aciertosJornadas($aciertos, $jornada, $idParticipante){
            $query = "UPDATE resultados SET aciertos = ? WHERE idJornada = ? AND idParticipante = ?";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->bindParam(1, $aciertos, PDO::PARAM_INT);
            $this->stmt->bindParam(2, $jornada, PDO::PARAM_INT);
            $this->stmt->bindParam(3, $idParticipante, PDO::PARAM_INT);
            $this->stmt->execute();
        }

        public function tablaAciertos(){
            $query = "";
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

        // 5302 nip portabilidad

    }
