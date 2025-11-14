@extends('layouts.app')

@section('title', 'Creative Digital Agency - Transforming Ideas Into Digital Experiences')

@section('content')
<!-- Hero Section -->
<section class="pt-20 pb-16 bg-gradient-to-br from-purple-50 via-pink-50 to-orange-50 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-purple-400/20 to-pink-400/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-blue-400/20 to-cyan-400/20 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <h1 class="text-5xl md:text-7xl font-bold text-gray-900 mb-6 animate-on-scroll">
                {{ $data['hero']['title'] }}
            </h1>
            <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-3xl mx-auto animate-on-scroll">
                {{ $data['hero']['subtitle'] }}
            </p>
            <p class="text-lg text-gray-500 mb-12 max-w-2xl mx-auto animate-on-scroll">
                {{ $data['hero']['description'] }}
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16 animate-on-scroll">
                <a href="#contact" class="bg-gradient-to-r from-purple-600 to-pink-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition duration-300 shadow-lg hover:shadow-xl">
                    {{ $data['hero']['cta_text'] }}
                </a>
                <a href="#portfolio" class="border-2 border-purple-600 text-purple-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-purple-600 hover:text-white transform hover:scale-105 transition duration-300">
                    View Our Work
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 animate-on-scroll">
                @foreach($data['hero']['stats'] as $stat)
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text mb-2">{{ $stat['number'] }}</div>
                    <div class="text-gray-600">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Our Creative Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">We offer comprehensive digital solutions to help your business thrive in the modern digital landscape.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['services'] as $service)
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300 border border-gray-100 hover-scale animate-on-scroll">
                <div class="w-16 h-16 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center mb-6">
                    <i class="{{ $service['icon'] }} text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h3>
                <p class="text-gray-600 mb-6">{{ $service['description'] }}</p>
                <ul class="space-y-2">
                    @foreach($service['features'] as $feature)
                    <li class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-gradient-to-br from-gray-50 to-purple-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div class="animate-on-scroll">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">About Creative Digital Agency</h2>
                <p class="text-lg text-gray-600 mb-6">
                    We are a passionate team of creative professionals dedicated to transforming your ideas into stunning digital experiences. With over 5 years of experience in the industry, we've helped businesses of all sizes achieve their digital goals.
                </p>
                <p class="text-lg text-gray-600 mb-8">
                    Our approach combines innovative design thinking with cutting-edge technology to deliver solutions that not only look amazing but also drive real business results.
                </p>
                
                <div class="grid grid-cols-2 gap-6 mb-8">
                    <div class="text-center p-6 bg-white rounded-xl shadow-lg">
                        <div class="text-3xl font-bold gradient-text mb-2">150+</div>
                        <div class="text-gray-600">Happy Clients</div>
                    </div>
                    <div class="text-center p-6 bg-white rounded-xl shadow-lg">
                        <div class="text-3xl font-bold gradient-text mb-2">200+</div>
                        <div class="text-gray-600">Projects Done</div>
                    </div>
                </div>

                <a href="#contact" class="inline-flex items-center bg-gradient-to-r from-purple-600 to-pink-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition duration-300">
                    Let's Work Together
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <div class="animate-on-scroll">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=600&fit=crop" alt="Our Team" class="rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 bg-gradient-to-r from-purple-600 to-pink-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section id="portfolio" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Our Featured Work</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover some of our most successful projects that showcase our expertise and creativity.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($data['portfolio'] as $item)
            <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-500 animate-on-scroll">
                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                        <div class="text-sm font-medium text-purple-300 mb-2">{{ $item['category'] }}</div>
                        <h3 class="text-lg font-bold mb-2">{{ $item['title'] }}</h3>
                        <p class="text-sm opacity-90">{{ $item['description'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12 animate-on-scroll">
            <a href="#contact" class="inline-flex items-center border-2 border-purple-600 text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-purple-600 hover:text-white transform hover:scale-105 transition duration-300">
                View All Projects
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gradient-to-br from-purple-50 to-pink-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">What Our Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Don't just take our word for it. Here's what our amazing clients have to say about working with us.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($data['testimonials'] as $testimonial)
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transform hover:scale-105 transition duration-300 animate-on-scroll">
                <div class="flex items-center mb-4">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                    @endfor
                </div>
                <p class="text-gray-600 mb-6 italic">"{{ $testimonial['content'] }}"</p>
                <div class="flex items-center">
                    <img src="{{ $testimonial['image'] }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <div class="font-semibold text-gray-900">{{ $testimonial['name'] }}</div>
                        <div class="text-sm text-gray-500">{{ $testimonial['position'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 animate-on-scroll">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Let's Start Your Project</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Ready to transform your ideas into reality? Get in touch with us today and let's create something amazing together.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="animate-on-scroll">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                            <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phone</label>
                        <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Needed</label>
                        <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200">
                            <option>Brand Design</option>
                            <option>Web Development</option>
                            <option>Mobile App</option>
                            <option>Digital Marketing</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition duration-200"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-purple-600 to-pink-600 text-white py-3 rounded-lg font-semibold hover:from-purple-700 hover:to-pink-700 transform hover:scale-105 transition duration-300 shadow-lg hover:shadow-xl">
                        Send Message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="animate-on-scroll">
                <div class="bg-gradient-to-br from-purple-600 to-pink-600 rounded-2xl p-8 text-white">
                    <h3 class="text-2xl font-bold mb-8">Get in Touch</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Visit Our Office</h4>
                                <p class="opacity-90">123 Creative Street<br>Design City, DC 12345</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-phone text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Call Us</h4>
                                <p class="opacity-90">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Email Us</h4>
                                <p class="opacity-90">hello@creative.com</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1">Business Hours</h4>
                                <p class="opacity-90">Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-white/20">
                        <h4 class="font-semibold mb-4">Follow Us</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition duration-300">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition duration-300">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition duration-300">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-white/20 rounded-lg flex items-center justify-center hover:bg-white/30 transition duration-300">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection