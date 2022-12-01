<?php

namespace App\Http\Controllers;

use App\Models\ExcelTest;

use Illuminate\Http\Request;

use App\Exports\ExcelExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
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
        $excel = ExcelTest::all();
        return view('excel.index', ["active" => "Dosen"], compact('excel'));
    }

    public function ExportExcel()
    {
        return Excel::download(new ExcelExport, 'excel.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('excel.create', ["active" => "Dosen"]);
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
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'wilayah' => 'nullable',
            'ayah' => 'required',
            'ibu' => 'required',
            'foto' => 'required|image|max:2048',
        ]);

        $excel = new ExcelTest();
        $excel->nama = $request->nama;
        $excel->tempat_lahir = $request->tempat_lahir;
        $excel->tanggal_lahir = date('d-M-Y');
        $excel->jk = $request->jk;
        $excel->agama = $request->agama;
        $excel->kewarganegaraan = $request->kewarganegaraan;
        $excel->alamat = $request->alamat;
        $excel->wilayah = $request->wilayah;
        $excel->ayah = $request->ayah;
        $excel->ibu = $request->ibu;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/excel/', $name);
            $excel->foto = $name;
        }
        $excel->save();
        return redirect()->route('excel.index')
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
        $excel = ExcelTest::FindOrFail($id);
        return view('excel.show', ["active" => "Dosen"], compact('excel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $excel = ExcelTest::FindOrFail($id);
        return view('excel.edit', ["active" => "Dosen"], compact('excel'));
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
          //validasi
          $validated = $request->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'wilayah' => 'nullable',
            'ayah' => 'required',
            'ibu' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        $excel = ExcelTest::FindOrFail($id);
        $excel->nama = $request->nama;
        $excel->tempat_lahir = $request->tempat_lahir;
        $excel->tanggal_lahir = $request->tanggal_lahir;
        $excel->jk = $request->jk;
        $excel->agama = $request->agama;
        $excel->kewarganegaraan = $request->kewarganegaraan;
        $excel->alamat = $request->alamat;
        $excel->wilayah = $request->wilayah;
        $excel->ayah = $request->ayah;
        $excel->ibu = $request->ibu;
        if ($request->hasFile('foto')) {
            $excel->deleteImage();
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/excel/', $name);
            $excel->foto = $name;
        }
        $excel->save();
        return redirect()->route('excel.index')
            ->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $excel = ExcelTest::FindOrFail($id);
        $excel->delete();
        return redirect()->route('excel.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
