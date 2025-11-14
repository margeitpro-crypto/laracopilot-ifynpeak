<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private function checkAuth()
    {
        if (!session('student_logged_in')) {
            return redirect()->route('student.login');
        }
        return null;
    }

    public function dashboard()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $data = [
            'recent_results' => [
                ['exam' => 'Terminal Exam 2081', 'subject' => 'Mathematics', 'marks' => 85, 'grade' => 'A', 'date' => '2081-10-15'],
                ['exam' => 'Terminal Exam 2081', 'subject' => 'English', 'marks' => 78, 'grade' => 'B+', 'date' => '2081-10-15'],
                ['exam' => 'Unit Test 3', 'subject' => 'नेपाली', 'marks' => 92, 'grade' => 'A+', 'date' => '2081-09-20'],
                ['exam' => 'Monthly Test', 'subject' => 'Science', 'marks' => 88, 'grade' => 'A', 'date' => '2081-09-05']
            ],
            'attendance' => [
                'total_days' => 180,
                'present_days' => 165,
                'absent_days' => 15,
                'percentage' => 91.7
            ],
            'upcoming_exams' => [
                ['exam' => 'Pre-board Exam', 'subject' => 'Mathematics', 'date' => '2081-12-01', 'time' => '10:00 AM'],
                ['exam' => 'Pre-board Exam', 'subject' => 'English', 'date' => '2081-12-03', 'time' => '10:00 AM'],
                ['exam' => 'Terminal Exam', 'subject' => 'Science', 'date' => '2081-12-05', 'time' => '10:00 AM']
            ]
        ];

        return view('student.dashboard', compact('data'));
    }

    public function results()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $results = [
            'terminal_exam_2081' => [
                'exam_name' => 'Terminal Exam 2081',
                'total_marks' => 500,
                'obtained_marks' => 415,
                'percentage' => 83.0,
                'grade' => 'A',
                'rank' => 5,
                'subjects' => [
                    ['name' => 'नेपाली', 'full_marks' => 100, 'obtained' => 92, 'grade' => 'A+'],
                    ['name' => 'English', 'full_marks' => 100, 'obtained' => 78, 'grade' => 'B+'],
                    ['name' => 'Mathematics', 'full_marks' => 100, 'obtained' => 85, 'grade' => 'A'],
                    ['name' => 'Science', 'full_marks' => 100, 'obtained' => 88, 'grade' => 'A'],
                    ['name' => 'Social Studies', 'full_marks' => 100, 'obtained' => 72, 'grade' => 'B+']
                ]
            ],
            'unit_test_3' => [
                'exam_name' => 'Unit Test 3',
                'total_marks' => 300,
                'obtained_marks' => 258,
                'percentage' => 86.0,
                'grade' => 'A',
                'rank' => 3,
                'subjects' => [
                    ['name' => 'नेपाली', 'full_marks' => 60, 'obtained' => 54, 'grade' => 'A'],
                    ['name' => 'English', 'full_marks' => 60, 'obtained' => 48, 'grade' => 'B+'],
                    ['name' => 'Mathematics', 'full_marks' => 60, 'obtained' => 52, 'grade' => 'A'],
                    ['name' => 'Science', 'full_marks' => 60, 'obtained' => 56, 'grade' => 'A+'],
                    ['name' => 'Social Studies', 'full_marks' => 60, 'obtained' => 48, 'grade' => 'B+']
                ]
            ]
        ];

        return view('student.results', compact('results'));
    }

    public function profile()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $profile = [
            'name' => session('student_user')['name'],
            'symbol_number' => session('student_user')['symbol'],
            'class' => session('student_user')['class'],
            'school' => session('student_user')['school'],
            'roll_number' => 1,
            'date_of_birth' => '2064-05-15',
            'father_name' => 'श्याम बहादुर श्रेष्ठ',
            'mother_name' => 'रीता श्रेष्ठ',
            'address' => 'Kathmandu-15, Bagbazar',
            'phone' => '9841234567',
            'admission_date' => '2078-04-01'
        ];

        return view('student.profile', compact('profile'));
    }

    public function subjects()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $subjects = [
            ['code' => 'NEP10', 'name' => 'नेपाली', 'teacher' => 'श्री राम प्रसाद शर्मा', 'full_marks' => 100, 'pass_marks' => 40, 'credits' => 4],
            ['code' => 'ENG10', 'name' => 'English', 'teacher' => 'Mrs. Sarah Johnson', 'full_marks' => 100, 'pass_marks' => 40, 'credits' => 4],
            ['code' => 'MAT10', 'name' => 'Mathematics', 'teacher' => 'श्री हरि बहादुर थापा', 'full_marks' => 100, 'pass_marks' => 40, 'credits' => 4],
            ['code' => 'SCI10', 'name' => 'Science', 'teacher' => 'Dr. Kamala Devi', 'full_marks' => 100, 'pass_marks' => 40, 'credits' => 4],
            ['code' => 'SOC10', 'name' => 'Social Studies', 'teacher' => 'श्री गोविन्द प्रसाद पौडेल', 'full_marks' => 100, 'pass_marks' => 40, 'credits' => 4]
        ];

        return view('student.subjects', compact('subjects'));
    }

    public function attendance()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $attendance = [
            'summary' => [
                'total_days' => 180,
                'present_days' => 165,
                'absent_days' => 15,
                'percentage' => 91.7
            ],
            'monthly_data' => [
                ['month' => 'Baisakh 2081', 'total_days' => 20, 'present' => 19, 'absent' => 1, 'percentage' => 95.0],
                ['month' => 'Jestha 2081', 'total_days' => 22, 'present' => 20, 'absent' => 2, 'percentage' => 90.9],
                ['month' => 'Ashadh 2081', 'total_days' => 21, 'present' => 19, 'absent' => 2, 'percentage' => 90.5],
                ['month' => 'Shrawan 2081', 'total_days' => 23, 'present' => 21, 'absent' => 2, 'percentage' => 91.3],
                ['month' => 'Bhadra 2081', 'total_days' => 22, 'present' => 20, 'absent' => 2, 'percentage' => 90.9]
            ]
        ];

        return view('student.attendance', compact('attendance'));
    }
}