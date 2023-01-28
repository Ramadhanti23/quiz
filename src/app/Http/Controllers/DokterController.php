<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $query = DB ::connection('mysql')->table('dokters')->get();
        return response()->json($query, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $this->validate($request, [
            'Nama' => 'required',
            'Spesialis' => 'required',
            
        ]);

        $request['created_at'] = $timestamp;
        $request['updated_at'] = $timestamp;

        $query = DB::connection('mysql')->table('dokters')->insert($request->all());

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
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $query = DB::connection('mysql')->table('dokters')->find($id);
        if ($query == NULL){
            return response()->json('Data tidak ditemukan', 404);
        } else {
            return response()->json($query, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $query = DB::connection('mysql')->table('dokters')->where('id', $id)->get();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $query = DB::connection('mysql')->table('users')->find($id);
        if ($query == NULL){
            return response()->json('Data tidak ditemukan', 404);
        } else {
            $timestamp = \Carbon\Carbon::now()->toDateTimeString();
            $request['updated_at'] = $timestamp;
            $query = DB::connection('mysql')->table('users')->where('id', $id)->update($request->all());
            return response()->json('Berhasil Update Data', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $query = DB::connection('mysql')->table('dokters')->find($id);
        if ($query == NULL){
            return response()->json('Data tidak ditemukan', 404);
        } else {
            $result = DB::connection('mysql')->table('dokters');
            $result->find($id);
            $result->delete($id);
            return response()->json('Data Berhasil di Hapus!', 200);
        }

    }
}
