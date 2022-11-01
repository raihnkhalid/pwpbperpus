<?php

namespace App\Http\Controllers;

use App\Models\anggota;
use Illuminate\Http\Request;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = anggota::all();
        
        return view('anggota.index', [
            'anggota' => $anggota
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namalengkap' => 'required',
            'nis' => 'required|unique:anggotas,nis',
            'jeniskelamin' => 'required',
            'jurusan' => 'required'
        ]);
        $array = $request->only([
            'namalengkap', 'nis', 'jeniskelamin', 'jurusan'
        ]);
        $anggota = anggota::create($array);
        return redirect()->route('anggota.index')
            ->with('success_message', 'Berhasil menambahkan anggota!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = anggota::find($id);
        if (!$anggota) return redirect()->route('anggota.index')
            ->with('error_message', 'Anggota dengan id'.$id.' tidak ditemukan!');

        return view('anggota.edit', [
            'anggota' => $anggota
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namalengkap' => 'required',
            'nis' => 'required',
            // 'email' => 'required|email|unique:users,email,'.$id,
            'jeniskelamin' => 'required',
            'jurusan' => 'required'
        ]);
        $anggota = anggota::find($id);
        $anggota->namalengkap = $request->namalengkap;
        $anggota->nis = $request->nis;
        $anggota->jeniskelamin = $request->jeniskelamin;
        $anggota->jurusan = $request->jurusan;
        $anggota->save();
        return redirect()->route('anggota.index')
            ->with('success_message', 'Berhasil mengubah data anggota!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $anggota = anggota::find($id);
        
        if ($anggota) $anggota->delete();
        return redirect()->route('anggota.index')
            ->with('success_message', 'Berhasil menghapus anggota');
    }
}
