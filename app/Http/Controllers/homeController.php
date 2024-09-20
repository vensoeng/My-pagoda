<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\artical;
use App\Models\book;
use App\Models\video;
use App\Models\festival;
use App\Models\photocard;
use App\Models\monkphoto;
use App\Models\monk;
use App\Models\customization;

use Illuminate\Support\Facades\Hash;
class homeController extends Controller
{
    public function index()
    {
        $slides = customization::select('img')->orderBy('id', 'desc')->get();
        $articals = artical::select('id', 'title', 'img', 'status')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(8)
            ->get();
        $manmonks = monk::select('id', 'first_name', 'last_name', 'position_id', 'status', 'img_profile', 'profile_bg')
            ->whereIn('position_id', [1, 2, 3, 4])
            ->where('status', '=', '1')
            ->get();
        $sonmonks = monk::select('id', 'role_id', 'first_name', 'last_name', 'position_id', 'status', 'img_profile', 'profile_bg', 'status', 'type_id')
            ->whereIn('type_id', [1, 2])
            ->whereNotIn('role_id', [1])
            ->inRandomOrder()
            ->limit(6)
            ->get();
        $festivals = festival::select('id', 'status', 'title', 'img', 'length_photo', 'link', 'created_at')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        $videos = Video::orderBy('id', 'desc')
            ->limit(6)
            ->get();

        return view('welcome', compact('slides', 'articals', 'manmonks', 'sonmonks', 'festivals', 'videos'));
        //echo Hash::make('123');
    }

    public function new()
    {
        $festivals = festival::select('id', 'status', 'title', 'img', 'length_photo', 'link', 'created_at')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        $books = book::where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(4)
            ->get();
        $articals = artical::select('id', 'title', 'img', 'status', 'descript', 'creator')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
        $videos = Video::orderBy('id', 'desc')
            ->limit(8)
            ->get();
        return view('home.new.index', compact('festivals', 'books', 'articals', 'videos'));
    }

    public function monk()
    {
        $monks = monk::select('id', 'role_id', 'first_name', 'last_name', 'position_id', 'status', 'img_profile', 'profile_bg', 'status', 'type_id')
            ->whereIn('position_id', [1, 2, 3, 4, 5])
            ->where('status', '=', '1')
            ->orderBy('position_id', 'asc')
            ->orderBy('type_id', 'asc')
            ->get();
        return view('home.monk.index', compact('monks'));
    }

    public function festival()
    {
        $festivals = festival::select('id', 'status', 'title', 'img', 'length_photo', 'link', 'created_at')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        return view('home.festival.index', compact('festivals'));
    }

    public function video()
    {
        $videos = Video::orderBy('id', 'desc')
            ->get();
        return view('home.shortvideo.index', compact('videos'));
    }

    public function development()
    {
        return view('home.development.index');
    }

    public function build()
    {
        return view('home.build.index');
    }

    public function aspect()
    {
        return view('home.aspect.index');
    }

    public function help()
    {
        return view('home.help.index');
    }

    public function about()
    {
        $manmonk = monk::select('status', 'type')
            ->where('type', '=', '1')
            ->where('status', '=', '1')
            ->count();
        $sonmonk = monk::select('status', 'type')
            ->where('type', '=', '2')
            ->where('status', '=', '1')
            ->count();
        return view('home.about.index', compact('manmonk', 'sonmonk'));
    }


    public function monkuser(monk $user)
    {
        $slide = customization::select('id', 'img')->orderBy('id', 'desc')->first();
        $cards = photocard::select('id', 'img','title')
            ->where('id_monk', '=', $user->id)
            ->orderBy('id', 'desc')
            ->get();
        $photos = monkphoto::select('id', 'title', 'img', 'status', 'created_at')
            ->where('id_monk', '=', $user->id)
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        return view('home.monkuser.index', compact('user', 'slide', 'cards', 'photos'));
    }

    public function allbook()
    {
        $books = book::where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        return view('home.allbook.index', compact('books'));
    }

    public function allartical()
    {
        $articals = artical::select('id', 'title', 'img', 'status', 'descript', 'creator')
            ->where('status', '=', '1')
            ->orderBy('id', 'desc')
            ->get();
        return view('home.allartical.index', compact('articals'));
    }
    public function checkArtical(artical $item)
    {
        $articals = artical::select('id', 'title', 'img', 'status', 'descript', 'creator')
            ->where('status', '=', '1')
            ->limit(4)
            ->inRandomOrder()
            ->get();
        return view('home.checkArtical.index', compact('item', 'articals'));
    }
}
