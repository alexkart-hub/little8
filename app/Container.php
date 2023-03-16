<?php

namespace App;

class Container
{
    private $instances = [];
    private static $instance = null;

    public function __construct()
    {
        $this->instances = Instances::get();
    }

    public static function getInstance()
    {
        if (!static::$instance) {
            static::$instance = new self;
        }
        return static::$instance;
    }

    public function get($key)
    {
        if ($this->has($key)) {
            return $this->instances[$key];
        }

        $reflectionClass = new \ReflectionClass($key);
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
                $constructorParams[] = $this->get($attrName);
            } elseif($paramType == 'array') {
                $constructorParams[] = $this->get($attrName);
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