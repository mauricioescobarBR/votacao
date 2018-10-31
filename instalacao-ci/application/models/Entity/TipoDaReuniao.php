<?php

namespace Entity;


abstract class TipoDaReuniao
{
    const ORDINARIA = "ORDINÁRIA";
    const EXTRAORDINARIA = "EXTRAORDINÁRIA";

    protected static $typeName = [
        self::ORDINARIA => 'Ordinária',
        self::EXTRAORDINARIA => 'Extraordinária'
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
            self::ORDINARIA,
            self::EXTRAORDINARIA
        ];
    }

}


