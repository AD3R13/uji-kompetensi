<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Jurusan::get();
        return view('jurusan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Jurusan::create($request->all());
        Alert::success('Data berhasil ditambah', 'Success Message!');
        return redirect()->to('jurusan')->with('success', 'Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Jurusan::find($id);
        return view('jurusan.edit', compact('edit',));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Jurusan::where('id', $id)->update([
            "nama_jurusan" => $request->nama_level
        ]);
        Alert::info('Data telah diubah', 'Success Message!');
        return redirect()->to('jurusan')->with('info', 'Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jurusan::where('id', $id)->delete();
        toast('Data berhasil dihapus', 'success');
        return redirect()->to('level')->with('success', 'Berhasil dihapus');
    }
}
