
    {{-- <style>
        :root {
            --primary-dark:#0a2540;
            --primary:#1a365d;
            --primary-light:#4a80f0;
            --secondary:#6c757d;
            --success:#198754;
            --danger:#dc3545;
            --warning:#ffc107;
            --info:#0dcaf0;
            --light:#f8f9fa;
            --accent:#d4af37;
            --phase-1:#4e73df;
            --phase-2:#1cc88a;
            --phase-3:#36b9cc;
            --phase-4:#f6c23e;
            --phase-5:#e74a3b;
            --phase-6:#6f42c1;
            --navy-dark:#0a1a2e;
            --navy-primary:#1a2e4a;
            --navy-light:#2a4266;
            --gold-primary:#d4af37;
            --gold-light:#e8c874;
            --gold-dark:#b8951e;
        }
        * { box-sizing:border-box; }
        body {
            font-family:'Tajawal',sans-serif;
            background:#f8fafc;
            margin:0;
            color:#333;
        }
        .dashboard-container {
            max-width:1400px;
            margin:0 auto;
            padding:20px;
        }
        .dashboard-header {
            background:var(--navy-dark);
            color:#fff;
            padding:16px 22px;
            border-radius:14px;
            margin-bottom:22px;
            border-bottom:4px solid var(--gold-primary);
            box-shadow:0 4px 14px rgba(0,0,0,.12);
            position:relative;
            overflow:hidden;
        }
        .dashboard-header:before {
            content:"";
            position:absolute;
            top:0;left:0;
            width:120px;height:120px;
            background:radial-gradient(circle at 30% 30%,rgba(212,175,55,.35),transparent 70%);
            opacity:.35;
        }
        .dashboard-title {
            font-size:1.7rem;
            font-weight:700;
            margin:0 0 6px;
            display:flex;
            align-items:center;
            gap:10px;
            letter-spacing:.5px;
        }
        .dashboard-title i { color:var(--gold-primary); font-size:1.9rem; }
        #last-refresh { font-size:.8rem; color:#d7dbe1; }

        /* فلاتر */
        .filter-container {
            background:linear-gradient(135deg,#2a4266 0%,#1a2e4a 100%);
            padding:20px 22px 18px;
            border-radius:16px;
            position:relative;
            margin-bottom:24px;
            border:1px solid rgba(212,175,55,0.25);
            box-shadow:0 6px 18px -4px rgba(0,0,0,.35), 0 2px 6px rgba(0,0,0,.18);
            overflow:hidden;
        }
        .filter-container:before {
            content:"";
            position:absolute;
            width:220px;height:220px;
            background:radial-gradient(circle at 60% 40%,rgba(255,255,255,.09),transparent 70%);
            top:-60px;right:-40px;
            transform:rotate(25deg);
        }
        .filter-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding-bottom:12px;
            border-bottom:1px solid rgba(255,255,255,.15);
            margin-bottom:14px;
        }
        .filter-title {
            margin:0;
            font-size:1.05rem;
            display:flex;
            gap:8px;
            align-items:center;
            font-weight:600;
            color:#fff;
            letter-spacing:.5px;
        }
        .filter-title i { color:var(--gold-primary); font-size:1.3rem; }
        .filter-actions { display:flex; gap:10px; flex-wrap:wrap; }

        .filter-main {
            display:flex;
            flex-wrap:wrap;
            gap:18px;
            margin-bottom:6px;
        }
        .filter-group {
            flex:1;
            min-width:220px;
            position:relative;
        }
        .filter-group label {
            color:#fff;
            font-size:.75rem;
            font-weight:600;
            letter-spacing:.5px;
            margin-bottom:6px;
            display:block;
            text-transform:uppercase;
            opacity:.9;
        }
        .filter-group select,
        .filter-group input {
            width:100%;
            padding:10px 13px;
            font-size:.85rem;
            border-radius:10px;
            border:1px solid rgba(255,255,255,.35);
            background:rgba(255,255,255,.14);
            backdrop-filter: blur(2px);
            color:#fff;
            outline:none;
            transition:.25s;
            font-weight:500;
        }
        .filter-group select:focus,
        .filter-group input:focus {
            border-color:var(--gold-primary);
            background:rgba(255,255,255,.25);
        }
        .filter-group select option {
            background:#1a2e4a;
            color:#fff;
        }
        .time-filter {
            display:flex;
            gap:8px;
            flex-wrap:wrap;
            margin-top:2px;
        }
        .time-filter-btn {
            border:1px solid rgba(255,255,255,.35);
            background:rgba(255,255,255,.13);
            color:#fff;
            padding:8px 16px;
            border-radius:24px;
            font-size:.72rem;
            cursor:pointer;
            font-weight:600;
            letter-spacing:.4px;
            position:relative;
            overflow:hidden;
            transition:.3s;
        }
        .time-filter-btn.active,
        .time-filter-btn:hover {
            background:var(--gold-primary);
            color:var(--navy-dark);
            border-color:var(--gold-primary);
            box-shadow:0 0 0 2px rgba(212,175,55,.2);
        }
        .btn-filter,
        .btn-filter-reset,
        .btn-export-global {
            border:none;
            display:inline-flex;
            align-items:center;
            gap:6px;
            padding:10px 18px;
            font-size:.75rem;
            font-weight:700;
            letter-spacing:.5px;
            border-radius:10px;
            cursor:pointer;
            transition:.3s;
            text-transform:uppercase;
        }
        .btn-filter {
            background:linear-gradient(135deg,var(--gold-primary),var(--gold-light));
            color:var(--navy-dark);
            box-shadow:0 4px 12px -3px rgba(212,175,55,.55);
        }
        .btn-filter:hover { background:var(--gold-light); }
        .btn-filter-reset {
            background:rgba(255,255,255,.15);
            color:#fff;
            border:1px solid rgba(255,255,255,.35);
        }
        .btn-filter-reset:hover {
            background:rgba(255,255,255,.3);
        }
        .btn-export-global {
            background:linear-gradient(135deg,var(--primary),var(--primary-light));
            color:#fff;
            border:1px solid rgba(255,255,255,.2);
        }
        .btn-export-global:hover {
            filter:brightness(1.15);
        }

        .filter-toggle {
            font-size:.7rem;
            display:inline-flex;
            gap:6px;
            color:var(--gold-light);
            cursor:pointer;
            align-items:center;
            font-weight:600;
            margin-top:4px;
            letter-spacing:.5px;
            text-transform:uppercase;
            text-decoration:none;
            transition:.25s;
        }
        .filter-toggle i { transition:.4s; }
        .filter-toggle.collapsed i { transform:rotate(180deg); }
        .filter-advanced {
            display:none;
            margin-top:16px;
            padding-top:16px;
            border-top:1px solid rgba(255,255,255,.15);
            animation:fadeIn .45s ease;
        }
        .filter-advanced.show { display:block; }

        /* بطاقات الملخص */
        .summary-cards {
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:22px;
            margin-bottom:22px;
        }
        .summary-card {
            position:relative;
            background:#fff;
            border-radius:18px;
            padding:18px 20px 16px;
            border:1px solid #eef1f6;
            box-shadow:0 5px 18px -3px rgba(0,0,0,.15),0 2px 8px rgba(0,0,0,.06);
            cursor:pointer;
            overflow:hidden;
            transition:.5s cubic-bezier(.19,1,.22,1);
        }
        .summary-card:before {
            content:"";
            position:absolute;
            inset:0;
            background:radial-gradient(circle at 75% 15%,rgba(212,175,55,.12),transparent 70%);
            opacity:0;
            transition:.6s;
        }
        .summary-card:hover:before { opacity:1; }
        .summary-card:hover {
            transform:translateY(-8px);
            box-shadow:0 16px 42px -10px rgba(0,0,0,.25),
                       0 8px 18px -6px rgba(0,0,0,.18);
        }
        .summary-card .card-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 0 10px;
            margin:0 0 8px;
            border:none;
            background:transparent;
        }
        .summary-card .card-title {
            font-size:1rem;
            font-weight:700;
            display:flex;
            align-items:center;
            gap:8px;
            margin:0;
            letter-spacing:.4px;
            color:var(--navy-dark);
        }
        .summary-card .card-title i {
            font-size:1.5rem;
            color:var(--gold-primary);
            filter:drop-shadow(0 3px 6px rgba(212,175,55,.35));
        }
        .summary-card .badge {
            font-size:.6rem;
            padding:6px 10px 5px;
            letter-spacing:.6px;
            border-radius:40px;
            text-transform:uppercase;
            font-weight:800;
        }
        .summary-card .card-value {
            font-size:2.75rem;
            font-weight:800;
            margin:2px 0 12px;
            letter-spacing:1px;
            background:linear-gradient(90deg,var(--navy-dark),var(--primary));
            -webkit-background-clip:text;
            color:transparent;
        }
        .summary-card .card-footer {
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:.68rem;
            font-weight:600;
            text-transform:uppercase;
            letter-spacing:.5px;
            color:#6c7b8e;
        }
        .summary-card .card-link {
            text-decoration:none;
            display:inline-flex;
            align-items:center;
            gap:5px;
            font-weight:700;
            font-size:.65rem;
            letter-spacing:.5px;
            background:linear-gradient(90deg,var(--primary-light),var(--primary));
            -webkit-background-clip:text;
            color:transparent;
        }
        .summary-card .card-link:hover {
            filter:brightness(1.25);
        }

        /* نشاط */
        .card {
            background:#fff;
            border:none;
            border-radius:18px;
            padding:20px 22px 10px;
            box-shadow:0 6px 22px -8px rgba(0,0,0,.25),
                       0 2px 10px rgba(0,0,0,.08);
            position:relative;
            overflow:hidden;
        }
        .card-header {
            padding:0 0 12px;
            border:none;
            margin:0 0 12px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            background:transparent;
        }
        .card-header h5 {
            margin:0;
            font-size:1rem;
            font-weight:700;
            letter-spacing:.5px;
            display:flex;
            align-items:center;
            gap:8px;
            color:var(--navy-dark);
        }
        .card-header h5 i { color:var(--primary); font-size:1.25rem; }
        .activity-title {
            font-size:1.05rem;
            font-weight:700;
            display:flex;
            align-items:center;
            gap:8px;
            margin:0 0 16px;
            color:var(--navy-dark);
        }
        .activity-title i { color:var(--primary); }
        .activity-list { list-style:none; margin:0; padding:0; }
        .activity-item {
            display:flex;
            gap:16px;
            padding:12px 10px;
            border-bottom:1px solid #eef1f5;
            position:relative;
            border-radius:10px;
            transition:.35s;
        }
        .activity-item:last-child { border-bottom:none; }
        .activity-item:hover {
            background:#f7f9fb;
            box-shadow:inset 0 0 0 1px #edf0f4;
        }
        .activity-icon {
            width:46px;height:46px;
            border-radius:14px;
            background:linear-gradient(135deg,var(--primary),var(--primary-light));
            display:flex;align-items:center;justify-content:center;
            color:#fff;font-size:1.25rem;
            box-shadow:0 4px 14px -4px rgba(0,0,0,.4);
        }
        .activity-content { flex:1; }
        .activity-message {
            margin:0 0 6px;
            font-size:.85rem;
            font-weight:600;
            color:var(--navy-dark);
            letter-spacing:.3px;
        }
        .activity-time {
            display:inline-block;
            background:#eef2f6;
            padding:5px 12px 4px;
            border-radius:40px;
            font-size:.6rem;
            letter-spacing:.5px;
            font-weight:700;
            color:#5a6572;
        }

        /* مؤشرات الأداء */
        .circle-chart {
            position:relative;
            width:115px;
            height:115px;
            margin:0 auto;
        }
        .circle-chart svg {
            width:100%;height:100%;
            filter:drop-shadow(0 4px 6px rgba(0,0,0,.12));
        }
        .circle-bg { fill:none; stroke:#eceff3; stroke-width:4; }
        .circle-fill {
            fill:none;
            stroke-width:4;
            stroke-linecap:round;
            transform:rotate(-90deg);
            transform-origin:50% 50%;
            stroke-dasharray:0,100;
            transition:stroke-dasharray 1.4s cubic-bezier(.65,.05,.36,1);
        }
        .circle-text {
            position:absolute;
            top:50%;left:50%;
            transform:translate(-50%,-50%);
            font-weight:800;
            font-size:1.15rem;
            letter-spacing:1px;
            background:linear-gradient(90deg,var(--navy-dark),var(--primary));
            -webkit-background-clip:text;
            color:transparent;
        }
        .card h6 {
            margin:8px 0 0;
            font-size:.7rem;
            letter-spacing:.5px;
            font-weight:700;
            color:#5c6978;
            text-transform:uppercase;
        }

        /* مخططات */
        .content-section { padding:4px 0 10px; background:transparent; box-shadow:none; }
        canvas { max-width:100%; }

        /* مودال */
        .modal-content {
            border:none;
            border-radius:22px;
            box-shadow:0 18px 50px -15px rgba(0,0,0,.35);
            overflow:hidden;
        }
        .modal-header {
            background:linear-gradient(135deg,var(--navy-dark),var(--navy-primary));
            border:none;
            color:#fff;
            padding:16px 20px;
        }
        .modal-title {
            margin:0;
            font-size:1rem;
            font-weight:700;
            letter-spacing:.5px;
            display:flex;
            align-items:center;
            gap:8px;
        }
        .modal-title i { color:var(--gold-primary); }
        .modal-body {
            background:#fff;
            padding:20px 22px;
            max-height:72vh;
            overflow:auto;
        }
        .modal-footer {
            background:#f4f6f9;
            border:none;
            padding:16px 22px;
            display:flex;
            justify-content:space-between;
        }
        .table {
            font-size:.7rem;
            border-collapse:separate;
            border-spacing:0 4px;
        }
        .table thead th {
            background:#f1f4f8;
            border:none;
            padding:10px 12px;
            font-weight:800;
            letter-spacing:.8px;
            color:#4d5a68;
            text-transform:uppercase;
            font-size:.6rem;
        }
        .table tbody tr {
            background:#fff;
            transition:.3s;
            box-shadow:0 1px 3px rgba(0,0,0,.08);
        }
        .table tbody tr:hover {
            transform:translateY(-2px);
            box-shadow:0 4px 12px rgba(0,0,0,.12);
        }
        .table tbody td {
            border:none;
            padding:10px 12px;
            font-weight:600;
            color:#39434e;
            letter-spacing:.3px;
        }
        .table tbody td .badge {
            font-size:.55rem;
            letter-spacing:.7px;
            padding:6px 10px 5px;
            font-weight:800;
            border-radius:40px;
        }

        /* تنبيهات */
        .alert {
            border:none;
            border-radius:14px;
            padding:14px 18px;
            font-size:.78rem;
            font-weight:600;
            letter-spacing:.4px;
            display:flex;
            gap:8px;
            align-items:center;
            box-shadow:0 4px 15px -6px rgba(0,0,0,.25);
        }

        /* استجابة */
        @media (max-width:1100px) {
            .summary-cards { grid-template-columns:repeat(auto-fit,minmax(210px,1fr)); }
            .summary-card .card-value { font-size:2.2rem; }
        }
        @media (max-width:820px) {
            .filter-main { flex-direction:column; }
            .filter-group { min-width:100%; }
        }
        @media (max-width:600px){
            .dashboard-header { padding:14px 16px; }
            .dashboard-title { font-size:1.35rem; }
            .summary-cards { grid-template-columns:repeat(auto-fit,minmax(170px,1fr)); gap:14px; }
            .summary-card { padding:15px 16px 14px; }
            .summary-card .card-value { font-size:2rem; }
            .time-filter-btn { padding:7px 13px; }
            .filter-group select, .filter-group input { font-size:.78rem; }
        }

        @keyframes fadeIn {
            from { opacity:0; transform:translateY(15px); }
            to { opacity:1; transform:translateY(0); }
        }
    </style> --}}

    <style>
        :root {
            --primary-dark: #0a2540;
            --primary: #1a365d;
            --primary-light: #4a80f0;
            --secondary: #6c757d;
            --success: #198754;
            --danger: #dc3545;
            --warning: #ffc107;
            --info: #0dcaf0;
            --light: #f8f9fa;
            --accent: #d4af37;
            --sidebar-width: 280px;
            --phase-1: #4e73df;
            --phase-2: #1cc88a;
            --phase-3: #36b9cc;
            --phase-4: #f6c23e;
            --phase-5: #e74a3b;
            --phase-6: #6f42c1;
            --navy-dark: #0a1a2e;
            --navy-primary: #1a2e4a;
            --navy-light: #2a4266;
            --gold-primary: #d4af37;
            --gold-light: #e8c874;
            --gold-dark: #b8951e;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8fafc;
            color: #333;
            margin:0;
            padding:0;
        }

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        .dashboard-header {
            background-color: var(--navy-dark);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-bottom: 4px solid var(--gold-primary);
        }
        .dashboard-title {
            font-weight: 700;
            display:flex;
            align-items:center;
            font-size: 1.6rem;
            margin:0 0 5px;
        }
        .dashboard-title i {
            margin-left:10px;
            color: var(--gold-primary);
        }
        #last-refresh {
            font-size:.85rem;
            color:#ddd;
        }

        /* فلترة */
        /* .filter-container {
            background: linear-gradient(135deg, #2a4266 0%, #1a2e4a 100%);
            border-radius: 12px;
            padding: 18px 20px;
            margin-bottom: 22px;
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
            border: 1px solid rgba(212,175,55,0.3);
        }
        .filter-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:15px;
            padding-bottom:10px;
            border-bottom:1px solid rgba(255,255,255,.18);
        }
        .filter-title {
            color:#fff;
            font-weight:600;
            display:flex;
            align-items:center;
            font-size:1.05rem;
            margin:0;
        }
        .filter-title i {
            margin-left:8px;
            color: var(--gold-primary);
            font-size:1.2rem;
        }
        .filter-actions {
            display:flex;
            gap:10px;
        }
        .filter-main {
            display:flex;
            flex-wrap:wrap;
            gap:18px;
            margin-bottom:10px;
        }
        .filter-group {
            flex:1;
            min-width:220px;
        }
        .filter-group label {
            display:block;
            color:#fff;
            font-weight:500;
            margin-bottom:6px;
            font-size:.85rem;
        }
        .filter-group select,
        .filter-group input {
            width:100%;
            padding:9px 12px;
            border-radius:8px;
            border:1px solid rgba(255,255,255,0.25);
            background-color: rgba(255,255,255,0.15);
            color:#fff;
            font-size:.9rem;
            outline:none;
            transition:.25s;
        }
        .filter-group select:focus,
        .filter-group input:focus {
            border-color: var(--gold-primary);
            background: rgba(255,255,255,0.25);
        }
        .filter-group select option {
            background:#1a2e4a;
            color:#fff;
        }
        .time-filter {
            display:flex;
            gap:8px;
            flex-wrap:wrap;
            margin-top:2px;
        }
        .time-filter-btn {
            padding:7px 14px;
            border-radius:22px;
            border:1px solid rgba(255,255,255,0.35);
            background: rgba(255,255,255,0.12);
            color:#fff;
            font-size:.8rem;
            cursor:pointer;
            transition:.25s;
            font-weight:500;
        }
        .time-filter-btn:hover {
            background:rgba(255,255,255,0.25);
        }
        .time-filter-btn.active {
            background: var(--gold-primary);
            color: var(--navy-dark);
            border-color: var(--gold-primary);
            font-weight:600;
        }
        .btn-filter,
        .btn-filter-reset {
            display:flex;
            align-items:center;
            gap:4px;
            padding:8px 16px;
            border:none;
            border-radius:8px;
            font-weight:600;
            cursor:pointer;
            font-size:.85rem;
            transition:.25s;
        }
        .btn-filter {
            background: var(--gold-primary);
            color: var(--navy-dark);
        }
        .btn-filter:hover {
            background: var(--gold-light);
        }
        .btn-filter-reset {
            background: rgba(255,255,255,0.15);
            color:#fff;
            border:1px solid rgba(255,255,255,0.35);
        }
        .btn-filter-reset:hover {
            background: rgba(255,255,255,0.25);
        }
        .filter-toggle {
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            gap:6px;
            font-size:.8rem;
            color: var(--gold-light);
            margin-top:2px;
            text-decoration:none;
            font-weight:500;
        }
        .filter-toggle i {
            transition:.35s;
        }
        .filter-toggle.collapsed i {
            transform:rotate(180deg);
        }
        .filter-advanced {
            margin-top:15px;
            padding-top:15px;
            border-top:1px solid rgba(255,255,255,.18);
            display:none;
            animation: fadeIn .35s ease;
        }
        .filter-advanced.show {
            display:block;
        } */

         /* فلاتر */
        .filter-container {
            background:linear-gradient(135deg,#2a4266 0%,#1a2e4a 100%);
            padding:20px 22px 18px;
            border-radius:16px;
            position:relative;
            margin-bottom:24px;
            border:1px solid rgba(212,175,55,0.25);
            box-shadow:0 6px 18px -4px rgba(0,0,0,.35), 0 2px 6px rgba(0,0,0,.18);
            overflow:hidden;
        }
        .filter-container:before {
            content:"";
            position:absolute;
            width:220px;height:220px;
            background:radial-gradient(circle at 60% 40%,rgba(255,255,255,.09),transparent 70%);
            top:-60px;right:-40px;
            transform:rotate(25deg);
        }
        .filter-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding-bottom:12px;
            border-bottom:1px solid rgba(255,255,255,.15);
            margin-bottom:14px;
        }
        .filter-title {
            margin:0;
            font-size:1.05rem;
            display:flex;
            gap:8px;
            align-items:center;
            font-weight:600;
            color:#fff;
            letter-spacing:.5px;
        }
        .filter-title i { color:var(--gold-primary); font-size:1.3rem; }
        .filter-actions { display:flex; gap:10px; flex-wrap:wrap; }

        .filter-main {
            display:flex;
            flex-wrap:wrap;
            gap:18px;
            margin-bottom:6px;
        }
        .filter-group {
            flex:1;
            min-width:220px;
            position:relative;
        }
        .filter-group label {
            color:#fff;
            font-size:.75rem;
            font-weight:600;
            letter-spacing:.5px;
            margin-bottom:6px;
            display:block;
            text-transform:uppercase;
            opacity:.9;
        }
        .filter-group select,
        .filter-group input {
            width:100%;
            padding:10px 13px;
            font-size:.85rem;
            border-radius:10px;
            border:1px solid rgba(255,255,255,.35);
            background:rgba(255,255,255,.14);
            backdrop-filter: blur(2px);
            color:#fff;
            outline:none;
            transition:.25s;
            font-weight:500;
        }
        .filter-group select:focus,
        .filter-group input:focus {
            border-color:var(--gold-primary);
            background:rgba(255,255,255,.25);
        }
        .filter-group select option {
            background:#1a2e4a;
            color:#fff;
        }
        .time-filter {
            display:flex;
            gap:8px;
            flex-wrap:wrap;
            margin-top:2px;
        }
        .time-filter-btn {
            border:1px solid rgba(255,255,255,.35);
            background:rgba(255,255,255,.13);
            color:#fff;
            padding:8px 16px;
            border-radius:24px;
            font-size:.72rem;
            cursor:pointer;
            font-weight:600;
            letter-spacing:.4px;
            position:relative;
            overflow:hidden;
            transition:.3s;
        }
        .time-filter-btn.active,
        .time-filter-btn:hover {
            background:var(--gold-primary);
            color:var(--navy-dark);
            border-color:var(--gold-primary);
            box-shadow:0 0 0 2px rgba(212,175,55,.2);
        }
        .btn-filter,
        .btn-filter-reset,
        .btn-export-global {
            border:none;
            display:inline-flex;
            align-items:center;
            gap:6px;
            padding:10px 18px;
            font-size:.75rem;
            font-weight:700;
            letter-spacing:.5px;
            border-radius:10px;
            cursor:pointer;
            transition:.3s;
            text-transform:uppercase;
        }
        .btn-filter {
            background:linear-gradient(135deg,var(--gold-primary),var(--gold-light));
            color:var(--navy-dark);
            box-shadow:0 4px 12px -3px rgba(212,175,55,.55);
        }
        .btn-filter:hover { background:var(--gold-light); }
        .btn-filter-reset {
            background:rgba(255,255,255,.15);
            color:#fff;
            border:1px solid rgba(255,255,255,.35);
        }
        .btn-filter-reset:hover {
            background:rgba(255,255,255,.3);
        }
        .btn-export-global {
            background:linear-gradient(135deg,var(--primary),var(--primary-light));
            color:#fff;
            border:1px solid rgba(255,255,255,.2);
        }
        .btn-export-global:hover {
            filter:brightness(1.15);
        }

        .filter-toggle {
            font-size:.7rem;
            display:inline-flex;
            gap:6px;
            color:var(--gold-light);
            cursor:pointer;
            align-items:center;
            font-weight:600;
            margin-top:4px;
            letter-spacing:.5px;
            text-transform:uppercase;
            text-decoration:none;
            transition:.25s;
        }
        .filter-toggle i { transition:.4s; }
        .filter-toggle.collapsed i { transform:rotate(180deg); }
        .filter-advanced {
            display:none;
            margin-top:16px;
            padding-top:16px;
            border-top:1px solid rgba(255,255,255,.15);
            animation:fadeIn .45s ease;
        }
        .filter-advanced.show { display:block; }



        /* بطاقات الملخص */
        .summary-cards {
            display:grid;
            grid-template-columns: repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
            margin-bottom:15px;
        }
        .summary-card {
            background:#fff;
            border-radius:14px;
            padding:18px 20px 16px;
            box-shadow:0 4px 14px rgba(0,0,0,0.08);
            position:relative;
            border-top:4px solid var(--gold-primary);
            cursor:pointer;
            transition:.35s;
            overflow:hidden;
        }
        .summary-card:hover {
            transform:translateY(-6px);
            box-shadow:0 10px 22px rgba(0,0,0,0.15);
        }
        .summary-card::before {
            content:"";
            position:absolute;
            top:0; right:0;
            width:0;
            height:100%;
            background:linear-gradient(135deg, rgba(212,175,55,0.15), rgba(26,54,93,0.05));
            transition:.5s;
        }
        .summary-card:hover::before {
            width:100%;
        }
        .summary-card .card-header {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:10px;
            padding:0;
            background:transparent;
            border:none;
        }
        .summary-card .card-title {
            font-weight:600;
            color: var(--navy-dark);
            display:flex;
            align-items:center;
            gap:6px;
            font-size:1.05rem;
            margin:0;
        }
        .summary-card .card-title i {
            color: var(--gold-primary);
            font-size:1.3rem;
        }
        .summary-card .card-value {
            font-size:2.3rem;
            font-weight:700;
            color: var(--navy-dark);
            margin:4px 0 8px;
            line-height:1.1;
        }
        .summary-card .badge {
            padding:6px 10px;
            border-radius:30px;
            font-size:.7rem;
            letter-spacing:.5px;
        }
        .summary-card .card-footer {
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:.75rem;
            color: var(--secondary);
        }
        .summary-card .card-link {
            text-decoration:none;
            color: var(--primary);
            font-weight:600;
            display:inline-flex;
            align-items:center;
            gap:4px;
            font-size:.75rem;
        }
        .summary-card .card-link:hover {
            color: var(--gold-dark);
        }

        /* نشاط */
        .card {
            border:none;
            border-radius:14px;
            background:#fff;
            box-shadow:0 4px 12px rgba(0,0,0,.06);
            padding:16px 20px 6px;
            margin-bottom:24px;
            position:relative;
            overflow:hidden;
        }
        .card-header {
            background:#fff;
            border:none;
            padding:0 0 12px;
            margin-bottom:10px;
            font-weight:600;
            display:flex;
            align-items:center;
            justify-content:space-between;
            position:relative;
        }
        .card-header h5 {
            margin:0;
            font-size:1rem;
            display:flex;
            align-items:center;
            gap:8px;
            color: var(--navy-dark);
        }
        .card-header h5 i {
            color: var(--primary);
            font-size:1.2rem;
        }
        .activity-title {
            font-size:1.05rem;
            font-weight:600;
            margin:0 0 14px;
            display:flex;
            align-items:center;
            gap:8px;
            color: var(--navy-dark);
        }
        .activity-title i { color: var(--primary); }
        .activity-list {
            list-style:none;
            padding:0;
            margin:0;
        }
        .activity-item {
            display:flex;
            gap:14px;
            padding:12px 10px;
            border-bottom:1px solid #eceff3;
            position:relative;
        }
        .activity-item:last-child { border-bottom:none; }
        .activity-item:hover {
            background: linear-gradient(90deg,#f9fafc,#f2f5f9);
            border-radius:8px;
        }
        .activity-icon {
            width:42px;
            height:42px;
            background:linear-gradient(135deg,var(--primary),var(--primary-light));
            border-radius:10px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-size:1.2rem;
            flex-shrink:0;
            box-shadow:0 3px 8px rgba(0,0,0,0.12);
        }
        .activity-content {
            flex:1;
        }
        .activity-message {
            margin:0 0 4px;
            font-size:.9rem;
            font-weight:500;
            color: var(--navy-dark);
        }
        .activity-time {
            display:inline-block;
            font-size:.7rem;
            background:#eef1f5;
            padding:4px 10px;
            border-radius:20px;
            color:#555;
        }

        /* مخططات */
        .content-section {
            padding: 10px 0 5px;
            background:transparent;
            box-shadow:none;
        }
        canvas { max-width:100%; }

        /* مؤشرات الأداء */
        .circle-chart {
            position:relative;
            width:100px;
            height:100px;
            margin:0 auto;
        }
        .circle-chart svg {
            width:100%; height:100%;
        }
        .circle-bg {
            fill:none;
            stroke:#eee;
            stroke-width:3;
        }
        .circle-fill {
            fill:none;
            stroke-width:3;
            stroke-linecap:round;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
            stroke-dasharray:0,100;
            transition: stroke-dasharray 1.2s ease;
        }
        .circle-text {
            position:absolute;
            top:50%; left:50%;
            transform:translate(-50%,-50%);
            font-weight:600;
            font-size:1.05rem;
            color: var(--navy-dark);
        }

        /* مودال */
        .modal-content {
            border:none;
            border-radius:16px;
            box-shadow:0 8px 30px rgba(0,0,0,.15);
            overflow:hidden;
        }
        .modal-header {
            background: linear-gradient(135deg,var(--navy-dark),var(--navy-primary));
            color:#fff;
            border-bottom:none;
        }
        .modal-header .modal-title {
            font-weight:600;
            font-size:1rem;
            display:flex;
            align-items:center;
            gap:8px;
        }
        .modal-header .modal-title i {
            color: var(--gold-primary);
        }
        .modal-body {
            background:#fff;
            padding:18px 20px;
            max-height:68vh;
            overflow:auto;
        }
        .modal-footer {
            background:#f6f8fa;
            border-top:none;
            padding:14px 20px;
        }
        .table thead th {
            background:#f5f7fa;
            font-size:.75rem;
            font-weight:600;
            letter-spacing:.5px;
            color:#555;
            border-top:none;
            border-bottom:1px solid #e4e8ed;
        }
        .table tbody td {
            font-size:.75rem;
            vertical-align:middle;
            border-color:#eef1f4;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background:#fcfdfe;
        }

        /* تنبيهات */
        .alert {
            border:none;
            border-radius:12px;
            padding:14px 18px;
            font-size:.85rem;
            display:flex;
            align-items:center;
            gap:6px;
            box-shadow:0 2px 8px rgba(0,0,0,.08);
        }

        /* استجابة */
        @media (max-width:992px) {
            .filter-main { flex-direction:column; }
            .summary-card .card-value { font-size:2rem; }
            .dashboard-title { font-size:1.35rem; }
        }
        @media (max-width:600px) {
            .time-filter { gap:6px; }
            .time-filter-btn { padding:6px 10px; }
            .summary-cards { grid-template-columns: repeat(auto-fit,minmax(180px,1fr)); }
        }

        @keyframes fadeIn {
            from { opacity:0; transform:translateY(12px); }
            to { opacity:1; transform:translateY(0); }
        }
    </style>


<div class="container-fluid py-3">
    <div class="tab-content" id="dashboardTabsContent">
        <div class="tab-pane fade show active" id="admin" role="tabpanel">
            <div class="dashboard-container">

                <!-- العنوان -->
                <div class="dashboard-header">
                    <div>
                        <h1 class="dashboard-title"><i class="bi bi-speedometer2"></i> لوحة التحكم</h1>
                        <span id="last-refresh">آخر تحديث: —</span>
                    </div>
                    <div style="display:flex;gap:10px;align-items:flex-start;flex-wrap:wrap;"></div>
                </div>

                <!-- الفلاتر -->
                <div class="filter-container">
                    <div class="filter-header">
                        <h5 class="filter-title"><i class="bi bi-funnel"></i> فلاتر البيانات</h5>
                        <div class="filter-actions">
                            <button class="btn-filter" id="apply-filter">
                                <i class="bi bi-check-circle"></i> تطبيق
                            </button>
                            <button class="btn-filter-reset" id="reset-filter">
                                <i class="bi bi-arrow-clockwise"></i> إعادة تعيين
                            </button>
                        </div>
                    </div>

                    <div class="filter-main">
                        <div class="filter-group">
                            <label>نوع الترخيص</label>
                            <select id="filter-license-type">
                                <option value="">جاري التحميل...</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label>الحالة</label>
                            <select id="filter-status">
                                <option value="">جاري التحميل...</option>
                            </select>
                        </div>

                        <div class="filter-group">
                            <label>الفترة الزمنية</label>
                            <div class="time-filter">
                                <button class="time-filter-btn active" data-period="none">كل الوقت</button>
                                <button class="time-filter-btn" data-period="week">هذا الأسبوع</button>
                                <button class="time-filter-btn" data-period="month">هذا الشهر</button>
                                <button class="time-filter-btn" data-period="quarter">هذا الربع</button>
                            </div>
                        </div>
                    </div>

                    <a class="filter-toggle" id="advanced-filter-toggle">
                        <i class="bi bi-chevron-down"></i> خيارات متقدمة
                    </a>

                    <div class="filter-advanced" id="advanced-filter">
                        <div class="filter-main">
                            <div class="filter-group">
                                <label>من تاريخ</label>
                                <input type="date" id="filter-date-from">
                            </div>
                            <div class="filter-group">
                                <label>إلى تاريخ</label>
                                <input type="date" id="filter-date-to">
                            </div>
                            <div class="filter-group">
                                <label>المحافظة</label>
                                <select id="filter-governorate">
                                    <option value="">جاري التحميل...</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label>المديرية</label>
                                <select id="filter-directorate">
                                    <option value="">اختر المحافظة أولاً</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- تنبيه -->
                <div class="alert alert-warning" id="alert-dynamic" style="display:none">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span id="alert-text">—</span>
                </div>

                <!-- بطاقات الملخص -->
                <div class="summary-cards">
                    <div class="summary-card" data-category="new" data-bs-toggle="modal" data-bs-target="#genericRequestsModal">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-file-earmark-plus"></i> طلبات جديدة</h3>
                            <span class="badge bg-success" id="badge-new-change">—</span>
                        </div>
                        <div class="card-value" id="val-new">—</div>
                        <div class="card-footer">
                            <span>حسب الفلتر</span>
                            <a href="#" class="card-link"><i class="bi bi-arrow-left"></i> التفاصيل</a>
                        </div>
                    </div>

                    <div class="summary-card" data-category="review" data-bs-toggle="modal" data-bs-target="#genericRequestsModal">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-file-earmark-check"></i> قيد المراجعة</h3>
                            <span class="badge bg-warning" id="badge-review-change">—</span>
                        </div>
                        <div class="card-value" id="val-review">—</div>
                        <div class="card-footer">
                            <span>حسب الفلتر</span>
                            <a href="#" class="card-link"><i class="bi bi-arrow-left"></i> التفاصيل</a>
                        </div>
                    </div>

                    <div class="summary-card" data-category="technical" data-bs-toggle="modal" data-bs-target="#genericRequestsModal">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-clipboard2-pulse"></i> مراجعة فنية</h3>
                            <span class="badge bg-danger" id="badge-technical-change">—</span>
                        </div>
                        <div class="card-value" id="val-technical">—</div>
                        <div class="card-footer">
                            <span>حسب الفلتر</span>
                            <a href="#" class="card-link"><i class="bi bi-arrow-left"></i> التفاصيل</a>
                        </div>
                    </div>

                    <div class="summary-card" data-category="completed" data-bs-toggle="modal" data-bs-target="#genericRequestsModal">
                        <div class="card-header">
                            <h3 class="card-title"><i class="bi bi-check-circle"></i> مكتملة</h3>
                            <span class="badge bg-success" id="badge-completed-change">—</span>
                        </div>
                        <div class="card-value" id="val-completed">—</div>
                        <div class="card-footer">
                            <span>حسب الفلتر</span>
                            <a href="#" class="card-link"><i class="bi bi-arrow-left"></i> التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- النشاط ومؤشرات الأداء -->
                <div class="row mt-2">
                    <div class="col-md-8">
                        <div class="card">
                            <h3 class="activity-title"><i class="bi bi-clock-history"></i> النشاط الأخير</h3>
                            <ul class="activity-list" id="recent-activity-list">
                                <li>جاري التحميل...</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5><i class="bi bi-activity"></i> مؤشرات الأداء</h5>
                            </div>
                            <div class="card-body">
                                <div class="row text-center" id="performance-indicators">
                                    <div class="col-6 mb-4">
                                        <div class="circle-chart" data-percent="0" data-metric="completion">
                                            <svg viewBox="0 0 36 36">
                                                <path class="circle-bg" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                                <path class="circle-fill" stroke="#1cc88a" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                            </svg>
                                            <div class="circle-text">0%</div>
                                        </div>
                                        <h6>إنجاز</h6>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="circle-chart" data-percent="0" data-metric="delayed">
                                            <svg viewBox="0 0 36 36">
                                                <path class="circle-bg" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                                <path class="circle-fill" stroke="#f6c23e" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                            </svg>
                                            <div class="circle-text">0%</div>
                                        </div>
                                        <h6>متأخرة</h6>
                                    </div>
                                    <div class="col-6 mb-4">
                                        <div class="circle-chart" data-percent="0" data-metric="satisfaction">
                                            <svg viewBox="0 0 36 36">
                                                <path class="circle-bg" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                                <path class="circle-fill" stroke="#4e73df" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                            </svg>
                                            <div class="circle-text">0%</div>
                                        </div>
                                        <h6>رضا</h6>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <div class="circle-chart" data-percent="0" data-metric="rejected">
                                            <svg viewBox="0 0 36 36">
                                                <path class="circle-bg" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                                <path class="circle-fill" stroke="#e74a3b" d="M18 2.0845 a15.9155 15.9155 0 0 1 0 31.831 a15.9155 15.9155 0 0 1 0 -31.831"/>
                                            </svg>
                                            <div class="circle-text">0%</div>
                                        </div>
                                        <h6>مرفوض</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- المخططات -->
                <div class="content-section">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-bar-chart-line"></i> توزيع الطلبات حسب المحافظة</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="requestsByGovernorateChart" height="260"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header">
                                    <h5><i class="bi bi-pie-chart"></i> توزيع الطلبات حسب النوع</h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="requestsTypeChart" height="260"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /dashboard-container -->
        </div>
    </div>
</div>

<!-- مودال موحد -->
<div class="modal fade" id="genericRequestsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="modal-title-dynamic" class="modal-title">
                    <i class="bi bi-list"></i> تفاصيل الطلبات
                </h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
            </div>
            <div class="modal-body">
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;gap:10px;flex-wrap:wrap;">
                    <div style="font-size:.7rem;font-weight:700;letter-spacing:.6px;color:#5a6572;">النتائج حسب الفلاتر الحالية</div>
                    <div style="display:flex;gap:8px;">
                        <button class="btn-filter" id="export-report-btn">
                            <i class="bi bi-download"></i> تصدير CSV
                        </button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead>
                        <tr>
                            <th>رقم الطلب</th>
                            <th>نوع الترخيص</th>
                            <th>المحافظة</th>
                            <th>المديرية</th>
                            <th>الحالة</th>
                            <th>تاريخ الإنشاء</th>
                            <th>آخر تحديث</th>
                        </tr>
                        </thead>
                        <tbody id="modal-requests-body">
                        <tr><td colspan="7" class="text-center">جاري التحميل...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-filter-reset" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> إغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- مكتبات -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
    /* ================== أدوات مساعدة ================== */
    function getActiveFilters() {
        return {
            license_type_id: document.getElementById('filter-license-type')?.value || '',
            status_id:       document.getElementById('filter-status')?.value || '',
            governorate_id:  document.getElementById('filter-governorate')?.value || '',
            directorate_id:  document.getElementById('filter-directorate')?.value || '',
            date_from:       document.getElementById('filter-date-from')?.value || '',
            date_to:         document.getElementById('filter-date-to')?.value || '',
            period:          document.querySelector('.time-filter-btn.active')?.getAttribute('data-period') || ''
        };
    }
    function buildQuery(params){
        const q = Object.entries(params)
            .filter(([_,v]) => v!=='' && v!==null && v!==undefined)
            .map(([k,v]) => encodeURIComponent(k)+'='+encodeURIComponent(v))
            .join('&');
        return q ? '?'+q : '';
    }
    function fmtDate(str){
        if(!str) return '—';
        const d = new Date(str);
        if(isNaN(d.getTime())) return str;
        return d.toLocaleString('ar-EG');
    }
    function translateCategory(cat){
        switch(cat){
            case 'new': return 'الطلبات الجديدة';
            case 'review': return 'طلبات قيد المراجعة';
            case 'technical': return 'طلبات المراجعة الفنية';
            case 'completed': return 'الطلبات المكتملة';
            default: return 'تفاصيل الطلبات';
        }
    }

    /* ============ تحميل الفلاتر الأساسية ============ */
    async function loadBasicFilters(){
        const licenseSel = document.getElementById('filter-license-type');
        const statusSel  = document.getElementById('filter-status');
        const govSel     = document.getElementById('filter-governorate');
        const dirSel     = document.getElementById('filter-directorate');

        licenseSel.innerHTML = '<option value="">جاري التحميل...</option>';
        statusSel.innerHTML  = '<option value="">جاري التحميل...</option>';
        govSel.innerHTML     = '<option value="">جاري التحميل...</option>';
        dirSel.innerHTML     = '<option value="">اختر المحافظة أولاً</option>';

        try {
            const res = await fetch('/dashboard-admin/filters/basic');
            const json = await res.json();
            if(!json.success) throw new Error('failed');

            // أنواع التراخيص
            licenseSel.innerHTML = '<option value="">جميع الأنواع</option>';
            json.data.license_types.forEach(t=>{
                const opt=document.createElement('option');
                opt.value=t.id; opt.textContent=t.name;
                licenseSel.appendChild(opt);
            });

            // الحالات
            statusSel.innerHTML = '<option value="">جميع الحالات</option>';
            json.data.statuses.forEach(s=>{
                const opt=document.createElement('option');
                opt.value=s.id; opt.textContent=s.name;
                statusSel.appendChild(opt);
            });

            // المحافظات
            govSel.innerHTML = '<option value="">جميع المحافظات</option>';
            json.data.governorates.forEach(g=>{
                const opt=document.createElement('option');
                opt.value=g.id; opt.textContent=g.name;
                govSel.appendChild(opt);
            });

            govSel.addEventListener('change', async ()=>{
                const govId = govSel.value;
                if(!govId){
                    dirSel.innerHTML = '<option value="">جميع المديريات</option>';
                    return;
                }
                dirSel.innerHTML = '<option value="">جاري التحميل...</option>';
                const r = await fetch('/dashboard-admin/filters/directorates?governorate_id='+encodeURIComponent(govId));
                const j = await r.json();
                if(!j.success){
                    dirSel.innerHTML = '<option value="">تعذر التحميل</option>';
                    return;
                }
                dirSel.innerHTML = '<option value="">جميع المديريات</option>';
                j.data.forEach(d=>{
                    const opt=document.createElement('option');
                    opt.value=d.id; opt.textContent=d.name;
                    dirSel.appendChild(opt);
                });
            });

        } catch(e){
            licenseSel.innerHTML='<option value="">تعذر التحميل</option>';
            statusSel.innerHTML='<option value="">تعذر التحميل</option>';
            govSel.innerHTML='<option value="">تعذر التحميل</option>';
            console.error('Filter load error', e);
        }
    }

    /* ============ تحديث مؤشرات الأداء ============ */
    function updateCircleCharts(metrics){
        // metrics: { completion, delayed, satisfaction, rejected } قيم نسبية 0-100
        const defaults = { completion:0, delayed:0, satisfaction:0, rejected:0 };
        metrics = {...defaults, ...metrics};
        document.querySelectorAll('.circle-chart').forEach(chart=>{
            const metric = chart.getAttribute('data-metric');
            const val = Math.min(100, Math.max(0, metrics[metric] || 0));
            const path = chart.querySelector('.circle-fill');
            const txt = chart.querySelector('.circle-text');
            path.setAttribute('stroke-dasharray', val + ',100');
            txt.textContent = val + '%';
        });
    }

    /* ============ تحميل الملخص ============ */
    async function loadSummary(){
        const q = buildQuery(getActiveFilters());
        const res = await fetch('/dashboard-admin/summary'+q);
        const json = await res.json().catch(()=>({success:false}));

        if(!json.success) return;

        document.getElementById('val-new').textContent       = json.data.new_requests.count;
        document.getElementById('val-review').textContent    = json.data.under_review.count;
        document.getElementById('val-technical').textContent = json.data.technical_review.count;
        document.getElementById('val-completed').textContent = json.data.completed.count;

        document.getElementById('badge-new-change').textContent       = (json.data.new_requests.change>0?'+':'') + json.data.new_requests.change + '%';
        document.getElementById('badge-review-change').textContent    = (json.data.under_review.change>0?'+':'') + json.data.under_review.change + '%';
        document.getElementById('badge-technical-change').textContent = (json.data.technical_review.change>0?'+':'') + json.data.technical_review.change + '%';
        document.getElementById('badge-completed-change').textContent = (json.data.completed.change>0?'+':'') + json.data.completed.change + '%';

        document.getElementById('last-refresh').textContent = 'آخر تحديث: '+ (new Date()).toLocaleTimeString('ar-EG');

        // حساب مؤشرات بسيطة (يمكن تطويرها لاحقاً)
        const total = json.data.new_requests.count + json.data.under_review.count + json.data.technical_review.count + json.data.completed.count;
        const completion = total ? Math.round(json.data.completed.count / total * 100) : 0;
        const delayed = json.data.under_review.count ? Math.min(100, json.data.under_review.count * 10) : 0;
        const satisfaction = 80; // قيمة افتراضية
        const rejected = 15;     // قيمة افتراضية
        updateCircleCharts({ completion, delayed, satisfaction, rejected });
    }

    /* ============ النشاط الأخير ============ */
    async function loadRecentActivity(){
        const q = buildQuery(getActiveFilters());
        const list = document.getElementById('recent-activity-list');
        list.innerHTML='<li>جاري التحميل...</li>';
        const res = await fetch('/dashboard-admin/recent-activity'+q);
        const json = await res.json().catch(()=>({success:false}));
        if(!json.success){
            list.innerHTML='<li class="text-danger">تعذر تحميل النشاط</li>';
            return;
        }
        if(!json.data.length){
            list.innerHTML='<li>لا يوجد نشاط ضمن الفلاتر الحالية</li>';
            return;
        }
        list.innerHTML='';
        json.data.forEach(item=>{
            const li=document.createElement('li');
            li.className='activity-item';
            li.innerHTML=`
                <div class="activity-icon"><i class="bi bi-info-circle"></i></div>
                <div class="activity-content">
                    <p class="activity-message">${item.title} – ${item.request_number}</p>
                    <span class="activity-time">${fmtDate(item.time)}</span>
                </div>
            `;
            list.appendChild(li);
        });
    }

    /* ============ المخططات ============ */
    let govChartInstance=null;
    let typeChartInstance=null;

    async function loadGovChart(){
        const q = buildQuery(getActiveFilters());
        const res=await fetch('/dashboard-admin/requests/by-governorate'+q);
        const json=await res.json().catch(()=>({success:false}));
        const ctx=document.getElementById('requestsByGovernorateChart').getContext('2d');

        if(!json.success){
            if(govChartInstance) govChartInstance.destroy();
            govChartInstance=new Chart(ctx,{type:'bar',data:{labels:['لا بيانات'],datasets:[{data:[0]}]}})
            return;
        }
        if(govChartInstance) govChartInstance.destroy();
        if(!json.data.labels.length){
            govChartInstance=new Chart(ctx,{type:'bar',data:{labels:['لا بيانات'],datasets:[{data:[0],backgroundColor:'rgba(200,200,200,.5)'}]}})
            return;
        }
        govChartInstance=new Chart(ctx,{
            type:'bar',
            data:{
                labels:json.data.labels,
                datasets:[{
                    label:'عدد الطلبات',
                    data:json.data.values,
                    backgroundColor:'rgba(26,54,93,.65)',
                    borderColor:'rgba(26,54,93,1)',
                    borderRadius:6,
                    borderWidth:1
                }]
            },
            options:{
                responsive:true,
                interaction:{mode:'index',intersect:false},
                plugins:{
                    legend:{display:false},
                    tooltip:{callbacks:{label:(ctx)=>` ${ctx.parsed.y} طلب`}}
                },
                scales:{
                    y:{beginAtZero:true,ticks:{precision:0,font:{size:11}}},
                    x:{ticks:{font:{size:11}}}
                }
            }
        });
    }

    async function loadTypeChart(){
        const q = buildQuery(getActiveFilters());
        const res=await fetch('/dashboard-admin/requests/by-license-type'+q);
        const json=await res.json().catch(()=>({success:false}));
        const ctx=document.getElementById('requestsTypeChart').getContext('2d');
        if(typeChartInstance) typeChartInstance.destroy();
        if(!json.success || !json.data.labels.length){
            typeChartInstance=new Chart(ctx,{
                type:'pie',
                data:{labels:['لا بيانات'],datasets:[{data:[1],backgroundColor:['rgba(200,200,200,.5)']}]},
                options:{plugins:{legend:{position:'bottom'}}}
            });
            return;
        }
        const colorsBase=[
            'rgba(78,115,223,0.75)',
            'rgba(28,200,138,0.75)',
            'rgba(54,185,204,0.75)',
            'rgba(246,194,62,0.75)',
            'rgba(231,74,59,0.75)',
            'rgba(111,66,193,0.75)',
            'rgba(158,158,158,0.75)'
        ];
        typeChartInstance=new Chart(ctx,{
            type:'pie',
            data:{
                labels:json.data.labels,
                datasets:[{
                    data:json.data.values,
                    backgroundColor:colorsBase.slice(0,json.data.labels.length),
                    borderColor:colorsBase.slice(0,json.data.labels.length).map(c=>c.replace('0.75','1')),
                    borderWidth:1
                }]
            },
            options:{
                responsive:true,
                plugins:{
                    legend:{position:'left',labels:{font:{size:11}}},
                    tooltip:{callbacks:{
                        label:(ctx)=>{
                            const total=ctx.dataset.data.reduce((a,b)=>a+b,0);
                            const val=ctx.parsed;
                            const pct=total?(val/total*100).toFixed(1):0;
                            return ` ${ctx.label}: ${val} (${pct}%)`;
                        }
                    }}
                }
            }
        });
    }

    async function loadCharts(){
        await Promise.all([loadGovChart(),loadTypeChart()]);
    }

    /* ============ مودال الطلبات ============ */
    let currentModalCategory='';
    async function loadModalRequests(category){
        currentModalCategory=category;
        const q = buildQuery({...getActiveFilters(),category});
        const body=document.getElementById('modal-requests-body');
        body.innerHTML='<tr><td colspan="7" class="text-center">جاري التحميل...</td></tr>';
        const res=await fetch('/dashboard-admin/requests/modal'+q);
        const json=await res.json().catch(()=>({success:false}));
        if(!json.success){
            body.innerHTML='<tr><td colspan="7" class="text-center text-danger">خطأ في التحميل</td></tr>';
            return;
        }
        if(!json.data.length){
            body.innerHTML='<tr><td colspan="7" class="text-center">لا توجد بيانات</td></tr>';
            return;
        }
        body.innerHTML='';
        json.data.forEach(r=>{
            const tr=document.createElement('tr');
            tr.innerHTML=`
                <td>${r.request_number}</td>
                <td>${r.license_type}</td>
                <td>${r.governorate}</td>
                <td>${r.directorate}</td>
                <td><span class="badge bg-light text-dark">${r.status}</span></td>
                <td>${fmtDate(r.created_at)}</td>
                <td>${fmtDate(r.last_update)}</td>`;
            body.appendChild(tr);
        });
        document.getElementById('modal-title-dynamic').innerHTML=`<i class="bi bi-list"></i> ${translateCategory(category)}`;
    }


        /* ============ إعادة التحميل الشاملة ============ */
    async function reloadAll(){
        await loadSummary();
        await loadRecentActivity();
        await loadCharts();
    }



    /* ============ الفلاتر المتقدمة ============ */
    function initAdvancedFilterToggle(){
        const toggle=document.getElementById('advanced-filter-toggle');
        const adv=document.getElementById('advanced-filter');
        if(!toggle||!adv)return;
        toggle.addEventListener('click',e=>{
            e.preventDefault();
            adv.classList.toggle('show');
            toggle.classList.toggle('collapsed');
            toggle.innerHTML = adv.classList.contains('show')
                ? '<i class="bi bi-chevron-up"></i> إخفاء الخيارات المتقدمة'
                : '<i class="bi bi-chevron-down"></i> خيارات متقدمة';
        });
    }

    /* ============ تهيئة الأحداث ============ */
    function initEvents(){
        // أزرار الفترة
        document.querySelectorAll('.time-filter-btn').forEach(btn=>{
            btn.addEventListener('click',()=>{
                document.querySelectorAll('.time-filter-btn').forEach(b=>b.classList.remove('active'));
                btn.classList.add('active');
                reloadAll();
            });
        });

        // تطبيق
        document.getElementById('apply-filter')?.addEventListener('click',e=>{
            e.preventDefault();
            reloadAll();
        });

        // إعادة تعيين
        document.getElementById('reset-filter')?.addEventListener('click',e=>{
            e.preventDefault();
            document.getElementById('filter-license-type').value='';
            document.getElementById('filter-status').value='';
            document.getElementById('filter-date-from').value='';
            document.getElementById('filter-date-to').value='';
            document.getElementById('filter-governorate').value='';
            document.getElementById('filter-directorate').innerHTML='<option value="">اختر المحافظة أولاً</option>';
            document.querySelectorAll('.time-filter-btn').forEach(b=>b.classList.remove('active'));
            document.querySelector('.time-filter-btn[data-period="none"]').classList.add('active');
            reloadAll();
        });

        // البطاقات
        document.querySelectorAll('.summary-card').forEach(card=>{
            card.addEventListener('click',()=>{
                const category=card.getAttribute('data-category');
                loadModalRequests(category);
            });
        });

        // زر التصدير داخل المودال
        document.getElementById('export-report-btn')?.addEventListener('click',()=>{
            const filters=getActiveFilters();
            const url='/dashboard-admin/export/requests'+buildQuery({...filters,category:currentModalCategory});
            window.open(url,'_blank');
        });

        // زر التصدير الكامل (كل الفئات بنفس الفلاتر) - سنعيد استخدام endpoint لكل فئة على حدة (خيار: new, review, technical, completed)
        document.getElementById('export-current-all')?.addEventListener('click',async ()=>{
            const categories=['new','review','technical','completed'];
            const filters=getActiveFilters();
            // تنزيل ملف لكل فئة
            categories.forEach(cat=>{
                const url='/dashboard-admin/export/requests'+buildQuery({...filters,category:cat});
                window.open(url,'_blank');
            });
        });
    }

       /* ==================== تهيئة الصفحة ==================== */
    async function initDashboard(){
        initAdvancedFilterToggle();
        initEvents();
        await loadBasicFilters();
        await reloadAll();
    }

    /* ============ تهيئة الصفحة ============ */

    function runDashboardInit() {
        initDashboard();
    }

    // إذا كنت تستخدم AJAX لتحميل الصفحة، تأكد من استدعاء runDashboardInit() بعد تحميل محتوى الصفحة
    $(document).ready(function() {
        runDashboardInit();
    });

// مثال: إذا كنت تستخدم PJAX أو أي مكتبة SPA/AJAX، أضف هذا بعد تحميل محتوى الصفحة
// $(document).on('pjax:end', function() {
//     runDashboardInit();

</script>

