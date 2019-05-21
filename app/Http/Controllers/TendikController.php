<?php

namespace App\Http\Controllers;

use App\Tendik;
use App\User;
use Illuminate\Http\Request;

class TendikController extends Controller
{
   

    public $validation_rules = [
        'email' => 'required|email',
        'nip' => 'required',
        'nama' => 'required',
        'nik' => 'required',
    ];


    public function __construct()
    {
        $this->middleware(['permission:manage_lecturers']);
    }

    public function index()
    {
        $tendiks = Tendik::paginate(25);
        return view('backend.tendik.index', compact('tendiks'));
    }

    public function create()
    {
        return view('backend.tendik.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->validation_rules);

        $user = User::create([
            'username' => request('nip'),
            'email' => request('email'),
            'password' => bcrypt('nip'),
            'status' => 1,
            'type' => User::TENDIK
        ]);

        $user->tendik()->create($request->only(
            'nip',
            'nama',
            'nik',
            'tempat_lahir',
            'tanggal_lahir',
            'nohp'));

        session()->flash('flash_success', 'Berhasil menambahkan data tendik atas nama '. $request->input('nama'));
        return redirect()->route('admin.tendik.show', [$user->id]);
    }

     public function show(Tendik $tendik)
    {
        return view('backend.tendik.show', compact('tendik'));
    }

    public function edit(Tendik $tendik)
    {
        return view('backend.tendik.edit', compact('tendik'));
    }

     public function update(Request $request, Tendik $tendik)
    {
        $this->validate($request, $this->validation_rules);

        $tendik->update($request->only(
            'nip',
            'nama',
            'nik',
            'tempat_lahir',
            'tanggal_lahir',
            'nohp'));

        $tendik->user->update([
            'password' => bcrypt('secret'),
            'email' => request('email'),
            'status' => 1,
        ]);

        session()->flash('flash_success', 'Berhasil mengupdate data tendik '.$tendik->nama);
        return redirect()->route('admin.tendik.show', [$tendik->id]);
    }

    public function destroy(Tendik $tendik)
    {
        $user = User::find($tendik->id);
        $tendik->delete();
        optional($user)->delete();

        session()->flash('flash_success', "Berhasil menghapus tendik ".$tendik->nama);
        return redirect()->route('admin.tendik.index');
    }


}
