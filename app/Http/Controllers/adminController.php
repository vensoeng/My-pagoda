<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\artical;
use App\Models\book;
use App\Models\video;
use App\Models\festival;
use App\Models\monk;
class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        $artical_num = artical::select('id')->count();
        $book_num = book::select('id')->count();
        $video_num = video::select('id')->count();
        $festival_num = festival::select('id')->count();
        $monk_num = monk::whereIn('type_id', [1, 2])->count();
        $user_num = monk::whereNotIn('type_id', [1, 2])->count();
        $monks = monk::select('first_name', 'last_name', 'img_profile', 'type_id', 'created_at', 'tell', 'profile_bg', 'status')->whereIn('type_id', [1, 2])->limit(10)->get();
        $articals = artical::select('id', 'title', 'descript', 'creator', 'img', 'status')->where('status', '=', '1')->limit(6)->get();
        return view('admin.dashboard.index', compact('artical_num', 'book_num', 'video_num', 'festival_num', 'monk_num', 'user_num', 'monks', 'articals', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
