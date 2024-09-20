<?php

namespace App\Http\Controllers;

use App\Models\customization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CustomizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = customization::select('id', 'img')
            ->orderBy('id', 'desc')
            ->get();
        return view("admin.customization.index", ['slides' => $slides]);
    }

    public function store(Request $request)
    {
        $rules = [
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        $messages = [
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.required' => 'សូមបញ្ចូលរូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
        ];

        $request->validate($rules, $messages);

        $customization = new customization();

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $customization->img = $fileName;
        } else {
            $customization->img = '';
        }

        $customization->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលស្លាយដោយជោគជ័យ');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customization  $customization
     * @return \Illuminate\Http\Response
     */
    public function destroy(customization $customization)
    {
        $oldImagePath = 'public/images/' . $customization->img;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $customization->delete();

        return redirect()->back()->with('success', 'អ្នកបានលុបស្លាយដោយជោគជ័យ');
    }
}
