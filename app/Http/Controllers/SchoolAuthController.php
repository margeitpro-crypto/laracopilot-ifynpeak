<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolAuthController extends Controller
{
    private $schoolUsers = [
        ['email' => 'admin@kathmandumodel.edu.np', 'password' => 'school123', 'name' => 'Kathmandu Model School', 'code' => 'KMS001'],
        ['email' => 'admin@pokharavalley.edu.np', 'password' => 'school123', 'name' => 'Pokhara Valley School', 'code' => 'PVS002'],
        ['email' => 'admin@chitwanintl.edu.np', 'password' => 'school123', 'name' => 'Chitwan International School', 'code' => 'CIS003']
    ];

    public function showLogin()
    {
        if (session('school_logged_in')) {
            return redirect()->route('school.dashboard');
        }
        
        return view('school.login', ['credentials' => $this->schoolUsers]);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        foreach ($this->schoolUsers as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                session([
                    'school_logged_in' => true,
                    'school_user' => $user
                ]);
                return redirect()->route('school.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget(['school_logged_in', 'school_user']);
        return redirect()->route('school.login');
    }
}