<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CourtOrders;
use PHPHtmlParser\Dom;
class DomParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:dom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dom Parsing from court order table';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{

            $dom = new Dom;
            $courtOrders = new CourtOrders;
            $parserDom = $courtOrders->where('data','!=',null)->where('filter_status','0')->get();

            $parserDom->each(function($html) use ($dom){
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
                                if($childKey == 3)
                                    $data[$j]['link'] = $td->innerHtml;

                                $data[$j]['created_at'] = \Carbon\Carbon::now();
                                $data[$j]['site_id'] = $html->site_id;
                                $data[$j]['court_order_id'] = $html->id;

                            }

                        }
                        $j++;

                    }

                }
                \DB::beginTransaction();
                if(count($data) > 500){

                    foreach(array_chunk($data,500) as $insert){
                        \App\OrdersData::insert($insert);
                    }

                }else{
                    \App\OrdersData::insert($data);
                }

                $update = \App\CourtOrders::find($html->id);
                $update->filter_status = '1';
                $update->save();

                \DB::commit();

            });



        }catch(\Exception $exception){
            \DB::rollback();
            dd($exception->getMessage());
            // return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
