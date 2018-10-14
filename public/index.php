<!DOCTYPE html>
<html lang="en">
<head>
    <title> WEB SYSTEMS DEVELOPMENT MINI CASE 1 </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center>
    <h1> Dynamically Creating a Table from CSV File</h1>
</center>


<?php

main::start("example.csv");
class main  {
    static public function start($filename) {
        $records = csv::getRecords($filename);
        $table = html::constructtable($records);
        $printtable = printtable::display($table);



    }
}
class html {
    public static function constructtable ($records)
    {
        $tablestruct = designtable ::addDiv();
        $tablestruct .= designtable::addTable();
        $count = 1;
        $tablestruct .= designtable::addTableHeaders();
        $tablestruct .= designtable::addrow();
        foreach ($records[0] as $fields => $values) {
            $tablestruct .= designtable::addTableHeaderTag($fields);
        }
        $tablestruct .= designtable::endrow();
        $tablestruct .= designtable::endTableHeaders();
        $tablestruct .= designtable::addTableBody();
        foreach ($records as $arrays) {
            if ($count > 0) {
                $tablestruct .= designtable::addrow();
                foreach ($arrays as $fields => $values) {
                    $tablestruct .= designtable::addcolumn($values);
                }
                $tablestruct .= designtable::endrow();
            }
            $count++;
        }
        $tablestruct .= designtable::endTableBody();
        $tablestruct .= designtable::endTable();
        $tablestruct .= designtable::endDiv();
        return $tablestruct;
    }
}
class designtable {
    public static function addDiv($attribute = "<div class=\"container\">"){
        return $attribute;
    }
    public static function endDiv($attribute = "</div>"){
        return $attribute;
    }
    public static function addTable($attribute = "<table class=\"table table-striped\">"){
        return $attribute;
    }
    public static function endTable($attribute = "</table>"){
        return $attribute;
    }
    public static function addTableHeaders($attribute = "<thead>"){
        return $attribute;
    }
    public static function endTableHeaders($attribute = "</thead>"){
        return $attribute;
    }
    public static function addTableBody($attribute = "<tbody>"){
        return $attribute;
    }
    public static function endTableBody($attribute = "</tbody>"){
        return $attribute;
    }
    public static function addTableHeaderTag($fields){
        $attribute = "<th>" .$fields ."</th>";
        return $attribute;
    }
    public static function addrow($attribute = "<tr>"){
        return $attribute;
    }
    public static function endrow($attribute = "</tr>"){
        return $attribute;
    }
    public static function addcolumn($values){
        $attribute = "<td>" . $values . "</td>";
        return $attribute;
    }
}
class printtable
{
    public static function display($tablestruct)
    {
        if($tablestruct != null){
            echo $tablestruct;
        }
        else{
            echo "No records yet. Check input CSV file";
        }
    }
}
        /*public static function tempTable($value)
        {

            foreach ($array as $key => $value) {

            $html . ='<th>';





            }


        }*/


class csv {
    static public function getRecords($filename) {
        $file = fopen($filename,"r");
        $fieldNames = array();
        $count = 0;
        while(! feof($file))
        {
            $record = fgetcsv($file);
            if($count == 0){
                $fieldNames = $record;
            } else {
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }
        fclose($file);
        return $records;
    }
}
class record {
    public function __construct(Array $fieldNames = null, $values = null )
    {
        $record = array_combine($fieldNames, $values);
        foreach ($record as $property => $value) {
            $this -> createProperty($property, $value);
        }
    }
    public function returnArray() {
        $array = (array) $this;
        return $array;
    }
    public function createProperty($name = 'first', $value = 'ein') {
        $this->{$name} = $value;
    }
}
class recordFactory {
    public static function create(Array $fieldNames = null, Array $values = null) {
        $record = new record($fieldNames, $values);
        return $record;
    }
}