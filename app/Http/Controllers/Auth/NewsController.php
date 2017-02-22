<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\TypeNew;
use DB;

class NewsController extends Controller
{
    public function getType(Request $request){
        if ($request->ajax()) {
            $type = TypeNew::tip_zon();
            return response()->json($type);
        }

    }
    /**
     * Display a listing type newsS.
     *
     * @return \Illuminate\Http\Response
     */
    public function listing(){
        $news = DB::table('news')
            ->join('type_news', 'news.typenew_id', '=', 'type_news.typenew_id')
            ->select('news.*', 'type_news.description AS tipo_noticia')
            ->get();
        foreach ($news as $key => $value) {
            $resources['data'][]=$value;
        }
        return response()->json($resources);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.dashboard.news.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
