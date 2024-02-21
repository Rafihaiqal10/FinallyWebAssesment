<?php

namespace App\Http\Controllers;

use App\Models\Ilhams;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('./student/all', [
            "title" => "student",
            "students" => Student::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.tambah', [
            "title" => "AddData-students",
            "kelas" => Ilhams::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $student = new Student();
        $student->nis = $req->nis;
        $student->nama = $req->nama;
        $student->kelass_id = $req->kelass_id;
        $student->alamat = $req->alamat;
        $student->tgl_lahir = $req->tgl_lahir;
        $student->created_at = $req->created_at;
        $student->save();

        return redirect('dashboard/index')->with('success', 'Data Anda berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('student.edit',
            [
                'title' =>'edit student',
                "students" => Student::findOrFail($id),
                'kelas' => Ilhams::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $validatedData = $req->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|string',
            'kelass_id' => 'required|string',
            'alamat' => 'required|string',
            'tgl_lahir' => 'required|date',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validatedData);
        return redirect('dashboard/index')->with('success', 'Data Anda berhasil diupdate');
   }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Ilhams::findOrFail($id);

        if ($student) {
            $student->delete();
            return redirect('/student/all')->with('success', 'Data siswa berhasil dihapus');
        }
    }
}
