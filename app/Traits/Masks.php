<?php

namespace App\Traits;

trait Masks
{
    public static function formataCpfCnpj($campo, $formatado = true)
    {

        $codigoLimpo = preg_replace("[' '-./ t]",'',$campo);

        $tamanho = (strlen($codigoLimpo) -2);

        if ($tamanho != 9 && $tamanho != 12){
            return false;
        }

        if ($formatado){

            $mascara = ($tamanho == 9) ? '###.###.###-##' : '##.###.###/####-##';

            $indice = -1;
            for ($i=0; $i < strlen($mascara); $i++) {
                if ($mascara[$i]=='#') $mascara[$i] = $codigoLimpo[++$indice];
            }

            $retorno = $mascara;

        }else{

            $retorno = $codigoLimpo;
        }

        return $retorno;

    }
}
