<?php

namespace App\Http\Controllers;

use App\Models\monk;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

use App\Models\role;
use App\Models\typemonk;
use App\Models\position;
use App\Models\monkinfor;
class MonkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        $rols = role::all()->reverse();
        $types = typemonk::all()->reverse();
        $positions = position::all();
        $monks = monk::orderBy('type_id', 'asc')->get();
        $manmonk = Monk::where('type_id', 1)->count();
        $sonmonk = Monk::where('type_id', 2)->count();
        return view('admin.monk.index', ['rols' => $rols, 'types' => $types, 'positions' => $positions, 'monks' => $monks, 'admin' => $admin, 'manmonk' => $manmonk, 'sonmonk' => $sonmonk]);
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
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'type' => ['required', 'integer', 'exists:tb_type,id'],
            'rol' => ['required', 'integer', 'exists:tb_role,id'],
            'position' => ['required', 'integer', 'exists:tb_position,id'],
            'tell' => ['nullable', 'string'],
            'email' => ['required', 'email', 'unique:tb_monk,email'],
            'password' => ['required'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in:0,1' => 'ស្ថានភាពត្រូវតែជាលេខ១ឬលេខ០',
            'first_name.required' => 'សូមបញ្ចូលគោតនាម',
            'first_name.string' => 'គោតនាមត្រូវតែជាតួអក្សរ',
            'last_name.required' => 'សូមបញ្ចូលនាមខ្លួន',
            'last_name.string' => 'នាមខ្លួនត្រូវតែជាតួអក្សរ',
            'type.required' => 'សូមបញ្ចូលឧបសប្បទា',
            'type.integer' => 'ឧបសប្បទាត្រូវតែជាតួលេខ',
            'type.exists' => 'ឧបសប្បទាត្រូវតែជាតួលេខដែលបានមកពីឧបសប្បទាទិន្នន័យ',
            'rol.required' => 'សូមបញ្ចូលការងារ',
            'rol.integer' => 'ការងារត្រូវតែជាតួលេខ',
            'rol.exists' => 'ការងារត្រូវតែជាតួលេខដែលបានមកពីការងារទិន្នន័យ',
            'position.required' => 'សូមបញ្ចូលមុខតំណែង',
            'position.integer' => 'មុខតំណែងត្រូវតែជាតួលេខ',
            'position.exists' => 'ការងារត្រូវតែជាតួលេខដែលបានមកពីមុខតំណែងទិន្នន័យ',
            'email.required' => 'សូមបញ្ចូលគណនី។',
            'email.email' => 'សូមបញ្ចូលអ៊ីមែលដែលត្រឹមត្រូវ។',
            'email.unique:tbmonk,email' => 'គណនីអ៊ីមែលត្រូវតែខុសពីគ្នានៅក្នុងប្រព័នទីន្នន័យ។',
            'password.required' => 'សូមបញ្ចូលលេខសម្ងាត់។',
            'tell.string' => 'លេខទូរស័ព្ទត្រូវតែជាតួអក្សរ',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.mimes:jpeg,png,jpg,gif' => 'ឯកសារត្រូវតែជាប្រភេទjpeg,png,jpg,gif',
            'img.max:2048' => 'ឯកសារតូចឬស្មើនិង2048',
        ];

        $request->validate($rules, $messages);

        $monk = new monk();

        $monk->first_name = $request->input('first_name');
        $monk->last_name = $request->input('last_name');
        $monk->type_id = $request->input('type');
        $monk->role_id = $request->input('rol');
        $monk->position_id = $request->input('position');
        $monk->status = $request->input('status');
        $monk->email = $request->input('email');
        $monk->password = Hash::make($request->input('password'));
        $monk->tell = $request->input('tell');
        $monk->profile_bg = $request->input('profile_bg') ?? '';

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $monk->img_profile = $fileName;
        } else {
            $monk->img_profile = "";
        }

        $monk->save();

        if ($monk->save()) {
            $monkinfor = new monkinfor();
            $monkinfor->monk_id = $monk->id;
            $monkinfor->save();
        }

        return redirect()->route('admin.monk')->with('success', 'អ្នកបានបញ្ចូលព្រះសង្ឃដោយជោគជ័យ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function show(monk $monk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function edit(monk $monk)
    {
        $admin = Auth::user();
        $rols = role::all();
        $types = typemonk::all();
        $positions = position::all();
        return view('admin.monk.edit', ['rols' => $rols, 'types' => $types, 'positions' => $positions, 'monk' => $monk, 'admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, monk $monk)
    {
        $rules = [
            'status' => ['required', 'integer', 'in:0,1'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'type' => ['required', 'integer', 'exists:tb_type,id'],
            'rol' => ['required', 'integer', 'exists:tb_role,id'],
            'position' => ['required', 'integer', 'exists:tb_position,id'],
            'tell' => ['nullable', 'string'],
            'email' => ['required', 'email', Rule::unique('tb_monk')->ignore($monk->id)],
            'password' => ['required'],
            'img' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];

        $messages = [
            'status.required' => 'សូមជ្រើសរើសស្ថានភាព',
            'status.integer' => 'ស្ថានភាពត្រូវតែជាលេខ',
            'status.in:0,1' => 'ស្ថានភាពត្រូវតែជាលេខ១ឬលេខ០',
            'first_name.required' => 'សូមបញ្ចូលគោតនាម',
            'first_name.string' => 'គោតនាមត្រូវតែជាតួអក្សរ',
            'last_name.required' => 'សូមបញ្ចូលនាមខ្លួន',
            'last_name.string' => 'នាមខ្លួនត្រូវតែជាតួអក្សរ',
            'type.required' => 'សូមបញ្ចូលឧបសប្បទា',
            'type.integer' => 'ឧបសប្បទាត្រូវតែជាតួលេខ',
            'type.exists' => 'ឧបសប្បទាត្រូវតែជាតួលេខដែលបានមកពីឧបសប្បទាទិន្នន័យ',
            'rol.required' => 'សូមបញ្ចូលការងារ',
            'rol.integer' => 'ការងារត្រូវតែជាតួលេខ',
            'rol.exists' => 'ការងារត្រូវតែជាតួលេខដែលបានមកពីការងារទិន្នន័យ',
            'position.required' => 'សូមបញ្ចូលមុខតំណែង',
            'position.integer' => 'មុខតំណែងត្រូវតែជាតួលេខ',
            'position.exists' => 'ការងារត្រូវតែជាតួលេខដែលបានមកពីមុខតំណែងទិន្នន័យ',
            'email.required' => 'សូមបញ្ចូលគណនី។',
            'email.email' => 'សូមបញ្ចូលអ៊ីមែលដែលត្រឹមត្រូវ។',
            'email.unique:tbmonk,email' => 'គណនីអ៊ីមែលត្រូវតែខុសពីគ្នានៅក្នុងប្រព័នទីន្នន័យ។',
            'password.required' => 'សូមបញ្ចូលលេខសម្ងាត់។',
            'img.image' => 'ឯកសារត្រូវតែជារូបភាព',
            'img.mimes:jpeg,png,jpg,gif' => 'ឯកសារត្រូវតែជាប្រភេទjpeg,png,jpg,gif',
            'img.max:2048' => 'ឯកសារតូចឬស្មើនិង2048',
        ];

        $request->validate($rules, $messages);

        $monk->first_name = $request->input('first_name');
        $monk->last_name = $request->input('last_name');
        $monk->type_id = $request->input('type');
        $monk->role_id = $request->input('rol');
        $monk->position_id = $request->input('position');
        $monk->status = $request->input('status');
        $monk->email = $request->input('email');
        $monk->password = Hash::make($request->input('password'));
        $monk->profile_bg = $request->input('profile_bg') ?? '';

        if ($monk->password !== $request->input('password')) {
            $monk->password = Hash::make($request->input('password'));
        }

        $monk->tell = $request->input('tell');

        $monk->profile_bg = $request->input('profile_bg') ?? '';

        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $oldImagePath = 'public/images/' . $monk->img_profile;
            if (Storage::exists($oldImagePath)) {
                Storage::delete($oldImagePath);
            }
            $uploadedFile = $request->file('img');
            $fileExtension = $uploadedFile->getClientOriginalExtension();
            $fileName = time() . '_' . uniqid() . '.' . $fileExtension;

            Storage::disk('public')->putFileAs('images', $uploadedFile, $fileName);

            $monk->img_profile = $fileName;
        }

        $monk->save();

        return redirect()->route('admin.monk')->with('success', 'អ្នកបានកែប្រែព្រះសង្ឃដោយជោគជ័យ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\monk  $monk
     * @return \Illuminate\Http\Response
     */
    public function destroy(monk $monk)
    {
        //
    }
}
