<?php

namespace App\Http\Controllers;

use App\Article;
use App\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$articles = Article::with('user')
			->where('user_id', \Auth::id())
			->latest()
			->get();

		return view('articles.index', compact('articles'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function indexAll()
	{
		$articles = Article::with('user')
			->latest()
			->get();

		return view('articles.index_all', compact('articles'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = $this->validateArticle();
		$data['user_id'] = \Auth::id();
    	Article::create($data);

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
		return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
		return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
		$article->update($this->validateArticle());

		return redirect(route('articles.show', $article));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Article $article
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
    public function destroy(Article $article)
    {
		$article->delete();

		return redirect(route('articles.index'));
    }

    protected function validateArticle()
	{
		return request()->validate([
			'title' => 'required',
			'body' => 'required',
		]);
	}
}
