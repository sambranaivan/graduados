<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preguntas = Faq::all();
        return view('auth.dashboard.faqs.index',compact('preguntas'));


    }
    /**
     * Show all files faqs json
     *@return \Illuminate\Http\Response
     */
    public function all_faqs(){
        $faqs = Faq::all();
        $resources["data"] = [];
        foreach ($faqs as $key => $value) {
            $resources['data'][]=$value;
        }
        return response()->json($resources);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('auth.dashboard.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('el_adjunto'))
        {
            if ($request->ajax()) {
                Faq::create([
                    'title'=>$request['title'],
                    'description'=>$request['description'],
                    'url_file'=>'sin contenido',
                    ]);
            }
        }else{
            $this->validate($request, [
                'el_adjunto' => 'mimes:pdf|max:4096',
            ]);
            $fileName = $request->el_adjunto->getClientOriginalName();
            $request->el_adjunto->move(public_path('assets/pdf'), $fileName);
            $path_file = "assets/pdf/" . $fileName;
            if ($request->ajax()) {
                Faq::create([
                    'title'=>$request['title'],
                    'description'=>$request['description'],
                    'url_file'=>$path_file,
                    ]);
            }
        }
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
        $faq = Faq::findOrFail($id);
        return response()->json(
            $faq->toArray()
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
        $faq = Faq::findOrFail($id);
        if($request->ajax())
        {
            if ($request->hasFile('el_adjunto'))
            {
                $this->validate($request, [
                    'el_adjunto' => 'mimes:pdf|max:4096',
                    ]);
                $fileName = $request->el_adjunto->getClientOriginalName();
                $request->el_adjunto->move(public_path('assets/pdf'), $fileName);
                $path_file = "assets/pdf/" . $fileName;
                $faq->fill([
                    'title'=>$request['title'],
                    'description'=>$request['description'],
                    'url_file'=>$path_file,
                ]);
            } else {
                $faq->fill([
                    'title'=>$request['title'],
                    'description'=>$request['description'],
                ]);
            }
            $faq->save();
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
