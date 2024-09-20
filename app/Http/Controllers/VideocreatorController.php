<?php

namespace App\Http\Controllers;

use App\Models\videocreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class VideocreatorController extends Controller
{

    public function store(Request $request)
    {

        $rules = [
            'creator_status' => ['required', 'integer', 'in:0,1'],
            'creator_name' => ['required', 'string', 'max:50'],
            'creator_name_eng' => ['required', 'string', 'max:50'],
            'creator_img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'creator_type' => ['nullable', 'string', 'max:50'],
        ];

        $messages = [
            'creator_status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'creator_status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'creator_status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'creator_name.required' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'creator_name_eng.required' => 'ឈ្មោះអ្នកបង្កើតមាតិកាជាអក្សរឡាតាំង',
            'type.string' => 'ប្រភេទនៃសៀវភៅត្រូវតែជាតួអក្សរ',
            'creator_img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'creator_img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'creator_img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'creator_type.max' => 'ប្រភេទអ្នកសំដែងត្រូវសរសេរតិចឬស្មើនិង ៥០តួ',
            'creator_type.string' => 'ប្រភេទអ្នកសំដែងត្រូវតែជាតួអក្សរ',
        ];

        $request->validate($rules, $messages);

        $videocreator = new videocreator();

        $videocreator->status = $request->input('creator_status');
        $videocreator->khmer_name = $request->input('creator_name');
        $videocreator->english_name = $request->input('creator_name_eng');
        $videocreator->creator_type = $request->input('creator_type');

        if ($request->hasFile('creator_img') && $request->file('creator_img')->isValid()) {
            $uploadedFile = $request->file('creator_img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $videocreator->img = $fileName;
        } else {
            $videocreator->img = '';
        }

        $videocreator->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលទិន្នន័យអ្នកបង្កើតដោយជោគជ័យ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\videocreator  $videocreator
     * @return \Illuminate\Http\Response
     */
    public function edit(videocreator $videocreator)
    {
        return view('admin.shortvideo.editcreator', ['videocreator' => $videocreator]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\videocreator  $videocreator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, videocreator $videocreator)
    {
        $rules = [
            'creator_status' => ['required', 'integer', 'in:0,1'],
            'creator_name' => ['required', 'string', 'max:50'],
            'creator_name_eng' => ['required', 'string', 'max:50'],
            'creator_img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'creator_type' => ['nullable', 'string', 'max:50'],
        ];

        $messages = [
            'creator_status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'creator_status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'creator_status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'creator_name.required' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'creator_name_eng.required' => 'ឈ្មោះអ្នកបង្កើតមាតិកាជាអក្សរឡាតាំង',
            'type.string' => 'ប្រភេទនៃសៀវភៅត្រូវតែជាតួអក្សរ',
            'creator_img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'creator_img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'creator_img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'creator_type.max' => 'ប្រភេទអ្នកសំដែងត្រូវសរសេរតិចឬស្មើនិង ៥០តួ',
            'creator_type.string' => 'ប្រភេទអ្នកសំដែងត្រូវតែជាតួអក្សរ',
        ];

        $request->validate($rules, $messages);


        $videocreator->status = $request->input('creator_status');
        $videocreator->khmer_name = $request->input('creator_name');
        $videocreator->english_name = $request->input('creator_name_eng');
        $videocreator->creator_type = $request->input('creator_type');

        if ($request->hasFile('creator_img') && $request->file('creator_img')->isValid()) {
            $oldImagePath = 'public/images/' . $videocreator->img;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $uploadedFile = $request->file('creator_img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $videocreator->img = $fileName;
        }

        $videocreator->save();

        return redirect()->route('admin.video')->with('success', 'អ្នកបានកែប្រែទិន្នន័យអ្នកបង្កើតដោយជោគជ័យ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\videocreator  $videocreator
     * @return \Illuminate\Http\Response
     */
    public function destroy(videocreator $videocreator)
    {
        //
    }
}
