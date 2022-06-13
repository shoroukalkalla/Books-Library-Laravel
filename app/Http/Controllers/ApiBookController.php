<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ApiBookController extends Controller
{
    public function index()
    {
        $books = Book::get();
        return response()->json($books);
    }

    //====================================================================================================================================//

    public function show($id)
    {
        $book = Book::with('categories')->FindOrFail($id);
        return response()->json($book);
    }

    //====================================================================================================================================//

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'image|mimes:jpg,png',
            'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id'
        ]);

        $name = 'default.png';
        if ($request->file('img')) {
            $img = $request->file('img');
            $extension = $img->getClientOriginalExtension();
            $name  = uniqid() . ".$extension";
            $img->move(public_path('uploads/books'), $name);
        }

        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $name
        ]);

        $book->categories()->sync($request->category_ids);

        $success = "Book Created Successfully";

        return response()->json($success);
    }

    //====================================================================================================================================//

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,png',
            'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id'
        ]);

        $book = Book::findOrFail($id);
        $name = $book->img;

        if ($request->hasFile('img')) {
            if ($name !== null) {
                unlink(public_path('uploads/books/') . $name);
            }
            $img = $request->file('img');
            $extension = $img->getClientOriginalExtension();
            $name = uniqid() . ".$extension";
            $img->move(public_path('uploads/books'), $name);
        }

        $book->update([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $name
        ]);

        $book->categories()->sync($request->category_ids);

        $success = "Book Updated Successfully";

        return response()->json($success);
    }

    //====================================================================================================================================//

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        
        if ($book->img !== "default.png" && $book->img !== null) {
            unlink(public_path('uploads/books/') . $book->img);
        }

        $book->categories()->sync([]);

        $book->delete();

        $success = "Book Deleted Successfully";

        return response()->json($success);
    }
}