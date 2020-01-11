<?php
namespace app\types;

class ProductType
{
    private static $types = ['0' => '', '1' => 'Unterglass Größe.1 ','2' => 'Unterglass Größe.2 ', '3' => 'Tablett'];
    
    public static function getTitle($value) {
        return ProductType::$types[$value];
    }
    
    public static function getTypes(){
        return ProductType::$types;
    }
}

