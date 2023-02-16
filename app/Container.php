<?php

namespace App;

class Container
{
    private $instances = [];

    public function __construct()
    {
        $this->instances = Instances::get();
    }

    public function get($class)
    {
        if ($this->has($class)) {
            return $this->instances[$class];
        }

        $reflectionClass = new \ReflectionClass($class);
        $constructor = $reflectionClass->getConstructor();

        if ($constructor === null) {
            return $reflectionClass->newInstance();
        }

        $attributes = $constructor->getParameters();
        $constructorParams = [];
        foreach ($attributes as $attribute) {
            $attrName = $attribute->getName();
            $paramType = $attribute->getType();
            if ($paramType === null) {
                $constructorParams[] = $attrName;
            } elseif($paramType == 'array') {
                $constructorParams[] = (array)$attrName;
            } else {
                $paramClassName = $paramType->getName();
                $constructorParams[] = $this->get($paramClassName);
            }
        }

        return $reflectionClass->newInstanceArgs($constructorParams);
    }

    private function has($class)
    {
        return array_key_exists($class, $this->instances);
    }
}