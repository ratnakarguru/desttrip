@extends('app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DesTTrip - Destination Your Plan</title>
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
            --shadow: 0 10px 40px rgba(0,0,0,0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

      

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1564507592333-c60657eea523?w=1920');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 2rem;
            animation: fadeInUp 1s ease;
        }

        .hero h1 {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            margin-bottom: 1.5rem;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 15px rgba(233,92,51,0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(233,92,51,0.6);
            background: var(--primary-dark);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline:hover {
            background: white;
            color: var(--dark);
            transform: translateY(-3px);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            animation: bounce 2s infinite;
        }

        .scroll-indicator i {
            color: white;
            font-size: 2rem;
        }

        /* Section Styling */
        section {
            padding: 6rem 5%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-header h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary);
            border-radius: 2px;
        }

        .section-header p {
            color: var(--gray);
            max-width: 600px;
            margin: 1.5rem auto 0;
        }

        /* About Section */
        .about {
            background: var(--light);
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .about-card {
            background: white;
            padding: 3rem 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .about-card::before {
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

        .about-card:hover {
            transform: translateY(-10px);
        }

        .about-card:hover::before {
            transform: scaleX(1);
        }

        .icon-wrapper {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
            font-size: 2rem;
            transition: var(--transition);
        }

        .about-card:hover .icon-wrapper {
            transform: rotateY(360deg);
        }

        .about-card h3 {
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .about-card p {
            color: var(--gray);
            line-height: 1.8;
        }

        .read-more {
            display: inline-block;
            margin-top: 1.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .read-more:hover {
            color: var(--primary-dark);
            transform: translateX(5px);
        }

        /* Gallery Section */
        .gallery {
            background: white;
        }

        .filter-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            color: var(--gray);
        }

        .filter-btn:hover, .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(233,92,51,0.3);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            position: relative;
            border-radius: 15px;
            overflow: hidden;
            aspect-ratio: 4/3;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 2rem;
            opacity: 0;
            transition: var(--transition);
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        .gallery-overlay h4 {
            color: white;
            font-size: 1.25rem;
            transform: translateY(20px);
            transition: var(--transition);
        }

        .gallery-overlay p {
            color: rgba(255,255,255,0.8);
            transform: translateY(20px);
            transition: var(--transition);
            transition-delay: 0.1s;
        }

        .gallery-item:hover .gallery-overlay h4,
        .gallery-item:hover .gallery-overlay p {
            transform: translateY(0);
        }

        /* Testimonials */
        .testimonials {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .testimonials::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="2"/></svg>');
            animation: rotate 20s linear infinite;
        }

        .testimonials .section-header h2 {
            color: white;
        }

        .testimonials .section-header h2::after {
            background: white;
        }

        .testimonial-slider {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .testimonial-item {
            text-align: center;
            padding: 2rem;
        }

        .quote-icon {
            font-size: 3rem;
            color: rgba(255,255,255,0.3);
            margin-bottom: 1rem;
        }

        .testimonial-text {
            font-size: 1.25rem;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .author-info h4 {
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .author-info span {
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .slider-dots {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 2rem;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            cursor: pointer;
            transition: var(--transition);
        }

        .dot.active {
            background: white;
            transform: scale(1.2);
        }

        /* Map Section */
        .map-section {
            padding: 0;
            max-width: 100%;
        }

        .map-container {
            position: relative;
            height: 400px;
            background: var(--light);
        }

        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
            filter: grayscale(20%);
        }

        .map-overlay {
            position: absolute;
            top: 50%;
            left: 5%;
            transform: translateY(-50%);
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            max-width: 300px;
        }

        .map-overlay h3 {
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .map-overlay p {
            color: var(--gray);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* Contact Section */
        .contact {
            background: var(--light);
        }

        .contact-wrapper {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 4rem;
            align-items: start;
        }

        .contact-info h3 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .contact-info > p {
            color: var(--gray);
            margin-bottom: 2rem;
        }

        .info-cards {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .info-card {
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            padding: 1.5rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: var(--transition);
        }

        .info-card:hover {
            transform: translateX(5px);
            box-shadow: var(--shadow);
        }

        .info-icon {
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }

        .info-content h4 {
            margin-bottom: 0.25rem;
            color: var(--dark);
        }

        .info-content p, .info-content a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }

        .info-content a:hover {
            color: var(--primary);
        }

        .contact-form {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark);
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-family: inherit;
            transition: var(--transition);
            font-size: 1rem;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(233,92,51,0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .submit-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(233,92,51,0.4);
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

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            40% {
                transform: translateX(-50%) translateY(-10px);
            }
            60% {
                transform: translateX(-50%) translateY(-5px);
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

            .contact-wrapper {
                grid-template-columns: 1fr;
            }

            .map-overlay {
                position: relative;
                left: 0;
                transform: none;
                margin: 1rem;
                max-width: none;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .filter-buttons {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }

            section {
                padding: 4rem 1.5rem;
            }
        }

        /* Notification */
        .notification {
            position: fixed;
            top: 100px;
            right: -100%;
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 1rem;
            z-index: 2000;
            transition: right 0.3s ease;
            border-left: 4px solid #4caf50;
        }

        .notification.show {
            right: 2rem;
        }

        .notification i {
            color: #4caf50;
            font-size: 1.5rem;
        }

        .notification.error {
            border-left-color: #f44336;
        }

        .notification.error i {
            color: #f44336;
        }
    </style>
</head>
<body>

   <!-- header -->
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
         <h1>Incredible India Awaits You</h1>
<p>From the snow-capped Himalayas to the serene backwaters of Kerala, discover the soul of India through unforgettable journeys.</p>
            <div class="cta-buttons">
                <a href="#gallery" class="btn btn-primary">
                    <i class="fas fa-compass"></i>
                    Explore Tours
                </a>
                <a href="#contact" class="btn btn-outline">
                    <i class="fas fa-phone"></i>
                    Contact Us
                </a>
            </div>
        </div>
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- About Section -->
   
        
        <div class="about-grid">
            <div class="about-card fade-in">
                <div class="icon-wrapper">
                    <i class="fas fa-eye"></i>
                </div>
                <h3>Our Vision</h3>
                <p>Tourism which is ethical, fair and a positive experience for both travellers and the people and places they visit. We believe in responsible travel that benefits everyone.</p>
            </div>

            <div class="about-card fade-in">
                <div class="icon-wrapper">
                    <i class="fas fa-bullseye"></i>
                </div>
                <h3>Our Mission</h3>
                <p>To ensure tourism always benefits local people by challenging bad practice and promoting better tourism. We work directly with local communities to create authentic experiences.</p>
            </div>

            <div class="about-card fade-in">
                <div class="icon-wrapper">
                    <i class="fas fa-suitcase"></i>
                </div>
                <h3>Packages</h3>
                <p>Vacation is a time to relax at beautiful places, discover unknown adventures and new experiences. From short getaways to extended expeditions, we have something for everyone.</p>
                <a href="#" class="read-more">View Packages <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="section-header fade-in">
            <h2>Popular Destinations</h2>
            <p>Explore our handpicked selection of incredible destinations around the world</p>
        </div>

        <div class="filter-buttons fade-in">
            <button class="filter-btn active" onclick="filterGallery('all')">All Destinations</button>
            <button class="filter-btn" onclick="filterGallery('domestic')">Domestic</button>
            <button class="filter-btn" onclick="filterGallery('international')">International</button>
            <button class="filter-btn" onclick="filterGallery('short')">Short Tours</button>
            <button class="filter-btn" onclick="filterGallery('long')">Long Tours</button>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            <div class="gallery-item" data-category="international long">
                <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=600" alt="Paris">
                <div class="gallery-overlay">
                    <h4>Paris, France</h4>
                    <p>7 Days Tour</p>
                </div>
            </div>
            <div class="gallery-item" data-category="domestic short">
                <img src="https://images.unsplash.com/photo-1561361058-4c7e76622863?w=600" alt="Goa">
                <div class="gallery-overlay">
                    <h4>Goa, India</h4>
                    <p>3 Days Beach Getaway</p>
                </div>
            </div>
            <div class="gallery-item" data-category="international long">
                <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?w=600" alt="Kyoto">
                <div class="gallery-overlay">
                    <h4>Kyoto, Japan</h4>
                    <p>10 Days Cultural Tour</p>
                </div>
            </div>
            <div class="gallery-item" data-category="domestic short">
                <img src="https://images.unsplash.com/photo-1566552881560-0be862a7c445?w=600" alt="Kerala">
                <div class="gallery-overlay">
                    <h4>Kerala Backwaters</h4>
                    <p>4 Days Relaxation</p>
                </div>
            </div>
            <div class="gallery-item" data-category="international long">
                <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?w=600" alt="Bali">
                <div class="gallery-overlay">
                    <h4>Bali, Indonesia</h4>
                    <p>8 Days Island Hop</p>
                </div>
            </div>
            <div class="gallery-item" data-category="domestic long">
                <img src="https://images.unsplash.com/photo-1595658658481-d53d3f999875?w=600" alt="Ladakh">
                <div class="gallery-overlay">
                    <h4>Ladakh, India</h4>
                    <p>12 Days Adventure</p>
                </div>
            </div>
            <div class="gallery-item" data-category="international short">
                <img src="https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=600" alt="Dubai">
                <div class="gallery-overlay">
                    <h4>Dubai, UAE</h4>
                    <p>5 Days Luxury</p>
                </div>
            </div>
            <div class="gallery-item" data-category="domestic short">
                <img src="https://images.unsplash.com/photo-1587474260584-136574528ed5?w=600" alt="Delhi">
                <div class="gallery-overlay">
                    <h4>Golden Triangle</h4>
                    <p>6 Days Heritage</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials" id="testimonials">
        <div class="section-header fade-in">
            <h2>What Travelers Say</h2>
            <p>Real experiences from our happy customers</p>
        </div>

        <div class="testimonial-slider fade-in">
            <div class="testimonial-item" id="testimonial1">
                <i class="fas fa-quote-left quote-icon"></i>
                <p class="testimonial-text">"Travel with an open mind and make the most of opportunities - it adds to travel experience. Wanderlust Travels made sure every moment was magical and hassle-free."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="author-info">
                        <h4>Amit Sharma</h4>
                        <span>Adventure Enthusiast</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-item" id="testimonial2" style="display: none;">
                <i class="fas fa-quote-left quote-icon"></i>
                <p class="testimonial-text">"To begin with, we had a really good time. The treatment we received was simply genuine and unconditional. We did not have the slightest problem anywhere during our trip. All together we had a memorable trip!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="author-info">
                        <h4>Suraj Jha</h4>
                        <span>Family Traveler</span>
                    </div>
                </div>
            </div>

            <div class="testimonial-item" id="testimonial3" style="display: none;">
                <i class="fas fa-quote-left quote-icon"></i>
                <p class="testimonial-text">"Most memorable trip ever in my life. Looking forward to more holidays with Wanderlust Travels. The attention to detail and personalized service was outstanding!"</p>
                <div class="testimonial-author">
                    <div class="author-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="author-info">
                        <h4>Smith Johnson</h4>
                        <span>Solo Traveler</span>
                    </div>
                </div>
            </div>

            <div class="slider-dots">
                <span class="dot active" onclick="showTestimonial(1)"></span>
                <span class="dot" onclick="showTestimonial(2)"></span>
                <span class="dot" onclick="showTestimonial(3)"></span>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241412.9701526993!2d72.89403363732778!3d19.016299342875357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b8f8b9b5b5b5%3A0x5b5b5b5b5b5b5b5b!2sNavi%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1635959562000!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
            
            <div class="map-overlay">
                <h3>Visit Our Office</h3>
                <p><i class="fas fa-map-marker-alt"></i> 1100 Link Street, Navi Mumbai</p>
                <p><i class="fas fa-clock"></i> Mon - Sat: 9:00 AM - 7:00 PM</p>
                <p><i class="fas fa-phone"></i> +91 80972 04164</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="section-header fade-in">
            <h2>Plan Your Trip</h2>
            <p>Our travel experts are ready to help you book your dream vacation</p>
        </div>

        <div class="contact-wrapper">
            <div class="contact-info fade-in">
                <h3>Get in Touch</h3>
                <p>Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                
                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="info-content">
                            <h4>AMIT Enterprises</h4>
                            <p>Travel Experts & Tour Operators</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Phone</h4>
                            <a href="tel:+918097204164">+91 80972 04164</a>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h4>Email</h4>
                            <a href="mailto:info@destrip.com">info@destrip.com</a>
                            <a href="mailto:support@destrip.com">support@destrip.com</a>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Address</h4>
                            <p>1100 Link Street, Navi Mumbai, India</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form fade-in">
                <form id="contactForm" onsubmit="handleSubmit(event)">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" class="form-control" placeholder="John Doe" required pattern="[a-zA-Z\s]{1,50}">
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" class="form-control" placeholder="+91 98765 43210" required pattern="[0-9+\s]{10,15}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control" placeholder="john@example.com" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" placeholder="Tell us about your dream trip..." required></textarea>
                    </div>

                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane"></i>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <div>
            <strong>Success!</strong>
            <p id="notificationText">Your message has been sent.</p>
        </div>
    </div>

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

        // Gallery Filter
        function filterGallery(category) {
            const items = document.querySelectorAll('.gallery-item');
            const buttons = document.querySelectorAll('.filter-btn');
            
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            items.forEach(item => {
                if (category === 'all' || item.dataset.category.includes(category)) {
                    item.style.display = 'block';
                    setTimeout(() => {
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    }, 10);
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        item.style.display = 'none';
                    }, 300);
                }
            });
        }

        // Testimonial Slider
        let currentTestimonial = 1;
        const totalTestimonials = 3;

        function showTestimonial(n) {
            // Hide all
            for (let i = 1; i <= totalTestimonials; i++) {
                document.getElementById(`testimonial${i}`).style.display = 'none';
            }
            
            // Update dots
            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === n - 1);
            });
            
            // Show selected
            document.getElementById(`testimonial${n}`).style.display = 'block';
            currentTestimonial = n;
        }

        // Auto-rotate testimonials
        setInterval(() => {
            currentTestimonial = currentTestimonial % totalTestimonials + 1;
            showTestimonial(currentTestimonial);
        }, 5000);

        // Form Handling
        function handleSubmit(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            
            if (!emailRegex.test(email)) {
                showNotification('Please enter a valid email address.', true);
                return;
            }

            // Simulate form submission
            showNotification('Thank you! We will contact you soon.');
            document.getElementById('contactForm').reset();
        }

        function showNotification(message, isError = false) {
            const notification = document.getElementById('notification');
            const text = document.getElementById('notificationText');
            
            text.textContent = message;
            notification.classList.toggle('error', isError);
            notification.querySelector('i').className = isError ? 'fas fa-exclamation-circle' : 'fas fa-check-circle';
            
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }

        // Add parallax effect to hero
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const hero = document.querySelector('.hero');
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        });
    </script>
</body>
</html>
@endsection()