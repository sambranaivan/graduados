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

    public function noticia_general()
    {
        $type_new = TypeNew::where('description', 'General')->first()->typenew_id;
        $news =  News::with('type')->where('typenew_id', $type_new)->get();
        $resources["data"] = [];
        foreach ($news as $key => $value) {
            $resources['data'][]=$value;
        }
        return response()->json($resources);
    }
    public function cursos()
    {
        $type_new = TypeNew::where('description', 'Cursos')->first()->typenew_id;
        $news =  News::with('type')->where('typenew_id', $type_new)->get();
        $resources["data"] = [];
        foreach ($news as $key => $value) {
            $resources['data'][]=$value;
        }
        return response()->json($resources);
    }
    public function ofertas_laborales()
    {
        $type_new = TypeNew::where('description', 'Ofertas Laborales')->first()->typenew_id;
        $news =  News::with('type')->where('typenew_id', $type_new)->get();
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
        try {
            $carrera = Career::pluck('name','career_id');
            $type = TypeNew::pluck('description','typenew_id');
        }
        catch (Exception $e) {
            $type = [];
        }
        return view('auth.dashboard.news.index', compact('type','carrera'));
    }

    public function cursosall()
    {
        try {
            $carrera = Career::pluck('name','career_id');
            $type = TypeNew::pluck('description','typenew_id');
        }
        catch (Exception $e) {
            $type = [];
        }
        return view('auth.dashboard.cursos.index', compact('type','carrera'));
    }

    public function ofertasall()
    {
        try {
            $carrera = Career::pluck('name','career_id');
            $type = TypeNew::pluck('description','typenew_id');
        }
        catch (Exception $e) {
            $type = [];
        }
        return view('auth.dashboard.oferta_laboral.index', compact('type','carrera'));
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
        //dd($request['des']);
        $publication_date = explode("/", $request['publication_date']);
        $publication_d= $publication_date[2].'-'.$publication_date[1].'-'.$publication_date[0];
        $end_publication = explode("/", $request['end_publication']);
        $end_pu = $end_publication[2].'-'.$end_publication[1].'-'.$end_publication[0];
        $photo = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(public_path('assets/img/photo_news'), $photo);
        $path_image = "assets/img/photo_news/" . $photo;
        //dd($request['type']);
        if ($request['type'] == 'General') {
            $type = 1;
        }elseif ($request['type'] == 'Cursos') {
            $type = 2;
        }else{
            $type = 3;
        }

        if ($request->ajax()) {
            News::create([
                'title'=>$request['title'],
                'pompadour'=>$request['pompadour'],
                'body'=>$request['body'],
                'photo'=>$photo,
                'typenew_id'=>$type,
                'career_id'=>$request['carrera'],
                'great'=>'1',
                'publication_date'=>$publication_d,
                'end_publication'=>$end_pu,
                'destacado'=>$request['des'],
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
            $publication_date = explode("/", $request['publication_date']);
            $publication_d= $publication_date[2].'-'.$publication_date[1].'-'.$publication_date[0];
            $end_publication = explode("/", $request['end_publication']);
            $end_pu = $end_publication[2].'-'.$end_publication[1].'-'.$end_publication[0];
            if ($request['type'] == 'General') {
                $type = 1;
            }elseif ($request['type'] == 'Cursos') {
                $type = 2;
            }else{
                $type = 3;
            }

            if ($request->hasFile('photo'))
            {

                $photo = time().'.'.$request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('assets/img/photo_news'), $photo);
                $path_image = "assets/img/photo_news/" . $photo;
                $news->fill([
                    'title' => $request['title'],
                    'pompadour' => $request['pompadour'],
                    'body' => $request['body'],
                    'photo' => $photo,
                    'typenew_id' =>  $type,
                    'career_id' => $request['carrera'],
                    'great' => '1',
                    'publication_date' => $publication_d,
                    'end_publication' => $end_pu,
                    'great' => $request['great'],
                    'destacado'=>$request['des'],
                ]);
            } else {
                $news->fill([
                    'title' => $request['title'],
                    'pompadour' => $request['pompadour'],
                    'body' => $request['body'],
                    'typenew_id' =>  $type,
                    'career_id' => $request['carrera'],
                    'great' => '1',
                    'publication_date' => $publication_d,
                    'end_publication' => $end_pu,
                    'great' => $request['great'],
                    'destacado'=>$request['des'],
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
