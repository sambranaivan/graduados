<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\TypeNew;


class NewsController extends Controller
{
    
    /**
     * Display a listing type news.
     *
     * @return \Illuminate\Http\Response
     */

    public function listing(){
        $news =  News::with('type')->get();
        $resources["data"] = [];
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
        $type = TypeNew::pluck('description','typenew_id');
        return view('auth.dashboard.news.index', compact('type'));
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
        $photo = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('assets/img/photo_news'), $photo);
        $path_image = "assets/img/photo_news/" . $photo;

        if ($request->ajax()) {
           News::create([
             'title'=>$request['title'],
             'pompadour'=>$request['pompadour'],
             'body'=>$request['body'],
             'photo'=>$path_image,
             'typenew_id'=>$request['type'],
             'great'=>'0',
             'publication_date'=>$request['publication_date'],
             'end_publication'=>$request['end_publication'],

           ]);
        }
        return response()->json([
           "mensaje"=>"Registro Agregado"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){}
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new =News::findOrFail($id);
        return response()->json(
          $new->toArray()
        );
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