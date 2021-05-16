<?php

namespace App\Http\Controllers;

use App\Models\Outbound;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OutboundController extends Controller
{
    public function index()
    {
        $outbounds = Outbound::all();
        return view('outbounds.index', compact('outbounds'));
    }

    public function create()
    {
        return view('outbounds.create');
    }

    public function show($stocks) //pasiima duomenis
    {
        $stocks = Stocks::findOrFail($stocks);

        return view('outbounds.create', ['stocks' => $stocks]);

    }


    public function showedit($outbound) //pasiima duomenis
    {
        $outbound = Outbound::findOrFail($outbound);

        return view('outbounds.edit', ['outbounds' => $outbound]);

    }



    public function store($stockID)
    {
        $data = request()->validate([

            'outbound_date' =>'required',
            'outbound_number' =>'required',
            'cargo_manifest_number' =>'required',
            'product_number' =>'required',
            'product_name' =>'required',
            'product_quantity' =>"required",
            'product_sn' =>'required',
            'carrier_license_plate' =>'required',
            'carrier_person' =>'required',
            'loaded_by' =>'required',
            'warehouse_id' =>'required',
            'info_note' =>'nullable',
        ]);

        Outbound::create($data);

        DB::table('Stocks')
            ->where([
                ['id', '=', $stockID],
            ])->decrement('product_quantity', $data['product_quantity']);

        return redirect('/outbounds');
    }

    public function destroy(Outbound $outbound)
    {

        $outbound->delete();

        $outboundarray = $outbound->attributesToArray();

        DB::table('Stocks')
            ->where([
                ['product_number', '=', $outboundarray['product_number']],
                ['product_sn', '=',  $outboundarray['product_sn']],
            ])->increment('product_quantity',  $outboundarray['product_quantity']);

        return redirect('/outbounds');
    }



    public function update(Outbound $outbound)
    {
        // validating incoming data from $request object
        $data = request()->validate([
            'outbound_date' => 'required',
            'outbound_number' => 'required',
            'cargo_manifest_number' => 'required',
            'product_number' => 'required',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_sn' => 'required',
            'carrier_license_plate' => 'required',
            'carrier_person' => 'required',
            'loaded_by' => 'required',
            'warehouse_id' => 'required',
            'info_note' => 'nullable',
        ]);

        $outbound->update($data);

        return redirect('/outbounds');
    }





}
