<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {

      $result2 = DB::select(DB::raw("select status as total,count('status')as count from categories group by status")); 
      $chartData="";
      foreach($result2 as $list){
          $name=$list->total==1?"Active":"In-Active";
          $chartData.="['".$name."',".$list->count."],";   
      }
     $arr1['chartData2'] = rtrim($chartData,",");
     

       $result = DB::select(DB::raw("select count(*) as total,name from categories group by name"));
       $chartData="";
       foreach($result as $list){
           $chartData.="['".$list->name."',     ".$list->total."],";
       }
      $arr['chartData'] = rtrim($chartData,",");
      return view('barchart',$arr,$arr1);
  }        
    
  
}
