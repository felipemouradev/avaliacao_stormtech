<?php
/**
 * Created by PhpStorm.
 * User: felipemoura
 * Date: 14/09/16
 * Time: 00:44
 */

namespace App\Http\Services;

use VerbalExpressions\PHPVerbalExpressions\VerbalExpressions;
use App\Book;

class ServiceBookUrlParser
{
    /***
     * @desc testa e converte os parametros passados para um array
     */
    public function urlRulesParser($params){
        if(is_null($params)) return [];

        $regex = new VerbalExpressions();

        $regex->startOfLine()
            ->then("rules=")
            ->anything()
            ->then("+")
            ->maybe("asc")
            ->maybe("desc")
            ->endOfLine();

        if(!$regex->test($params)) return null;

        $part = explode("rules=",$params);
        $exp = explode("&",$part[1]);
        $rules = array();
        foreach ($exp as $item) {
            list($field,$order) = explode("+",$item);
            $order = $order == is_null($order) ? "asc": $order;

            if(!in_array($field,Book::$fields)) return null;
            $rules[] = ['field'=>$field,'order'=>$order];
        }
        return $rules;
    }
}