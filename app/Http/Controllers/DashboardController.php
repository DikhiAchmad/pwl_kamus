<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
    public function index(Request $request)
    {
        $batas = 10;
        // hitung total kata dan admin
        $totalKata = Kata::all()->count();
        $totalUser = User::all()->count();
        // menampilkan data dan dibatasi 10 data menggunakan paginate
        if ($request->caridata || $request->type) {
            $dataKata = Kata::where('lema','like', '%'.$request->caridata.'%')->paginate($batas)->withQueryString();
        }else {
            $dataKata = Kata::paginate($batas)->withQueryString();
        }
        // penghitungan nomor
        $noKata = $batas * ($dataKata->currentPage() - 1);
        return view('dashboard.index', [
            'totalUser' => $totalUser,
            'totalKata' => $totalKata,
            'dataKata' => $dataKata,
            'noKata' => $noKata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selectKelas = Kata::distinct()->get(['kelas']);
        $selectType = Kata::distinct()->get(['type']);
        return view('dashboard.create', compact('selectKelas','selectType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'lema' => 'required|max:40',
            'nilai' => 'required',
            'kelas' => 'required|max:15',
            'type' => 'required|max:28',
        ];
        $message = [
            'required' => ':attribute harus diisi',
            'max' => ':attribute maksimal :max karakter'
        ];
        $request->validate($rules, $message);
        Kata::create([
            'lema' => $request->lema,
            'nilai' => $request->nilai,
            'kelas' => $request->kelas,
            'type' => $request->type
        ]);
        return redirect()->route('admin.index')->with('success', 'penambahan kata sudah berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $lema = Kata::findOrFail($id);
        // return view('dashboard.show', compact('lema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kata::findOrFail($id);
        $selectKelas = Kata::distinct()->get(['kelas']);
        $selectType = Kata::distinct()->get(['type']);
        return view('dashboard.edit', compact('selectKelas','selectType','data'));
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
        $rules = [
            'lema' => 'required|max:40',
            'nilai' => 'required',
            'kelas' => 'required|max:15',
            'type' => 'required|max:28',
        ];
        $message = [
            'required' => ':attribute harus diisi',
            'max' => ':attribute maksimal :max karakter'
        ];
        $request->validate($rules, $message);
        $kata = Kata::find($id);
        $kata->lema = $request->lema;
        $kata->nilai = $request->nilai;
        $kata->kelas = $request->kelas;
        $kata->type = $request->type;
        $kata->update();
        return redirect()->route('admin.index')->with('updated', 'update kata telah berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kata::find($id)->delete();
        return redirect()->route('admin.index')->with('deleted', 'kata telah berhasil dihapus');
    }
}