<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة تراخيص البناء الإلكترونية - وزارة النقل والأشغال العامة - اليمن</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary: #1a3a6c;
            --primary-dark: #0d2340;
            --primary-light: #2a5298;
            --secondary: #f8f9fa;
            --accent: #d4af37;
            --accent-dark: #b9972c;
            --accent-light: #e8c96c;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --dark: #212529;
            --light: #f8f9fa;
            --text-size: 0.9rem;
            --transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        /* High Contrast Mode */
        .high-contrast {
            --primary: #000;
            --primary-dark: #000;
            --primary-light: #333;
            --secondary: #fff;
            --accent: #ff0;
            --accent-dark: #cc0;
            --accent-light: #ff9;
            --dark: #000;
            --light: #fff;
            color: #000 !important;
            background-color: #fff !important;
        }

        .high-contrast body {
            background: #fff !important;
            color: #000 !important;
        }

        .high-contrast .navbar,
        .high-contrast .hero-section,
        .high-contrast .stats-section,
        .high-contrast .app-section,
        .high-contrast .footer {
            background: #000 !important;
            color: #fff !important;
            border: 2px solid #ff0 !important;
        }

        .high-contrast .service-card-modern,
        .high-contrast .testimonial-card,
        .high-contrast .partner-card,
        .high-contrast .news-card {
            background: #fff !important;
            color: #000 !important;
            border: 2px solid #000 !important;
        }

        /* Dark Mode */
        .dark-mode {
            --primary: #2c3e50;
            --primary-dark: #1a252f;
            --primary-light: #34495e;
            --secondary: #1e272e;
            --accent: #f39c12;
            --accent-dark: #d35400;
            --accent-light: #f1c40f;
            --dark: #f5f6fa;
            --light: #1e272e;
        }

        .dark-mode body {
            background-color: #1e272e !important;
            color: #f5f6fa !important;
        }

        .dark-mode .navbar {
            background: linear-gradient(to right, #2c3e50, #1a252f) !important;
        }

        .dark-mode .service-card-modern {
            background-color: #2c3e50 !important;
            color: #f5f6fa !important;
        }

        .dark-mode .service-content p {
            color: #bdc3c7 !important;
        }

        .dark-mode .service-content h3 {
            color: #f39c12 !important;
        }

        .dark-mode .section-title h2 {
            color: #f39c12 !important;
        }

        .dark-mode .section-title p {
            color: #bdc3c7 !important;
        }

        .dark-mode .how-it-works {
            background-color: #2c3e50 !important;
        }

        .dark-mode .step-card {
            background-color: #34495e !important;
            color: #ecf0f1 !important;
        }

        .dark-mode .step-card h3 {
            color: #f39c12 !important;
        }

        .dark-mode .news-card {
            background-color: #2c3e50 !important;
            color: #ecf0f1 !important;
        }

        .dark-mode .feedback-form {
            background: linear-gradient(to bottom, #2c3e50, #34495e) !important;
            color: #ecf0f1 !important;
        }

        .dark-mode .testimonial-card {
            background-color: #34495e !important;
            color: #ecf0f1 !important;
        }

        .dark-mode .accordion-button {
            background-color: #34495e !important;
            color: #ecf0f1 !important;
        }

        .dark-mode .accordion-body {
            background-color: #2c3e50 !important;
            color: #ecf0f1 !important;
        }

        /* Print Styles */
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                background: white !important;
                color: black !important;
                font-size: 12pt !important;
            }

            .container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
            }

            .section-title h2 {
                font-size: 18pt !important;
                color: black !important;
            }

            .step-content {
                display: block !important;
                position: relative !important;
                box-shadow: none !important;
                border: 1px solid #ccc !important;
                margin-bottom: 20px !important;
            }

            .step-content-body {
                flex-direction: column !important;
            }

            .step-image {
                max-width: 50% !important;
                margin: 0 auto 20px !important;
            }
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: var(--secondary);
            color: #333;
            overflow-x: hidden;
            font-size: var(--text-size);
            line-height: 1.7;
            padding-top: 0px;
            transition: var(--transition);
        }

        /* شريط التنقل المحسن */
        .navbar {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            padding: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            transition: var(--transition);
            border-radius: 0 0 15px 15px;
            margin: 0px 15px 0px 15px;
            transition: transform 0.4s ease;
        }

        .navbar.hidden {
            transform: translateY(-100%);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            padding: 15px 0;
        }

        .navbar-brand img {
            height: 45px;
            margin-left: 10px;
            transition: var(--transition);
        }

        .nav-icons-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-left: 15px;
        }

        .nav-icon {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            padding: 10px 5px;
        }

        .nav-icon.active {
            color: var(--accent);
            transform: translateY(-3px);
        }

        .nav-icon.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            width: 5px;
            height: 5px;
            background: var(--accent);
            border-radius: 50%;
        }

        .nav-icon:hover {
            color: var(--accent);
            transform: translateY(-2px);
        }

        .nav-icon .badge {
            position: absolute;
            top: 0;
            right: -5px;
            background-color: var(--accent);
            color: white;
            font-size: 0.6rem;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-icon span {
            font-size: 0.75rem;
            margin-top: 3px;
            font-weight: 500;
        }

        .dropdown-container {
            position: relative;
        }

        .settings-dropdown,
        .language-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-radius: 10px;
            padding: 20px;
            min-width: 250px;
            z-index: 1000;
            display: none;
            animation: fadeIn 0.3s ease;
        }

        .language-dropdown {
            min-width: 180px;
        }

        .settings-dropdown.show,
        .language-dropdown.show {
            display: block;
        }

        .settings-item {
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
            color: var(--dark);
        }

        .settings-item:last-child {
            border-bottom: none;
        }

        .settings-item:hover {
            color: var(--primary);
            padding-right: 5px;
        }

        .settings-item i {
            margin-left: 12px;
            width: 25px;
            text-align: center;
            font-size: 1.1rem;
            color: var(--primary);
        }

        /* القوائم المنسدلة المحسنة */
        .nav-item.dropdown {
            position: static;
        }

        .mega-menu {
            position: static !important;
        }

        .mega-menu .dropdown-menu {
            width: 100%;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border: none;
            margin-top: 5px;
            text-align: right;
            direction: ltr;

        }

        .mega-menu-content {
            display: flex;
            flex-wrap: wrap;
            padding: 0;
        }

        .mega-menu-column {
            flex: 1;
            min-width: 250px;
            padding: 15px;
            border-right: 1px solid rgba(0, 0, 0, 0.05);
        }

        .mega-menu-column:last-child {
            border-right: none;
        }

        .mega-menu-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--accent);
            position: relative;
        }

        .mega-menu-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 30px;
            height: 2px;
            background-color: var(--primary);
        }

        .mega-menu-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .mega-menu-list li {
            margin-bottom: 8px;
        }

        .mega-menu-list a {
            color: #555;
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
            display: block;
            padding: 5px 0;
        }

        .mega-menu-list a:hover {
            color: var(--primary);
            padding-right: 8px;
        }

        .mega-menu-list a i {
            margin-left: 8px;
            color: var(--accent);
            font-size: 0.9rem;
        }

        .nav-link {
            font-weight: 600;
            padding: 15px 20px;
            margin: 0 3px;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 5px;
            right: 30px;
            width: 0;
            height: 3px;
        }

        .nav-link:hover:after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 0;
            height: 3px;
            background-color: var(--accent);
            transition: var(--transition);
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown-menu {
            border-radius: 12px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 10px;
            margin-top: 5px;
        }

        .dropdown-item {
            padding: 10px 15px;
            border-radius: 8px;
            transition: var(--transition);
            font-weight: 500;
            margin-bottom: 5px;
        }

        .dropdown-item:hover {
            background-color: rgba(26, 58, 108, 0.1);
            color: var(--primary);
            padding-right: 20px;
        }

        .navbar-toggler {
            border: none;
            box-shadow: none !important;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.95%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* تحسينات القوائم المنسدلة للجوال */
        @media (max-width: 768px) {
            .nav-icons-container {
                margin-top: 15px;
                justify-content: center;
                width: 100%;
            }

            .nav-icons-container {
                display: flex;
                align-items: center;
                gap: 60px;
                margin-left: 15px;
            }

            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 25px;
                right: 341px;
                width: 11px;
                height: 6px;
            }

            .nav-icon {
                color: rgba(255, 255, 255, 0.85);
                font-size: 1.1rem;
                cursor: pointer;
                transition: var(--transition);
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
            }

            .settings-dropdown {
                top: auto !important;
                bottom: 57px;
                left: 182%;
                transform: translateX(-50%);
                width: 53%;
                max-height: 40vh;
                overflow-y: auto;
                z-index: 1100;
                box-shadow: 0 -5px 30px rgba(0, 0, 0, 0.3);
                border-radius: 20px 20px 20px 20px;
            }

            .language-dropdown {
                top: auto !important;
                bottom: -146px;
                left: 13%;
                transform: translateX(-50%);
                width: 53%;
                max-height: 70vh;
                overflow-y: auto;
                z-index: 1100;
                box-shadow: 0 -5px 30px rgba(0, 0, 0, 0.3);
                border-radius: 20px 20px 20px 20px;
            }

            .mega-menu .dropdown-menu {
                top: auto !important;
                bottom: 0;
                left: 50%;
                transform: translateX(3%);
                width: 100%;
                max-height: 70vh;
                overflow-y: auto;
                z-index: 1100;
                box-shadow: 0 -5px 30px rgba(0, 0, 0, 0.3);
                border-radius: 20px 20px 0px 20px;
            }

            .dropdown-backdrop {
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1099;
                display: none;
            }

            .dropdown-backdrop.show {
                display: block;
            }

            .dropdown-close-btn {
                position: absolute;
                top: 15px;
                right: 15px;
                font-size: 1.2rem;
                color: var(--primary);
                background: none;
                border: none;
                z-index: 1101;
                display: block !important;
            }
        }

        /* القسم البطولي مع تأثيرات جديدة */
        .hero-section {
            background: linear-gradient(120deg, rgba(0, 0, 0, 0.85), rgba(26, 58, 108, 0.85)),
                url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80') no-repeat center center;
            background-size: cover;
            padding: 120px 0 70px;
            color: white;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            margin: 20px;
            margin-top: 30px;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 65%, rgba(212, 175, 55, 0.2) 100%);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 20px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 700px;
            opacity: 0.9;
            font-weight: 300;
        }

        .btn-hero {
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-hero:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .hero-stats {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin-top: 50px;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .stat-item {
            text-align: center;
            padding: 15px;
            position: relative;
        }

        .stat-item:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 50px;
            width: 1px;
            background: rgba(255, 255, 255, 0.2);
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 5px;
            color: var(--accent);
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.85;
            font-weight: 300;
        }

        .floating {
            animation: float 6s ease-in-out infinite;
            filter: drop-shadow(0 15px 20px rgba(0, 0, 0, 0.3));
        }

        /* تأثيرات متحركة */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* تحسين الأقسام الأخرى */
        .section-title {
            text-align: center;
            margin-bottom: 60px;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            right: 50%;
            transform: translateX(50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--accent), var(--primary));
            border-radius: 10px;
        }

        .section-title p {
            font-size: 1.1rem;
            color: #666;
            max-width: 700px;
            margin: 20px auto 0;
        }

        /* بطاقات الخدمات الجديدة */
        .services-section {
            position: relative;
            padding: 100px 0;
            overflow: hidden;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 35px;
        }

        .service-card-modern {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            transform: translateY(0);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .service-card-modern:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 60px rgba(26, 58, 108, 0.2);
        }

        .service-image {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .service-card-modern:hover .service-image img {
            transform: scale(1.1);
        }

        .service-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(26, 58, 108, 0.9), transparent);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            color: white;
        }

        .service-icon-modern {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--accent);
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
            z-index: 2;
        }

        .service-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-content h3 {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .service-content p {
            color: #666;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .service-link {
            display: inline-flex;
            align-items: center;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .service-link:hover {
            color: var(--accent-dark);
            transform: translateX(-5px);
        }

        .service-link i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .service-link:hover i {
            transform: translateX(-5px);
        }

        .service-tag {
            display: inline-block;
            background: rgba(26, 58, 108, 0.1);
            color: var(--primary);
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 0.85rem;
            margin-bottom: 15px;
        }

        /* بقية الأقسام مع تحسينات */
        .how-it-works {
            background-color: #f0f4f8;
            padding: 100px 0;
            position: relative;
            background-image: radial-gradient(circle at 10% 20%, rgba(26, 58, 108, 0.05) 0%, rgba(26, 58, 108, 0) 50%);
        }

        .step-container {
            position: relative;
        }

        .step-container::before {
            content: '';
            position: absolute;
            top: 40px;
            right: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--accent), var(--primary));
            z-index: 1;
        }

        .step-card {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 2;
            margin-bottom: 40px;
            transition: var(--transition);
            border-left: 4px solid var(--accent);
            opacity: 1;
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26, 58, 108, 0.15);
        }

        .step-number {
            position: absolute;
            top: -20px;
            right: 30px;
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 800;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .step-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 15px;
            display: block;
        }

        .step-card h3 {
            margin-top: 0;
            margin-bottom: 15px;
            color: var(--primary);
            font-size: 1.3rem;
        }

        .stats-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            padding: 100px 0;
            color: white;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            margin: 20px;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><polygon fill="rgba(255,255,255,0.03)" points="0,100 100,0 100,100"/></svg>');
            opacity: 0.3;
        }

        .stat-circle {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 10px solid rgba(255, 255, 255, 0.15);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: var(--transition);
        }

        .stat-circle:hover {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .stat-circle .number {
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            color: var(--accent);
        }

        .stat-circle .label {
            font-size: 1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        /* تحسينات متعددة للعناصر الأخرى */
        .news-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            height: 100%;
            transition: var(--transition);
            background: white;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26, 58, 108, 0.15);
        }

        .news-img {
            height: 220px;
            overflow: hidden;
        }

        .news-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .news-card:hover .news-img img {
            transform: scale(1.1);
        }

        .news-date {
            background: linear-gradient(to right, var(--accent), var(--accent-dark));
            color: white;
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .accordion-button:not(.collapsed) {
            background-color: var(--primary);
            color: white;
            box-shadow: 0 5px 15px rgba(26, 58, 108, 0.15);
        }

        .feedback-form {
            background: linear-gradient(to bottom, white, #f9f9f9);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .app-section {
            padding: 100px 0;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            margin: 20px;
        }

        .app-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJub25lIj48cGF0aCBkPSJNMCAwQzAgMCAyMCAyMCAzMCAzMEM0MCA0MCA1MCA1MCA2MCA2MEM3MCA3MCA4MCA4MCA5MCA5MEwxMDAgMTAwWiIgZmlsbD0ibm9uZSIgc3Ryb2tlPSJyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMDcpIiBzdHJva2Utd2lkdGg9IjEiLz48L3N2Zz4=');
            opacity: 0.2;
        }

        .app-image img {
            max-width: 320px;
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            animation: float 4s ease-in-out infinite;
        }

        /* شاشة البحث المتقدم المحدثة */

        .search-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.92);
            z-index: 1050;
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
            backdrop-filter: blur(12px);
            overflow-y: auto;
        }

        .search-overlay.show {
            display: block;
            opacity: 1;
        }

        .search-container {
            background: linear-gradient(135deg, #1a2a4f, #0d1a33);
            max-width: 1000px;
            margin: 80px auto;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 40px 70px rgba(0, 0, 0, 0.5);
            animation: slideDown 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            transform: translateY(-70px);
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        @keyframes slideDown {
            to {
                transform: translateY(0);
            }
        }

        .search-header {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            padding: 25px 40px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .search-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--accent), transparent);
        }

        .search-header h2 {
            font-weight: 800;
            margin: 0;
            font-size: 2rem;
            display: flex;
            align-items: center;
        }

        .search-header h2 i {
            margin-left: 15px;
            color: var(--accent);
        }

        .close-search {
            background: none;
            border: none;
            color: white;
            font-size: 1.8rem;
            cursor: pointer;
            transition: transform 0.3s ease;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .close-search:hover {
            transform: rotate(90deg);
            background: rgba(255, 255, 255, 0.1);
        }

        .search-body {
            padding: 40px;
        }

        .search-box {
            position: relative;
            margin-bottom: 35px;
        }

        .search-box input {
            width: 100%;
            padding: 20px 25px;
            padding-left: 70px;
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            background: rgba(0, 0, 0, 0.25);
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-box input:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.3);
            outline: none;
            background: rgba(0, 0, 0, 0.35);
        }

        .search-box i {
            position: absolute;
            left: 30px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent);
            font-size: 1.5rem;
        }

        .search-advanced {
            background: rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 35px;
            box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .search-advanced h3 {
            color: var(--accent);
            font-weight: 700;
            margin-top: 0;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .search-advanced h3 i {
            margin-left: 10px;
        }

        .filters-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .filter-group {
            margin-bottom: 15px;
        }

        .filter-group label {
            display: block;
            color: rgba(255, 255, 255, 0.85);
            margin-bottom: 8px;
            font-weight: 500;
        }

        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            background: rgba(0, 0, 0, 0.25);
            color: white;
            font-size: 1rem;
        }

        .filter-group select:focus,
        .filter-group input:focus {
            outline: none;
            border-color: var(--accent);
        }

        .search-actions {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }

        .btn-search {
            flex: 1;
            padding: 15px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-search-primary {
            background: linear-gradient(to right, var(--accent), var(--accent-dark));
            color: white;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }

        .btn-search-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
        }

        .btn-search-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .btn-search-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .search-suggestions {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 30px;
            margin-top: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
        }

        .search-suggestions h3 {
            color: white;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
        }

        .search-suggestions h3 i {
            margin-left: 12px;
            color: var(--accent);
        }

        .suggestion-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .suggestion-item {
            background: linear-gradient(135deg, rgba(26, 58, 108, 0.4), rgba(13, 35, 64, 0.6));
            border-radius: 15px;
            padding: 20px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(212, 175, 55, 0.15);
            position: relative;
            overflow: hidden;
        }

        .suggestion-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--accent);
        }

        .suggestion-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.35);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .suggestion-item strong {
            color: var(--accent);
            font-weight: 700;
            font-size: 1.2rem;
            display: block;
            margin-bottom: 10px;
        }

        .suggestion-item p {
            color: rgba(255, 255, 255, 0.85);
            margin: 0;
            font-size: 0.95rem;
        }

        .suggestion-item .badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(212, 175, 55, 0.2);
            color: var(--accent);
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .search-advanced {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .search-advanced .btn {
            flex: 1;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            background: #f8f9fa;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .search-advanced .btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26, 58, 108, 0.2);
        }

        /* قسم كيفية الحصول على ترخيص البناء المحدث */
        .all-step {
            background: linear-gradient(135deg, #f0f4f8 0%, #e6edf5 100%);
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 2rem;
            overflow-x: hidden;
            position: relative;
        }

        .all-step::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 C30,100 50,0 100,100 L100,0 Z" fill="rgba(26, 58, 108, 0.03)"/></svg>');
            background-size: cover;
            opacity: 0.8;
            z-index: -1;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 1rem;
            position: relative;
        }

        header h1 {
            font-size: 2.8rem;
            color: var(--primary);
            margin-bottom: 1rem;
            font-weight: 800;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.7;
        }

        .divider {
            width: 120px;
            height: 4px;
            background: linear-gradient(to right, var(--accent), var(--primary));
            margin: 1.5rem auto;
            border-radius: 10px;
        }

        /* التصميم الدائري للخطوات */
        .process-container {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            height: 80vh;
            min-height: 400px;
        }

        .process-circle {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 500px;
            height: 500px;
            border-radius: 50%;
            border: 2px dashed rgba(26, 58, 108, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: var(--transition);
        }

        .process-center {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 1.5rem;
            box-shadow: 0 15px 35px rgba(26, 58, 108, 0.3);
            z-index: 10;
            cursor: pointer;
            transition: var(--transition);
        }

        .process-center:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(26, 58, 108, 0.4);
        }

        .process-center i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--accent);
        }

        .process-center h2 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
        }

        .process-center p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .step {
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: var(--transition);
            z-index: 5;
            text-align: center;
            padding: 1rem;
            transform-origin: center;
            border: 3px solid transparent;
        }

        .step:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-color: var(--accent);
            z-index: 20;
        }

        .step.active {
            transform: scale(1.15);
            border-color: var(--accent);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.3);
            z-index: 15;
        }

        .step-number1,
        .step-number2,
        .step-number3,
        .step-number4,
        .step-number5,
        .step-number6 {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: var(--accent);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            margin-bottom: 0.8rem;
            font-size: 1.1rem;
        }

        .step-title {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--primary);
        }

        .step-content {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
            display: none;
            z-index: 30;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212, 175, 55, 0.2);
            transform: scale(0.95);
            opacity: 0;
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .step-content.active {
            display: block;
        }

        .step-content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .step-content-header h2 {
            font-size: 1.8rem;
            color: var(--primary);
            display: flex;
            align-items: center;
        }

        .step-content-header h2 i {
            margin-left: 1rem;
            color: var(--accent);
        }

        .close-btn {
            background: var(--primary);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: var(--transition);
        }

        .close-btn:hover {
            background: var(--primary-dark);
            transform: rotate(90deg);
        }

        .step-content-body {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .step-image {
            flex: 1;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            height: 300px;
        }

        .step-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .step-image:hover img {
            transform: scale(1.05);
        }

        .step-details {
            flex: 1;
        }

        .step-details p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #444;
            margin-bottom: 1.5rem;
        }

        .step-features {
            list-style: none;
            margin-top: 1.5rem;
        }

        .step-features li {
            padding: 0.7rem 0;
            border-bottom: 1px dashed #eee;
            display: flex;
            align-items: center;
        }

        .step-features li:before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: var(--accent);
            margin-left: 0.8rem;
        }

        .action-btn {
            display: inline-block;
            background: linear-gradient(to right, var(--accent), var(--accent-light));
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 1.5rem;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
        }

        /* تحسينات قسم شركاء النجاح */
        .partners-section {
            padding: 100px 0;
            background: #f8f9fa;
        }

        .partners-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .partners-slider {
            display: flex;
            overflow: hidden;
            scroll-behavior: smooth;
            gap: 30px;
            padding: 20px 0;
        }

        .partner-card {
            min-width: 250px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: all 0.4s ease;
            border: 1px solid #eee;
        }

        .partner-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26, 58, 108, 0.15);
            border-color: var(--accent);
        }

        .partner-logo-container {
            width: 150px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .partner-logo-container img {
            max-width: 100%;
            max-height: 100%;
            transition: transform 0.4s ease;
        }

        .partner-card:hover .partner-logo-container img {
            transform: scale(1.1);
        }

        .partner-info h3 {
            color: var(--primary);
            margin-bottom: 15px;
            text-align: center;
        }

        .partner-info p {
            color: #666;
            text-align: center;
            font-size: 0.95rem;
        }

        .partners-controls {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }

        .partners-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .partners-btn:hover {
            background: var(--primary-dark);
            transform: scale(1.1);
        }

        /* قسم آراء العملاء الجديد */
        .testimonials-section {
            padding: 100px 0;
            background: linear-gradient(to bottom, #f0f4f8, #e6edf5);
        }

        .testimonials-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .testimonial-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            padding: 30px;
            position: relative;
            transition: all 0.4s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(26, 58, 108, 0.15);
        }

        .testimonial-card::before {
            content: "";
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 5rem;
            color: rgba(26, 58, 108, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .testimonial-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            margin-left: 20px;
            border: 3px solid var(--accent);
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-author h4 {
            margin: 0;
            color: var(--primary);
            font-size: 1.2rem;
        }

        .testimonial-author p {
            color: #777;
            margin: 5px 0 0;
            font-size: 0.9rem;
        }

        .testimonial-rating {
            color: var(--accent);
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .testimonial-content {
            color: #555;
            line-height: 1.8;
        }

        /*  ( سهم العودة الى اعلا)تحسينات إضافية */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            opacity: 0;
            transition: var(--transition);
        }

        .back-to-top.show {
            opacity: 1;
        }

        .live-chat {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background: var(--accent);
            color: white;
            padding: 12px 20px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 999;
            transition: var(--transition);
        }

        /* الدردشة المباشرة  */
        .live-chat:hover {
            transform: translateY(-5px);
            background: var(--accent-dark);
        }

        .live-chat i {
            margin-left: 10px;
        }
        .step1 {
            margin: 1.5rem 65px 1.5rem 0;
            top: 8%;
            left: 20%;
        }
        .step2 {
            margin: 1.5rem 0px 1.5rem 65px;
            top: 8%;
            right: 20%;
        }
        .step3 {
            margin: 1.5rem -50px 1.5rem 0;
            top: 35%;
            left: 6.5%;
        }
        .step4 {
            margin: 1.5rem 0px 1.5rem -50px;
            top: 34%;
            left: 79%;
        }
        .step5 {
            margin: 1.5rem 65px 1.5rem 0;
            bottom: 8%;
            left: 20%;
        }
        .step6 {
            margin: 1.5rem 0px 1.5rem 65px;
            bottom: 8%;
            right: 20%;
        }
        /* التصميم المتجاوب */
        @media (max-width: 900px) {
            .process-circle {
                width: 400px;
                height: 400px;
            }

            .step {
                width: 100px;
                height: 100px;
            }

            .step-content-body {
                flex-direction: column;
            }

        }

        @media (max-width: 700px) {
            .process-container {
                height: auto;
                min-height: auto;
                margin-bottom: 3rem;
            }

            .process-circle {
                position: relative;
                top: auto;
                left: auto;
                transform: none;
                width: 100%;
                height: auto;
                border: none;
                flex-direction: column;
                align-items: center;
                margin: 2rem 0;
            }

            .process-center {
                margin-bottom: 2rem;
            }

            .step {
                position: relative;
                margin: 1.5rem;
                width: 90%;
                height: auto;
                border-radius: 15px;
                padding: 1.5rem;
                max-width: 400px;
            }

            .step1 {
                margin: 1.5rem 65px 1.5rem 0;
                top: 12%;
                left: 20%;
            }

            .step2 {
                margin: 1.5rem 0px 1.5rem 65px;
                top: 12%;
                right: 20%;
            }

            .step3 {
                margin: 1.5rem -50px 1.5rem 0;
                top: 40%;
                left: 20%;
            }

            .step4 {
                margin: 1.5rem 0px 1.5rem -50px;
                top: 40%;
                right: 20%;
            }

            .step5 {
                margin: 1.5rem 65px 1.5rem 0;
                bottom: 12%;
                left: 20%;
            }

            .step6 {
                margin: 1.5rem 0px 1.5rem 65px;
                bottom: 12%;
                right: 20%;
            }

            .step-number1,
            .step-number3,
            .step-number5 {
                position: absolute;
                top: -15px;
                right: 20px;
            }

            .step-number2,
            .step-number4,
            .step-number6 {
                position: absolute;
                top: -15px;
                right: 300px;
            }

            header h1 {
                font-size: 2.2rem;
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        /* التحسينات المضافة */
        .process-progress {
            display: flex;
            justify-content: center;
            margin: 30px 0;
            gap: 10px;
        }

        .progress-step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            font-weight: bold;
            font-size: 1.1rem;
        }

        .progress-step.active {
            background-color: var(--accent);
            color: white;
            transform: scale(1.1);
        }

        .progress-step.completed {
            background-color: var(--primary);
            color: white;
        }

        .welcome-modal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            max-width: 500px;
            width: 90%;
            display: none;
        }

        .welcome-modal.active {
            display: block;
            animation: fadeIn 0.5s ease forwards;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #777;
        }

        .modal-close:hover {
            color: var(--primary);
        }

        .loading-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 100;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .loading-overlay.active {
            opacity: 1;
            pointer-events: all;
        }

        /* تحسينات إمكانية الوصول */
        :focus {
            outline: 2px solid var(--accent);
            outline-offset: 2px;
        }

        /* تحسينات تجربة الأجهزة الصغيرة */
        @media (max-width: 576px) {
            .hero-title {
                font-size: 1.7rem;
            }

            .hero-stats {
                margin-top: 20px;
            }

            .stat-item {
                padding: 10px;
            }

            .step {
                margin: 1rem auto !important;
                width: 90% !important;
            }

            .step-number1,
            .step-number2,
            .step-number3,
            .step-number4,
            .step-number5,
            .step-number6 {
                position: absolute;
                top: -15px;
                right: 20px;
                transform: none;
            }
        }

        /* تصميم متجاوب محسن */
        @media (max-width: 1200px) {
            .steps-timeline::before {
                right: 100px;
            }

            .step-container:nth-child(even) {
                flex-direction: row;
            }

            .step-container:nth-child(even) .step-number {
                left: auto;
                right: 50%;
                transform: translateX(50%);
            }
        }

        @media (max-width: 992px) {
            .steps-timeline::before {
                display: none;
            }

            .step-container,
            .step-container:nth-child(even) {
                flex-direction: column;
                margin-bottom: 60px;
            }

            .step-image {
                margin-top: 30px;
            }

            .step-number {
                top: -30px;
                right: 50%;
                transform: translateX(50%);
            }
        }

        @media (max-width: 768px) {
            .search-container {
                margin: 40px 15px;
                border-radius: 20px;
            }

            .search-header {
                padding: 20px;
            }

            .search-body {
                padding: 25px;
            }

            .filters-grid {
                grid-template-columns: 1fr;
            }

            .suggestion-list {
                grid-template-columns: 1fr;
            }
        }

        /* إشعارات الدردشة الصوتية */
        .voice-command-notification {
            position: fixed;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            z-index: 10000;
            display: none;
            font-size: 1.1rem;
        }

        .voice-command-notification.show {
            display: block;
            animation: fadeIn 0.3s ease;
        }
    </style>
</head>

<body>
    {{-- <!-- رسالة ترحيبية -->
    <div class="welcome-modal" id="welcomeModal">
        <span class="modal-close" id="closeModal">&times;</span>
        <h3 class="text-center mb-4">مرحبًا بك في منصة تراخيص البناء الإلكترونية</h3>
        <p class="text-center">نقدم لك حلولاً إلكترونية متكاملة لتراخيص البناء في اليمن. ابدأ رحلتك الآن بخطوات سهلة
            وسريعة.</p>
        <div class="text-center mt-4">
            <button class="btn btn-primary btn-lg px-5" id="startJourney">ابدأ الرحلة</button>
        </div>
    </div> --}}




    <!-- القسم البطولي -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">الخدمات الإلكترونية لتراخيص البناء في اليمن</h1>
                    <p class="hero-subtitle">منصة متكاملة لتسهيل إجراءات الحصول على تراخيص البناء، توفر الوقت والجهد
                        وتضمن الشفافية والكفاءة في تقديم الخدمات</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#" class="ajax-link btn btn-warning btn-hero" data-page="main.Breadcrumb_Receptionist">تقديم طلب جديد <i
                                class="fas fa-arrow-left ms-2"></i></a>

                        {{-- <a href="track.html" class="btn btn-outline-light btn-hero">تتبع طلبك <i
                                class="fas fa-search ms-2"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-6 text-center floating">
                    <img src="{{ asset('logo-platform.png') }}" alt="شعار الوزارة" class="img-fluid">
                </div>
            </div>

            <div class="row hero-stats mt-5">
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">1,250+</div>
                    <div class="stat-label">رخصة تم إصدارها</div>
                </div>
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">85%</div>
                    <div class="stat-label">رضا العملاء</div>
                </div>
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">5 أيام</div>
                    <div class="stat-label">متوسط مدة الإجراء</div>
                </div>
                <div class="col-md-3 col-6 stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">خدمة متاحة طوال الوقت</div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الخدمات المحدث -->
    <section class="services-section">
        <div class="container">
            <div class="section-title">
                <h2>خدمات منصتنا الإلكترونية</h2>
                <p>استكشف مجموعة خدماتنا المتكاملة المصممة لتلبية جميع احتياجات تراخيص البناء</p>
            </div>

            <div class="services-grid">
                <div class="service-card-modern">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="تراخيص البناء السكني">
                        <div class="service-overlay">
                            <h3>تراخيص البناء السكني</h3>
                        </div>
                        <div class="service-icon-modern">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="service-tag">خدمات أساسية</div>
                    </div>
                    <div class="service-content">
                        <p>خدمة إلكترونية للحصول على تراخيص بناء المنازل السكنية والمباني السكنية المتعددة الطوابق</p>
                        <a href="#" class="service-link">
                            المزيد من التفاصيل <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

                <div class="service-card-modern">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1504309092620-4d0ec726efa4?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="تراخيص البناء التجاري">
                        <div class="service-overlay">
                            <h3>تراخيص البناء التجاري</h3>
                        </div>
                        <div class="service-icon-modern">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="service-tag">خدمات أساسية</div>
                    </div>
                    <div class="service-content">
                        <p>خدمة تراخيص البناء للمراكز التجارية والمكاتب والمحال والمشاريع التجارية المختلفة</p>
                        <a href="#" class="service-link">
                            المزيد من التفاصيل <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

                <div class="service-card-modern">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="تراخيص البناء الصناعي">
                        <div class="service-overlay">
                            <h3>تراخيص البناء الصناعي</h3>
                        </div>
                        <div class="service-icon-modern">
                            <i class="fas fa-industry"></i>
                        </div>
                        <div class="service-tag">خدمات متخصصة</div>
                    </div>
                    <div class="service-content">
                        <p>خدمة تراخيص البناء للمصانع والمستودعات والمنشآت الصناعية بكافة أنواعها</p>
                        <a href="#" class="service-link">
                            المزيد من التفاصيل <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

                <div class="service-card-modern">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1462899006636-339e08d1844e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="تعديل التراخيص">
                        <div class="service-overlay">
                            <h3>تعديل التراخيص</h3>
                        </div>
                        <div class="service-icon-modern">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="service-tag">خدمات داعمة</div>
                    </div>
                    <div class="service-content">
                        <p>خدمة طلب تعديل على ترخيص بناء صادر سابقاً لتغيير مواصفات البناء أو الغرض منه</p>
                        <a href="#" class="service-link">
                            المزيد من التفاصيل <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

                <div class="service-card-modern">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="تجديد التراخيص">
                        <div class="service-overlay">
                            <h3>تجديد التراخيص</h3>
                        </div>
                        <div class="service-icon-modern">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <div class="service-tag">خدمات داعمة</div>
                    </div>
                    <div class="service-content">
                        <p>خدمة تجديد تراخيص البناء المنتهية الصلاحية وفقاً للشروط واللوائح المعمول بها</p>
                        <a href="#" class="service-link">
                            المزيد من التفاصيل <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>

                <div class="service-card-modern">
                    <div class="service-image">
                        <img src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                            alt="استخراج الوثائق">
                        <div class="service-overlay">
                            <h3>استخراج الوثائق</h3>
                        </div>
                        <div class="service-icon-modern">
                            <i class="fas fa-file-download"></i>
                        </div>
                        <div class="service-tag">خدمات إدارية</div>
                    </div>
                    <div class="service-content">
                        <p>خدمة استخراج نسخ من التراخيص والوثائق الصادرة سابقاً والموافقات الرسمية</p>
                        <a href="#" class="service-link">
                            المزيد من التفاصيل <i class="fas fa-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم كيفية الحصول على ترخيص البناء المحدث -->
    <section class="all-step">
        <div class="container">
            <header>
                <h1 class="floating">كيفية الحصول على ترخيص البناء</h1>
                <div class="divider"></div>
                <p>اكتشف الخطوات البسيطة والمباشرة للحصول على ترخيص بناءك في أسرع وقت وبأقل جهد</p>
            </header>

            <!-- مؤشر تقدم الخطوات -->
            <div class="process-progress" id="progressSteps">
                <div class="progress-step" data-step="1">1</div>
                <div class="progress-step" data-step="2">2</div>
                <div class="progress-step" data-step="3">3</div>
                <div class="progress-step" data-step="4">4</div>
                <div class="progress-step" data-step="5">5</div>
                <div class="progress-step" data-step="6">6</div>
            </div>

            <div class="process-container">
                <div class="process-circle">
                    <div class="process-center">
                        <i class="fas fa-lightbulb"></i>
                        <h2>ابدأ رحلتك الآن</h2>
                        <p>انقر على أي خطوة للتفاصيل</p>
                    </div>

                    <!-- الخطوات موزعة بشكل دائري -->
                    <div class="step step1" data-step="1" >
                        <div class="step-number1">1</div>
                        <div class="step-title">إنشاء حساب</div>
                    </div>

                    <div class="step step2" data-step="2" >
                        <div class="step-number2">2</div>
                        <div class="step-title">تقديم الطلب</div>
                    </div>

                    <div class="step step3" data-step="3" >
                        <div class="step-number3">3</div>
                        <div class="step-title">المراجعة والدفع</div>
                    </div>

                    <div class="step step4" data-step="4" >
                        <div class="step-number4">4</div>
                        <div class="step-title">الموافقة المبدئية</div>
                    </div>

                    <div class="step step5" data-step="5" >
                        <div class="step-number5">5</div>
                        <div class="step-title">الزيارة الميدانية</div>
                    </div>

                    <div class="step step6" data-step="6" >
                        <div class="step-number6">6</div>
                        <div class="step-title">استلام الترخيص</div>
                    </div>
                </div>

                <!-- محتوى الخطوات -->
                <div class="step-content" id="step-1">
                    <div class="step-content-header">
                        <h2><i class="fas fa-user-plus"></i> إنشاء حساب</h2>
                        <div class="close-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="step-content-body">
                        <div class="step-image">
                            <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="إنشاء حساب">
                        </div>
                        <div class="step-details">
                            <p>الخطوة الأولى للحصول على ترخيص البناء هي إنشاء حساب شخصي على منصتنا الإلكترونية. سجل
                                باستخدام
                                هويتك الوطنية ومعلوماتك الشخصية لتبدأ رحلتك.</p>

                            <ul class="step-features">
                                <li>تسجيل سريع باستخدام الهوية الوطنية</li>
                                <li>واجهة سهلة الاستخدام</li>
                                <li>تأكيد فوري عبر الجوال</li>
                                <li>حماية بياناتك بأعلى معايير الأمان</li>
                            </ul>

                            <button class="action-btn">بدء إنشاء الحساب</button>
                        </div>
                    </div>
                </div>

                <div class="step-content" id="step-2">
                    <div class="step-content-header">
                        <h2><i class="fas fa-file-upload"></i> تقديم الطلب</h2>
                        <div class="close-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="step-content-body">
                        <div class="step-image">
                            <img src="https://images.unsplash.com/photo-1581093458799-ef7786c8b8e2?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="تقديم الطلب">
                        </div>
                        <div class="step-details">
                            <p>بعد إنشاء حسابك، يمكنك ملء نموذج الطلب الإلكتروني بسهولة. قم برفع المستندات المطلوبة
                                مباشرة
                                عبر المنصة دون الحاجة لزيارة أي مكاتب.</p>

                            <ul class="step-features">
                                <li>نموذج إلكتروني سهل الاستخدام</li>
                                <li>رفع مستندات رقمية</li>
                                <li>قائمة واضحة بالمستندات المطلوبة</li>
                                <li>حفظ الطلب واستكماله لاحقاً</li>
                            </ul>

                            <button class="action-btn">تقديم طلب جديد</button>
                        </div>
                    </div>
                </div>

                <div class="step-content" id="step-3">
                    <div class="step-content-header">
                        <h2><i class="fas fa-search-dollar"></i> المراجعة والدفع</h2>
                        <div class="close-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="step-content-body">
                        <div class="step-image">
                            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="المراجعة والدفع">
                        </div>
                        <div class="step-details">
                            <p>سيتم مراجعة طلبك من قبل فريقنا المختص خلال 48 ساعة. عند اكتمال المراجعة، ستتلقى إشعاراً
                                لسداد
                                الرسوم عبر المنصة.</p>

                            <ul class="step-features">
                                <li>مراجعة دقيقة من المختصين</li>
                                <li>إشعارات فورية عبر البريد والجوال</li>
                                <li>دفع إلكتروني آمن وسريع</li>
                                <li>إيصال دفع فوري</li>
                            </ul>

                            <button class="action-btn">معرفة الرسوم</button>
                        </div>
                    </div>
                </div>

                <div class="step-content" id="step-4">
                    <div class="step-content-header">
                        <h2><i class="fas fa-check-circle"></i> الموافقة المبدئية</h2>
                        <div class="close-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="step-content-body">
                        <div class="step-image">
                            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="الموافقة المبدئية">
                        </div>
                        <div class="step-details">
                            <p>بعد سداد الرسوم واستيفاء جميع المتطلبات، ستحصل على الموافقة المبدئية خلال 5 أيام عمل.
                                يمكنك
                                متابعة حالة طلبك عبر حسابك الشخصي.</p>

                            <ul class="step-features">
                                <li>متابعة حالة الطلب إلكترونياً</li>
                                <li>إشعارات بكل التحديثات</li>
                                <li>وثيقة موافقة مبدئية قابلة للتحميل</li>
                                <li>دعم فني متاح على مدار الساعة</li>
                            </ul>

                            <button class="action-btn">تتبع طلبك</button>
                        </div>
                    </div>
                </div>

                <div class="step-content" id="step-5">
                    <div class="step-content-header">
                        <h2><i class="fas fa-hard-hat"></i> الزيارة الميدانية</h2>
                        <div class="close-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="step-content-body">
                        <div class="step-image">
                            <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="الزيارة الميدانية">
                        </div>
                        <div class="step-details">
                            <p>سيتم تنسيق زيارة ميدانية معك من قبل فريق التفتيش الخاص بنا للتأكد من مطابقة الموقع
                                للمواصفات
                                المقدمة في الطلب.</p>

                            <ul class="step-features">
                                <li>جدولة الزيارة حسب راحتك</li>
                                <li>فريق متخصص في التفتيش الميداني</li>
                                <li>تقرير مفصل بعد الزيارة</li>
                                <li>متابعة سريعة لأي ملاحظات</li>
                            </ul>

                            <button class="action-btn">جدولة الزيارة</button>
                        </div>
                    </div>
                </div>

                <div class="step-content" id="step-6">
                    <div class="step-content-header">
                        <h2><i class="fas fa-file-certificate"></i> استلام الترخيص</h2>
                        <div class="close-btn">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="step-content-body">
                        <div class="step-image">
                            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80"
                                alt="استلام الترخيص">
                        </div>
                        <div class="step-details">
                            <p>بعد إتمام جميع الإجراءات والزيارة الميدانية، ستصلك الرخصة الإلكترونية مباشرة على حسابك في
                                المنصة. يمكنك تحميلها وطباعتها في أي وقت.</p>

                            <ul class="step-features">
                                <li>رخصة إلكترونية موقعة</li>
                                <li>تحميل وطباعة مباشرة</li>
                                <li>إرسال نسخة إلى بريدك الإلكتروني</li>
                                <li>تخزين آمن للرخصة في حسابك</li>
                            </ul>

                            <button class="action-btn">تحميل الرخصة</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الإحصائيات -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-5">
                    <div class="stat-circle">
                        <div class="number">97%</div>
                        <div class="label">توفير الوقت</div>
                    </div>
                    <h4>مقارنة بالطرق التقليدية</h4>
                </div>

                <div class="col-md-3 mb-5">
                    <div class="stat-circle">
                        <div class="number">75%</div>
                        <div class="label">تخفيض التكاليف</div>
                    </div>
                    <h4>تقليل المصاريف الإدارية</h4>
                </div>

                <div class="col-md-3 mb-5">
                    <div class="stat-circle">
                        <div class="number">30+</div>
                        <div class="label">جهة حكومية</div>
                    </div>
                    <h4>متكاملة في نظام واحد</h4>
                </div>

                <div class="col-md-3 mb-5">
                    <div class="stat-circle">
                        <div class="number">22</div>
                        <div class="label">محافظة يمنية</div>
                    </div>
                    <h4>تغطي جميع مناطق اليمن</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الأخبار والتنبيهات -->
    <section class="news-section">
        <div class="container">
            <div class="section-title">
                <h2>آخر الأخبار والتنبيهات</h2>
                <p>ابقَ على اطلاع دائم بآخر المستجدات والتحديثات</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="https://via.placeholder.com/600x400?text=ورشة+عمل" alt="ورشة عمل">
                        </div>
                        <div class="card-body">
                            <span class="news-date">15 أكتوبر 2023</span>
                            <h3>ورشة عمل حول تحديثات أنظمة البناء</h3>
                            <p>تدعو الوزارة جميع المهتمين لحضور ورشة عمل حول التحديثات الجديدة في أنظمة ولوائح البناء
                                المعتمدة</p>
                            <a href="#" class="btn btn-link ps-0">قراءة المزيد <i
                                    class="fas fa-arrow-left ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="https://via.placeholder.com/600x400?text=تحديث+نظام" alt="تحديث النظام">
                        </div>
                        <div class="card-body">
                            <span class="news-date">10 أكتوبر 2023</span>
                            <h3>تحديث جديد على المنصة الإلكترونية</h3>
                            <p>تم إطلاق الإصدار 2.5 من المنصة الإلكترونية والذي يتضمن تحسينات في الأداء وتجربة المستخدم
                            </p>
                            <a href="#" class="btn btn-link ps-0">قراءة المزيد <i
                                    class="fas fa-arrow-left ms-2"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="news-card">
                        <div class="news-img">
                            <img src="https://via.placeholder.com/600x400?text=عطلة+رسمية" alt="عطلة رسمية">
                        </div>
                        <div class="card-body">
                            <span class="news-date">5 أكتوبر 2023</span>
                            <h3>إعلان عن عطلة رسمية</h3>
                            <p>تعلن الوزارة عن عطلة رسمية يوم الثلاثاء القادم بمناسبة ذكرى الثورة اليمنية</p>
                            <a href="#" class="btn btn-link ps-0">قراءة المزيد <i
                                    class="fas fa-arrow-left ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary btn-lg px-5 py-3">عرض جميع الأخبار</a>
            </div>
        </div>
    </section>

    <!-- قسم شركاء النجاح المحسن -->
    <section class="partners-section">
        <div class="container">
            <div class="section-title">
                <h2>شركاء النجاح</h2>
                <p>نعمل مع شركاء استراتيجيين لتقديم أفضل الخدمات</p>
            </div>

            <div class="partners-container">
                <div class="partners-slider" id="partnersSlider">
                    <div class="partner-card">
                        <div class="partner-logo-container">
                            <img src="https://via.placeholder.com/150x60?text=شريك+1" alt="شريك 1">
                        </div>
                        <div class="partner-info">
                            <h3>وزارة الأشغال العامة</h3>
                            <p>داعم رئيسي للمنصة وخدماتها الإلكترونية</p>
                        </div>
                    </div>

                    <div class="partner-card">
                        <div class="partner-logo-container">
                            <img src="https://via.placeholder.com/150x60?text=شريك+2" alt="شريك 2">
                        </div>
                        <div class="partner-info">
                            <h3>الهيئة العامة للاستثمار</h3>
                            <p>دعم المشاريع الاستثمارية والتراخيص الصناعية</p>
                        </div>
                    </div>

                    <div class="partner-card">
                        <div class="partner-logo-container">
                            <img src="https://via.placeholder.com/150x60?text=شريك+3" alt="شريك 3">
                        </div>
                        <div class="partner-info">
                            <h3>البنك اليمني للتنمية</h3>
                            <p>تمويل المشاريع ودعم خدمات الدفع الإلكتروني</p>
                        </div>
                    </div>

                    <div class="partner-card">
                        <div class="partner-logo-container">
                            <img src="https://via.placeholder.com/150x60?text=شريك+4" alt="شريك 4">
                        </div>
                        <div class="partner-info">
                            <h3>الهيئة العامة للمساحة</h3>
                            <p>توفير الخرائط والبيانات الجغرافية الدقيقة</p>
                        </div>
                    </div>

                    <div class="partner-card">
                        <div class="partner-logo-container">
                            <img src="https://via.placeholder.com/150x60?text=شريك+5" alt="شريك 5">
                        </div>
                        <div class="partner-info">
                            <h3>جمعية المقاولين</h3>
                            <p>دعم المقاولين وتسهيل إجراءات التراخيص</p>
                        </div>
                    </div>
                </div>

                <div class="partners-controls">
                    <div class="partners-btn" id="prevPartner">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="partners-btn" id="nextPartner">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم آراء العملاء الجديد -->
    <section class="testimonials-section">
        <div class="container">
            <div class="section-title">
                <h2>آراء عملائنا</h2>
                <p>انطباعات المستخدمين عن تجربتهم مع المنصة</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="محمد أحمد">
                        </div>
                        <div class="testimonial-author">
                            <h4>محمد أحمد</h4>
                            <p>مقاول بناء</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-content">
                        "لقد وفرت المنصة الكثير من الوقت والجهد في الحصول على تراخيص البناء. الخدمة سريعة ومهنية،
                        والتواصل مع الفريق سهل ومباشر."
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="سارة عبد الله">
                        </div>
                        <div class="testimonial-author">
                            <h4>سارة عبد الله</h4>
                            <p>مالكة مشروع تجاري</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="testimonial-content">
                        "تجربة ممتازة مع المنصة، استطعت الحصول على ترخيص لمشروعي التجاري في وقت قياسي. واجهة المستخدم
                        بسيطة وسهلة الاستخدام."
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <div class="testimonial-avatar">
                            <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="علي حسين">
                        </div>
                        <div class="testimonial-author">
                            <h4>علي حسين</h4>
                            <p>مهندس معماري</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-content">
                        "خدمة رائعة وفعالة، وفرت علي الكثير من الوقت الذي كنت أضيعه في المكاتب الحكومية. التحديثات
                        المستمرة على المنصة تجعلها تواكب احتياجات المستخدمين."
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم الأسئلة الشائعة -->
    <section class="faq-section">
        <div class="container">
            <div class="section-title">
                <h2>الأسئلة الشائعة</h2>
                <p>إجابات على أكثر الأسئلة شيوعاً من المستخدمين</p>
            </div>

            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne">
                            ما هي المستندات المطلوبة للحصول على ترخيص بناء؟
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            المستندات المطلوبة تشمل: صورة من الهوية الوطنية، سند ملكية الأرض، المخططات الهندسية
                            المعتمدة، شهادة عدم الممانعة من الجيران (إن وجدت)، وتختلف المتطلبات حسب نوع البناء.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo">
                            كم تستغرق مدة الحصول على الترخيص؟
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            متوسط مدة الحصول على الترخيص هو 5 أيام عمل في حالة اكتمال المستندات المطلوبة، وقد تزيد المدة
                            في حالة وجود ملاحظات أو حاجة لزيارة ميدانية.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree">
                            هل يمكنني متابعة حالة طلبي إلكترونياً؟
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            نعم، يمكنك متابعة حالة طلبك في أي وقت عبر المنصة الإلكترونية أو تطبيق الجوال، حيث يتم تحديث
                            حالة الطلب في كل مرحلة من مراحل المراجعة.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- قسم تعليقات واقتراحات -->
    {{-- <section class="feedback-section">
        <div class="container">
            <div class="section-title">
                <h2>تعليقات واقتراحات</h2>
                <p>شاركنا برأيك لنساعدك بشكل أفضل</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="feedback-form">
                        <form>
                            <div class="mb-4">
                                <label class="form-label fw-bold">الاسم</label>
                                <input type="text" class="form-control form-control-lg">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">البريد الإلكتروني</label>
                                <input type="email" class="form-control form-control-lg">
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">نوع التعليق</label>
                                <select class="form-select form-select-lg">
                                    <option>اقتراح</option>
                                    <option>شكوى</option>
                                    <option>استفسار</option>
                                    <option>مدح</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label fw-bold">التعليق أو الاقتراح</label>
                                <textarea class="form-control form-control-lg" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3">إرسال التعليق</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    
    <script>
        // ✅ تعريف دوال التهيئة للصفحة
        function initPage() {
            initializeNavigation();
            initializeSearch();
            initializeSettings();
            initializeSteps();
            initializePartnersSlider();
            initializeTestimonials();
            initializeFAQ();
            initializeFeedback();
            initializeWelcomeModal();
            initializeScrollEffects();
            initializeVoiceCommands();
        }

        // ✅ دالة لتهيئة التنقل
        function initializeNavigation() {
            // تفعيل التنقل السلس
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth'
                        });
                    }
                });
            });

            // إدارة شريط التنقل المخفي عند التمرير
            let lastScrollTop = 0;
            const navbar = document.querySelector('.navbar');

            if (navbar) {
                window.addEventListener('scroll', function() {
                    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                    if (scrollTop > lastScrollTop && scrollTop > 100) {
                        navbar.classList.add('hidden');
                    } else {
                        navbar.classList.remove('hidden');
                    }

                    lastScrollTop = scrollTop;
                });
            }
        }

        // ✅ دالة لتهيئة البحث
        function initializeSearch() {
            const searchToggle = document.getElementById('searchToggle');
            const searchOverlay = document.getElementById('searchOverlay');
            const closeSearch = document.getElementById('closeSearch');

            if (searchToggle && searchOverlay) {
                searchToggle.addEventListener('click', function () {
                    searchOverlay.classList.add('show');
                    document.body.style.overflow = 'hidden';
                });
            }

            if (closeSearch && searchOverlay) {
                closeSearch.addEventListener('click', function () {
                    searchOverlay.classList.remove('show');
                    document.body.style.overflow = 'auto';
                });
            }

            // إغلاق شاشة البحث عند النقر خارجها
            if (searchOverlay) {
                searchOverlay.addEventListener('click', function (e) {
                    if (e.target === searchOverlay) {
                        searchOverlay.classList.remove('show');
                        document.body.style.overflow = 'auto';
                    }
                });
            }

            // تفعيل أزرار البحث المتقدم
            document.querySelectorAll('.search-advanced .btn').forEach(btn => {
                btn.addEventListener('click', function (e) {
                    e.preventDefault();
                    const category = this.textContent.trim();
                    const searchInput = document.querySelector('.search-box input');
                    if (searchInput) {
                        searchInput.value = category;
                        showNotification(`تم البحث في فئة: ${category}`);
                    }
                });
            });

            // تفعيل عناصر البحث المقترحة
            document.querySelectorAll('.suggestion-item').forEach(item => {
                item.addEventListener('click', function () {
                    const suggestion = this.textContent;
                    const searchInput = document.querySelector('.search-box input');
                    if (searchInput) {
                        searchInput.value = suggestion;
                        showNotification(`تم البحث عن: ${suggestion}`);
                    }
                });
            });
        }

        // ✅ دالة لتهيئة الإعدادات
        function initializeSettings() {
            const settingsToggle = document.getElementById('settings-toggle');
            const settingsDropdown = document.getElementById('settings-dropdown');
            const languageToggle = document.getElementById('language-toggle');
            const languageDropdown = document.getElementById('language-dropdown');

            if (settingsToggle && settingsDropdown) {
                settingsToggle.addEventListener('click', function (e) {
                    e.stopPropagation();
                    settingsDropdown.classList.toggle('show');
                    if (languageDropdown && languageDropdown.classList.contains('show')) {
                        languageDropdown.classList.remove('show');
                    }
                });
            }

            if (languageToggle && languageDropdown) {
                languageToggle.addEventListener('click', function (e) {
                    e.stopPropagation();
                    languageDropdown.classList.toggle('show');
                    if (settingsDropdown && settingsDropdown.classList.contains('show')) {
                        settingsDropdown.classList.remove('show');
                    }
                });
            }

            // إغلاق القوائم عند النقر خارجها
            document.addEventListener('click', function () {
                if (settingsDropdown && settingsDropdown.classList.contains('show')) {
                    settingsDropdown.classList.remove('show');
                }
                if (languageDropdown && languageDropdown.classList.contains('show')) {
                    languageDropdown.classList.remove('show');
                }
            });

            // منع إغلاق القائمة عند النقر داخلها
            if (settingsDropdown) {
                settingsDropdown.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            }

            if (languageDropdown) {
                languageDropdown.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            }

            // تغيير اللغة
            document.querySelectorAll('.language-dropdown .settings-item').forEach(item => {
                item.addEventListener('click', function () {
                    const lang = this.getAttribute('data-lang');
                    alert(`تم تغيير اللغة إلى ${lang === 'ar' ? 'العربية' : 'الإنجليزية'}`);
                    if (languageDropdown) {
                        languageDropdown.classList.remove('show');
                    }
                });
            });

            // تفعيل إعدادات إمكانية الوصول
            const increaseFont = document.getElementById('increase-font');
            const decreaseFont = document.getElementById('decrease-font');
            const resetFont = document.getElementById('reset-font');
            const contrastToggle = document.getElementById('contrast-toggle');
            const darkModeToggle = document.getElementById('dark-mode-toggle');
            const lightModeToggle = document.getElementById('light-mode-toggle');
            const printToggle = document.getElementById('print-toggle');
            const voiceToggle = document.getElementById('voice-toggle');
            const baseFontSize = parseFloat(getComputedStyle(document.body).fontSize);

            if (increaseFont) {
                increaseFont.addEventListener('click', function () {
                    const currentSize = parseFloat(getComputedStyle(document.body).fontSize);
                    document.body.style.fontSize = (currentSize + 1) + 'px';
                    showNotification('تم تكبير حجم الخط');
                });
            }

            if (decreaseFont) {
                decreaseFont.addEventListener('click', function () {
                    const currentSize = parseFloat(getComputedStyle(document.body).fontSize);
                    if (currentSize > 12) {
                        document.body.style.fontSize = (currentSize - 1) + 'px';
                        showNotification('تم تصغير حجم الخط');
                    }
                });
            }

            if (resetFont) {
                resetFont.addEventListener('click', function () {
                    document.body.style.fontSize = baseFontSize + 'px';
                    showNotification('تم إعادة حجم الخط إلى الوضع الافتراضي');
                });
            }

            if (contrastToggle) {
                contrastToggle.addEventListener('click', function () {
                    document.body.classList.toggle('high-contrast');
                    showNotification('تم تفعيل وضع التباين العالي');
                });
            }

            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', function () {
                    document.body.classList.add('dark-mode');
                    document.body.classList.remove('high-contrast');
                    showNotification('تم تفعيل الوضع المظلم');
                });
            }

            if (lightModeToggle) {
                lightModeToggle.addEventListener('click', function () {
                    document.body.classList.remove('dark-mode', 'high-contrast');
                    showNotification('تم تفعيل الوضع الفاتح');
                });
            }

            if (printToggle) {
                printToggle.addEventListener('click', function () {
                    window.print();
                    showNotification('جاري تحضير الصفحة للطباعة');
                });
            }
        }

        // ✅ دالة لتهيئة الخطوات التفاعلية
        function initializeSteps() {
            // تفعيل الخطوات التفاعلية
            document.querySelectorAll('.step').forEach(step => {
                step.addEventListener('click', function () {
                    const stepId = this.getAttribute('data-step');

                    // إزالة النشاط من جميع الخطوات
                    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
                    document.querySelectorAll('.step-content').forEach(c => c.classList.remove('active'));

                    // تفعيل الخطوة المحددة
                    this.classList.add('active');
                    const stepContent = document.getElementById(`step-${stepId}`);
                    if (stepContent) {
                        stepContent.classList.add('active');
                    }

                    // تحديث مؤشر التقدم
                    updateProgressSteps(stepId);
                });
            });

            // تحديث مؤشر التقدم
            function updateProgressSteps(currentStep) {
                document.querySelectorAll('.progress-step').forEach(step => {
                    const stepNum = parseInt(step.getAttribute('data-step'));
                    step.classList.remove('active', 'completed');

                    if (stepNum < currentStep) {
                        step.classList.add('completed');
                    } else if (stepNum == currentStep) {
                        step.classList.add('active');
                    }
                });
            }

            // إغلاق محتوى الخطوة
            document.querySelectorAll('.close-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    const stepContent = this.closest('.step-content');
                    if (stepContent) {
                        stepContent.classList.remove('active');
                    }
                    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
                });
            });

            // تفعيل المركز
            const processCenter = document.querySelector('.process-center');
            if (processCenter) {
                processCenter.addEventListener('click', function () {
                    showNotification('اختر خطوة لمعرفة تفاصيلها');
                });
            }
        }

        // ✅ دالة لتهيئة سلايدر الشركاء
        function initializePartnersSlider() {
            const partnersSlider = document.getElementById('partnersSlider');
            const prevBtn = document.getElementById('prevPartner');
            const nextBtn = document.getElementById('nextPartner');

            if (!partnersSlider || !prevBtn || !nextBtn) return;

            const cardWidth = 280; // عرض كل بطاقة شريك
            let scrollPosition = 0;

            prevBtn.addEventListener('click', () => {
                scrollPosition = Math.max(scrollPosition - cardWidth, 0);
                partnersSlider.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            });

            nextBtn.addEventListener('click', () => {
                const maxScroll = partnersSlider.scrollWidth - partnersSlider.clientWidth;
                scrollPosition = Math.min(scrollPosition + cardWidth, maxScroll);
                partnersSlider.scrollTo({
                    left: scrollPosition,
                    behavior: 'smooth'
                });
            });
        }

        // ✅ دالة لتهيئة آراء العملاء
        function initializeTestimonials() {
            // يمكن إضافة أي تفاعلات خاصة بآراء العملاء هنا
        }

        // ✅ دالة لتهيئة الأسئلة الشائعة
        function initializeFAQ() {
            // يمكن إضافة أي تفاعلات خاصة بالأسئلة الشائعة هنا
        }

        // ✅ دالة لتهيئة نموذج التعليقات
        function initializeFeedback() {
            const feedbackForm = document.querySelector('.feedback-form form');
            if (feedbackForm) {
                feedbackForm.addEventListener('submit', function (e) {
                    e.preventDefault();

                    // جمع بيانات النموذج
                    const formData = {
                        name: this.querySelector('input[type="text"]').value,
                        email: this.querySelector('input[type="email"]').value,
                        type: this.querySelector('select').value,
                        comment: this.querySelector('textarea').value
                    };

                    // عرض رسالة نجاح
                    showNotification('شكراً على ملاحظاتك! سنقوم بمراجعتها قريباً.');

                    // إعادة تعيين النموذج
                    this.reset();
                });
            }
        }

        // // ✅ دالة لتهيئة النافذة الترحيبية
        // function initializeWelcomeModal() {
        //     const welcomeModal = document.getElementById('welcomeModal');
        //     const closeModal = document.getElementById('closeModal');
        //     const startJourney = document.getElementById('startJourney');

        //     if (welcomeModal && closeModal) {
        //         closeModal.addEventListener('click', function () {
        //             welcomeModal.classList.remove('active');
        //         });
        //     }

        //     if (welcomeModal && startJourney) {
        //         startJourney.addEventListener('click', function () {
        //             welcomeModal.classList.remove('active');
        //             // توجيه المستخدم إلى قسم الخطوات
        //             const allStepSection = document.querySelector('.all-step');
        //             if (allStepSection) {
        //                 allStepSection.scrollIntoView({ behavior: 'smooth' });
        //             }
        //         });
        //     }

        //     // إغلاق الرسالة الترحيبية عند النقر خارجها
        //     if (welcomeModal) {
        //         window.addEventListener('click', function (e) {
        //             if (e.target === welcomeModal) {
        //                 welcomeModal.classList.remove('active');
        //             }
        //         });
        //     }
        // }

        // ✅ دالة لتهيئة تأثيرات التمرير
        function initializeScrollEffects() {
            // زر العودة للأعلى
            const backToTop = document.querySelector('.back-to-top');
            if (backToTop) {
                window.addEventListener('scroll', function () {
                    if (window.scrollY > 300) {
                        backToTop.classList.add('show');
                    } else {
                        backToTop.classList.remove('show');
                    }
                });

                backToTop.addEventListener('click', function (e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            // الدردشة المباشرة
            const liveChat = document.querySelector('.live-chat');
            if (liveChat) {
                liveChat.addEventListener('click', function () {
                    showNotification('سيتم فتح نافذة الدردشة قريبًا');
                });
            }
        }

        // ✅ دالة لتهيئة الأوامر الصوتية
        function initializeVoiceCommands() {
            const voiceToggle = document.getElementById('voice-toggle');
            const voiceCommandNotification = document.getElementById('voiceCommandNotification');
            const voiceStatus = document.getElementById('voiceStatus');

            if (!voiceToggle || !voiceCommandNotification || !voiceStatus) return;

            let recognition;

            voiceToggle.addEventListener('click', function () {
                if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
                    showNotification('المتصفح لا يدعم الأوامر الصوتية');
                    return;
                }

                const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                recognition = new SpeechRecognition();
                recognition.lang = 'ar-SA';
                recognition.continuous = true;

                recognition.start();
                voiceCommandNotification.classList.add('show');
                voiceStatus.textContent = 'جاري الاستماع للأوامر الصوتية...';

                recognition.onresult = function (event) {
                    const transcript = event.results[event.results.length - 1][0].transcript;
                    voiceStatus.textContent = `تم التعرف على: ${transcript}`;

                    // تنفيذ الأوامر
                    if (transcript.includes('فتح البحث')) {
                        const searchOverlay = document.getElementById('searchOverlay');
                        if (searchOverlay) {
                            searchOverlay.classList.add('show');
                            document.body.style.overflow = 'hidden';
                        }
                    } else if (transcript.includes('إغلاق البحث')) {
                        const searchOverlay = document.getElementById('searchOverlay');
                        if (searchOverlay) {
                            searchOverlay.classList.remove('show');
                            document.body.style.overflow = 'auto';
                        }
                    } else if (transcript.includes('الوضع المظلم')) {
                        document.body.classList.add('dark-mode');
                        document.body.classList.remove('high-contrast');
                        voiceStatus.textContent = 'تم تفعيل الوضع المظلم';
                    } else if (transcript.includes('الوضع الفاتح')) {
                        document.body.classList.remove('dark-mode', 'high-contrast');
                        voiceStatus.textContent = 'تم تفعيل الوضع الفاتح';
                    } else if (transcript.includes('الرئيسية')) {
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        voiceStatus.textContent = 'جاري التوجيه إلى الصفحة الرئيسية';
                    } else if (transcript.includes('الخدمات')) {
                        const servicesSection = document.querySelector('.services-section');
                        if (servicesSection) {
                            servicesSection.scrollIntoView({ behavior: 'smooth' });
                            voiceStatus.textContent = 'جاري التوجيه إلى قسم الخدمات';
                        }
                    }
                };

                recognition.onerror = function (event) {
                    voiceStatus.textContent = 'حدث خطأ في التعرف على الصوت';
                    setTimeout(() => {
                        voiceCommandNotification.classList.remove('show');
                    }, 3000);
                };
            });
        }

        // ✅ دالة مساعدة لعرض الإشعارات
        function showNotification(message) {
            // إنشاء عنصر إشعار إذا لم يكن موجوداً
            let toast = document.querySelector('.notification-toast');
            if (!toast) {
                toast = document.createElement('div');
                toast.className = 'notification-toast';
                toast.innerHTML = '<p></p>';
                toast.style.cssText = `
                    position: fixed;
                    bottom: 20px;
                    left: 50%;
                    transform: translateX(-50%);
                    background: rgba(0, 0, 0, 0.8);
                    color: white;
                    padding: 15px 30px;
                    border-radius: 50px;
                    z-index: 10000;
                    display: none;
                    font-size: 1.1rem;
                `;
                document.body.appendChild(toast);
            }

            const messageElement = toast.querySelector('p');
            messageElement.textContent = message;
            toast.style.display = 'block';

            setTimeout(() => {
                toast.style.display = 'none';
            }, 3000);
        }

        // ✅ تهيئة الصفحة عند التحميل المباشر
        if (document.readyState === 'complete' || document.readyState === 'interactive') {
            setTimeout(initPage, 0);
        } else {
            document.addEventListener('DOMContentLoaded', initPage);
        }

        // ✅ تهيئة الصفحة عند التحميل عبر AJAX
        // سيتم تنفيذ هذا الكود فور تحميل المحتوى
        initPage();

        // ✅ تسجيل دالة التهيئة في النظام المركزي للصفحات
        if (window.pageInitializers === undefined) {
            window.pageInitializers = {};
        }

        // استخدم معرف صفحة فريداً، يمكن تغييره حسب الصفحة
        window.pageInitializers.mainPage = initPage;

        // ✅ إظهار إشعار الترحيب عند التحميل
        setTimeout(() => {
            showNotification('مرحبًا بك! نأمل أن تجد تجربتك معنا ممتعة ومفيدة');
        }, 1000);

        // ✅ إظهار الرسالة الترحيبية بعد تحميل الصفحة
        setTimeout(function() {
            const welcomeModal = document.getElementById('welcomeModal');
            if (welcomeModal) {
                welcomeModal.classList.add('active');
            }
        }, 1500);
    </script>
    <script>
        // تفعيل التنقل السلس
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // إدارة شاشة البحث
        const searchToggle = document.getElementById('searchToggle');
        const searchOverlay = document.getElementById('searchOverlay');
        const closeSearch = document.getElementById('closeSearch');

        if (searchToggle && searchOverlay) {
            searchToggle.addEventListener('click', function () {
                searchOverlay.classList.add('show');
                document.body.style.overflow = 'hidden';
            });
        }

        if (closeSearch) {
            closeSearch.addEventListener('click', function () {
                searchOverlay.classList.remove('show');
                document.body.style.overflow = 'auto';
            });
        }

        // إغلاق شاشة البحث عند النقر خارجها
        searchOverlay.addEventListener('click', function (e) {
            if (e.target === searchOverlay) {
                searchOverlay.classList.remove('show');
                document.body.style.overflow = 'auto';
            }
        });

        // تفعيل أزرار البحث المتقدم
        document.querySelectorAll('.search-advanced .btn').forEach(btn => {
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                const category = this.textContent.trim();
                const searchInput = document.querySelector('.search-box input');
                searchInput.value = category;
                showNotification(`تم البحث في فئة: ${category}`);
            });
        });

        // تفعيل عناصر البحث المقترحة
        document.querySelectorAll('.suggestion-item').forEach(item => {
            item.addEventListener('click', function () {
                const suggestion = this.textContent;
                const searchInput = document.querySelector('.search-box input');
                searchInput.value = suggestion;
                showNotification(`تم البحث عن: ${suggestion}`);
            });
        });

        // إدارة قائمة الإعدادات واللغة
        const settingsToggle = document.getElementById('settings-toggle');
        const settingsDropdown = document.getElementById('settings-dropdown');
        const languageToggle = document.getElementById('language-toggle');
        const languageDropdown = document.getElementById('language-dropdown');

        if (settingsToggle && settingsDropdown) {
            settingsToggle.addEventListener('click', function (e) {
                e.stopPropagation();
                settingsDropdown.classList.toggle('show');
                if (languageDropdown.classList.contains('show')) {
                    languageDropdown.classList.remove('show');
                }
            });
        }

        if (languageToggle && languageDropdown) {
            languageToggle.addEventListener('click', function (e) {
                e.stopPropagation();
                languageDropdown.classList.toggle('show');
                if (settingsDropdown.classList.contains('show')) {
                    settingsDropdown.classList.remove('show');
                }
            });
        }

        // إغلاق القوائم عند النقر خارجها
        document.addEventListener('click', function () {
            if (settingsDropdown.classList.contains('show')) {
                settingsDropdown.classList.remove('show');
            }
            if (languageDropdown.classList.contains('show')) {
                languageDropdown.classList.remove('show');
            }
        });

        // منع إغلاق القائمة عند النقر داخلها
        settingsDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        languageDropdown.addEventListener('click', function (e) {
            e.stopPropagation();
        });

        // تغيير اللغة
        document.querySelectorAll('.language-dropdown .settings-item').forEach(item => {
            item.addEventListener('click', function () {
                const lang = this.getAttribute('data-lang');
                alert(`تم تغيير اللغة إلى ${lang === 'ar' ? 'العربية' : 'الإنجليزية'}`);
                languageDropdown.classList.remove('show');
            });
        });

        // تفعيل إعدادات إمكانية الوصول
        const increaseFont = document.getElementById('increase-font');
        const decreaseFont = document.getElementById('decrease-font');
        const resetFont = document.getElementById('reset-font');
        const contrastToggle = document.getElementById('contrast-toggle');
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const lightModeToggle = document.getElementById('light-mode-toggle');
        const printToggle = document.getElementById('print-toggle');
        const voiceToggle = document.getElementById('voice-toggle');
        const baseFontSize = parseFloat(getComputedStyle(document.body).fontSize);

        increaseFont.addEventListener('click', function () {
            const currentSize = parseFloat(getComputedStyle(document.body).fontSize);
            document.body.style.fontSize = (currentSize + 1) + 'px';
            showNotification('تم تكبير حجم الخط');
        });

        decreaseFont.addEventListener('click', function () {
            const currentSize = parseFloat(getComputedStyle(document.body).fontSize);
            if (currentSize > 12) {
                document.body.style.fontSize = (currentSize - 1) + 'px';
                showNotification('تم تصغير حجم الخط');
            }
        });

        resetFont.addEventListener('click', function () {
            document.body.style.fontSize = baseFontSize + 'px';
            showNotification('تم إعادة حجم الخط إلى الوضع الافتراضي');
        });

        contrastToggle.addEventListener('click', function () {
            document.body.classList.toggle('high-contrast');
            showNotification('تم تفعيل وضع التباين العالي');
        });

        darkModeToggle.addEventListener('click', function () {
            document.body.classList.add('dark-mode');
            document.body.classList.remove('high-contrast');
            showNotification('تم تفعيل الوضع المظلم');
        });

        lightModeToggle.addEventListener('click', function () {
            document.body.classList.remove('dark-mode', 'high-contrast');
            showNotification('تم تفعيل الوضع الفاتح');
        });

        printToggle.addEventListener('click', function () {
            window.print();
            showNotification('جاري تحضير الصفحة للطباعة');
        });

        // تأثيرات التمرير
        window.addEventListener('scroll', function () {
            // زر العودة للأعلى
            const backToTop = document.querySelector('.back-to-top');
            if (window.scrollY > 300) {
                backToTop.classList.add('show');
            } else {
                backToTop.classList.remove('show');
            }
        });

        // تفعيل الأوامر الصوتية
        let recognition;
        const voiceCommandNotification = document.getElementById('voiceCommandNotification');
        const voiceStatus = document.getElementById('voiceStatus');

        voiceToggle.addEventListener('click', function () {
            if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
                showNotification('المتصفح لا يدعم الأوامر الصوتية');
                return;
            }

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            recognition = new SpeechRecognition();
            recognition.lang = 'ar-SA';
            recognition.continuous = true;

            recognition.start();
            voiceCommandNotification.classList.add('show');
            voiceStatus.textContent = 'جاري الاستماع للأوامر الصوتية...';

            recognition.onresult = function (event) {
                const transcript = event.results[event.results.length - 1][0].transcript;
                voiceStatus.textContent = `تم التعرف على: ${transcript}`;

                // تنفيذ الأوامر
                if (transcript.includes('فتح البحث')) {
                    searchOverlay.classList.add('show');
                    document.body.style.overflow = 'hidden';
                } else if (transcript.includes('إغلاق البحث')) {
                    searchOverlay.classList.remove('show');
                    document.body.style.overflow = 'auto';
                } else if (transcript.includes('الوضع المظلم')) {
                    document.body.classList.add('dark-mode');
                    document.body.classList.remove('high-contrast');
                    voiceStatus.textContent = 'تم تفعيل الوضع المظلم';
                } else if (transcript.includes('الوضع الفاتح')) {
                    document.body.classList.remove('dark-mode', 'high-contrast');
                    voiceStatus.textContent = 'تم تفعيل الوضع الفاتح';
                } else if (transcript.includes('الرئيسية')) {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                    voiceStatus.textContent = 'جاري التوجيه إلى الصفحة الرئيسية';
                } else if (transcript.includes('الخدمات')) {
                    document.querySelector('.services-section').scrollIntoView({ behavior: 'smooth' });
                    voiceStatus.textContent = 'جاري التوجيه إلى قسم الخدمات';
                }
            };

            recognition.onerror = function (event) {
                voiceStatus.textContent = 'حدث خطأ في التعرف على الصوت';
                setTimeout(() => {
                    voiceCommandNotification.classList.remove('show');
                }, 3000);
            };
        });

        // تفعيل الزر للعودة إلى الأعلى
        document.querySelector('.back-to-top').addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // إظهار الإشعار
        function showNotification(message) {
            const toast = document.querySelector('.notification-toast');
            const messageElement = toast.querySelector('p');
            messageElement.textContent = message;
            toast.classList.add('show');

            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // إظهار إشعار الترحيب عند التحميل
        window.addEventListener('load', function () {
            setTimeout(() => {
                showNotification('مرحبًا بك! نأمل أن تجد تجربتك معنا ممتعة ومفيدة');
            }, 1000);
        });

        // الدردشة المباشرة
        document.querySelector('.live-chat').addEventListener('click', function () {
            showNotification('سيتم فتح نافذة الدردشة قريبًا');
        });

        // تفعيل الخطوات التفاعلية
        document.querySelectorAll('.step').forEach(step => {
            step.addEventListener('click', function () {
                const stepId = this.getAttribute('data-step');

                // إزالة النشاط من جميع الخطوات
                document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
                document.querySelectorAll('.step-content').forEach(c => c.classList.remove('active'));

                // تفعيل الخطوة المحددة
                this.classList.add('active');
                document.getElementById(`step-${stepId}`).classList.add('active');

                // تحديث مؤشر التقدم
                updateProgressSteps(stepId);
            });
        });

        // تحديث مؤشر التقدم
        function updateProgressSteps(currentStep) {
            document.querySelectorAll('.progress-step').forEach(step => {
                const stepNum = parseInt(step.getAttribute('data-step'));
                step.classList.remove('active', 'completed');

                if (stepNum < currentStep) {
                    step.classList.add('completed');
                } else if (stepNum == currentStep) {
                    step.classList.add('active');
                }
            });
        }

        // إغلاق محتوى الخطوة
        document.querySelectorAll('.close-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                this.closest('.step-content').classList.remove('active');
                document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
            });
        });

        // تفعيل المركز
        document.querySelector('.process-center').addEventListener('click', function () {
            showNotification('اختر خطوة لمعرفة تفاصيلها');
        });

        // تفعيل سلايدر شركاء النجاح
        const partnersSlider = document.getElementById('partnersSlider');
        const prevBtn = document.getElementById('prevPartner');
        const nextBtn = document.getElementById('nextPartner');
        const cardWidth = 280; // عرض كل بطاقة شريك
        let scrollPosition = 0;

        prevBtn.addEventListener('click', () => {
            scrollPosition = Math.max(scrollPosition - cardWidth, 0);
            partnersSlider.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
        });

        nextBtn.addEventListener('click', () => {
            const maxScroll = partnersSlider.scrollWidth - partnersSlider.clientWidth;
            scrollPosition = Math.min(scrollPosition + cardWidth, maxScroll);
            partnersSlider.scrollTo({
                left: scrollPosition,
                behavior: 'smooth'
            });
        });

        // تفعيل إرسال نموذج التعليقات
        document.querySelector('.feedback-form form').addEventListener('submit', function (e) {
            e.preventDefault();

            // جمع بيانات النموذج
            const formData = {
                name: this.querySelector('input[type="text"]').value,
                email: this.querySelector('input[type="email"]').value,
                type: this.querySelector('select').value,
                comment: this.querySelector('textarea').value
            };

            // عرض رسالة نجاح
            showNotification('شكراً على ملاحظاتك! سنقوم بمراجعتها قريباً.');

            // إعادة تعيين النموذج
            this.reset();
        });

        // رسالة ترحيبية عند التحميل
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function () {
                document.getElementById('welcomeModal').classList.add('active');
            }, 1500);

            // إغلاق الرسالة الترحيبية
            document.getElementById('closeModal').addEventListener('click', function () {
                document.getElementById('welcomeModal').classList.remove('active');
            });

            document.getElementById('startJourney').addEventListener('click', function () {
                document.getElementById('welcomeModal').classList.remove('active');
                // توجيه المستخدم إلى قسم الخطوات
                document.querySelector('.all').scrollIntoView({ behavior: 'smooth' });
            });
        });

        // إغلاق الرسالة الترحيبية عند النقر خارجها
        window.addEventListener('click', function (e) {
            const welcomeModal = document.getElementById('welcomeModal');
            if (e.target === welcomeModal) {
                welcomeModal.classList.remove('active');
            }
        });
    </script>
</body>

</html>
