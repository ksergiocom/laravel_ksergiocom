<?php

namespace App\Http\Controllers;

use App\Models\Tecnologia;
use Illuminate\Http\Request;

class TecnologiaController extends Controller
{
    public function show(String $nombre)
    {
        $tecnologia = Tecnologia::where('nombre',$nombre)->firstOrFail();

        return view('tecnologia',[
            'tecnologia' => $tecnologia,
        ]);
    }
}
