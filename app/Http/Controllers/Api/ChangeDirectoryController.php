<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangeDirectoryController extends Controller
{
    public $root = '/';
    public $separator = '/';
    public $parent = '..';
    public $regex = "/^([A-Za-z\/]*)$/";



    public function cd(Request $request): string
    {

        $data = $request->validate(
            [
                'initPath' => 'required|string|regex:/^([A-Za-z\/]*)$/',
            ]
        );
        $command = $request->input('command');
        $currentPath = $data['initPath'];

        if ($this->regexMatch($currentPath) == 0) {
            return abort(404, 'regex pattern not match');
        }


        if ($command == '') {
            $currentPath = $this->root;
            return $currentPath;
        }

        if ($command == '..') {
            $currentPathArray = explode($this->separator, $currentPath);
            array_pop($currentPathArray);
            $newPath = implode($this->separator, $currentPathArray);

            return $newPath;
        }

        if ($this->patternValidation($command) == false) {
            return abort(404, 'wrong initial pattern');
        }
        $newPathArray = explode($this->separator, $command);
        $newDirectoryName = end($newPathArray);
        $currentPathArray = explode($this->separator, $currentPath);
        $currentPathArray[count($currentPathArray) - 1] = $newDirectoryName;
        $newPath = implode($this->separator, $currentPathArray);

        return $newPath;
    }

    public function regexMatch(string $pathString): int
    {
        $match = preg_match($this->regex, $pathString);
        return $match;
    }
    public function patternValidation($command): bool
    {
        if (substr($command, 0, 3) == '../') {
            return true;
        }
        return false;
    }
}
