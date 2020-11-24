echo '
            <div style="border-style: solid; min-height:50px">
                Nombre: ' . $p['nombre'] . ', Descripcion: ' . $p['descripcion'] . '
                <a href="detalle_proyecto.php?id='. $p['organizacion_id'] .'"> <input type="button" class="btn btn-success" style="float:right; margin:3px" value="Detalles"> </a>
            </div>';