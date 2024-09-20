<?php

namespace App\Http\Controllers;

use App\Models\monkphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class MonkphotoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'photo_status' => ['required', 'integer', 'in:0,1'],
            'photo_title' => ['nullable', 'string', 'max:500'],
            'photo_img' => ['required', 'array'],
            'photo_img.*' => ['image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ];

        $messages = [
            'photo_status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'photo_status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'photo_status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'photo_title.string' => 'ចំណងជើងជើងមាតិកាត្រូវតែតួអក្សរ',
            'photo_title.max' => 'ចំណងជើងជើងមាតិកាគួតែតិចឬស្មើ៥០០តួ',
            'photo_img.required' => 'សូមបញ្ចូលរូបភាព',
            'photo_img.array' => 'ត្រូវតែជាឯកសារជាច្រើន',
            'photo_img.*.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'photo_img.*.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg, gif, ឬ webp',
            'photo_img.*.max' => 'ឯកសារតូចឬស្មើនិង 2048',
        ];

        $request->validate($rules, $messages);

        $monkphoto = new monkphoto;

        $monkphoto->id_monk = $user->id;
        $monkphoto->status = $request->input('photo_status');
        $monkphoto->title = $request->input('photo_title');

        $imageNames = [];
        if ($request->hasFile('photo_img')) {
            foreach ($request->file('photo_img') as $uploadedFile) {
                if ($uploadedFile->isValid()) {
                    $fileExtension = $uploadedFile->getClientOriginalExtension();
                    $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

                    Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

                    $imageNames[] = $fileName;
                }
            }
        }

        $monkphoto->img = implode(',', $imageNames); // Store filenames as a comma-separated string

        $monkphoto->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលទិន្នន័យដោយជោគជ័យ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\monkphoto  $monkphoto
     * @return \Illuminate\Http\Response
     */
    public function edit(monkphoto $monkphoto)
    {
        return view('home.user.editphoto', compact('monkphoto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monkphoto  $monkphoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, monkphoto $monkphoto)
    {
        $rules = [
            'photo_status' => ['required', 'integer', 'in:0,1'],
            'photo_title' => ['nullable', 'string', 'max:500'],
            'photo_img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        $messages = [
            'photo_status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'photo_status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'photo_status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'photo_title.string' => 'ចំណងជើងជើងមាតិកាត្រូវតែតួអក្សរ',
            'photo_title.max' => 'ចំណងជើងជើងមាតិកាគួតែតិចឬស្មើ៥០០តួ',
            'photo_img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'photo_img.required' => 'សូមបញ្ចូលរូបភាព',
            'photo_img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'photo_img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
        ];

        $request->validate($rules, $messages);

        $monkphoto->status = $request->input('photo_status');
        $monkphoto->title = $request->input('photo_title');

        if ($request->hasFile('photo_img') && $request->file('photo_img')->isValid()) {
            $oldImagePath = 'public/images/' . $monkphoto->img;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $uploadedFile = $request->file('photo_img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $monkphoto->img = $fileName;
        }

        $monkphoto->save();

        return redirect()->route('home.user')->with('success', 'អ្នកបានកែប្រែទិន្នន័យដោយជោគជ័យ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\monkphoto  $monkphoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(monkphoto $monkphoto)
    {
        $oldImagePath = 'public/images/' . $monkphoto->img;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $monkphoto->delete();
        return redirect()->back()->with('success', 'អ្នកបានលុបន័យដោយជោគជ័យ');
    }
}
