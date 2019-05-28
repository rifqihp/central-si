<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserPendidikan;
use App\User;
use App\RefJenjangPendidikan;
use Illuminate\Support\Facades\Storage;

class PendidikanController extends Controller
{
	protected $validation_rules = [
        'user_id' => 'required|',
        'jenjang_id' => 'required',
        'nama_sekolah' => 'required',
        'jurusan' => 'required',
        'tahun_masuk' => 'required',
        'tahun_lulus' => 'required',
        'lokasi_sekolah' => 'required',
        'nomor_ijazah' => 'required',
        'dalam_negeri' => 'required',
        'file_ijazah' => 'file|mimes:pdf'
            ];

    public function index()
    {
        $pendidikans = UserPendidikan::paginate(25);
        return view('backend.pendidikan.index', compact('pendidikans'));
    }

    public function destroy(UserPendidikan $pendidikan)
    {
    	$pendidikan->delete();
        session()->flash('flash_success', 'Berhasil menghapus data Riwayat Pendidikan dengan id :'.$pendidikan->user_id);
        return redirect()->route('admin.pendidikan.index');
    }

    public function show(UserPendidikan $pendidikan)
    {
        
        $user=User::where('id',$pendidikan->user_id)->pluck('email');

        $file = Storage::url($pendidikan->file_ijazah);
        
        $jenjang=RefJenjangPendidikan::where('id',$pendidikan->jenjang_id)->pluck('tingkat');

        return view('backend.pendidikan.show', compact('pendidikan','user','jenjang','file'));
    }

    
    public function create()
    {
        $user=User::pluck('email','id');
        $jenjang=RefJenjangPendidikan::pluck('tingkat','id');
        return view('backend.pendidikan.create', compact('user','jenjang'));
    }

    public function store(Request $request)
    {

        $this->validate($request, $this->validation_rules);
        
        $pendidikan = new UserPendidikan();
        $pendidikan->user_id = $request->input('user_id');
        $pendidikan->jenjang_id = $request->input('jenjang_id');
        $pendidikan->nama_sekolah = $request->input('nama_sekolah');
        $pendidikan->tahun_masuk = $request->input('tahun_masuk');
        $pendidikan->jurusan = $request->input('jurusan');
        $pendidikan->tahun_lulus = $request->input('tahun_lulus');
        $pendidikan->dalam_negeri = $request->input('dalam_negeri');
        $pendidikan->lokasi_sekolah = $request->input('lokasi_sekolah');
        $pendidikan->nomor_ijazah = $request->input('nomor_ijazah');

            if($request->file('file_ijazah')->isValid())
            {
             $filename = uniqid('ijazah-');
             $fileext = $request->file('file_ijazah')->extension();
             $filenameext = $filename.'.'.$fileext;

             $filepath = $request->file_ijazah->storeAs('file_ijazah',$filenameext);

             $pendidikan->file_ijazah = $filepath;
            }

        try {
            if($pendidikan->save()){
               session()->flash('flash_success', 'Berhasil menambahkan data riwayat pendidikan dengan id user = '. $request->input('user_id'));
                return redirect()->route('admin.pendidikan.index');
            }
        } catch (Exception $e) {
            session()->flash('flash_success', 'error'. $e);
                return redirect()->back();
        }


 
    }

    public function edit(UserPendidikan $pendidikan)
    {
        $user=User::pluck('email','id');
        $jenjang=RefJenjangPendidikan::pluck('tingkat','id');  
       return view('backend.pendidikan.edit', compact('pendidikan','user','jenjang'));
    }

     public function update(Request $request, UserPendidikan $pendidikan)
    {
         $this->validate($request, $this->validation_rules);
        
    $pendidikan = UserPendidikan::findOrFail($pendidikan->id);
    

        $pendidikan->user_id = $request->id;
        $pendidikan->user_id = $request->user_id;
        $pendidikan->jenjang_id = $request->jenjang_id;
        $pendidikan->nama_sekolah = $request->nama_sekolah;
        $pendidikan->tahun_masuk = $request->tahun_masuk;
        $pendidikan->jurusan = $request->jurusan;
        $pendidikan->tahun_lulus = $request->tahun_lulus;
        $pendidikan->dalam_negeri = $request->dalam_negeri;
        $pendidikan->lokasi_sekolah = $request->lokasi_sekolah;
        $pendidikan->nomor_ijazah = $request->nomor_ijazah;



     if($request->file('file_ijazah')->isValid())
            {
             $filename = uniqid('ijazah-');
             $fileext = $request->file('file_ijazah')->extension();
             $filenameext = $filename.'.'.$fileext;

             $filepath = $request->file_ijazah->storeAs('file_ijazah',$filenameext);
             $path = Storage::putFile('file_ijazah', $request->file('file_ijazah'));

             $pendidikan->file_ijazah = $path;
            }
    $pendidikan->update();

    return redirect()->route('admin.pendidikan.show',[$pendidikan->id]);
     
    
    }

    public function getDownload($type, $ikan, $file_id){
        //PDF file is stored under project/public/download/info.pdf
        $lokasi = null;
        if ($type == 'dokumen') {
            $lokasi = 'file_ijazah';
        }

        return response()->file(
            storage_path('app/'.$lokasi.'/'.$file_id)
        );     
    }

}
