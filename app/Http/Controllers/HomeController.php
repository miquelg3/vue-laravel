<?php
// controlador per a poder passar els datos del modal des de vue fins a la base de datos

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller {
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function crear(Request $request) {
        
        $data= request()->validate([
            'nom' => ['required', 'string', 'max:255'],
            'urlweb' => ['required', 'string', 'url', 'max:255', 'unique:users'],
            'urlimagen' => ['required', 'string', 'url', 'max:255', 'unique:users'],
        ]);

        return Post::create([
            'nom' => $request->nom,
            'urlweb' => $request->urlweb,
            'imagen' => $request->urlimagen
        ]);

    }
}
