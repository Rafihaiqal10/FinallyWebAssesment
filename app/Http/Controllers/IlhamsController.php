<?php

namespace App\Http\Controllers;

use App\Models\Ilhams;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IlhamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('school\all',
            [
                'title' =>'kelas',
                "kelas" => Ilhams::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('school\create',
            [
                'title' =>' add kelas',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $school = new Ilhams();
        $school->name = $req->name;
        $school->save();
        return redirect('school/all')-> with('sucses','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ilhams $ilhams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('school/edit',[
            "title" => 'Edit School',
            "kelas" => Ilhams::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'name' => 'required|string',
        ]);

        $kelas = Ilhams::findOrFail($id);
        $kelas->update($validatedData);
        return redirect('school/all')->with('update', 'Data Anda berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Ilhams::find($id);

        if (!$kelas) {
            return redirect('school/all')->with('error', 'Data siswa tidak ditemukan.');
        }

        $kelas->delete();

        return redirect('school/all')->with('worked', 'Data berhasil dihapus.');
    }
}
