<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
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
        if ($request->cariadmin) {
            $datauser = User::where('name','like', '%'.$request->cariadmin.'%')->paginate($batas)->withQueryString();
        }else {
            $datauser = User::paginate($batas)->withQueryString();
        }
        $no = $batas * ($datauser->currentPage() - 1);
        return view('admin.index', [
            'datauser' => $datauser,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        $message = [
            'required' => ':attribute harus diisi',
            'string' => ':attribute harus berupa string',
            'max' => ':attribute maksimal :max karakter',
            'min' => ':attribute minimal :min karakter',
            'unique' => 'maaf data tersebut sudah ada',
            'confirmed' => 'password tidak cocok',
            'email' => 'harus berupa email'
        ];
        $request->validate($rules, $message);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.index')->with('success', 'data berhasil ditambahkan');
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
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
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
        $user = User::find($id);
        if ($request->password == $user->password) {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
            ];
            $message = [
                'required' => ':attribute harus diisi',
                'string' => ':attribute harus berupa string',
                'max' => ':attribute maksimal :max karakter',
                'min' => ':attribute minimal :min karakter',
                'unique' => 'maaf data tersebut sudah ada',
                'confirmed' => 'password tidak cocok',
                'email' => 'harus berupa email'
            ];
            $request->validate($rules, $message);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->update();
        }else {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ];
            $message = [
                'required' => ':attribute harus diisi',
                'string' => ':attribute harus berupa string',
                'max' => ':attribute maksimal :max karakter',
                'min' => ':attribute minimal :min karakter',
                'unique' => 'maaf data tersebut sudah ada',
                'confirmed' => 'password tidak cocok',
                'email' => 'harus berupa email'
            ];
            $request->validate($rules, $message);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->update();
        }
        return redirect()->route('user.index')->with('updated', 'update user telah berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')->with('deleted', 'user telah berhasil dihapus');
    }
}
