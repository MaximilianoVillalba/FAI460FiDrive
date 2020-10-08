<?php

class control_delete
{
    public function borrarArchivo($datos){
        $url = substr($datos['carpeta'], 0,-1);
        if (unlink($url)) {
            $text = "Se ha eliminado";
        } else {
            $text = "No se ha eliminado";
        }
        return $text;
    }

    public function devolverDato($dato)
    {
        $url = isset($dato['carpeta']) ? $dato['carpeta'] : '';
        $arregloUrl = explode('/', $url);
        return $arregloUrl[3];
    }
}
