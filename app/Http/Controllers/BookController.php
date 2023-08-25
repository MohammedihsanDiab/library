<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Book::all();
    }

    public function singelindex(Request $request ,string $id)
    {
        $book = book::find($id);
        if ($book) {
            return response()->json([
                "status" => true,
                "message" => "Book data retuned",
                "data" => $book
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Book Not Found",
                "data" => []
            ], 401);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(),
            [
                'title' => 'required|max:50|min:2',
                'name' => 'required|max:255|min:2',
                'numpages' => 'required|max:10000',
                'date' => 'required',
                'img' => 'required'
            ]
        );
        if ($valid->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Book created failed",
                "data" => [
                    'errors' => $valid->errors(),
                ]
            ]);
        }
        
        // $img = $request->file('img')->store('uploades');
        $img = $request->file("img");
        $image_name = $img->getClientOriginalName();
        $image_name = time() . '_' . $image_name;
        $img->move(public_path('uploades'), $image_name);

        $book = new Book();
        $book->title = $request->title;
        $book->name = $request->name;
        $book->numpages = $request->numpages;
        $book->date = $request->date;
        $book->img = $image_name;

        if ($book->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Book created successfully',
                'data' => $book,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Book created failed',
                'data' => []
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $search = '')
    {
        if ($search) {
            $book = Book::all();
        }
        $book = Book::where('name' , 'like' , '%' . $search . '%')
            ->orWhere('title' , 'like' , '%' .$search . '%')
            ->orWhere('date' , 'like' , '%' . $search . '%')->get();
        
        return $book;

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = book::find($id);
        if ($book) {
            return response()->json([
                "status" => true,
                "message" => "Book data retuned",
                "data" => $book
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Book Not Found",
                "data" => []
            ], 401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $valid = Validator::make($request->all(),
            [
                'title' => 'required|max:50|min:2',
                'name' => 'required|max:255|min:2',
                'numpages' => 'required|max:10000',
                'date' => 'required',
                'img' => 'required'
            ]
        );
        if ($valid->fails()) {
            return response()->json([
                "status" => false,
                "message" => "Book created failed",
                "data" => [
                    'errors' => $valid->errors(),
                ]
            ]);
        }
        
            $img = $request->file("img");
            $image_name = $img->getClientOriginalName();
            $image_name = time() . '_' . $image_name;
            $img->move(public_path('uploades'), $image_name);
            $book = book::find($id);
            
            $book->title = $request->title;
            $book->name = $request->name;
            $book->numpages = $request->numpages;
            $book->date = $request->date;
            $book->img = $image_name;

        if ($book->save()) {
            return response()->json([
                'status' => true,
                'message' => 'Book Edit successfully',
                'data' => $book,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Book Edit failed',
                'data' => []
            ], 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = book::find($id);
        if ($book->delete()) {
            return response()->json([
                'status' => true,
                'message' => 'Book deleted successfully',
                'data' => $book,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Book delete failed',
                'data' => []
            ], 401);
        }
    }
}
