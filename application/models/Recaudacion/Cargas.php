<?php

class Cargas extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    public function CrearGrillaCargaExcel($ruta){
        
        $this->load->library('Excel');
        
        try {
            $objPHPExcel = PHPExcel_IOFactory::load($ruta);
         }
        catch(Exception $e){
                $this->resp->success = FALSE;
                $this->resp->msg = 'Error Uploading file';
                echo json_encode($this->resp);
                exit;
        }
        
        $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        
        return $this->grilla_carga($allDataInSheet);
        
	}
        
    function grilla_carga($result) {
        
        $titulo = '<thead>
            <tr>
                <th data-hide="phone">Procesar</th>
                <th data-hide="phone">Fila</th>
                
                <th data-class="expand">Folio</th>
                <th data-hide="phone">Convenio</th>
                <th data-hide="phone">Tipo</th>
                <th data-hide="phone">Cuota</th>
                <th data-hide="phone">Moneda</th>
                
                <th data-hide="phone,tablet">Monto</th>
                <th data-hide="phone,tablet">Monto Pendiente</th>
                <th data-hide="phone,tablet">Fecha Emision</th>
                <th data-hide="phone,tablet">Fecha Vencimiento</th>
                <th data-hide="phone,tablet">Rut Moroso</th>
                
                <th data-hide="phone,tablet">Nombre Moroso</th>
                <th data-hide="phone,tablet,pc">Email</th>
                <th data-hide="phone,tablet,pc">Telefono</th>
                <th data-hide="phone,tablet,pc">Movil</th>
                <th data-hide="phone,tablet,pc">Direccion</th>
                
                <th data-hide="phone,tablet,pc">Region</th>
                <th data-hide="phone,tablet,pc">Provincia</th>
                <th data-hide="phone,tablet,pc">Comuna</th>
                <th data-hide="phone,tablet,pc">Codigo Postal</th>
                
            </tr>
        </thead>';
        
        $cuerpo = '<tbody>';
        if (!$result) {
            $cuerpo = $cuerpo . '<tr>
                                     <td></td>
                                     <td></td>
                                     
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     
                                 </tr>';
        } else {
            $cont = 0;
            foreach ($result as $row) {
                if ($cont > 0){
                    $chk = '<label class="checkbox"><input type="checkbox" checked="checked" name="checkbox-inline" id="chk_grd_' . $cont . '"><i></i></label>';

                    $cuerpo = $cuerpo . '<tr>';
                    
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . $chk . '</td>';
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . $cont . '</td>';
                    
                    $cuerpo = $cuerpo . '<td>' . trim($row['A']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['B']) . '</td>';
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . trim($row['C']) . '</td>';
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . trim($row['D']) . '</td>';
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . trim($row['E']) . '</td>';
                    
                    $cuerpo = $cuerpo . '<td style="text-align:right;">' . trim($row['F']) . '</td>';
                    $cuerpo = $cuerpo . '<td style="text-align:right;">' . trim($row['G']) . '</td>';
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . date_format(date_create_from_format('m-d-y', trim($row['H'])), 'Y-m-d')/*$row['H']*/ . '</td>';
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . date_format(date_create_from_format('m-d-y', trim($row['I'])), 'Y-m-d')/*$row['I']*/ . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['J']) . '</td>';
                    
                    $cuerpo = $cuerpo . '<td>' . trim($row['K']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['L']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['M']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['N']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['O']) . '</td>';
                    
                    $cuerpo = $cuerpo . '<td>' . trim($row['P']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['Q']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['R']) . '</td>';
                    $cuerpo = $cuerpo . '<td>' . trim($row['S']) . '</td>';
                                        
                    $cuerpo = $cuerpo . '</tr>';
                }
                $cont = $cont + 1;
            }
        }
        $cuerpo = $cuerpo . '</tbody>';
        
        return $titulo . $cuerpo;
    }
    
    function grilla_no_cargados($result) {
        
        $titulo = '<thead>
            <tr>
                <th data-class="expand">Fila</th>
                <th data-hide="phone">Error</th>
                <th data-hide="phone">Rut Moroso</th>
                <th data-hide="phone">Nombre Moroso</th>
                <th data-hide="phone">Moneda</th>
                <th data-hide="phone">Tipo</th>
                <th data-hide="phone">Folio</th>
                <th data-hide="phone,tablet">Monto</th>
                <th data-hide="phone,tablet">Monto Pendiente</th>
                <th data-hide="phone,tablet">Fecha Emision</th>
                <th data-hide="phone,tablet">Fecha Vencimiento</th>
                <th data-hide="phone,tablet">Convenio</th>
                <th data-hide="phone,tablet">Cuota</th>
            </tr>
        </thead>';
        
        $cuerpo = '<tbody>';
        if (!$result) {
            $cuerpo = $cuerpo . '<tr>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     
                                 </tr>';
        } else {
            $cont = 0;
            foreach ($result as $row) {
                $cuerpo = $cuerpo . '<tr>';
                                        
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['fila'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">' . $row['Error'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['rut_moroso'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:right;">' . $row['nombre_moroso'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['moneda'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['tipo_documento'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['folio'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:right;">' . $row['monto'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:right;">' . $row['monto_pendiente'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['fecha_emision'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['fecha_vencimiento'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['convenio'] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row['cuota'] . '</td>';
                        
                $cuerpo = $cuerpo . '</tr>';
                
            }
        }
        $cuerpo = $cuerpo . '</tbody>';
        
        return $titulo . $cuerpo;
    }
    
    function insertar_carga($data){
        $this->db->insert('reca_cargas', $data);
        return $this->db->insert_id();
    }
    
    function update_carga($id, $data){
        $this->db->where('id_carga', $id);
        $this->db->update('reca_cargas' ,$data);
    }
    
    function insertar_carga_det($data){
        $this->db->insert('reca_cargas_det', $data);
    }
    
    function validar_carga_det($cliente, $moroso, $folio, $tipo, $cuota, $convenio){
        $query = $this->db->query("SELECT car.id_carga 
                                     FROM reca_cargas_det car 
                                     WHERE car.rut_cliente = '" . $cliente . "'
                                       AND car.rut_moroso = '" . $moroso . "'
                                       AND car.tipo_documento = '" . $tipo . "'
                                       AND car.folio = '" . $folio . "'
                                       AND car.convenio = '" . $convenio . "'
                                       AND car.cuota = " . $cuota);
        if ($query->num_rows() > 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
    function lista_cargas_efectuadas($cliente, $fecIni, $fecFin){
        $query = $this->db->query("SELECT car.id_carga, car.rut_cliente, per.nombre, car.fecha_carga, 
                                          car.fecha_asignacion, car.cantidad, car.usuario, par.val2 estado
                                     FROM reca_cargas car, reca_parametros par, reca_personas per
                                    WHERE car.rut_cliente = '" . $cliente . "' 
                                      AND car.fecha_carga between '" . $fecIni . "' 
                                      AND '" . $fecFin . "'
                                      AND par.tipo1 = 'ESTADOS' AND par.tipo2 = car.estado AND par.estado = 1
                                      AND per.rut = car.rut_cliente");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
    function grilla_cargas_efectuadas($cliente, $fecIni, $fecFin) {
        $result = $this->lista_cargas_efectuadas($cliente, $fecIni, $fecFin);
        
        $titulo = '<thead>
            <tr>
                <th data-class="expand">ID</th>
                <th data-hide="phone">Rut</th>
                <th data-hide="phone">Cliente</th>
                <th data-hide="phone">Fecha Carga</th>
                <th data-hide="phone,tablet">Fecha Asignación</th>
                <th data-hide="phone,tablet">Cantidad Documentos</th>
                <th data-hide="phone,tablet">Usuario Carga</th>
                <th data-hide="phone,tablet">Estado</th>
                
            </tr>
        </thead>';
        
        $cuerpo = '<tbody>';
        if (!$result) {
            $cuerpo = $cuerpo . '<tr>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     <td></td>
                                     
                                 </tr>';
        } else {
            foreach ($result as $row) {
                
                $cuerpo = $cuerpo . '<tr>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->id_carga . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->rut_cliente . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">' . $row->nombre . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_carga . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_asignacion . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->cantidad . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->usuario . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->estado . '</td>';
                
                $cuerpo = $cuerpo . '</tr>';
            }
        }
        $cuerpo = $cuerpo . '</tbody>';
        
        return $titulo . $cuerpo;
    }
}
