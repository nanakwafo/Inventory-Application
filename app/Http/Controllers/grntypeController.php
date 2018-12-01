<?php

namespace App\Http\Controllers;

use App\Grntype;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
class grntypeController extends Controller
{
    //
    public function index(){
        return view('grntype');
    }
    public function allgrntype(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $grntype = Grntype::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name'
            ]);

        $datatables =  Datatables::of($grntype)
          
            ->addColumn('action', function ($grntype) {
                return '
                  <a href="#edit-'.$grntype->id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#edit-'.$grntype->id.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });


        return $datatables->make(true);

    }
}
