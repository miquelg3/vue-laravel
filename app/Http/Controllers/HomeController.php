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

    public function listar_posts(){
        $name = Auth::user()->name;
        return Post::where("propietari", $name)->get();
    }

    public function crear(Request $request) {
        
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
    // idPost és la variable que li haviem indicat en routes/web.php
    public function update(Request $request, Post $idPost) {
        
        $data = request()->validate([
            'nom' => ['required', 'string', 'max:255'],
            'linkweb' => ['required', 'string', 'max:255'],
            'linkimage' => ['required', 'string', 'max:255'],
        ]);

        // Per a que utilitze la funció de dalt i s'actualitza, es fa el següent

        $idPost->update($data);

    }

    public function delete(Post $idPost) {
        
        $idPost->delete();

    }

}
