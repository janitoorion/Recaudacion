<?php

class Documentos extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function listado_documentos($cliente, $moroso, $convenio) {
        $query = $this->db->query("SELECT doc.folio, doc.rut_cliente, doc.rut_moroso, doc.convenio, 
                                          doc.moneda, doc.deuda_actual, doc.cuota, doc.ejecutivo, 
                                          DATE_FORMAT(doc.fecha_ini_ges, '%d/%m/%y') fecha_ini_ges,
                                          DATE_FORMAT(doc.fecha_prox_ges, '%d/%m/%y') fecha_prox_ges, 
                                          par1.val1 tipo_documento, doc.id
                                     FROM reca_documentos doc, reca_parametros par1
                                    where doc.rut_cliente = '". $cliente ."' and doc.rut_moroso = '". $moroso ."' 
                                      and doc.convenio = ". $convenio ." and doc.estado = 1 and doc.deuda_actual > 0
                                      and par1.estado = 1 
                                      and par1.tipo1 = 'DOCUMENTO' 
                                      and par1.tipo2 = doc.tipo_documento");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
    function grilla_documentos($cliente, $moroso, $convenio) {
        $result = $this->listado_documentos($cliente, $moroso, $convenio);
        
        $titulo = '<thead>
            <tr>
                <th data-class="expand">Folio</th>
                <th data-hide="phone">Tipo</th>
                <th data-hide="phone">Moneda</th>
                <th data-hide="phone">Deuda Actual</th>
                <th data-hide="phone,tablet">Cuota</th>
                <th data-hide="phone,tablet">Activación</th>
                <th data-hide="phone,tablet">Proxima Evaluación</th>
                <th data-hide="phone,tablet">Marcar</th>
                
                <th data-hide="phone,tablet,pc">1</th>
                <th data-hide="phone,tablet,pc">2</th>
                <th data-hide="phone,tablet,pc">3</th>
                <th data-hide="phone,tablet,pc">4</th>
                <th data-hide="phone,tablet,pc">5</th>
                <th data-hide="phone,tablet,pc">6</th>
                <th data-hide="phone,tablet,pc">7</th>
                <th data-hide="phone,tablet,pc">8</th>
                <th data-hide="phone,tablet,pc">9</th>
                <th data-hide="phone,tablet,pc">10</th>
                <th data-hide="phone,tablet,pc">11</th>
                <th data-hide="phone,tablet,pc">12</th>
                <th data-hide="phone,tablet,pc">13</th>
                <th data-hide="phone,tablet,pc">14</th>
                <th data-hide="phone,tablet,pc">15</th>
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
                                     <td></td>
                                     <td></td>
                                 </tr>';
        } else {
            foreach ($result as $row) {
                
                $chk = '<label class="checkbox"><input type="checkbox" name="checkbox-inline" id="chk_grd_' . $row->id . '"><i></i></label>';

                $cuerpo = $cuerpo . '<tr>';
                $cuerpo = $cuerpo . '<td>' . $row->folio . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->tipo_documento . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->moneda . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:right;">' . number_format($row->deuda_actual, 2, ',', '.') . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->cuota . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_ini_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $chk . '</td>';
                
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">' . $row->fecha_prox_ges . '</td>';
                
                $cuerpo = $cuerpo . '</tr>';
            }
        }
        $cuerpo = $cuerpo . '</tbody>';
        
        return $titulo . $cuerpo;
    }
    
}
