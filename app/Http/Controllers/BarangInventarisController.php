<?php

namespace App\Http\Controllers;

use App\Models\barang_inventaris;
use App\Http\Requests\Storebarang_inventarisRequest;
use App\Http\Requests\Updatebarang_inventarisRequest;
use Illuminate\Http\Requests;
class BarangInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['barang_inventaris'] = barang_inventaris::all();
        return view('barang_inventaris/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storebarang_inventarisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storebarang_inventarisRequest $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'qty' => 'required',
            'kondisi' => 'required',
            'tanggal_pengadaan' => 'required',
        ]);

        $input = barang_inventaris::create($validated);

        if($input) return redirect('barang_inventaris')->with('succses', 'data berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function show(barang_inventaris $barang_inventaris)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit(barang_inventaris $barang_inventaris)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatebarang_inventarisRequest  $request
     * @param  \App\Models\barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Updatebarang_inventarisRequest $request, barang_inventaris $b, $id)
    {
      //validasi
      $validated = $request->validate([
        'nama_barang' => 'required',
        'merk_barang' => 'required',
        'qty' => 'required',
        'kondisi' => 'required',
        'tanggal_pengadaan' => 'required'
    ]);
    $b = barang_inventaris::find($id);


    barang_inventaris::where('id',$b->id)->update($validated);
    return redirect('/barang_inventaris')->with('success','data berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang_inventaris  $barang_inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        barang_inventaris::find($id)->delete();

        return redirect(request()->segment(1).'#1')->with('succes','Data berhasil di hapus');
    }
}
