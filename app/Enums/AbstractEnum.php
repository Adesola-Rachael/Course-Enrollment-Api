<?php
namespace App\Enums;
use ReflectionClass;
abstract class AbstractEnum{
    public function values(){
        return (new ReflectionClass(static::class))->getConstants();
    }
}