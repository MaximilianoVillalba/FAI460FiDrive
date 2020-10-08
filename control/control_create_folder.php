<?php 

class control_create_folder {
    public function crearCarpeta($datos){
        $text = '';
        $info = isset($datos['carpeta']) ? true : false;
        if($info){
            $dir = $datos['carpeta']."carpeta".$datos['num_carpeta']."/";
        }else{
            $dir = "../archivos/"."carpeta".$datos['num_carpeta']."/";
        }
        if(!file_exists($dir)){
            $text = mkdir($dir, 0777) ? 'Se ha creado correctamente la carpeta' : 'Ha habido un problema';
       }
        return $text;
    }
}
