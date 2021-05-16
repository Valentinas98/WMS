<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InboundController extends Controller
{
    public function index()
    {
        $inbounds = Inbound::all();
        return view('inbounds.index', compact('inbounds'));
    }

    public function create()
    {
        return view('inbounds.create');
    }

    public function store()
    {
        $data = request()->validate([

            'inbound_date' =>'required',
            'inbound_number' =>'required',
            'cargo_manifest_number' =>'required',
            'product_number' =>'required',
            'product_name' =>'required',
            'product_quantity' =>'required',
            'product_sn' =>'required',
            'carrier_license_plate' =>'required',
            'carrier_person' =>'required',
            'loaded_by' =>'required',
            'warehouse_id' =>'required',
            'info_note' =>'nullable',
        ]);


    $request = request()->antrastestas;

        if($request == "testas"){
            $dataStock = request()->validate([

                'product_number' =>'required',
                'product_name' =>'required',
                'product_sn' =>'required',
                'product_quantity' =>'required',

            ]);


            Stocks::create($dataStock);
        }
        Inbound::create($data);

        return redirect('/inbounds');
    }

    public function storeStock()
    {
        $dataStock = request()->validate([

            'product_number' =>'required',
            'product_name' =>'required',
            'product_sn' =>'required',
            'product_quantity' =>'required',

        ]);

        Stocks::create($dataStock);
        return redirect('/inbounds');

    }

    public function show($inbound) //pasiima duomenis
    {
        $inbound = Inbound::findOrFail($inbound);

        return view('inbounds.edit', ['inbounds' => $inbound]);

    }

    public function edit(Inbound $inbounds)
    {
        return view('inbounds.edit', compact('inbounds'));
    }

    public function update(Inbound $inbound)
    {
        // validating incoming data from $request object
        $data = request()->validate([
            'inbound_date' => 'required',
            'inbound_number' => 'required',
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

        $inbound->update($data);

        return redirect('/inbounds');
    }

    public function destroy(Inbound $inbound)
    {
//        dd($inbound->attributesToArray()['product_quantity']);
        $inbound->delete();

        $inboundarray = $inbound->attributesToArray();

        DB::table('Stocks')
            ->where([
                ['product_number', '=', $inboundarray['product_number']],
                ['product_sn', '=',  $inboundarray['product_sn']],
            ])->decrement('product_quantity',  $inboundarray['product_quantity']);

        return redirect('/inbounds');
    }

}
