<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HttpRequests;
use App\Authors;
use App\Http\Resources\Authors as AuthorsResource;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get authors
        $authors = Authors::paginate(15);

        // Return collection as resource
        return AuthorsResource::collection($authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $authors = $request->isMethod('put') ? Authors::findOrFail($request->author_id) : new Authors;
        
        $authors->id = $request->input('author_id');
        $authors->name = $request->input('name');
        $authors->location = $request->input('location');

        if($books->save()) {
            return new AuthorsResource($authors);
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
        // Get authors
        $authors = Authors::findOrFail($id);

        // Return single authors as resource
        return new AuthorsResource($authors);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get authors
        $authors = Authors::findOrFail($id);

        if($authors->delete()) {
            return new AuthorsResource($authors);
        }
    }
}
