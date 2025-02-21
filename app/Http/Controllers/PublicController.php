<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(8)->get();
        return view('welcome', compact('articles'));
    }

    public function aboutUs(){
        $teamMembers = [
            [
                'name' => 'Gianluca Nicastri',
                'role' => 'Co-Founders',
                'image' => 'media/team/foto-gian.jpg',
                'description' => 'Gianluca è il fondatore dell\'azienda e guida il team con passione e visione strategica.',
            ],
            [
                'name' => 'Daniele Izzi',
                'role' => 'Co-Founders',
                'image' => 'media/team/Daniele.png',
                'description' => 'Daniele è responsabile della tecnologia e guida lo sviluppo dei nostri prodotti innovativi.',
            ],
            [
                'name' => 'Giulio Floro',
                'role' => 'Co-Founders',
                'image' => 'media/team/Giulio.jpeg',
                'description' => 'Giulio gestisce le nostre campagne di marketing e cura la comunicazione aziendale.',
            ],
            [
                'name' => 'Francesco Iannaccone',
                'role' => 'Co-Founders',
                'image' => 'media/team/Francesco2.jpg',
                'description' => 'Francesco coordina i progetti con precisione, garantendo il rispetto delle scadenze.',
            ],
            [
                'name' => 'Rodolfo Pio Mastrogiulio',
                'role' => 'Co-Founders',
                'image' => 'media/team/Rodolfo.jpg',
                'description' => 'Rodolfo si occupa della creatività e del design dei nostri prodotti e materiali visivi.',
            ],
        ];
        return view('aboutUs', compact('teamMembers'));
    }

    public function searchArticles(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::search($query)->where('is_accepted', true)->paginate(10);
        return view('article.searched', ['articles' => $articles, 'query' => $query]);
    }
    public function setLanguage($lang)
    {

        session()->put('locale', $lang);
        return redirect()->back();
    }
}
