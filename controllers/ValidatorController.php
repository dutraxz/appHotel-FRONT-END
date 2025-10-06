<?php
class ValidatorController{

    public static function validador_data($data, $labels){
        $pendets = [];
        foreach ($labels as $lbl){
            if (!isset($data[$lbl]) && empty($data[$lbl]) ){
                $pendets[] = $lbl;
            }
      }
      if(!empty($pendets)){
        $pendets = implode(", ", $pendets);
        jsonResponse(['message' => "Erro, falta o campo: " .$pendets], 400);
        exit;
      }
    }
    public static function dataHora($data, $hora) {
        $dataHora = new DateTime($data);    
        $dataHora->setTime($hora, 0, 0);
        return $dataHora->format('Y-m-d H:i:s');
        }
    }
?>