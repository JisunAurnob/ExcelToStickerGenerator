<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\ExcelFile;
use App\Models\Excelfiledata;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Input;

class ExcelToPdfController extends Controller
{
    public function home()
    {
        return view('pages.excelToPdf');
    }
    public function process(Request $request)
    {

        $request->validate(
            [
                'excelFile' => 'required|mimes:xlsx|max:50000'

            ],
            [
                'excelFile.required' => 'Excel File Required',
                'excelFile.mimes' => 'The file must be a file of type: xlsx'
            ]
        );

        $path = $request->file('excelFile');


        $collection  = Excel::toCollection(new UsersImport($request->id), $request->file('excelFile'));
        $pdf = PDF::setOptions([
            // 'isHtml5ParserEnabled' => true,
            // 'isRemoteEnabled' => true,
            'defaultFont' => 'sans-serif'
        ])->setPaper('a4', 'portrait')
            ->loadView('pages.pdfView', ['excelData' => $collection]);

        // return $pdf->download('ConvertedExcel.pdf');
        if ($request->submitPreview == "Convert & Preview") {

            return $pdf->stream('StickerGeneratedByExToSticker.pdf');

        } elseif ($request->submitDownload == "Convert & Download") {

            return $pdf->download('StickerGeneratedByExToSticker.pdf');
            // return $pdf->stream($request->fileName . '.pdf');
        }
    }

    public function PreviewExcel(Request $request)
    {
        $var = ExcelFile::where('Id', $request->id)->first();
        $path = $var->Excel_Files;

        // Excel::import(new UsersImport($request->id), 'storage'.$path);

        $collection  = Excel::toCollection(new UsersImport($request->id), 'storage' . $path);


        // $data = Excelfiledata::all();


        // $excelFiles = ExcelFile::all();
        return view('pages.excelPreview')->with('excelData', $collection)
            ->with('id', $request->id);
    }

    public function pdfdownload(Request $request)
    {
        // $var = ExcelFile::where('Id',$request->id)->first();
        // $path = $var->Excel_Files;
        $collection  = Excel::toCollection(new UsersImport($request->id), $request->file('excelFile'));
        // $info = Excelfiledata::all();
        // $info=Excelfiledata::where('File_Id',$req->id)->first();

        $pdf = PDF::loadview('pages.pdfView', ['excelData' => $collection])
            ->setOptions(['defaultFont' => 'sans-serif'])
            ->setPaper('a4', 'landscape');


        return $pdf->stream('ConvertedExcel.pdf');


        //    return $pdf->download('ConvertedExcel.pdf');

    }
}
