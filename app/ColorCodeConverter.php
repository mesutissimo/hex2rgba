<?php

namespace App;

use Exception;

class ColorCodeConverter
{

    public function getResult()
    {
        return $this->result;
    }


    public function setResult($result)
    {
        $this->result = $result;
    }

    function convertHex2RGBA($hexValue, $alphaValue = 1)
    {
        $converted = 'rgba(0, 0, 0, 1)';  // Default dummy value.

        if ($hexValue) {

            // Checking if -hexValue- has '#' and removing.

            if ($hexValue[0] == '#') {
                $hexValue = substr($hexValue, 1);
            }

            // Check digit count and get actions, if hex digit not proper, throw exception

            if (strlen($hexValue) == 6) {

                $arr = str_split($hexValue, 2);
                $converted = 'rgba(' . hexdec($arr[0]) . ', ' . hexdec($arr[1]) . ', ' . hexdec($arr[2]) . ', ' . floatval($alphaValue) . ')';

            } else if (strlen($hexValue) == 3) {

                $arr = str_split($hexValue, 1);
                $converted = 'rgba(' . hexdec(str_repeat($arr[0], 2)) . ', ' . hexdec(str_repeat($arr[1], 2)) . ', ' . hexdec(str_repeat($arr[2], 2)) . ', ' . floatval($alphaValue) . ')';

            } else {
                try {
                    throw new Exception($hexValue . ' is not a valid hexcode entered. It must be 3 or 6 digits.', 99);
                } catch (Exception $e) {
                    return $e->getCode();
                }

            }

        }

        return $converted;

    }

}