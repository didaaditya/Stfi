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
        $data = ExcelTest::all();
        return view('excel.index', compact('data'));
    }

    public function ExportExcel()
    {
        return Excel::download(new ExcelExport, 'data.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('excel.create');
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
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'nik' => 'required|unique:excel_tests|max:255',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|max:2048',
        ]);

        $data = new ExcelTest();
        $data->nama = $request->nama;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->agama = $request->agama;
        $data->jk = $request->jk;
        $data->nik = $request->nik;
        $data->pendidikan = $request->pendidikan;
        $data->alamat = $request->alamat;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/excel/', $name);
            $data->foto = $name;
        }
        $data->save();
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
        $data = ExcelTest::FindOrFail($id);
        return view('excel.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ExcelTest::FindOrFail($id);
        return view('excel.edit', compact('data'));
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
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'nik' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|max:2048',
        ]);

        $data = ExcelTest::FindOrFail($id);
        $data->nama = $request->nama;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->agama = $request->agama;
        $data->jk = $request->jk;
        $data->nik = $request->nik;
        $data->pendidikan = $request->pendidikan;
        $data->alamat = $request->alamat;
        if ($request->hasFile('foto')) {
            $data->deleteImage();
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/excel/', $name);
            $data->foto = $name;
        }
        $data->save();
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
        $data = ExcelTest::FindOrFail($id);
        $data->delete();
        return redirect()->route('excel.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
