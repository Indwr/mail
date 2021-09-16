<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CsvImportRequest;
use App\Jobs\Admin\SendEmail;
use App\Models\MailCount;
use Illuminate\Http\Request;
use Aspera\Spreadsheet\XLSX\Reader;


class UploadCsvController extends Controller
{

    public function index(){
        $mails = MailCount::paginate(10);
        return view('admin.upload-csv.index',compact('mails'));
    }
    public function upload(){
        return view('admin.upload-csv.upload');
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
        $totalCount = 0;
        foreach ($reader as $key => $row) {
           if($key > 1){
               if($row[1]){
                   $totalCount += 1;
                //    $details = ['email' => 'indersein416@gmail.com','store_name' => 'testing Store','sales_date' => '12-09-2021','count_orders' => '120','discount_by_merchant' => '20','merchant_earnings' => '65'];
                   $details = ['email' => $row[7],'store_name' => $row[6],'sales_date' => $row[8],'count_orders' => $row[2],'discount_by_customer' => $row[4],'merchant_earnings' => $row[5],'total_amount_of_orders' => $row[3]];
                   SendEmail::dispatch($details);
               }
           }
        }
        $mailCount = new MailCount();
        $mailCount->count = $totalCount;
        $mailCount->save();
        return redirect()->back()->with('message','CSV uploaded successfully');
    }
}
