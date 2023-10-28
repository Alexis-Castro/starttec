<?php

namespace Model;

use Exception;
use PDO;

class ActiveRecord
{

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];

    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database)
    {
        self::$db = $database;
    }

    // Setear un tipo de Alerta
    public static function setAlerta($tipo, $mensaje)
    {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Obtener las alertas
    public static function getAlertas()
    {
        return static::$alertas;
    }

    // Validación que se hereda en modelos
    public function validar()
    {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria (Active Record)
    public static function consultarSQL($query, $params = [])
    {
        try {
            // Preparar la consulta
            $stmt = self::$db->prepare($query);

            // Ejecutar la consulta con los parámetros proporcionados
            $stmt->execute($params);

            // Obtener los resultados
            $array = [];
            while ($registro = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $array[] = static::crearObjeto($registro);
            }

            // Retornar los resultados
            return $array;
        } catch (Exception $e) {

            $mensaje = "Error del sistema: " . $e->getMessage();
            return $mensaje;
        }
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->quote($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Registros - CRUD
    public function guardar()
    {
        if (!is_null($this->id)) {
            // Actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Obtener todos los Registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id ASC";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = :id";
        $params = [':id' => $id];
        $resultado = self::consultarSQL($query, $params);
        return array_shift($resultado);
    }

    // Obtener Registros con cierta cantidad
    public static function get($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id ASC LIMIT :limite";
        $params = [':limite' => $limite];
        $resultado = self::consultarSQL($query, $params);
        return $resultado;
    }

    // Paginar los registros
    public static function paginar($por_pagina, $offset)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id ASC LIMIT :por_pagina OFFSET :offset";
        $params = [
            ':por_pagina' => $por_pagina,
            ':offset' => $offset
        ];
        $resultado = self::consultarSQL($query, $params);

        return $resultado;
    }

    public static function obtenerImagenesDeProyecto($proyectoId)
    {
        $query = "SELECT i.* FROM proyectos p
              JOIN imagenes_proyecto i ON p.id = i.proyecto_id
              WHERE p.id = :proyecto_id";

        $params = [
            ':proyecto_id' => $proyectoId
        ];

        $resultado = self::consultarSQL($query, $params);

        return $resultado;
    }

    // Busqueda Where con Columna
    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ${columna} = :valor";
        $params = [':valor' => $valor];
        $resultado = self::consultarSQL($query, $params);
        return array_shift($resultado);
    }

    // Busqueda Where con Múltiples opciones
    public static function whereArray($condiciones = [])
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ";
        $params = [];
        $clausulaWhere = "";

        foreach ($condiciones as $key => $value) {
            $parametroKey = ":{$key}";
            $clausulaWhere .= "{$key} = {$parametroKey} AND ";
            $params[$parametroKey] = $value;
        }

        if (!empty($clausulaWhere)) {
            // Eliminamos el 'AND' al final de la cláusula WHERE
            $clausulaWhere = rtrim($clausulaWhere, " AND ");
            $query .= $clausulaWhere;
        } else {
            // Si el arreglo está vacío, devolvemos un conjunto de resultados vacío para evitar un error
            return [];
        }

        $resultado = self::consultarSQL($query, $params);
        return $resultado;
    }


    // Traer un total de registros
    public static function totalRegistros($columna = '', $valor = '')
    {
        $query = "SELECT COUNT(*) FROM " . static::$tabla;
        $params = [];

        if ($columna) {
            $query .= " WHERE ${columna} = :valor";
            $params[':valor'] = $valor;
        }

        $stmt = self::$db->prepare($query);
        $stmt->execute($params);

        $total = $stmt->fetchColumn();

        return $total;
    }

    // Crea un nuevo registro
    public function crear()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = "INSERT INTO " . static::$tabla . " (";
        $query .= join(', ', array_keys($atributos));
        $query .= ") VALUES (";
        $query .= join(", ", array_values($atributos));
        $query .= ")";

        // Resultado de la consulta
        $stmt = self::$db->prepare($query);
        $resultado = $stmt->execute();

        return [
            'resultado' => $resultado,
            'mensaje' => 'Datos registrados correctamente',
            'id' => self::$db->lastInsertId()
        ];
    }

    // Actualizar el registro
    public function actualizar()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key} = {$value}";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= implode(', ', $valores);
        $query .= " WHERE id = :id";
        $query .= " LIMIT 1 ";
        // $params = [':id' => $this->id];

        // debuguear($query);
        // Actualizar BD
        $stmt = self::$db->prepare($query);
        $resultado = $stmt->execute([':id' => $this->id]);

        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = :id LIMIT 1";
        // $params = [':id' => $this->id];
        $stmt = self::$db->prepare($query);
        $resultado = $stmt->execute([':id' => $this->id]);

        return $resultado;
    }
}
