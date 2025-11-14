<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // Simple session check
        if (!session('admin_logged_in')) {
            redirect()->route('admin.login')->send();
        }
    }

    public function dashboard()
    {
        $data = [
            'stats' => [
                ['title' => 'Active Projects', 'value' => '24', 'change' => '+12%', 'icon' => 'fas fa-project-diagram', 'color' => 'purple'],
                ['title' => 'Total Clients', 'value' => '156', 'change' => '+8%', 'icon' => 'fas fa-users', 'color' => 'blue'],
                ['title' => 'Revenue', 'value' => '$89,500', 'change' => '+15%', 'icon' => 'fas fa-dollar-sign', 'color' => 'green'],
                ['title' => 'Team Members', 'value' => '12', 'change' => '+2', 'icon' => 'fas fa-user-friends', 'color' => 'orange']
            ],
            'recent_projects' => [
                ['name' => 'E-commerce Redesign', 'client' => 'TechCorp', 'status' => 'In Progress', 'progress' => 75],
                ['name' => 'Brand Identity', 'client' => 'StartupXYZ', 'status' => 'Review', 'progress' => 90],
                ['name' => 'Mobile App UI', 'client' => 'FinanceApp', 'status' => 'Planning', 'progress' => 25],
                ['name' => 'Website Development', 'client' => 'HealthCare+', 'status' => 'Completed', 'progress' => 100]
            ],
            'team_activity' => [
                ['name' => 'Sarah Wilson', 'action' => 'Updated project timeline', 'time' => '2 hours ago'],
                ['name' => 'Mike Johnson', 'action' => 'Completed design review', 'time' => '4 hours ago'],
                ['name' => 'Emma Davis', 'action' => 'Added new client', 'time' => '6 hours ago'],
                ['name' => 'Tom Brown', 'action' => 'Submitted final deliverables', 'time' => '1 day ago']
            ]
        ];

        return view('admin.dashboard', compact('data'));
    }

    public function projects()
    {
        $data = [
            'projects' => [
                ['id' => 1, 'name' => 'E-commerce Platform', 'client' => 'TechCorp Ltd.', 'status' => 'In Progress', 'progress' => 75, 'deadline' => '2024-02-15', 'budget' => '$25,000'],
                ['id' => 2, 'name' => 'Brand Identity Package', 'client' => 'StartupXYZ', 'status' => 'Review', 'progress' => 90, 'deadline' => '2024-01-30', 'budget' => '$8,500'],
                ['id' => 3, 'name' => 'Mobile Banking App', 'client' => 'FinanceApp Inc.', 'status' => 'Planning', 'progress' => 25, 'deadline' => '2024-03-20', 'budget' => '$45,000'],
                ['id' => 4, 'name' => 'Corporate Website', 'client' => 'HealthCare Plus', 'status' => 'Completed', 'progress' => 100, 'deadline' => '2024-01-10', 'budget' => '$15,000'],
                ['id' => 5, 'name' => 'Digital Marketing Campaign', 'client' => 'RetailMart', 'status' => 'In Progress', 'progress' => 60, 'deadline' => '2024-02-28', 'budget' => '$12,000']
            ]
        ];

        return view('admin.projects', compact('data'));
    }

    public function clients()
    {
        $data = [
            'clients' => [
                ['id' => 1, 'name' => 'TechCorp Ltd.', 'email' => 'contact@techcorp.com', 'phone' => '+1 (555) 123-4567', 'projects' => 3, 'total_value' => '$67,500', 'status' => 'Active'],
                ['id' => 2, 'name' => 'StartupXYZ', 'email' => 'hello@startupxyz.com', 'phone' => '+1 (555) 234-5678', 'projects' => 2, 'total_value' => '$23,500', 'status' => 'Active'],
                ['id' => 3, 'name' => 'FinanceApp Inc.', 'email' => 'info@financeapp.com', 'phone' => '+1 (555) 345-6789', 'projects' => 1, 'total_value' => '$45,000', 'status' => 'Active'],
                ['id' => 4, 'name' => 'HealthCare Plus', 'email' => 'support@healthcare.com', 'phone' => '+1 (555) 456-7890', 'projects' => 4, 'total_value' => '$89,000', 'status' => 'Completed'],
                ['id' => 5, 'name' => 'RetailMart', 'email' => 'marketing@retailmart.com', 'phone' => '+1 (555) 567-8901', 'projects' => 2, 'total_value' => '$34,000', 'status' => 'Active']
            ]
        ];

        return view('admin.clients', compact('data'));
    }

    public function portfolio()
    {
        $data = [
            'portfolio_items' => [
                ['id' => 1, 'title' => 'E-commerce Platform Redesign', 'category' => 'Web Development', 'client' => 'TechCorp', 'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=300&fit=crop', 'featured' => true, 'date' => '2024-01-15'],
                ['id' => 2, 'title' => 'Startup Brand Identity', 'category' => 'Branding', 'client' => 'StartupXYZ', 'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=400&h=300&fit=crop', 'featured' => true, 'date' => '2024-01-10'],
                ['id' => 3, 'title' => 'Mobile Banking Interface', 'category' => 'Mobile App', 'client' => 'FinanceApp', 'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400&h=300&fit=crop', 'featured' => false, 'date' => '2024-01-05'],
                ['id' => 4, 'title' => 'Healthcare Website', 'category' => 'Web Design', 'client' => 'HealthCare Plus', 'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop', 'featured' => false, 'date' => '2023-12-20'],
                ['id' => 5, 'title' => 'Retail Marketing Campaign', 'category' => 'Digital Marketing', 'client' => 'RetailMart', 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop', 'featured' => true, 'date' => '2023-12-15']
            ]
        ];

        return view('admin.portfolio', compact('data'));
    }

    public function team()
    {
        $data = [
            'team_members' => [
                ['id' => 1, 'name' => 'Sarah Wilson', 'position' => 'Creative Director', 'email' => 'sarah@creative.com', 'phone' => '+1 (555) 111-2222', 'department' => 'Design', 'status' => 'Active', 'projects' => 8],
                ['id' => 2, 'name' => 'Mike Johnson', 'position' => 'Senior Developer', 'email' => 'mike@creative.com', 'phone' => '+1 (555) 222-3333', 'department' => 'Development', 'status' => 'Active', 'projects' => 6],
                ['id' => 3, 'name' => 'Emma Davis', 'position' => 'Project Manager', 'email' => 'emma@creative.com', 'phone' => '+1 (555) 333-4444', 'department' => 'Management', 'status' => 'Active', 'projects' => 12],
                ['id' => 4, 'name' => 'Tom Brown', 'position' => 'UI/UX Designer', 'email' => 'tom@creative.com', 'phone' => '+1 (555) 444-5555', 'department' => 'Design', 'status' => 'Active', 'projects' => 5],
                ['id' => 5, 'name' => 'Lisa Chen', 'position' => 'Marketing Specialist', 'email' => 'lisa@creative.com', 'phone' => '+1 (555) 555-6666', 'department' => 'Marketing', 'status' => 'On Leave', 'projects' => 3]
            ]
        ];

        return view('admin.team', compact('data'));
    }

    public function reports()
    {
        $data = [
            'monthly_revenue' => [
                'Jan' => 45000, 'Feb' => 52000, 'Mar' => 48000, 'Apr' => 61000,
                'May' => 55000, 'Jun' => 67000, 'Jul' => 59000, 'Aug' => 73000,
                'Sep' => 68000, 'Oct' => 75000, 'Nov' => 82000, 'Dec' => 89000
            ],
            'project_status' => [
                'Completed' => 45, 'In Progress' => 18, 'Planning' => 12, 'On Hold' => 5
            ],
            'client_satisfaction' => [
                'Excellent' => 65, 'Good' => 28, 'Fair' => 5, 'Poor' => 2
            ]
        ];

        return view('admin.reports', compact('data'));
    }

    public function settings()
    {
        $data = [
            'company_info' => [
                'name' => 'Creative Digital Agency',
                'email' => 'info@creative.com',
                'phone' => '+1 (555) 123-4567',
                'address' => '123 Creative Street, Design City, DC 12345',
                'website' => 'https://creative.com',
                'timezone' => 'America/New_York'
            ],
            'notification_settings' => [
                'email_notifications' => true,
                'sms_notifications' => false,
                'push_notifications' => true,
                'weekly_reports' => true,
                'client_updates' => true
            ]
        ];

        return view('admin.settings', compact('data'));
    }
}