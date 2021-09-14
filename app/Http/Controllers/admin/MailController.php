<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CsvImportRequest;
use Illuminate\Http\Request;
use Aspera\Spreadsheet\XLSX\Reader;


class MailController extends Controller
{
    public function index(){
        return view('admin.mail.index');
    }

    public function uploadCsv(CsvImportRequest $request){

        $files = $request->file('file');
        $path = $files->store('xls', 'public');
        $fileName = storage_path('app/public/'.$path);
        if(!is_readable($fileName)) {
            echo "<h1>This file not readable please check and try again later..</h1>";
            dd();
        }
        $reader = new Reader();
        $reader->open($fileName);
        echo "<pre>";
        foreach ($reader as $row) {
            print_r($row);
        }
        dd($reader);

        // $data = Excel::load($path)->get();
        // echo "<pre>";
        print_r($reader);
    }
}
