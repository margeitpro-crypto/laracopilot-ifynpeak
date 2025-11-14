<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentAuthController extends Controller
{
    private $studentUsers = [
        ['symbol' => '2081001', 'password' => 'student123', 'name' => 'राम बहादुर श्रेष्ठ', 'class' => 'Grade 10 A', 'school' => 'Kathmandu Model School'],
        ['symbol' => '2081002', 'password' => 'student123', 'name' => 'सीता कुमारी पौडेल', 'class' => 'Grade 12 B', 'school' => 'Pokhara Valley School'],
        ['symbol' => '2081003', 'password' => 'student123', 'name' => 'अर्जुन थापा मगर', 'class' => 'Grade 10 B', 'school' => 'Chitwan International School']
    ];

    public function showLogin()
    {
        if (session('student_logged_in')) {
            return redirect()->route('student.dashboard');
        }
        
        return view('student.login', ['credentials' => $this->studentUsers]);
    }

    public function login(Request $request)
    {
        $symbol = $request->symbol;
        $password = $request->password;

        foreach ($this->studentUsers as $user) {
            if ($user['symbol'] === $symbol && $user['password'] === $password) {
                session([
                    'student_logged_in' => true,
                    'student_user' => $user
                ]);
                return redirect()->route('student.dashboard');
            }
        }

        return back()->withErrors(['symbol' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget(['student_logged_in', 'student_user']);
        return redirect()->route('student.login');
    }
}