<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Feed;
use Auth;

class RssFeedController extends Controller
{
	/**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	$categories = Auth::user()
            ->categories()
            ->paginate(5);

        return view('home', [
            'categories' => $categories
        ]);
    }

    public function addCategoryForm(Request $request){
    	return view('add-category');
    }

    public function addCategory(Request $request){
    	// validate the given request
        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Auth::user()->categories()->create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        // flash a success message to the session
        session()->flash('status', 'Category Added!');

        // redirect to tasks index
        return redirect('/home');
    }

    public function destroy(Category $category){
    	$category->feed()->delete();
    	$category->delete();
    	// flash a success message to the session
        session()->flash('status', 'Category Deleted!');
    	return redirect('/home');
    }

    public function addRssFeedForm(Category $category){
    	$feeds = $category
            ->feed()
            ->paginate(5);
    	return view('add-rss-feed', ['feeds' => $feeds, 'category' => $category]);
    }

    public function addRssFeed(Request $request, Category $category){
    	$data = $this->validate($request, [
            'link' => 'required|url',
        ]);

    	$category->feed()->create([
    		'rss' => $data['link']
    	]);

    	// flash a success message to the session
        session()->flash('status', 'RSS Feed Added!');

    	return redirect('/add-rss/'.$category->id);
    }

    public function destroyRssFeed(Category $category, Feed $feed){
    	$feed->delete();

    	// flash a success message to the session
        session()->flash('status', 'RSS Feed Deleted!');

    	return redirect('/add-rss/'.$category->id);
    }

    public function showCategory(){
    	$categories = Category::paginate(5);

        return view('welcome', [
            'categories' => $categories
        ]);
    }

    public function singleCategory(Category $category){
    	$feeds = $category->feed()->paginate(5);
    	return view('single-category', [
            'feeds' => $feeds,
            'category' => $category,
        ]);
    }
}
