<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\TypeNew;
use App\Models\Career;

class NewsController extends Controller
{
    
    /**
     * Display a listing type news.
     *
     * @return \Illuminate\Http\Response
     */

    public function listing()
    {
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
        $carrera = Career::pluck('name','career_id');
        $type = TypeNew::pluck('description','typenew_id');
        return view('auth.dashboard.news.index', compact('type','carrera'));
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
                'career_id'=>$request['carrera'],
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
    public function show($id)
    {

    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);
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
        $news = News::findOrFail($id);

        if ($request->ajax())
        {
            if ($request->hasFile('photo_m')) 
            {
                $photo = time().'.'.$request->photo_m->getClientOriginalExtension();
                $request->photo_m->move(public_path('assets/img/photo_news'), $photo);
                $path_image = "assets/img/photo_news/" . $photo;
                $news->fill([
                    'title' => $request['title_m'],
                    'pompadour' => $request['pompadour_m'],
                    'body' => $request['body_m'],
                    'photo' => $path_image,
                    'typenew_id' => $request['type_m'],
                    'career_id' => $request['carrera_m'],
                    'great' => '0',
                    'publication_date' => $request['publication_date_m'],
                    'end_publication' => $request['end_publication_m'],
                ]);
            } else {
                $news->fill([
                    'title' => $request['title_m'],
                    'pompadour' => $request['pompadour_m'],
                    'body' => $request['body_m'],
                    'typenew_id' => $request['type_m'],
                    'career_id' => $request['carrera_m'],
                    'great' => '0',
                    'publication_date' => $request['publication_date_m'],
                    'end_publication' => $request['end_publication_m'],
                ]);
            }

            $news->save();
        }
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
