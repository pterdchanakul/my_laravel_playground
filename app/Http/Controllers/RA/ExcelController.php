<?php

namespace App\Http\Controllers\RA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use App\Services\Excels\Imports\ExcelCollectionImport;
use App\Services\Excels\Exports\ExcelExport;

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

        // Validate
        $supportExtension = ['xlsx', 'csv'];
        if (!in_array($fileExtension, $supportExtension, true)) {
            abort(403, "Non Support Extension File Name");
        }

        //validate headers
        $formatHeadings = [
            'image_index',
            'atelectasis',
            'cardiomegaly',
            'effusion',
            'infiltration',
            'mass',
            'nodule',
            'pneumonia',
            'pneumothorax',
            'consolidation',
            'edema',
            'emphysema',
            'fibrosis',
            'pleural_thickening',
            'hernia',
            'no_finding'
        ];
        $importHeadings = (new HeadingRowImport)->toArray($excelFile)[0][0];
        if (array_intersect($formatHeadings, $importHeadings) != $formatHeadings) {
            abort(403, 'Non Support Header');
        }

        // $startTime = microtime(true);

        // Add job
        Excel::import(new ExcelCollectionImport, $excelFile);

        // return response
        return response()->json(array("สถานะ" => "ข้อมูลรอการ Process"), 202);
        // $runTime = microtime(true) - $startTime;
        // ini_set('max_execution_time', $normalTimeLimit);
        // return $runTime;
    }

    public function excelExportIndex()
    {
        return view('ra.excel_export');
    }

    public function exportToExcel(Request $request)
    {
        return Excel::download(new ExcelExport($request->order_number), 'excel.xlsx');
    }
}
