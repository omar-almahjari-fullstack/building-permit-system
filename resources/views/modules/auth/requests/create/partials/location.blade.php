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

<!-- المعلومات الجغرافية -->
<div class="container py-4" id="locationInfo">
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
                        <button id="currentLocation" class="btn btn-sm btn-outline-light me-2" title="موقعي الحالي">
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
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="request_id" id="request_id" value="">
                    <div class="row">
                        <div class="col-md-4">

                             <div class="mb-3">
                                <label class="form-label fw-bold"> الشارع </label>
                                <input type="text" class="form-control" id="issuingAuthority" name="street"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">الامانة</label>
                                <select class="form-select" id="municipality" name="municipality" required>
                                    <option value="">اختر الامانة</option>
                                    <option value="أمانة العاصمة">أمانة العاصمة</option>
                                    <option value="أمانة صنعاء القديمة">أمانة صنعاء القديمة</option>
                                    <option value="أمانة سنحان">أمانة سنحان</option>
                                    <option value="أمانة بني الحارث">أمانة بني الحارث</option>
                                    <option value="أمانة همدان">أمانة همدان</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">وحدة الجوار / الحي</label>
                                <input type="text" class="form-control" id="neighborhoodUnit"
                                    name="neighborhood_unit" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label fw-bold">الحي</label>
                                <input type="text" class="form-control" id="district" name="district" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">رقم المخطط</label>
                                <input type="text" class="form-control" id="planNumber" name="plan_number" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">رقم البلوك</label>
                                <input type="text" class="form-control" id="blockNumber" name="block_number"
                                    required>
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
                                        <input type="text" class="form-control" id="latitude" name="latitude"
                                            readonly required>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label class="form-label">خط الطول (Y)</label>
                                        <input type="text" class="form-control" id="longitude" name="longitude"
                                            readonly required>
                                    </div>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" id="save" class="btn btn-primary btn-save-request-number"
                                data-action="save"
                                data-form="#locationForm"
                                data-url="add-locations_Ajax"
                                data-method="POST">
                                    <i class="fas fa-save me-2"></i> حفظ الموقع
                                </button>

                                <button type="submit" id="edit edit_license_request" style="display: none;" class="btn btn-primary btn-update-request"
                                data-action="save" data-form="#locationForm"
                                data-url="update_locations" data-method="POST">
                                    <i class="fas fa-edit"></i> تعديل الموقع
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

    {{-- <!-- الصف الثالث: جدول البيانات -->
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
    </div> --}}
</div>


{{--
<script>
    // ✅ تعريف المتغيرات كمتغيرات عامة
    window.map = window.map || null;
    window.marker = window.marker || null;
    window.savedLocations = window.savedLocations || [];
    window.districtsLayer = window.districtsLayer || null;

    // ==================== تهيئة الخريطة ====================
    function initMap() {
        // لو فيه خريطة قديمة، امسح الـ id قبل إنشاء واحدة جديدة
        if (document.getElementById('map')._leaflet_id) {
            document.getElementById('map')._leaflet_id = null;
        }

        // إنشاء الخريطة
        window.map = L.map('map', {
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
        baseLayers["الخريطة الأساسية"].addTo(window.map);

        // إضافة عناصر تحكم الطبقات
        L.control.layers(baseLayers, null, { position: 'topright' }).addTo(window.map);

        // طبقة لتخزين حدود الأحياء
        window.districtsLayer = L.layerGroup().addTo(window.map);

        // تحديث مستوى التكبير
        window.map.on('zoomend', function() {
            document.getElementById('zoomLevel').textContent = `مستوى التكبير: ${window.map.getZoom()}`;
        });

        // تحميل بيانات الأحياء
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

    // ==================== تحميل بيانات الأحياء ====================
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
            icon: L.icon({
                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41]
            })
        }).addTo(window.map)
        .bindPopup(`
            <div style="color: #333;">
                <h6 style="color: var(--navy-dark); margin-bottom: 5px;">
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

        // إعادة تعيين النموذج
        document.getElementById('resetBtn').addEventListener('click', function() {
            document.getElementById('locationForm').reset();
            if (marker) {
                map.removeLayer(marker);
                marker = null;
            }
            showAlert("تم إعادة تعيين النموذج", "info");
        });

    // 🚀 استدعاء الخريطة عند تحميل الصفحة
    initMap();

</script> --}}


{{--
<script>
    window.map = window.map || null;
    window.marker = window.marker || null;

    // ==================== تهيئة الخريطة ====================
    function initMap() {
        if (document.getElementById('map')._leaflet_id) {
            document.getElementById('map')._leaflet_id = null;
        }

        window.map = L.map('map', {
            maxZoom: 19,
            minZoom: 10
        }).setView([15.3694, 44.1910], 15);

        const baseLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap',
            maxZoom: 19
        });
        baseLayer.addTo(window.map);

        window.map.on('zoomend', function() {
            document.getElementById('zoomLevel').textContent = `مستوى التكبير: ${window.map.getZoom()}`;
        });

        // حدث عند النقر
        window.map.on('click', function(e) {
            const { lat, lng } = e.latlng;
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);

            placeMarker(lat, lng);

            // ✅ استدعاء API Nominatim للحصول على العنوان الحقيقي
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json&accept-language=ar`)
                .then(res => res.json())
                .then(data => {
                    console.log("البيانات الكاملة:", data);

                    if (data && data.address) {
                        let state        = data.address.state || "";
                        let city         = data.address.city || data.address.town || data.address.county || "";
                        let neighborhood = data.address.suburb || data.address.neighbourhood || "";
                        let road         = data.address.road || "";

                        // ✅ تعبئة الحقول من بيانات جوجل/OSM
                        document.getElementById('municipality').value = state;
                        document.getElementById('district').value = city;
                        document.getElementById('neighborhoodUnit').value = neighborhood;
                        document.getElementById('issuingAuthority').value = road;

                        // تحديث Popup
                        if (window.marker) {
                            window.marker.setPopupContent(`
                                <div style="color:#333;">
                                    <h6><i class="fas fa-map-pin"></i> ${city || 'موقع جديد'}</h6>
                                    <p><strong>الإحداثيات:</strong> ${lat.toFixed(6)}, ${lng.toFixed(6)}</p>
                                    <p><strong>المحافظة:</strong> ${state}</p>
                                    <p><strong>الحي:</strong> ${neighborhood}</p>
                                    <p><strong>الشارع:</strong> ${road}</p>
                                </div>
                            `).openPopup();
                        }
                    }
                });
        });
    }

    // ==================== وضع العلامة ====================
    function placeMarker(lat, lng) {
        if (window.marker) window.map.removeLayer(window.marker);

        window.marker = L.marker([lat, lng], {
            draggable: true,
            icon: L.icon({
                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41]
            })
        }).addTo(window.map);

        window.marker.on('dragend', function(e) {
            const newPos = e.target.getLatLng();
            document.getElementById('latitude').value = newPos.lat.toFixed(6);
            document.getElementById('longitude').value = newPos.lng.toFixed(6);

            // عند سحب العلامة → تحديث البيانات
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${newPos.lat}&lon=${newPos.lng}&format=json&accept-language=ar`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.address) {
                        let state        = data.address.state || "";
                        let city         = data.address.city || data.address.town || data.address.county || "";
                        let neighborhood = data.address.suburb || data.address.neighbourhood || "";
                        let road         = data.address.road || "";

                        document.getElementById('municipality').value = state;
                        document.getElementById('district').value = city;
                        document.getElementById('neighborhoodUnit').value = neighborhood;
                        document.getElementById('issuingAuthority').value = road;

                        window.marker.setPopupContent(`
                            <div style="color:#333;">
                                <h6><i class="fas fa-map-pin"></i> ${city || 'موقع جديد'}</h6>
                                <p><strong>الإحداثيات:</strong> ${newPos.lat.toFixed(6)}, ${newPos.lng.toFixed(6)}</p>
                                <p><strong>المحافظة:</strong> ${state}</p>
                                <p><strong>الحي:</strong> ${neighborhood}</p>
                                <p><strong>الشارع:</strong> ${road}</p>
                            </div>
                        `).openPopup();
                    }
                });
        });
    }

    // 🚀 تشغيل الخريطة
    initMap();
</script> --}}


<script>
    window.map = window.map || null;
    window.marker = window.marker || null;

    function initMap() {
        if (document.getElementById('map')._leaflet_id) {
            document.getElementById('map')._leaflet_id = null;
        }

        window.map = L.map('map', {
            maxZoom: 19,
            minZoom: 10
        }).setView([15.3694, 44.1910], 15);

        // 🗺️ الخريطة العادية
        const streetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap',
            maxZoom: 19
        });

        // 🌍 القمر الصناعي
        const satelliteMap = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}',
            {
                attribution: 'Tiles © Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, GIS Community',
                maxZoom: 19
            }
        );

        // افتراضيًا: الخريطة العادية
        streetMap.addTo(window.map);

        // ✅ إضافة التحكم لتبديل الخرائط
        const baseMaps = {
            "الخريطة الأساسية": streetMap,
            "القمر الصناعي": satelliteMap
        };
        L.control.layers(baseMaps).addTo(window.map);

        // إظهار مستوى التكبير
        window.map.on('zoomend', function() {
            document.getElementById('zoomLevel').textContent = `مستوى التكبير: ${window.map.getZoom()}`;
        });

        // عند الضغط على الخريطة
        window.map.on('click', function(e) {
            const { lat, lng } = e.latlng;
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);

            placeMarker(lat, lng);

            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json&accept-language=ar`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.address) {
                        let state        = data.address.state || "";
                        let city         = data.address.city || data.address.town || data.address.county || "";
                        let neighborhood = data.address.suburb || data.address.neighbourhood || "";
                        let road         = data.address.road || "";

                        document.getElementById('municipality').value = state;
                        document.getElementById('district').value = city;
                        document.getElementById('neighborhoodUnit').value = neighborhood;
                        document.getElementById('issuingAuthority').value = road;

                        if (window.marker) {
                            window.marker.setPopupContent(`
                                <div style="color:#333;">
                                    <h6><i class="fas fa-map-pin"></i> ${city || 'موقع جديد'}</h6>
                                    <p><strong>الإحداثيات:</strong> ${lat.toFixed(6)}, ${lng.toFixed(6)}</p>
                                    <p><strong>المحافظة:</strong> ${state}</p>
                                    <p><strong>الحي:</strong> ${neighborhood}</p>
                                    <p><strong>الشارع:</strong> ${road}</p>
                                </div>
                            `).openPopup();
                        }
                    }
                });
        });
    }

    function placeMarker(lat, lng) {
        if (window.marker) window.map.removeLayer(window.marker);

        window.marker = L.marker([lat, lng], {
            draggable: true,
            icon: L.icon({
                iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/images/marker-icon.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41]
            })
        }).addTo(window.map);

        window.marker.on('dragend', function(e) {
            const newPos = e.target.getLatLng();
            document.getElementById('latitude').value = newPos.lat.toFixed(6);
            document.getElementById('longitude').value = newPos.lng.toFixed(6);

            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${newPos.lat}&lon=${newPos.lng}&format=json&accept-language=ar`)
                .then(res => res.json())
                .then(data => {
                    if (data && data.address) {
                        let state        = data.address.state || "";
                        let city         = data.address.city || data.address.town || data.address.county || "";
                        let neighborhood = data.address.suburb || data.address.neighbourhood || "";
                        let road         = data.address.road || "";

                        document.getElementById('municipality').value = state;
                        document.getElementById('district').value = city;
                        document.getElementById('neighborhoodUnit').value = neighborhood;
                        document.getElementById('issuingAuthority').value = road;

                        window.marker.setPopupContent(`
                            <div style="color:#333;">
                                <h6><i class="fas fa-map-pin"></i> ${city || 'موقع جديد'}</h6>
                                <p><strong>الإحداثيات:</strong> ${newPos.lat.toFixed(6)}, ${newPos.lng.toFixed(6)}</p>
                                <p><strong>المحافظة:</strong> ${state}</p>
                                <p><strong>الحي:</strong> ${neighborhood}</p>
                                <p><strong>الشارع:</strong> ${road}</p>
                            </div>
                        `).openPopup();
                    }
                });
        });
    }

    initMap();
</script>



{{-- @vite(['resources/js/loction.js']) --}}
{{-- <script>
    // تهيئة الخريطة مع تفعيل التكبير العالي
    let map = L.map('map', {
        maxZoom: 19,
        minZoom: 10
    }).setView([15.3694, 44.1910], 15);

    // طبقات الخريطة
    let baseLayers = {
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
