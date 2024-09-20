<?php

namespace App\Http\Controllers;

use App\Models\photocard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PhotocardController extends Controller
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
            'card_title' => ['required', 'string', 'max:250'],
            'card_img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        $messages = [
            'card_title.required' => 'សូមបញ្ចូលចំណងជើងមាតិកា',
            'card_title.string' => 'ចំណងជើងជើងមាតិកាត្រូវតែតួអក្សរ',
            'card_title.max' => 'ចំណងជើងជើងមាតិកាគួតែតិចឬស្មើ២៥៥តួ',
            'card_img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'card_img.required' => 'សូមបញ្ចូលរូបភាព',
            'card_img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'card_img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
        ];

        $request->validate($rules, $messages);

        $photocard = new Photocard;

        $photocard->id_monk = $user->id;
        $photocard->title = $request->input('card_title');

        if ($request->hasFile('card_img') && $request->file('card_img')->isValid()) {
            $uploadedFile = $request->file('card_img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $photocard->img = $fileName;
        } else {
            $photocard->img = '';
        }

        $photocard->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលទិន្នន័យដោយជោគជ័យ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\photocard  $photocard
     * @return \Illuminate\Http\Response
     */
    public function show(photocard $photocard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\photocard  $photocard
     * @return \Illuminate\Http\Response
     */
    public function edit(photocard $photocard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\photocard  $photocard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, photocard $photocard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\photocard  $photocard
     * @return \Illuminate\Http\Response
     */
    public function destroy(photocard $photocard)
    {
        $oldImagePath = 'public/images/' . $photocard->img;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $photocard->delete();

        return redirect()->back()->with('success', 'អ្នកបានលុបទិន្នន័យបុណ្យដោយជោគជ័យ');
    }
}
