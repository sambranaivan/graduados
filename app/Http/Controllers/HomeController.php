<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\TypeNew;

class HomeController extends Controller
{

    /**
     * Show the Home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $type_new = TypeNew::where('description', 'General')->first()->typenew_id;  
       $news = News::all()->where('great',1)->where('typenew_id',$type_new)->sortBy('publication_date')->take(3);
       return view('web.home', compact('news'));
       
    }

    /**
     * Show the New page.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
    	return view('web.new');
    }

    /**
     * Show the FAQ page.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {
        return view('web.faq');
    }

    /**
     * Show the Courses page.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        return view('web.courses');
    }

    /**
     * Show the Business page.
     *
     * @return \Illuminate\Http\Response
     */
    public function business()
    {
        return view('web.business');
    }

    public function showNews($id){
        $news = News::where('new_id',$id)->get();
        return view('web.new', compact($news));          
    }
}
