
        // // تعريف المتغيرات العالمية للرسوم البيانية
        // let empChart, regionChart, trendChart, licenseTypeChart;
        // let currentEmpChartType = 'bar';
        // let currentRegionMetric = 'requests';
        // let currentTrendMetric = 'requests';

        // // تهيئة الرسوم البيانية عند تحميل الصفحة
        // document.addEventListener('DOMContentLoaded', function() {
        //     initEmployeeChart();
        //     initRegionChart();
        //     initTrendChart();
        //     initLicenseTypeChart();

        //     // إعداد تفاعلات التبديل
        //     document.getElementById('showTarget').addEventListener('change', function() {
        //         empChart.data.datasets[2].hidden = !this.checked;
        //         empChart.update();
        //     });

        //     document.getElementById('showComparison').addEventListener('change', function() {
        //         empChart.data.datasets[1].hidden = !this.checked;
        //         empChart.update();
        //     });

        //     document.getElementById('chartEmployeeFilter').addEventListener('change', updateAllCharts);
        //     document.getElementById('chartTimeRange').addEventListener('change', updateAllCharts);
        //     document.getElementById('licenseTypeFilter').addEventListener('change', updateAllCharts);
        // });

        // // تهيئة مخطط أداء الموظفين
        // function initEmployeeChart() {
        //     const empCtx = document.getElementById('employeePerformanceChart').getContext('2d');
        //     empChart = new Chart(empCtx, {
        //         type: currentEmpChartType,
        //         data: {
        //             labels: ['محمد أحمد', 'سارة علي', 'أحمد سعيد', 'فاطمة عبدالله', 'خالد سالم'],
        //             datasets: [
        //                 {
        //                     label: 'الطلبات المكتملة',
        //                     data: [98, 85, 60, 72, 68],
        //                     backgroundColor: '#1cc88a',
        //                     borderWidth: 1
        //                 },
        //                 {
        //                     label: 'الطلبات قيد التنفيذ',
        //                     data: [22, 10, 15, 8, 12],
        //                     backgroundColor: '#f6c23e',
        //                     borderWidth: 1
        //                 },
        //                 {
        //                     label: 'الهدف الشهري',
        //                     data: [100, 100, 100, 100, 100],
        //                     backgroundColor: 'rgba(220, 53, 69, 0.2)',
        //                     borderColor: 'rgba(220, 53, 69, 0.8)',
        //                     borderWidth: 1,
        //                     type: 'line',
        //                     fill: false,
        //                     pointRadius: 0,
        //                     borderDash: [5, 5]
        //                 }
        //             ]
        //         },
        //         options: getChartOptions('أداء الموظفين', 'عدد الطلبات')
        //     });
        // }

        // // تهيئة مخطط التوزيع الجغرافي
        // function initRegionChart() {
        //     const regionCtx = document.getElementById('regionDistributionChart').getContext('2d');
        //     regionChart = new Chart(regionCtx, {
        //         type: 'bar',
        //         data: {
        //             labels: ['أمانة العاصمة', 'عدن', 'تعز', 'الحديدة', 'إب', 'ذمار', 'حضرموت'],
        //             datasets: [{
        //                 label: 'عدد الطلبات',
        //                 data: [320, 240, 180, 150, 120, 90, 80],
        //                 backgroundColor: [
        //                     'rgba(54, 185, 204, 0.8)',
        //                     'rgba(78, 115, 223, 0.8)',
        //                     'rgba(28, 200, 138, 0.8)',
        //                     'rgba(246, 194, 62, 0.8)',
        //                     'rgba(231, 74, 59, 0.8)',
        //                     'rgba(108, 117, 125, 0.8)',
        //                     'rgba(111, 66, 193, 0.8)'
        //                 ],
        //                 borderWidth: 1
        //             }]
        //         },
        //         options: getChartOptions('التوزيع الجغرافي', 'عدد الطلبات')
        //     });
        // }

        // // تهيئة مخطط التوجهات الزمنية
        // function initTrendChart() {
        //     const trendCtx = document.getElementById('performanceTrendChart').getContext('2d');
        //     trendChart = new Chart(trendCtx, {
        //         type: 'line',
        //         data: {
        //             labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
        //             datasets: [{
        //                 label: 'الطلبات',
        //                 data: [120, 190, 150, 200, 180, 210],
        //                 borderColor: '#4e73df',
        //                 backgroundColor: 'rgba(78, 115, 223, 0.05)',
        //                 fill: true,
        //                 tension: 0.3,
        //                 borderWidth: 2
        //             }]
        //         },
        //         options: getChartOptions('التوجهات الزمنية', 'عدد الطلبات')
        //     });
        // }

        // // تهيئة مخطط توزيع أنواع التراخيص
        // function initLicenseTypeChart() {
        //     const licenseCtx = document.getElementById('licenseTypeChart').getContext('2d');
        //     licenseTypeChart = new Chart(licenseCtx, {
        //         type: 'doughnut',
        //         data: {
        //             labels: ['بناء', 'هدم', 'تعديل', 'صيانة', 'تجديد'],
        //             datasets: [{
        //                 data: [650, 250, 200, 148, 120],
        //                 backgroundColor: [
        //                     'rgba(78, 115, 223, 0.8)',
        //                     'rgba(40, 167, 69, 0.8)',
        //                     'rgba(255, 193, 7, 0.8)',
        //                     'rgba(220, 53, 69, 0.8)',
        //                     'rgba(111, 66, 193, 0.8)'
        //                 ],
        //                 borderWidth: 1
        //             }]
        //         },
        //         options: {
        //             responsive: true,
        //             maintainAspectRatio: false,
        //             plugins: {
        //                 legend: {
        //                     position: 'bottom',
        //                     rtl: true,
        //                     labels: {
        //                         color: '#e0e0e0'
        //                     }
        //                 },
        //                 title: {
        //                     display: false
        //                 },
        //                 tooltip: {
        //                     rtl: true,
        //                     bodyAlign: 'right'
        //                 }
        //             }
        //         }
        //     });
        // }

        // // الحصول على إعدادات عامة للرسوم البيانية
        // function getChartOptions(title, yTitle) {
        //     return {
        //         responsive: true,
        //         maintainAspectRatio: false,
        //         plugins: {
        //             legend: {
        //                 position: 'bottom',
        //                 rtl: true,
        //                 labels: {
        //                     color: '#e0e0e0'
        //                 }
        //             },
        //             title: {
        //                 display: false
        //             },
        //             tooltip: {
        //                 rtl: true,
        //                 bodyAlign: 'right'
        //             }
        //         },
        //         scales: {
        //             y: {
        //                 beginAtZero: true,
        //                 title: {
        //                     display: true,
        //                     text: yTitle,
        //                     color: '#e0e0e0'
        //                 },
        //                 grid: {
        //                     color: 'rgba(255, 255, 255, 0.1)'
        //                 },
        //                 ticks: {
        //                     color: '#e0e0e0'
        //                 }
        //             },
        //             x: {
        //                 title: {
        //                     display: false
        //                 },
        //                 grid: {
        //                     color: 'rgba(255, 255, 255, 0.1)'
        //                 },
        //                 ticks: {
        //                     color: '#e0e0e0'
        //                 }
        //             }
        //         }
        //     };
        // }

        // // تبديل نوع مخطط الموظفين
        // function toggleEmployeeChartType() {
        //     currentEmpChartType = currentEmpChartType === 'bar' ? 'radar' : 'bar';
        //     empChart.destroy();
        //     initEmployeeChart();
        // }

        // // تحديث مخطط المناطق
        // function updateRegionChart(metric) {
        //     currentRegionMetric = metric || currentRegionMetric;

        //     let newData = [];
        //     let label = '';
        //     let yTitle = '';

        //     if (currentRegionMetric === 'requests') {
        //         newData = [320, 240, 180, 150, 120, 90, 80];
        //         label = 'عدد الطلبات';
        //         yTitle = 'عدد الطلبات';
        //     } else if (currentRegionMetric === 'duration') {
        //         newData = [3.2, 3.5, 3.8, 4.0, 3.9, 4.2, 4.5];
        //         label = 'متوسط المدة (أيام)';
        //         yTitle = 'أيام';
        //     } else if (currentRegionMetric === 'efficiency') {
        //         newData = [85, 78, 82, 75, 80, 77, 72];
        //         label = 'معدل الكفاءة (%)';
        //         yTitle = 'النسبة المئوية';
        //     }

        //     regionChart.data.datasets[0].data = newData;
        //     regionChart.data.datasets[0].label = label;
        //     regionChart.options.scales.y.title.text = yTitle;
        //     regionChart.update();

        //     // تحديث الأزرار النشطة
        //     document.querySelectorAll('[data-metric]').forEach(btn => {
        //         btn.classList.remove('active');
        //         if (btn.getAttribute('data-metric') === currentRegionMetric) {
        //             btn.classList.add('active');
        //         }
        //     });
        // }

        // // تحديث مخطط التوجهات
        // function updateTrendChart(metric) {
        //     currentTrendMetric = metric || currentTrendMetric;

        //     let newData = [];
        //     let label = '';
        //     let yTitle = '';

        //     if (currentTrendMetric === 'requests') {
        //         newData = [120, 190, 150, 200, 180, 210];
        //         label = 'الطلبات';
        //         yTitle = 'عدد الطلبات';
        //     } else if (currentTrendMetric === 'completion') {
        //         newData = [82, 85, 78, 90, 88, 92];
        //         label = 'نسبة الإنجاز';
        //         yTitle = 'النسبة المئوية';
        //     } else if (currentTrendMetric === 'efficiency') {
        //         newData = [75, 82, 80, 88, 85, 90];
        //         label = 'معدل الكفاءة';
        //         yTitle = 'النسبة المئوية';
        //     } else if (currentTrendMetric === 'revenue') {
        //         newData = [45000, 52000, 48000, 60000, 55000, 65000];
        //         label = 'الإيرادات';
        //         yTitle = 'الريال اليمني';
        //     }

        //     trendChart.data.datasets[0].data = newData;
        //     trendChart.data.datasets[0].label = label;
        //     trendChart.options.scales.y.title.text = yTitle;
        //     trendChart.update();

        //     // تحديث الأزرار النشطة
        //     document.querySelectorAll('[data-metric]').forEach(btn => {
        //         btn.classList.remove('active');
        //         if (btn.getAttribute('data-metric') === currentTrendMetric) {
        //             btn.classList.add('active');
        //         }
        //     });
        // }

        // // تحديث جميع الرسوم البيانية عند تغيير الفلتر
        // function updateAllCharts() {
        //     const employeeFilter = document.getElementById('chartEmployeeFilter').value;
        //     const timeRange = document.getElementById('chartTimeRange').value;
        //     const licenseType = document.getElementById('licenseTypeFilter').value;

        //     // هنا يمكنك إضافة منطق جلب البيانات حسب الفلاتر
        //     // وللتبسيط سنكتفي بتحديث الرسوم البيانية الحالية

        //     updateRegionChart();
        //     updateTrendChart();

        //     // يمكنك إضافة المزيد من التحديثات حسب الحاجة
        // }

        // // تصدير المخطط كصورة
        // function exportChart(chartId) {
        //     let chart;
        //     if (chartId === 'employeeChart') chart = empChart;
        //     else if (chartId === 'regionChart') chart = regionChart;
        //     else if (chartId === 'trendChart') chart = trendChart;
        //     else if (chartId === 'licenseTypeChart') chart = licenseTypeChart;

        //     if (chart) {
        //         const image = chart.toBase64Image();
        //         const link = document.createElement('a');
        //         link.href = image;
        //         link.download = `مخطط_${chartId}_${new Date().toISOString().slice(0,10)}.png`;
        //         link.click();
        //     }
        // }

        // // تصدير بيانات الجدول
        // function exportTableData() {
        //     alert("سيتم تصدير بيانات الجدول بصيغة Excel");
        //     // يمكنك هنا إضافة منطق تصدير البيانات الفعلي
        // }

