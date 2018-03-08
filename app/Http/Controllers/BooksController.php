<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HttpRequests;
use App\Books;
use App\Http\Resources\Books as BooksResource;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get books
        $books = Books::paginate(15);

        // Return collection as resource
        return BooksResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $books = $request->isMethod('put') ? Books::findOrFail($request->book_id) : new Books;
        
        $books->id = $request->input('book_id');
        $books->title = $request->input('title');
        $books->description = $request->input('description');
        $books->isbn = $request->input('isbn');
        $books->author = $request->input('author');
        $books->publisher = $request->input('publisher');

        if($books->save()) {
            return new BooksResource($books);
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
        // Get book
        $books = Books::findOrFail($id);

        // Return single book as resource
        return new BooksResource($books);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get book
        $books = Books::findOrFail($id);

        if($books->delete()) {
            return new BooksResource($books);
        }
    }
}
