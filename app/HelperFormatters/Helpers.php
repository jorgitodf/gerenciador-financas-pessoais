<?php

namespace App\HelperFormatters;

class Helpers
{
    public static function data_inicial()
    {
        $ano = date("Y");
        $mes = date("m");
        return "{$ano}-{$mes}-01";
    }

    public static function data_final()
    {
        $ano = date("Y");
        $mes = date("m");
        return "{$ano}-{$mes}-31";
    }

    public static function ano_inicial()
    {
        $ano = date("Y");
        return "{$ano}-01-01";
    }

    public static function ano_final()
    {
        $ano = date("Y");
        return "{$ano}-12-31";
    }

    public static function formatarMoeda($valor)
    {
        if (!empty($valor)) {
            $valor1 = trim(str_replace('R$ ', '', $valor));
            $number = str_replace(',','.',preg_replace('#[^\d\,]#is','',$valor1));
            return number_format((float) $number, 2, "." ,"");
        }
    }

    public static function formatarMoedaEnPt($valor)
    {
        if (!empty($valor)) {
            return "R$ " . number_format($valor, 2, "," ,".");
        }
    }

    public static function formataData($data) {
        if (!empty($data)) {
            $d = explode("/", $data);
            $data_format = (trim($d[2]."-".$d[1]."-".$d[0]));
            return $data_format;
        }
    }

    public static function formataDataEnPt($data) {
        if (!empty($data)) {
            $d = explode("-", $data);
            $data_format = (trim($d[2]."/".$d[1]."/".$d[0]));
            return $data_format;
        }
    }

    public static function verificaMes() {
        $mesAtual = date("m");
        switch ($mesAtual) {
            case '01':
                $mesAtual = 'Janeiro';
                break;
            case '02':
                $mesAtual = 'Fevereiro';
                break;
            case '03':
                $mesAtual = 'Março';
                break;
            case '04':
                $mesAtual = 'Abril';
                break;
            case '05':
                $mesAtual = 'Maio';
                break;
            case '06':
                $mesAtual = 'Junho';
                break;
            case '07':
                $mesAtual = 'Julho';
                break;
            case '08':
                $mesAtual = 'Agosto';
                break;
            case '09':
                $mesAtual = 'Setembro';
                break;
            case '10':
                $mesAtual = 'Outubro';
                break;
            case '11':
                $mesAtual = 'Novembro';
                break;
            case '12':
                $mesAtual = 'Dezembro';
                break;
        }
        return $mesAtual;
    }
}
