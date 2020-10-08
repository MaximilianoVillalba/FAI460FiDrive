<?php

class control_delete_shared
{
    public function devolverDato($datos)
    {
        $url = isset($datos['carpeta']) ? $datos['carpeta'] : '';
        $arregloUrl = explode('/', $url);
        return $arregloUrl[3];
        
    }
}
