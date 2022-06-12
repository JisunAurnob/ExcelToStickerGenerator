<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\ExcelFile;
use App\Models\Excelfiledata;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Input;

class ExcelToPdfController extends Controller
{
    public function home(){
        $excelFiles = ExcelFile::all();
        return view('pages.excelToPdf')->with('exFiles',$excelFiles);
    }
    public function process(Request $request){

        $request->validate([

            'fileName'=>'required|min:4|max:50',
            'excelFile' => 'required|mimes:xlsx|max:50000'
    
           ],
           [
                'fileName.min'=>'File Title should be more than 4 charecters',
                'excelFile.required'=>'Excel File Required',
                'excelFile.mimes'=>'The file must be a file of type: xlsx'
           ]);

        $path = $request->file('excelFile')->store('public/excelFiles');
 
 
        $var = new ExcelFile();
        $var->Excel_Title=$request->fileName;
        $var->Excel_Files= substr($path, 6, 3000);
        // $var->Excel_Files= $path;
        $var->save();
        return redirect()->route('upload');
    }
    public function deleteExcel(Request $request){
        $var = ExcelFile::where('Id',$request->id)->first();
        if(File::exists("storage".$var->Excel_Files)){
        // File::delete(storage_path($request->Excel_Files));
        // File::delete($request->Excel_Files);
        File::delete('storage'.$var->Excel_Files);
        $var->delete();
        }

        return redirect()->route('upload');
    }
    public function PreviewExcel(Request $request){
        $var = ExcelFile::where('Id',$request->id)->first();
        $path = $var->Excel_Files;
        $array = array();
        // if(File::exists("storage".$path)){
        //     $array = Excel::toArray('storage'.$path);
        // }
        // Excel::load(Request::file('storage'.$path), function ($reader) {

        //     foreach ($reader->toArray() as $row) {
        //         $array = $row;
        //     }
        // });
        // $array = Excel::toArray(new UsersImport, 'storage'.$path);
        // Excel::import(new UsersImport($request->id), 'storage'.$path);
        $collection  = Excel::toCollection(new UsersImport($request->id), 'storage'.$path);
        
        $data = Excelfiledata::all();


        // $excelFiles = ExcelFile::all();
        return view('pages.excelPreview')->with('excelData',$collection);
    }
}
