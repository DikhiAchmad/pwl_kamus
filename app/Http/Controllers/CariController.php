<?php

namespace App\Http\Controllers;

use App\Models\Kata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CariController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function cariKata(Request $request)
    {
        $batas = 5;
        $selectKelas = Kata::distinct()->get(['kelas']);
        $selectType = Kata::distinct()->get(['type']);
        if ($request->carikata || $request->type) {
            $kata = Kata::where('lema','like', '%'.$request->carikata.'%')
                        ->where('type', 'like', '%' . $request->type . '%')
                        ->paginate($batas)->withQueryString();
        }else {
            $kata = Kata::paginate($batas)->withQueryString();
        }
        return view('carikata', [
            'kata' => $kata,
            'selectKelas' => $selectKelas,
            'selectType' => $selectType
        ]);
    }

    public function cariPeribahasa(Request $request)
    {
        if ($request->cariPeribahasa) {
            $response = Http::get('https://kateglo.com/api.php', [
                'format' => 'json',
                'phrase' => $request->cariPeribahasa
            ]);
        }else {
            $response = Http::get('https://kateglo.com/api.php', [
                'format' => 'json',
                'phrase' => ''
            ]);
        }
        $result = $response->collect();
        return view('cariperibahasa', compact('result'));
    }
}
