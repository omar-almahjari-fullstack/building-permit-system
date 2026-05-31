
        // تهيئة الرسوم البيانية عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            // مخطط توزيع الطلبات
            const pieCtx = document.getElementById('requestsPieChart').getContext('2d');
            window.pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['بناء', 'هدم', 'تعديل', 'صيانة'],
                    datasets: [{
                        data: [650, 250, 200, 148],
                        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            rtl: true
                        }
                    }
                }
            });

            // مخطط الطلبات الشهري
            const barCtx = document.getElementById('monthlyBarChart').getContext('2d');
            window.barChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'عدد الطلبات',
                        data: [120, 190, 150, 200, 180, 210],
                        backgroundColor: '#4e73df',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // مخطط أداء الموظفين
            const empCtx = document.getElementById('employeePerformanceChart').getContext('2d');
            window.empChart = new Chart(empCtx, {
                type: 'bar',
                data: {
                    labels: ['محمد أحمد', 'سارة علي', 'أحمد سعيد'],
                    datasets: [
                        {
                            label: 'الطلبات المكتملة',
                            data: [98, 85, 60],
                            backgroundColor: '#1cc88a'
                        },
                        {
                            label: 'الطلبات قيد التنفيذ',
                            data: [22, 10, 15],
                            backgroundColor: '#f6c23e'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true,
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true
                        }
                    }
                }
            });

            // مخطط توزيع المناطق
            const regionCtx = document.getElementById('regionDistributionChart').getContext('2d');
            window.regionChart = new Chart(regionCtx, {
                type: 'bar',
                data: {
                    labels: ['الرياض', 'جدة', 'الدمام', 'مكة', 'المدينة'],
                    datasets: [{
                        label: 'عدد الطلبات',
                        data: [320, 240, 180, 150, 120],
                        backgroundColor: [
                            'rgba(54, 185, 204, 0.8)',
                            'rgba(78, 115, 223, 0.8)',
                            'rgba(28, 200, 138, 0.8)',
                            'rgba(246, 194, 62, 0.8)',
                            'rgba(231, 74, 59, 0.8)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true
                }
            });

            // مخطط التوجه السنوي
            const trendCtx = document.getElementById('performanceTrendChart').getContext('2d');
            window.trendChart = new Chart(trendCtx, {
                type: 'line',
                data: {
                    labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
                    datasets: [{
                        label: 'الطلبات',
                        data: [120, 190, 150, 200, 180, 210],
                        borderColor: '#4e73df',
                        backgroundColor: 'rgba(78, 115, 223, 0.05)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // مخطط التقرير المخصص
            const customCtx = document.getElementById('customReportChart').getContext('2d');
            window.customChart = new Chart(customCtx, {
                type: 'doughnut',
                data: {
                    labels: ['مكتمل', 'قيد التنفيذ', 'مرفوض'],
                    datasets: [{
                        data: [82, 12, 6],
                        backgroundColor: ['#1cc88a', '#f6c23e', '#e64a3b']
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });
        });

        // تحديث الإحصائيات حسب الموظف المحدد
        function updateEmployeeStats() {
            const employeeId = document.getElementById('employeeFilter').value;
            let stats = {
                total: 1248,
                completed: 982,
                pending: 156,
                rejected: 110
            };

            if (employeeId === "1") {
                stats = { total: 420, completed: 350, pending: 50, rejected: 20 };
            } else if (employeeId === "2") {
                stats = { total: 380, completed: 320, pending: 40, rejected: 20 };
            } else if (employeeId === "3") {
                stats = { total: 280, completed: 220, pending: 40, rejected: 20 };
            }

            document.getElementById('totalRequests').textContent = stats.total;
            document.getElementById('completedRequests').textContent = stats.completed;
            document.getElementById('pendingRequests').textContent = stats.pending;
            document.getElementById('rejectedRequests').textContent = stats.rejected;

            // يمكنك هنا تحديث الرسوم البيانية أيضًا
        }

        // تحديث مخطط الدائرة
        function updatePieChart() {
            const chartType = document.querySelector('#summaryReport select').value;

            if (chartType === 'type') {
                window.pieChart.data.labels = ['بناء', 'هدم', 'تعديل', 'صيانة'];
                window.pieChart.data.datasets[0].data = [650, 250, 200, 148];
            } else if (chartType === 'status') {
                window.pieChart.data.labels = ['مكتمل', 'قيد التنفيذ', 'مرفوض'];
                window.pieChart.data.datasets[0].data = [982, 156, 110];
            } else if (chartType === 'region') {
                window.pieChart.data.labels = ['الرياض', 'جدة', 'الدمام', 'مكة', 'المدينة'];
                window.pieChart.data.datasets[0].data = [320, 240, 180, 150, 120];
            }

            window.pieChart.update();
        }

        // تحديث مخطط الأعمدة
        function updateBarChart() {
            const chartType = document.querySelectorAll('#summaryReport select')[1].value;

            if (chartType === 'count') {
                window.barChart.data.datasets[0].label = 'عدد الطلبات';
                window.barChart.data.datasets[0].data = [120, 190, 150, 200, 180, 210];
            } else if (chartType === 'completion') {
                window.barChart.data.datasets[0].label = 'نسبة الإنجاز %';
                window.barChart.data.datasets[0].data = [82, 85, 78, 90, 88, 92];
            } else if (chartType === 'duration') {
                window.barChart.data.datasets[0].label = 'متوسط المدة (أيام)';
                window.barChart.data.datasets[0].data = [3.5, 3.2, 3.8, 3.0, 2.8, 2.9];
            }

            window.barChart.update();
        }

        // تصدير التقرير
        function confirmExport() {
            const format = document.getElementById('exportFormat').value;
            const reportName = document.querySelector('#exportForm input').value;

            alert(`سيتم تصدير التقرير باسم "${reportName}" بصيغة ${format.toUpperCase()}`);
            $('#exportModal').modal('hide');
        }

        // توليد تقرير مخصص
        function generateCustomReport() {
            const selectedColumns = Array.from(document.getElementById('reportColumns').selectedOptions).map(o => o.value);
            const selectedEmployees = Array.from(document.getElementById('customEmployees').selectedOptions).map(o => o.value);

            console.log("توليد تقرير مخصص مع الأعمدة:", selectedColumns);
            console.log("للموظفين:", selectedEmployees);

            // هنا يمكنك إضافة منطق جلب البيانات وعرضها في الجدول
        }

        // حفظ قالب التقرير
        function saveReportTemplate() {
            const templateName = prompt("أدخل اسم القالب:", "قالب تقرير الموظفين");
            if (templateName) {
                alert(`تم حفظ القالب "${templateName}" بنجاح!`);
            }
        }

        // تصدير المخطط
        function exportChart(chartId) {
            const chart = window[chartId + 'Chart'];
            const image = chart.toBase64Image();
            const link = document.createElement('a');
            link.href = image;
            link.download = `مخطط_${chartId}_${new Date().toISOString().slice(0,10)}.png`;
            link.click();
        }

        // تصدير التقرير المخصص
        function exportCustomReport() {
            alert("سيتم تصدير التقرير المخصص بصيغة PDF");
        }

        // طباعة التقرير المخصص
        function printCustomReport() {
            window.print();
        }

        // تحديث مخطط المناطق
        function updateRegionChart() {
            const chartType = document.querySelector('#chartsReport select').value;

            if (chartType === 'count') {
                window.regionChart.data.datasets[0].label = 'عدد الطلبات';
                window.regionChart.data.datasets[0].data = [320, 240, 180, 150, 120];
            } else if (chartType === 'duration') {
                window.regionChart.data.datasets[0].label = 'متوسط المدة (أيام)';
                window.regionChart.data.datasets[0].data = [3.2, 3.5, 3.8, 4.0, 3.9];
            }

            window.regionChart.update();
        }

