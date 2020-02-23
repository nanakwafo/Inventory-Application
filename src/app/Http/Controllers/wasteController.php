<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Yajra\Datatables\Datatables;
use App\Warehouse;
use App\Waste;
use Illuminate\Http\Request;
use Session;
class wasteController extends Controller
{
    //
    public function index(){
        return view('waste',[
            'routeName'=> parent::getRouteName()
        ]);
    }
    public function allwaste(){
        $wastes = Waste::all();

        $data  = [];
        $rownum = 1;
        foreach ($wastes as $w) {

            $obj = new \stdClass;
            $obj->id = $w->id;
            $obj->rownum = $rownum++;
            $obj->date = $w->date;
            $obj->store = Warehouse::find($w->store_id)->name;
            $obj->productcode = $w->productcode;
            $obj->unit = $w->unit;
            $obj->remark = $w->remark;

            $obj->action = '
                  <a href="#" class="editbtn" data-id="'.$w->id.'" data-date="'.$w->date.'" data-store="'.$w->store_id.'" data-productcode="'.$w->productcode.'" data-unit="'.$w->unit.'" data-remark="'.$w->remark.'" data-unitcost="'.$w->unitcost.'" data-totalcost="'.$w->totalcost.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-money fa-1x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                    <a href="#" class="deletebtn" data-id="'.$w->id.'" data-productcode="'.$w->productcode.'"  data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-1x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            $data[] = $obj;
        }

        $wastes_sorted = new Collection($data);

        return Datatables::of($wastes_sorted) ->make(true);
    }
    public function save(Request $request){
        Waste::create($request->all());
        Session::flash('success','Waste record Added successfully');
        return redirect('waste');
    }
    public function update(Request $request){
        $waste =Waste::find($request->idEdit);
        $waste->date = $request->dateEdit;
        $waste->store_id = $request->store_idEdit;
        $waste->productcode = $request->productcodeEdit;
        $waste->unit = $request->unitEdit;
        $waste->unitcost = $request->unitcostEdit;
        $waste->totalcost = $request->totalcostEdit;
        $waste->remark = $request->remarkEdit;
        $waste->save();
        Session::flash('success','Waste record updated successfully');
        return redirect('waste');
    }
    public function delete(Request $request){
        Waste::find($request->idDelete)->delete();
        Session::flash('success','Waste deleted successfully');
        return redirect('waste');
    }
}
