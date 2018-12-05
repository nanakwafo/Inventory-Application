<?php

namespace App\Http\Controllers;

use App\Productcategory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class productcategoryController extends Controller
{
    //
    public function index(){
        return view('productcategory');
    }
    public function allproductcategory(Request $request)
    {
        DB::statement(DB::raw('set @rownum=0'));
        $productcategory = Productcategory::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'description',
            'created_at',
            'updated_at']);

        $datatables =  Datatables::of($productcategory)
            ->editColumn('created_at', function ($productcategory){
                return $productcategory->created_at->format('d/m/Y');
            })
            ->editColumn('updated_at', function ($productcategory) {
                return $productcategory->updated_at->format('d/m/Y');
            })
            ->filterColumn('updated_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(updated_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            })
            ->addColumn('action', function ($productcategory) {
                return '
                  <a href="#" class="editbtn" data-id="'.$productcategory->id.'" data-name="'.$productcategory->name.'" data-description="'.$productcategory->description.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-id="'.$productcategory->id.'" data-name="'.$productcategory->name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });

          
        return $datatables->make(true);

    }

    public function save(Request $request){
        Productcategory::create($request->all());
        Session::flash('success','Product category record Added successfully');
        return redirect('productcategory');
    }
    public function update(Request $request){
        $productcategory =Productcategory::find($request->idEdit);
        $productcategory->name = $request->nameEdit;
        $productcategory->description = $request->descriptionEdit;
        $productcategory->save();
        Session::flash('success','Customer category record updated successfully');
        return redirect('productcategory');
    }
    public function delete(Request $request){
        Productcategory::find($request->idDelete)->delete();
        Session::flash('success','Product Category deleted successfully');
        return redirect('productcategory');
    }

}
