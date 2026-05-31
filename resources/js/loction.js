
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

