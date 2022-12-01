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
        return view('absen.index', ["active" => "Absen"], compact('ab'));
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
        return view('absen.create', ["active" => "Absen"], compact('excel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        //validasi
        $validated = $request->validate([
         'id_excel_test' => 'required',
         'status' => 'required',
         'keterangan' => 'nullable',
       
     ]);

     $ab = new Absen();
     $ab->id_excel_test = $request->id_excel_test;
     $ab->tanggal = date('Y-m-d');
     $ab->jam_masuk = date('h:i:s');
     $ab->status = $request->status;
     $ab->keterangan = $request->keterangan;
        $ab->save();
        // dd ($ab);
        return redirect()->route('absen.index')
        ->with('success', 'Data berhasil dibuat!');
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
       $ab = Absen::findOrFail($id);
       $excel = ExcelTest::all();
       return view('absen.index', compact('ab','excel'));
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
        $validate = $request->validate([
            'id_excel_test' => 'requiered',
            'id_excel_test' => 'requiered',
            'id_excel_test' => 'requiered',
            'id_excel_test' => 'requiered',
            'id_excel_test' => 'requiered',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ab = Absen::FindOrFail($id);
        $ab->delete();
        return redirect()->route('absen.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}