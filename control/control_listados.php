<?php

class control_listados
{
  private $list = '';
  function listFiles($directorio)
  {
    $objetoArchivo = new AbmArchivoCargado();
    $listArchivos = $objetoArchivo->buscar(null);

    $i = 1;
    $this->list .= '<div class="card">
                  <div class="card-header d-flex justify-content-center">
                    <h3><strong>Listado de Archivos</strong></h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Nombre Archivo</th>
                          <th colspan="2" style="text-align: center">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>';
    foreach ($listArchivos as $archivo) {
      $this->list .= '<tr>
                          <td>' . $i . '</td>
                          <td>' . $archivo->getAcnombre() . '</td>
                          <td>
                            <div class="d-flex justify-content-center">
                                <a class="ml-2" href="./eliminararchivo.php?idarchivocargado=' . $archivo->getIdarchivocargado() . '">
                                <span title="Eliminar"><i class="fas fa-times-circle"></i></span>
                                </a>
                                <a class="ml-2" href="./compartirarchivo.php?idarchivocargado=' . $archivo->getIdarchivocargado() . '">
                                    <span title="Compartir"><i class="fas fa-share"></i></span>
                                </a>
                                <a class="ml-2" href="./amarchivo.php?idarchivocargado=' . $archivo->getIdarchivocargado() . '">
                                    <span title="Editar"><i class="fas fa-edit"></i></span>
                                    <input type="hidden" name="idarchivocargado" value="' . $archivo->getIdarchivocargado() . '">
                                </a>
                            </div>
                          </td>
                        </tr>';
      $i++;
    }
    $this->list .= '</tbody>
                    </table>
                  </div>
                </div>';
    return $this->list;
  }

  function listFilesPersonalized()
  {
    $objetoArchivo = new AbmArchivoCargado();
    $listArchivos = $objetoArchivo->buscar(null);
    $i = 1;
    $this->list .= '<div class="card">
        <div class="card-header d-flex justify-content-center">
          <h3><strong>Listado de Archivos Compartidos</strong></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>                  
              <tr>
                <th style="width: 10px">#</th>
                <th>Nombre Archivo</th>
                <th colspan="2" style="text-align: center">Acciones</th>
              </tr>
            </thead>
            <tbody>';
    foreach ($listArchivos as $archivo) {
      $this->list .= '<tr>
                              <td>' . $i . '</td>
                              <td>' . $archivo->getAcnombre() . '</td>
                              <td>
                                <div class="d-flex justify-content-center">
                                    <a class="ml-2" href="./eliminararchivocompartido.php?idarchivocargado=' . $archivo->getIdarchivocargado() . '">
                                        <span title="Dejar de compartir"><i class="fas fa-handshake-slash"></i></span>
                                    </a>
                                </div>
                              </td>
                            </tr>';
      $i++;
    }
    $this->list .= '</tbody>
                        </table>
                      </div>
                    </div>';

    /* if (is_dir($directorio)) { //Comprovamos que sea un directorio Valido
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
                                                <a class="ml-2" href="./eliminararchivocompartido.php?idarchivocargado=57">
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
        } */
    return $this->list;
  }

  function listDir($directorio)
  {
    $i = 1;
    if (is_dir($directorio)) {
    }
  }
}