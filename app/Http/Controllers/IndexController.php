<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\CourtOrders;
use PHPHtmlParser\Dom;
use App\OrdersData;
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

    public function listData(){
        $courtList = \App\CourtList::get();
        return view('list-data',compact('courtList'));
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

            $siteUrl = \App\CourtList::where('link',$request->court_url)->get()->first();

            $create = \App\CourtOrders::create(
                [
                    'url' => $request->court_url,
                    'court_type' => $request->court_type,
                    'court_complex' => $request->court_type == '1' ? $request->court_complex_code : $request->court_code,
                    'from_date' => $request->from_date,
                    'to_date' => $request->to_date,
                    'site_id' => $siteUrl->id
                ]
            );


             // $process = new Process(['python3.6', base_path('python/supreme.py'),'-id',$create->id]);
            //  $process = new Process(['python3', base_path('python/services-ecourts-gov-in.py'),'-id',$create->id]);
            //  $process->run();

            //  if (!$process->isSuccessful()) {
            //      throw new ProcessFailedException($process);
            //  }

            //  echo $process->getOutput();

            return redirect()->back()->withSuccess("Hold tight we are fetching data. #ID -> ".$create->id);


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


    public function listDataView($id,Request $request){

        try{
            $data = \App\OrdersData::where('site_id',$id)->get();

            return view('table',compact('data','id'));
        }catch(\Exception $exception){
            dd($exception->getMessage());
        }
    }

    public function getRecordOld($id,Request $request){
        $newRoute = route('display');

        if($request->from_date != ""){
            return datatables()->of(\App\OrdersData::where('site_id',$id)
            ->whereBetween('order_date',[\Carbon\Carbon::parse($request->from_date)->format('Y-m-d'),\Carbon\Carbon::parse($request->to_date)->format('Y-m-d')]))
            ->addIndexColumn()
            ->addColumn('action',function ($row) use($newRoute){

                return str_replace('display_pdf.php',$newRoute,$row->link);


                // return $row->link;
            })
            ->make(true);

        }
        return datatables()->of(\App\OrdersData::where('site_id',$id))
        ->addIndexColumn()
        ->addColumn('action',function ($row) use($newRoute){

            return str_replace('display_pdf.php',$newRoute,$row->link);


            // return $row->link;
        })
        ->make(true);
    }

    public function getRecord(Request $request,OrdersData $ordersData){

        $newRoute = route('display');
        \DB::enableQueryLog();
        $id = 0;
        $query = $ordersData->whereRaw('1=1');
        if($request->district){
            $id = $request->district;
            $query->where('site_id',$id);

        }

        if($request->court_type !=  "")
        {
            $court_type = $request->court_type;
            $query->where('court_type',$court_type);

        }
        if($request->case_no != ""){
            $case_no = $request->case_no;
            $query->where('case_number',$case_no);
        }

        if($request->from_date != ""){
            $query->whereBetween('order_date',[
                \Carbon\Carbon::parse($request->from_date)->format('Y-m-d'),
                \Carbon\Carbon::parse($request->to_date)->format('Y-m-d')
            ]);
        }

        if($request->name !=""){

            $data = \App\PdfContent::selectRaw("REPLACE(file_name,'/var/www/html/delhi-police/storage/app/public/','') as name")
            ->where('content','like','%'.$request->name.'%')
            ->get();
            $set = "";
            foreach($data as $filename){
                $set .= "$filename->name,";
            }

            $query->whereRaw("FIND_IN_SET(filename,'$set')");

        }

        // if($request->from_date != ""){
        //     return datatables()->of(\App\query::where('site_id',$id)
        //     ->whereBetween('order_date',[
        //         \Carbon\Carbon::parse($request->from_date)->format('Y-m-d'),
        //         \Carbon\Carbon::parse($request->to_date)->format('Y-m-d')]))
        //     ->addIndexColumn()
        //     ->addColumn('action',function ($row) use($newRoute){

        //         return str_replace('display_pdf.php',$newRoute,$row->link);


        //         // return $row->link;
        //     })
        //     ->make(true);

        // }

        return datatables()->of($query->get())
        ->addIndexColumn()
        ->addColumn('action',function ($row) use($newRoute){

            return str_replace('display_pdf.php',$newRoute,$row->link);


            // return $row->link;
        })
        ->make(true);
    }


    public function domParser(CourtOrders $courtOrders){

        try{

            $dom = new Dom;
            $courtOrders = $courtOrders->where('data','!=',null)->get();
            $courtOrders->each(function($html) use ($dom){
                $dom->loadStr($html->data);
                $rows = $dom->find('tr');
                $j = 0;
                $data = array();

                foreach($rows as $key => $row){

                    if($key){


                        // print_r($row->getChildren()[0]->innerHtml);
                        foreach($row->getChildren() as $childKey => $td){
                            if(!$td->hasAttribute('colspan')){
                                if($childKey == 0)
                                    $data[$j]['s_no'] = $td->innerHtml;
                                if($childKey == 1)
                                    $data[$j]['case_number'] = $td->innerHtml;
                                if($childKey == 2)
                                    $data[$j]['order_date'] = \Carbon\Carbon::parse($td->innerHtml)->format('Y-m-d');
                                if($childKey == 3){
                                    $data[$j]['link'] = $td->innerHtml;

                                    if(count($td->find('a'))){
                                        $hrefAtrribute = str_replace("display_pdf.php?","",$td->find('a')[0]->getAttribute('href'));
                                        $explodeArray = explode('&',$hrefAtrribute);
                                        $explodeFirstKey = explode('/',$explodeArray[0]);

                                        $data[$j]['filename'] = $explodeFirstKey[count($explodeFirstKey)-1];
                                    }else{
                                        $data[$j]['filename'] = 'no_file';
                                    }

                                    // dd($hrefAtrribute,$explodeArray,$explodeFirstKey);
                                }


                                $data[$j]['created_at'] = \Carbon\Carbon::now();
                                $data[$j]['site_id'] = $html->site_id;
                                $data[$j]['court_order_id'] = $html->id;
                                $data[$j]['court_type'] = $html->court_type;

                            }


                        }
                        $j++;

                    }

                }

                // echo "<pre>";
                // print_r($data);
                // exit;
                if(count($data) > 500){

                    foreach(array_chunk($data,500) as $insert){
                        \App\OrdersData::insert($insert);
                    }

                }else{
                    \App\OrdersData::insert($data);
                }
            });


        }catch(\Exception $exception){
            dd($exception->getMessage());
            // return redirect()->back()->withErrors($exception->getMessage());
        }
    }


    public function displayPdf(Request $request){

        try{

            $nameArray = explode('/',$request->filename);
            $filename = $nameArray[count($nameArray)-1];

            $checkExist = \Storage::disk('public')->exists($filename);

            if($checkExist){
                return \Storage::disk('public')->download($filename);
            }

            dd("File does not exist.");

        }catch(\Exception $exception){
            dd($exception->getMessage());

        }
    }

    public function updateSiteId(){
        try{
            $list = \App\CourtOrders::where('site_id','0')->get();
            $list->each(function($request){
                $siteUrl = \App\CourtList::where('link',$request->url)->get()->first();
                $update = \App\CourtOrders::find($request->id);

                $update->site_id = $siteUrl->id;
                $update->save();

            });

        }catch(\Exception $exception){
            dd($exception->getMessage());

        }
    }

    public function dateSearch(){
        $courtList = \App\CourtList::get();
        return view('date-search',compact('courtList'));
    }

    public function systemLog(){
        $log = \App\CourtOrders::get();
        $courtList = \App\CourtList::get();

        $courts = $courtList->pluck('court_name','id');

        return view('system_log',compact('log','courts'));
    }



    public function searchView(){
        $courtList = \App\CourtList::get();

        $courts = $courtList->pluck('court_name','id');
        $id = 0;
        return view('table',compact('courts','id'));
    }
}
