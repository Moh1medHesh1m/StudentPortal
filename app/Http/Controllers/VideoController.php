<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Course;

class VideoController extends Controller
{

    // function show(){
    //     $data = Video::all();
    //     //  return view('front',['videos'=>$data]);
    //     dd($data);
    // }
     public function show($year)
    {
        $data = DB::table('videos')
                ->where('id', '!=', 0)
                ->where('year', '=', $year)
                ->get();
        // $data = DB::select('select * from videos where id != 0 and year = ?', [$year]);
         return view('front', ['videos' => $data]);
        // dd($data);
    }

    //
   
    function print($id){
        $selector = Video::find($id);
        return view ('phase',['videos'=>$selector]);
    }
}
