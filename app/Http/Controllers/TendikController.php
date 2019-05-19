<?php

namespace App\Http\Controllers;

// use App\Mahasiswa;
use App\Tendik;
use Illuminate\Http\Request;


class TendikController extends Controller
{
    public function index(){
    	// echo "Disini akan tampil daftar nama tendik";

    	$tendiks = Tendik::paginate(25);
        return view('backend.tendik.index', compact('tendiks'));
    }
}
