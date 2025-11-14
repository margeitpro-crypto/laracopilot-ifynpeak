<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'hero' => [
                'title' => 'Creative Digital Solutions',
                'subtitle' => 'Transforming Ideas Into Stunning Digital Experiences',
                'description' => 'We craft innovative websites, brands, and digital experiences that captivate audiences and drive business growth.',
                'cta_text' => 'Start Your Project',
                'stats' => [
                    ['number' => '150+', 'label' => 'Projects Completed'],
                    ['number' => '98%', 'label' => 'Client Satisfaction'],
                    ['number' => '5+', 'label' => 'Years Experience'],
                    ['number' => '24/7', 'label' => 'Support Available']
                ]
            ],
            'services' => [
                [
                    'icon' => 'fas fa-paint-brush',
                    'title' => 'Brand Design',
                    'description' => 'Creating memorable brand identities that resonate with your target audience and stand out in the market.',
                    'features' => ['Logo Design', 'Brand Guidelines', 'Visual Identity', 'Marketing Materials']
                ],
                [
                    'icon' => 'fas fa-code',
                    'title' => 'Web Development',
                    'description' => 'Building responsive, fast, and user-friendly websites that convert visitors into customers.',
                    'features' => ['Custom Development', 'CMS Integration', 'E-commerce Solutions', 'API Development']
                ],
                [
                    'icon' => 'fas fa-mobile-alt',
                    'title' => 'Mobile Apps',
                    'description' => 'Developing native and cross-platform mobile applications for iOS and Android platforms.',
                    'features' => ['iOS Development', 'Android Development', 'React Native', 'UI/UX Design']
                ],
                [
                    'icon' => 'fas fa-chart-line',
                    'title' => 'Digital Marketing',
                    'description' => 'Comprehensive digital marketing strategies to boost your online presence and drive growth.',
                    'features' => ['SEO Optimization', 'Social Media', 'Content Marketing', 'PPC Campaigns']
                ]
            ],
            'portfolio' => [
                [
                    'title' => 'E-commerce Platform',
                    'category' => 'Web Development',
                    'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop',
                    'description' => 'Modern e-commerce solution with advanced features'
                ],
                [
                    'title' => 'Brand Identity',
                    'category' => 'Branding',
                    'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?w=600&h=400&fit=crop',
                    'description' => 'Complete brand identity for tech startup'
                ],
                [
                    'title' => 'Mobile Banking App',
                    'category' => 'Mobile Development',
                    'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&h=400&fit=crop',
                    'description' => 'Secure and intuitive banking application'
                ],
                [
                    'title' => 'Corporate Website',
                    'category' => 'Web Design',
                    'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop',
                    'description' => 'Professional corporate website with CMS'
                ]
            ],
            'testimonials' => [
                [
                    'name' => 'Sarah Johnson',
                    'position' => 'CEO, TechStart Inc.',
                    'content' => 'Outstanding work! They transformed our vision into a beautiful, functional website that exceeded our expectations.',
                    'rating' => 5,
                    'image' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?w=100&h=100&fit=crop&crop=face'
                ],
                [
                    'name' => 'Michael Chen',
                    'position' => 'Marketing Director, GrowthCo',
                    'content' => 'The team delivered exceptional results on time and within budget. Highly recommend their services!',
                    'rating' => 5,
                    'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face'
                ],
                [
                    'name' => 'Emily Rodriguez',
                    'position' => 'Founder, Creative Studio',
                    'content' => 'Professional, creative, and reliable. They brought our brand to life with stunning visual identity.',
                    'rating' => 5,
                    'image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face'
                ]
            ]
        ];

        return view('welcome', compact('data'));
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function portfolio()
    {
        return view('portfolio');
    }

    public function contact()
    {
        return view('contact');
    }
}