<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol = Role::pluck('name','id');
        return view('auth.dashboard.usuarios.index', compact('rol'));
    }
    public function usuarios_all()
    {
        $users  = User::all();
        $resources["data"] = [];
        foreach ($users as $key => $value) {
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
            User::create([
                    'name'=>$request['name'],
                    'password'=>bcrypt($request['password']),
                    'email'=>$request['email'],
                    'phone'=>$request['phone'],
               ]);
            return response()->json([
            "mensaje"=>"Registro Agregado"
        ]);

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
        $user = User::findOrFail($id);
        return response()->json(
            $user->toArray()
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
        $user = User::findOrFail($id);

        if ($request->ajax())
        {           
            if (empty($request['password'])) {
                $user->fill([
                    'name'=>$request['name'],
                    'email'=>$request['email'],
                    'phone'=>$request['phone'],
                ]);
                # code...
            } else {
                $user->fill([
                    'name'=>$request['name'],
                    'password'=>bcrypt($request['password']),
                    'email'=>$request['email'],
                    'phone'=>$request['phone'],
                ]);
            }
            
            $user->save();
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
