<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $test = DB::connection('mysql')->table('orders')->get();
        return response()->json($test);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $this->validate($request, [
            'user' => 'required',
            'product' => 'required',
            'total' => 'required',
            'status' => 'required'
            
        ]);

        $request['created_at'] = $timestamp;
        $request['updated_at'] = $timestamp;

        $query = DB::connection('mysql')->table('orders')->insert($request->all());

        return response()->json('Berhasil ditambahkan', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $request = DB::connection('mysql')->table('orders')->find($id);
        if($quert == NULL){
            return response()->json('Data tidak ditemuukan', 404);
        }else{
            return response()->json($query, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
        $query = DB::connection('mysql')->table->where('id', $id)->get();
        return response()->json('EDIT $query', 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $id)
    {
        //
        $query = DB::connection('mysql')->table('orders')->find($id);
        if($query == NULL){
            return response()->json('Data tidak ditemukan', 404);
        }else{
            $timestamp =\Carbon\Carbon::now()->toDateTimeStering();
            $request['updated_at'] = $timestamp;
            $query = DB::connection('mysql')->table('orders')->where('id', $id)->update();
            return response()->json('Berhasil Update Data', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = DB::connection ('mysql')->table('orders')->find($id);
        if ($query == NULL){
            return response()->json('Data tidak ditemukan', 404);
        }else{
            $result = DB::conection('mysql')->table('orders');
            $result->find();
            $result->delete();
            return response()->json('Data Berhasil di Hapus!', 200);
        }
        // $cari = DB::connection('mysql')->table('orders')->where('id', $id);
        // $cari->first();
        // $cari->delete();
        // if ($cari) {
            
        //     return response()->json([
        //         'success' => true,
        //         'message' => 'Berhasil Dihapus!',
        //     ],200);
        // }
    }

    public function join()
    {
        $query = DB::connection ('mysql')->select('SELECT user, name_product, total, `status` FROM `orders` JOIN products WHERE `id`');
        return response()->json($query);
    }


}
