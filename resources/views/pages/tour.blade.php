@extends('app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Tour Packages | Wanderlust Travels - Explore the World</title>
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
            --success: #10b981;
            --warning: #f59e0b;
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --shadow: 0 10px 40px rgba(0,0,0,0.1);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background: #f0f2f5;
        }

        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
        }

        

        /* Hero Section */
        .page-hero {
            height: 70vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=1920');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            margin-bottom: -50px;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 2rem;
            animation: fadeInUp 1s ease;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .page-hero h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            margin-bottom: 1rem;
        }

        .page-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Search & Filter Bar */
        .filter-bar {
            position: sticky;
            top: 80px;
            z-index: 100;
            max-width: 1400px;
            margin: 0 auto 3rem;
            padding: 0 5%;
        }

        .filter-container {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
        }

        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .filter-dropdown {
            position: relative;
            min-width: 150px;
        }

        .filter-btn {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            background: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.5rem;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .filter-btn:hover {
            border-color: var(--primary);
        }

        .filter-menu {
            position: absolute;
            top: calc(100% + 0.5rem);
            left: 0;
            right: 0;
            background: white;
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 0.5rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            z-index: 50;
        }

        .filter-dropdown.active .filter-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .filter-option {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-option:hover {
            background: var(--light);
        }

        .filter-option.selected {
            background: #fff5f3;
            color: var(--primary);
        }

        .view-toggle {
            display: flex;
            gap: 0.5rem;
            margin-left: auto;
        }

        .view-btn {
            width: 45px;
            height: 45px;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .view-btn.active, .view-btn:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Active Filters */
        .active-filters {
            max-width: 1400px;
            margin: 0 auto 2rem;
            padding: 0 5%;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            align-items: center;
        }

        .filter-tag {
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .filter-tag button {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--gray);
            transition: var(--transition);
        }

        .filter-tag button:hover {
            color: var(--primary);
        }

        .clear-all {
            color: var(--primary);
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
            margin-left: auto;
        }

        /* Main Content */
        .packages-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 5% 4rem;
        }

        /* Grid View */
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        /* List View */
        .packages-list {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .packages-list .package-card {
            display: grid;
            grid-template-columns: 300px 1fr;
            max-width: 100%;
        }

        .packages-list .package-image {
            height: 100%;
            min-height: 250px;
        }

        .packages-list .package-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .packages-list .package-footer {
            flex-direction: column;
            align-items: flex-end;
            border-left: 1px solid #e0e0e0;
            padding-left: 2rem;
        }

        /* Package Card */
        .package-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: var(--transition);
            position: relative;
        }

        .package-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .package-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--primary);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 30px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .badge-discount {
            background: var(--success);
        }

        .badge-limited {
            background: var(--warning);
        }

        .wishlist-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            background: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: var(--transition);
            z-index: 10;
        }

        .wishlist-btn:hover, .wishlist-btn.active {
            background: var(--primary);
            color: white;
        }

        .package-image {
            position: relative;
            height: 240px;
            overflow: hidden;
        }

        .package-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .package-card:hover .package-image img {
            transform: scale(1.1);
        }

        .package-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }

        .duration {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            font-weight: 600;
        }

        .rating i {
            color: var(--warning);
        }

        .package-content {
            padding: 1.5rem;
        }

        .package-location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .package-title {
            font-size: 1.3rem;
            margin-bottom: 0.75rem;
            color: var(--dark);
            line-height: 1.3;
        }

        .package-title a {
            color: inherit;
            text-decoration: none;
            transition: var(--transition);
        }

        .package-title a:hover {
            color: var(--primary);
        }

        .package-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .tag {
            background: var(--light);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--gray);
        }

        .package-highlights {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .highlight {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .highlight i {
            color: var(--success);
        }

        .package-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
        }

        .price-section {
            display: flex;
            flex-direction: column;
        }

        .price-original {
            text-decoration: line-through;
            color: var(--gray);
            font-size: 0.9rem;
        }

        .price-current {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .price-per {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .view-details {
            background: var(--primary);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .view-details:hover {
            background: var(--primary-dark);
            transform: translateX(5px);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .page-btn {
            width: 45px;
            height: 45px;
            border: 2px solid #e0e0e0;
            background: white;
            border-radius: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            font-weight: 500;
        }

        .page-btn:hover, .page-btn.active {
            border-color: var(--primary);
            background: var(--primary);
            color: white;
        }

        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Newsletter Section */
        .newsletter {
            background: var(--gradient);
            padding: 4rem 5%;
            margin-top: 4rem;
            color: white;
            text-align: center;
        }

        .newsletter-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .newsletter h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .newsletter p {
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .newsletter-form {
            display: flex;
            gap: 1rem;
            max-width: 500px;
            margin: 0 auto;
        }

        .newsletter-form input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
        }

        .newsletter-form button {
            background: var(--dark);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        }

        /* Footer */
    
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

        .fade-in {
            animation: fadeInUp 0.6s ease forwards;
        }

        /* Responsive */
        @media (max-width: 968px) {
            .nav-links {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            .filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                min-width: 100%;
            }

            .view-toggle {
                margin-left: 0;
                justify-content: center;
            }

            .packages-grid {
                grid-template-columns: 1fr;
            }

            .packages-list .package-card {
                grid-template-columns: 1fr;
            }

            .packages-list .package-image {
                height: 200px;
            }

            .packages-list .package-content {
                grid-template-columns: 1fr;
            }

            .packages-list .package-footer {
                flex-direction: row;
                border-left: none;
                padding-left: 0;
            }

            .newsletter-form {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .page-hero {
                height: 40vh;
            }

            .filter-bar {
                top: 70px;
            }

            .active-filters {
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>

    
    <!-- Hero Section -->
    <section class="page-hero">
        <div class="hero-content">
            <div class="breadcrumb">
                <a href="#">Home</a>
                <span>/</span>
                <span>Tour Packages</span>
            </div>
            <h1>Explore Our Destinations</h1>
            <p>Discover 50+ handpicked tours across India and the world. From serene backwaters to majestic mountains, find your perfect escape.</p>
        </div>
    </section>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <div class="filter-container">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search destinations, tours, or activities..." id="searchInput">
            </div>

            <div class="filter-dropdown" onclick="toggleDropdown(this)">
                <button class="filter-btn">
                    <span><i class="fas fa-map-marker-alt"></i> Destination</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="filter-menu">
                    <div class="filter-option selected" onclick="selectOption(this, 'all')">All Destinations</div>
                    <div class="filter-option" onclick="selectOption(this, 'india')">India</div>
                    <div class="filter-option" onclick="selectOption(this, 'international')">International</div>
                    <div class="filter-option" onclick="selectOption(this, 'domestic')">Domestic</div>
                </div>
            </div>

            <div class="filter-dropdown" onclick="toggleDropdown(this)">
                <button class="filter-btn">
                    <span><i class="fas fa-calendar"></i> Duration</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="filter-menu">
                    <div class="filter-option selected" onclick="selectOption(this, 'all')">Any Duration</div>
                    <div class="filter-option" onclick="selectOption(this, '1-3')">1-3 Days</div>
                    <div class="filter-option" onclick="selectOption(this, '4-7')">4-7 Days</div>
                    <div class="filter-option" onclick="selectOption(this, '8-14')">8-14 Days</div>
                    <div class="filter-option" onclick="selectOption(this, '15+')">15+ Days</div>
                </div>
            </div>

            <div class="filter-dropdown" onclick="toggleDropdown(this)">
                <button class="filter-btn">
                    <span><i class="fas fa-tag"></i> Price Range</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="filter-menu">
                    <div class="filter-option selected" onclick="selectOption(this, 'all')">All Prices</div>
                    <div class="filter-option" onclick="selectOption(this, 'budget')">Under ₹25,000</div>
                    <div class="filter-option" onclick="selectOption(this, 'standard')">₹25,000 - ₹50,000</div>
                    <div class="filter-option" onclick="selectOption(this, 'premium')">₹50,000 - ₹1,00,000</div>
                    <div class="filter-option" onclick="selectOption(this, 'luxury')">Above ₹1,00,000</div>
                </div>
            </div>

            <div class="filter-dropdown" onclick="toggleDropdown(this)">
                <button class="filter-btn">
                    <span><i class="fas fa-filter"></i> Category</span>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="filter-menu">
                    <div class="filter-option selected" onclick="selectOption(this, 'all')">All Categories</div>
                    <div class="filter-option" onclick="selectOption(this, 'adventure')">Adventure</div>
                    <div class="filter-option" onclick="selectOption(this, 'beach')">Beach</div>
                    <div class="filter-option" onclick="selectOption(this, 'heritage')">Heritage</div>
                    <div class="filter-option" onclick="selectOption(this, 'hillstation')">Hill Station</div>
                    <div class="filter-option" onclick="selectOption(this, 'wildlife')">Wildlife</div>
                </div>
            </div>

            <div class="view-toggle">
                <button class="view-btn active" onclick="setView('grid')" title="Grid View">
                    <i class="fas fa-th-large"></i>
                </button>
                <button class="view-btn" onclick="setView('list')" title="List View">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Active Filters -->
    <div class="active-filters" id="activeFilters" style="display: none;">
        <span>Active Filters:</span>
        <div class="filter-tag" id="filterTag">
            <span id="filterText">India</span>
            <button onclick="clearFilter()"><i class="fas fa-times"></i></button>
        </div>
        <button class="clear-all" onclick="clearAllFilters()">Clear All</button>
    </div>

    <!-- Packages Container -->
    <div class="packages-container">
        <div class="packages-grid" id="packagesContainer">
            
            <!-- Package 1 -->
            <article class="package-card fade-in">
                <span class="package-badge"><i class="fas fa-fire"></i> Best Seller</span>
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1602216056096-3b40cc0c9944?w=600" alt="Kerala Backwaters">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 5 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.9</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Kerala, India
                        </div>
                        <h3 class="package-title">
                            <a href="#">Kerala Backwaters Escape</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Houseboat</span>
                            <span class="tag">Nature</span>
                            <span class="tag">Relaxation</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Houseboat Stay</span>
                            <span class="highlight"><i class="fas fa-check"></i> Ayurvedic Spa</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-original">₹52,000</span>
                            <span class="price-current">₹45,999</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 2 -->
            <article class="package-card fade-in">
                <span class="package-badge badge-discount"><i class="fas fa-percent"></i> 20% OFF</span>
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1561361058-4c7e76622863?w=600" alt="Goa Beach">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 4 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.7</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Goa, India
                        </div>
                        <h3 class="package-title">
                            <a href="#">Goa Beach Paradise</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Beach</span>
                            <span class="tag">Party</span>
                            <span class="tag">Water Sports</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Beach Resort</span>
                            <span class="highlight"><i class="fas fa-check"></i> Scuba Diving</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-original">₹28,000</span>
                            <span class="price-current">₹22,499</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 3 -->
            <article class="package-card fade-in">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?w=600" alt="Kyoto Japan">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 10 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.9</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Kyoto, Japan
                        </div>
                        <h3 class="package-title">
                            <a href="#">Japan Cultural Odyssey</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Culture</span>
                            <span class="tag">History</span>
                            <span class="tag">Food</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Temple Stay</span>
                            <span class="highlight"><i class="fas fa-check"></i> Bullet Train</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-current">₹1,85,000</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 4 -->
            <article class="package-card fade-in">
                <span class="package-badge badge-limited"><i class="fas fa-clock"></i> Limited</span>
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1595658650363-2e1e5e2b5e5c?w=600" alt="Ladakh">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 8 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.8</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Ladakh, India
                        </div>
                        <h3 class="package-title">
                            <a href="#">Ladakh Adventure Expedition</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Adventure</span>
                            <span class="tag">Mountains</span>
                            <span class="tag">Road Trip</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Pangong Lake</span>
                            <span class="highlight"><i class="fas fa-check"></i> Nubra Valley</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-current">₹38,500</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 5 -->
            <article class="package-card fade-in">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?w=600" alt="Bali">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 7 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.6</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Bali, Indonesia
                        </div>
                        <h3 class="package-title">
                            <a href="#">Bali Island Hopper</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Beach</span>
                            <span class="tag">Culture</span>
                            <span class="tag">Nightlife</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Ubud Rice Terraces</span>
                            <span class="highlight"><i class="fas fa-check"></i> Tanah Lot</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-original">₹65,000</span>
                            <span class="price-current">₹58,999</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 6 -->
            <article class="package-card fade-in">
                <span class="package-badge"><i class="fas fa-star"></i> Premium</span>
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=600" alt="Paris">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 9 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.9</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Paris & Switzerland
                        </div>
                        <h3 class="package-title">
                            <a href="#">European Dream Tour</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Luxury</span>
                            <span class="tag">Romance</span>
                            <span class="tag">Shopping</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Eiffel Tower</span>
                            <span class="highlight"><i class="fas fa-check"></i> Swiss Alps</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-current">₹2,25,000</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 7 -->
            <article class="package-card fade-in">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1587474260584-136574528ed5?w=600" alt="Rajasthan">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 6 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.7</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Rajasthan, India
                        </div>
                        <h3 class="package-title">
                            <a href="#">Royal Rajasthan Heritage</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Heritage</span>
                            <span class="tag">Palaces</span>
                            <span class="tag">Desert</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Jaipur & Udaipur</span>
                            <span class="highlight"><i class="fas fa-check"></i> Desert Safari</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-current">₹32,000</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 8 -->
            <article class="package-card fade-in">
                <span class="package-badge badge-discount"><i class="fas fa-percent"></i> 15% OFF</span>
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=600" alt="Dubai">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 5 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.5</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Dubai, UAE
                        </div>
                        <h3 class="package-title">
                            <a href="#">Dubai Luxury Getaway</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Luxury</span>
                            <span class="tag">Shopping</span>
                            <span class="tag">Desert</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Burj Khalifa</span>
                            <span class="highlight"><i class="fas fa-check"></i> Desert Safari</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-original">₹55,000</span>
                            <span class="price-current">₹46,750</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

            <!-- Package 9 -->
            <article class="package-card fade-in">
                <button class="wishlist-btn" onclick="toggleWishlist(this)">
                    <i class="far fa-heart"></i>
                </button>
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1566552881560-0be862a7c445?w=600" alt="Andaman">
                    <div class="package-overlay">
                        <span class="duration"><i class="far fa-clock"></i> 6 Days</span>
                        <span class="rating"><i class="fas fa-star"></i> 4.8</span>
                    </div>
                </div>
                <div class="package-content">
                    <div class="main-info">
                        <div class="package-location">
                            <i class="fas fa-map-marker-alt"></i> Andaman Islands
                        </div>
                        <h3 class="package-title">
                            <a href="#">Andaman Island Explorer</a>
                        </h3>
                        <div class="package-tags">
                            <span class="tag">Beach</span>
                            <span class="tag">Adventure</span>
                            <span class="tag">Scuba</span>
                        </div>
                        <div class="package-highlights">
                            <span class="highlight"><i class="fas fa-check"></i> Radhanagar Beach</span>
                            <span class="highlight"><i class="fas fa-check"></i> Cellular Jail</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="price-section">
                            <span class="price-current">₹42,000</span>
                            <span class="price-per">per person</span>
                        </div>
                        <a href="#" class="view-details">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </article>

        </div>

        <!-- Pagination -->
        <div class="pagination">
            <button class="page-btn" disabled><i class="fas fa-chevron-left"></i></button>
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="newsletter-content">
            <h2>Get Exclusive Travel Deals</h2>
            <p>Subscribe to our newsletter and receive 10% off your first booking, plus insider tips and hidden gems.</p>
            <form class="newsletter-form" onsubmit="event.preventDefault(); alert('Thank you for subscribing!');">
                <input type="email" placeholder="Enter your email address" required>
                <button type="submit">Subscribe Now</button>
            </form>
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

        // Dropdown Toggle
        function toggleDropdown(element) {
            // Close all other dropdowns
            document.querySelectorAll('.filter-dropdown').forEach(drop => {
                if (drop !== element) drop.classList.remove('active');
            });
            element.classList.toggle('active');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.filter-dropdown')) {
                document.querySelectorAll('.filter-dropdown').forEach(drop => {
                    drop.classList.remove('active');
                });
            }
        });

        // Select Option
        function selectOption(element, value) {
            const dropdown = element.closest('.filter-dropdown');
            const btn = dropdown.querySelector('.filter-btn span');
            const text = element.textContent;
            
            // Update visual selection
            dropdown.querySelectorAll('.filter-option').forEach(opt => opt.classList.remove('selected'));
            element.classList.add('selected');
            
            // Update button text (keep icon)
            const icon = btn.querySelector('i');
            btn.innerHTML = '';
            btn.appendChild(icon);
            btn.appendChild(document.createTextNode(' ' + text));
            
            // Show active filter
            if (value !== 'all') {
                document.getElementById('activeFilters').style.display = 'flex';
                document.getElementById('filterText').textContent = text;
            }
            
            dropdown.classList.remove('active');
        }

        // Clear Filter
        function clearFilter() {
            document.getElementById('activeFilters').style.display = 'none';
        }

        function clearAllFilters() {
            document.getElementById('activeFilters').style.display = 'none';
            // Reset all dropdowns
            document.querySelectorAll('.filter-option').forEach(opt => {
                if (opt.textContent.includes('All') || opt.textContent.includes('Any')) {
                    opt.click();
                }
            });
        }

        // View Toggle
        function setView(view) {
            const container = document.getElementById('packagesContainer');
            const buttons = document.querySelectorAll('.view-btn');
            
            buttons.forEach(btn => btn.classList.remove('active'));
            event.currentTarget.classList.add('active');
            
            if (view === 'list') {
                container.classList.remove('packages-grid');
                container.classList.add('packages-list');
            } else {
                container.classList.remove('packages-list');
                container.classList.add('packages-grid');
            }
        }

        // Wishlist Toggle
        function toggleWishlist(btn) {
            btn.classList.toggle('active');
            const icon = btn.querySelector('i');
            if (btn.classList.contains('active')) {
                icon.classList.remove('far');
                icon.classList.add('fas');
            } else {
                icon.classList.remove('fas');
                icon.classList.add('far');
            }
        }

        // Mobile Menu
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            navLinks.style.position = 'absolute';
            navLinks.style.top = '100%';
            navLinks.style.left = '0';
            navLinks.style.right = '0';
            navLinks.style.background = 'white';
            navLinks.style.flexDirection = 'column';
            navLinks.style.padding = '2rem';
            navLinks.style.boxShadow = '0 10px 20px rgba(0,0,0,0.1)';
        }

        // Search Functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.package-card');
            
            cards.forEach(card => {
                const title = card.querySelector('.package-title').textContent.toLowerCase();
                const location = card.querySelector('.package-location').textContent.toLowerCase();
                const tags = Array.from(card.querySelectorAll('.tag')).map(t => t.textContent.toLowerCase()).join(' ');
                
                if (title.includes(searchTerm) || location.includes(searchTerm) || tags.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.package-card').forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = `all 0.6s ease ${index * 0.1}s`;
            observer.observe(card);
        });
    </script>
</body>
</html>
@endsection()