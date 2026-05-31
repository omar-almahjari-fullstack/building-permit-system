<style>
    :root {
        --primary: #142a4e;
        --accent: #d4af37;
        --light: #ffffff;
        --light-gray: #f8f9fa;
        --border: #dee2e6;
        --shadow-sm: 0 2px 8px rgba(0,0,0,0.08);
        --shadow-md: 0 4px 12px rgba(0,0,0,0.12);
        --transition: all 0.3s ease;
    }

    .card-notif {
        background-color: #fdfdfd;
        border-radius: 12px;
        box-shadow: var(--shadow-sm);
        position: relative;
        margin-bottom: 15px;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        transition: var(--transition);
    }

    .card-notif:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .card-color-side {
        width: 6px;
        border-radius: 0 12px 12px 0;
        height: 100%;
        position: absolute;
        right: 0;
        top: 0;
    }

    .priority-عادي { background-color: #d0e8ff; }
    .priority-متوسط { background-color: #fff4cc; }
    .priority-مرتفع { background-color: #ffe0e0; }
    .priority-حرج { background-color: #ffd6e0; }

    .notif-body {
        display: flex;
        flex-direction: column;
        gap: 5px;
        flex: 1;
    }

    .notif-header {
        font-weight: bold;
        color: var(--primary);
        font-size: 16px;
    }

    .notif-description {
        color: #2c3e50;
    }

    .notif-info {
        font-size: 13px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: flex-start;
        color: #555;
    }

    .notif-info span {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .notif-info .date {
        color: #0a1a2e;
        font-weight: 500;
        text-align: left;
    }

    /* التواريخ وكلمة غير محدد على اليسار */
    .date-left {
        text-align: left !important;
        direction: ltr;
    }

</style>

<div id="notificationsTableBody">
    @foreach($notifications as $notification)
    <div class="card-notif">
        <div class="notif-body">
            <div class="notif-header">
                <i class="bi bi-bell"></i> {{ $notification->title }} (ID: {{ $notification->id }})
            </div>
            <div class="notif-description">
                {{ $notification->description }}
            </div>
            <div class="notif-info">
                <span><i class="bi bi-card-text"></i> المرجع: {{ $notification->reference_id ?? 'غير محدد' }}</span>
                <span><i class="bi bi-tags"></i> النوع: {{ $notification->type }}</span>
                <span><i class="bi bi-flag"></i> الأولوية: {{ $notification->priority }}</span>
                <span><i class="bi bi-building"></i> مرتبط بـ: {{ $notification->related_to }}</span>
                <span class="date date-left"><i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($notification->created_at)->format('Y-m-d H:i') }}</span>
                <span class="date date-left"><i class="bi bi-hourglass-split"></i> {{ $notification->expires_at ? \Carbon\Carbon::parse($notification->expires_at)->format('Y-m-d H:i') : 'غير محدد' }}</span>
            </div>
        </div>
        <div class="card-color-side priority-{{ $notification->priority }}"></div>
    </div>
    @endforeach
</div>
