<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CaseType;
use App\CaseTypeData;
use App\CaseTypeDataGrid;
use PHPHtmlParser\Dom;
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

    public function serviceRequest(){
        $list = CaseTypeDataGrid::all();

        return view('case_type.data',compact('list'));
    }

    public function  getSecondPage($id){
        $caseTypeData = new CaseTypeData;

        $data = $caseTypeData->where('parent_id',$id)->where('level','1')->first();
        return view('case_type.second-page',compact('data'));
    }

    public function  getThirdPage($parent,$row){


        $caseTypeData = new CaseTypeData;

        $data = $caseTypeData->where('parent_id',$parent)->orderBy('id','asc')->get();

        return view('case_type.third-page',compact('data','row'));
    }

    public function search(){
        return view('case_type.search');
    }



}
