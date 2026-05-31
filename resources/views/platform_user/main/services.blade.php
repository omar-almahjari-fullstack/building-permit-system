
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

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: var(--secondary);
            color: #333;
            overflow-x: hidden;
            font-size: var(--text-size);
            line-height: 1.7;
            padding-top: 20px;
            min-height: 100vh;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        /* شريط التنقل - من الملف الأصلي */
        /* .navbar {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            padding: -10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            transition: var(--transition);
            border-radius: 0 0 15px 15px;
            margin: -20px 15px 0px 15px;
            transition: transform 0.4s ease;
        } */

        /* تصميم الصفحات الجديد */
        .service-hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 20px;
            padding: 60px 30px;
            margin: 40px 0;
            position: relative;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .service-hero::before {
            content: '';
            position: absolute;
            top: -100px;
            right: -100px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
        }

        .service-hero::after {
            content: '';
            position: absolute;
            bottom: -150px;
            left: -150px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
        }

        .service-hero h1 {
            font-weight: 800;
            font-size: 2.5rem;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .service-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
            max-width: 800px;
        }

        .service-icon {
            font-size: 4rem;
            color: var(--accent);
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .service-section {
            background: white;
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .service-section h2 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--accent);
            position: relative;
        }

        .service-section h2::after {
            content: '';
            position: absolute;
            bottom: -3px;
            right: 0;
            width: 50px;
            height: 3px;
            background: var(--primary);
        }

        .requirements-list, .steps-list {
            list-style: none;
            padding: 0;
        }

        .requirements-list li, .steps-list li {
            padding: 15px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: flex-start;
        }

        .requirements-list li:last-child, .steps-list li:last-child {
            border-bottom: none;
        }

        .requirements-list i, .steps-list i {
            color: var(--accent);
            font-size: 1.2rem;
            min-width: 30px;
            margin-left: 10px;
        }

        .step-number {
            background: var(--primary);
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-left: 15px;
            flex-shrink: 0;
        }

        .service-features {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }

        .feature-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 25px;
            transition: var(--transition);
            border: 1px solid rgba(0, 0, 0, 0.05);
            position: relative;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-light);
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 5px;
            background: var(--accent);
        }

        .feature-card i {
            color: var(--accent);
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #555;
        }

        .service-form {
            background: linear-gradient(135deg, #f0f4f9 0%, #e2e8f0 100%);
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h3 {
            color: var(--primary);
            font-weight: 700;
        }

        .form-header p {
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-control {
            padding: 15px;
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.3);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--primary);
        }

        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 15px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.5);
        }

        .upload-area:hover {
            border-color: var(--accent);
            background: rgba(212, 175, 55, 0.05);
        }

        .upload-area i {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .upload-area:hover i {
            color: var(--accent);
        }

        .btn-submit {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: var(--transition);
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(26, 58, 108, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(26, 58, 108, 0.4);
        }

        .service-faq {
            margin-top: 60px;
        }

        .faq-item {
            margin-bottom: 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            padding: 20px 25px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: var(--transition);
        }

        .faq-question:hover {
            background: linear-gradient(to right, var(--primary-dark), var(--primary));
        }

        .faq-answer {
            background: white;
            padding: 0 25px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .faq-answer.show {
            padding: 25px;
            max-height: 1000px;
        }

        .contact-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-top: 40px;
            text-align: center;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .contact-card i {
            font-size: 3rem;
            color: var(--accent);
            margin-bottom: 20px;
        }

        .contact-card h3 {
            color: var(--primary);
            font-weight: 700;
        }

        .contact-card p {
            color: #666;
            margin-bottom: 20px;
        }

        .contact-card a {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 10px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .contact-card a:hover {
            background: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26, 58, 108, 0.3);
        }
        
        /* التحسينات الجديدة */
        .progress-tracker {
            display: flex;
            justify-content: space-between;
            margin: 40px 0;
            position: relative;
        }
        
        .progress-tracker::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 4px;
            background: #e9ecef;
            z-index: 1;
        }
        
        .progress-step {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 20%;
        }
        
        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
            transition: var(--transition);
        }
        
        .progress-step.active .step-circle {
            background: var(--primary);
            color: white;
            box-shadow: 0 5px 15px rgba(26, 58, 108, 0.3);
        }
        
        .progress-step.completed .step-circle {
            background: var(--success);
            color: white;
        }
        
        .step-label {
            font-size: 0.9rem;
            color: #666;
            font-weight: 500;
        }
        
        .progress-step.active .step-label {
            color: var(--primary);
            font-weight: 700;
        }
        
        .rating-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-top: 40px;
        }
        
        .rating-stars {
            display: flex;
            margin: 20px 0;
        }
        
        .rating-star {
            font-size: 2.5rem;
            color: #ddd;
            cursor: pointer;
            margin: 0 5px;
            transition: var(--transition);
        }
        
        .rating-star:hover,
        .rating-star.active {
            color: var(--accent);
        }
        
        .faq-integrated {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #eee;
        }
        
        .faq-integrated .faq-question {
            background: transparent;
            color: var(--primary);
            padding: 10px 0;
            font-weight: 600;
        }
        
        .faq-integrated .faq-question i {
            color: var(--primary);
            font-size: 1.2rem;
        }
        
        .faq-integrated .faq-answer {
            background: transparent;
            padding: 0;
        }
        
        .calculator {
            background: linear-gradient(135deg, #f0f4f9 0%, #e2e8f0 100%);
            border-radius: 15px;
            padding: 20px;
            margin-top: 25px;
        }
        
        .calculator-result {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            font-weight: 700;
            font-size: 1.2rem;
            text-align: center;
            color: var(--primary);
            border: 2px dashed var(--accent);
        }
        
        .download-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: var(--accent);
            color: white;
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .timeline {
            position: relative;
            padding: 20px 0;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            right: 20px;
            width: 2px;
            background: var(--primary);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 30px;
            padding-right: 50px;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            top: 5px;
            right: 11px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--accent);
            border: 4px solid var(--primary);
        }
        
        .timeline-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }
        
        .notification-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            border-left: 4px solid var(--accent);
        }
        
        .notification-card i {
            font-size: 1.5rem;
            color: var(--accent);
            margin-left: 15px;
        }
        
        .notification-content {
            flex-grow: 1;
        }
        
        .notification-date {
            color: #666;
            font-size: 0.8rem;
        }

        /* التصميم المتجاوب */
        @media (max-width: 992px) {
            .service-hero h1 {
                font-size: 2rem;
            }
            
            .service-hero p {
                font-size: 1rem;
            }
            
            .service-section {
                padding: 30px 20px;
            }
            
            .service-features {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .progress-tracker {
                flex-wrap: wrap;
            }
            
            .progress-step {
                width: 50%;
                margin-bottom: 30px;
            }
        }

        @media (max-width: 768px) {
            .service-hero {
                padding: 40px 20px;
            }
            
            .service-form {
                padding: 30px 20px;
            }
        }

        @media (max-width: 576px) {
            .service-hero h1 {
                font-size: 1.7rem;
            }
            
            .service-icon {
                font-size: 3rem;
            }
            
            .progress-step {
                width: 100%;
            }
        }
    </style>

    <div class="container">
        <!-- مؤشر التقدم -->
        <div class="progress-tracker">
            <div class="progress-step completed">
                <div class="step-circle"><i class="fas fa-check"></i></div>
                <div class="step-label">اختيار الخدمة</div>
            </div>
            <div class="progress-step active">
                <div class="step-circle">2</div>
                <div class="step-label">المتطلبات</div>
            </div>
            <div class="progress-step">
                <div class="step-circle">3</div>
                <div class="step-label">التقديم</div>
            </div>
            <div class="progress-step">
                <div class="step-circle">4</div>
                <div class="step-label">المراجعة</div>
            </div>
            <div class="progress-step">
                <div class="step-circle">5</div>
                <div class="step-label">الانتهاء</div>
            </div>
        </div>

        <!-- قسم البطل للخدمة -->
        <div class="service-hero text-center">
            <i class="fas fa-home service-icon"></i>
            <h1>تراخيص البناء السكني</h1>
            <p class="mx-auto">
                خدمة تراخيص البناء السكني تمكن المواطنين من الحصول على الموافقات اللازمة لبناء أو توسعة أو ترميم المساكن الخاصة بهم وفقاً للأنظمة والقوانين المعمول بها في الجمهورية اليمنية.
            </p>
            
            <!-- تقييم الخدمة -->
            <div class="rating-container mt-4">
                <h4>تقييم الخدمة</h4>
                <div class="rating-stars">
                    <div class="rating-star"><i class="far fa-star"></i></div>
                    <div class="rating-star"><i class="far fa-star"></i></div>
                    <div class="rating-star"><i class="far fa-star"></i></div>
                    <div class="rating-star"><i class="far fa-star"></i></div>
                    <div class="rating-star"><i class="far fa-star"></i></div>
                </div>
                <p>متوسط التقييم: 4.7 من 5 (1,245 تقييم)</p>
            </div>
        </div>

        <!-- معلومات أساسية عن الخدمة -->
        <div class="service-section">
            <h2><i class="fas fa-info-circle me-2"></i> معلومات عامة عن الخدمة</h2>
            <div class="row">
                <div class="col-md-6">
                    <p>
                        تتيح وزارة النقل والأشغال العامة خدمة تراخيص البناء السكني للمواطنين لضمان تنفيذ مشاريع البناء وفق المعايير الهندسية والإنشائية المعتمدة. تهدف هذه الخدمة إلى تنظيم عملية البناء والحفاظ على السلامة العامة والجمال الحضري.
                    </p>
                    <p>
                        يتم منح الرخصة بعد دراسة المخططات والتصاميم المقدمة والتأكد من مطابقتها للأنظمة واللوائح المعمول بها. كما يتم مراعاة شروط السلامة والبيئة والمتطلبات الفنية في جميع مراحل البناء.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="bg-light p-4 rounded-3 h-100">
                        <h5 class="text-primary fw-bold"><i class="fas fa-clock me-2"></i> مدة تنفيذ الخدمة</h5>
                        <p class="mb-3">10 أيام عمل كحد أقصى</p>
                        
                        <h5 class="text-primary fw-bold"><i class="fas fa-money-bill-wave me-2"></i> رسوم الخدمة</h5>
                        <p class="mb-3">تختلف حسب مساحة الأرض ونوع البناء</p>
                        
                        <h5 class="text-primary fw-bold"><i class="fas fa-file-alt me-2"></i> المستندات المطلوبة</h5>
                        <p>صك الملكية + الهوية الشخصية + المخططات المعتمدة</p>
                    </div>
                </div>
            </div>
            
            <!-- الأسئلة المدمجة -->
            <div class="faq-integrated">
                <div class="faq-item">
                    <div class="faq-question">
                        <span>ما هي مدة صلاحية رخصة البناء؟ <i class="fas fa-chevron-down ms-2"></i></span>
                    </div>
                    <div class="faq-answer">
                        <p>رخصة البناء سارية لمدة سنة واحدة من تاريخ إصدارها. يمكن تجديدها لمدة سنة إضافية في حال لم يتم البدء في البناء خلال المدة المحددة.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- متطلبات الخدمة -->
        <div class="service-section">
            <h2><i class="fas fa-clipboard-list me-2"></i> متطلبات الخدمة</h2>
            <ul class="requirements-list">
                <li>
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <h5 class="fw-bold">صك الملكية</h5>
                        <p>صك ملكية الأرض صادر من الجهات المختصة ومسجل في السجل العقاري</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <h5 class="fw-bold">الهوية الشخصية</h5>
                        <p>صورة من الهوية الشخصية لمالك الأرض أو من ينوب عنه قانونياً</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <h5 class="fw-bold">المخططات المعتمدة</h5>
                        <p>مخططات هندسية معتمدة من مهندس مرخص تتضمن جميع تفاصيل البناء</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <h5 class="fw-bold">موافقات الجهات المعنية</h5>
                        <p>موافقة الدفاع المدني والجهات الأخرى ذات العلاقة حسب طبيعة المشروع</p>
                    </div>
                </li>
                <li>
                    <i class="fas fa-check-circle"></i>
                    <div>
                        <h5 class="fw-bold">الرسوم المالية</h5>
                        <p>سداد الرسوم المقررة حسب مساحة الأرض ونوعية البناء</p>
                    </div>
                </li>
            </ul>
            
            <!-- حاسبة الرسوم -->
            <div class="calculator">
                <h5><i class="fas fa-calculator me-2"></i> حاسبة الرسوم</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">مساحة الأرض (م²)</label>
                            <input type="number" class="form-control" id="landArea" placeholder="أدخل مساحة الأرض">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">عدد الطوابق</label>
                            <select class="form-control" id="floors">
                                <option value="1">طابق واحد</option>
                                <option value="2">طابقين</option>
                                <option value="3">ثلاثة طوابق</option>
                                <option value="4">أكثر من ثلاثة</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="calculator-result" id="feeResult">
                    الرسوم المقدرة: يرجى إدخال البيانات
                </div>
            </div>
            
            <!-- نماذج قابلة للتنزيل -->
            <div class="mt-4">
                <h5><i class="fas fa-download me-2"></i> النماذج القابلة للتنزيل</h5>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="#" class="btn btn-outline-primary">
                        <i class="fas fa-file-pdf me-2"></i> نموذج طلب ترخيص
                    </a>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="fas fa-file-pdf me-2"></i> قائمة المتطلبات
                    </a>
                    <a href="#" class="btn btn-outline-primary">
                        <i class="fas fa-file-pdf me-2"></i> نموذج تفويض
                    </a>
                </div>
            </div>
        </div>

        <!-- خطوات الحصول على الخدمة -->
        <div class="service-section">
            <h2><i class="fas fa-footsteps me-2"></i> خطوات الحصول على الخدمة</h2>
            <ul class="steps-list">
                <li>
                    <div class="step-number">1</div>
                    <div>
                        <h5 class="fw-bold">تقديم الطلب</h5>
                        <p>تقديم الطلب عبر المنصة الإلكترونية مع رفع جميع المستندات المطلوبة</p>
                    </div>
                </li>
                <li>
                    <div class="step-number">2</div>
                    <div>
                        <h5 class="fw-bold">المراجعة الفنية</h5>
                        <p>مراجعة الطلب والمستندات من قبل الفنيين المختصين في الوزارة</p>
                    </div>
                </li>
                <li>
                    <div class="step-number">3</div>
                    <div>
                        <h5 class="fw-bold">الموافقة المبدئية</h5>
                        <p>إصدار الموافقة المبدئية بعد التأكد من استيفاء جميع المتطلبات</p>
                    </div>
                </li>
                <li>
                    <div class="step-number">4</div>
                    <div>
                        <h5 class="fw-bold">سداد الرسوم</h5>
                        <p>سداد الرسوم المقررة عبر القنوات الإلكترونية المتاحة</p>
                    </div>
                </li>
                <li>
                    <div class="step-number">5</div>
                    <div>
                        <h5 class="fw-bold">استلام الرخصة</h5>
                        <p>استلام رخصة البناء إلكترونياً أو من خلال المركز الخدمي</p>
                    </div>
                </li>
            </ul>
            
            <!-- المخطط الزمني -->
            <div class="timeline mt-5">
                <h5 class="mb-4"><i class="fas fa-history me-2"></i> المدة المتوقعة لكل مرحلة</h5>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h5 class="fw-bold">المرحلة الأولى: استلام الطلب والفحص المبدئي</h5>
                        <p class="mb-0">مدة التنفيذ: يومين عمل</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h5 class="fw-bold">المرحلة الثانية: المراجعة الفنية</h5>
                        <p class="mb-0">مدة التنفيذ: 3 أيام عمل</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h5 class="fw-bold">المرحلة الثالثة: الموافقة النهائية</h5>
                        <p class="mb-0">مدة التنفيذ: يومين عمل</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-content">
                        <h5 class="fw-bold">المرحلة الرابعة: الإصدار والتسليم</h5>
                        <p class="mb-0">مدة التنفيذ: يوم عمل</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ميزات الخدمة -->
        <div class="service-section">
            <h2><i class="fas fa-star me-2"></i> مميزات الخدمة</h2>
            <div class="service-features">
                <div class="feature-card">
                    <i class="fas fa-bolt"></i>
                    <h3>سرعة الإنجاز</h3>
                    <p>إنجاز الخدمة في فترة زمنية قصيرة لا تتجاوز 10 أيام عمل</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-lock"></i>
                    <h3>أمان وحماية</h3>
                    <p>نظام آمن يحافظ على خصوصية بياناتك ومستنداتك</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>سهولة الوصول</h3>
                    <p>تقديم الطلب ومتابعته من أي مكان وفي أي وقت</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-headset"></i>
                    <h3>دعم فني متكامل</h3>
                    <p>فريق دعم فني جاهز لمساعدتك في أي استفسار</p>
                </div>
            </div>
        </div>

        <!-- نموذج التقديم -->
        <div class="service-section">
            <h2><i class="fas fa-file-signature me-2"></i> تقديم طلب جديد</h2>
            <div class="service-form">
                <div class="form-header">
                    <h3>نموذج طلب ترخيص بناء سكني</h3>
                    <p>يرجى تعبئة جميع الحقول المطلوبة بدقة لتتمكن من إكمال عملية التقديم بنجاح</p>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">الاسم بالكامل</label>
                            <input type="text" class="form-control" placeholder="الاسم كما في الهوية">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">رقم الهوية</label>
                            <input type="text" class="form-control" placeholder="رقم الهوية الوطنية">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">رقم الجوال</label>
                            <input type="tel" class="form-control" placeholder="05XXXXXXXX">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" placeholder="example@domain.com">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">المحافظة</label>
                            <select class="form-control">
                                <option value="">-- اختر المحافظة --</option>
                                <option value="صنعاء">صنعاء</option>
                                <option value="عدن">عدن</option>
                                <option value="تعز">تعز</option>
                                <option value="حضرموت">حضرموت</option>
                                <option value="الحديدة">الحديدة</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">المديرية</label>
                            <input type="text" class="form-control" placeholder="اسم المديرية">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">مساحة الأرض (م²)</label>
                            <input type="number" class="form-control" placeholder="المساحة بالمتر المربع">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">عدد الطوابق</label>
                            <input type="number" class="form-control" placeholder="عدد الطوابق المطلوبة">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">عنوان الأرض</label>
                            <textarea class="form-control" rows="3" placeholder="الوصف الدقيق لموقع الأرض"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mt-4">
                    <label class="form-label">رفع المستندات المطلوبة</label>
                    <div class="upload-area">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h5>انقر لرفع الملفات</h5>
                        <p class="text-muted">يمكنك سحب الملفات وإفلاتها هنا</p>
                        <input type="file" class="d-none" multiple>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted">(صك الملكية، الهوية الشخصية، المخططات الهندسية)</small>
                    </div>
                </div>
                
                <button class="btn-submit">
                    <i class="fas fa-paper-plane me-2"></i> تقديم الطلب
                </button>
            </div>
            
            <!-- نظام الإشعارات -->
            <div class="mt-5">
                <h5><i class="fas fa-bell me-2"></i> متابعة حالة الطلب</h5>
                <p>بعد تقديم الطلب، يمكنك متابعة حالة طلبك من خلال هذه الإشعارات:</p>
                
                <div class="mt-3">
                    <div class="notification-card">
                        <i class="fas fa-file-import"></i>
                        <div class="notification-content">
                            <strong>تم استلام طلبك بنجاح</strong>
                            <p>طلب ترخيص بناء سكني رقم #YB2023-7589</p>
                            <div class="notification-date">اليوم 10:30 ص</div>
                        </div>
                    </div>
                    
                    <div class="notification-card">
                        <i class="fas fa-user-check"></i>
                        <div class="notification-content">
                            <strong>جاري مراجعة المستندات</strong>
                            <p>يقوم الفنيون بمراجعة المستندات المقدمة</p>
                            <div class="notification-date">غداً</div>
                        </div>
                    </div>
                    
                    <div class="notification-card">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <div class="notification-content">
                            <strong>في انتظار سداد الرسوم</strong>
                            <p>الرسوم المستحقة: 75,000 ريال يمني</p>
                            <div class="notification-date">بعد 3 أيام</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- الأسئلة الشائعة -->
        <div class="service-section service-faq">
            <h2><i class="fas fa-question-circle me-2"></i> الأسئلة الشائعة</h2>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>ما هي مدة صلاحية رخصة البناء؟</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>رخصة البناء سارية لمدة سنة واحدة من تاريخ إصدارها. يمكن تجديدها لمدة سنة إضافية في حال لم يتم البدء في البناء خلال المدة المحددة.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>هل يمكن تعديل التصميم بعد الحصول على الرخصة؟</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>نعم، يمكن تقديم طلب لتعديل التصميم بعد الحصول على الرخصة، شريطة أن لا يتجاوز التعديل 20% من التصميم الأصلي. أي تعديلات كبيرة تتطلب تقديم طلب جديد.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>ما هي الإجراءات في حال رفض الطلب؟</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>في حال رفض الطلب، سيتم إعلام مقدم الطلب بالأسباب والملاحظات عبر البريد الإلكتروني أو الرسائل النصية. يمكن تعديل الطلب وتقديمه مرة أخرى دون رسوم إضافية خلال 30 يوم من تاريخ الرفض.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>هل يمكن تفويض شخص آخر لاستلام الرخصة؟</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>نعم، يمكن تفويض شخص آخر باستخدام نموذج التفويض المعتمد من الوزارة مع تقديم صورة من هوية المفوض والموكل.</p>
                </div>
            </div>
            
            <div class="faq-item">
                <div class="faq-question">
                    <span>ما هي عقوبة البناء بدون ترخيص؟</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">
                    <p>البناء بدون ترخيص يعرض صاحبه لغرامات مالية قد تصل إلى 50% من قيمة المشروع، بالإضافة إلى إمكانية إزالة المبنى إذا لم يتم تصويب الوضع خلال المدة المحددة.</p>
                </div>
            </div>
        </div>

        <!-- بطاقة التواصل -->
        <div class="contact-card">
            <i class="fas fa-headset"></i>
            <h3>هل تحتاج مساعدة؟</h3>
            <p>فريق الدعم الفني جاهز للإجابة على استفساراتك وتقديم المساعدة اللازمة</p>
            <a href="#"><i class="fas fa-phone-alt me-2"></i> اتصل بنا الآن</a>
        </div>
    </div>
    
    <script>
        // تفعيل الأسئلة الشائعة
        document.querySelectorAll('.faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');
                
                if (answer.classList.contains('show')) {
                    answer.classList.remove('show');
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    answer.classList.add('show');
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            });
        });
        
        // تفعيل منطقة رفع الملفات
        const uploadArea = document.querySelector('.upload-area');
        const fileInput = document.querySelector('.upload-area input[type="file"]');
        
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });
        
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = 'var(--accent)';
            uploadArea.style.backgroundColor = 'rgba(212, 175, 55, 0.1)';
        });
        
        uploadArea.addEventListener('dragleave', () => {
            uploadArea.style.borderColor = '#ddd';
            uploadArea.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
        });
        
        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.style.borderColor = '#ddd';
            uploadArea.style.backgroundColor = 'rgba(255, 255, 255, 0.5)';
            
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                alert(`تم اختيار ${e.dataTransfer.files.length} ملف(ات) للرفع`);
            }
        });
        
        // حاسبة الرسوم
        const landAreaInput = document.getElementById('landArea');
        const floorsSelect = document.getElementById('floors');
        const feeResult = document.getElementById('feeResult');
        
        function calculateFee() {
            const landArea = parseInt(landAreaInput.value) || 0;
            const floors = parseInt(floorsSelect.value) || 1;
            
            if (landArea <= 0) {
                feeResult.textContent = 'الرسوم المقدرة: يرجى إدخال البيانات';
                return;
            }
            
            let baseFee;
            
            if (landArea < 200) {
                baseFee = 50000;
            } else if (landArea < 500) {
                baseFee = 75000;
            } else if (landArea < 1000) {
                baseFee = 100000;
            } else {
                baseFee = 150000;
            }
            
            const fee = baseFee * floors;
            feeResult.textContent = `الرسوم المقدرة: ${fee.toLocaleString()} ريال يمني`;
        }
        
        landAreaInput.addEventListener('input', calculateFee);
        floorsSelect.addEventListener('change', calculateFee);
        
        // نظام التقييم
        const stars = document.querySelectorAll('.rating-star');
        
        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                // إزالة التفعيل من جميع النجوم
                stars.forEach(s => {
                    s.classList.remove('active');
                    s.querySelector('i').classList.remove('fas');
                    s.querySelector('i').classList.add('far');
                });
                
                // تفعيل النجوم حتى النجمة المختارة
                for (let i = 0; i <= index; i++) {
                    stars[i].classList.add('active');
                    stars[i].querySelector('i').classList.remove('far');
                    stars[i].querySelector('i').classList.add('fas');
                }
            });
        });
        
        // تفعيل الأسئلة المدمجة
        document.querySelectorAll('.faq-integrated .faq-question').forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');
                
                if (answer.classList.contains('show')) {
                    answer.classList.remove('show');
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                } else {
                    answer.classList.add('show');
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            });
        });
    </script>
