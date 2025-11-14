<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function checkAuth()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return null;
    }

    public function dashboard()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $data = [
            'total_schools' => 1247,
            'total_students' => 145682,
            'total_results' => 89456,
            'pending_approvals' => 23,
            'recent_activities' => [
                ['action' => 'New school registered', 'school' => 'Bhaktapur Modern School', 'time' => '2 hours ago'],
                ['action' => 'Results published', 'school' => 'SEE 2081 Batch A', 'time' => '4 hours ago'],
                ['action' => 'Student data updated', 'school' => 'Kathmandu Model School', 'time' => '6 hours ago'],
                ['action' => 'Grade verification completed', 'school' => 'Pokhara Valley School', 'time' => '1 day ago']
            ],
            'district_stats' => [
                ['district' => 'Kathmandu', 'schools' => 245, 'students' => 28450],
                ['district' => 'Pokhara', 'schools' => 156, 'students' => 18920],
                ['district' => 'Chitwan', 'schools' => 98, 'students' => 12340],
                ['district' => 'Lalitpur', 'schools' => 134, 'students' => 15680]
            ]
        ];

        return view('admin.dashboard', compact('data'));
    }

    public function schools()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $schools = [
            ['id' => 1, 'name' => 'Kathmandu Model School', 'code' => 'KMS001', 'district' => 'Kathmandu', 'students' => 1250, 'status' => 'Active', 'established' => '2055'],
            ['id' => 2, 'name' => 'Pokhara Valley School', 'code' => 'PVS002', 'district' => 'Pokhara', 'students' => 980, 'status' => 'Active', 'established' => '2058'],
            ['id' => 3, 'name' => 'Chitwan International School', 'code' => 'CIS003', 'district' => 'Chitwan', 'students' => 850, 'status' => 'Active', 'established' => '2060'],
            ['id' => 4, 'name' => 'Lalitpur Academy', 'code' => 'LA004', 'district' => 'Lalitpur', 'students' => 720, 'status' => 'Pending', 'established' => '2062'],
            ['id' => 5, 'name' => 'Bhaktapur Modern School', 'code' => 'BMS005', 'district' => 'Bhaktapur', 'students' => 650, 'status' => 'Active', 'established' => '2061']
        ];

        return view('admin.schools', compact('schools'));
    }

    public function students()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $students = [
            ['id' => 1, 'name' => 'राम बहादुर श्रेष्ठ', 'symbol' => '2081001', 'school' => 'Kathmandu Model School', 'grade' => '10', 'status' => 'Active'],
            ['id' => 2, 'name' => 'सीता कुमारी पौडेल', 'symbol' => '2081002', 'school' => 'Pokhara Valley School', 'grade' => '12', 'status' => 'Active'],
            ['id' => 3, 'name' => 'अर्जुन थापा मगर', 'symbol' => '2081003', 'school' => 'Chitwan International School', 'grade' => '10', 'status' => 'Active'],
            ['id' => 4, 'name' => 'गीता राई लिम्बू', 'symbol' => '2081004', 'school' => 'Lalitpur Academy', 'grade' => '12', 'status' => 'Pending'],
            ['id' => 5, 'name' => 'विष्णु प्रसाद अधिकारी', 'symbol' => '2081005', 'school' => 'Bhaktapur Modern School', 'grade' => '10', 'status' => 'Active']
        ];

        return view('admin.students', compact('students'));
    }

    public function results()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $results = [
            ['exam' => 'SEE 2081', 'school' => 'Kathmandu Model School', 'published' => true, 'pass_rate' => '92.5%', 'total_students' => 120],
            ['exam' => '+2 Final 2081', 'school' => 'Pokhara Valley School', 'published' => true, 'pass_rate' => '88.7%', 'total_students' => 95],
            ['exam' => 'SEE 2081', 'school' => 'Chitwan International School', 'published' => false, 'pass_rate' => 'Pending', 'total_students' => 85],
            ['exam' => '+2 Final 2081', 'school' => 'Lalitpur Academy', 'published' => false, 'pass_rate' => 'Pending', 'total_students' => 72],
            ['exam' => 'Grade 10 Terminal', 'school' => 'Bhaktapur Modern School', 'published' => true, 'pass_rate' => '85.3%', 'total_students' => 65]
        ];

        return view('admin.results', compact('results'));
    }

    public function subjects()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $subjects = [
            ['code' => 'NEP101', 'name' => 'नेपाली', 'grade' => '10', 'full_marks' => 100, 'pass_marks' => 40, 'type' => 'Compulsory'],
            ['code' => 'ENG101', 'name' => 'English', 'grade' => '10', 'full_marks' => 100, 'pass_marks' => 40, 'type' => 'Compulsory'],
            ['code' => 'MAT101', 'name' => 'Mathematics', 'grade' => '10', 'full_marks' => 100, 'pass_marks' => 40, 'type' => 'Compulsory'],
            ['code' => 'SCI101', 'name' => 'Science', 'grade' => '10', 'full_marks' => 100, 'pass_marks' => 40, 'type' => 'Compulsory'],
            ['code' => 'SOC101', 'name' => 'Social Studies', 'grade' => '10', 'full_marks' => 100, 'pass_marks' => 40, 'type' => 'Compulsory']
        ];

        return view('admin.subjects', compact('subjects'));
    }

    public function grades()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $grades = [
            ['grade' => 'A+', 'min_percentage' => 90, 'max_percentage' => 100, 'gpa' => 4.0, 'description' => 'Outstanding'],
            ['grade' => 'A', 'min_percentage' => 80, 'max_percentage' => 89, 'gpa' => 3.6, 'description' => 'Excellent'],
            ['grade' => 'B+', 'min_percentage' => 70, 'max_percentage' => 79, 'gpa' => 3.2, 'description' => 'Very Good'],
            ['grade' => 'B', 'min_percentage' => 60, 'max_percentage' => 69, 'gpa' => 2.8, 'description' => 'Good'],
            ['grade' => 'C+', 'min_percentage' => 50, 'max_percentage' => 59, 'gpa' => 2.4, 'description' => 'Satisfactory']
        ];

        return view('admin.grades', compact('grades'));
    }

    public function reports()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $reports = [
            'exam_statistics' => [
                'total_exams' => 156,
                'published_results' => 142,
                'pending_results' => 14,
                'average_pass_rate' => 87.5
            ],
            'district_performance' => [
                ['district' => 'Kathmandu', 'pass_rate' => 92.3, 'schools' => 245, 'students' => 28450],
                ['district' => 'Pokhara', 'pass_rate' => 89.7, 'schools' => 156, 'students' => 18920],
                ['district' => 'Chitwan', 'pass_rate' => 86.1, 'schools' => 98, 'students' => 12340],
                ['district' => 'Lalitpur', 'pass_rate' => 91.8, 'schools' => 134, 'students' => 15680]
            ]
        ];

        return view('admin.reports', compact('reports'));
    }

    public function users()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $users = [
            ['name' => 'System Administrator', 'email' => 'admin@nepalresult.gov.np', 'role' => 'Super Admin', 'status' => 'Active', 'last_login' => '2 hours ago'],
            ['name' => 'Result Manager', 'email' => 'manager@nepalresult.gov.np', 'role' => 'Manager', 'status' => 'Active', 'last_login' => '1 day ago'],
            ['name' => 'Education Supervisor', 'email' => 'supervisor@nepalresult.gov.np', 'role' => 'Supervisor', 'status' => 'Active', 'last_login' => '3 hours ago'],
            ['name' => 'Data Entry Operator', 'email' => 'operator@nepalresult.gov.np', 'role' => 'Operator', 'status' => 'Inactive', 'last_login' => '1 week ago']
        ];

        return view('admin.users', compact('users'));
    }

    public function settings()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $settings = [
            'system_name' => 'Nepal School Result Management System',
            'academic_year' => '2081-82',
            'result_publication_enabled' => true,
            'student_registration_enabled' => true,
            'school_registration_enabled' => false,
            'maintenance_mode' => false
        ];

        return view('admin.settings', compact('settings'));
    }
}