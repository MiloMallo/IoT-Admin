<?php
/**
 * Created by PhpStorm.
 * User: mallo
 * Date: 17-3-17
 * Time: 上午11:21
 */

namespace App\Repositories;


class TypeConversionRepository
{
    public function hex2str($hex)
    {
        $string="";
        for($i=0;$i<strlen($hex);$i++){
            $char = dechex(ord($hex[$i]));
            if(hexdec(ord($hex[$i])) <= 15){
                $string = $string.'0'.$char;
            }else{
                $string = $string.$char;
            }
        }
        return strtoupper($string);
    }
    public function str2hex($str)
    {
        $hex="";
        $strLower = strtolower($str);
        //$str = strtolower($str);
        for($i=0;$i<strlen($strLower);$i+=2) {
            /*if($str[$i] >= '0' && $str[$i]<='9'){
                $hex.=chr((($str[$i] >= '0' && $str[$i]<='9')?($str[$i]-'0'):($str[$i]-'a'))*16+($str[$i+1]-'0'));
            }else{
                $hex.=chr(($str[$i]-'a')*16+($str[$i+1]-'a'));
            }*/
            //$hex.=chr((($str[$i]>='0' && $str[$i]<='9')?(1):($str[$i]))*16+(($str[$i+1]>='0' && $str[$i+1]<='9')?(1):($str[$i+1])));//chr(($str[$i]-'a')*16+($str[$i+1]-'a'));
            $hex.=chr((($strLower[$i]>='0' && $strLower[$i]<='9')?($strLower[$i]-'0'):(ord($strLower[$i])-ord('a')+10))*16+(($strLower[$i+1]>='0' && $strLower[$i+1]<='9')?($strLower[$i+1]-'0'):(ord($strLower[$i+1])-ord('a')+10)));
        }
        return $hex;
    }

    public function hexStr2str($hexStr)
    {
        $str = "";
        for($i=0;$i<strlen($hexStr);$i+=2){
            $str.=chr(hexdec($hexStr[$i].$hexStr[$i+1]));
        }
        return $str;
    }
}