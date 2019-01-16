<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Unit;
use App\Status;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    
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

    public function create()
    {
        //
    }

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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

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

    public function destroy($id)
    {
        $pegawai = Pegawai::findOrFail($id)->delete();

        return redirect()->route('pegawai.index');
    }
}
