<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function index(){
        try{

            $list = \App\CourtOrders::where('data',null)->get();
            return response()->json([
                'status' => count($list) ? true : false,
                'data' => $list
            ],200);
        }catch(\Exception $exception){
            return response()->json([
                'status' => false,
                'data' => $list
            ],500);
        }
    }


    public function store(Request $request){

        try{

            $id = $request->id;
            $data = $request->data;

            $update = \App\CourtOrders::find($id);

            $update->data = $data;

            $update->save();


            return response()->json(['status' =>  true , 'data' => $request->all()],200);

        }catch(\Exception $exception){
            return response()->json([
                'status' => false,
                'data' => $exception->getMessage()
            ],500);
        }

    }


    public function storePdfText(Request $request){
        try{
            \App\PdfContent::create(
                [
                    'file_name' => $request->filename,
                    'content' => trim($request->content)
                ]
            );

            return response()->json([
                'status' => true,
                'message' => 'Insert successfully.',
                'request' => $request->all()
            ]);
        }catch(\Exception $exception){
            return response()->json([
                'status' => false,
                'data' => $exception->getMessage()
            ],500);
        }
    }

    public function list(Request $request){
        try{

            $list = \App\PdfContent::get();
            $newList = array();

            foreach($list as $name){
                $newList[] = $name->file_name;
            }

            return response()->json([
                'status' => count($newList) ? true : false,
                'list' => $newList
            ]);

        }catch(\Exception $exception){
            return response()->json([
                'status' => false,
                'data' => $exception->getMessage()
            ],500);
        }
    }

}
