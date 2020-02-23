<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Roles\EloquentRole;
use Illuminate\Http\Request;
use Sentinel;
use Yajra\Datatables\Datatables;
use Session;
use DB;
class roleController extends Controller
{
    //
    public function index(){
        return view('role',[
            'routeName'=> parent::getRouteName()
        ]);
    }
    public function newrole(Request $request){

        Sentinel::getRoleRepository()->createModel()->create([
            'name' => $request->name,
            'slug' => $request->name,
        ]);
        Session::flash('success','Role record added successfully');
        return redirect('role');
    }
    public  function allroles(){

        DB::statement(DB::raw('set @rownum=0'));
        $roletype = EloquentRole::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name'
        ]);

        $datatables =  Datatables::of($roletype)

            ->addColumn('action', function ($roletype) {
//                <a href="#" class="editbtn" data-id="'.$roletype->id.'" data-name="'.$roletype->name.'" data-toggle="modal"  data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |

                return '
                   <a href="#" class="deletebtn" data-id="'.$roletype->id.'" data-name="'.$roletype->name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });


        return $datatables->make(true);
    }

    public function delete(Request $request){
        EloquentRole::find($request->idDelete)->delete();
        Session::flash('success','Role deleted successfully');
        return redirect('role');
    }
}
