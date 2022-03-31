function tiempoTrans($fecha, $idioma)
{

    $fecha = time() - $fecha;
    $fecha = ($fecha < 1) ? 1 : $fecha; 

    if($idioma=='es' ){ 
        $medidas=array( 31536000=> 'año',
            2592000 => 'mes',
            604800 => 'semana',
            86400 => 'día',
            3600 => 'hora',
            60 => 'minuto',
            1 => 'segundo'
        );
    }else{
        $medidas = array(
            31536000 => 'urte',
            2592000 => 'hilabete',
            604800 => 'aste',
            86400 => 'egun',
            3600 => 'ordu',
            60 => 'minutu',
            1 => 'segundu'
        );
    }

    foreach ($medidas as $unidad => $text) {
        if ($fecha < $unidad) continue;
        $numUnidades=floor($fecha / $unidad);
        if($idioma=='es' ){ 
            if ($text=='mes' ) { 
                return 'hace' . ' ' . $numUnidades . ' ' . $text . (($numUnidades> 1) ? 'es' : '');
            } else {
                return $numUnidades . ' ' . $text . (($numUnidades > 1) ? 's' : '');
            }
        }else{
            return 'duela' . ' ' . (($numUnidades > 1) ? $numUnidades . ' ' . $text : $text . ' ' . $numUnidades);
        }
    }
}