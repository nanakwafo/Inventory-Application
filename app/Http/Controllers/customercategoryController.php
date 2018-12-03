<?php

namespace App\Http\Controllers;

use App\Customercategory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class customercategoryController extends Controller
{
    //
    public function index(){
        return view('customercategory');
    }

    public function allcustomercategory(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));

        $customercategory = Customercategory::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'description',
            'created_at',
            'updated_at']);

        $datatables = Datatables::of($customercategory)
            ->editColumn('created_at', function ($customercategory){
                return $customercategory->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at', function ($customercategory) {
                return $customercategory->updated_at->format('d/m/Y');
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('action', function ($customercategory) {
                return '
                   <a href="#" data-id="'.$customercategory->id.'" data-name="'.$customercategory->name.'" name-description="'.$customercategory->description.'"  data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                   <a href="#" data-name="'.$customercategory->name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
              
                  
                  ';
            });
        
        return $datatables->make(true);

    }
    public function save(Request $request){
        Customercategory::create($request->all());
        Session::flash('success','Customer category record Added successfully');
        return redirect('customercategory');
    }
    public function update(Request $request){
        $customercategory =Customercategory::find($request->idEdit);
        $customercategory->name = $request->nameEdit;
        $customercategory->description = $request->descriptionEdit;
        $customercategory->save();
        Session::flash('success','Customer category record updated successfully');
        return redirect('customercategory');
    }
    public function delete(Request $request){
        Customercategory::find($request->idDelete)->delete();
        Session::flash('success','Customer Category deleted successfully');
        return redirect('customercategory');
    }

}
