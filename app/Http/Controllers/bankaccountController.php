<?php

namespace App\Http\Controllers;

use App\Bankaccount;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use Session;
class bankaccountController extends Controller
{
    //
    public function index(){
        return view('bankaccount');
    }
    public function allbankaccount()
    {
        DB::statement(DB::raw('set @rownum=0'));
        $bankaccount = Bankaccount::select([
            DB::raw('@rownum  := @rownum  + 1 AS rownum'),
            'id',
            'name',
            'accountnumber'
        ]);

        $datatables =  Datatables::of($bankaccount)

            ->addColumn('action', function ($bankaccount) {
                return '
                  <a href="#" class="editbtn" data-id="'.$bankaccount->id.'" data-name="'.$bankaccount->name.'" data-account="'.$bankaccount->accountnumber.'" data-toggle="modal"  data-target="#editmodal" ><i class="fa fa-pencil fa-2x" style="color:#8080ff" aria-hidden="true"></i> </a> |
                  <a href="#" class="deletebtn" data-id="'.$bankaccount->id.'" data-name="'.$bankaccount->name.'" data-toggle="modal" data-target="#deletemodal"><i class="fa fa-trash fa-2x" style="color:#ff8080" aria-hidden="true"></i> </a>
                  ';
            });


        return $datatables->make(true);

    }

    public function save(Request $request){
        Bankaccount::create($request->all());
        Session::flash('success','Bank account record Added successfully');
        return redirect('bankaccount');
    }
    public function update(Request $request){
        $bankaccount =Bankaccount::find($request->idEdit);
        $bankaccount->name = $request->nameEdit;
        $bankaccount->accountnumber = $request->accountnumberEdit;
        $bankaccount->save();
        Session::flash('success','Bank account record updated successfully');
        return redirect('bankaccount');
    }
    public function delete(Request $request){
        Bankaccount::find($request->idDelete)->delete();
        Session::flash('success','Bank account deleted successfully');
        return redirect('bankaccount');
    }
}
