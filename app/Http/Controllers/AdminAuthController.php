<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    private $adminUsers = [
        ['email' => 'admin@nepalresult.gov.np', 'password' => 'admin123', 'name' => 'System Administrator', 'role' => 'Super Admin'],
        ['email' => 'manager@nepalresult.gov.np', 'password' => 'manager123', 'name' => 'Result Manager', 'role' => 'Manager'],
        ['email' => 'supervisor@nepalresult.gov.np', 'password' => 'supervisor123', 'name' => 'Education Supervisor', 'role' => 'Supervisor']
    ];

    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        
        return view('admin.login', ['credentials' => $this->adminUsers]);
    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        foreach ($this->adminUsers as $user) {
            if ($user['email'] === $email && $user['password'] === $password) {
                session([
                    'admin_logged_in' => true,
                    'admin_user' => $user
                ]);
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user']);
        return redirect()->route('admin.login');
    }
}