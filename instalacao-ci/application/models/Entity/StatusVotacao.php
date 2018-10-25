<?php

namespace Entity;


abstract class StatusVotacao
{
    const FECHADA = "fechada";
    const ABERTA = "aberta";
    const FINALIZADA = "finalizada";

    protected static $typeName = [
        self::FECHADA => 'Fechada',
        self::ABERTA => 'Aberta',
        self::FINALIZADA => 'Finalizada',
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
            self::FECHADA,
            self::ABERTA,
            self::FINALIZADA
        ];
    }

}
