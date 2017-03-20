<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\TypeNew;

class TypeNewsController extends Controller
{
    /**
     * Display a listing type newsS.
     *
     * @return \Illuminate\Http\Response
     */

    public function listing()
    {
        $type_news = TypeNew::all();
        $resources["data"] = [];

        foreach ($type_news as $key => $value) {
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
        return view('auth.dashboard.type_news.index');
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
        if ($request->ajax()) {
           TypeNew::create([
             'description' => $request['description'],
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
        $type_new = TypeNew::where('typenew_id',$id)->get();
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $type_new =TypeNew::findOrFail($id);
        return response()->json(
          $type_new->toArray()
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
        $type_new =TypeNew::findOrFail($id);
        $type_new->fill([
               'description'=>$request['description'],
        ]);
        $type_new->save();
        
        return response()->json([
            "mensaje"=>"modificación exitosa"
        ]);
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
