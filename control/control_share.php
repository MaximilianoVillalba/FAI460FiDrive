<?php

class control_share
{
    public function compartirArchivo($datos)
    {
    }

    public function devolverDato($dato)
    {
        $url = isset($dato['carpeta']) ? $dato['carpeta'] : '';
        $arregloUrl = explode('/', $url);
        return $arregloUrl[3];
    }

    public function traerId($dato)
    {
        $id = 0;
        if (isset($dato['idarchivocargado'])) {
            $id = $dato['idarchivocargado'];
        }
        return $id;
    }
}