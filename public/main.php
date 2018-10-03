<?php
/**
 * Created by PhpStorm.
 * User: saili
 * Date: 10/2/18
 * Time: 9:55 PM
 */

class main
{
    static public function start($filename) {
        $records = csv::getRecords($filename);
        $table = html::generateTable($records);
}