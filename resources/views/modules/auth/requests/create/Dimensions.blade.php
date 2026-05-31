@vite(['resources/css/requests.css'])

<style>
    #map {
        height: 300px;
        /* أو أي ارتفاع مناسب */
        width: 100%;
        border-radius: 8px;
    }

    .zoom-info {
        position: absolute;
        top: 10px;
        right: 10px;
        background: white;
        padding: 5px 10px;
        border-radius: 4px;
        z-index: 999;
        font-size: 12px;
    }
</style>

<div class="content_requests">
    <div class="contener_requests">
        <div class="modal-body">
            <!-- المعلومات الجغرافية -->
            <div class="container py-4">
                <h5 class="h5_lab">المعلومات الجغرافية</h5>

                <!-- الصف الأول: الخريطة -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">
                                    <i class="fas fa-map gold-icon"></i>
                                    خريطة صنعاء التفاعلية
                                </h5>
                                <div>
                                    <button id="currentLocation" class="btn btn-sm btn-outline-light me-2"
                                        title="موقعي الحالي">
                                        <i class="fas fa-location-arrow"></i>
                                    </button>
                                    <button id="clearMarker" class="btn btn-sm btn-outline-light" title="مسح العلامة">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body p-0 position-relative">
                                <div id="map"></div>
                                <div class="zoom-info" id="zoomLevel">مستوى التكبير: 12</div>
                                <div class="p-2 bg-light text-center">
                                    <small class="text-muted">انقر على أي منطقة في الخريطة لتحديد الموقع
                                        تلقائيًا</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- الصف الثاني: حقول الإدخال -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="form-section">
                            <form id="locationForm">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">الجهة المصدرة</label>
                                            <input type="text" class="form-control" id="issuingAuthority" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">الامانة</label>
                                            <select class="form-select" id="municipality" required>
                                                <option value="">اختر الامانة</option>
                                                <option value="أمانة العاصمة">أمانة العاصمة</option>
                                                <option value="أمانة صنعاء القديمة">أمانة صنعاء القديمة</option>
                                                <option value="أمانة سنحان">أمانة سنحان</option>
                                                <option value="أمانة بني الحارث">أمانة بني الحارث</option>
                                                <option value="أمانة همدان">أمانة همدان</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">وحدة الجوار</label>
                                            <input type="text" class="form-control" id="neighborhoodUnit" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">الحي</label>
                                            <input type="text" class="form-control" id="district" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">رقم المخطط</label>
                                            <input type="text" class="form-control" id="planNumber" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label fw-bold">رقم البلوك</label>
                                            <input type="text" class="form-control" id="blockNumber" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="p-3 mb-3"
                                            style="background-color: #f8f9fa; border-radius: 8px; border-left: 4px solid var(--gold-primary);">
                                            <h6 class="fw-bold">
                                                <i class="fas fa-map-pin gold-icon"></i>
                                                الإحداثيات الجغرافية
                                            </h6>
                                            <div class="row">
                                                <div class="col-md-6 mb-2">
                                                    <label class="form-label">خط العرض (X)</label>
                                                    <input type="text" class="form-control" id="latitude" readonly>
                                                </div>
                                                <div class="col-md-6 mb-2">
                                                    <label class="form-label">خط الطول (Y)</label>
                                                    <input type="text" class="form-control" id="longitude" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-grid gap-2 mt-3">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save me-2"></i> حفظ الموقع
                                            </button>
                                            <button type="button" id="resetBtn" class="btn btn-outline-secondary">
                                                <i class="fas fa-undo me-2"></i> إعادة تعيين
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- الصف الثالث: جدول البيانات -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-sm">
                            <div class="card-header">
                                <h5 class="mb-0">
                                    <i class="fas fa-table gold-icon"></i>
                                    سجل المواقع المضافة
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الحي</th>
                                                <th>الامانة</th>
                                                <th>وحدة الجوار</th>
                                                <th>الإحداثيات</th>
                                                <th>إجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="locationsTable">
                                            <!-- البيانات ستضاف هنا تلقائيًا -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- بيانات الاراضي -->
            <form id="landDataForm" class="form_add" style="border: snow solid 1px; margin-bottom: 30px">
                <h5 class="h5_lab">بيانات الاراضي</h5>
                <table class="table table-hover text-right">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">رقم قطعة الارض</th>
                            <th scope="col">مساحة الارض</th>
                            <th scope="col">نظام البناء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td><input type="text" class="form-control" id="landPieceNumber"
                                    name="landPieceNumber" value="411"></td>
                            <td><input type="text" class="form-control" id="landArea" name="landArea"
                                    value="601.76"></td>
                            <td><input type="text" class="form-control" id="buildingSystem" name="buildingSystem"
                                    value="س1-أ"></td>
                        </tr>

                    </tbody>
                </table>


                <h5 class="h5_lab">اشتراطات البناء لقطعة الارض</h5>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>نسبة البناء</label>
                            <input type="text" class="form-control" name="building_percentage" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>اقصى ارتفاع للمبنى</label>
                            <input type="text" class="form-control" name="max_building_height" required>
                        </div>
                    </div>
                </div>


                <h5 class="h5_lab">تفاصيل النفايات</h5>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>عمق الحفر</label>
                            <input type="text" class="form-control" name="digging_depth" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>كثافة التربة</label>
                            <input type="text" class="form-control" name="soil_density" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>نوع الهيكل</label>
                            <select class="form-control" name="structure_type">
                                <option value="">اختر نوع الهيكل</option>
                                <option value="خرسانة">خرسانة</option>
                                <option value="حديد">حديد</option>
                                <option value="مختلط">مختلط</option>
                            </select>
                        </div>
                    </div>
                </div>


                <button class="btn btn-primary" type="submit">حفظ</button>
            </form>

            <!-- بيانات الحدود والابعاد -->
            <form id="boundariesForm" class="form_add">
                <h5 class="h5_lab">بيانات الحدود والابعاد</h5>
                <table class="table table-hover text-right">
                    <thead class="table-info">
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">الشمال</th>
                            <th scope="col">الشرق</th>
                            <th scope="col">الجنوب</th>
                            <th scope="col">الغرب</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">الحد حسب الصك</th>
                            <td>
                                <select class="form-control" name="north_deed">
                                    <option value="عرض 16م">عرض 16م</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="east_deed">
                                    <option value="رقم 409">رقم 409</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="south_deed">
                                    <option value="رقم 412">رقم 412</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="west_deed">
                                    <option value="رقم 413">رقم 413</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">الحد حسب الطبيعة</th>
                            <td><input type="text" class="form-control" name="north_nature" value="شارع عرض 16م">
                            </td>
                            <td><input type="text" class="form-control" name="east_nature" value="قطعة رقم 409">
                            </td>
                            <td><input type="text" class="form-control" name="south_nature" value="قطعة رقم 412">
                            </td>
                            <td><input type="text" class="form-control" name="west_nature" value="قطعة رقم 413">
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">الطول حسب الصك</th>
                            <td><input type="text" class="form-control" name="north_length_deed" value="24">
                            </td>
                            <td><input type="text" class="form-control" name="east_length_deed" value="25.3">
                            </td>
                            <td><input type="text" class="form-control" name="south_length_deed" value="24">
                            </td>
                            <td><input type="text" class="form-control" name="west_length_deed" value="24.85">
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">الطول حسب الطبيعة</th>
                            <td><input type="text" class="form-control" name="north_length_nature"
                                    value="24"></td>
                            <td><input type="text" class="form-control" name="east_length_nature" value="25.3">
                            </td>
                            <td><input type="text" class="form-control" name="south_length_nature"
                                    value="24"></td>
                            <td><input type="text" class="form-control" name="west_length_nature" value="24.85">
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">الشطفة</th>
                            <td><input type="text" class="form-control" name="north_angle" value="0"></td>
                            <td><input type="text" class="form-control" name="east_angle" value="0"></td>
                            <td><input type="text" class="form-control" name="south_angle" value="0"></td>
                            <td><input type="text" class="form-control" name="west_angle" value="0"></td>
                        </tr>

                        <tr>
                            <th scope="row">الاتجاه</th>
                            <td>
                                <select class="form-control" name="north_direction">
                                    <option value="امامي">امامي</option>
                                    <option value="جانبي y">جانبي y</option>
                                    <option value="خلفي">خلفي</option>
                                    <option value="جانبي x">جانبي x</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="east_direction">
                                    <option value="امامي">امامي</option>
                                    <option value="جانبي y">جانبي y</option>
                                    <option value="خلفي">خلفي</option>
                                    <option value="جانبي x">جانبي x</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="south_direction">
                                    <option value="امامي">امامي</option>
                                    <option value="جانبي y">جانبي y</option>
                                    <option value="خلفي">خلفي</option>
                                    <option value="جانبي x">جانبي x</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="west_direction">
                                    <option value="امامي">امامي</option>
                                    <option value="جانبي y">جانبي y</option>
                                    <option value="خلفي">خلفي</option>
                                    <option value="جانبي x">جانبي x</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">الارتداد</th>
                            <td><input type="text" class="form-control" name="north_setback" required></td>
                            <td><input type="text" class="form-control" name="east_setback" required></td>
                            <td><input type="text" class="form-control" name="south_setback" required></td>
                            <td><input type="text" class="form-control" name="west_setback" required></td>
                        </tr>

                        <tr>
                            <th scope="row">البروز</th>
                            <td><input type="text" class="form-control" name="north_protrusion" required></td>
                            <td><input type="text" class="form-control" name="east_protrusion" required></td>
                            <td><input type="text" class="form-control" name="south_protrusion" required></td>
                            <td><input type="text" class="form-control" name="west_protrusion" required></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-primary" type="submit">حفظ الحدود والأبعاد</button>
            </form>

             <!-- بيانات تقرير المهندس -->
            <form class="form_request" id="form_request">
                <input type="hidden" name="beneficiary_id">
                <input type="hidden" name="request_id">

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="engineer_id">المهندس</label>
                            <select class="custom-select" id="engineer_id" name="engineer_id">
                                <option selected>
                                    <...>
                                </option>
                                <!-- سيتم إضافة خيارات المهندسين هنا ديناميكياً -->
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="inspection_date">تاريخ النزول</label>
                            <input type="date" class="form-control" id="inspection_date" name="inspection_date"
                                required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <div class="bac">
                            <label for="report_text">تفاصيل المعاينة</label>
                            <textarea class="form-control" id="report_text" name="report_text" rows="3"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="condition">حالة الموقع</label>
                            <select class="custom-select" id="condition" name="condition">
                                <option selected>
                                    <...>
                                </option>
                                <option value="سليم">سليم</option>
                                <option value="مخالف">مخالف</option>
                                <option value="بحاجة لإصلاح">بحاجة لإصلاح</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="recommendation">توصية المهندس</label>
                            <input type="text" class="form-control" id="recommendation" name="recommendation">
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="request_type">نوع الطلب</label>
                            <select class="custom-select" id="inputGroupSelect01" name="request_type">
                                <option selected>
                                    <...>
                                </option>
                                <option value="1">ترخيص بناء</option>
                                <option value="3">ترخيص تسوير</option>
                                <option value="2">ترخيص هدم</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>

            {{-- <!-- اشتراطات البناء -->
            <form id="buildingRequirementsForm" class="form_add">
                <h5 class="h5_lab">اشتراطات البناء لقطعة الارض</h5>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>نسبة البناء</label>
                            <input type="text" class="form-control" name="building_percentage" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>اقصى ارتفاع للمبنى</label>
                            <input type="text" class="form-control" name="max_building_height" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">حفظ اشتراطات البناء</button>
            </form> --}}

            <!-- تفاصيل النفايات -->
            {{-- <form id="wasteDetailsForm" class="form_add">
                <h5 class="h5_lab">تفاصيل النفايات</h5>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>عمق الحفر</label>
                            <input type="text" class="form-control" name="digging_depth" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>كثافة التربة</label>
                            <input type="text" class="form-control" name="soil_density" required>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label>نوع الهيكل</label>
                            <select class="form-control" name="structure_type">
                                <option value="">اختر نوع الهيكل</option>
                                <option value="خرسانة">خرسانة</option>
                                <option value="حديد">حديد</option>
                                <option value="مختلط">مختلط</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">حفظ تفاصيل النفايات</button>
            </form> --}}
        </div>
    </div>
</div>

{{-- <script>
    // تهيئة الخريطة مع تفعيل التكبير العالي
    const map = L.map('map', {
        maxZoom: 19,
        minZoom: 10
    }).setView([15.3694, 44.1910], 15);

    // طبقات الخريطة
    const baseLayers = {
        "الخريطة الأساسية": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19
        }),
        "القمر الاصطناعي": L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community',
                maxZoom: 19
            })
    };

    // إضافة الطبقة الأساسية
    baseLayers["الخريطة الأساسية"].addTo(map);

    // إضافة عناصر تحكم الطبقات
    L.control.layers(baseLayers, null, {
        position: 'topright'
    }).addTo(map);

    // طبقة لتخزين حدود الأحياء
    const districtsLayer = L.layerGroup().addTo(map);
    let marker = null;
    let savedLocations = [];

    // تحديث مستوى التكبير عند التغيير
    map.on('zoomend', function() {
        document.getElementById('zoomLevel').textContent = `مستوى التكبير: ${map.getZoom()}`;
    });

    // تحميل بيانات الخريطة من ملف GeoJSON (سيكون من ملف خارجي في التطبيق الحقيقي)
    function loadGeoJSONData() {
        // في التطبيق الحقيقي، هنا ستقوم بجلب ملف GeoJSON من الخادم
        // هذا مثال لبيانات GeoJSON مبسطة
        const geojsonData = {
            "type": "FeatureCollection",
            "features": [{
                    "type": "Feature",
                    "properties": {
                        "name": "حي القاسمي",
                        "municipality": "أمانة العاصمة",
                        "unit": "الوحدة المركزية"
                    },
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                [44.185, 15.365],
                                [44.195, 15.365],
                                [44.195, 15.375],
                                [44.185, 15.375],
                                [44.185, 15.365]
                            ]
                        ]
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "name": "حي التحرير",
                        "municipality": "أمانة العاصمة",
                        "unit": "الوحدة المركزية"
                    },
                    "geometry": {
                        "type": "Polygon",
                        "coordinates": [
                            [
                                [44.200, 15.350],
                                [44.210, 15.350],
                                [44.210, 15.360],
                                [44.200, 15.360],
                                [44.200, 15.350]
                            ]
                        ]
                    }
                }
            ]
        };

        // إضافة البيانات إلى الخريطة
        L.geoJSON(geojsonData, {
            style: {
                color: '#D4AF37',
                weight: 2,
                opacity: 0.8,
                fillOpacity: 0.1
            },
            onEachFeature: function(feature, layer) {
                layer.bindPopup(`
                        <b>${feature.properties.name}</b><br>
                        <small>الامانة: ${feature.properties.municipality}</small><br>
                        <small>وحدة الجوار: ${feature.properties.unit}</small>
                    `);

                // تخزين الطبقة للاستخدام لاحقاً
                districtsLayer.addLayer(layer);
            }
        }).addTo(map);
    }

    // تحميل بيانات الخريطة عند بدء التشغيل
    loadGeoJSONData();

    // النقر على الخريطة
    map.on('click', function(e) {
        const {
            lat,
            lng
        } = e.latlng;

        // تحديث الإحداثيات
        document.getElementById('latitude').value = lat.toFixed(6);
        document.getElementById('longitude').value = lng.toFixed(6);

        // البحث عن الحي الذي تم النقر عليه
        findDistrictAtClick([lat, lng]);

        // وضع العلامة على الخريطة
        placeMarker(lat, lng);
    });

    // البحث عن الحي عند النقر
    function findDistrictAtClick(latlng) {
        let foundDistrict = false;

        districtsLayer.eachLayer(function(layer) {
            if (layer instanceof L.Polygon && layer.getBounds().contains(latlng)) {
                const props = layer.feature.properties;
                document.getElementById('municipality').value = props.municipality;
                document.getElementById('neighborhoodUnit').value = props.unit;
                document.getElementById('district').value = props.name;
                foundDistrict = true;
            }
        });

        if (!foundDistrict) {
            document.getElementById('municipality').value = "أمانة غير معروفة";
            document.getElementById('neighborhoodUnit').value = "وحدة غير معروفة";
            document.getElementById('district').value = "حي غير معروف";
        }
    }

    // وضع العلامة على الخريطة
    function placeMarker(lat, lng) {
        if (marker) map.removeLayer(marker);

        marker = L.marker([lat, lng], {
                draggable: true,
                icon: L.icon({
                    iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41]
                })
            }).addTo(map)
            .bindPopup(`
                <div style="color: #333;">
                    <h6 style="color: var(--navy-dark); margin-bottom: 5px;">
                        <i class="fas fa-map-pin"></i> ${document.getElementById('district').value || 'موقع جديد'}
                    </h6>
                    <p><strong>الإحداثيات:</strong> ${lat.toFixed(6)}, ${lng.toFixed(6)}</p>
                    <p><strong>الامانة:</strong> ${document.getElementById('municipality').value || 'غير محدد'}</p>
                    <p><strong>وحدة الجوار:</strong> ${document.getElementById('neighborhoodUnit').value || 'غير محدد'}</p>
                </div>
            `)
            .openPopup();

        marker.on('dragend', function(e) {
            const newPos = e.target.getLatLng();
            document.getElementById('latitude').value = newPos.lat.toFixed(6);
            document.getElementById('longitude').value = newPos.lng.toFixed(6);
            findDistrictAtClick(newPos);
        });
    }

    // حفظ البيانات
    document.getElementById('locationForm').addEventListener('submit', function(e) {
        e.preventDefault();

        if (!marker) {
            alert("الرجاء تحديد موقع على الخريطة أولاً");
            return;
        }

        const location = {
            id: Date.now(),
            issuingAuthority: document.getElementById('issuingAuthority').value,
            municipality: document.getElementById('municipality').value,
            neighborhoodUnit: document.getElementById('neighborhoodUnit').value,
            district: document.getElementById('district').value,
            planNumber: document.getElementById('planNumber').value,
            blockNumber: document.getElementById('blockNumber').value,
            coordinates: `${document.getElementById('latitude').value}, ${document.getElementById('longitude').value}`,
            timestamp: new Date().toLocaleString()
        };

        savedLocations.push(location);
        updateLocationsTable();
        this.reset();
        if (marker) map.removeLayer(marker);
        marker = null;

        showAlert("تم حفظ الموقع بنجاح!", "success");
    });

    // تحديث جدول المواقع
    function updateLocationsTable() {
        const tbody = document.getElementById('locationsTable');
        tbody.innerHTML = '';

        savedLocations.forEach((loc, index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${loc.district}</td>
                    <td>${loc.municipality}</td>
                    <td>${loc.neighborhoodUnit}</td>
                    <td>${loc.coordinates}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-2" onclick="loadLocation(${loc.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteLocation(${loc.id})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                `;
            tbody.appendChild(tr);
        });
    }

    // تحميل موقع محفوظ
    window.loadLocation = function(id) {
        const location = savedLocations.find(loc => loc.id === id);
        if (location) {
            document.getElementById('issuingAuthority').value = location.issuingAuthority;
            document.getElementById('municipality').value = location.municipality;
            document.getElementById('neighborhoodUnit').value = location.neighborhoodUnit;
            document.getElementById('district').value = location.district;
            document.getElementById('planNumber').value = location.planNumber;
            document.getElementById('blockNumber').value = location.blockNumber;

            const [lat, lng] = location.coordinates.split(',');
            document.getElementById('latitude').value = lat.trim();
            document.getElementById('longitude').value = lng.trim();

            map.setView([parseFloat(lat), parseFloat(lng)], 18);
            placeMarker(parseFloat(lat), parseFloat(lng));
        }
    }

    // حذف موقع
    window.deleteLocation = function(id) {
        if (confirm("هل أنت متأكد من حذف هذا الموقع؟")) {
            savedLocations = savedLocations.filter(loc => loc.id !== id);
            updateLocationsTable();
            showAlert("تم حذف الموقع بنجاح!", "danger");
        }
    }

    // إعادة تعيين النموذج
    document.getElementById('resetBtn').addEventListener('click', function() {
        document.getElementById('locationForm').reset();
        if (marker) {
            map.removeLayer(marker);
            marker = null;
        }
        showAlert("تم إعادة تعيين النموذج", "info");
    });

    // تحديد الموقع الحالي
    document.getElementById('currentLocation').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const {
                        latitude,
                        longitude
                    } = position.coords;
                    map.setView([latitude, longitude], 18);

                    document.getElementById('latitude').value = latitude.toFixed(6);
                    document.getElementById('longitude').value = longitude.toFixed(6);

                    findDistrictAtClick([latitude, longitude]);
                    placeMarker(latitude, longitude);
                },
                function(error) {
                    alert("تعذر الحصول على الموقع: " + error.message);
                }
            );
        } else {
            alert("المتصفح لا يدعم خدمة الموقع الجغرافي");
        }
    });

    // مسح العلامة
    document.getElementById('clearMarker').addEventListener('click', function() {
        if (marker) {
            map.removeLayer(marker);
            marker = null;
            document.getElementById('latitude').value = '';
            document.getElementById('longitude').value = '';
        }
    });

    // إظهار إشعار
    function showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} position-fixed top-0 start-50 translate-middle-x mt-3`;
        alertDiv.style.zIndex = "9999";
        alertDiv.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'danger' ? 'fa-exclamation-circle' : 'fa-info-circle'} me-2"></i>
                    ${message}
                </div>
            `;
        document.body.appendChild(alertDiv);

        setTimeout(() => {
            alertDiv.style.opacity = "0";
            setTimeout(() => alertDiv.remove(), 500);
        }, 3000);
    }
</script> --}}

{{-- @vite(['resources/js/loction.js']) --}}

{{-- <script>
document.addEventListener("DOMContentLoaded", function() {

    // ==================== تهيئة الخريطة ====================
    function initializeMap() {
        // إزالة الخريطة القديمة إذا كانت موجودة
        if (window.map) {
            window.map.remove();
        }

        window.map = L.map('map', { maxZoom: 19, minZoom: 10 }).setView([15.3694, 44.1910], 15);

        // الطبقات الأساسية
        const baseLayers = {
            "الخريطة الأساسية": L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap',
                maxZoom: 19
            }).addTo(window.map),
            "القمر الاصطناعي": L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: 'Tiles &copy; Esri',
                    maxZoom: 19
                })
        };

        L.control.layers(baseLayers).addTo(window.map);

        // طبقة الأحياء
        window.districtsLayer = L.layerGroup().addTo(window.map);
        window.marker = null;

        // عرض مستوى التكبير
        window.map.on('zoomend', function() {
            const zoomEl = document.getElementById('zoomLevel');
            if (zoomEl) zoomEl.textContent = `مستوى التكبير: ${window.map.getZoom()}`;
        });

        // تحميل بيانات GeoJSON
        loadGeoJSONData();

        // النقر على الخريطة
        window.map.on('click', function(e) {
            const { lat, lng } = e.latlng;
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
            findDistrictAtClick([lat, lng]);
            placeMarker(lat, lng);
        });
    }

    // ==================== بيانات GeoJSON ====================
    function loadGeoJSONData() {
        const geojsonData = {
            "type": "FeatureCollection",
            "features": [
                {
                    "type": "Feature",
                    "properties": { "name": "حي القاسمي", "municipality": "أمانة العاصمة", "unit": "الوحدة المركزية" },
                    "geometry": { "type": "Polygon", "coordinates": [[[44.185, 15.365],[44.195, 15.365],[44.195, 15.375],[44.185, 15.375],[44.185, 15.365]]] }
                },
                {
                    "type": "Feature",
                    "properties": { "name": "حي التحرير", "municipality": "أمانة العاصمة", "unit": "الوحدة المركزية" },
                    "geometry": { "type": "Polygon", "coordinates": [[[44.200, 15.350],[44.210, 15.350],[44.210, 15.360],[44.200, 15.360],[44.200, 15.350]]] }
                }
            ]
        };

        L.geoJSON(geojsonData, {
            style: { color: '#D4AF37', weight: 2, opacity: 0.8, fillOpacity: 0.1 },
            onEachFeature: function(feature, layer) {
                layer.bindPopup(`
                    <b>${feature.properties.name}</b><br>
                    <small>الامانة: ${feature.properties.municipality}</small><br>
                    <small>وحدة الجوار: ${feature.properties.unit}</small>
                `);
                window.districtsLayer.addLayer(layer);
            }
        }).addTo(window.map);
    }

    // ==================== البحث عن الحي ====================
    function findDistrictAtClick(latlng) {
        let foundDistrict = false;
        window.districtsLayer.eachLayer(function(layer) {
            if (layer instanceof L.Polygon && layer.getBounds().contains(latlng)) {
                const props = layer.feature.properties;
                document.getElementById('municipality').value = props.municipality;
                document.getElementById('neighborhoodUnit').value = props.unit;
                document.getElementById('district').value = props.name;
                foundDistrict = true;
            }
        });
        if (!foundDistrict) {
            document.getElementById('municipality').value = "أمانة غير معروفة";
            document.getElementById('neighborhoodUnit').value = "وحدة غير معروفة";
            document.getElementById('district').value = "حي غير معروف";
        }
    }

    // ==================== وضع العلامة ====================
    function placeMarker(lat, lng) {
        if (window.marker) window.map.removeLayer(window.marker);
        window.marker = L.marker([lat, lng], {
            draggable: true,
            icon: L.icon({ iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png', iconSize: [25, 41], iconAnchor: [12, 41] })
        }).addTo(window.map)
        .bindPopup(`
            <div style="color: #333;">
                <h6 style="color: navy; margin-bottom: 5px;">
                    <i class="fas fa-map-pin"></i> ${document.getElementById('district').value || 'موقع جديد'}
                </h6>
                <p><strong>الإحداثيات:</strong> ${lat.toFixed(6)}, ${lng.toFixed(6)}</p>
                <p><strong>الامانة:</strong> ${document.getElementById('municipality').value || 'غير محدد'}</p>
                <p><strong>وحدة الجوار:</strong> ${document.getElementById('neighborhoodUnit').value || 'غير محدد'}</p>
            </div>
        `).openPopup();

        window.marker.on('dragend', function(e) {
            const newPos = e.target.getLatLng();
            document.getElementById('latitude').value = newPos.lat.toFixed(6);
            document.getElementById('longitude').value = newPos.lng.toFixed(6);
            findDistrictAtClick(newPos);
        });
    }

    // ==================== حفظ البيانات ====================
    let savedLocations = [];
    document.getElementById('locationForm').addEventListener('submit', function(e) {
        e.preventDefault();
        if (!window.marker) { alert("الرجاء تحديد موقع على الخريطة أولاً"); return; }

        const location = {
            id: Date.now(),
            issuingAuthority: document.getElementById('issuingAuthority').value,
            municipality: document.getElementById('municipality').value,
            neighborhoodUnit: document.getElementById('neighborhoodUnit').value,
            district: document.getElementById('district').value,
            planNumber: document.getElementById('planNumber').value,
            blockNumber: document.getElementById('blockNumber').value,
            coordinates: `${document.getElementById('latitude').value}, ${document.getElementById('longitude').value}`,
            timestamp: new Date().toLocaleString()
        };

        savedLocations.push(location);
        updateLocationsTable();
        this.reset();
        if (window.marker) window.map.removeLayer(window.marker);
        window.marker = null;

        showAlert("تم حفظ الموقع بنجاح!", "success");
    });

    function updateLocationsTable() {
        const tbody = document.getElementById('locationsTable');
        tbody.innerHTML = '';
        savedLocations.forEach((loc, index) => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${index+1}</td>
                <td>${loc.district}</td>
                <td>${loc.municipality}</td>
                <td>${loc.neighborhoodUnit}</td>
                <td>${loc.coordinates}</td>
                <td>
                    <button class="btn btn-sm btn-outline-primary" onclick="loadLocation(${loc.id})">عرض</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteLocation(${loc.id})">حذف</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    window.loadLocation = function(id) {
        const location = savedLocations.find(loc => loc.id === id);
        if (location) {
            document.getElementById('issuingAuthority').value = location.issuingAuthority;
            document.getElementById('municipality').value = location.municipality;
            document.getElementById('neighborhoodUnit').value = location.neighborhoodUnit;
            document.getElementById('district').value = location.district;
            document.getElementById('planNumber').value = location.planNumber;
            document.getElementById('blockNumber').value = location.blockNumber;

            const [lat, lng] = location.coordinates.split(',');
            document.getElementById('latitude').value = lat.trim();
            document.getElementById('longitude').value = lng.trim();

            window.map.setView([parseFloat(lat), parseFloat(lng)], 18);
            placeMarker(parseFloat(lat), parseFloat(lng));
        }
    }

    window.deleteLocation = function(id) {
        if (confirm("هل أنت متأكد من حذف هذا الموقع؟")) {
            savedLocations = savedLocations.filter(loc => loc.id !== id);
            updateLocationsTable();
            showAlert("تم حذف الموقع بنجاح!", "danger");
        }
    }

    // ==================== إعادة تعيين النموذج ====================
    document.getElementById('resetBtn').addEventListener('click', function() {
        document.getElementById('locationForm').reset();
        if (window.marker) {
            window.map.removeLayer(window.marker);
            window.marker = null;
        }
        showAlert("تم إعادة تعيين النموذج", "info");
    });

    // ==================== الموقع الحالي ====================
    document.getElementById('currentLocation').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    const { latitude, longitude } = position.coords;
                    window.map.setView([latitude, longitude], 18);
                    document.getElementById('latitude').value = latitude.toFixed(6);
                    document.getElementById('longitude').value = longitude.toFixed(6);
                    findDistrictAtClick([latitude, longitude]);
                    placeMarker(latitude, longitude);
                },
                function(error) {
                    alert("تعذر الحصول على الموقع: " + error.message);
                }
            );
        } else {
            alert("المتصفح لا يدعم خدمة الموقع الجغرافي");
        }
    });

    // ==================== مسح العلامة ====================
    document.getElementById('clearMarker').addEventListener('click', function() {
        if (window.marker) {
            window.map.removeLayer(window.marker);
            window.marker = null;
            document.getElementById('latitude').value = '';
            document.getElementById('longitude').value = '';
        }
    });

    // ==================== إشعارات ====================
    function showAlert(message, type) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} position-fixed top-0 start-50 translate-middle-x mt-3`;
        alertDiv.style.zIndex = "9999";
        alertDiv.innerHTML = `
            <div class="d-flex align-items-center">
                <i class="fas ${type==='success'?'fa-check-circle':type==='danger'?'fa-exclamation-circle':'fa-info-circle'} me-2"></i>
                ${message}
            </div>`;
        document.body.appendChild(alertDiv);
        setTimeout(() => { alertDiv.style.opacity="0"; setTimeout(()=>alertDiv.remove(),500); }, 3000);
    }

    // ==================== بدء الخريطة ====================
    initializeMap();

});
</script> --}}


