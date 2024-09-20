<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Models\monk;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            if ($user->role_id == '1') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id == '2') {
                return redirect()->route('home.user');
            }
        } else {
            return view('login.index');
        }
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];

        $messages = [
            'email.required' => 'សូមបញ្ចូលគណនី។',
            'email.email' => 'សូមបញ្ចូលអ៊ីមែលដែលត្រឹមត្រូវ។',
            'password.required' => 'សូមបញ្ចូលលេខសម្ងាត់។',
        ];

        $credentials = $request->validate($rules, $messages);

        // Retrieve the user by email
        $user = monk::where('email', $credentials['email'])->first();

        // Check if user exists
        if (!$user) {
            return back()->withErrors([
                'erroruser' => 'រកមិនឃើញគណនី។សូមពិនិត្យមើលអ៊ីមែលរបស់អ្នកនិងត្រូវប្រាកដថាអ្នកមានសិទ្ធគ្រប់គ្រាន់ដើម្បីប្រើប្រាសគណនី។',
            ])->onlyInput('erroruser');
        }

        // Check if password matches
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'កំហុសលេខសម្ងាត់ សូមបញ្ចូលលេខសម្ងាត់ដែលត្រឹមត្រូវ។',
            ])->onlyInput('email');
        }

        // Log in the user and regenerate session
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect based on user role
        if ($user->role_id == '1') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role_id == '2') {
            return redirect()->route('home.user');
        }

        // Default fallback if role_ids are not handled
        return redirect()->route('login.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home.login');
    }
}
