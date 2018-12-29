<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Excel;
use DB;
use App\Warehouse;
use App\Supplier;
use App\Productcategory;
use App\Helpers\AppHelper;
use App\Helpers\ReportHelper;
use Illuminate\Support\Collection;
class excelController extends Controller
{
    //

    public function inventoryonhandexcel($store,$fromdate,$todate,$product){
       
        $type='csv';
        $title='INVENTORY ON HAND';
        if ($store=="all") {
            $fromdate=date('Y-m-d');
            $todate=date('Y-m-d');
            $productitems = DB::table('inventoryonhand')->get();
        }else{
            
            $productitems = DB::table('inventoryonhand')
                ->where('store_issue_to',$store)
                ->where('productcode',$product)
                ->whereDate('date','>=',$fromdate)->whereDate('date','<=',$todate)
                ->get();
        }


        $data  = [];

        foreach ($productitems as $w) {
            $obj = new \stdClass;
            $obj->date = $w->date;
            $obj->productname = $w->name;
            $obj->productcode = $w->productcode;
            $obj->store = Warehouse::find($w->store_issue_to)->name;
            $obj->supplier = Supplier::find($w->supplier_id)->name;
            $obj->productcategory = Productcategory::find($w->productcategory_id)->name;
            $obj->unit = $w->unit;
            $obj->cost= ($w->quantity)* ( ReportHelper::getproductionunitcost($fromdate,$todate,$w->store_issue_to,$w->productcode));
            $obj->retailprice = $w->rate;
            $obj->reorderlimit = $w->reorderlimit;
            $obj->startinginventory = ReportHelper::getstartinginventory($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->received = ReportHelper::received($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->usage = ReportHelper::usage($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->onhand = ReportHelper::onhand($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->variance = ReportHelper::variance($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->variancecost = ReportHelper::variancecost($fromdate,$todate,$w->store_issue_to,$w->productcode);
            $obj->onhandvalue = $w->quantity * $w->rate;
            $data[] = $obj;
        }

        $productitems_sorted = new Collection($data);


        return Excel::create('excel', function($excel) use ($productitems_sorted,$title) {

            $excel->sheet('mySheet', function($sheet) use ($productitems_sorted,$title)
            {

                $sheet->cell('A1', function($cell) use($title)
                {
                    $cell->setValue($title);
                });

                $sheet->cell('A2', function($cell) {$cell->setValue('Date');   });
                $sheet->cell('B2', function($cell) {$cell->setValue('Product name');   });
                $sheet->cell('C2', function($cell) {$cell->setValue('Product code');   });
                $sheet->cell('D2', function($cell) {$cell->setValue('Store');   });
                $sheet->cell('E2', function($cell) {$cell->setValue('Supplier');   });
                $sheet->cell('F2', function($cell) {$cell->setValue('Product Category');   });
                $sheet->cell('G2', function($cell) {$cell->setValue('Unit');   });
                $sheet->cell('H2', function($cell) {$cell->setValue('Cost');   });
                $sheet->cell('I2', function($cell) {$cell->setValue('Retail Price');   });
                $sheet->cell('J2', function($cell) {$cell->setValue('Reorder Limit');   });
                $sheet->cell('K2', function($cell) {$cell->setValue('Starting Inventory');   });
                $sheet->cell('L2', function($cell) {$cell->setValue('Received');   });
                $sheet->cell('M2', function($cell) {$cell->setValue('Usage');   });
                $sheet->cell('N2', function($cell) {$cell->setValue('Onhand');   });
                $sheet->cell('O2', function($cell) {$cell->setValue('Variance');   });
                $sheet->cell('P2', function($cell) {$cell->setValue('Variance Cost');   });
                $sheet->cell('Q2', function($cell) {$cell->setValue('Value on hand');   });
                if (!empty($productitems_sorted)) {
                    foreach ($productitems_sorted as $key => $value) {
                        $i= $key+3;
                        $sheet->cell('A'.$i, $value->date);
                        $sheet->cell('B'.$i, $value->productname);
                        $sheet->cell('C'.$i, $value->productcode);
                        $sheet->cell('D'.$i, $value->store);
                        $sheet->cell('E'.$i, $value->supplier);
                        $sheet->cell('F'.$i, $value->productcategory);
                        $sheet->cell('G'.$i, $value->unit);
                        $sheet->cell('H'.$i, $value->cost);
                        $sheet->cell('I'.$i, $value->retailprice);
                        $sheet->cell('J'.$i, $value->reorderlimit);
                        $sheet->cell('K'.$i, $value->startinginventory);
                        $sheet->cell('L'.$i, $value->received);
                        $sheet->cell('M'.$i, $value->usage);
                        $sheet->cell('N'.$i, $value->onhand);
                        $sheet->cell('O'.$i, $value->variance);
                        $sheet->cell('P'.$i, $value->variancecost);
                        $sheet->cell('Q'.$i, $value->onhandvalue);
                    }
//                    $sheet->fromArray($data);
                }

            });
        })->download($type);

    }
}
