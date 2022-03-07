<?php

namespace App\Http\Controllers;

use App\Models\paket_cucian;
use App\Exports\PaketExport;
use App\Http\Requests\Storepaket_cucianRequest;
use App\Http\Requests\Updatepaket_cucianRequest;
use App\Imports\PaketImport;
use App\Models\outlet;
use GuzzleHttp\Psr7\Request;
use Maatwebsite\Excel\Facades\Excel;


class PaketCucianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paket_cucian'] = Paket_Cucian::all();
        $data['outlet'] = outlet::all();
        return view('paket_cucian/index', $data);
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
     * @param  \App\Http\Requests\Storepaket_cucianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storepaket_cucianRequest $request)
    {
        $validated = $request->validate([
            'id_outlet' => 'required',
            'nama_paket' => 'required',
            'jenis' => 'required',
            'harga' => 'required'
        ]);

        $input = Paket_Cucian::create($validated);
        if ($input) return redirect('paket_cucian')->with('succes', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paket_cucian  $paket_cucian
     * @return \Illuminate\Http\Response
     */
    public function show(paket_cucian $paket_cucian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paket_cucian  $paket_cucian
     * @return \Illuminate\Http\Response
     */
    public function edit(paket_cucian $paket_cucian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatepaket_cucianRequest  $request
     * @param  \App\Models\paket_cucian  $paket_cucian
     * @return \Illuminate\Http\Response
     */
    public function update(Updatepaket_cucianRequest $request, paket_cucian $paket_cucian)
    {
        $ValidatedData = $request->validate([

            'id_outlet' => 'required',
            'nama_paket' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
        ]);


        Paket_Cucian::where('id', $paket_cucian->id)
            ->update($ValidatedData);


        return redirect('paket_cucian')->with('succes', 'Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paket_cucian  $paket_cucian
     * @return \Illuminate\Http\Response
     */
    public function destroy(paket_cucian $paket_cucian)
    {
        Paket_Cucian::destroy($paket_cucian->id);
        return redirect('paket_cucian')->with('succes' . 'Data Has Been Deleted!');
    }

    public function exportData()
    {
        return Excel::download(new PaketExport, 'Paket.xlsx');
    }

    public function importData()
    {
        request()->file('file')->move('temp', request()->file('file')->getClientOriginalName());
        Excel::import(new PaketImport, public_path('temp/' . request()->file('file')->getClientOriginalName()));

        return redirect('paket_cucian')->with('success', 'All good!');
    }
}
