<?php

namespace App\Http\Controllers;

use App\Models\rombel;
use Illuminate\Http\Request;
use App\Models\student;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::with('rombel')->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = rombel::all();
        $lastNIS = student::latest('id')->first()->nis ?? null;
        return view('student.create', compact('rombels', 'lastNIS'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request-> validate([
            'name' => 'required',
            'nis' => 'required',
            'gender' => 'required',
            'rombel_id' => 'required',
            'photo'=> 'nullable|image|mimes:jpg,png|max:1024',
        ]);
        $photo = ' ';
        if($request->hasFile('photo')){
            $namafile = time().'_'. $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo')->storeAs('students', $namafile,'public');
        }
        $student= new student();
        $student-> nis = $request->nis;
        $student-> name = $request->name;
        $student -> gender= $request->gender;
        $student->rombel_id = $request->rombel_id;
        $student->photo = $photo;
        $student -> save();

        return redirect()->route('student.index');
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
        $student = student::find($id);
        $rombels = rombel :: all ();
        return view('student.edit', compact('student' , 'rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request-> validate([
            'name' => 'required'
            ]);
            $student = student:: find ( $id );
            $student-> name = $request->name;
            $student->rombel_id = $request -> rombel_id;
            $student-> save();

            return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student= student::find($id);
        $student->delete();

        return redirect()->route('student.index');
    }
}
