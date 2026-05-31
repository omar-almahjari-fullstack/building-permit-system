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

    /* Badges */
    .badge {
        font-weight: 600;
        padding: 0.5rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-status {
        min-width: 90px;
        display: inline-block;
        text-align: center;
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

    .btn-sm {
        padding: 0.35rem 0.75rem;
        font-size: 0.85rem;
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

    .btn-outline-primary {
        color: var(--primary);
        border-color: var(--primary);
        background-color: transparent;
    }

    .btn-outline-primary:hover {
        background-color: var(--primary);
        color: white;
    }

    .btn-outline-success {
        color: var(--success);
        border-color: var(--success);
    }

    .btn-outline-success:hover {
        background-color: var(--success);
        color: white;
    }

    .btn-outline-danger {
        color: var(--danger);
        border-color: var(--danger);
    }

    .btn-outline-danger:hover {
        background-color: var(--danger);
        color: white;
    }

    .btn-icon {
        width: 36px;
        height: 36px;
        padding: 0;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
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

    .modal-body {
        padding: 1.5rem;
    }

    .modal-footer {
        border-top: 1px solid var(--border);
        padding: 1rem 1.5rem;
        background-color: var(--light-gray);
    }

    /* Form Elements */
    .form-control,
    .form-select {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border);
        transition: var(--transition);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.25rem rgba(20, 42, 78, 0.15);
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    /* Responsive Adjustments */
    @media (max-width: 992px) {
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

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

        .table,
        .table tbody,
        .table tr,
        .table td {
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

        .btn-group-vertical {
            width: 100%;
        }
    }
</style>

<div class="app-container">
    <!-- Header Section -->
    <header class="app-header">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="app-title">
                    <i class="fas fa-money-bill-wave"></i>
                    نظام إدارة هياكل الرسوم
                </h1>
                <p class="app-subtitle">إدارة وتعديل هياكل الرسوم الخاصة بالتراخيص والخدمات</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <div class="d-flex justify-content-md-end gap-2">
                    {{-- <button class="btn btn-outline-light btn-icon">
                        <i class="fas fa-sync-alt"></i>
                    </button> --}}
                    <button type="button" class="btn btn-outline-light btn-icon" title="بحث" id="searchBtn"
                            data-reload-container="#TableFeeStructure" data-reload-url="{{ route('reload-fee_structures-table') }}">
                             <i class="fas fa-sync-alt"></i>
                        </button>
                    {{-- <button class="btn btn-outline-light btn-icon">
                        <i class="fas fa-cog"></i>
                    </button>
                    <button class="btn btn-light" style="color: var(--primary);">
                        <i class="fas fa-bell me-1"></i>
                        <span class="d-none d-md-inline">الإشعارات</span>
                    </button> --}}
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="content-card">
        <h2 class="section-title">
            <i class="fas fa-table" style="color: var(--accent);"></i>
            هياكل الرسوم
        </h2>

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFeeStructureModal">
                <i class="fas fa-plus-circle me-1"></i>
                إضافة هيكل رسوم جديد
            </button>
        </div>

        <!-- Fee Structures Table -->
        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>نوع البناء</th>
                        <th>نوع الطابق</th>
                        <th>نوع الهيكل</th>
                        <th>نوع الشارع</th>
                        <th>نوع الترخيص</th>
                        <th>نوع الطلب</th>
                        <th>رسوم شغل الطريق</th>
                        <th>رسوم الترخيص</th>
                        <th>رسوم إزالة النفايات</th>
                        <th>رسوم تنمية وكوارث</th>
                        <th>الحالة</th>
                        <th>تاريخ الإنشاء</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
               <tbody id="TableFeeStructure">

                    @include('modules.auth.fee_structures_table', ['data' => $data ?? collect([])])

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
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">التالي</a>
                </li>
            </ul>
        </nav>
    </main>

    <!-- Add Fee Structure Modal -->
    <div class="modal fade" id="addFeeStructureModal" tabindex="-1" aria-labelledby="addFeeStructureLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content needs-validation" id="formFeeStructure" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="addFeeStructureLabel">
                        <i class="fas fa-plus-circle" style="color: var(--accent);"></i>
                        إضافة هيكل رسوم جديد
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="building_type_id" class="form-label"> نوع البناء</label>
                            <select id="building_type_id_a" name="building_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع البناء">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع البناء</div>
                        </div>
                        <div class="col-md-6">
                            <label for="floor_type_id" class="form-label"> نوع الطابق</label>
                            <select id="floor_type_id_a" name="floor_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الطابق">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الطابق</div>
                        </div>
                        <div class="col-md-6">
                            <label for="structure_type" class="form-label">نوع الهيكل</label>
                                        <select class="form-control" id="structure_type" name="structure_type">
                                            <option value="">اختر نوع الهيكل</option>
                                            <option value="حجر مسلح">حجر مسلح</option>
                                            <option value="حجر منشار مسلح">حجر منشار مسلح</option>
                                            <option value="بلك مسلح">بلك مسلح</option>
                                            <option value="بلك شعبي">بلك شعبي</option>
                                        </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الهيكل</div>
                        </div>
                        <div class="col-md-6">
                            <label for="street_type_id" class="form-label"> نوع الشارع</label>
                            <select id="street_type_id_a" name="street_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الشارع">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الشارع</div>
                        </div>
                        <div class="col-md-6">
                            <label for="license_type_id" class="form-label"> نوع الترخيص</label>
                            <select id="license_type_id_a" name="license_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الترخيص">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الترخيص</div>
                        </div>
                         <div class="col-md-6">
                            <label for="license_type_id" class="form-label"> نوع الطلب</label>
                            <select id="request_type_id_a" name="request_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الطلب">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الترخيص</div>
                        </div>
                        <div class="col-md-4">
                            <label for="road_occupation_fee" class="form-label">رسوم شغل الطريق</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="road_occupation_fee"
                                    name="road_occupation_fee" class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.س</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم شغل الطريق</div>
                        </div>
                        <div class="col-md-4">
                            <label for="license_fee" class="form-label">رسوم الترخيص</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="license_fee" name="license_fee"
                                    class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.س</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم الترخيص</div>
                        </div>
                        <div class="col-md-4">
                            <label for="waste_removal_fee" class="form-label">رسوم إزالة النفايات</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="waste_removal_fee" name="waste_removal_fee"
                                    class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.س</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم إزالة النفايات</div>
                        </div>
                       <div class="col-md-4">
                            <label for="development_disaster_fee" class="form-label">رسوم تنمية وكوارث</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="development_disaster_fee" name="development_disaster_fee"
                                    class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.ي</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم تنمية وكوارث</div>
                        </div>
                        <div class="col-md-6">
                            <label for="is_active" class="form-label">الحالة</label>
                            <select id="is_active" name="is_active" class="form-select" required>
                                <option value="1" selected>نشط</option>
                                <option value="0">غير نشط</option>
                            </select>
                            <div class="invalid-feedback">يرجى اختيار الحالة</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary btn-save-entity" data-action="save"
                          data-modal="#addFeeStructureModal"
                          data-form="#formFeeStructure"
                          data-url="add-fee_structures"
                          data-reload-container="#TableFeeStructure"
                          data-reload-url="{{ route('reload-fee_structures-table') }}"
                          data-method="POST" >
                        <i class="fas fa-save me-1"></i>
                        حفظ الهيكل
                    </button>
                </div>
            </form>
        </div>
    </div>

     <!-- edit Fee Structure Modal -->
    <div class="modal fade" id="editFeeStructureModal" tabindex="-1" aria-labelledby="addFeeStructureLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form class="modal-content needs-validation" id="editformFeeStructure" novalidate>

                <input type="hidden" id="id" name="id">

                <div class="modal-header">
                    <h5 class="modal-title" id="addFeeStructureLabel">
                        <i class="fas fa-plus-circle" style="color: var(--accent);"></i>
                        تعديل هيكل الرسوم
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="building_type_id" class="form-label"> نوع البناء</label>
                            <select id="building_type_id" name="building_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع البناء">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع البناء</div>
                        </div>
                        <div class="col-md-6">
                            <label for="floor_type_id" class="form-label"> نوع الطابق</label>
                            <select id="floor_type_id" name="floor_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الطابق">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الطابق</div>
                        </div>

                        <div class="col-md-6">
                            <label for="structure_type" class="form-label">نوع الهيكل</label>
                                        <select class="form-control" name="structure_type">
                                            <option value="">اختر نوع الهيكل</option>
                                            <option value="حجر مسلح">حجر مسلح</option>
                                            <option value="حجر منشار مسلح">حجر منشار مسلح</option>
                                            <option value="بلك مسلح">بلك مسلح</option>
                                            <option value="بلك شعبي">بلك شعبي</option>
                                        </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الهيكل</div>
                        </div>

                        <div class="col-md-6">
                            <label for="street_type_id" class="form-label"> نوع الشارع</label>
                            <select id="street_type_id" name="street_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الشارع">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الشارع</div>
                        </div>
                        <div class="col-md-6">
                            <label for="license_type_id" class="form-label"> نوع الترخيص</label>
                            <select id="license_type_id" name="license_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الترخيص">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الترخيص</div>
                        </div>
                        <div class="col-md-6">
                            <label for="license_type_id" class="form-label"> نوع الطلب</label>
                            <select id="request_type_id" name="request_type_id" class="form-control" required
                                placeholder="أدخل معرف نوع الطلب">

                            </select>
                            <div class="invalid-feedback">يرجى إدخال نوع الترخيص</div>
                        </div>
                        <div class="col-md-4">
                            <label for="road_occupation_fee" class="form-label">رسوم شغل الطريق</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="road_occupation_fee"
                                    name="road_occupation_fee" class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.ي</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم شغل الطريق</div>
                        </div>
                        <div class="col-md-4">
                            <label for="license_fee" class="form-label">رسوم الترخيص</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="license_fee" name="license_fee"
                                    class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.ي</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم الترخيص</div>
                        </div>
                        <div class="col-md-4">
                            <label for="waste_removal_fee" class="form-label">رسوم إزالة النفايات</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="waste_removal_fee" name="waste_removal_fee"
                                    class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.ي</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم إزالة النفايات</div>
                        </div>
                         <div class="col-md-4">
                            <label for="development_disaster_fee" class="form-label">رسوم تنمية وكوارث</label>
                            <div class="input-group" dir="ltr">
                                <input type="number" step="0.01" id="development_disaster_fee" name="development_disaster_fee"
                                    class="form-control" required placeholder="0.00">
                                <span class="input-group-text">ر.ي</span>
                            </div>
                            <div class="invalid-feedback">يرجى إدخال رسوم تنمية وكوارث</div>
                        </div>
                        <div class="col-md-6">
                            <label for="is_active" class="form-label">الحالة</label>
                            <select id="is_active" name="is_active" class="form-select" required>
                                <option value="1" selected>نشط</option>
                                <option value="0">غير نشط</option>
                            </select>
                            <div class="invalid-feedback">يرجى اختيار الحالة</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary btn-update-entity" data-action="save"
                          data-modal="#editFeeStructureModal"
                          data-form="#editformFeeStructure"
                          data-route="fee_structures_update"
                          data-reload-container="#TableFeeStructure"
                          data-reload-url="{{ route('reload-fee_structures-table') }}"
                          data-method="POST" >
                        <i class="fas fa-save me-1"></i>
                        تعديل الهيكل
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite(['resources/js/layouts/ajax-crud.js'])

<script>
    $(document).ready(function() {

        /////////////////تعبيه combobx لفورم التعديل

            // ////////////////////////////عرض نوع الطلب
    $(document).ready(function() {
        $.ajax({
            url: "/request_type_new",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#request_type_id");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });
    });

        $.ajax({
            url: "/license_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#license_type_id");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        $.ajax({
            url: "/building_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#building_type_id");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        $.ajax({
            url: "/floor_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#floor_type_id");
                select.empty();
                select.append('<option value="">< ... اختار الادوار ...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        $.ajax({
            url: "/street_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#street_type_id");
                select.empty();
                select.append('<option value="">< ... اختار نوع الشارع ...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        /////////////////تعبيه combobx لفورم الاضافه


            // ////////////////////////////عرض نوع الطلب
    $(document).ready(function() {
        $.ajax({
            url: "/request_type_new",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#request_type_id_a");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });
    });

        $.ajax({
            url: "/license_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#license_type_id_a");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        $.ajax({
            url: "/building_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#building_type_id_a");
                select.empty();
                select.append('<option value=""><...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        $.ajax({
            url: "/floor_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#floor_type_id_a");
                select.empty();
                select.append('<option value="">< ... اختار الادوار ...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });

        $.ajax({
            url: "/street_type",
            type: "GET",
            dataType: "json",
            success: function(data) {
                console.log("✅ البيانات المسترجعة:", data); // تظهر البيانات في Console

                var select = $("#street_type_id_a");
                select.empty();
                select.append('<option value="">< ... اختار نوع الشارع ...></option>');

                $.each(data, function(index, item) {
                    select.append('<option value="' + item.id + '">' + item.name +
                        '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("❌ خطأ أثناء جلب البيانات:", xhr.responseText);
                console.error("الحالة:", status);
                console.error("الرسالة:", error);
            }
        });


    });
</script>

{{-- <script>
    // Form Validation
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script> --}}
