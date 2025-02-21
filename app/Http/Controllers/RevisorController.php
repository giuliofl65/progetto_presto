<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        $rejected_articles = Article::where('is_accepted', false)->get();
        return view('revisor.index', compact('article_to_check', 'rejected_articles'));
    }
    public function accept(Article $article){
        // $article->setAccepted(true);
        $article->is_accepted= true;
        $article->save();
        return redirect()->back()->with('message', "Hai accettato l'articolo $article->title");
    }



    public function reject(Article $article){
        // $article->setAccepted(false);
        $article->is_accepted= false;
        $article->save();
        return redirect()->back()->with('message', "Hai rifiutato l'articolo $article->title");
    }

    public function revert(Article $article){

        if ($article->is_accepted !== null) {
            $article->is_accepted = null;
            $article->save();
            return redirect()->route('revisor.index')->with('message', "Hai annullato la decisione sull'articolo '{$article->title}'");
        }

    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->route('homepage')->with('message', 'Hai richiesto di diventare un revisor');
    }

    public function makeRevisor(User $user){
        Artisan::call('app:make-user-revisor', ['email'=> $user->email]);
        return redirect()->back();
    }
}
