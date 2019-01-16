<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Unit;
use App\Status;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        $status = Status::all();
        $unit = Unit::all();
        
        return view('pages.index', compact('pegawai', 'status', 'unit'));
    }

    public function status(Request $request)
    {
        $statuses = Request('status');

        $status = Status::all();
        $unit = Unit::all();
        $pegawai = Pegawai::where('status_id', $statuses)->get();

        return view('pages.index', compact('pegawai', 'status', 'unit'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|string',
            'nama' => 'required|string',
            'unit_id' => 'required|integer',
            'status_id' => 'required|integer',
        ]);

        Pegawai::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'unit_id' => $request->unit_id,
            'status_id' => $request->status_id
        ]);

        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required|string',
            'nama' => 'required|string',
            'unit_id' => 'required|integer',
            'status_id' => 'required|integer',
        ]);
        
        $pegawai = Pegawai::findOrFail($request->nik);
        $pegawai->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'unit_id' => $request->unit_id,
            'status_id' => $request->status_id
        ]);

        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id)->delete();

        return redirect()->route('pegawai.index');
    }
}
