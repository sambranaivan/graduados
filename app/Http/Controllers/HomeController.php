<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\TypeNew;
use Exception;

class HomeController extends Controller
{

    /**
     * Show the Home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $type_new = TypeNew::where('description', 'General')->first()->typenew_id;  
            $news = News::all()->where('great',1)->where('typenew_id', $type_new)->sortBy('publication_date')->take(3);
        }
        catch (Exception $e) {
            $news = [];
        }

        return view('web.home', compact('news'));
    }

    /**
     * Show the News page.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        try {
            $type_new = TypeNew::where('description', 'General')->first()->typenew_id;
            $news = News::all()->where('great', 1)->where('typenew_id', $type_new)->sortBy('publication_date');
        }
        catch (Exception $e) {
            $news = [];
        }

    	return view('web.news', compact('news'));
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
        try {
            $type_new = TypeNew::where('description', 'Cursos')->first()->typenew_id;
            $courses = News::all()->where('great',1)->where('typenew_id',$type_new)->sortBy('publication_date');
        }
        catch (Exception $e) {
            $courses = [];
        }

        return view('web.courses', compact('courses'));
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
        $new = News::where('new_id',$id)->get();

        return view('web.new', compact($new));          
    }

}
