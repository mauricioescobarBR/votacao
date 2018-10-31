<?php

namespace Entity;


abstract class Turno
{
    const PRIMEIRO = "PRIMEIRO";
    const SEGUNDO = "SEGUNDO";

    protected static $typeName = [
        self::PRIMEIRO => 'Primeiro',
        self::SEGUNDO => 'Segundo'
    ];

    /**
     * @param  string $typeShortName
     * @return string
     */
    public static function getTypeName($typeShortName)
    {
        if (!isset(static::$typeName[$typeShortName])) {
            return "Unknown type ($typeShortName)";
        }

        return static::$typeName[$typeShortName];
    }

    /**
     * @return array<string>
     */
    public static function getAvailableTypes()
    {
        return [
            self::PRIMEIRO,
            self::SEGUNDO
        ];
    }

}

