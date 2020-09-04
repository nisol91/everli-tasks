<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class HaversineCoverageController extends Controller
{
    public function haversine()
    {
        // execute python command
        $output = shell_exec("python3 " . getcwd() . "/haversine.py 2>&1");
        return $output;
    }
}
