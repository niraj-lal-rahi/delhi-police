<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\CourtOrders;

class IndexController extends Controller
{
    //
    public function index(){
        return view('center-delhi');
    }

    public function eastDelhi(){
        return view('east-delhi');
    }
    public function newDelhi(){
        return view('new-delhi');
    }

    public function northDelhi(){
        return view('north-delhi');
    }

    public function southDelhi(){
        return view('south-delhi');
    }

    public function westDelhi(){
        return view('west-delhi');
    }

    public function southWestDelhi(){
        return view('south-west-delhi');
    }

    public function southEastDelhi(){
        return view('south-east-delhi');
    }

    public function shahdra(){
        return view('shahdra');
    }

    public function northWestDelhi(){
        return view('north-west-delhi');
    }

    public function northEastDelhi(){
        return view('north-east-delhi');
    }

    public function store(Request $request){
        try{

            $validate = validator($request->all(),[
                'court_type' => 'required',
                'court_complex_code' => 'required',
                'court_code' => 'required',
                'from_date' => 'required',
                'to_date' => 'required'
            ]);


            if($validate->fails()){
                return redirect()->back()->withErrors($validate->errors()->first());
            }

            $create = \App\CourtOrders::create(
                [
                    'url' => $request->court_url,
                    'court_type' => $request->court_type,
                    'court_complex' => $request->court_type == '1' ? $request->court_complex_code : $request->court_code,
                    'from_date' => $request->from_date,
                    'to_date' => $request->to_date,
                ]
            );


             // $process = new Process(['python3.6', base_path('python/supreme.py'),'-id',$create->id]);
             $process = new Process(['python3', base_path('python/services-ecourts-gov-in.py'),'-id',$create->id]);
             $process->run();

             if (!$process->isSuccessful()) {
                 throw new ProcessFailedException($process);
             }

             echo $process->getOutput();

            // return redirect()->back()->withSuccess("Hold tight we are fetching data.");


        }catch(\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }

    public function show($id,CourtOrders $courtOrders,Request $request){
        try{


            $courtOrders = $courtOrders->findOrFail($id);
            return view('display',compact('courtOrders'));

        }catch(\Exception $exception){
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
