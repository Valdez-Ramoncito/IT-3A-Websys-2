<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    private function storeLog($userId, $action, $description)
    {
        DB::table('activity_logs')->insert([
            'user_id'     => $userId,
            'action'      => $action,
            'description' => $description,
            'ip_address'  => request()->ip(),
            'created_at'  => now(),
        ]);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'student_id' => 'required|string|max:20|unique:users,student_id',
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:8|confirmed',
            'course'     => 'required|string|max:100',
            'year_level' => 'required|integer|min:1|max:5',
            'gender'     => 'required|in:Male,Female,Other',
            'birthdate'  => 'required|date',
            'phone'      => 'required|string|max:15',
            'address'    => 'required|string|max:255',
        ]);

        $id = DB::table('users')->insertGetId([
            'student_id' => $request->student_id,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'course'     => $request->course,
            'year_level' => $request->year_level,
            'gender'     => $request->gender,
            'birthdate'  => $request->birthdate,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->storeLog($id, 'register', 'New student account registered.');

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->first_name . ' ' . $user->last_name);
            Session::put('student_id', $user->student_id);

            $this->storeLog($user->id, 'login', 'User logged in successfully.');

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        $userId = Session::get('user_id');

        $this->storeLog($userId, 'logout', 'User logged out.');

        Session::flush();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login')->withErrors(['email' => 'Please login first.']);
        }

        $user = DB::table('users')->where('id', Session::get('user_id'))->first();

        $logs = DB::table('activity_logs')
            ->where('user_id', Session::get('user_id'))
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard', compact('user', 'logs'));
    }

    public function settings()
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login')->withErrors(['email' => 'Please login first.']);
        }

        $user = DB::table('users')->where('id', Session::get('user_id'))->first();

        return view('auth.settings', compact('user'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:users,email,' . Session::get('user_id'),
            'course'     => 'required|string|max:100',
            'year_level' => 'required|integer|min:1|max:5',
            'phone'      => 'required|string|max:15',
            'address'    => 'required|string|max:255',
        ]);

        // Only validate password fields if the user filled in the current password
        if ($request->filled('current_password')) {
            $request->validate([
                'current_password' => 'required',
                'new_password'     => 'required|min:8|confirmed',
            ]);
        }

        $updates = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'course'     => $request->course,
            'year_level' => $request->year_level,
            'phone'      => $request->phone,
            'address'    => $request->address,
            'updated_at' => now(),
        ];

        // Handle password change if requested
        if ($request->filled('current_password')) {
            $user = DB::table('users')->where('id', Session::get('user_id'))->first();

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }

            $updates['password'] = Hash::make($request->new_password);

            $this->storeLog(Session::get('user_id'), 'password_change', 'User changed their password.');
        }

        DB::table('users')
            ->where('id', Session::get('user_id'))
            ->update($updates);

        $this->storeLog(Session::get('user_id'), 'profile_update', 'User updated their profile settings.');

        Session::put('user_name', $request->first_name . ' ' . $request->last_name);

        return back()->with('success', 'Profile updated successfully!');
    }
}
