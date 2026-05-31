<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام تراخيص البناء الألكتروني - تسجيل الدخول</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-dark: #0a1a2e;
            --primary: #142a4e;
            --primary-light: #1e3a6e;
            --accent: #d4af37;
            --accent-light: #e8c874;
            --light: #ffffff;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --text: #2c3e50;
            --border: #dee2e6;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --info: #17a2b8;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.08);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.12);
            --shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.16);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-dark) 100%);
            color: var(--text);
            line-height: 1.6;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
        }

        .login-card {
            background-color: var(--light);
            border-radius: 16px;
            box-shadow: var(--shadow-lg);
            padding: 2.5rem;
            border: 1px solid var(--border);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--accent), var(--accent-light));
        }

        .login-header {
            text-align: center;
        }

        .login-logo {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: var(--shadow-md);
        }

        .login-logo i {
            font-size: 2.5rem;
            color: var(--accent);
        }

        .login-title {
            font-weight: 800;
            font-size: 1.8rem;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .login-subtitle {
            color: var(--dark-gray);
            font-size: 1rem;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .form-control {
            /* border-radius: 10px; */
            padding: 0.85rem 1rem;
            border: 1px solid var(--border);
            transition: var(--transition);
            background-color: var(--light-gray);
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(20, 42, 78, 0.15);
        }

        .input-group-text {
            background-color: var(--light-gray);
            border: 1px solid var(--border);
            border-radius: 0 10px 10px 0;

        }

        .password-toggle {
            cursor: pointer;
            color: var(--dark-gray);
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
            padding: 0.85rem;
            font-weight: 700;
            border-radius: 10px;
            transition: var(--transition);
            width: 100%;
            margin-top: 1rem;
            box-shadow: 0 4px 12px rgba(20, 42, 78, 0.25);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(20, 42, 78, 0.35);
            color: white;
        }

        .login-footer {
            text-align: center;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
            color: var(--dark-gray);
            font-size: 0.85rem;
        }

        .security-notice {
            background-color: var(--light-gray);
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
            border-left: 4px solid var(--accent);
            font-size: 0.8rem;
        }

        .security-notice i {
            color: var(--accent);
            margin-left: 0.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1.5rem;
            }

            .login-logo {
                width: 80px;
                height: 80px;
            }

            .login-logo i {
                font-size: 2rem;
            }

            .login-title {
                font-size: 1.5rem;
            }
        }

          .small-link {
            font-size:.8rem;
            text-decoration:none;
            color: var(--primary);
        }
        .small-link:hover { text-decoration:underline; }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <i class="fas fa-building-shield"></i>
                </div>
                <h1 class="login-title">نظام تراخيص البناء الألكتروني</h1>
                <p class="login-subtitle">يجب تسجيل الدخول للوصول إلى النظام</p>
            </div>

            <!-- نموذج تسجيل الدخول مع Laravel -->
            <form method="POST" action="{{ route('beneficiary.login') }}">
                @csrf

                <!-- عرض أخطاء المصادقة -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- عرض رسائل النجاح -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif


                <div class="mb-3">
                    <label for="identity_number" class="form-label">رقم الهوية</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" id="identity_number" name="identity_number"
                            class="form-control @error('identity_number') is-invalid @enderror" required autofocus>
                        @error('identity_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i>تسجيل الدخول
                </button>
                 <div class="text-center mt-3">
                <a href="{{ route('beneficiary.register') }}" class="small-link">
                    <i class="fas fa-user-plus"></i> انشاء حساب جديد
                </a>
            </div>
            </form>

            <div class="login-footer">
                <p>للإبلاغ عن مشاكل تقنية يرجى الاتصال على: <strong>19999</strong></p>
                <p class="mb-0">وزارة الاشغال © 2025</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Password Toggle Visibility
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function() {
                // Toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle the icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
</body>

</html>
