<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;

class PageController extends Controller
{
    public function index(){

        $num_products = Comic::count();

        return view('home', compact('num_products'));
    }

    public function nuovaPagina(){
        return view('nuova-pagina');
    }
}