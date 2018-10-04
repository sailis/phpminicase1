<?php
/**
 * Created by PhpStorm.
 * User: saili
 * Date: 10/2/18
 * Time: 9:06 PM
 */

class html
{
    public static function generateTable($records) {
        $count = 0;
        foreach ($records as $record) {
            if($count == 0) {
                $array = $record->returnArray();
                $fields = array_keys($array);
                $values = array_values($array);
                print_r($fields);
                print_r($values);
            } else {
                $array = $record->returnArray();
                $values = array_values($array);
                print_r($values);
            }
            $count++;
        }
    }
}
































































































































}