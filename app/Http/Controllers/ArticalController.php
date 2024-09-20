<?php

namespace App\Http\Controllers;

use App\Models\artical;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class ArticalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articals = artical::orderBy('id', 'desc')->get();
        $artical_num = artical::all()->count();
        $book_num = book::all()->count();
        return view('admin.artical.index', ['articals' => $articals, 'artical_num' => $artical_num, 'book_num' => $book_num]);
        ;
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
            'descript' => ['nullable', 'string', 'max:500'],
            'creator' => ['nullable', 'string'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'text_file' => ['nullable', 'file', 'mimes:txt,html'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'title.required' => 'សូមបញ្ចូលចំណងជើងនៃអត្ថបទ',
            'title.string' => 'ចំណងជើងនៃអត្ថបទត្រូវតែជាតួអក្សរ',
            'descript.max' => 'ការពិពណ៌នាមិនត្រូវសរសេរលើសពី៥០០តួទេ។',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'text_file.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ txt ឬ html',
        ];

        $request->validate($rules, $messages);

        $user = Auth::user();

        $artical = new artical();

        $artical->user_id = $user->id;
        $artical->status = $request->input('status');
        $artical->title = $request->input('title');
        $artical->descript = $request->input('descript') ?? "";
        $artical->creator = $request->input('creator') ?? "";
        // this is for images
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $artical->img = $fileName;
        } else {
            $artical->img = '';
        }
        // this is for file
        if ($request->hasFile('text_file') && $request->file('text_file')->isValid()) {
            $uploadedFile = $request->file('text_file');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('file', $uploadedFile, $fileName);

            $artical->text_file = $fileName;
        } else {
            $artical->text_file = '';
        }

        $artical->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលអត្ថបទដោយជោគជ័យ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function edit(artical $artical)
    {
        return view('admin.artical.edit',compact('artical'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artical $artical)
    {
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'title' => ['required', 'string', 'max:200'],
            'descript' => ['nullable', 'string', 'max:500'],
            'creator' => ['nullable', 'string'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'text_file' => ['nullable', 'file', 'mimes:txt,html'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'title.required' => 'សូមបញ្ចូលចំណងជើងនៃអត្ថបទ',
            'title.string' => 'ចំណងជើងនៃអត្ថបទត្រូវតែជាតួអក្សរ',
            'descript.max' => 'ការពិពណ៌នាមិនត្រូវសរសេរលើសពី៥០០តួទេ។',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'text_file.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ txt ឬ html',
        ];

        $request->validate($rules, $messages);

        $user = Auth::user();

        $artical->user_id = $user->id;
        $artical->status = $request->input('status');
        $artical->title = $request->input('title');
        $artical->descript = $request->input('descript') ?? "";
        $artical->creator = $request->input('creator');

        // this is for images
        if ($request->hasFile('img') && $request->file('img')->isValid()) {

            $oldImagePath = 'public/images/' . $artical->img;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $artical->img = $fileName;
        }
        // this is for file
        if ($request->hasFile('text_file') && $request->file('text_file')->isValid()) {
            $oldFilePath = 'public/file/' . $artical->text_file;
            if (Storage::exists($oldFilePath)) {
                Storage::delete($oldFilePath);
            }
            $uploadedFile = $request->file('text_file');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('file', $uploadedFile, $fileName);

            $artical->text_file = $fileName;
        }

        $artical->save();

        return redirect()->route('admin.artical')->with('success', 'អ្នកបានកែប្រែអត្ថបទដោយជោគជ័យ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artical  $artical
     * @return \Illuminate\Http\Response
     */
    public function destroy(artical $artical)
    {
        $oldImagePath = 'public/images/' . $artical->img;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $oldImagePath = 'public/file' . $artical->text_file;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $artical->delete();

        return redirect()->route('admin.artical')->with('success', 'អ្នកបានលុបអត្ថបទដោយជោគជ័យ');
    }
}
