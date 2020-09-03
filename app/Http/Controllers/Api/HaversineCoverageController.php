<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class HaversineCoverageController extends Controller
{
    public function haversine()
    {


        // dd(getcwd());
        $output = shell_exec("python3 " . getcwd() . "/test.py 2>&1");
        // dd($output);
        return $output;
    }
}
