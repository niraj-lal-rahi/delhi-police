<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
class PdfController extends Controller
{
    //

    public function index(Request $request){
        try{
            $list = \App\CourtOrders::where('data','!=','')->get();

            $href = array();
            foreach($list as $list){
                if($list->data != ''){
                    // dd($list->data);
                    // exit;
                    $document = HtmlDomParser::str_get_html($list->data);

                    dd($document);
                    if($document){
                        foreach($document->find('a') as $aTag){

                            $href[] = $aTag->href;
                            echo $aTag->href."<br/>";
                        }
                        // echo "---next";
                    }

                }


            }

            foreach($href as $link){
                $query_string = explode('?',$link); //return array
                $query = explode('&',$query_string[1]);


                $file_name = str_replace('filename=','',$query[0]);
                // dd($query_string,$query,$file_name);

                $url = "https://services.ecourts.gov.in/ecourtindia_v4_bilingual/cases/".$link;
                echo "<pre>";
                print_r( get_headers($url));

                // $contents = file_get_contents($url);
                // \Storage::disk('public')->put($file_name, $contents);
                // file_get_contents()
                // \Storage::disk('public')->put('filename.pdf', $contents);
            }



        }catch(\Exception $exception){

        }
    }
}
