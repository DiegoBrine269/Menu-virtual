<?php
    namespace Models;

    class ActiveRecord {
        //Base de datos
        protected static $db;
        protected static $columnasDB = [];
        protected static $tabla = '';

        //Errores
        protected static $errores = [];

        //Definir conexión a la DB
        public static function setDB($database){
            self::$db = $database;
        }

        //Buscar un registro por su id
        public static function find($id){
            $query = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
            $resultado = self::consultarSQL($query);

            return array_shift($resultado); //Retorna la primera posición
        }

        public static function consultarSQL($query){
            //Consultar BD
            $resultado = self::$db->query($query);

            //Iterar los resultados
            $array = [];
            while($registro = $resultado->fetch_assoc()){
                $array[] = static::crearObjeto($registro);
            }

            //Liberar la memoria
            $resultado->free();    

            //Retornar 
            return $array;
        }

        public static function crearObjeto ($registro){
            $objeto = new static;

            foreach($registro as $key => $value){
                if(property_exists($objeto, $key)){
                    $objeto->$key = $value;
                }
            }

            return $objeto;
        }

        //Inserta un registro a la base de datos
        public function guardar(){
            if(!is_null($this->id)){
                //Actualizar un registro porque el id existe, por lo tanto a está en la BD
                // return $this->actualizar();
            }else{
                //Crear registro nuevo
                return $this->crear();
            }
            return false;
        }

        public function crear(){       
            //Sanitizamos los datos
            $atributos = $this->sanitizarAtributos();
            
            //Insertamos en la base de datos
            $query = "INSERT INTO " . static::$tabla . " ( ";
            $query .=  join(', ', array_keys($atributos));
            $query .= " ) VALUES ( '"; 
            $query .= join("', '", array_values($atributos));
            $query .= "' )";

            self::$db->query($query);

            return true;
        }

        //Identifica y une los atributos de la BD, los convierte a arreglo
        public function atributos(){
            $atributos = [];

            foreach(static::$columnasDB as $columna){
                if($columna === 'id') continue; //Ignoramos el id
                $atributos[$columna] = $this->$columna;
            }

            return $atributos;
        }

        public function sanitizarAtributos(){
            $atributos = $this->atributos();
            $sanitizado = [];

            foreach($atributos as $key => $value){
                $sanitizado[$key] = self::$db->escape_string($value);
            }

            return $sanitizado;
        }

        public static function getErrores(){
            return static::$errores;
        }

        public function validar () {
            static::$errores = [];
            return static::$errores;
        }
    }