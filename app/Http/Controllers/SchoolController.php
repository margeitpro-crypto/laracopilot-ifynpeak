<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchoolController extends Controller
{
    private function checkAuth()
    {
        if (!session('school_logged_in')) {
            return redirect()->route('school.login');
        }
        return null;
    }

    public function dashboard()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $data = [
            'total_students' => 1250,
            'total_teachers' => 45,
            'total_classes' => 35,
            'pending_results' => 12,
            'recent_results' => [
                ['exam' => 'Terminal Exam 2081', 'class' => 'Grade 10 A', 'students' => 35, 'published' => true],
                ['exam' => 'Unit Test 3', 'class' => 'Grade 12 B', 'students' => 32, 'published' => false],
                ['exam' => 'Pre-board Exam', 'class' => 'Grade 10 B', 'students' => 38, 'published' => false],
                ['exam' => 'Monthly Test', 'class' => 'Grade 11 A', 'students' => 30, 'published' => true]
            ],
            'class_performance' => [
                ['class' => 'Grade 10 A', 'students' => 35, 'pass_rate' => '94.3%', 'average' => 78.5],
                ['class' => 'Grade 10 B', 'students' => 38, 'pass_rate' => '89.5%', 'average' => 72.1],
                ['class' => 'Grade 12 A', 'students' => 30, 'pass_rate' => '96.7%', 'average' => 82.3],
                ['class' => 'Grade 12 B', 'students' => 32, 'pass_rate' => '90.6%', 'average' => 75.8]
            ]
        ];

        return view('school.dashboard', compact('data'));
    }

    public function students()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $students = [
            ['symbol' => '2081001', 'name' => 'राम बहादुर श्रेष्ठ', 'class' => 'Grade 10 A', 'roll' => 1, 'status' => 'Active', 'phone' => '9841234567'],
            ['symbol' => '2081002', 'name' => 'सीता कुमारी पौडेल', 'class' => 'Grade 12 B', 'roll' => 15, 'status' => 'Active', 'phone' => '9851234567'],
            ['symbol' => '2081003', 'name' => 'अर्जुन थापा मगर', 'class' => 'Grade 10 B', 'roll' => 8, 'status' => 'Active', 'phone' => '9861234567'],
            ['symbol' => '2081004', 'name' => 'गीता राई लिम्बू', 'class' => 'Grade 12 A', 'roll' => 22, 'status' => 'Active', 'phone' => '9871234567'],
            ['symbol' => '2081005', 'name' => 'विष्णु प्रसाद अधिकारी', 'class' => 'Grade 11 A', 'roll' => 12, 'status' => 'Active', 'phone' => '9881234567']
        ];

        return view('school.students', compact('students'));
    }

    public function results()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $results = [
            ['exam' => 'Terminal Exam 2081', 'class' => 'Grade 10 A', 'subject' => 'Mathematics', 'students' => 35, 'status' => 'Published', 'date' => '2081-10-15'],
            ['exam' => 'Terminal Exam 2081', 'class' => 'Grade 10 A', 'subject' => 'English', 'students' => 35, 'status' => 'Published', 'date' => '2081-10-15'],
            ['exam' => 'Unit Test 3', 'class' => 'Grade 12 B', 'subject' => 'Physics', 'students' => 32, 'status' => 'Pending', 'date' => '2081-11-01'],
            ['exam' => 'Pre-board Exam', 'class' => 'Grade 10 B', 'subject' => 'Science', 'students' => 38, 'status' => 'Draft', 'date' => '2081-11-10'],
            ['exam' => 'Monthly Test', 'class' => 'Grade 11 A', 'subject' => 'Nepali', 'students' => 30, 'status' => 'Published', 'date' => '2081-10-20']
        ];

        return view('school.results', compact('results'));
    }

    public function subjects()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $subjects = [
            ['code' => 'NEP10', 'name' => 'नेपाली', 'grade' => '10', 'teacher' => 'श्री राम प्रसाद शर्मा', 'full_marks' => 100, 'pass_marks' => 40],
            ['code' => 'ENG10', 'name' => 'English', 'grade' => '10', 'teacher' => 'Mrs. Sarah Johnson', 'full_marks' => 100, 'pass_marks' => 40],
            ['code' => 'MAT10', 'name' => 'Mathematics', 'grade' => '10', 'teacher' => 'श्री हरि बहादुर थापा', 'full_marks' => 100, 'pass_marks' => 40],
            ['code' => 'SCI10', 'name' => 'Science', 'grade' => '10', 'teacher' => 'Dr. Kamala Devi', 'full_marks' => 100, 'pass_marks' => 40],
            ['code' => 'SOC10', 'name' => 'Social Studies', 'grade' => '10', 'teacher' => 'श्री गोविन्द प्रसाद पौडेल', 'full_marks' => 100, 'pass_marks' => 40]
        ];

        return view('school.subjects', compact('subjects'));
    }

    public function classes()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $classes = [
            ['name' => 'Grade 10 A', 'students' => 35, 'teacher' => 'श्री राम प्रसाद शर्मा', 'room' => 'Room 101', 'schedule' => '6:00 AM - 11:00 AM'],
            ['name' => 'Grade 10 B', 'students' => 38, 'teacher' => 'श्रीमती सीता देवी', 'room' => 'Room 102', 'schedule' => '6:00 AM - 11:00 AM'],
            ['name' => 'Grade 11 A', 'students' => 30, 'teacher' => 'श्री हरि बहादुर थापा', 'room' => 'Room 201', 'schedule' => '11:15 AM - 4:15 PM'],
            ['name' => 'Grade 12 A', 'students' => 30, 'teacher' => 'Dr. Kamala Devi', 'room' => 'Room 202', 'schedule' => '11:15 AM - 4:15 PM'],
            ['name' => 'Grade 12 B', 'students' => 32, 'teacher' => 'श्री गोविन्द प्रसाद पौडेल', 'room' => 'Room 203', 'schedule' => '11:15 AM - 4:15 PM']
        ];

        return view('school.classes', compact('classes'));
    }

    public function teachers()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $teachers = [
            ['name' => 'श्री राम प्रसाद शर्मा', 'subject' => 'नेपाली', 'qualification' => 'M.A. Nepali', 'experience' => '15 years', 'phone' => '9841111111'],
            ['name' => 'Mrs. Sarah Johnson', 'subject' => 'English', 'qualification' => 'M.A. English', 'experience' => '12 years', 'phone' => '9851111111'],
            ['name' => 'श्री हरि बहादुर थापा', 'subject' => 'Mathematics', 'qualification' => 'M.Sc. Mathematics', 'experience' => '18 years', 'phone' => '9861111111'],
            ['name' => 'Dr. Kamala Devi', 'subject' => 'Science', 'qualification' => 'Ph.D. Physics', 'experience' => '20 years', 'phone' => '9871111111'],
            ['name' => 'श्री गोविन्द प्रसाद पौडेल', 'subject' => 'Social Studies', 'qualification' => 'M.A. History', 'experience' => '14 years', 'phone' => '9881111111']
        ];

        return view('school.teachers', compact('teachers'));
    }

    public function reports()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $reports = [
            'overall_performance' => [
                'total_students' => 1250,
                'average_attendance' => 92.5,
                'overall_pass_rate' => 89.7,
                'top_performers' => 156
            ],
            'subject_performance' => [
                ['subject' => 'Mathematics', 'average' => 78.5, 'pass_rate' => '87.3%', 'top_score' => 98],
                ['subject' => 'English', 'average' => 82.1, 'pass_rate' => '92.1%', 'top_score' => 96],
                ['subject' => 'नेपाली', 'average' => 85.7, 'pass_rate' => '94.5%', 'top_score' => 99],
                ['subject' => 'Science', 'average' => 76.2, 'pass_rate' => '84.6%', 'top_score' => 97]
            ]
        ];

        return view('school.reports', compact('reports'));
    }

    public function profile()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $profile = [
            'name' => session('school_user')['name'],
            'code' => session('school_user')['code'],
            'established' => '2055 B.S.',
            'address' => 'Kathmandu-15, Bagbazar',
            'phone' => '01-4123456',
            'email' => session('school_user')['email'],
            'principal' => 'श्री रमेश कुमार श्रेष्ठ',
            'total_students' => 1250,
            'total_teachers' => 45,
            'affiliation' => 'National Examination Board (NEB)'
        ];

        return view('school.profile', compact('profile'));
    }
}