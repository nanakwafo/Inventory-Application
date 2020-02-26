<?php

namespace App\Http\Controllers;

use App\Goodissue;
use App\Productcode;
use App\Storeitem;
use App\Warehouse;
use App\Warehouseitem;
use Illuminate\Http\Request;
use Session;

class goodissueController extends Controller
{
    //
    public function index ()
    {
        return view ('goodissue',['routeName'=> parent::getRouteName ()
        ]);
        }

    public function warehouseproductselectbox ($warehouse_id)
    {
        $output_product_for_warehouse = '<option value="">Select product</option>';
        $product_from_warehouse = Warehouseitem::where ('warehouse_id', $warehouse_id)->select ('productcode')->distinct ()->get ();
        foreach ( $product_from_warehouse as $p ) {
            $output_product_for_warehouse .= '<option value="' . $p->productcode . '">' . Productcode::find ($p->productcode)->name . '</option>';
        }

        return Response ($output_product_for_warehouse);
    }

    public function productquantityleftwarehouse ($productcode, $warehouse_from)
    {
        //get the quantity of product where productcode and warehouse_id
        $totalquantity_product = Warehouseitem::where ('productcode', $productcode)->where ('warehouse_id', $warehouse_from)->sum ('quantity');
        $totalquantity_product_in_store = Storeitem::where ('productcode', $productcode)->where ('warehouse_issue_from', $warehouse_from)->sum ('quantity');

        return (int)$totalquantity_product - (int)$totalquantity_product_in_store;

    }

    public function save (Request $request)
    {
        //first check if grnnumber already exist
        //if yes return good receive already exist
        $number_of_items = $request->number_of_items;
        if ( $number_of_items > 0 ) {
            $goodissue = new Goodissue();
            $goodissue->addnumber = $request->addnumber;
            $goodissue->adddate = $request->adddate;
            $goodissue->addtype = $request->addtype;
            $goodissue->warehouse_issue_from = $request->warehouse_from_id;
            $goodissue->store_issue_to = $request->warehouse_to_id;
            $goodissue->remark = $request->remark;
            $goodissue->save ();


            for ( $i = 0; $i < $number_of_items; $i++ ) {
                $storeitem = new Storeitem();
                $storeitem->goodissue_addnumber = $request->addnumber;
                $storeitem->date = $request->adddate;
                $storeitem->warehouse_issue_from = $request->warehouse_from_id;
                $storeitem->store_issue_to = $request->warehouse_to_id;

                $storeitem->productcode = $request->product[ $i ];
                $storeitem->quantity = $request->quantity[ $i ];
                $storeitem->rate = $request->rate[ $i ];
                $storeitem->description = $request->description[ $i ];
                $storeitem->unit = $request->unit[ $i ];
                $storeitem->save ();

            }
            Session::flash ('success', 'New Goods issue successfully');

        }
        else {
            Session::flash ('error', 'No Product was Selected');
        }

        return redirect ('goodissue');
    }
}
