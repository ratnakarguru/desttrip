@extends('app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - DesTTrip Travels | Our Story & Mission</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #e95c33;
            --primary-dark: #d14a24;
            --secondary: #2196f3;
            --dark: #1a1a2e;
            --light: #f8f9fa;
            --gray: #6c757d;
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sunset: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --ocean: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --forest: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --shadow: 0 10px 40px rgba(0,0,0,0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
            background: var(--light);
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        /* Page Hero */
        .page-hero {
            height: 60vh;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=1920');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v100H0z" fill="none"/><path d="M0 100c20-20 40-20 60 0s40 20 40 0v100H0z" fill="rgba(255,255,255,0.05)"/></svg>');
            background-size: 100px;
            opacity: 0.3;
        }

        .page-hero-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            padding: 0 2rem;
            animation: fadeInUp 1s ease;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .breadcrumb a:hover {
            color: var(--primary);
        }

        .page-hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .page-hero p {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Story Section */
        .story-section {
            padding: 6rem 5%;
            max-width: 1400px;
            margin: 0 auto;
            background: white;
        }

        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .story-content h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
            position: relative;
            display: inline-block;
        }

        .story-content h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--primary);
            border-radius: 2px;
        }

        .story-content > p {
            color: var(--gray);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .highlight-box {
            background: var(--light);
            padding: 2rem;
            border-radius: 15px;
            border-left: 4px solid var(--primary);
            margin: 2rem 0;
        }

        .highlight-box p {
            font-style: italic;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .story-image {
            position: relative;
        }

        .image-main {
            width: 100%;
            border-radius: 20px;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 1;
        }

        .image-accent {
            position: absolute;
            width: 200px;
            height: 200px;
            background: var(--gradient);
            border-radius: 20px;
            bottom: -30px;
            left: -30px;
            z-index: 0;
            opacity: 0.8;
        }

        .experience-badge {
            position: absolute;
            bottom: 30px;
            right: -20px;
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            text-align: center;
            z-index: 2;
            animation: float 3s ease-in-out infinite;
        }

        .experience-badge .number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            display: block;
            line-height: 1;
        }

        .experience-badge .text {
            font-size: 0.9rem;
            color: var(--gray);
            font-weight: 500;
        }

        /* Values Section */
        .values-section {
            padding: 6rem 5%;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            position: relative;
            overflow: hidden;
        }

        .values-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: var(--sunset);
            border-radius: 50%;
            opacity: 0.1;
            filter: blur(80px);
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
            z-index: 1;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-header p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .value-card {
            background: white;
            padding: 3rem 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--gradient);
            transform: scaleX(0);
            transition: var(--transition);
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .value-card:hover::before {
            transform: scaleX(1);
        }

        .value-icon {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .value-icon::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            z-index: 0;
            transition: var(--transition);
        }

        .value-card:hover .value-icon::before {
            transform: rotate(180deg);
        }

        .value-icon i {
            position: relative;
            z-index: 1;
        }

        .value-card h3 {
            margin-bottom: 1rem;
            color: var(--dark);
            font-size: 1.5rem;
        }

        .value-card p {
            color: var(--gray);
            line-height: 1.8;
        }

        /* Stats Section */
        .stats-section {
            padding: 5rem 5%;
            background: var(--dark);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="rgba(255,255,255,0.03)"><path d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/></g></g></svg>');
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            padding: 2rem;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #fff 0%, #e95c33 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.8;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Timeline Section */
        .timeline-section {
            padding: 6rem 5%;
            background: var(--light);
            position: relative;
        }

        .timeline-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .timeline-line {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--secondary));
        }

        .timeline-item {
            display: flex;
            justify-content: flex-end;
            padding-right: 50%;
            position: relative;
            margin-bottom: 3rem;
        }

        .timeline-item:nth-child(even) {
            justify-content: flex-start;
            padding-right: 0;
            padding-left: 50%;
        }

        .timeline-content {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            max-width: 400px;
            position: relative;
            margin: 0 2rem;
            transition: var(--transition);
        }

        .timeline-content:hover {
            transform: scale(1.05);
        }

        .timeline-dot {
            position: absolute;
            width: 20px;
            height: 20px;
            background: var(--primary);
            border-radius: 50%;
            top: 2rem;
            left: 50%;
            transform: translateX(-50%);
            border: 4px solid white;
            box-shadow: 0 0 0 4px var(--primary);
            z-index: 2;
        }

        .timeline-year {
            font-size: 0.9rem;
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .timeline-content h3 {
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .timeline-content p {
            color: var(--gray);
            font-size: 0.95rem;
        }

        /* Partners Section */
        .partners-section {
            padding: 4rem 5%;
            background: white;
            text-align: center;
        }

        .partners-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 4rem;
            flex-wrap: wrap;
            max-width: 1000px;
            margin: 3rem auto 0;
            opacity: 0.6;
        }

        .partner-logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--gray);
            transition: var(--transition);
            filter: grayscale(100%);
        }

        .partner-logo:hover {
            color: var(--primary);
            filter: grayscale(0%);
            transform: scale(1.1);
        }

        /* CTA Section */
        .cta-section {
            padding: 6rem 5%;
            background: var(--gradient);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2"/></svg>');
            animation: rotate 20s linear infinite;
        }

        .cta-content {
            position: relative;
            z-index: 1;
            max-width: 700px;
            margin: 0 auto;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .btn-white {
            background: white;
            color: var(--primary);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 3rem 5%;
            text-align: center;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .social-links a {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-text {
            opacity: 0.8;
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 968px) {
            .nav-links {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            .story-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .story-image {
                order: -1;
            }

            .image-accent {
                display: none;
            }

            .experience-badge {
                right: 20px;
                bottom: 20px;
            }

            .timeline-line {
                left: 20px;
            }

            .timeline-item,
            .timeline-item:nth-child(even) {
                justify-content: flex-start;
                padding-left: 60px;
                padding-right: 0;
            }

            .timeline-dot {
                left: 20px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .page-hero {
                height: 50vh;
            }

            .values-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }

            .partners-grid {
                gap: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="page-hero-content">
            <div class="breadcrumb">
                <a href="#">Home</a>
                <span>/</span>
                <span>About Us</span>
            </div>
            <h1>Our Story</h1>
            <p>Passionate travelers dedicated to creating unforgettable experiences while making a positive impact on the world.</p>
        </div>
    </section>

    <!-- Story Section -->
    <section class="story-section">
        <div class="story-grid">
            <div class="story-content fade-in">
                <h2>Journey Begins with a Single Step</h2>
                <p>Founded in 2010, Wanderlust Travels started with a simple belief: travel should be transformative, not just transactional. What began as a small team of three passionate explorers has grown into a global community of travel enthusiasts, local experts, and sustainability advocates.</p>
                
                <p>We don't just plan trips; we curate experiences that connect you with the heart and soul of every destination. From the bustling streets of Mumbai to the serene backwaters of Kerala, from the ancient temples of Kyoto to the romantic avenues of Paris, we ensure every journey tells a story.</p>

                <div class="highlight-box">
                    <p>"Our mission is to ensure tourism always benefits local people by challenging bad practice and promoting better tourism. We believe in travel that gives back."</p>
                </div>

                <p>Today, we've served over 50,000 travelers, partnered with 200+ local communities, and maintained our commitment to ethical, sustainable tourism. Every itinerary we create is designed to minimize environmental impact while maximizing cultural exchange and economic benefit to local populations.</p>
            </div>

            <div class="story-image fade-in">
                <div class="image-accent"></div>
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800" alt="Our Team" class="image-main">
                <div class="experience-badge">
                    <span class="number">14+</span>
                    <span class="text">Years of<br>Excellence</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    <section class="values-section">
        <div class="section-header fade-in">
            <h2>What We Stand For</h2>
            <p>Our core values guide every decision we make and every journey we plan</p>
        </div>

        <div class="values-grid">
            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3>Ethical Tourism</h3>
                <p>We ensure every trip benefits local communities economically and socially. No exploitation, only empowerment. We partner directly with local guides, homestays, and artisans to ensure your travel dollars support real people.</p>
            </div>

            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <h3>Sustainability</h3>
                <p>Carbon-neutral itineraries, plastic-free operations, and eco-friendly accommodations. We're committed to preserving the planet for future generations of travelers. Every trip plants trees and supports conservation efforts.</p>
            </div>

            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Authentic Connections</h3>
                <p>Travel is about people. We facilitate genuine cultural exchanges that break down barriers and build understanding. Our travelers don't just visit places; they become part of communities, even if briefly.</p>
            </div>

            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3>Safety First</h3>
                <p>Your security is our priority. 24/7 support, vetted partners, comprehensive insurance, and rigorous safety protocols ensure peace of mind. Travel fearlessly, knowing we've got your back.</p>
            </div>

            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Innovation</h3>
                <p>We constantly evolve, using technology to enhance human connection rather than replace it. Virtual previews, AI-powered personalization, but always with the human touch that makes travel special.</p>
            </div>

            <div class="value-card fade-in">
                <div class="value-icon">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <h3>Transparency</h3>
                <p>No hidden fees, no surprise charges. Honest pricing, clear itineraries, and open communication. We believe you deserve to know exactly what you're paying for and where your money goes.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="stats-grid fade-in">
            <div class="stat-item">
                <div class="stat-number" data-target="50000">0</div>
                <div class="stat-label">Happy Travelers</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="120">0</div>
                <div class="stat-label">Destinations</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="200">0</div>
                <div class="stat-label">Local Partners</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="98">0</div>
                <div class="stat-label">% Satisfaction</div>
            </div>
        </div>
    </section>


    <!-- Timeline Section -->
    <section class="timeline-section">
        <div class="section-header fade-in">
            <h2>Our Journey</h2>
            <p>Key milestones that shaped who we are today</p>
        </div>

        <div class="timeline-container">
            <div class="timeline-line"></div>
            
            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">2010</div>
                    <h3>The Beginning</h3>
                    <p>Started with a small office in Navi Mumbai and a team of three passionate travelers organizing local weekend trips.</p>
                </div>
            </div>

            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">2013</div>
                    <h3>Going International</h3>
                    <p>Expanded to international destinations with our first Southeast Asia tour. Launched our ethical tourism initiative.</p>
                </div>
            </div>

            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">2016</div>
                    <h3>Community Partnership</h3>
                    <p>Established partnerships with 50+ local communities across India, ensuring authentic experiences and fair wages.</p>
                </div>
            </div>

            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">2019</div>
                    <h3>Digital Transformation</h3>
                    <p>Launched mobile app and AI-powered itinerary planner while maintaining our personalized service philosophy.</p>
                </div>
            </div>

            <div class="timeline-item fade-in">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <div class="timeline-year">2024</div>
                    <h3>Carbon Neutral</h3>
                    <p>Achieved carbon neutrality across all operations. Recognized as India's Most Sustainable Travel Company.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Partners Section -->
    <section class="partners-section">
        <div class="section-header fade-in">
            <h2>Trusted Partners</h2>
            <p>We collaborate with the best in the industry</p>
        </div>
        <div class="partners-grid fade-in">
            <div class="partner-logo"><i class="fas fa-plane"></i> AirIndia</div>
            <div class="partner-logo"><i class="fas fa-hotel"></i> Marriott</div>
            <div class="partner-logo"><i class="fas fa-globe"></i> NatGeo</div>
            <div class="partner-logo"><i class="fas fa-shield-alt"></i> Allianz</div>
            <div class="partner-logo"><i class="fas fa-leaf"></i> GreenStay</div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="cta-content fade-in">
            <h2>Ready to Start Your Journey?</h2>
            <p>Join thousands of satisfied travelers who have discovered the world with us. Let's create your perfect itinerary.</p>
            <a href="#" class="btn-white">
                <i class="fas fa-paper-plane"></i>
                Plan Your Trip
            </a>
        </div>
    </section>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

        // Animated counters
        const animateCounter = (el) => {
            const target = parseInt(el.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    el.textContent = target.toLocaleString() + (target === 98 ? '%' : '+');
                    clearInterval(timer);
                } else {
                    el.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        };

        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => animateCounter(counter));
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelector('.stats-grid') && statsObserver.observe(document.querySelector('.stats-grid'));


        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
@endsection()