<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\News;

class HomeController extends Controller
{

    /**
     * Show the Home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all()->take(3);
        return view('web.home');
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
}
