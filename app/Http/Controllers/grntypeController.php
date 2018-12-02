<?php

namespace App\Http\Controllers;

use App\Grntype;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class grntypeController extends Controller
{
    //
    public function index(){
        return view('grntype');
    }
    public function allgrntype()
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
                  <a href="#" class="editbtn" data-name="'.$grntype->name.'"  ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-name="'.$grntype->name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });


        return $datatables->make(true);

    }

    public function save(Request $request){
        Grntype::create($request->all());
        Session::flash('success','Grntype record Added successfully');
        return redirect('grntype');
    }
    public function update(Request $request){
        $grntype =Grntype::find($request->idEdit);
        $grntype->name = $request->nameEdit;
        $grntype->save();
        Session::flash('success','Grntype record updated successfully');
        return redirect('grntype');
    }
}
