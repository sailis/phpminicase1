<?php
/**
 * Created by PhpStorm.
 * User: saili
 * Date: 10/2/18
 * Time: 9:56 PM
 */

class recordFactory
{
    public static function create(Array $fieldNames = null, Array $values = null) {
        $record = new record($fieldNames, $values);
        return $record;
}
