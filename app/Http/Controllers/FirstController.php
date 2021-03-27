<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class FirstController extends Controller
{
    public function index() {
        
        $songs= Song::all();
        
        return view("firstController.index", ["songs" => $songs]);
    }

    public function about(){
        return view("firstController.about");
    }
    public function article($id){
        return view("firstController.article", ["id" => $id] );
    }

    public function user($id){

        $user = User::findOrFail($id);

        return view("firstController.user",["user" => $user]);
    }

    public function search($search){

        $users = User::whereRaw("name LIKE CONCAT(?, '%')", [$search])->orderBy('id', 'desc')->get();
        $songs = Song::whereRaw("title LIKE CONCAT('%', ?, '%')", [$search])->orderBy('votes', 'desc')->get();

        return view("firstController.search",["search" => $search,"songs" => $songs,"users" => $users]);
    }

    public function create(){
        return view ("firstController.create");
    }
    public function store(Request $request){
       
        $request->validate([
            'title' => 'required|min:4|max:255',
            'song' => 'required|file|mimes:mp3,ogg'
        ]);

        $name = $request->file('song')->hashName();
        $request->file('song')->move("uploads/".Auth::id(),$name);
        $song = new Song();
        $song->title = $request->input('title');
        $song->url = "/uploads/".Auth::id()."/".$name;
        $song->user_id = Auth::id();
        $song->votes = 0;
        $song->save();
        return redirect("/")->with('toastr', ["status"=>"info", "message" => "Nouveaux son ajouté"]);;
    }
    public function changeFollow($id) {
        Auth::user()->IFollowThem()->toggle($id);
        return back()->with('toastr', ["status"=>"success", "message" => "Modification du suivi"]);
    }
    public function changeLike($id) {
        Auth::user()->ILikeThem()->toggle($id);
        return back()->with('toastr', ["status"=>"success", "message" => "Modification du suivi"]);
    }

    /* public function languege(String $locale){
        $locale = in_array($locale, config('app.locales')) ? $locale : config('app.fallback_locale');

        session(['locale' => $locale]);

        return back();
    } */
}
