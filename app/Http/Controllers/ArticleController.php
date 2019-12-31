<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct(Gate $gate)
    {
        $gate->define('manage-article', function($user){
            return $user->roleAdmin() || $user->roleEditor();
        } );
        $gate->define('see-article', function($user){
            return $user->roleAdmin() || $user->roleEditor() || $user->roleNormal();
        } );

       $this->middleware(['auth', 'can:see-article'])->only(['index', 'show']);
       $this->middleware(['auth', 'can:manage-article'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Tag $tag
     * @return Response
     */
    public function index()
    {
        $tag = null;
        if (request('tag')) {
            $tag = Tag::where('slug', request('tag'))->firstOrFail();
            $articles = $tag->articles;
        } else {
            $articles = Article::latest()->get();
        }
        return view('articles.index', ['articles' => $articles, 'tag' => $tag]);
    }

    public function list()
    {
//dd(Auth::user()->roleCode());
        $articles = Article::where('user_id', Auth::id())->latest()->get();
        return view('articles.list', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('articles.create', [
        'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validateArticle();
        $article = new Article(request(['title', 'slug', 'excerpt', 'content']));
        $article->user_id = Auth::id();
        if ($image = $request->file('image')) {
            $destinationPath = 'uploads/images/'; // upload path
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $article->image = $destinationPath . $profileImage;
        }



        $article->save();
        if (request()->has(('tags'))) {
            $article->tags()->attach(request('tags'));
        }

        return redirect(route('articles.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show($slug)
    {
        $article= Article::where('slug', $slug)->firstOrFail();
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        if($article->user_id == Auth::id()) {
            return view('articles.edit', compact('article'), ['tags' => Tag::all()]);
        } else{
            return redirect($article->path());
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return void
     */
    public function update(Request $request, Article $article)
    {
        if($article->user_id == Auth::id()) {
            $attrs = $this->validateArticle();
            // Check if a profile image has been uploaded
            if ($image = $request->file('image')) {
                $destinationPath = 'uploads/images/'; // upload path
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $attrs['image']= $destinationPath . $profileImage;
            }

            $article->update($attrs);
        }

        return redirect(route('articles.list'));
        //return redirect($article->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        if($article->user_id == Auth::id()) {
            $article->delete();
        }

    }

    protected function validateArticle()
    {

        $attrs = request()->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:articles|max:50',
            'excerpt' => 'max:100',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'exists:tags,id'
        ]);




        return $attrs;

    }
}
