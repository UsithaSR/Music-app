<?php


namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class CMSHelper
{
    public static function randomFileNameCreate($path, $extension)
    {
        $timestamp = round(microtime(true) * 1000);
        $fileName = $timestamp . rand(111111111, 999999999) . '.' . $extension;
        if (file_exists(storage_path($path . $fileName))) {
            return randomFileNameCreate($path, $extension);
        } else {
            return $fileName;
        }
    }

    public static function getStatusText($status)
    {
        $text = "";
        switch ($status) {
            case 0 :
                $text = "Inactive";
                break;
            case 1 :
                $text = "Active";
                break;
            case 2 :
                $text = "Pending";
                break;
            case 3 :
                $text = "Reject";
                break;
            default :
                break;
        }
        return $text;
    }
}
