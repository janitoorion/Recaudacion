<?php

class Actividades extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function listado_cliente_moroso($fecha1, $fecha2) {
        $query = $this->db->query("SELECT eve.rut_cliente,
                                   		  per1.nombre cliente,
                                          eve.rut_moroso,
                                          per2.nombre moroso,
                                          eve.convenio,
                                          sum(eve.deuda_actual) deuda_actual
                                     FROM reca_eventos eve, reca_personas per1, reca_personas per2
                                    WHERE eve.estado = 1 
                                      AND eve.fecha_prox_ges between STR_TO_DATE('" . $fecha1 . "', '%d/%m/%Y') 
                                      AND STR_TO_DATE('" . $fecha2 . "', '%d/%m/%Y')
                                      AND per1.estado = 1
                                      AND per1.rut = eve.rut_cliente
                                      AND per2.estado = 1
                                      AND per2.rut = eve.rut_moroso
                                    ORDER BY rut_cliente asc");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
    function grilla_cliente_moroso($fecha1, $fecha2) {
        $result = $this->listado_cliente_moroso($fecha1, $fecha2);
        
        $titulo = '<thead>
            <tr>
                <th data-hide="phone">Rut Cliente</th>
                <th data-class="expand">Cliente</th>
                <th>Rut Moroso</th>
                <th data-hide="phone">Moroso</th>
                <th data-hide="phone,tablet">Convenio</th>
                <th data-hide="phone,tablet">Deuda Actual</th>
                <th data-hide="phone,tablet"></th>
            </tr>
        </thead>';
        
        $cuerpo = '<tbody>';
        if (!$result) {
            $cuerpo = $cuerpo . '<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        } else {
            foreach ($result as $row) {
                
                $btn_buscar = '<button type="button" class="btn btn-xs btn-primary busqueda" href="'. $row->rut_cliente . '/' . $row->rut_moroso . '/' . $row->convenio . '">Documentos</button>';
                
                $cuerpo = $cuerpo . '<tr>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->rut_cliente . '</td>';
                $cuerpo = $cuerpo . '<td>' . $row->cliente . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->rut_moroso . '</td>';
                $cuerpo = $cuerpo . '<td>' . $row->moroso . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->convenio . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:right;">' . number_format($row->deuda_actual, 2, ',', '.') . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $btn_buscar . '</td>';
                $cuerpo = $cuerpo . '</tr>';
            }
        }
        $cuerpo = $cuerpo . '</tbody>';
        
        return $titulo . $cuerpo;
    }
    
}










