<?php

namespace App\Http\Controllers;

use App\Models\video;
use App\Models\videocreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creator_num = videocreator::select('id')->count();
        $creators = videocreator::select('id', 'khmer_name', 'english_name', 'img')->get();
        $videos = video::orderBy('id', 'desc')->get();
        $video_num = videocreator::select('id')->count();
        return view("admin.shortvideo.index", compact("creator_num","creators","videos","video_num"));
    }
    public function store(Request $request)
    {
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'creator_id' => ['required', 'integer', 'exists:tb_creator_video,id'],
            'title' => ['required', 'string', 'max:250'],
            'img' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'link' => ['required', 'string', 'max:400'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'creator_id.required' => 'សូមជ្រើសរើសអ្នកសំដែង',
            'creator_id.integer' => 'អ្នកសំដែងជាប្រភេទលេខ',
            'creator_id.exists' => 'ត្រូវប្រាកដថាអ្នកសំដែងពិតជាមាននៅក្នុងលិស',
            'title.required' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'title.string' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'title.max' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.required' => 'សូមបញ្ចូលរូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'link.required' => 'សូមបញ្ចូលលិងvideo',
            'link.max' => 'លិងគួរតែតិចឬស្មើរនិង ៤០០តួ',
        ];

        $request->validate($rules, $messages);

        $video = new Video();

        $admin = Auth::user();
        $video->user_id = $admin->id;

        $video->status = $request->input('status');
        $video->creator_id = $request->input('creator_id');
        $video->title = $request->input('title');
        $video->link = $request->input('link');

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $video->img = $fileName;
        } else {
            $video->img = '';
        }

        $video->save();

        return redirect()->back()->with('success', 'អ្នកបានបញ្ចូលទិន្នន័យvideoដោយជោគជ័យ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(video $video)
    {
        $creators = videocreator::select('id', 'khmer_name', 'english_name', 'img')->get();
        return view('admin.shortvideo.editvideo',compact('video','creators'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, video $video)
    {
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'creator_id' => ['required', 'integer', 'exists:tb_creator_video,id'],
            'title' => ['required', 'string', 'max:250'],
            'img' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'link' => ['required', 'string', 'max:400'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in' => 'ស្ថានភាពត្រូវតែជាលេខ ១ ឬ ០',
            'creator_id.required' => 'សូមជ្រើសរើសអ្នកសំដែង',
            'creator_id.integer' => 'អ្នកសំដែងជាប្រភេទលេខ',
            'creator_id.exists' => 'ត្រូវប្រាកដថាអ្នកសំដែងពិតជាមាននៅក្នុងលិស',
            'title.required' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'title.string' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'title.max' => 'ឈ្មោះអ្នកបង្កើតមាតិកា',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.mimes' => 'ឯកសារត្រូវតែជាប្រភេទ jpeg, png, jpg ឬ gif',
            'img.max' => 'ឯកសារតូចឬស្មើនិង 2048',
            'link.required' => 'សូមបញ្ចូលលិងvideo',
            'link.max' => 'លិងគួរតែតិចឬស្មើរនិង ៤០០តួ',
        ];

        $request->validate($rules, $messages);

        $video->status = $request->input('status');
        $video->creator_id = $request->input('creator_id');
        $video->title = $request->input('title');
        $video->link = $request->input('link');
        // this is for store imgese
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $oldImagePath = 'public/images/' . $video->img;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $video->img = $fileName;
        }

        $video->save();

        return redirect()->route('admin.video')->with('success', 'អ្នកបានកែប្រែទិន្នន័យvideoដោយជោគជ័យ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(video $video)
    {
        $oldImagePath = 'public/images/' . $video->img;
        if (Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        $video->delete();

        return redirect()->back()->with('success', 'អ្នកបានលុបទិន្នន័យvideoដោយជោគជ័យ');
    }
}
