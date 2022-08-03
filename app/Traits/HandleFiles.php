<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HandleFiles
{

    use HandleResponse;

    public function isFileExist($path): bool
    {
        return file_exists($path);
    }

    public function isFileEmpty($path) : bool{
        return filesize($path) == 0;
    }

    public function getLines($path): array
    {
        return file($path , FILE_IGNORE_NEW_LINES);
    }

    public function isCursorPositionExceed($cursor , $countOfArray): bool
    {
       return $cursor >= $countOfArray;
    }

    public function getEndOfFile($array){

        return $array[(count($array) - 1)];
    }

}
