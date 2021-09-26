<?php


namespace App\Modules;


class ClassHelper
{
    /**
     * @param $object
     * @return string
     */
    public static function getBaseFromObject($object): string {
        $class = explode( "\\", get_class($object));
        return end($class);
    }

    /**
     * @param String $moduleString
     * @return Module
     * @throws \Exception
     */
    public static function getModuleByName(String $moduleString): Module
    {
        foreach (config('modules') as $module) {
            /**
             * @var Module $objModule
             */
            $objModule = new $module();

            if (strtolower(self::getBaseFromObject($objModule)) == $moduleString) {
                return $objModule;
            }
        }

        throw new \Exception("Não foi possível encontrar o módulo pelo nome ".$moduleString);
    }
}
