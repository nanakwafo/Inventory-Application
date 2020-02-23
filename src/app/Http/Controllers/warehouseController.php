<?php

namespace App\Http\Controllers;

use App\Warehouse;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class warehouseController extends Controller
{
    //
    public function index(){
      return view('warehouse',[
          'routeName'=> parent::getRouteName()
      ]);  
    }
    public function  storeselectbox(){
        $output_store='<option value="">Select Store</option>';
        $store=Warehouse::where('purpose','store')->get();
        foreach ($store as $p){
            $output_store.='<option value="'.$p->id.'">'.$p->name.'</option>';
        }
        return Response($output_store);
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
                    <a href="#" class="editbtn" data-id="'.$warehouse->id.'" data-name="'.$warehouse->name.'" data-location="'.$warehouse->location.'" data-purpose="'.$warehouse->purpose.'" data-description="'.$warehouse->description.'" data-toggle="modal" data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                    <a href="#" class="deletebtn" data-id="'.$warehouse->id.'" data-name="'.$warehouse->name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                   ';
            });

        return $datatables->make(true);

    }
    public function save(Request $request){
        Warehouse::create($request->all());
        Session::flash('success','Warehouse record Added successfully');
        return redirect('warehouse');
    }
    public function update(Request $request){
        $warehouse =Warehouse::find($request->idEdit);
        $warehouse->name = $request->nameEdit;
        $warehouse->location = $request->locationEdit;
        $warehouse->purpose = $request->purposeEdit;
        $warehouse->description = $request->descriptionEdit;
        $warehouse->save();
        Session::flash('success','Warehouse record updated successfully');
        return redirect('warehouse');
    }
    public function delete(Request $request){
        Warehouse::find($request->idDelete)->delete();
        Session::flash('success','Warehouse deleted successfully');
        return redirect('warehouse');
    }
}
