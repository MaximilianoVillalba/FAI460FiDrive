<?php

class control_upload
{
    public function subirArchivo($datos)
    {
        $nombre = $datos['acnombre'];
        $nombreArchivo = $_FILES['archivo']['name'];

        $arrayArchivo = explode('.', $nombreArchivo);

        $archivo = $nombre . '.' . $arrayArchivo[1];

        $dir = "../" . $datos['aclinkacceso'];

        $error = "";
        $todoOK = true;

        if ($_FILES["archivo"]["error"] <= 0) {
            $todoOK = true;
            $error = "";
        } else {
            $todoOK = false;
            $error = "ERROR: no se pudo cargar el archivo de archivo. No se pudo acceder al archivo Temporal";
        }

        if ($todoOK && !copy($_FILES['archivo']['tmp_name'], $dir . $archivo)) {
            $texto = "ERROR: no se pudo cargar el archivo de imagen.";
            $todoOK = false;
        }

        if ($todoOK)
            $texto = true;
        else
            $texto = false;

        return $texto;
    }

    public function devolverDato($datos)
    {
        if (isset($datos['carpeta'])) {
            $url = $datos['carpeta'];
            $dato = substr($url, 3);
        } else {
            $dato = 'archivos/';
        }
        return $dato;
    }

    public function nameFile($datos)
    {
        if (isset($datos['carpeta'])) {
            $url = $datos['carpeta'];
            $arregloUrl = explode('/', $url);
            $dato = $arregloUrl[3];
        } else {
            $dato = '';
        }
        return $dato;
    }

    public function action($datos)
    {
        if (isset($datos['idarchivocargado'])) {
            $accion = 'modificar';
        } else {
            $accion = 'cargar';
        }
        return $accion;
    }
}