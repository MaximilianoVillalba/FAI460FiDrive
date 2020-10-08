<?php

class control_listados
{
    private $list = '';
    function listFiles($directorio)
    {
        $i = 1;
        if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido
            if ($dir = opendir($directorio)) {
                $this->list .= '<ul class="list-group">'; //Abrimos una lista HTML para mostrar los archivos
                while (($archivo = readdir($dir)) !== false) { //Comenzamos a leer archivo por archivo
                    if ($archivo != '.' && $archivo != '..') { //Omitimos los archivos del sistema . y ..
                        $nuevaRuta = $directorio . $archivo . '/'; //Creamos unaruta con la ruta anterior y el nombre del archivo actual 
                        $this->list .= '<li class="list-group-item">';
                        if (is_dir($nuevaRuta)) { //Si la ruta que creamos es un directorio entonces:
                            $this->list .=
                                '<div class="alert alert-info d-flex justify-content-between">
                                                <h3 class="card-title mt-2">' . $nuevaRuta . '</h3>
                                                <div>
                                                    <label>Seleccion de carpeta</label><input class="mt-1" type="radio" name="carpeta" value="' . $nuevaRuta . '">
                                                    <input type="hidden" value="' . $i . '" name="num_carpeta">
                                                    <a class="ml-2" href="./amarchivo.php?carpeta=' . $nuevaRuta . '">
                                                        <i class="fas fa-upload"></i>
                                                    </a>
                                                </div>
                                            </div>';
                            $this->listFiles($nuevaRuta); //Volvemos a llamar a este metodo para que explore ese directorio.
                        } else {
                            $this->list .=
                                '<div class="d-flex justify-content-between">
                                            <div>
                                                <b>Archivo:</b> ' . $archivo . '
                                            </div>
                                            <div>
                                                <a class="ml-2" href="./eliminararchivo.php?carpeta=' . $nuevaRuta . '">
                                                    <span title="Eliminar"><i class="fas fa-times-circle"></i></span>
                                                </a>
                                                <a class="ml-2" href="./compartirarchivo.php?carpeta=' . $nuevaRuta . '">
                                                    <span title="Compartir"><i class="fas fa-share"></i></span>
                                                </a>
                                                <a class="ml-2" href="./amarchivo.php?carpeta=' . $nuevaRuta . '">
                                                    <span title="Editar"><i class="fas fa-edit"></i></span>
                                                </a>
                                            </div>
                                        </div>'; //simplemente imprimimos el nombre del archivo actual
                        }
                        '</li>';
                    }
                    $i++;
                } //finaliza While
                $this->list .= '</ul>';
                closedir($dir);
            }
        } else {
            $this->list .= 'No Existe el directorio';
        }
        return $this->list;
    }

    function listFilesPersonalized($directorio)
    {
        $i = 1;
        if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido
            if ($dir = opendir($directorio)) {
                $this->list .= '<ul class="list-group">'; //Abrimos una lista HTML para mostrar los archivos
                while (($archivo = readdir($dir)) !== false) { //Comenzamos a leer archivo por archivo
                    if ($archivo != '.' && $archivo != '..') { //Omitimos los archivos del sistema . y ..
                        $nuevaRuta = $directorio . $archivo . '/'; //Creamos unaruta con la ruta anterior y el nombre del archivo actual 
                        $this->list .= '<li class="list-group-item">';
                        if (is_dir($nuevaRuta)) { //Si la ruta que creamos es un directorio entonces:
                            $this->list .=
                                '<div class="alert alert-info d-flex justify-content-between">
                                                <h3 class="card-title mt-2">' . $nuevaRuta . '</h3>
                                            </div>';
                            $this->listFilesPersonalized($nuevaRuta); //Volvemos a llamar a este metodo para que explore ese directorio.
                        } else {
                            $this->list .=
                                '<div class="d-flex justify-content-between">
                                            <div>
                                                <b>Archivo:</b> ' . $archivo . '
                                            </div>
                                            <div>
                                                <a class="ml-2" href="./eliminararchivocompartido.php?carpeta=' . $nuevaRuta . '">
                                                    <span title="Dejar de compartir"><i class="fas fa-handshake-slash"></i></span>
                                                </a>
                                            </div>
                                        </div>'; //simplemente imprimimos el nombre del archivo actual
                        }
                        '</li>';
                    }
                    $i++;
                } //finaliza While
                $this->list .= '</ul>';
                closedir($dir);
            }
        } else {
            $this->list .= 'No Existe el directorio';
        }
        return $this->list;
    }
}
