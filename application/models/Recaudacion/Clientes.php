<?php

class Clientes extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function datos_cliente($rut) {
        $query = $this->db->query("SELECT per.rut, per.nombre, per.contacto, per.email, per.telefono, per.movil, per.direccion, 
                                            (select str_descripcion from glob_regiones where id_re = per.region) region,
                                            (select str_descripcion from glob_provincias where id_pr = per.provincia) provincia, 
                                            (select str_descripcion from glob_comunas where id_co = per.comuna) comuna, 
                                            per.codigo_postal, per.estado 
                                        FROM reca_clientes cli, reca_personas per
                                        WHERE per.rut = cli.rut_persona
                                          AND per.rut = '" . $rut . "'
                                        ORDER BY per.nombre ASC");
        
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    
    function listado_clientes($estado, $ejecutivo) {
        if (!$ejecutivo){
            $query = $this->db->query("SELECT per.rut, per.nombre, per.contacto, per.email, per.telefono, per.movil, per.direccion, 
                                            (select str_descripcion from glob_regiones where id_re = per.region) region,
                                            (select str_descripcion from glob_provincias where id_pr = per.provincia) provincia, 
                                            (select str_descripcion from glob_comunas where id_co = per.comuna) comuna, 
                                            per.codigo_postal, per.estado 
                                        FROM reca_clientes cli, reca_personas per
                                        WHERE cli.estado in (" . $estado . ") 
                                        AND per.rut = cli.rut_persona 
                                        AND per.estado in (" . $estado . ") 
                                        ORDER BY per.nombre ASC");
        } else {
        $query = $this->db->query("SELECT per.rut, per.nombre, per.contacto, per.email, per.telefono, per.movil, per.direccion, 
                                          (select str_descripcion from glob_regiones where id_re = per.region) region,
                                          (select str_descripcion from glob_provincias where id_pr = per.provincia) provincia, 
                                          (select str_descripcion from glob_comunas where id_co = per.comuna) comuna, 
                                          per.codigo_postal, per.estado 
                                     FROM reca_clientes cli, reca_personas per, reca_cli_eje clieje
                                    WHERE clieje.rut_ejecutivo = '" . $ejecutivo . "'
                                      AND cli.rut_persona = clieje.rut_cliente
                                      AND cli.estado in (" . $estado . ") 
                                      AND per.rut = cli.rut_persona 
                                      AND per.estado in (" . $estado . ") 
                                    ORDER BY per.nombre ASC");
        }                            
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
        
    function cbo_clientes($estado, $ejecutivo) {
        $result = $this->listado_clientes($estado, $ejecutivo);
        $cuerpo = '';
        if (!$result) {} 
        else {
            foreach ($result as $row) {
                $cuerpo = $cuerpo . '<option value="' . $row->rut . '">' . $row->nombre . '</option>';
            }    
        }
        
        return $cuerpo;
    }
}