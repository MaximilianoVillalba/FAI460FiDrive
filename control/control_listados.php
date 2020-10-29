<?php

class control_listados
{
  private $list = '';
  function listFiles()
  {
    $objetoArchivo = new AbmArchivoCargado();
    $listArchivos = $objetoArchivo->buscar(null);
    $objetoEstadoArchivo = new AbmArchivoCargadoEstado();
    $listEstados = $objetoEstadoArchivo->buscar(null);

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
    $dato['acfechainiciocompartirdist'] = '0000-00-00 00:00:00';
    $listArchivos = $objetoArchivo->buscar($dato);

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
    return $this->list;
  }
}