<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('logo.png') }}">
    <title>منصة تراخيص البناء الإلكترونية - وزارة النقل والأشغال العامة - اليمن</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap"rel="stylesheet">
    <!-- Remix Icon CDN -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <!-- إضافة مكتبة SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- مكتبات التصدير -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docx@7.8.2/build/index.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
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
        /* .nav-icon {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.90rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            padding: 5px 2px;
        } */

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
/*
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
        /* .live-chat:hover {
            transform: translateY(-5px);
            background: var(--accent-dark);
        }

        .live-chat i {
            margin-left: 10px;
        } */ */

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

            .step1 {
                margin: 1.5rem 65px 1.5rem 0;
            }

            .step2 {
                margin: 1.5rem 0px 1.5rem 65px;
            }

            .step3 {
                margin: 1.5rem -50px 1.5rem 0;
            }

            .step4 {
                margin: 1.5rem 0px 1.5rem -50px;
            }

            .step5 {
                margin: 1.5rem 65px 1.5rem 0;
            }

            .step6 {
                margin: 1.5rem 0px 1.5rem 65px;
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
    <style>
          .countent-sidebar {
            height: 90vh;
            width: 100%;
            position: relative;
            display: flex;
            justify-content: space-evenly;
        }

        .countent {
            height: 90vh;
            width: 98%;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 20px;
            margin-top: 2px;
            margin-bottom: 20px;
            margin-left: 10px;
            margin-right: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow-y: auto;
            overflow-x: hidden;
            transition: all 0.3s ease;
            font-family: 'Cairo', Tahoma, sans-serif;
            color: #333;
            line-height: 1.7;
        }


        #loader {
            display: none;
            color: gray;
        }

        #Jax {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;

            height: 100%;
        }
    </style>
       <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery من شبكة Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body>
    <!-- رسالة ترحيبية -->
    <div class="welcome-modal" id="welcomeModal">
        <span class="modal-close" id="closeModal">&times;</span>
        <h3 class="text-center mb-4">مرحبًا بك في منصة تراخيص البناء الإلكترونية</h3>
        <p class="text-center">نقدم لك حلولاً إلكترونية متكاملة لتراخيص البناء في اليمن. ابدأ رحلتك الآن بخطوات سهلة
            وسريعة.</p>
        <div class="text-center mt-4">
            <button class="btn btn-primary btn-lg px-5" id="startJourney">ابدأ الرحلة</button>
        </div>
    </div>

    <!-- شاشة البحث المتقدم -->
    <div class="search-overlay" id="searchOverlay">
        <div class="search-container">
            <div class="search-header">
                <h2>البحث المتقدم</h2>
                <button class="close-search" id="closeSearch">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="search-body">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="ابحث عن خدمات، تراخيص، استعلامات...">
                </div>

                <div class="search-advanced">
                    <button class="btn">
                        <i class="fas fa-file-contract me-2"></i> تراخيص البناء
                    </button>
                    <button class="btn">
                        <i class="fas fa-building me-2"></i> المشاريع التجارية
                    </button>
                    <button class="btn">
                        <i class="fas fa-home me-2"></i> المباني السكنية
                    </button>
                    <button class="btn">
                        <i class="fas fa-industry me-2"></i> المنشآت الصناعية
                    </button>
                </div>

                <div class="search-suggestions">
                    <h3>افتراحات بحث شائعة</h3>
                    <div class="suggestion-list">
                        <div class="suggestion-item">
                            <strong>الرخص الإشكالية</strong> - حلول للتراخيص المعقدة
                        </div>
                        <div class="suggestion-item">
                            <strong>حدد المواجد الإلكترونية</strong> - تحديد المواقع الجغرافية
                        </div>
                        <div class="suggestion-item">
                            <strong>خدمات الدعم والحياة</strong> - دعم فني وخدمات مجتمعية
                        </div>
                        <div class="suggestion-item">
                            <strong>نظام عقبات العملاء</strong> - حل مشاكل العملاء
                        </div>
                        <div class="suggestion-item">
                            <strong>خدمات تسجيل أعمال البياناتينية</strong> - تسجيل الأعمال والمشاريع
                        </div>
                        <div class="suggestion-item">
                            <strong>الصف الثاني</strong> - خدمات التصنيف والتراخيص
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- شريط التنقل المدمج والمحسن -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('logo.png') }}" alt="شعار الوزارة">
                <span>منصة </span><span class="d-none d-lg-block" style="filter: invert(1);"><img src="{{ Vite::asset('resources/assets/images/nameLogo.png') }}" alt="الشعار"></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a  href="#" class="nav-link active ajax-link"
                                data-page="main.Regulations.index">الرئيسية</a>
                    </li>

                    {{-- <li class="nav-item"><a  href="#" class="nav-link active ajax-link" data-page="main.services">الرئيسية</a></li> --}}
                    <!-- القائمة المنسدلة الجديدة للخدمات -->
                    <li class="nav-item dropdown mega-menu">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            الخدمات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <div class="mega-menu-content">
                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">التراخيص السكنية</h5>
                                    <ul class="mega-menu-list">
                                        <li class="nav-item"><a  href="#" >تراخيص البناء السكني <i class="fas fa-home"></i></a></li>
                                        <li class="nav-item"><a  href="#" >تراخيص التوسعات السكنية <i class="fas fa-expand"></i></a></li>
                                        <li class="nav-item"><a  href="#" >تراخيص الترميم <i class="fas fa-tools"></i></a></li>
                                        <li class="nav-item"><a  href="#" >تراخيص الأسوار والحدائق <i class="fas fa-tree"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">التراخيص التجارية</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#">تراخيص البناء التجاري <i class="fas fa-building"></i></a></li>
                                        <li><a href="#">تراخيص المراكز التجارية <i class="fas fa-shopping-cart"></i></a>
                                        </li>
                                        <li><a href="#">تراخيص المطاعم والمقاهي <i class="fas fa-utensils"></i></a></li>
                                        <li><a href="#">تراخيص الفنادق <i class="fas fa-hotel"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">التراخيص الصناعية</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#">تراخيص البناء الصناعي <i class="fas fa-industry"></i></a></li>
                                        <li><a href="#">تراخيص المستودعات <i class="fas fa-warehouse"></i></a></li>
                                        <li><a href="#">تراخيص الورش <i class="fas fa-tools"></i></a></li>
                                        <li><a href="#">تراخيص المصانع <i class="fas fa-industry"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">خدمات إضافية</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#">تعديل التراخيص <i class="fas fa-edit"></i></a></li>
                                        <li><a href="#">تجديد التراخيص <i class="fas fa-sync-alt"></i></a></li>
                                        <li><a href="#">استخراج الوثائق <i class="fas fa-file-download"></i></a></li>
                                        <li><a href="#">استشارات البناء <i class="fas fa-comments"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    {{-- <!-- القائمة المنسدلة الجديدة للاستعلامات -->
                    <li class="nav-item dropdown mega-menu">
                        <a class="nav-link dropdown-toggle" href="#" id="inquiriesDropdown" role="button"
                            data-bs-toggle="dropdown">
                            الاستعلامات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="inquiriesDropdown">
                            <div class="mega-menu-content">
                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">استعلامات التراخيص</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#" class="ajax-link" data-page="main.License_inquiries">استعلام عن طلب <i class="fas fa-search"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.License_inquiries">استعلام عن رخصة <i class="fas fa-file-alt"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.License_inquiries">استعلام عن موظف <i class="fas fa-user-tie"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.License_inquiries">استعلام عن مشروع <i class="fas fa-project-diagram"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">استعلامات الرسوم</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#" class="ajax-link" data-page="main.fee_inquiries">استعلام عن رسوم <i class="fas fa-money-bill-wave"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.fee_inquiries">استعلام عن غرامات <i class="fas fa-exclamation-circle"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.fee_inquiries">استعلام عن فواتير <i class="fas fa-file-invoice"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.fee_inquiries">استعلام عن مدفوعات <i class="fas fa-receipt"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">استعلامات المواقع</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#" class="ajax-link" data-page="main.site_inquiries">استعلام عن مخطط <i class="fas fa-map"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.site_inquiries">استعلام عن منطقة <i class="fas fa-map-marked-alt"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.site_inquiries">استعلام عن حدود <i class="fas fa-draw-polygon"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.site_inquiries">استعلام عن تصنيف <i class="fas fa-layer-group"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">تقارير إحصائية</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#" class="ajax-link" data-page="main.statistical_report">تقارير التراخيص <i class="fas fa-chart-bar"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.statistical_report">تقارير الإيرادات <i class="fas fa-chart-line"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.statistical_report">تقارير الإنجاز <i class="fas fa-chart-pie"></i></a></li>
                                        <li><a href="#" class="ajax-link" data-page="main.statistical_report">تقارير المتابعة <i class="fas fa-chart-area"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li> --}}

                    <!-- القائمة المنسدلة الجديدة للمنصات -->
                    <li class="nav-item dropdown mega-menu">
                        <a class="nav-link dropdown-toggle" href="#" id="platformsDropdown" role="button"
                            data-bs-toggle="dropdown">
                            المنصات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="platformsDropdown">
                            <div class="mega-menu-content">
                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">منصات الخدمات</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#">منصة الشكاوى <i class="fas fa-comment-dots"></i></a></li>
                                        <li><a href="#">منصة الاستشارات <i class="fas fa-headset"></i></a></li>
                                        <li><a href="#">منصة التدريب <i class="fas fa-graduation-cap"></i></a></li>
                                        <li><a href="#">منصة التراخيص <i class="fas fa-file-contract"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">منصات الدفع</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#">منصة الدفع الإلكتروني <i class="fas fa-credit-card"></i></a></li>
                                        <li><a href="#">منصة الفواتير <i class="fas fa-file-invoice-dollar"></i></a></li>
                                        <li><a href="#">منصة التحصيل <i class="fas fa-money-check"></i></a></li>
                                        <li><a href="#">منصة المصروفات <i class="fas fa-cash-register"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">منصات المتابعة</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#">منصة المتابعة الميدانية <i class="fas fa-hard-hat"></i></a></li>
                                        <li><a href="#">منصة الجودة <i class="fas fa-clipboard-check"></i></a></li>
                                        <li><a href="#">منصة التوثيق <i class="fas fa-folder-open"></i></a></li>
                                        <li><a href="#">منصة التقييم <i class="fas fa-star"></i></a></li>
                                    </ul>
                                </div>

                                <div class="mega-menu-column">
                                    <h5 class="mega-menu-title">منصات البيانات</h5>
                                    <ul class="mega-menu-list">
                                        <li><a href="#">منصة البيانات المفتوحة <i class="fas fa-database"></i></a></li>
                                        <li><a href="#">منصة الإحصاءات <i class="fas fa-chart-bar"></i></a></li>
                                        <li><a href="#">منصة المؤشرات <i class="fas fa-chart-line"></i></a></li>
                                        <li><a href="#">منصة التقارير <i class="fas fa-file-alt"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">تواصل معنا</a>
                    </li>
                </ul>

                <!-- الأيقونات بجانب القوائم المنسدلة -->
                <div class="nav-icons-container">
                    <div class="dropdown-container">
                        <div class="nav-icon" id="language-toggle">
                            <i class="fas fa-globe"></i>
                            <span>English</span>
                        </div>
                        <div class="language-dropdown" id="language-dropdown">
                            <div class="settings-item" data-lang="ar">
                                <i class="fas fa-language"></i>
                                <span>العربية</span>
                            </div>
                            <div class="settings-item" data-lang="en">
                                <i class="fas fa-language"></i>
                                <span>English</span>
                            </div>
                        </div>
                    </div>

                    <div class="nav-icon" id="searchToggle">
                        <i class="fas fa-search"></i>
                        <span>بحث</span>
                    </div>



                    @if(Auth::guard('beneficiary')->check())
                        {{-- زر الملف الشخصي --}}
                        <li>
                            <a href="{{ route('beneficiary.amr') }}" class="nav-link">
                                <div class="nav-icon">
                                    <i class="fas fa-man"></i>
                                    <span>الملف الشخصي</span>
                                </div>
                            </a>
                        </li>
                        {{-- زر تسجيل الخروج --}}
                        <div class="nav-icon">
                            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="nav-link" style="background:none;border:none;padding:0;color:inherit;">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>تسجيل الخروج</span>
                                </button>
                            </form>
                        </div>
                    @else
                        {{-- زر تسجيل الدخول --}}
                        <div class="nav-icon">
                            <a href="{{ route('beneficiary.login') }}" class="nav-link">
                                <i class="fas fa-user"></i>
                                <span>تسجيل الدخول</span>
                                <span class="badge">3</span>
                            </a>
                        </div>
                    @endif

                    <div class="dropdown-container">
                        <div class="nav-icon position-relative" id="settings-toggle">
                            <i class="fas fa-cog"></i>
                            <span>الإعدادات</span>
                        </div>
                        <div class="settings-dropdown" id="settings-dropdown">
                            <h6 class="mb-4 text-center fw-bold">أدوات إمكانية الوصول</h6>

                            <!-- أزرار التحكم بحجم الخط -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="settings-item" id="decrease-font">
                                    <i class="fas fa-minus-circle"></i>
                                    <span>تصغير الخط</span>
                                </div>

                                <div class="settings-item" id="reset-font">
                                    <i class="fas fa-font"></i>
                                    <span>الحجم الافتراضي</span>
                                </div>

                                <div class="settings-item" id="increase-font">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>تكبير الخط</span>
                                </div>
                            </div>

                            <!-- إعدادات التباين والوضع المظلم -->
                            <div class="settings-item" id="contrast-toggle">
                                <i class="fas fa-adjust"></i>
                                <span>وضع التباين العالي</span>
                            </div>

                            <div class="settings-item" id="dark-mode-toggle">
                                <i class="fas fa-moon"></i>
                                <span>الوضع المظلم</span>
                            </div>

                            <div class="settings-item" id="light-mode-toggle">
                                <i class="fas fa-sun"></i>
                                <span>الوضع الفاتح</span>
                            </div>

                            <!-- إعدادات الطباعة والأوامر الصوتية -->
                            <div class="settings-item" id="print-toggle">
                                <i class="fas fa-print"></i>
                                <span>الطباعة</span>
                            </div>

                            <div class="settings-item" id="voice-toggle">
                                <i class="fas fa-microphone"></i>
                                <span>الأوامر الصوتية</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    {{-- <div class="countent-sidebar"> --}}
        {{-- @include('layouts.partials.sidebar') --}}

        <div id="loader">🔄 جاري التحميل...</div>
        <div class="countent" id="Jax">

            📌 سيتم تحميل المحتوى هنا






        </div>
    {{-- </div> --}}

 @include('platform_user.footer')


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('js/ajax.js') }}"></script>


     @vite(['resources/js/platform_user/Ajax.js'])
     @vite(['resources/js/platform_user/js/Ajax.js']);


    <script>
        // تفعيل التنقل السلس
        document.querySelectorAll('a[href="#"]').forEach(anchor => {
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

        // // الدردشة المباشرة
        // document.querySelector('.live-chat').addEventListener('click', function () {
        //     showNotification('سيتم فتح نافذة الدردشة قريبًا');
        // });

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
     <script>


    $(document).ready(function() {
        // أول ما تفتح الصفحة → يتم تحميل صفحة افتراضية
        $("#platform-content").load("{{ route('ajax.page.platform', 'home') }}");

        // زر تسجيل الدخول
        $("#btn-login").on("click", function() {
            window.location.href = "{{ route('beneficiary.login') }}";
        });

        // زر الصفحة الرئيسية (AJAX)
        $("#btn-home").on("click", function() {
            $("#platform-content").load("{{ route('ajax.page.platform', 'platform_user.main.Regulations.index') }}");
        });
    });
    </script>


    <script>
    $(document).ready(function() {
        // متغير يجي من السيرفر يحدد إذا المستفيد داخل أو لا
        let isBeneficiaryLoggedIn = {{ Auth::guard('beneficiary')->check() ? 'true' : 'false' }};

        // التعامل مع الروابط AJAX
        $(document).on("click", ".ajax-link", function(e) {
            e.preventDefault();
            let page = $(this).data("page");

            // تحقق خاص لرابط تقديم طلب جديد فقط
            if (page === "main.Breadcrumb_Receptionist") {
                if (!isBeneficiaryLoggedIn) {
                    // لو ما سجل دخول → يحوله لتسجيل الدخول
                    window.location.href = "{{ route('beneficiary.login') }}";
                    return;
                }
                // لو مسجل دخول → يحمل الصفحة AJAX
                $("#platform-content").load("/ajax-page-platform/" + page);
                return;
            }

            // باقي الروابط تعمل بدون تحقق
            $("#platform-content").load("/ajax-page-platform/" + page);
        });
    });
    </script>

</body>

</html>
