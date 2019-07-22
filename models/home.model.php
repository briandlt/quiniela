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
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            die(json_encode($this->result));
        }

        public function obtenerJornadas(){
            $query = "SELECT * FROM jornadas";
            $this->stmt = $this->conexion->prepare($query);
            $this->stmt->execute();
            $this->result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
            die(json_encode($this->result));
        }

        public function getResults($jornada){
            $query = 'SELECT * FROM vwResultados WHERE idJornada = ?';
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

    }

    // SELECT idJornada, fechaInicio, fechaFin, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo, equipos.equipo FROM jornadas JOIN equipos ON equipos.equipo = jornadas.j1L JOIN equipos ON equipos.equipo = jornadas.j1V JOIN equipos ON equipos.equipo = jornadas.j2L JOIN equipos ON equipos.equipo = jornadas.j2V JOIN equipos ON equipos.equipo = jornadas.j3L JOIN equipos ON equipos.equipo = jornadas.j3V JOIN equipos ON equipos.equipo = jornadas.j4L JOIN equipos ON equipos.equipo = jornadas.j4V JOIN equipos ON equipos.equipo = jornadas.j5L JOIN equipos ON equipos.equipo = jornadas.j5V JOIN equipos ON equipos.equipo = jornadas.j6L JOIN equipos ON equipos.equipo = jornadas.j6V JOIN equipos ON equipos.equipo = jornadas.j7L JOIN equipos ON equipos.equipo = jornadas.j7V JOIN equipos ON equipos.equipo = jornadas.j8L JOIN equipos ON equipos.equipo = jornadas.j8V JOIN equipos ON equipos.equipo = jornadas.j9L JOIN equipos ON equipos.equipo = jornadas.j9V where idJornada = 1;


?>