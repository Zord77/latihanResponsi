<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BahanBaku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BahanBakuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bahanbaku = BahanBaku::all();

        if(count($bahanbaku)>0){
            return response([
                'message'=>'mendapatkan semua data bahan baku',
                'data'=>$bahanbaku
            ], 200);
        }

        return response([
            'message'=>'data tidak ada',
            'data'=>null
        ], 400);

    }

    public function view()
    {
        $bahanbaku = BahanBaku::all();
        return view('bahanbaku', compact('bahanbaku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->all();

        $validate = Validator::make($storeData, [
            'nama_bahan'=>'required',
            'stok'=>'required',
            'harga'=>'required',
            'satuan'=>'required'
        ]);

        if($validate->fails())
            return response(['message'=>$validate->fails()], 400);

        $bahanbaku = BahanBaku::create($storeData);
        
        return response([
            'message'=>'add bahan baku success',
            'data'=>$bahanbaku
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bahanbaku = BahanBaku::find($id);

        if (!is_null($bahanbaku)) {
            return response([
                'message' => 'bahan baku found it is' . $bahanbaku->nama_bahan,
                'data' => $bahanbaku
            ], 200);
        }

        return response([
            'message' => 'data tidak ditemukan',
            'data' => null
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bahanbaku = BahanBaku::find($id);

        if (is_null($bahanbaku)) {
            return response([
                'message' => 'bahan baku ga ketemu',
                'data' => null
            ], 404);
        }

        $updateData = $request->all();
        $validate = Validator::make($updateData, [
            'nama_bahan' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'satuan' => 'required'
        ]);

        if ($validate->fails())
            return response(['message' => $validate->errors()], 400);

        $bahanbaku->nama_bahan = $updateData['nama_bahan'];
        $bahanbaku->stok = $updateData['stok'];
        $bahanbaku->harga = $updateData['harga'];
        $bahanbaku->satuan = $updateData['satuan'];

        if ($bahanbaku->save()) {
            return response([
                'message' => 'update success',
                'data' => $updateData
            ], 200);
        }

        return response([
            'message' => 'update gagal',
            'data' => null
        ], 400);
    }

    public function edit($id)
    {
        $bahanbaku = BahanBaku::find($id);

        if (is_null($bahanbaku)) {
            return response([
                'message' => 'Data tidak ditemukan',
                'data' => null
            ], 404);
        }

        return view('editBahanBaku', compact('bahanbaku'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bahanbaku = BahanBaku::find($id);

        if (is_null($bahanbaku)) {
            return response([
                'message' => 'data tidak ditemukan',
                'data' => null
            ], 400);
        }

        if ($bahanbaku->delete()) {
            return response([
                'message' => 'delete bahan baku success',
                'data' => $bahanbaku
            ], 200);
        }

        return response([
            'message' => 'delete bahan baku gagal',
            'data' => null
        ], 400);
    }
}
