<?php

namespace App\Http\Controllers;

use App\Models\Stocks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StocksController extends Controller
{
    public function index()
    {

        $data = Stocks::latest()->first();

        DB::table('Stocks')
            ->where([
                ['id', '!=', $data->id],
                ['product_number', '=', $data->product_number],
                ['product_sn', '=', $data->product_sn],
            ])->increment('product_quantity', $data->product_quantity);

        $users = DB::table('Stocks')
            ->where([
                ['id', '!=', $data->id],
                ['product_number', '=', $data->product_number],
                ['product_sn', '=', $data->product_sn],
            ])->get(['product_number', 'product_sn', 'id']);


        if (!($users->isEmpty())) {
            DB::table('Stocks')
                ->where([
                    ['id', '!=', $users[0]->id],
                    ['product_number', '=', $users[0]->product_number],
                    ['product_sn', '=', $users[0]->product_sn],
                ])->delete();
        }

        DB::table('Stocks')
            ->where([
                ['product_quantity', '=', 0],
            ])->delete();


        $stocks = Stocks::all();
        return view('stocks.index', compact('stocks'));
    }

}
