<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\ExcelTest;

use Illuminate\Http\Request;

use App\Exports\AbsenExport;
use Maatwebsite\Excel\Facades\Excel;

class AbsenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ab = Absen::all();
        return view('absen.index',compact('ab'));
    }
    
    public function AbsenExport()
    {
        return Excel::download(new AbsenExport, 'absen.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $excel = ExcelTest::all();
        return view('absen.create',compact('excel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            //validasi
            $validated = $request->validate([
                'nama' => 'required',
                'id_excel_test' => 'required',
            ]);

        $ab = new Absen();
        $ab->nama = $request->nama;
        $ab->id_excel_test = $request->id_excel_test;
        $ab->save();
        // dd ($ab);
        return redirect()->route('absen.index')->with(['message'=>'Data berhasil dibuat']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
