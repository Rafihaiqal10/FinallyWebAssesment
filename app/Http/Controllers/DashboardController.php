<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ilhams;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::latest()->filter(request(['search']))->paginate(10);
        return view('dashboard.index', [
            "title" => "Dashboard",
            "students" => $students,
            'kelas' => Ilhams::all()
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
    public function edit(Student $student)
    {
        return view('student.edit', [
            "title" => "detail-students",
            "student" => $student,
            "grades" => Ilhams::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {

        $validatedData = $request->validate([
            'id' => 'AUTO INCREMENT',
            'nis' => 'required|max:225',
            'nama' => 'required|max:225',
            'kelass_id' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::where('id', $student->id)->update($validatedData);

        if ($result) {
            return redirect('/dashboard/index')->with('success', 'Data siswa berhasil diubah');
        }
    }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $result = Student::destroy($student->id);

        if ($result) {
            return redirect('/dashboard/index')->with('success', 'Data siswa berhasil dihapus');
        }
    }

    public function indexKelas()
    {
        return view('dashboard\grade',
            [
                'title' =>'kelas',
                "kelas" => Ilhams::all()
            ]);
    }

    public function createKelas()
    {
        return view('school\create',
            [
                'title' =>' add kelas',
            ]);
    }

    public function storeKelas(Request $req)
    {
        $school = new Ilhams();
        $school->name = $req->name;
        $school->save();
        return redirect('dashboard/grade')-> with('sucses','data berhasil ditambahkan');
    }

    public function editKelas($id)
    {
        return view('school/edit',[
            "title" => 'Edit School',
            "kelas" => Ilhams::findOrFail($id)
        ]);
    }

    public function updateKelas(Request $req, $id)
    {
        $validatedData = $req->validate([
            'name' => 'required|string',
        ]);

        $kelas = Ilhams::findOrFail($id);
        $kelas->update($validatedData);
        return redirect('dashboard/grade')->with('update', 'Data Anda berhasil diupdate');
    }

    public function destroyKelas($id)
    {
        $kelas = Ilhams::find($id);

        if (!$kelas) {
            return redirect('dashboard/grade')->with('error', 'Data siswa tidak ditemukan.');
        }

        $kelas->delete();

        return redirect('dashboard/grade')->with('worked', 'Data berhasil dihapus.');
    }

    public function logoutds(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/Login/login');
    }
}

