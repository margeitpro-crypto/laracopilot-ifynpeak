<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'total_schools' => 1247,
            'total_students' => 145682,
            'total_results' => 89456,
            'success_rate' => 87.5,
            'featured_schools' => [
                ['name' => 'Kathmandu Model School', 'location' => 'Kathmandu', 'students' => 1250, 'grade' => 'A+'],
                ['name' => 'Pokhara Valley School', 'location' => 'Pokhara', 'students' => 980, 'grade' => 'A'],
                ['name' => 'Chitwan International School', 'location' => 'Chitwan', 'students' => 850, 'grade' => 'A+'],
                ['name' => 'Lalitpur Academy', 'location' => 'Lalitpur', 'students' => 720, 'grade' => 'A']
            ],
            'recent_results' => [
                ['exam' => 'SEE 2081', 'date' => '2081-01-15', 'published' => true, 'pass_rate' => '89.2%'],
                ['exam' => '+2 Final 2081', 'date' => '2081-02-10', 'published' => true, 'pass_rate' => '85.7%'],
                ['exam' => 'Grade 10 Terminal 2081', 'date' => '2081-02-25', 'published' => false, 'pass_rate' => 'Pending'],
                ['exam' => 'Grade 12 Pre-board 2081', 'date' => '2081-03-01', 'published' => false, 'pass_rate' => 'Pending']
            ]
        ];
        
        return view('welcome', compact('data'));
    }

    public function about()
    {
        return view('about');
    }

    public function schools()
    {
        return view('schools');
    }

    public function results()
    {
        return view('results');
    }

    public function contact()
    {
        return view('contact');
    }
}