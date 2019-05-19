<?php

namespace Orm;
use \Exception;

trait ValueTypeChecker{
    public function isNumber($value){
        //try {
            if(!is_numeric($value)) throw new Exception("Value is not numeric");
        /*} catch (Exception $e) {
            // Handle exception here
        }*/
    }
}