<?php

class control_upload
{
    public function subirArchivo($datos)
    {
        $nombre = $datos['name'];
        $nombreArchivo = $_FILES['archivo']['name'];
        $observaciones = $datos['observaciones'];

        $arrayArchivo = explode('.', $nombreArchivo);

        $nombreArchivoObservaciones = $nombre . "_OBS.txt";

        $archivo = $nombre . '.' . $arrayArchivo[1];

        $dir = "../" . $datos['ubicacion'];

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

        if ($todoOK && $observaciones != "") {
            $fArchivoaCrear = fopen($dir . $nombreArchivoObservaciones, "w");
            fwrite($fArchivoaCrear, $observaciones);
            fclose($fArchivoaCrear);
        }

        if ($todoOK)
            $texto = "El archivo se ha cargado correctamente!";
        else
            $texto = $error;

        return $texto;
    }

    public function devolverDato($datos)
    {
        if (isset($datos['carpeta'])) {
            $url = $datos['carpeta'];
            $dato = substr($url, 3);
        } else {
            $dato = 0;
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

    public function action($nameFile){
        if($nameFile == ''){
            $accion = 'alta';
        }else{
            $accion = 'modificar';
        }
        return $accion;
    }
}
