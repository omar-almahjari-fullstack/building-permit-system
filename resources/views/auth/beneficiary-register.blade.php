<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب مستفيد - نظام تراخيص البناء الإلكتروني</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --danger: #dc3545;
            --transition: all .3s cubic-bezier(.25,.8,.25,1);
            --shadow-lg: 0 8px 24px rgba(0,0,0,.16);
            --shadow-md: 0 4px 12px rgba(0,0,0,.12);
        }
        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-dark) 100%);
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 40px 15px;
            color: var(--text);
        }
        .login-container { width:100%; max-width:760px; }
        .login-card {
            background: var(--light);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            padding: 2.2rem 2.4rem 2rem;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
        }
        .login-card:before {
            content:"";
            position:absolute;
            top:0; right:0; left:0;
            height:6px;
            background: linear-gradient(90deg,var(--accent),var(--accent-light));
        }
        .login-header { text-align:center; margin-bottom:1.4rem; }
        .login-logo {
            width:90px; height:90px;
            background:linear-gradient(135deg,var(--primary),var(--primary-dark));
            border-radius:50%;
            display:flex; align-items:center; justify-content:center;
            margin:0 auto 1rem;
            box-shadow: var(--shadow-md);
        }
        .login-logo i { font-size:2.4rem; color:var(--accent); }
        .login-title { font-weight:800; font-size:1.75rem; color:var(--primary); margin-bottom:.4rem; }
        .login-subtitle { color:var(--dark-gray); font-size:.95rem; }
        .form-label { font-weight:600; color:var(--primary); }
        .form-control, .form-select {
            background: var(--light-gray);
            border:1px solid var(--border);
            padding:.75rem .9rem;
            transition: var(--transition);
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 .25rem rgba(20,42,78,.15);
        }
        .input-group-text {
            background: var(--light-gray);
            border:1px solid var(--border);
        }
        .section-divider {
            font-size:.9rem;
            font-weight:700;
            color: var(--primary);
            position:relative;
            padding-bottom:.4rem;
            margin:1.8rem 0 1rem;
        }
        .section-divider:after {
            content:"";
            position:absolute;
            right:0; bottom:0;
            width:60px; height:3px;
            background: linear-gradient(90deg,var(--accent),var(--accent-light));
            border-radius:2px;
        }
        .password-toggle-btn {
            cursor:pointer;
            color: var(--dark-gray);
            transition: var(--transition);
        }
        .password-toggle-btn:hover { color: var(--primary); }
        .btn-submit {
            background:linear-gradient(135deg,var(--primary),var(--primary-dark));
            border:none;
            color:#fff;
            font-weight:700;
            padding:.9rem 1.2rem;
            border-radius:12px;
            width:100%;
            margin-top:.5rem;
            box-shadow: 0 4px 12px rgba(20,42,78,.25);
            transition: var(--transition);
        }
        .btn-submit:hover {
            transform:translateY(-2px);
            box-shadow: 0 6px 16px rgba(20,42,78,.35);
            color:#fff;
        }
        .login-footer {
            text-align:center;
            margin-top:2.2rem;
            font-size:.8rem;
            color: var(--dark-gray);
        }
        .terms-box {
            background: var(--light-gray);
            border:1px solid var(--border);
            padding:.9rem 1rem;
            border-radius:10px;
            font-size:.8rem;
            line-height:1.5;
        }
        .alert ul { margin:0; padding-right:20px; }
        @media (max-width: 768px) {
            .login-card { padding:1.7rem 1.4rem 1.3rem; }
            .login-title { font-size:1.45rem; }
            .grid-two { grid-template-columns:1fr; gap:1rem; }
        }
        .grid-two {
            display:grid;
            grid-template-columns: 1fr 1fr;
            gap:1.15rem 1.2rem;
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
                <i class="fas fa-user-plus"></i>
            </div>
            <h1 class="login-title">إنشاء حساب مستفيد</h1>
            <p class="login-subtitle">قم بتعبئة البيانات التالية لإتمام التسجيل</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>حدثت أخطاء، يرجى المراجعة:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('beneficiary.register.submit') }}" novalidate>
            @csrf

            <div class="section-divider">المعلومات الأساسية</div>
            <div class="grid-two">
                <div>
                    <label class="form-label" for="identity_number">رقم الهوية</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" name="identity_number" id="identity_number"
                               class="form-control @error('identity_number') is-invalid @enderror"
                               value="{{ old('identity_number') }}" required>
                        @error('identity_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div>
                    <label class="form-label" for="identity_type">نوع الهوية</label>
                    <select name="identity_type" id="identity_type"
                            class="form-select @error('identity_type') is-invalid @enderror" required>
                        <option value="">اختر...</option>
                        <option value="بطاقة شخصية" {{ old('identity_type')=='بطاقة شخصية'?'selected':'' }}>بطاقة شخصية</option>
                        <option value="جواز" {{ old('identity_type')=='جواز'?'selected':'' }}>جواز</option>
                    </select>
                    @error('identity_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label class="form-label" for="name">الاسم الكامل</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" name="name" id="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div>
                    <label class="form-label" for="mobile">رقم الجوال</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-mobile-screen"></i></span>
                        <input type="text" name="mobile" id="mobile"
                               class="form-control @error('mobile') is-invalid @enderror"
                               value="{{ old('mobile') }}" required>
                        @error('mobile') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div>
                    <label class="form-label" for="email">البريد الإلكتروني (اختياري)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" name="email" id="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div>
                    <label class="form-label" for="directorate_id">المديرية</label>
                    <select name="directorate_id" id="directorate_id"
                            class="form-select @error('directorate_id') is-invalid @enderror" required>
                        <option value="">اختر...</option>
                        @foreach($directorates as $d)
                            <option value="{{ $d->id }}" {{ old('directorate_id')==$d->id?'selected':'' }}>{{ $d->name }}</option>
                        @endforeach
                    </select>
                    @error('directorate_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-span-2" style="grid-column:1 / -1">
                    <label class="form-label" for="address">العنوان (اختياري)</label>
                    <textarea name="address" id="address" rows="2"
                              class="form-control @error('address') is-invalid @enderror"
                              placeholder="مثال: شارع xx - حي xx">{{ old('address') }}</textarea>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="section-divider">بيانات الدخول</div>
            <div class="grid-two">
                <div>
                    <label class="form-label" for="password">كلمة المرور</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror" required>
                        <span class="input-group-text password-toggle-btn" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </span>
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-text">
                        الحد الأدنى 8 أحرف ويفضل احتواءها على أرقام وحروف ورموز.
                    </div>
                </div>

                <div>
                    <label class="form-label" for="password_confirmation">تأكيد كلمة المرور</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control" required>
                        <span class="input-group-text password-toggle-btn" id="togglePasswordConfirm">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="terms-box mb-2">
                    بالتسجيل فأنت توافق على شروط الاستخدام وسياسة الخصوصية.
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('agreement') is-invalid @enderror"
                           type="checkbox" value="1" id="agreement" name="agreement"
                           {{ old('agreement') ? 'checked' : '' }} required>
                    <label class="form-check-label" for="agreement">
                        أوافق على الشروط والأحكام
                    </label>
                    @error('agreement') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-user-check me-2"></i> إنشاء الحساب
            </button>

            <div class="text-center mt-3">
                <a href="{{ route('beneficiary.login') }}" class="small-link">
                    <i class="fas fa-arrow-right-to-bracket"></i> لدي حساب بالفعل
                </a>
            </div>
        </form>

        <div class="login-footer">
            <p>للدعم الفني اتصل على: <strong>19999</strong></p>
            <p class="mb-0">وزارة الأشغال © 2025</p>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggles = [
        {btn:'#togglePassword', field:'#password'},
        {btn:'#togglePasswordConfirm', field:'#password_confirmation'}
    ];
    toggles.forEach(t => {
        const btn = document.querySelector(t.btn);
        const input = document.querySelector(t.field);
        if(btn && input){
            btn.addEventListener('click', () => {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                const icon = btn.querySelector('i');
                icon.classList.toggle('fa-eye');
                icon.classList.toggle('fa-eye-slash');
            });
        }
    });
});
</script>
</body>
</html>