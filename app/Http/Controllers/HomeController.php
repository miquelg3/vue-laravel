<?php
// controlador per a poder passar els datos del modal des de vue fins a la base de datos

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance
     * 
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request) {
        
        $data = request()->validate([
            'nom' => ['required', 'string', 'max:255'],
            'linkweb' => ['required', 'string', 'max:255'],
            'linkimage' => ['required', 'string', 'max:255'],
        ]);

        return Post::create([
            'nom' => $request->nom,
            'linkweb' => $request->linkweb,
            'linkimage' => $request->linkimage,
            'propietari' => Auth::user()->name,
        ]);

    }
}
