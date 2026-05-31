<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بوابة بلدي | إدارة الاشتراكات</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* أنماط CSS المعدلة بعد إزالة الشريط العلوي والجانبي */
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
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--background-color);
            color: var(--text-color);
            direction: rtl;
            text-align: right;
            margin: 0;
            font-size: 0.95rem;
            line-height: 1.6;
            overflow-x: hidden;
            padding: 20px;
        }

        /* الحاوية الرئيسية للمحتوى - تم تعديل الهوامش */
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
            box-shadow: var(--shadow);
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
            background: rgba(0, 97, 94, 0.1);
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

        /* صفحة الاشتراكات */
        .subscription-card {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            background: white;
            box-shadow: var(--shadow);
        }

        .subscription-card.featured {
            border: 2px solid var(--primary-color);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .subscription-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .subscription-title {
            font-weight: bold;
            font-size: 1.2rem;
        }

        .subscription-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .subscription-period {
            color: var(--light-text);
            font-size: 0.9rem;
        }

        .subscription-badge {
            position: absolute;
            top: 15px;
            left: -30px;
            background: var(--primary-color);
            color: white;
            padding: 5px 30px;
            transform: rotate(-45deg);
            font-size: 0.8rem;
            font-weight: bold;
        }

        .subscription-features {
            margin: 20px 0;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .feature-icon {
            color: var(--primary-color);
            width: 22px;
            text-align: center;
        }

        .feature-name {
            flex: 1;
        }

        .feature-unavailable {
            color: var(--light-text);
            text-decoration: line-through;
        }

        .subscription-actions {
            text-align: center;
        }

        .action-btn {
            background: rgba(0, 97, 94, 0.1);
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            color: var(--primary-color);
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-weight: 500;
        }

        .action-btn.large {
            padding: 12px 25px;
            font-size: 1rem;
        }

        .action-btn.primary {
            background: var(--primary-color);
            color: white;
        }

        .action-btn.danger {
            background: rgba(231, 76, 60, 0.1);
            color: var(--danger);
        }

        .action-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        }

        .action-btn.primary:hover {
            background: #004d4b;
            box-shadow: 0 3px 8px rgba(0, 97, 94, 0.3);
        }

        .action-btn.danger:hover {
            background: var(--danger);
            color: white;
        }

        .current-plan {
            display: inline-block;
            background: var(--success);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            margin-top: 10px;
        }

        /* جدول المقارنة */
        .comparison-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        .comparison-table th,
        .comparison-table td {
            padding: 15px;
            text-align: center;
            border: 1px solid #eee;
        }

        .comparison-table th {
            background: var(--primary-color);
            color: white;
        }

        .comparison-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .comparison-table .feature-name {
            text-align: right;
            font-weight: 500;
        }

        .comparison-table .available {
            color: var(--success);
            font-size: 1.2rem;
        }

        .comparison-table .unavailable {
            color: var(--light-text);
            font-size: 1.2rem;
        }

        /* قسم الأسئلة الشائعة */
        .faq-container {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .faq-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .faq-item {
            margin-bottom: 15px;
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
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
        }

        .faq-question.active+.faq-answer {
            padding: 15px;
            max-height: 500px;
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

        input:checked+.slider {
            background-color: var(--primary-color);
        }

        input:checked+.slider:before {
            transform: translateX(26px);
        }

        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 1200px) {
          .main-container {
            margin-right: 0px;
            margin-left: 0px;
          }
        }
        
        /* التكيف مع الشاشات الصغيرة */
        @media (max-width: 768px) {
            .subscription-card {
                padding: 15px;
            }

            .subscription-header {
                flex-direction: column;
                gap: 10px;
            }

            .comparison-table {
                display: block;
                overflow-x: auto;
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
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            margin-bottom: 15px;
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

        .subscription-card {
            animation: fadeIn 0.6s ease forwards;
        }

        .subscription-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .subscription-card:nth-child(2) {
            animation-delay: 0.2s;
        }

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

        .trial-card {
            background: linear-gradient(135deg, #f5f9ff, #e1f5fe);
            border: 1px dashed var(--primary-color);
            text-align: center;
            padding: 25px;
            border-radius: 10px;
            margin: 30px 0;
        }

        .trial-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .trial-card p {
            margin-bottom: 20px;
            color: var(--light-text);
        }

        /* حالة الاشتراك الحالي */
        .current-subscription {
            background: rgba(39, 174, 96, 0.05);
            border: 1px solid rgba(39, 174, 96, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .current-subscription-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .subscription-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }

        .info-item {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .info-label {
            color: var(--light-text);
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .info-value {
            font-weight: 500;
            font-size: 1.1rem;
        }

        /* طرق الدفع */
        .payment-methods {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 25px 0;
            box-shadow: var(--shadow);
        }

        .payment-cards {
            display: flex;
            gap: 15px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .payment-card {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 15px;
            flex: 1;
            min-width: 200px;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            transition: all 0.3s;
        }

        .payment-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .payment-card.active {
            border: 2px solid var(--primary-color);
        }

        .card-icon {
            font-size: 24px;
            color: var(--primary-color);
        }

        .card-actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }

        .default-badge {
            position: absolute;
            top: -10px;
            left: 15px;
            background: var(--success);
            color: white;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        /* الفواتير */
        .invoices-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 25px 0;
            box-shadow: var(--shadow);
        }

        .invoice-list {
            margin-top: 15px;
        }

        .invoice-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f5f5f5;
        }

        .invoice-details {
            display: flex;
            gap: 10px;
        }

        /* التذكيرات */
        .reminders-section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 25px 0;
            box-shadow: var(--shadow);
        }

        .reminder-options {
            display: flex;
            gap: 15px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .reminder-option {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 15px;
            flex: 1;
            min-width: 150px;
        }

        /* الضمان */
        .guarantee-card {
            background: rgba(243, 156, 18, 0.05);
            border: 1px solid rgba(243, 156, 18, 0.2);
            border-radius: 10px;
            padding: 20px;
            margin-top: 25px;
            text-align: center;
        }

        /* النوافذ المنبثقة */
        .modal-overlay {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            transform: translateY(-50px);
            transition: transform 0.3s ease;
        }

        .modal-overlay.active .modal {
            transform: translateY(0);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid #eee;
            background: var(--primary-color);
            color: white;
            border-radius: 12px 12px 0 0;
        }

        .modal-header h3 {
            font-size: 1.3rem;
        }

        .modal-close {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .modal-body {
            padding: 25px;
        }

        .modal-footer {
            padding: 20px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .subscription-history {
            margin-top: 20px;
        }

        .history-item {
            display: flex;
            padding: 15px;
            border-bottom: 1px solid #f5f5f5;
            transition: all 0.3s;
        }

        .history-item:hover {
            background: rgba(0, 97, 94, 0.05);
        }

        .history-details {
            flex: 1;
        }

        .history-amount {
            font-weight: bold;
            color: var(--primary-color);
        }

        .history-status {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.85rem;
        }

        .status-success {
            background: rgba(39, 174, 96, 0.1);
            color: var(--success);
        }

        .status-pending {
            background: rgba(243, 156, 18, 0.1);
            color: var(--warning);
        }

        .status-cancelled {
            background: rgba(231, 76, 60, 0.1);
            color: var(--danger);
        }

        /* نموذج إضافة بطاقة */
        .card-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text-color);
        }

        .card-preview {
            background: linear-gradient(135deg, #00615e, #149ddd);
            border-radius: 10px;
            padding: 20px;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-logo {
            text-align: right;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .card-number {
            font-family: monospace;
            font-size: 1.3rem;
            letter-spacing: 2px;
            margin-bottom: 20px;
        }

        .card-bottom {
            display: flex;
            justify-content: space-between;
        }

        .card-name {
            font-size: 0.9rem;
        }

        .card-expiry {
            font-size: 0.9rem;
        }

        .card-cvv {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .cvv-input {
            width: 60px;
        }

        .card-icons {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .card-icon-item {
            width: 50px;
            height: 30px;
            background: white;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        /* نضيف أنماط جديدة للخيارات المتعددة */
        .payment-method-selector {
            margin-bottom: 20px;
        }

        .payment-method-selector label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .payment-method-selector select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .payment-method-selector select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
        }

        .payment-option {
            display: none;
            animation: fadeIn 0.5s ease forwards;
        }

        .payment-option.active {
            display: block;
        }

        .payment-info {
            background: rgba(0, 97, 94, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-top: 15px;
            border-right: 4px solid var(--primary-color);
        }

        .payment-info h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .payment-info ul {
            padding-right: 20px;
        }

        .payment-info li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .yemen-banks {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 15px;
        }

        .bank-logo {
            background: white;
            border-radius: 8px;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .bank-logo div {
            color: #00615e;
            font-weight: bold;
            font-size: 1rem;
        }

        .mobile-wallets {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .wallet-option {
            text-align: center;
            width: 100px;
        }

        .wallet-icon {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 20px;
            color: #e67e22;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .wallet-name {
            font-size: 0.85rem;
            font-weight: 500;
        }

        .cash-instructions {
            text-align: center;
            padding: 20px;
            background: rgba(39, 174, 96, 0.1);
            border-radius: 10px;
            margin-top: 15px;
        }

        .cash-icon {
            font-size: 2.5rem;
            color: var(--success);
            margin-bottom: 15px;
        }

        .steps {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }

        .step {
            background: white;
            border-radius: 10px;
            padding: 15px;
            width: 170px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            text-align: center;
            position: relative;
        }

        .step-number {
            position: absolute;
            top: -12px;
            right: -12px;
            background: var(--primary-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .step-icon {
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .step-title {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
            font-size: 0.95rem;
        }

        .step-description {
            color: var(--light-text);
            font-size: 0.85rem;
        }

        /* تعديلات على معاينة البطاقة */
        .card-preview.cash {
            background: linear-gradient(135deg, #27ae60, #2ecc71);
        }

        .card-preview.bank {
            background: linear-gradient(135deg, #34495e, #2c3e50);
        }

        .card-preview.mobile {
            background: linear-gradient(135deg, #e67e22, #f39c12);
        }

        .card-preview .card-number {
            font-size: 1.1rem;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <!-- الحاوية الرئيسية للمحتوى -->
    <div class="main-container">
        <div class="profile-header">
            <h1>الاشتراكات</h1>
            <button class="action-btn" id="show-history-btn">
                <i class="fas fa-history"></i> سجل الاشتراكات
            </button>
        </div>

        <div class="page-description">
            <i class="fas fa-info-circle"></i> اختر الاشتراك المناسب لك للاستفادة من كافة خدمات بوابة بلدي. يمكنك
            الترقية أو التغيير في أي وقت.
        </div>

        <div class="profile-card">
            <!-- حالة الاشتراك الحالي -->
            <div class="current-subscription">
                <div class="current-subscription-header">
                    <h3>الاشتراك الحالي</h3>
                    <button class="action-btn danger">
                        <i class="fas fa-ban"></i> إلغاء الاشتراك
                    </button>
                </div>

                <div class="subscription-info">
                    <div class="info-item">
                        <div class="info-label">نوع الاشتراك</div>
                        <div class="info-value">الاشتراك المميز</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">تاريخ التجديد</div>
                        <div class="info-value">15 سبتمبر 2023</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">المدة المتبقية</div>
                        <div class="info-value">23 يوم</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">حالة الاشتراك</div>
                        <div class="info-value" style="color: var(--success);">نشط</div>
                    </div>
                </div>
            </div>

            <div class="profile-card-header">
                <h2>خطط الاشتراك</h2>
                <div>
                    <span>الدفع السنوي</span>
                    <label class="switch" style="margin: 0 10px;">
                        <input type="checkbox" id="billing-toggle">
                        <span class="slider"></span>
                    </label>
                    <span>الدفع الشهري</span>
                </div>
            </div>

            <!-- فترة تجريبية -->
            <div class="trial-card">
                <h3><i class="fas fa-gift"></i> جرب البوابة مجاناً لمدة 14 يوماً</h3>
                <p>استماع بكافة خدمات البوابة المميزة بدون أي تكلفة. لا حاجة لبطاقة ائتمان.</p>
                <button class="action-btn primary large">
                    <i class="fas fa-play-circle"></i> بدء الفترة التجريبية
                </button>
            </div>

            <div class="subscription-cards">
                <div class="subscription-card featured">
                    <div class="subscription-badge">الأكثر رواجاً</div>
                    <div class="subscription-header">
                        <div class="subscription-title">الاشتراك المميز</div>
                        <div>
                            <div class="subscription-price">500 ر.س</div>
                            <div class="subscription-period">/ سنوي</div>
                        </div>
                    </div>

                    <div class="subscription-features">
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">تقديم غير محدود للطلبات</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">دعم فني متقدم 24/7</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">تحديثات فورية لحالة الطلبات</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">خصم 20% على خدمات الاستشارات</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">إشعارات فورية عبر الجوال والبريد</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">خدمة المواعيد المميزة</div>
                        </div>
                    </div>

                    <div class="subscription-actions">
                        <button class="action-btn primary large">
                            <i class="fas fa-sync-alt"></i> تجديد الاشتراك
                        </button>
                        <div class="current-plan">الاشتراك الحالي</div>
                    </div>
                </div>

                <div class="subscription-card">
                    <div class="subscription-header">
                        <div class="subscription-title">الاشتراك الأساسي</div>
                        <div>
                            <div class="subscription-price">250 ر.س</div>
                            <div class="subscription-period">/ سنوي</div>
                        </div>
                    </div>

                    <div class="subscription-features">
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">تقديم 12 طلب سنوياً</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">دعم فني خلال أوقات العمل</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">تحديثات يومية لحالة الطلبات</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                            <div class="feature-name">خصم 10% على خدمات الاستشارات</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-times-circle"></i></div>
                            <div class="feature-name feature-unavailable">إشعارات فورية عبر الجوال والبريد</div>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon"><i class="fas fa-times-circle"></i></div>
                            <div class="feature-name feature-unavailable">خدمة المواعيد المميزة</div>
                        </div>
                    </div>

                    <div class="subscription-actions">
                        <button class="action-btn primary large">
                            <i class="fas fa-sync-alt"></i> ترقية للاشتراك المميز
                        </button>
                    </div>
                </div>
            </div>

            <!-- جدول المقارنة -->
            <div class="comparison-section">
                <h3 style="margin: 30px 0 20px;">مقارنة بين الخطط</h3>

                <table class="comparison-table">
                    <thead>
                        <tr>
                            <th>الميزة</th>
                            <th>الاشتراك الأساسي</th>
                            <th>الاشتراك المميز</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="feature-name">عدد الطلبات السنوية</td>
                            <td>12 طلب</td>
                            <td>غير محدود</td>
                        </tr>
                        <tr>
                            <td class="feature-name">دعم فني</td>
                            <td>أوقات العمل</td>
                            <td>24/7</td>
                        </tr>
                        <tr>
                            <td class="feature-name">تحديثات حالة الطلب</td>
                            <td>يومية</td>
                            <td>فورية</td>
                        </tr>
                        <tr>
                            <td class="feature-name">خصم على الاستشارات</td>
                            <td>10%</td>
                            <td>20%</td>
                        </tr>
                        <tr>
                            <td class="feature-name">الإشعارات الفورية</td>
                            <td class="unavailable"><i class="fas fa-times"></i></td>
                            <td class="available"><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">خدمة المواعيد المميزة</td>
                            <td class="unavailable"><i class="fas fa-times"></i></td>
                            <td class="available"><i class="fas fa-check"></i></td>
                        </tr>
                        <tr>
                            <td class="feature-name">عدد المستخدمين</td>
                            <td>1</td>
                            <td>3</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- طرق الدفع -->
            <div class="payment-methods">
                <h3>طرق الدفع</h3>
                <p>بطاقات الدفع المحفوظة في حسابك:</p>

                <div class="payment-cards">
                    <div class="payment-card active">
                        <div class="default-badge">الافتراضية</div>
                        <div class="card-icon">
                            <i class="fab fa-cc-visa"></i>
                        </div>
                        <div>
                            <div>بطاقة فيزا</div>
                            <div>**** **** **** 1234</div>
                            <div class="card-actions">
                                <button class="action-btn danger small">
                                    <i class="fas fa-trash-alt"></i> إزالة
                                </button>
                                <button class="action-btn small">
                                    <i class="fas fa-edit"></i> تعديل
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="payment-card">
                        <div class="card-icon">
                            <i class="fab fa-cc-mastercard"></i>
                        </div>
                        <div>
                            <div>بطاقة ماستركارد</div>
                            <div>**** **** **** 5678</div>
                            <div class="card-actions">
                                <button class="action-btn danger small">
                                    <i class="fas fa-trash-alt"></i> إزالة
                                </button>
                                <button class="action-btn small">
                                    <i class="fas fa-edit"></i> تعديل
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <button class="action-btn" id="add-card-btn" style="margin-top: 15px;">
                    <i class="fas fa-plus-circle"></i> إضافة بطاقة جديدة
                </button>
            </div>

            <!-- الفواتير -->
            <div class="invoices-section">
                <h3>الفواتير</h3>
                <p>سجل الفواتير والدفعات السابقة:</p>

                <div class="invoice-list">
                    <div class="invoice-item">
                        <div class="invoice-details">
                            <div>فاتورة #INV-2023-08</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">15 أغسطس 2023</div>
                        </div>
                        <div>
                            <span style="font-weight: 500;">500 ر.س</span>
                            <button class="action-btn small">
                                <i class="fas fa-download"></i> تحميل
                            </button>
                        </div>
                    </div>

                    <div class="invoice-item">
                        <div class="invoice-details">
                            <div>فاتورة #INV-2023-07</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">15 يوليو 2023</div>
                        </div>
                        <div>
                            <span style="font-weight: 500;">500 ر.س</span>
                            <button class="action-btn small">
                                <i class="fas fa-download"></i> تحميل
                            </button>
                        </div>
                    </div>

                    <div class="invoice-item">
                        <div class="invoice-details">
                            <div>فاتورة #INV-2023-06</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">15 يونيو 2023</div>
                        </div>
                        <div>
                            <span style="font-weight: 500;">500 ر.س</span>
                            <button class="action-btn small">
                                <i class="fas fa-download"></i> تحميل
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- التذكيرات -->
            <div class="reminders-section">
                <h3>تذكيرات التجديد</h3>
                <p>اختر كيف ترغب في تلقي تذكيرات قبل انتهاء اشتراكك:</p>

                <div class="reminder-options">
                    <div class="reminder-option">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                        <div>البريد الإلكتروني</div>
                    </div>

                    <div class="reminder-option">
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                        <div>رسائل الجوال</div>
                    </div>

                    <div class="reminder-option">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                        <div>إشعارات التطبيق</div>
                    </div>
                </div>

                <div style="margin-top: 15px;">
                    <label>قبل التجديد بـ:</label>
                    <select style="margin-right: 10px; padding: 8px; border-radius: 8px; border: 1px solid #ddd;">
                        <option>3 أيام</option>
                        <option>7 أيام</option>
                        <option>14 يوم</option>
                        <option>30 يوم</option>
                    </select>
                </div>
            </div>

            <!-- الأسئلة الشائعة -->
            <div class="faq-container">
                <div class="faq-header">
                    <h3>الأسئلة الشائعة حول الاشتراكات</h3>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        كيف يمكنني تغيير خطة الاشتراك؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        يمكنك تغيير خطة الاشتراك في أي وقت عن طريق:
                        <ol style="margin: 10px 0 10px 20px;">
                            <li>الدخول إلى صفحة الاشتراكات</li>
                            <li>اختيار الخطة الجديدة</li>
                            <li>الضغط على زر "الترقية" أو "التغيير"</li>
                            <li>اتمام عملية الدفع</li>
                        </ol>
                        سيتم تطبيق التغيير فوراً على حسابك.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        هل يمكنني الحصول على رد المال إذا لم أرضى عن الخدمة؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        نعم، نوفر ضمان استعادة الأموال خلال 30 يوم من الاشتراك. إذا لم تكن راضياً عن الخدمة، يمكنك طلب
                        استرجاع المال وسنقوم بإرجاع المبلغ كاملاً.
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        ماذا يحدث عند انتهاء الاشتراك؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        عند انتهاء الاشتراك:
                        <ul style="margin: 10px 0 10px 20px;">
                            <li>سيتم إرسال عدة تنبيهات قبل انتهاء الاشتراك</li>
                            <li>بعد انتهاء الاشتراك، ستتحول حسابك إلى الخطة المجانية</li>
                            <li>ستحتفظ بجميع بياناتك وطلباتك السابقة</li>
                            <li>يمكنك تجديد الاشتراك في أي وقت لاستعادة الميزات الكاملة</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        هل يمكنني مشاركة الاشتراك مع آخرين؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        الاشتراك الأساسي يسمح بمستخدم واحد فقط. الاشتراك المميز يسمح بثلاثة مستخدمين. يمكنك إدارة
                        المستخدمين من خلال صفحة إعدادات الاشتراك.
                    </div>
                </div>
            </div>

            <!-- ضمان الاسترجاع -->
            <div class="guarantee-card">
                <h3><i class="fas fa-shield-alt"></i> ضمان استعادة الأموال لمدة 30 يوم</h3>
                <p>إذا لم تكن راضيًا عن خدماتنا لأي سبب، سنقوم بإرجاع مالك بالكامل خلال 30 يوم من تاريخ الاشتراك.</p>
            </div>
        </div>
    </div>

    <!-- نافذة سجل الاشتراكات المنبثقة -->
    <div class="modal-overlay" id="history-modal">
        <div class="modal">
            <div class="modal-header">
                <h3><i class="fas fa-history"></i> سجل الاشتراكات</h3>
                <button class="modal-close" onclick="closeModal('history-modal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>سجل الاشتراكات والدفعات السابقة:</p>

                <div class="subscription-history">
                    <div class="history-item">
                        <div class="history-details">
                            <div>الاشتراك المميز - سنوي</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">15 أغسطس 2023</div>
                        </div>
                        <div class="history-amount">500 ر.س</div>
                        <div class="history-status status-success">ناجح</div>
                    </div>

                    <div class="history-item">
                        <div class="history-details">
                            <div>الاشتراك المميز - سنوي</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">15 يوليو 2023</div>
                        </div>
                        <div class="history-amount">500 ر.س</div>
                        <div class="history-status status-success">ناجح</div>
                    </div>

                    <div class="history-item">
                        <div class="history-details">
                            <div>الاشتراك الأساسي - سنوي</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">20 يونيو 2023</div>
                        </div>
                        <div class="history-amount">250 ر.س</div>
                        <div class="history-status status-success">ناجح</div>
                    </div>

                    <div class="history-item">
                        <div class="history-details">
                            <div>الاشتراك الأساسي - سنوي</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">15 مايو 2023</div>
                        </div>
                        <div class="history-amount">250 ر.س</div>
                        <div class="history-status status-cancelled">ملغي</div>
                    </div>

                    <div class="history-item">
                        <div class="history-details">
                            <div>الاشتراك الأساسي - سنوي</div>
                            <div style="color: var(--light-text); font-size: 0.9rem;">15 أبريل 2023</div>
                        </div>
                        <div class="history-amount">250 ر.س</div>
                        <div class="history-status status-success">ناجح</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="action-btn" onclick="closeModal('history-modal')">
                    <i class="fas fa-times"></i> إغلاق
                </button>
            </div>
        </div>
    </div>

    <!-- نافذة إضافة بطاقة جديدة (تم تحديثها) -->
    <div class="modal-overlay" id="add-card-modal">
        <div class="modal">
            <div class="modal-header">
                <h3><i class="fas fa-credit-card"></i> إضافة طريقة دفع جديدة</h3>
                <button class="modal-close" onclick="closeModal('add-card-modal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- حقل اختيار طريقة الدفع -->
                <div class="payment-method-selector">
                    <label for="payment-method">طريقة الدفع</label>
                    <select id="payment-method" class="edit-input" onchange="changePaymentMethod()">
                        <option value="credit-card">بطاقة ائتمان (فيزا/ماستركارد)</option>
                        <option value="cash">الدفع عند الاستلام</option>
                        <option value="bank-transfer">تحويل بنكي</option>
                        <option value="mobile-wallet">محفظة إلكترونية</option>
                    </select>
                </div>

                <!-- معاينة البطاقة -->
                <div class="card-preview" id="card-preview">
                    <div class="card-logo">
                        <i class="fab fa-cc-visa"></i>
                    </div>
                    <div class="card-number">•••• •••• •••• ••••</div>
                    <div class="card-bottom">
                        <div class="card-name">اسم حامل البطاقة</div>
                        <div class="card-expiry">MM/YY</div>
                    </div>
                </div>

                <!-- خيار بطاقة الائتمان -->
                <div class="payment-option active" id="credit-card-option">
                    <div class="card-form">
                        <div class="form-group">
                            <label for="card-number">رقم البطاقة</label>
                            <input type="text" id="card-number" class="edit-input" placeholder="1234 5678 9012 3456"
                                maxlength="19">
                        </div>

                        <div class="form-group">
                            <label for="card-name">اسم حامل البطاقة</label>
                            <input type="text" id="card-name" class="edit-input" placeholder="كما هو مكتوب على البطاقة">
                        </div>

                        <div class="form-group">
                            <label for="card-expiry">تاريخ الانتهاء</label>
                            <input type="text" id="card-expiry" class="edit-input" placeholder="MM/YY" maxlength="5">
                        </div>

                        <div class="form-group">
                            <label for="card-cvv">رمز الحماية (CVV)</label>
                            <input type="text" id="card-cvv" class="edit-input" placeholder="123" maxlength="3">
                        </div>
                    </div>

                    <div class="payment-info">
                        <h4><i class="fas fa-info-circle"></i> معلومات هامة</h4>
                        <ul>
                            <li>تتوافق مع البطاقات الصادرة من البنوك اليمنية</li>
                            <li>تأكد من أن بطاقتك تدعم المعاملات الإلكترونية الدولية</li>
                            <li>سيتم خصم مبلغ رمزي للتأكيد وسيتم إرجاعه تلقائيًا</li>
                            <li>بياناتك محمية بتقنيات التشفير المتقدمة</li>
                        </ul>
                    </div>
                </div>

                <!-- خيار الدفع عند الاستلام -->
                <div class="payment-option" id="cash-option">
                    <div class="cash-instructions">
                        <div class="cash-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <h4>طريقة الدفع عند الاستلام</h4>
                        <p>عند اختيار الدفع عند الاستلام، يمكنك تسديد المبلغ عند استلام الخدمة أو التوجه إلى أحد نقاط
                            الدفع المعتمدة في مدينتك.</p>

                        <div class="steps">
                            <div class="step">
                                <div class="step-number">1</div>
                                <div class="step-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="step-title">تقديم الطلب</div>
                                <div class="step-description">اختر "الدفع عند الاستلام"</div>
                            </div>

                            <div class="step">
                                <div class="step-number">2</div>
                                <div class="step-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="step-title">تحديد الموقع</div>
                                <div class="step-description">سنحدد لك أقرب نقطة دفع</div>
                            </div>

                            <div class="step">
                                <div class="step-number">3</div>
                                <div class="step-icon">
                                    <i class="fas fa-money-check-alt"></i>
                                </div>
                                <div class="step-title">سداد المبلغ</div>
                                <div class="step-description">توجه إلى نقطة الدفع وسدد المبلغ</div>
                            </div>
                        </div>
                    </div>

                    <div class="payment-info">
                        <h4><i class="fas fa-info-circle"></i> معلومات هامة</h4>
                        <ul>
                            <li>متاح في جميع محافظات اليمن</li>
                            <li>نقاط الدفع تشمل فروع البنوك ومكاتب الصرافة</li>
                            <li>يجب سداد المبلغ خلال 48 ساعة من تقديم الطلب</li>
                            <li>سيتم إلغاء الطلب تلقائيًا إذا لم يتم السداد</li>
                        </ul>
                    </div>
                </div>

                <!-- خيار التحويل البنكي -->
                <div class="payment-option" id="bank-transfer-option">
                    <div class="card-form">
                        <div class="form-group">
                            <label for="bank-name">اسم البنك</label>
                            <select id="bank-name" class="edit-input">
                                <option value="">اختر البنك</option>
                                <option value="tadamon">بنك التضامن الإسلامي</option>
                                <option value="kurd">بنك كردفان</option>
                                <option value="iman">بنك الإيمان</option>
                                <option value="shamil">بنك الشامل</option>
                                <option value="yemen">البنك اليمني للتمويل والإستثمار</option>
                                <option value="saba">بنك سبأ الإسلامي</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="account-name">اسم صاحب الحساب</label>
                            <input type="text" id="account-name" class="edit-input" placeholder="كما هو مسجل في البنك">
                        </div>

                        <div class="form-group">
                            <label for="account-number">رقم الحساب</label>
                            <input type="text" id="account-number" class="edit-input" placeholder="رقم الحساب البنكي">
                        </div>

                        <div class="form-group">
                            <label for="iban">الرقم الدولي (IBAN)</label>
                            <input type="text" id="iban" class="edit-input" placeholder="YEXX XXXX XXXX XXXX XXXX XXXX">
                        </div>
                    </div>

                    <div class="yemen-banks">
                        <div class="bank-logo">
                            <div>بنك التضامن</div>
                        </div>
                        <div class="bank-logo">
                            <div>بنك كردفان</div>
                        </div>
                        <div class="bank-logo">
                            <div>بنك الإيمان</div>
                        </div>
                        <div class="bank-logo">
                            <div>بنك الشامل</div>
                        </div>
                    </div>

                    <div class="payment-info">
                        <h4><i class="fas fa-info-circle"></i> معلومات هامة</h4>
                        <ul>
                            <li>تتوافق مع جميع البنوك المحلية في اليمن</li>
                            <li>يجب أن يكون اسم الحساب مطابقًا لاسمك المسجل</li>
                            <li>سيتم إرسال رمز تأكيد إلى هاتفك المسجل في البنك</li>
                            <li>قد تستغرق التحويلات البنكية 24-48 ساعة</li>
                        </ul>
                    </div>
                </div>

                <!-- خيار المحفظة الإلكترونية -->
                <div class="payment-option" id="mobile-wallet-option">
                    <div class="card-form">
                        <div class="form-group">
                            <label for="wallet-provider">مزود المحفظة</label>
                            <select id="wallet-provider" class="edit-input">
                                <option value="">اختر مزود المحفظة</option>
                                <option value="mywallet">محفظتي (MyWallet)</option>
                                <option value="yemenmobile">يمن موبايل (Yemen Mobile)</option>
                                <option value="sabafon">صبة فون (SabaFon)</option>
                                <option value="mtn">MTN Yemen</option>
                                <option value="y">Y Cash</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mobile-number">رقم الجوال</label>
                            <input type="text" id="mobile-number" class="edit-input" placeholder="7XXXXXXXX"
                                maxlength="9">
                        </div>

                        <div class="form-group">
                            <label for="wallet-pin">رمز PIN</label>
                            <input type="password" id="wallet-pin" class="edit-input"
                                placeholder="أدخل رمز PIN المكون من 4-6 أرقام">
                        </div>
                    </div>

                    <div class="mobile-wallets">
                        <div class="wallet-option">
                            <div class="wallet-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                            <div class="wallet-name">محفظتي</div>
                        </div>

                        <div class="wallet-option">
                            <div class="wallet-icon">
                                <i class="fas fa-sim-card"></i>
                            </div>
                            <div class="wallet-name">يمن موبايل</div>
                        </div>

                        <div class="wallet-option">
                            <div class="wallet-icon">
                                <i class="fas fa-mobile"></i>
                            </div>
                            <div class="wallet-name">صبة فون</div>
                        </div>
                    </div>

                    <div class="payment-info">
                        <h4><i class="fas fa-info-circle"></i> معلومات هامة</h4>
                        <ul>
                            <li>تتوافق مع جميع مزودي المحافظ الإلكترونية في اليمن</li>
                            <li>يجب أن يكون رقم الجوال مسجلاً ومفعلًا للمحفظة الإلكترونية</li>
                            <li>لن يتم تخزين رمز PIN الخاص بك لأسباب أمنية</li>
                            <li>الحد الأدنى للدفع: 500 ريال يمني</li>
                        </ul>
                    </div>
                </div>

                <div class="card-icons">
                    <div class="card-icon-item">
                        <i class="fab fa-cc-visa"></i>
                    </div>
                    <div class="card-icon-item">
                        <i class="fab fa-cc-mastercard"></i>
                    </div>
                    <div class="card-icon-item">
                        <i class="fab fa-cc-amex"></i>
                    </div>
                    <div class="card-icon-item">
                        <i class="fab fa-cc-discover"></i>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="action-btn danger" onclick="closeModal('add-card-modal')">
                    <i class="fas fa-times"></i> إلغاء
                </button>
                <button class="action-btn primary" onclick="addNewCard()">
                    <i class="fas fa-save"></i> حفظ البطاقة
                </button>
            </div>
        </div>
    </div>

    <script>
        // تبديل الأسئلة الشائعة
        function toggleFAQ(element) {
            element.classList.toggle('active');
        }

        // تبديل الدفع الشهري/السنوي
        document.getElementById('billing-toggle').addEventListener('change', function () {
            const prices = document.querySelectorAll('.subscription-price');
            const periods = document.querySelectorAll('.subscription-period');

            if (this.checked) {
                // التبديل إلى الدفع الشهري
                prices[0].textContent = '50 ر.س';
                periods[0].textContent = '/ شهري';
                prices[1].textContent = '25 ر.س';
                periods[1].textContent = '/ شهري';
            } else {
                // التبديل إلى الدفع السنوي
                prices[0].textContent = '500 ر.س';
                periods[0].textContent = '/ سنوي';
                prices[1].textContent = '250 ر.س';
                periods[1].textContent = '/ سنوي';
            }
        });

        // تأكيد إلغاء الاشتراك
        document.querySelector('.action-btn.danger').addEventListener('click', function () {
            const confirmed = confirm('هل أنت متأكد من رغبتك في إلغاء الاشتراك؟ سيتم إيقاف خدماتك بعد نهاية الفترة الحالية.');
            if (confirmed) {
                alert('تم إلغاء الاشتراك بنجاح. سيستمر اشتراكك حتى تاريخ 15 سبتمبر 2023.');
            }
        });

        // إدارة النوافذ المنبثقة
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // فتح سجل الاشتراكات
        document.getElementById('show-history-btn').addEventListener('click', function () {
            openModal('history-modal');
        });

        // فتح نافذة إضافة بطاقة
        document.getElementById('add-card-btn').addEventListener('click', function () {
            openModal('add-card-modal');
            // إعادة تعيين الطريقة إلى الافتراضية عند فتح النافذة
            document.getElementById('payment-method').value = 'credit-card';
            changePaymentMethod();
        });

        // تغيير طريقة الدفع
        function changePaymentMethod() {
            const method = document.getElementById('payment-method').value;
            const options = document.querySelectorAll('.payment-option');
            const preview = document.getElementById('card-preview');

            // إخفاء جميع الخيارات
            options.forEach(option => option.classList.remove('active'));

            // إظهار الخيار المحدد
            document.getElementById(`${method}-option`).classList.add('active');

            // تحديث معاينة البطاقة
            preview.className = 'card-preview';

            switch (method) {
                case 'credit-card':
                    preview.classList.add('credit-card');
                    break;
                case 'cash':
                    preview.classList.add('cash');
                    preview.querySelector('.card-number').textContent = 'الدفع عند الاستلام';
                    preview.querySelector('.card-name').textContent = 'نقاط الدفع المعتمدة';
                    preview.querySelector('.card-expiry').textContent = 'YEM';
                    break;
                case 'bank-transfer':
                    preview.classList.add('bank');
                    preview.querySelector('.card-number').textContent = 'رقم الحساب البنكي';
                    preview.querySelector('.card-name').textContent = 'اسم صاحب الحساب';
                    preview.querySelector('.card-expiry').textContent = 'YEM';
                    break;
                case 'mobile-wallet':
                    preview.classList.add('mobile');
                    preview.querySelector('.card-number').textContent = 'رقم الجوال';
                    preview.querySelector('.card-name').textContent = 'محفظتي';
                    preview.querySelector('.card-expiry').textContent = 'YEM';
                    break;
            }
        }

        // إضافة بطاقة جديدة
        function addNewCard() {
            const method = document.getElementById('payment-method').value;
            let valid = true;
            let message = '';

            switch (method) {
                case 'credit-card':
                    const cardNumber = document.getElementById('card-number').value;
                    const cardName = document.getElementById('card-name').value;
                    const cardExpiry = document.getElementById('card-expiry').value;
                    const cardCvv = document.getElementById('card-cvv').value;

                    if (!cardNumber || !cardName || !cardExpiry || !cardCvv) {
                        valid = false;
                        message = 'الرجاء ملء جميع حقول بطاقة الائتمان';
                    } else if (cardNumber.replace(/\s/g, '').length < 16) {
                        valid = false;
                        message = 'رقم البطاقة يجب أن يحتوي على 16 رقم على الأقل';
                    } else if (cardCvv.length < 3) {
                        valid = false;
                        message = 'رمز الحماية يجب أن يحتوي على 3 أرقام على الأقل';
                    }
                    break;

                case 'cash':
                    // لا توجد حقول إلزامية للدفع عند الاستلام
                    break;

                case 'bank-transfer':
                    const bankName = document.getElementById('bank-name').value;
                    const accountName = document.getElementById('account-name').value;
                    const accountNumber = document.getElementById('account-number').value;

                    if (!bankName || !accountName || !accountNumber) {
                        valid = false;
                        message = 'الرجاء ملء جميع حقول التحويل البنكي';
                    }
                    break;

                case 'mobile-wallet':
                    const walletProvider = document.getElementById('wallet-provider').value;
                    const mobileNumber = document.getElementById('mobile-number').value;
                    const walletPin = document.getElementById('wallet-pin').value;

                    if (!walletProvider || !mobileNumber || !walletPin) {
                        valid = false;
                        message = 'الرجاء ملء جميع حقول المحفظة الإلكترونية';
                    } else if (mobileNumber.length !== 9) {
                        valid = false;
                        message = 'رقم الجوال يجب أن يتكون من 9 أرقام';
                    } else if (walletPin.length < 4 || walletPin.length > 6) {
                        valid = false;
                        message = 'رمز PIN يجب أن يتكون من 4-6 أرقام';
                    }
                    break;
            }

            if (!valid) {
                alert(message);
                return;
            }

            // في التطبيق الحقيقي، هنا سيتم إرسال البيانات للخادم
            alert(`تم إضافة طريقة الدفع (${document.getElementById('payment-method').options[document.getElementById('payment-method').selectedIndex].text}) بنجاح!`);
            closeModal('add-card-modal');

            // إعادة تعيين النموذج
            document.getElementById('payment-method').value = 'credit-card';
            changePaymentMethod();
        }

        // تنسيق رقم البطاقة أثناء الكتابة
        document.getElementById('card-number')?.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, '');
            let formatted = '';

            for (let i = 0; i < value.length; i++) {
                if (i > 0 && i % 4 === 0) formatted += ' ';
                formatted += value[i];
            }

            this.value = formatted;

            // تحديث معاينة البطاقة
            const method = document.getElementById('payment-method').value;
            if (method === 'credit-card') {
                const cardNumberPreview = document.querySelector('.card-preview.credit-card .card-number');
                if (cardNumberPreview) {
                    cardNumberPreview.textContent = formatted || '•••• •••• •••• ••••';
                }
            }
        });

        // تنسيق تاريخ الانتهاء
        document.getElementById('card-expiry')?.addEventListener('input', function () {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 2) {
                this.value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }

            // تحديث معاينة البطاقة
            const method = document.getElementById('payment-method').value;
            if (method === 'credit-card') {
                const expiryPreview = document.querySelector('.card-preview.credit-card .card-expiry');
                if (expiryPreview) {
                    expiryPreview.textContent = this.value || 'MM/YY';
                }
            }
        });

        // تحديث اسم حامل البطاقة
        document.getElementById('card-name')?.addEventListener('input', function () {
            const method = document.getElementById('payment-method').value;
            if (method === 'credit-card') {
                const namePreview = document.querySelector('.card-preview.credit-card .card-name');
                if (namePreview) {
                    namePreview.textContent = this.value || 'اسم حامل البطاقة';
                }
            }
        });

        // تحديث رقم الجوال للمحفظة
        document.getElementById('mobile-number')?.addEventListener('input', function () {
            const method = document.getElementById('payment-method').value;
            if (method === 'mobile-wallet') {
                const numberPreview = document.querySelector('.card-preview.mobile .card-number');
                if (numberPreview) {
                    numberPreview.textContent = this.value || 'رقم الجوال';
                }
            }
        });

        // تحديث مزود المحفظة
        document.getElementById('wallet-provider')?.addEventListener('change', function () {
            const method = document.getElementById('payment-method').value;
            if (method === 'mobile-wallet') {
                const providerName = this.options[this.selectedIndex].text;
                const namePreview = document.querySelector('.card-preview.mobile .card-name');
                if (namePreview) {
                    namePreview.textContent = providerName || 'محفظتي';
                }
            }
        });

        // تحديث اسم البنك
        document.getElementById('bank-name')?.addEventListener('change', function () {
            const method = document.getElementById('payment-method').value;
            if (method === 'bank-transfer') {
                const bankName = this.options[this.selectedIndex].text;
                const namePreview = document.querySelector('.card-preview.bank .card-name');
                if (namePreview) {
                    namePreview.textContent = bankName || 'اسم البنك';
                }
            }
        });

        // تحديث رقم الحساب البنكي
        document.getElementById('account-number')?.addEventListener('input', function () {
            const method = document.getElementById('payment-method').value;
            if (method === 'bank-transfer') {
                const numberPreview = document.querySelector('.card-preview.bank .card-number');
                if (numberPreview) {
                    numberPreview.textContent = this.value || 'رقم الحساب البنكي';
                }
            }
        });

        // تحسين دقة التحقق من صحة البيانات
        function validatePayment() {
            const method = document.getElementById('payment-method').value;

            // تحسين تحقق البنوك اليمنية
            if (method === 'bank-transfer') {
                const bankName = document.getElementById('bank-name').value;
                if (!bankName) {
                    showError('الرجاء اختيار بنك يمني');
                    return false;
                }
            }

            // تحسين تحقق المحافظ الإلكترونية
            if (method === 'mobile-wallet') {
                const mobileNumber = document.getElementById('mobile-number').value;
                if (!/^7\d{8}$/.test(mobileNumber)) {
                    showError('رقم الجوال اليمني يجب أن يبدأ بـ 7 ويحتوي على 9 أرقام');
                    return false;
                }
            }

            return true;
        }

        // إضافة رسائل خطأ أكثر وضوحاً
        function showError(message) {
            const errorDiv = document.getElementById('payment-error') || document.createElement('div');
            errorDiv.id = 'payment-error';
            errorDiv.style.color = 'var(--danger)';
            errorDiv.style.padding = '10px';
            errorDiv.style.marginTop = '10px';
            errorDiv.style.borderRadius = '5px';
            errorDiv.style.backgroundColor = 'rgba(231, 76, 60, 0.1)';
            errorDiv.textContent = `❌ ${message}`;

            const form = document.querySelector('.modal-body');
            if (!document.getElementById('payment-error')) {
                form.insertBefore(errorDiv, form.firstChild);
            } else {
                errorDiv.textContent = `❌ ${message}`;
            }
        }
    </script>
</body>

</html>