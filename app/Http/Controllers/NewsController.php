<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\View\View;
use App\Models\Comment;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends Controller
{
    public function index(): View
    {
    	$mainNews = News::orderBy('created_at', 'desc')->limit(1)->get()->first();

    	$news = News::orderBy('created_at', 'desc')->limit(10)->offset(1)->get();

        return view('news', [
        	'mainNews' => $mainNews,
            'news' => $news
        ]);
    }

    public function getNews($id)
    {
    	$news = News::find($id);

    	return view('news-detail', [
            'news' => $news
    	]);
    }

    public function getNewsByCategory($category)
    {
        $category = Category::find($category);

        $news = $category->news;

    	return view('news-by-category', [
            'news' => $news,
            'category' => $category
    	]);
    }

    public function getCategories() {

        return Category::all();
    }

    public function doComment(Request $request)
    {
        $validated = $request->validate([ 
            'news_id' => 'required|max:50',
            'comment' => 'required|max:50',
        ]);

        $user = Session::get('user');
        $validated['user_id'] = $user['user_id'];

        $input = $request->only(['user_id', 'news_id', 'comment']);
        
        Comment::create($input);
    }

    public function doLike(Request $request)
    {
        $validated = $request->validate([ 
            'news_id' => 'required|max:50',
            'comment_id' => 'required|max:50',
            'like' => 'required',
        ]);

        $user = Session::get('user');
        $validated['user_id'] = $user['user_id'];

        $input = $request->only(['user_id', 'news_id', 'comment_id', 'like']);
        
        Like::create($input);
    }
}
