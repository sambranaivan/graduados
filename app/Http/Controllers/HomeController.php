<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Exception;
use App\Models;

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
            /*$type_new = Models\TypeNew::where('description', 'General')->first()->typenew_id;*/
            $news = Models\News::all()->where('great',1)->where('destacado', 1)->sortBy('publication_date')->take(3);
        }
        catch (Exception $e) {
            $news = collect([]);
        }

        return view('web.home', compact('news'));
    }

    /**
     * Show the SignIn page.
     *
     * @return \Illuminate\Http\Response
     */
    public function signin()
    {
        return view('web.signin');
    }

    /**
     * Show the News page.
     *
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        try {
            $type_new = Models\TypeNew::where('description', 'General')->first()->typenew_id;
            $news = Models\News::all()->where('great', 1)->where('typenew_id', $type_new)->sortBy('publication_date');
        }
        catch (Exception $e) {
            $news = collect([]);
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
        $preguntas = Models\Faq::all();
        return view('web.faq', compact('preguntas'));
    }

    /**
     * Show the Courses page.
     *
     * @return \Illuminate\Http\Response
     */
    public function courses()
    {
        try {
            $type_new = Models\TypeNew::where('description', 'Cursos')->first()->typenew_id;
            $courses = Models\News::all()->where('great', 1)->where('typenew_id', $type_new)->sortBy('publication_date');
        }
        catch (Exception $e) {
            $courses = collect([]);
        }

        return view('web.courses', compact('courses'));
    }

    /**
     * Show the Business page.
     *
     * @return \Illuminate\Http\Response
     */
    public function companies()
    {
        // TODO: Traer todas las empresas y asignar en companies
        $companies = collect([]);

        return view('web.companies', compact('companies'));
    }

    /**
     * Show the Business page.
     *
     * @return \Illuminate\Http\Response
     */
    public function offers()
    {
        try {
            $type_new = Models\TypeNew::where('description', 'Ofertas Laborales')->first()->typenew_id;
            $offers = Models\News::all()->where('great', 1)->where('typenew_id', $type_new)->sortBy('publication_date');
        }
        catch (Exception $e) {
            $offers = collect([]);
        }

        return view('web.offers', compact('offers'));
    }

    public function showNews($id){
        $new = Models\News::where('new_id', $id)->get();
       // dd($new);
        return view('web.new', compact('new'));
    }
    public function showCourse($id){
        $new = Models\News::where('new_id', $id)->get();
       // dd($new);
        return view('web.new', compact('new'));
    }

}
