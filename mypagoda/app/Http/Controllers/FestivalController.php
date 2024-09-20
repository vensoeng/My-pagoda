<?php

namespace App\Http\Controllers;

use App\Models\festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivals = festival::orderBy('id', 'desc')->get();
        return view('admin.festival.index', compact('festivals'));
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
            'title' => ['required', 'string', 'max:250'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'length_photo' => ['nullable', 'string', 'max:5'],
            'link' => ['required', 'string', 'max:400'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'title.required' => 'សូមបញ្ចូលចំណងជើងមាតិកា',
            'title.string' => 'ចំណងជើងជើងមាតិកាត្រូវតែតួអក្សរ',
            'title.max' => 'ចំណងជើងជើងមាតិកាគួតែតិចឬស្មើ២៥៥តួ',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.required' => 'សូមបញ្ចូលរូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'length_photo.max' => 'ចំនួនរូបភាពគួតែមានចំនួន៥តួ ឬ តូចជាង',
            'link.required' => 'សូមបញ្ចូលលិងvideo',
            'link.max' => 'លិងគួរតែតិចឬស្មើរនិង ៤០០តួ',
        ];

        $request->validate($rules, $messages);

        $festival = new festival();
        $admin = Auth::user();

        $festival->user_id = $admin->id;
        $festival->status = $request->input('status');
        $festival->title = $request->input('title');
        $festival->length_photo = $request->input('length_photo');
        $festival->link = $request->input('link');

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $festival->img = $fileName;
        } else {
            $festival->img = "";
        }

        $festival->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលទិន្នន័យបុណ្យដោយជោគជ័យ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function edit(festival $festival)
    {
        return view('admin.festival.edit',compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, festival $festival)
    {
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'title' => ['required', 'string', 'max:250'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'length_photo' => ['nullable', 'string', 'max:5'],
            'link' => ['required', 'string', 'max:400'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'title.required' => 'សូមបញ្ចូលចំណងជើងមាតិកា',
            'title.string' => 'ចំណងជើងជើងមាតិកាត្រូវតែតួអក្សរ',
            'title.max' => 'ចំណងជើងជើងមាតិកាគួតែតិចឬស្មើ២៥៥តួ',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.required' => 'សូមបញ្ចូលរូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'length_photo.max' => 'ចំនួនរូបភាពគួតែមានចំនួន៥តួ ឬ តូចជាង',
            'link.required' => 'សូមបញ្ចូលលិងvideo',
            'link.max' => 'លិងគួរតែតិចឬស្មើរនិង ៤០០តួ',
        ];

        $request->validate($rules, $messages);

        $festival->status = $request->input('status');
        $festival->title = $request->input('title');
        $festival->length_photo = $request->input('length_photo');
        $festival->link = $request->input('link');

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $oldImagePath = 'public/images/' . $festival->img;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $festival->img = $fileName;
        }

        $festival->save();

        return redirect()->route('admin.festival')->with('success', 'អ្នកបានកែប្រែទិន្នន័យបុណ្យដោយជោគជ័យ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function destroy(festival $festival)
    {
        $oldImagePath = 'public/images/' . $festival->img;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $festival->delete();

        return redirect()->back()->with('success', 'អ្នកបានលុបទិន្នន័យបុណ្យដោយជោគជ័យ');
    }
}
