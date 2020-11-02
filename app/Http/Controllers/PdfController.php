<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sunra\PhpSimple\HtmlDomParser;
class PdfController extends Controller
{
    //

    public function index(Request $request){
        try{
            $newRoute = route('display');
            return datatables()->of(\App\PdfContent::get())
            ->addIndexColumn()
            ->addColumn('text',function($row){
                return strip_tags($row->content);
            })
            ->addColumn('action',function ($row) use($newRoute){

                $filename =  str_replace('/var/www/html/delhi-police/storage/app/public/',"",$row->file_name);

                $link = '<a href="'.$newRoute.'?filename=/orders/2017/'.$filename.'" target="_blank" id="orderid" class="text-center">COPY OF ORDER</a>';
                return $link;

            })
            ->make(true);


        }catch(\Exception $exception){

        }
    }
}
