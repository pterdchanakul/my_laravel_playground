<?php

namespace App\Http\Controllers\RA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\Excels\Imports\ProductImport;
use App\Services\Excels\Imports\ExcelCollectionImport;

class ExcelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function excelUploadIndex()
    {
        return view('ra.excel_upload');
    }

    public function excelUploadProcess(Request $request)
    {
        // Get default limit
        // $normalTimeLimit = ini_get('max_execution_time');

        // Set new limit
        // ini_set('max_execution_time', 3600);


        $excelFile = $request->file('excelFile');
        $fileExtension = $excelFile->getClientOriginalExtension();
        $supportExtension = ['xlsx', 'csv'];
        if (!in_array($fileExtension, $supportExtension, true)) {
            abort(403, "ไม่สามารถใช้ไฟล์นามสกุล " . $fileExtension . " ได้ อนุญาติเฉพาะไฟล์นามสกุล .xlsx, และ .csv เท่านั้น");
        }

        // $startTime = microtime(true);
        Excel::import(new ExcelCollectionImport, $excelFile);
        return response()->json(array("สถานะ" => "ข้อมูลรอการ Process"), 202);
        // $runTime = microtime(true) - $startTime;
        // ini_set('max_execution_time', $normalTimeLimit);
        // return $runTime;
    }
}
