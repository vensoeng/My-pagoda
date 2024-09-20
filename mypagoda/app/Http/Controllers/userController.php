<?php

namespace App\Http\Controllers;

use App\Models\customization;
use App\Models\photocard;
use App\Models\monkphoto;
use App\Models\monk;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class userController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $slide = customization::select('id', 'img')->orderBy('id', 'desc')->first();
        $cards = photocard::select('id', 'img')->where('id_monk', '=', $user->id)
            ->orderBy('id', 'desc')
            ->get();
        $photos = monkphoto::select('id', 'title', 'img', 'status', 'created_at')->where('id_monk', '=', $user->id)
            ->orderBy('id', 'desc')
            ->get();
        return view("home.user.index", compact("user", "slide", "cards", "photos"));
    }

    public function edit(monk $user)
    {
        $slide = customization::select('id', 'img')->orderBy('id', 'desc')->first();
        return view("home.user.edit", compact("user", "slide"));
    }

    public function update(Request $request, monk $user)
    {
        $rules = [
            'workin' => ['nullable', 'string'],
            'bio' => ['nullable', 'string'],
            'tell' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('tbmonk')->ignore($user->id)],
            'password' => ['nullable'],
            'village' => ['required', 'string'],
            'Commune' => ['required', 'string'],
            'district' => ['required', 'string'],
            'province' => ['required', 'string'],
            'img_cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        $messages = [
            'email.required' => 'សូមបញ្ចូលគណនី។',
            'email.email' => 'សូមបញ្ចូលអ៊ីមែលដែលត្រឹមត្រូវ។',
            'email.unique:tbmonk,email' => 'គណនីអ៊ីមែលត្រូវតែខុសពីគ្នានៅក្នុងប្រព័នទីន្នន័យ។',
            'password.required' => 'សូមបញ្ចូលលេខសម្ងាត់។',
            'img_cover.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img_cover.mimes:jpeg,png,jpg,gif' => 'ឯកសារត្រូវតែជាប្រភេទjpeg,png,jpg,gif',
            'img_cover.max:2048' => 'ឯកសារតូចឬស្មើនិង2048',
            'tell.required' => 'សូមបញ្ចូលលេខទូរស័ព្ទ។',
            'village.required' => 'សូមបញ្ចូលភូមិកំណើត។',
            'Commune.required' => 'សូមបញ្ចូលឃុំកំណើត។',
            'district.required' => 'សូមបញ្ចូលស្រុកកំណើត។',
            'province.required' => 'សូមបញ្ចូលខេត្តកំណើត។',
        ];

        $request->validate($rules, $messages);

        // Update monk information
        $user->tell = $request->input('tell');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $userInfo = $user->userinfor;
        if ($userInfo) {
            $userInfo->workin = $request->input('workin');
            $userInfo->bio = $request->input('bio');
            $userInfo->village = $request->input('village');
            $userInfo->Commune = $request->input('Commune');
            $userInfo->district = $request->input('district');
            $userInfo->province = $request->input('province');

            if ($request->hasFile('img_cover') && $request->file('img_cover')->isValid()) {
                $oldImagePath = 'public/images/' . $userInfo->img_cover;
                if (Storage::exists($oldImagePath)) {
                    Storage::delete($oldImagePath);
                }
                $uploadedFile = $request->file('img_cover');
                $fileExtension = $uploadedFile->getClientOriginalExtension();
                $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

                Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

                $userInfo->img_cover = $fileName;
            }
            // Save updated monkinfor model
            $userInfo->save();
        }

        // Save updated monk model
        $user->save();

        return redirect()->route('home.user')->with('success', 'អ្នកបានកែប្រែប្រវត្តរូបរបស់អ្នកដោយជោគជ័យ');
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
