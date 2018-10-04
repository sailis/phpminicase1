<?php
/**
 * Created by PhpStorm.
 * User: saili
 * Date: 10/2/18
 * Time: 9:06 PM
 */

class html
{
    function array2Html($array, $table = true)
    {
        $out = '';
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                if (!isset($tableHeader)) {
                    $tableHeader =
                        '<th>' .
                        implode('</th><th>', array_keys($value)) .
                        '</th>';
                }
                array_keys($value);
                $out .= '<tr>';
                $out .= array2Html($value, false);
                $out .= '</tr>';
            } else {
                $out .= "<td>$value</td>";
            }
        }

        if ($table) {
            return '<table>' . $tableHeader . $out . '</table>';
        } else {
            return $out;
        }
    }
































































































































}