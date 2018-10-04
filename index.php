
<?php
/**
 * Created by PhpStorm.
 * User: kwilliams
 * Date: 10/1/18
 * Time: 9:23 PM
 */



 main::start("example.csv");
class main
{
    static public function start($filename)
    {
        $records = csv::getRecords($filename);
        $table = html::generateTable($records);
    }
}