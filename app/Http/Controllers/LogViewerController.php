<?php

namespace App\Http\Controllers;

use App\Traits\HandleFiles;
use App\Traits\HandleResponse;
use Illuminate\Http\Request;

class LogViewerController extends Controller
{

    use HandleResponse , HandleFiles;

    public function index()
    {
        return view('log-view');
    }

    public function showLog(Request $request){

        $requestData = $request->all();

        $path = $requestData['path'];
        $cursor = $requestData['cursor']?:0;
        $endOfFile = $requestData['endOfFile'];


        if ($path){

           if ($this->isFileExist($path)){

               if (!$this->isFileEmpty($path)){
                   $lines = array_chunk($this->getLines($path),10);

                   if ($this->isCursorPositionExceed($cursor , count($lines)) || $endOfFile){
                       return $this->successResponse([
                           'lines' => $this->getEndOfFile($lines),
                           'current_cursor' => count($lines) - 1,
                           'last_index' => count($lines) - 1
                       ]);
                   }
                   else{
                       return $this->successResponse([
                           'lines' => $lines[$cursor],
                           'current_cursor' => $cursor,
                           'last_index' => count($lines) - 1
                       ]);
                   }
               }
               else{
                   return $this->errorResponse('File you want to view is empty');
               }


           }
           else{
               return $this->errorResponse('No such file or directory');
           }

        }
        else{
           return $this->errorResponse('Please enter a file path');
        }

    }
}
