<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدعم والمساعدة | بوابة بلدي</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: #00615e;
            --secondary-color: #4CAF50;
            --accent-color: #149ddd;
            --background-color: #f5f9ff;
            --card-color: #ffffff;
            --text-color: #333;
            --light-text: #777;
            --danger: #e74c3c;
            --warning: #f39c12;
            --success: #27ae60;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            direction: rtl;
            text-align: right;
            margin: 0;
            font-size: 0.95rem;
            line-height: 1.6;
            padding: 15px;
        }

        /* الحاوية الرئيسية للمحتوى */
    .main-container {
      margin: 34px 20px 20px;
      margin-right: 133px;
      transition: margin 0.3s;
    }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .profile-header h1 {
            color: var(--primary-color);
            font-size: 1.6rem;
        }
        
        .page-description {
            color: var(--light-text);
            margin-bottom: 25px;
            background: rgba(0, 97, 94, 0.05);
            padding: 15px;
            border-radius: 10px;
            border-right: 4px solid var(--primary-color);
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        
        .page-description i {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-top: 3px;
        }

        /* بطاقات الملف الشخصي */
        .profile-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 25px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.03);
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }

        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 5px;
            height: 100%;
            background: var(--primary-color);
            border-radius: 0 12px 12px 0;
        }

        .profile-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .profile-card-header h2 {
            color: var(--primary-color);
            font-size: 1.3rem;
            position: relative;
            padding-right: 10px;
        }

        .profile-card-header h2::before {
            content: '';
            position: absolute;
            right: 0;
            bottom: -5px;
            width: 100px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        .profile-card-header .action-btn {
            background: var(--accent-color);
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            color: var(--primary-color);
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }

        .profile-card-header .action-btn:hover {
            background: var(--primary-color);
            color: white;
            box-shadow: 0 3px 8px rgba(0, 97, 94, 0.3);
        }

        /* صفحة الدعم والمساعدة */
        .support-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .support-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .support-option {
            text-align: center;
            padding: 25px 15px;
            border: 1px solid #eee;
            border-radius: 10px;
            transition: var(--transition);
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .support-option:hover {
            border-color: var(--primary-color);
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .support-option:nth-child(1) {
            background: rgba(0, 97, 94, 0.05);
        }
        .support-option:nth-child(2) {
            background: rgba(20, 157, 221, 0.05);
        }
        .support-option:nth-child(3) {
            background: rgba(39, 174, 96, 0.05);
        }
        .support-option:nth-child(4) {
            background: rgba(243, 156, 18, 0.05);
        }

        .support-icon {
            width: 60px;
            height: 60px;
            background: rgba(0, 97, 94, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: var(--primary-color);
            font-size: 24px;
            transition: all 0.3s ease;
        }

        .support-option:hover .support-icon {
            transform: rotate(15deg);
            background: var(--primary-color);
            color: white;
        }

        .support-title {
            font-weight: bold;
            margin-bottom: 10px;
            color: var(--primary-color);
        }

        .support-desc {
            color: var(--light-text);
            font-size: 0.9rem;
            margin-bottom: 15px;
            min-height: 40px;
        }

        /* نمط الأسئلة الشائعة */
        .faq-container {
            margin-top: 25px;
            display: none;
        }
        
        .faq-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .search-faq {
            position: relative;
            flex: 1;
            min-width: 250px;
        }
        
        .search-faq input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 30px;
            font-size: 1rem;
        }
        
        .search-faq i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
        }

        .faq-item {
            margin-bottom: 15px;
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
        }
        
        .faq-item:hover {
            border-color: var(--primary-color);
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            padding: 15px;
            background: rgba(0, 97, 94, 0.05);
            font-weight: 500;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .faq-question:hover {
            background: rgba(0, 97, 94, 0.1);
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-question.active i {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0 15px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
            background: white;
        }

        .faq-question.active + .faq-answer {
            padding: 15px;
            max-height: 500px;
        }

        /* نماذج التذاكر */
        .ticket-form {
            display: none;
            margin-top: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
        }

        .form-group textarea {
            min-height: 150px;
        }

        .submit-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .submit-btn:hover {
            background: #004d4b;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 97, 94, 0.3);
        }

        /* دعم الدردشة */
        .chat-container {
            display: none;
            margin-top: 25px;
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .chat-header {
            background: var(--primary-color);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-status {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--success);
        }

        .chat-messages {
            height: 300px;
            overflow-y: auto;
            padding: 15px;
            background: #f9f9f9;
        }

        .message {
            margin-bottom: 15px;
            max-width: 80%;
        }

        .received {
            margin-right: auto;
        }

        .sent {
            margin-left: auto;
            text-align: left;
        }

        .message-content {
            padding: 10px 15px;
            border-radius: 10px;
            display: inline-block;
        }

        .received .message-content {
            background: white;
            border: 1px solid #eee;
        }

        .sent .message-content {
            background: var(--primary-color);
            color: white;
        }

        .message-time {
            font-size: 0.75rem;
            color: var(--light-text);
            margin-top: 5px;
        }

        .chat-input {
            display: flex;
            padding: 15px;
            background: white;
            border-top: 1px solid #eee;
        }

        .chat-input input {
            flex: 1;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-left: 10px;
        }

        .chat-input button {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* البرامج التعليمية */
        .video-tutorials {
            display: none;
            margin-top: 25px;
        }
        
        .video-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 15px;
        }
        
        .video-item {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            background: white;
            transition: all 0.3s;
        }
        
        .video-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        
        .video-thumbnail {
            height: 150px;
            background: linear-gradient(45deg, #00615e, #149ddd);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
        }
        
        .video-title {
            padding: 15px;
            font-weight: 500;
            color: var(--text-color);
        }
        
        .video-duration {
            padding: 5px 15px 15px;
            color: var(--light-text);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* التبديل */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: var(--primary-color);
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 1200px) {
          .main-container {
            margin-right: 0px;
            margin-left: 0px;
          }
        }
        
        @media (max-width: 768px) {
            .support-options {
                grid-template-columns: 1fr;
            }
            
            .support-option {
                padding: 20px;
            }
            
            .video-grid {
                grid-template-columns: 1fr;
            }
            
            .profile-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
        }

        /* تحسينات إضافية */
        .edit-input {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .edit-input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
        }

        /* رسوم متحركة للبطاقات */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-card {
            animation: fadeIn 0.5s ease forwards;
        }

        .support-option {
            animation: fadeIn 0.6s ease forwards;
        }

        .support-option:nth-child(1) { animation-delay: 0.1s; }
        .support-option:nth-child(2) { animation-delay: 0.2s; }
        .support-option:nth-child(3) { animation-delay: 0.3s; }
        .support-option:nth-child(4) { animation-delay: 0.4s; }

        /* تلميحات الأدوات */
        [data-tooltip] {
            position: relative;
            cursor: pointer;
        }

        [data-tooltip]:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            white-space: nowrap;
            bottom: 100%;
            right: 50%;
            transform: translateX(50%);
            z-index: 1000;
        }
        
        .contact-info {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .contact-methods {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 15px;
        }
        
        .contact-method {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 15px;
            background: rgba(0, 97, 94, 0.05);
            border-radius: 8px;
            transition: all 0.3s;
            flex: 1;
            min-width: 200px;
        }
        
        .contact-method:hover {
            background: rgba(0, 97, 94, 0.1);
            transform: translateY(-3px);
        }
        
        .contact-method i {
            font-size: 20px;
            color: var(--primary-color);
        }
        
        .back-to-options {
            display: inline-flex;
            align-items: center;
            margin-top: 0px;
            margin-bottom: 10px;
            color: var(--primary-color);
            cursor: pointer;
            font-weight: 500;
            gap: 5px;
            padding: 8px 15px;
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .back-to-options:hover {
            background: var(--primary-color);
            color: white;
        }
        
        .support-process {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .steps {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            position: relative;
        }
        
        .steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 10%;
            right: 10%;
            height: 2px;
            background: var(--primary-color);
            z-index: 1;
        }
        
        .step {
            text-align: center;
            z-index: 2;
            position: relative;
            width: 20%;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
        }
        
        .step-text {
            font-size: 0.9rem;
            color: var(--light-text);
        }
        
        .satisfaction-survey {
            margin-top: 40px;
            background: rgba(0, 97, 94, 0.05);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }
        
        .rating-stars {
            margin: 15px 0;
            font-size: 24px;
            color: #ccc;
        }
        
        .rating-stars .active {
            color: #FFD700;
        }
        
        .survey-textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 15px 0;
            min-height: 100px;
            resize: vertical;
        }
    </style>
</head>
<body>
    <!-- الحاوية الرئيسية للمحتوى -->
    <div class="main-container">
        <div class="profile-header">
            <h1>الدعم والمساعدة</h1>
            <button class="action-btn back-to-options">
                <i class="fas fa-history"></i> سجل التذاكر
            </button>
        </div>
        
        <div class="page-description">
            <i class="fas fa-info-circle"></i> نحن هنا لمساعدتك! اختر أحد الخيارات أدناه للحصول على الدعم الذي تحتاجه. فريق الدعم متاح من الساعة 8 صباحاً حتى 8 مساءً.
        </div>

        <div class="profile-card">
            <div class="profile-card-header">
                <h2>طرق الدعم المتاحة</h2>
            </div>

            <div class="support-options" id="support-options">
                <div class="support-option" onclick="showSection('faq')">
                    <div class="support-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <div class="support-title">الأسئلة الشائعة</div>
                    <div class="support-desc">إجابات على الأسئلة الأكثر شيوعاً حول خدماتنا وإجراءاتنا</div>
                    <button class="action-btn back-to-options">استعراض الأسئلة</button>
                </div>

                <div class="support-option" onclick="showSection('chat')">
                    <div class="support-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <div class="support-title">الدردشة المباشرة</div>
                    <div class="support-desc">تواصل مباشر مع ممثل الدعم للحصول على مساعدة فورية</div>
                    <button class="action-btn back-to-options">بدء الدردشة</button>
                </div>

                <div class="support-option" onclick="showSection('ticket')">
                    <div class="support-icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="support-title">تذكرة دعم فني</div>
                    <div class="support-desc">إرسال طلب دعم فني وسيتم الرد عليك خلال 24 ساعة</div>
                    <button class="action-btn back-to-options">فتح تذكرة</button>
                </div>
                
                <div class="support-option" onclick="showSection('tutorials')">
                    <div class="support-icon">
                        <i class="fas fa-video"></i>
                    </div>
                    <div class="support-title">البرامج التعليمية</div>
                    <div class="support-desc">فيديوهات تعليمية لمساعدتك في استخدام خدمات البوابة</div>
                    <button class="action-btn back-to-options">مشاهدة الفيديوهات</button>
                </div>
            </div>
            
            <!-- الأسئلة الشائعة -->
            <div id="faq" class="faq-container">
                <div class="back-to-options" onclick="showSection('options')">
                    <i class="fas fa-arrow-left"></i> العودة إلى خيارات الدعم
                </div>
                <div class="faq-header">
                    <h3>الأسئلة المتكررة</h3>
                    <div class="search-faq">
                        <input type="text" id="faq-search" placeholder="ابحث في الأسئلة الشائعة...">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        كيف يمكنني تحديث معلوماتي الشخصية؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        يمكنك تحديث معلوماتك الشخصية عن طريق الذهاب إلى صفحة الملف الشخصي والنقر على زر "تعديل المعلومات". بعد إجراء التعديلات المطلوبة، اضغط على زر "حفظ التغييرات".
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        كم تستغرق معالجة طلب الرخصة؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        مدة معالجة طلبات الرخص تختلف حسب نوع الرخصة. بشكل عام:
                        <ul style="margin: 10px 0 10px 20px;">
                            <li>الرخص التجارية: 3-5 أيام عمل</li>
                            <li>رخص البناء: 5-7 أيام عمل</li>
                            <li>الرخص الصحية: 2-3 أيام عمل</li>
                        </ul>
                        يمكنك تتبع حالة طلبك في قسم "الطلبات".
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        كيف يمكنني دفع المخالفات؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        يمكنك دفع المخالفات من خلال:
                        <ol style="margin: 10px 0 10px 20px;">
                            <li>بوابة بلدي الإلكترونية (قسم المخالفات)</li>
                            <li>تطبيق بلدي على الهاتف المحمول</li>
                            <li>فروع البلدية</li>
                            <li>الصرافات الآلية التابعة للبنوك المحلية</li>
                        </ol>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        ماذا أفعل إذا نسيت كلمة المرور؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        إذا نسيت كلمة المرور، يمكنك إعادة تعيينها عن طريق:
                        <ol style="margin: 10px 0 10px 20px;">
                            <li>النقر على "نسيت كلمة المرور" في صفحة تسجيل الدخول</li>
                            <li>إدخال البريد الإلكتروني المسجل لدينا</li>
                            <li>اتباع التعليمات في الرسالة التي ستصل إلى بريدك الإلكتروني</li>
                        </ol>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        كيف أستطيع متابعة حالة طلبي؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        يمكنك متابعة حالة طلباتك من خلال:
                        <ul style="margin: 10px 0 10px 20px;">
                            <li>قسم "الطلبات" في حسابك الشخصي</li>
                            <li>الإشعارات التي ترسل إلى بريدك الإلكتروني</li>
                            <li>الرسائل النصية (SMS) التي ترسل إلى هاتفك المحمول</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- نموذج التذكرة -->
            <div id="ticket" class="ticket-form">
                <div class="back-to-options" onclick="showSection('options')">
                    <i class="fas fa-arrow-left"></i> العودة إلى خيارات الدعم
                </div>
                <h3 style="margin-bottom: 20px;">فتح تذكرة دعم جديدة</h3>
                
                <div class="form-group">
                    <label for="ticket-subject">عنوان التذكرة</label>
                    <input type="text" id="ticket-subject" placeholder="أدخل عنواناً واضحاً لمشكلتك">
                </div>
                
                <div class="form-group">
                    <label for="ticket-category">نوع المشكلة</label>
                    <select id="ticket-category">
                        <option value="">اختر نوع المشكلة</option>
                        <option value="technical">مشكلة فنية</option>
                        <option value="account">مشكلة في الحساب</option>
                        <option value="payment">مشكلة في الدفع</option>
                        <option value="service">استفسار عن خدمة</option>
                        <option value="other">أخرى</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="ticket-description">وصف المشكلة</label>
                    <textarea id="ticket-description" placeholder="صف مشكلتك بالتفصيل..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="ticket-attachment">إرفاق ملف (اختياري)</label>
                    <input type="file" id="ticket-attachment">
                </div>
                
                <button class="submit-btn" onclick="submitTicket()">
                    <i class="fas fa-paper-plane"></i> إرسال التذكرة
                </button>
                
                <div class="back-to-options" onclick="showSection('options')">
                    <i class="fas fa-arrow-left"></i> إلغاء
                </div>
            </div>
            
            <!-- الدردشة المباشرة -->
            <div id="chat" class="chat-container">
                <div class="chat-header">
                    <div>
                        <div>الدردشة المباشرة</div>
                        <div class="chat-status">
                            <div class="status-indicator"></div>
                            <span>متاح الآن</span>
                        </div>
                    </div>
                    <div>
                        <i class="fas fa-times" onclick="closeChat()" style="cursor: pointer;"></i>
                    </div>
                </div>
                
                <div class="chat-messages" id="chat-messages">
                    <div class="message received">
                        <div class="message-content">
                            مرحباً محمد! كيف يمكنني مساعدتك اليوم؟
                        </div>
                        <div class="message-time">8:30 صباحاً</div>
                    </div>
                    
                    <div class="message sent">
                        <div class="message-content">
                            أود الاستفسار عن حالة طلب الرخصة الذي قدمته الأسبوع الماضي
                        </div>
                        <div class="message-time">8:31 صباحاً</div>
                    </div>
                    
                    <div class="message received">
                        <div class="message-content">
                            بالتأكيد، هل يمكنك إعطائي رقم الطلب؟
                        </div>
                        <div class="message-time">8:32 صباحاً</div>
                    </div>
                </div>
                
                <div class="chat-input">
                    <input type="text" id="chat-input" placeholder="اكتب رسالتك هنا...">
                    <button onclick="sendMessage()">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
            
            <!-- البرامج التعليمية -->
            <div id="tutorials" class="video-tutorials">
                <div class="back-to-options" onclick="showSection('options')">
                    <i class="fas fa-arrow-left"></i> العودة إلى خيارات الدعم
                </div>
                <div class="video-header">
                    <h3>البرامج التعليمية</h3>
                    <div class="search-faq">
                        <input type="text" placeholder="ابحث في البرامج التعليمية...">
                        <i class="fas fa-search"></i>
                    </div>
                </div>
                
                <p style="margin-bottom: 15px; color: var(--light-text);">شاهد هذه الفيديوهات التعليمية لمساعدتك في استخدام خدمات بوابة بلدي:</p>
                
                <div class="video-grid">
                    <div class="video-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play-circle"></i>
                        </div>
                        <div class="video-title">كيفية تقديم طلب رخصة بناء</div>
                        <div class="video-duration">
                            <i class="fas fa-clock"></i> 4:25 دقيقة
                        </div>
                    </div>
                    
                    <div class="video-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play-circle"></i>
                        </div>
                        <div class="video-title">طريقة دفع المخالفات إلكترونياً</div>
                        <div class="video-duration">
                            <i class="fas fa-clock"></i> 3:45 دقيقة
                        </div>
                    </div>
                    
                    <div class="video-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play-circle"></i>
                        </div>
                        <div class="video-title">تحديث المعلومات الشخصية في الملف</div>
                        <div class="video-duration">
                            <i class="fas fa-clock"></i> 2:30 دقيقة
                        </div>
                    </div>
                    
                    <div class="video-item">
                        <div class="video-thumbnail">
                            <i class="fas fa-play-circle"></i>
                        </div>
                        <div class="video-title">تتبع حالة الطلبات والخدمات</div>
                        <div class="video-duration">
                            <i class="fas fa-clock"></i> 5:10 دقيقة
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- معلومات الاتصال -->
            <div class="contact-info">
                <h3>طرق اتصال أخرى</h3>
                <div class="contact-methods">
                    <div class="contact-method">
                        <i class="fas fa-phone"></i>
                        <div>
                            <div>الهاتف</div>
                            <div>920020000</div>
                        </div>
                    </div>
                    <div class="contact-method">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <div>البريد الإلكتروني</div>
                            <div>support@balady.gov.sa</div>
                        </div>
                    </div>
                    <div class="contact-method">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <div>الفروع</div>
                            <div>ابحث عن أقرب فرع</div>
                        </div>
                    </div>
                    <div class="contact-method">
                        <i class="fas fa-clock"></i>
                        <div>
                            <div>ساعات العمل</div>
                            <div>8 صباحاً - 8 مساءً</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- خطوات دعم العملاء -->
            <div class="support-process">
                <h3>كيف نقدم الدعم لك؟</h3>
                <div class="steps">
                    <div class="step">
                        <div class="step-number">1</div>
                        <div class="step-text">تحديد المشكلة</div>
                    </div>
                    <div class="step">
                        <div class="step-number">2</div>
                        <div class="step-text">تقديم الطلب</div>
                    </div>
                    <div class="step">
                        <div class="step-number">3</div>
                        <div class="step-text">المعالجة</div>
                    </div>
                    <div class="step">
                        <div class="step-number">4</div>
                        <div class="step-text">حل المشكلة</div>
                    </div>
                    <div class="step">
                        <div class="step-number">5</div>
                        <div class="step-text">تقييم الخدمة</div>
                    </div>
                </div>
            </div>
            
            <!-- استبيان الرضا -->
            <div class="satisfaction-survey">
                <h3>كيف تقيم تجربتك مع دعمنا؟</h3>
                <p>مساعدتنا على تحسين خدمة العملاء من خلال تقييم تجربتك</p>
                
                <div class="rating-stars" id="rating-stars">
                    <i class="far fa-star" data-rating="1"></i>
                    <i class="far fa-star" data-rating="2"></i>
                    <i class="far fa-star" data-rating="3"></i>
                    <i class="far fa-star" data-rating="4"></i>
                    <i class="far fa-star" data-rating="5"></i>
                </div>
                
                <textarea class="survey-textarea" placeholder="ملاحظاتك (اختياري)" id="feedback-text"></textarea>
                
                <button class="submit-btn" onclick="submitSurvey()">
                    <i class="fas fa-paper-plane"></i> إرسال التقييم
                </button>
            </div>
        </div>
    </div>

    <script>
        // إظهار وإخفاء أقسام الدعم
        function showSection(sectionId) {
            // إخفاء جميع الأقسام
            document.getElementById('faq').style.display = 'none';
            document.getElementById('ticket').style.display = 'none';
            document.getElementById('chat').style.display = 'none';
            document.getElementById('tutorials').style.display = 'none';
            document.getElementById('support-options').style.display = 'none';
            
            // إظهار القسم المطلوب
            if(sectionId === 'options') {
                document.getElementById('support-options').style.display = 'grid';
            } else {
                document.getElementById(sectionId).style.display = 'block';
            }
            
            // إذا كانت الدردشة، نركز على حقل الإدخال
            if (sectionId === 'chat') {
                setTimeout(() => {
                    document.getElementById('chat-input').focus();
                }, 300);
            }
        }
        
        // تبديل الأسئلة الشائعة
        function toggleFAQ(element) {
            element.classList.toggle('active');
        }
        
        // إرسال التذكرة
        function submitTicket() {
            const subject = document.getElementById('ticket-subject').value;
            const category = document.getElementById('ticket-category').value;
            const description = document.getElementById('ticket-description').value;
            
            if (!subject || !category || !description) {
                alert('الرجاء ملء جميع الحقول المطلوبة');
                return;
            }
            
            // في التطبيق الحقيقي، هنا سيتم إرسال البيانات للخادم
            alert(`تم تقديم تذكرتك بنجاح!\n\nالعنوان: ${subject}\nالنوع: ${category}\nالوصف: ${description}`);
            
            // إعادة تعيين النموذج
            document.getElementById('ticket-subject').value = '';
            document.getElementById('ticket-category').value = '';
            document.getElementById('ticket-description').value = '';
        }
        
        // إرسال رسالة في الدردشة
        function sendMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            
            if (message === '') return;
            
            const chatMessages = document.getElementById('chat-messages');
            
            // إضافة رسالة المستخدم
            const userMessage = document.createElement('div');
            userMessage.className = 'message sent';
            userMessage.innerHTML = `
                <div class="message-content">${message}</div>
                <div class="message-time">الآن</div>
            `;
            chatMessages.appendChild(userMessage);
            
            // مسح حقل الإدخال
            input.value = '';
            
            // التمرير للأسفل
            chatMessages.scrollTop = chatMessages.scrollHeight;
            
            // محاكاة رد الدعم (بعد 1-3 ثواني)
            setTimeout(() => {
                const responses = [
                    "شكراً لتواصلك معنا. هل هناك أي شيء آخر يمكنني مساعدتك به؟",
                    "تم تسجيل استفسارك وسيتم الرد عليه في أسرع وقت.",
                    "هل تحتاج إلى مزيد من المساعدة بخصوص هذا الموضوع؟"
                ];
                
                const randomResponse = responses[Math.floor(Math.random() * responses.length)];
                
                const supportMessage = document.createElement('div');
                supportMessage.className = 'message received';
                supportMessage.innerHTML = `
                    <div class="message-content">${randomResponse}</div>
                    <div class="message-time">الآن</div>
                `;
                chatMessages.appendChild(supportMessage);
                
                // التمرير للأسفل
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }, 1000 + Math.random() * 2000);
        }
        
        // إغلاق الدردشة
        function closeChat() {
            document.getElementById('chat').style.display = 'none';
            showSection('options');
        }
        
        // البحث في الأسئلة الشائعة
        document.getElementById('faq-search').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const questions = document.querySelectorAll('.faq-question');
            
            questions.forEach(q => {
                const questionText = q.textContent.toLowerCase();
                if(questionText.includes(searchTerm)) {
                    q.closest('.faq-item').style.display = 'block';
                } else {
                    q.closest('.faq-item').style.display = 'none';
                }
            });
        });
        
        // نظام التقييم بالنجوم
        document.querySelectorAll('#rating-stars i').forEach(star => {
            star.addEventListener('click', function() {
                const rating = this.getAttribute('data-rating');
                const stars = document.querySelectorAll('#rating-stars i');
                
                stars.forEach((s, index) => {
                    if(index < rating) {
                        s.classList.remove('far');
                        s.classList.add('fas', 'active');
                    } else {
                        s.classList.remove('fas', 'active');
                        s.classList.add('far');
                    }
                });
            });
            
            star.addEventListener('mouseover', function() {
                const rating = this.getAttribute('data-rating');
                const stars = document.querySelectorAll('#rating-stars i');
                
                stars.forEach((s, index) => {
                    if(index < rating) {
                        s.classList.remove('far');
                        s.classList.add('fas');
                    }
                });
            });
            
            star.addEventListener('mouseout', function() {
                const activeStars = document.querySelectorAll('#rating-stars .active');
                const stars = document.querySelectorAll('#rating-stars i');
                
                if(activeStars.length === 0) {
                    stars.forEach(s => {
                        s.classList.remove('fas');
                        s.classList.add('far');
                    });
                } else {
                    stars.forEach(s => {
                        if(!s.classList.contains('active')) {
                            s.classList.remove('fas');
                            s.classList.add('far');
                        }
                    });
                }
            });
        });
        
        // إرسال استبيان الرضا
        function submitSurvey() {
            const activeStars = document.querySelectorAll('#rating-stars .active').length;
            const feedback = document.getElementById('feedback-text').value;
            
            if(activeStars === 0) {
                alert('الرجاء اختيار تقييم من خلال النقر على النجوم');
                return;
            }
            
            alert(`شكراً لتقييمك! لقد أعطيتنا ${activeStars} نجوم.\n\nملاحظاتك: ${feedback || 'لم تقم بإضافة ملاحظات'}`);
            
            // إعادة تعيين النموذج
            document.querySelectorAll('#rating-stars i').forEach(star => {
                star.classList.remove('fas', 'active');
                star.classList.add('far');
            });
            document.getElementById('feedback-text').value = '';
        }
        
        // عند تحميل الصفحة، إظهار خيارات الدعم
        document.addEventListener('DOMContentLoaded', function() {
            showSection('options');
        });
    </script>
</body>
</html>