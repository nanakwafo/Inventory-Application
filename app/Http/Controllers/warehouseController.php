<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
class warehouseController extends Controller
{
    //
    public function index(){
      return view('warehouse');  
    }
    public function allwarehouse(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $warehouse = Warehouse::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'location',
            'purpose',
            'description',
            'created_at',
            'updated_at']);

        $datatables =  Datatables::of($warehouse)
           
            ->addColumn('action', function ($warehouse) {
                return '
                  <a href="#edit-'.$warehouse->id.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#edit-'.$warehouse->id.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });

        return $datatables->make(true);

    }
}
