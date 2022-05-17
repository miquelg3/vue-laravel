<?php
// controlador per a poder passar els datos del modal des de vue fins a la base de datos

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Records;
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

    // Del boto.vue
    public function listar_posts(){
        $id = Auth::user()->id;
        return Post::where("propietari", $id)->get();
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
            'propietari' => Auth::user()->id,
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

    // Del SimonDice.vue
    
    public function listar_records(){
        $id = Auth::user()->id;
        return Records::where("idjugador", $id)->get();
    }

    public function guardar_record(Request $request) {
        
        $data = request()->validate([
            'joc' => ['required'],
            'record' => ['required']
        ]);

        return Records::create([
            'joc' => $request->joc,
            'record' => $request->record,
            'idjugador' => Auth::user()->id,
            'idname' => Auth::user()->name
        ]);

    }
    
    // Per a fer logout

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

}
