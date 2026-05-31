  <meta name="csrf-token" content="{{ csrf_token() }}">
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
            background-color: var(--light-gray);
            color: var(--text);
            line-height: 1.6;
        }

        .app-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Section */
        .app-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .app-header::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 150px;
            height: 100%;
            background: linear-gradient(90deg, rgba(212, 175, 55, 0.1), transparent);
        }

        .app-title {
            font-weight: 700;
            font-size: 1.8rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .app-title i {
            color: var(--accent);
            font-size: 1.5rem;
        }

        .app-subtitle {
            opacity: 0.9;
            margin-bottom: 0;
            font-size: 1rem;
        }

        /* Main Content */
        .content-card {
            background-color: var(--light);
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .content-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-2px);
        }

        .section-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid var(--accent);
            display: inline-block;
            position: relative;
        }

        .section-title::after {
            content: "";
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 60px;
            height: 2px;
            background-color: var(--accent-light);
        }

        /* Buttons */
        .btn {
            font-weight: 600;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            color: white;
            box-shadow: 0 2px 6px rgba(20, 42, 78, 0.2);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(20, 42, 78, 0.3);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success), #1e7e34);
            border: none;
            color: white;
        }

        /* Table Styles */
        .table-container {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            margin-bottom: 2rem;
        }

        .table {
            margin-bottom: 0;
            --bs-table-bg: transparent;
            --bs-table-striped-bg: var(--light-gray);
            --bs-table-hover-bg: rgba(20, 42, 78, 0.05);
        }

        .table thead th {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            padding: 1rem;
            text-align: center;
            vertical-align: middle;
            border-bottom-width: 2px;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: var(--border);
        }

        /* Modal Styles */
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .modal-title i {
            color: var(--accent);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 1rem 1.5rem;
            background-color: var(--light-gray);
        }

        /* Form Elements */
        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label i {
            color: var(--accent);
            font-size: 0.9rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(20, 42, 78, 0.15);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .app-header {
                padding: 1.25rem;
            }

            .content-card {
                padding: 1.5rem;
            }

            .table thead {
                display: none;
            }

            .table, .table tbody, .table tr, .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 1.5rem;
                border: 1px solid var(--border);
                border-radius: 8px;
                overflow: hidden;
            }

            .table td {
                text-align: right;
                padding: 0.75rem;
                position: relative;
                border-bottom: 1px solid var(--border);
            }

            .table td::before {
                content: attr(data-label);
                position: absolute;
                left: 1rem;
                top: 0.75rem;
                font-weight: 600;
                color: var(--primary);
                text-transform: uppercase;
                font-size: 0.8rem;
            }

            .table td:last-child {
                border-bottom: none;
            }
        }

        /* Date Time Input Styling */
        input[type="datetime-local"] {
            position: relative;
        }

        input[type="datetime-local"]::-webkit-calendar-picker-indicator {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        /* Custom Select Arrow */
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%232c3e50' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: left 0.75rem center;
            background-size: 16px 12px;
        }
    </style>



    <div class="app-container">
        <!-- Header Section -->
        <header class="app-header">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="app-title">
                        <i class="fas fa-calendar-alt"></i>
                        نظام التقويم والمواعيد
                    </h1>
                    <p class="app-subtitle">إدارة وتنظيم المواعيد والمهام المخطط لها</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <div class="d-flex justify-content-md-end gap-2">
                        <button class="btn btn-outline-light btn-sm">
                            <i class="fas fa-calendar-day me-1"></i>
                            عرض اليوم
                        </button>
                        <button class="btn btn-outline-light btn-sm">
                            <i class="fas fa-calendar-week me-1"></i>
                            عرض الأسبوع
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="content-card">
            <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                <h2 class="section-title">
                    <i class="fas fa-list" style="color: var(--accent);"></i>
                    قائمة المواعيد
                </h2>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addEventModal">
                    <i class="fas fa-plus-circle me-1"></i>
                    إضافة موعد جديد
                </button>
            </div>

            <!-- Appointments Table -->
            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>عنوان الموعد</th>
                            <th>تاريخ ووقت البداية</th>
                            <th>تاريخ ووقت الانتهاء</th>
                            <th>مرتبط بـ</th>
                            <th>تنبيه</th>
                            <th>ملاحظات</th>
                        </tr>
                    </thead>
                    <tbody id="appointmentsTableBody">
                        <tr>
                            <td data-label="عنوان الموعد">اجتماع مع البلدية</td>
                            <td data-label="تاريخ البداية">
                                <div class="d-flex flex-column">
                                    <span>20 يونيو 2025</span>
                                    <small class="text-muted">10:00 صباحاً</small>
                                </div>
                            </td>
                            <td data-label="تاريخ الانتهاء">
                                <div class="d-flex flex-column">
                                    <span>20 يونيو 2025</span>
                                    <small class="text-muted">11:00 صباحاً</small>
                                </div>
                            </td>
                            <td data-label="مرتبط بـ">مشروع #301</td>
                            <td data-label="تنبيه">
                                <span class="badge bg-warning text-dark">قبل ساعة</span>
                            </td>
                            <td data-label="ملاحظات">احضار المخططات</td>
                        </tr>
                        <tr>
                            <td data-label="عنوان الموعد">تقرير الهدم</td>
                            <td data-label="تاريخ البداية">
                                <div class="d-flex flex-column">
                                    <span>25 يونيو 2025</span>
                                    <small class="text-muted">09:00 صباحاً</small>
                                </div>
                            </td>
                            <td data-label="تاريخ الانتهاء">-</td>
                            <td data-label="مرتبط بـ">طلب #208</td>
                            <td data-label="تنبيه">
                                <span class="badge bg-info">قبل يوم</span>
                            </td>
                            <td data-label="ملاحظات">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">السابق</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">التالي</a>
                    </li>
                </ul>
            </nav>
        </main>

        <!-- Add Event Modal -->
        <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form class="modal-content needs-validation" novalidate id="eventForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEventLabel">
                            <i class="fas fa-plus-circle"></i>
                            إضافة موعد جديد
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="eventTitle" class="form-label">
                                    <i class="fas fa-heading"></i>
                                    عنوان الموعد
                                </label>
                                <input type="text" id="eventTitle" class="form-control" required placeholder="أدخل عنوان الموعد" />
                                <div class="invalid-feedback">يرجى إدخال عنوان الموعد</div>
                            </div>

                            <div class="col-md-6">
                                <label for="eventStart" class="form-label">
                                    <i class="fas fa-clock"></i>
                                    تاريخ ووقت البداية
                                </label>
                                <input type="datetime-local" id="eventStart" class="form-control" required />
                                <div class="invalid-feedback">يرجى تحديد تاريخ ووقت البداية</div>
                            </div>

                            <div class="col-md-6">
                                <label for="eventEnd" class="form-label">
                                    <i class="fas fa-clock"></i>
                                    تاريخ ووقت الانتهاء
                                </label>
                                <input type="datetime-local" id="eventEnd" class="form-control" placeholder="اختياري" />
                            </div>

                            <div class="col-md-6">
                                <label for="eventRelated" class="form-label">
                                    <i class="fas fa-link"></i>
                                    مرتبط بـ (طلب / مشروع)
                                </label>
                                <input type="text" id="eventRelated" class="form-control" placeholder="مثال: طلب #123" />
                            </div>

                            <div class="col-md-6">
                                <label for="eventNotification" class="form-label">
                                    <i class="fas fa-bell"></i>
                                    تنبيه قبل الموعد
                                </label>
                                <select id="eventNotification" class="form-select">
                                    <option value="لا يوجد">لا يوجد تنبيه</option>
                                    <option value="قبل 5 دقائق">قبل 5 دقائق</option>
                                    <option value="قبل 15 دقيقة">قبل 15 دقيقة</option>
                                    <option value="قبل 30 دقيقة">قبل 30 دقيقة</option>
                                    <option value="قبل ساعة">قبل ساعة</option>
                                    <option value="قبل يوم">قبل يوم</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="eventDescription" class="form-label">
                                    <i class="fas fa-sticky-note"></i>
                                    ملاحظات إضافية
                                </label>
                                <textarea id="eventDescription" class="form-control" rows="3" placeholder="أدخل أي تفاصيل إضافية عن الموعد..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>
                            حفظ الموعد
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Sample Data
        const appointments = [
            {
                title: "اجتماع مع البلدية",
                start: "2025-06-20T10:00",
                end: "2025-06-20T11:00",
                related: "مشروع #301",
                notification: "قبل ساعة",
                notes: "احضار المخططات"
            },
            {
                title: "تقرير الهدم",
                start: "2025-06-25T09:00",
                end: "",
                related: "طلب #208",
                notification: "قبل يوم",
                notes: ""
            }
        ];

        // Format date for display
        function formatDateForDisplay(dateTimeString) {
            if (!dateTimeString) return '-';

            const date = new Date(dateTimeString);
            const options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                hour12: true
            };

            return date.toLocaleDateString('ar-EG', options);
        }

        // Format time for display
        function formatTimeForDisplay(dateTimeString) {
            if (!dateTimeString) return '-';

            const date = new Date(dateTimeString);
            return date.toLocaleTimeString('ar-EG', { hour: '2-digit', minute: '2-digit', hour12: true });
        }

        // Format date for input
        function formatDateForInput(dateTimeString) {
            if (!dateTimeString) return '';

            const date = new Date(dateTimeString);
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');

            return `${year}-${month}-${day}T${hours}:${minutes}`;
        }

        // Render appointments table
        function renderAppointments() {
            const tbody = document.getElementById("appointmentsTableBody");
            tbody.innerHTML = "";

            appointments.forEach(app => {
                const row = document.createElement("tr");

                // Format dates
                const startDate = formatDateForDisplay(app.start);
                const startTime = formatTimeForDisplay(app.start);
                const endDate = app.end ? formatDateForDisplay(app.end) : '-';
                const endTime = app.end ? formatTimeForDisplay(app.end) : '';

                row.innerHTML = `
                    <td data-label="عنوان الموعد">${app.title}</td>
                    <td data-label="تاريخ البداية">
                        <div class="d-flex flex-column">
                            <span>${startDate.split('،')[0]}</span>
                            <small class="text-muted">${startTime}</small>
                        </div>
                    </td>
                    <td data-label="تاريخ الانتهاء">
                        ${app.end ? `
                        <div class="d-flex flex-column">
                            <span>${endDate.split('،')[0]}</span>
                            <small class="text-muted">${endTime}</small>
                        </div>
                        ` : '-'}
                    </td>
                    <td data-label="مرتبط بـ">${app.related || '-'}</td>
                    <td data-label="تنبيه">
                        ${app.notification === 'لا يوجد' ? '-' : `<span class="badge ${app.notification === 'قبل ساعة' ? 'bg-warning text-dark' : 'bg-info'}">${app.notification}</span>`}
                    </td>
                    <td data-label="ملاحظات">${app.notes || '-'}</td>
                `;

                tbody.appendChild(row);
            });
        }

        // Form Validation and Submission
        document.getElementById("eventForm").addEventListener("submit", function (e) {
            e.preventDefault();

            if (!this.checkValidity()) {
                e.stopPropagation();
                this.classList.add("was-validated");
                return;
            }

            const newAppointment = {
                title: document.getElementById("eventTitle").value,
                start: document.getElementById("eventStart").value,
                end: document.getElementById("eventEnd").value || '',
                related: document.getElementById("eventRelated").value || '',
                notification: document.getElementById("eventNotification").value,
                notes: document.getElementById("eventDescription").value || ''
            };

            appointments.push(newAppointment);
            renderAppointments();

            // Reset form
            this.reset();
            this.classList.remove("was-validated");

            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addEventModal'));
            modal.hide();

            // Show success message
            alert('تم إضافة الموعد بنجاح!');
        });

        // Initialize the page
        document.addEventListener("DOMContentLoaded", function() {
            renderAppointments();

            // Set minimum datetime for start date (current datetime)
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');

            document.getElementById("eventStart").min = `${year}-${month}-${day}T${hours}:${minutes}`;

            // Update end date min when start date changes
            document.getElementById("eventStart").addEventListener('change', function() {
                document.getElementById("eventEnd").min = this.value;
            });
        });
    </script>
