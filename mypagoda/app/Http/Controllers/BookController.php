<?php

namespace App\Http\Controllers;

use App\Models\artical;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = book::orderBy('id', 'desc')->get();
        $artical_num = artical::all()->count();
        $book_num = book::all()->count();
        return view('admin.book.index', ['books' => $books, 'artical_num' => $artical_num, 'book_num' => $book_num]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'title' => ['required', 'string', 'max:200'],
            'editor' => ['nullable', 'string'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'type' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'title.required' => 'សូមបញ្ចូលចំណងជើងនៃអត្ថបទ',
            'editor.string' => 'អ្នកនិពន្ធឬរាបរៀងត្រូវតែជាតួអក្សរ',
            'type.string' => 'ប្រភេទនៃសៀវភៅត្រូវតែជាតួអក្សរ',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'link.string' => 'លិងនៃសៀវភៅត្រូវតែជាតួអក្សរ',
        ];

        $request->validate($rules, $messages);
        $user = Auth::user();

        $book = new book();

        $book->user_id = $user->id;
        $book->title = $request->input('title');
        $book->editor = $request->input('editor');
        $book->type = $request->input('type');
        $book->link = $request->input('link');
        $book->status = $request->input('status');

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $book->img = $fileName;
        } else {
            $book->img = '';
        }

        $book->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលទិន្នន័យសៀវភៅដោយជោគជ័យ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return view('admin.book.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, book $book)
    {
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'title' => ['required', 'string', 'max:200'],
            'editor' => ['nullable', 'string'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'type' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'title.required' => 'សូមបញ្ចូលចំណងជើងនៃអត្ថបទ',
            'editor.string' => 'អ្នកនិពន្ធឬរាបរៀងត្រូវតែជាតួអក្សរ',
            'type.string' => 'ប្រភេទនៃសៀវភៅត្រូវតែជាតួអក្សរ',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'link.string' => 'លិងនៃសៀវភៅត្រូវតែជាតួអក្សរ',
        ];

        $request->validate($rules, $messages);

        $book->title = $request->input('title');
        $book->editor = $request->input('editor');
        $book->type = $request->input('type');
        $book->link = $request->input('link');
        $book->status = $request->input('status');

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $oldImagePath = 'public/images/' . $book->img;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $book->img = $fileName;
        }

        $book->save();

        return redirect()->route('admin.book')->with('success', 'អ្នកបានកែប្រែទិន្នន័យសៀវភៅដោយជោគជ័យ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        $oldImagePath = 'public/images/' . $book->img;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $book->delete();

        return redirect()->route('admin.book')->with('success', 'អ្នកបានលុបសៀវភៅដោយជោគជ័យ');
    }
}
