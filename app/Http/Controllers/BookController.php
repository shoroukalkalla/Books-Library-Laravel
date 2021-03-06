<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);

        return view('books.index', compact('books'));

        // $books = Book::get();
        // $books = Book::all();
        // $books = Book::select('title', 'description')->get();
        // $books = Book::where('id', '>=', 2)->get();
        // $books = Book::select('title', 'description')->where('id', '>=', 2)->orderBy('id', 'DESC')->get();
        // dd($books);
    }
    //====================================================================================================================================//
    public function show($id)
    {
        // Book::where('id', '=', $id)->first();
        // Book::find($id);
        $book = Book::findOrFail($id);

        return view('books.show', compact('book'));
    }
    //====================================================================================================================================//
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('books.create', compact('categories'));
    }
    //====================================================================================================================================//
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'image|mimes:jpg,png',
            'category_ids' => 'required',
            'category_ids.*' => 'exists:categories,id'
        ]);

        $name = "default.png";
        if ($request->file('img')) {
            $img = $request->file('img');
            $extension = $img->getClientOriginalExtension();
            $name = uniqid() . ".$extension";
            $img->move(public_path('uploads/books'), $name);
        }

        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'img' => $name
        ]);

        $book->categories()->sync($request->category_ids);

        return redirect(route('books.index'));
    }
    //====================================================================================================================================//
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }
    //====================================================================================================================================//
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,png'
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
        return redirect(route('books.index'));
    }
    //====================================================================================================================================//
    public function delete($id)
    {
        $book = Book::findOrFail($id);

        if ($book->img !== "default.png" && $book->img !== null) {
            unlink(public_path('uploads/books/') . $book->img);
        }

        $book->delete();

        return back();
    }
}