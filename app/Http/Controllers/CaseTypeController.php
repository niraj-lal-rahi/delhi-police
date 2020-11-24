<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CaseType;

class CaseTypeController extends Controller
{
    //

    public function index(){
        return view('case_type.index');
    }

    public function store(Request $request){
        try{

            $create = CaseType::create(
                [
                    'url' => $request->court_url,
                    'court_type' => $request->court_type,
                    'court_complex' => $request->court_type == '1' ? $request->court_complex_code : $request->court_code,
                    'year' => $request->year,
                    'status' => $request->status,
                    'case_type' => $request->case_type,
                    
                ]
            );

            return redirect()->back()->withSuccess("Hold tight we are fetching data. #ID -> ".$create->id);
        }catch(\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
