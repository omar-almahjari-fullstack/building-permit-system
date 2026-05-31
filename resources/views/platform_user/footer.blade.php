
    <style>

        /* تذييل الصفحة */
        .footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 60px 0 20px;
            border-radius: 20px 20px 0 0;
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 12px;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--accent);
        }

        .footer-links a {
            display: block;
            color: #aaa;
            text-decoration: none;
            margin-bottom: 10px;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .footer-links a:hover {
            color: white;
            padding-right: 8px;
        }

        .contact-info {
            margin-bottom: 12px;
            display: flex;
            font-size: 0.9rem;
        }

        .contact-icon {
            width: 35px;
            height: 35px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 12px;
            flex-shrink: 0;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            margin-left: 8px;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            color: #aaa;
            font-size: 0.8rem;
        }

        /* قسم الجوال  */
        .app-section {
            padding: 100px 0;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            margin: 40px 10px 30px 10px;
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
    </style>

    <!-- قسم التطبيق الجوال -->
    <section class="app-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="app-content">
                        <h2 class="display-5 fw-bold mb-4">حمل تطبيقنا الجوال الآن</h2>
                        <p class="fs-5 mb-4 opacity-85">احصل على جميع خدمات تراخيص البناء في جيبك. التطبيق متاح
                            لكل من أجهزة أندرويد وآيفون.</p>

                        <div class="d-flex flex-wrap gap-3">
                            <a href="#" class="btn btn-dark btn-lg d-flex align-items-center py-3 px-4">
                                <i class="fab fa-apple fa-2x me-3"></i>
                                <div>
                                    <div class="small">Download on the</div>
                                    <div class="fw-bold fs-5">App Store</div>
                                </div>
                            </a>

                            <a href="#" class="btn btn-dark btn-lg d-flex align-items-center py-3 px-4">
                                <i class="fab fa-google-play fa-2x me-3"></i>
                                <div>
                                    <div class="small">Get it on</div>
                                    <div class="fw-bold fs-5">Google Play</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="app-image">
                        <img src="https://via.placeholder.com/300x500?text=Mobile+App"
                            alt="تطبيق الجوال لمنصة تراخيص البناء" loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- تذييل الصفحة -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h3 class="footer-title">عن المنصة</h3>
                    <p>منصة تراخيص البناء الإلكترونية هي مبادرة من وزارة النقل والأشغال العامة لتحويل إجراءات تراخيص
                        البناء إلى خدمات إلكترونية متكاملة.</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 mb-5 mb-md-0">
                    <h3 class="footer-title">روابط سريعة</h3>
                    <div class="footer-links">
                        <a href="#">الرئيسية</a>
                        <a href="#">الخدمات</a>
                        <a href="#">الاستعلامات</a>
                        <a href="#">المنصات</a>
                        <a href="#">تواصل معنا</a>
                        <a href="#">التطبيق الجوال</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 mb-5 mb-md-0">
                    <h3 class="footer-title">معلومات هامة</h3>
                    <div class="footer-links">
                        <a href="#">الأسئلة الشائعة</a>
                        <a href="#">شركاء النجاح</a>
                        <a href="#">الأخبار والتحديثات</a>
                        <a href="#">المركز الإعلامي</a>
                        <a href="#">اللوائح والأنظمة</a>
                        <a href="#">سياسة الخصوصية</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h3 class="footer-title">تواصل معنا</h3>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>صنعاء، شارع الزبيري، مبنى الوزارة</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>+967 1 123 4567</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>info@building-license.gov.ye</div>
                    </div>
                    <div class="contact-info">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>الأحد - الخميس: 8 صباحاً - 3 مساءً</div>
                    </div>
                </div>
            </div>

            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-md-start text-center mb-3 mb-md-0">
                        © 2023 وزارة النقل والأشغال العامة - الجمهورية اليمنية. جميع الحقوق محفوظة.
                    </div>
                    <div class="col-md-6 text-md-end text-center">
                        <a href="#" class="text-white me-3">سياسة الخصوصية</a>
                        <a href="#" class="text-white">شروط الاستخدام</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- عناصر إضافية -->
    <a href="#" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

    {{-- <div class="live-chat">
        <i class="fas fa-comments"></i>
        <span>الدردشة المباشرة</span>
    </div> --}}

    <!-- إشعار الأوامر الصوتية -->
    <div class="voice-command-notification" id="voiceCommandNotification">
        <i class="fas fa-microphone me-2"></i>
        <span id="voiceStatus">جاري الاستماع للأوامر الصوتية...</span>
    </div>

