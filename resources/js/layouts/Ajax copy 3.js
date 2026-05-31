

// function initializeCharts() {
//     // مخطط توزيع الطلبات
//     const pieCanvas = document.getElementById('requestsPieChart');
//     if (pieCanvas) {
//         const pieCtx = pieCanvas.getContext('2d');
//         window.pieChart = new Chart(pieCtx, {
//             type: 'pie',
//             data: {
//                 labels: ['بناء', 'هدم', 'تعديل', 'صيانة'],
//                 datasets: [{
//                     data: [650, 250, 200, 148],
//                     backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
//                     borderWidth: 1
//                 }]
//             },
//             options: {
//                 responsive: true,
//                 plugins: {
//                     legend: {
//                         position: 'bottom',
//                         rtl: true
//                     }
//                 }
//             }
//         });
//     }

//     // مخطط الطلبات الشهري
//     const barCanvas = document.getElementById('monthlyBarChart');
//     if (barCanvas) {
//         const barCtx = barCanvas.getContext('2d');
//         window.barChart = new Chart(barCtx, {
//             type: 'bar',
//             data: {
//                 labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
//                 datasets: [{
//                     label: 'عدد الطلبات',
//                     data: [120, 190, 150, 200, 180, 210],
//                     backgroundColor: '#4e73df',
//                     borderWidth: 1
//                 }]
//             },
//             options: {
//                 responsive: true,
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 },
//                 plugins: {
//                     legend: {
//                         display: false
//                     }
//                 }
//             }
//         });
//     }

//     // مخطط أداء الموظفين
//     const empCanvas = document.getElementById('employeePerformanceChart');
//     if (empCanvas) {
//         const empCtx = empCanvas.getContext('2d');
//         window.empChart = new Chart(empCtx, {
//             type: 'bar',
//             data: {
//                 labels: ['محمد أحمد', 'سارة علي', 'أحمد سعيد'],
//                 datasets: [
//                     {
//                         label: 'الطلبات المكتملة',
//                         data: [98, 85, 60],
//                         backgroundColor: '#1cc88a'
//                     },
//                     {
//                         label: 'الطلبات قيد التنفيذ',
//                         data: [22, 10, 15],
//                         backgroundColor: '#f6c23e'
//                     }
//                 ]
//             },
//             options: {
//                 responsive: true,
//                 scales: {
//                     x: {
//                         stacked: true,
//                     },
//                     y: {
//                         stacked: true,
//                         beginAtZero: true
//                     }
//                 }
//             }
//         });
//     }

//     // مخطط توزيع المناطق
//     const regionCanvas = document.getElementById('regionDistributionChart');
//     if (regionCanvas) {
//         const regionCtx = regionCanvas.getContext('2d');
//         window.regionChart = new Chart(regionCtx, {
//             type: 'bar',
//             data: {
//                 labels: ['الرياض', 'جدة', 'الدمام', 'مكة', 'المدينة'],
//                 datasets: [{
//                     label: 'عدد الطلبات',
//                     data: [320, 240, 180, 150, 120],
//                     backgroundColor: [
//                         'rgba(54, 185, 204, 0.8)',
//                         'rgba(78, 115, 223, 0.8)',
//                         'rgba(28, 200, 138, 0.8)',
//                         'rgba(246, 194, 62, 0.8)',
//                         'rgba(231, 74, 59, 0.8)'
//                     ],
//                     borderWidth: 1
//                 }]
//             },
//             options: {
//                 responsive: true
//             }
//         });
//     }

//     // مخطط التوجه السنوي
//     const trendCanvas = document.getElementById('performanceTrendChart');
//     if (trendCanvas) {
//         const trendCtx = trendCanvas.getContext('2d');
//         window.trendChart = new Chart(trendCtx, {
//             type: 'line',
//             data: {
//                 labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو'],
//                 datasets: [{
//                     label: 'الطلبات',
//                     data: [120, 190, 150, 200, 180, 210],
//                     borderColor: '#4e73df',
//                     backgroundColor: 'rgba(78, 115, 223, 0.05)',
//                     fill: true,
//                     tension: 0.3
//                 }]
//             },
//             options: {
//                 responsive: true,
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         });
//     }

//     // مخطط التقرير المخصص
//     const customCanvas = document.getElementById('customReportChart');
//     if (customCanvas) {
//         const customCtx = customCanvas.getContext('2d');
//         window.customChart = new Chart(customCtx, {
//             type: 'doughnut',
//             data: {
//                 labels: ['مكتمل', 'قيد التنفيذ', 'مرفوض'],
//                 datasets: [{
//                     data: [82, 12, 6],
//                     backgroundColor: ['#1cc88a', '#f6c23e', '#e64a3b']
//                 }]
//             },
//             options: {
//                 responsive: true,
//                 plugins: {
//                     legend: {
//                         position: 'bottom'
//                     }
//                 }
//             }
//         });
//     }


//        const chartCanvas = document.getElementById('licenseTypeChart');

//     if (chartCanvas) {
//         const ctx = chartCanvas.getContext('2d');
//         window.licenseTypeChart = new Chart(ctx, {
//             type: 'pie',
//             data: {
//                 labels: ['بناء', 'تعديل', 'هدم', 'صيانة'],
//                 datasets: [{
//                     data: [300, 150, 100, 50],
//                     backgroundColor: ['#4e73df', '#1cc88a', '#f6c23e', '#e74a3b'],
//                     borderWidth: 1
//                 }]
//             },
//             options: {
//                 responsive: true,
//                 plugins: {
//                     legend: {
//                         position: 'bottom',
//                         rtl: true,
//                         labels: {
//                             font: {
//                                 family: 'Tajawal',
//                                 size: 13
//                             }
//                         }
//                     }
//                 }
//             }
//         });
//     }

//       const ctx = document.getElementById('permissionsChart').getContext('2d');
//             new Chart(ctx, {
//                 type: 'doughnut',
//                 data: {
//                     labels: ['إدارة الطلبات', 'إدارة المهام', 'إدارة المستخدمين', 'التقارير', 'الإعدادات'],
//                     datasets: [{
//                         data: [25, 20, 15, 25, 15],
//                         backgroundColor: [
//                             '#1a365d',
//                             '#2a5699',
//                             '#4a80f0',
//                             '#6c9cff',
//                             '#a4c2ff'
//                         ],
//                         borderWidth: 0
//                     }]
//                 },
//                 options: {
//                     responsive: true,
//                     cutout: '70%',
//                     plugins: {
//                         legend: {
//                             position: 'bottom',
//                             rtl: true,
//                             labels: {
//                                 color: '#2c3e50',
//                                 font: {
//                                     family: 'Tajawal',
//                                     size: 12
//                                 }
//                             }
//                         },
//                         tooltip: {
//                             rtl: true,
//                             bodyFont: {
//                                 family: 'Tajawal'
//                             },
//                             titleFont: {
//                                 family: 'Tajawal'
//                             }
//                         }
//                     }
//                 }
//             });
// }




function createRequest() {
    if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
    } else {
        try {
            return new ActiveXObject("Msxml2.XMLHTTP.6.0");
        } catch (e1) {
            try {
                return new ActiveXObject("Msxml2.XMLHTTP.3.0");
            } catch (e2) {
                return new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
    }
}

function showAlert() {
    Swal.fire({
        title: '...جاري المعالجة',
        text: 'يرجى الانتظار قليلاً',
        imageUrl: '/loading.gif',  // تأكد من المسار الصحيح للصورة
        imageWidth: 100,
        imageHeight: 100,
        showConfirmButton: false
    });
}

function handleHtmlResponse() {
    if (this.readyState === 1) {
        document.getElementById('loader').style.display = 'block';
        showAlert();
    } else if (this.readyState === 2) {
        console.log("✅ تم استقبال الطلب");
    } else if (this.readyState === 3) {

    } else if (this.readyState === 4) {
        document.getElementById('loader').style.display = 'none';
        Swal.close();

        if (this.status === 200) {
            // إضافة المحتوى إلى الصفحة
            document.getElementById("Jax").innerHTML = this.responseText;

            // استخراج وتنفيذ جميع نصوص البرامج النصية
            const scripts = document.getElementById("Jax").getElementsByTagName('script');
            const scriptsArray = Array.from(scripts);

            for (const oldScript of scriptsArray) {
                const newScript = document.createElement('script');

                // نسخ جميع السمات
                Array.from(oldScript.attributes).forEach(attr => {
                    newScript.setAttribute(attr.name, attr.value);
                });

                // نسخ محتوى السكريبت إذا كان موجوداً
                if (oldScript.textContent) {
                    newScript.textContent = oldScript.textContent;
                }

                // إزالة السكريبت القديم
                oldScript.parentNode.removeChild(oldScript);

                // إضافة السكريبت الجديد إلى body لتنفيذه
                document.body.appendChild(newScript);
            }

            // استدعاء الدوال الإضافية بعد التحميل
            setupAjaxLinks();

     if (typeof initializeCharts === "function") {
           initializeCharts();
         }

        } else {
            document.getElementById("Jax").innerHTML = "<p style='color:red;'>❌ لم يتم تحميل الصفحة</p>";
        }
    }
}

function getInfo(pageUrl, callbackFunction) {
    var request = createRequest();

    if (!request) {
        alert("❌ المتصفح لا يدعم Ajax");
        return;
    }

    request.onreadystatechange = callbackFunction;
    request.open("GET", pageUrl, true);
    request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    request.send();
}

// window.addEventListener('DOMContentLoaded', () => {
//     // إضافة حدث للنقر على جميع الروابط التي تحتوي على الكلاس ajax-link
//     document.querySelectorAll('.ajax-link').forEach(link => {
//         link.addEventListener('click', function (e) {
//             e.preventDefault();
//             const page = this.dataset.page;
//             getInfo('/ajax-page/' + page, handleHtmlResponse);
//         });
//     });

//     // تحميل الصفحة الرئيسية تلقائيًا عند فتح الصفحة
//     getInfo('/ajax-page/home', handleHtmlResponse);
// });

// ✅ دالة تُعيد تفعيل الأحداث لجميع الروابط
// function setupAjaxLinks() {
//     document.querySelectorAll('.ajax-link').forEach(link => {
//         link.onclick = function (e) {
//             e.preventDefault();
//             const page = this.dataset.page;
//             getInfo('/ajax-page/' + page, handleHtmlResponse);
//         };
//     });
// }

function setupAjaxLinks() {
    document.removeEventListener('click', ajaxHandler); // إزالة أي مستمع قديم
    document.addEventListener('click', ajaxHandler);
}

function ajaxHandler(e) {
    let target = e.target;
    while (target && !target.classList.contains('ajax-link')) {
        target = target.parentElement;
    }
    if (!target) return;

    e.preventDefault();
    const page = target.dataset.page;
    if (!page) return;

    getInfo('/ajax-page/' + page, handleHtmlResponse);
}


// function setupAjaxLinks() {
//     document.addEventListener('click', function(e) {
//     let target = e.target;
//     while (target && !target.classList.contains('ajax-link')) {
//         target = target.parentElement;
//     }
//     if (!target) return;

//     e.preventDefault(); // 👈 هنا
//     const page = target.dataset.page;
//     if (!page) return;

//     getInfo('/ajax-page/' + page, handleHtmlResponse);
// });
// }

// ✅ عند تحميل الصفحة لأول مرة

window.addEventListener('DOMContentLoaded', () => {
    setupAjaxLinks();

    // تحميل الصفحة الرئيسية تلقائيًا
    const initialPage = 'dashboard';
    // const initialPage = 'requests.create.partials.Breadcrumb_Receptionist';
    // const initialPage = 'requests.create.Citizen'; // أو أي قيمة افتراضية تريدها
    getInfo(`/ajax-page/${initialPage}`, handleHtmlResponse);
});



// ✅ لماذا NProgress أفضل؟
// إشارة بصرية حية تُظهر تقدم التحميل للمستخدم.

// تبدأ تلقائيًا باستخدام NProgress.start() وتنتهي بـ NProgress.done() دون الحاجة لتعقيد.

// تُستخدم على نطاق واسع في تطبيقات AJAX وSPA وتطبيقات Laravel مع صفحات مستدعاة ديناميكيًا.
// <script>
// function createRequest() {
//     if (window.XMLHttpRequest) {
//         return new XMLHttpRequest();
//     } else {
//         try {
//             return new ActiveXObject("Msxml2.XMLHTTP.6.0");
//         } catch (e1) {
//             try {
//                 return new ActiveXObject("Msxml2.XMLHTTP.3.0");
//             } catch (e2) {
//                 return new ActiveXObject("Microsoft.XMLHTTP");
//             }
//         }
//     }
// }

// function handleHtmlResponse() {
//     if (this.readyState === 1) {
//         NProgress.start();
//         showAlert();
//         startTimeoutProtection();
//     } else if (this.readyState === 4) {
//         NProgress.done();
//         clearTimeout(window.timeoutProtection);
//         Swal.close();
//         document.getElementById('loader').style.display = 'none';

//         const contentType = this.getResponseHeader('Content-Type');

//         if (this.status === 200) {
//             if (contentType && contentType.includes("application/json")) {
//                 try {
//                     const json = JSON.parse(this.responseText);
//                     if (json.error) {
//                         Swal.fire({ icon: 'error', title: 'خطأ', text: json.error });
//                         return;
//                     }
//                 } catch (e) {
//                     Swal.fire({ icon: 'error', title: 'خطأ', text: 'فشل في تحليل JSON' });
//                     return;
//                 }
//             }

//             document.getElementById("Jax").innerHTML = this.responseText;

//             const scripts = document.getElementById("Jax").getElementsByTagName('script');
//             Array.from(scripts).forEach(oldScript => {
//                 const newScript = document.createElement('script');
//                 Array.from(oldScript.attributes).forEach(attr => {
//                     newScript.setAttribute(attr.name, attr.value);
//                 });
//                 newScript.textContent = oldScript.textContent;
//                 oldScript.parentNode.removeChild(oldScript);
//                 document.body.appendChild(newScript);
//             });

//             setupAjaxLinks();
//             initializeCharts(); // إذا كانت موجودة
//         } else {
//             Swal.fire({
//                 icon: 'error',
//                 title: 'فشل التحميل',
//                 text: 'لم يتم تحميل الصفحة، الرجاء المحاولة لاحقًا.',
//             });
//         }
//     }
// }

// function showAlert() {
//     document.getElementById('loader').style.display = 'block';
//     Swal.fire({
//         title: '...جاري التحميل',
//         text: 'يرجى الانتظار قليلاً',
//         imageUrl: '/loading.gif',
//         imageWidth: 100,
//         imageHeight: 100,
//         showConfirmButton: false
//     });
// }

// function startTimeoutProtection() {
//     window.timeoutProtection = setTimeout(() => {
//         if (document.getElementById('loader').style.display === 'block') {
//             Swal.fire({
//                 icon: 'error',
//                 title: 'انتهى الوقت',
//                 text: 'الخادم لم يستجب في الوقت المناسب.',
//             });
//             NProgress.done();
//             document.getElementById('loader').style.display = 'none';
//         }
//     }, 10000);
// }

// function getInfo(url, callback) {
//     const request = createRequest();
//     if (!request) {
//         alert("❌ المتصفح لا يدعم AJAX");
//         return;
//     }

//     request.onreadystatechange = callback;
//     request.open("GET", url, true);
//     request.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

//     try {
//         request.send();
//     } catch (e) {
//         Swal.fire({3
//             icon: 'error',
//             title: 'خطأ في الشبكة',
//             text: 'تعذر إرسال الطلب، تحقق من الاتصال.',
//         });
//         NProgress.done();
//         document.getElementById('loader').style.display = 'none';
//     }
// }

// function setupAjaxLinks() {
//     document.querySelectorAll('.ajax-link').forEach(link => {
//         link.onclick = function (e) {
//             e.preventDefault();
//             const page = this.dataset.page;
//             getInfo(`/ajax-page/${page}`, handleHtmlResponse);
//         };
//     });
// }

// window.addEventListener('DOMContentLoaded', () => {
//     setupAjaxLinks();
//     getInfo('/ajax-page/dashboard', handleHtmlResponse);
// });
// </script>

// 🔥 جاهز الآن!
// الكود يعمل بـ:

// NProgress لتحسين الـUX

// SweetAlert للتنبيهات

// Timeout تلقائي

// إعادة تنفيذ السكربتات تلقائيًا

// دعم أخطاء JSON و"Failed to fetch"






//////////////////////////////////////////////////////////////////////////////



// بطريقه ال fetch

// function showAlert() {
//     Swal.fire({
//         title: '...جاري المعالجة',
//         text: 'يرجى الانتظار قليلاً',
//         imageUrl: '/loading.gif',  // تأكد من المسار الصحيح للصورة
//         imageWidth: 100,
//         imageHeight: 100,
//         showConfirmButton: false
//     });
// }

// async function getInfo(pageUrl) {
//     try {
//         showAlert();

//         const response = await fetch(pageUrl, {
//             headers: {
//                 'X-Requested-With': 'XMLHttpRequest'
//             }
//         });

//         if (!response.ok) throw new Error(`❌ حدث خطأ: ${response.status}`);

//         const html = await response.text();

//         // إضافة المحتوى إلى الصفحة
//         const container = document.getElementById("Jax");
//         container.innerHTML = html;

//         // استخراج وتنفيذ جميع نصوص البرامج النصية
//         const scripts = container.getElementsByTagName('script');
//         const scriptsArray = Array.from(scripts);

//         for (const oldScript of scriptsArray) {
//             const newScript = document.createElement('script');

//             // نسخ جميع السمات
//             Array.from(oldScript.attributes).forEach(attr => {
//                 newScript.setAttribute(attr.name, attr.value);
//             });

//             // نسخ محتوى السكريبت إذا كان موجوداً
//             if (oldScript.textContent) {
//                 newScript.textContent = oldScript.textContent;
//             }

//             // إزالة السكريبت القديم
//             oldScript.parentNode.removeChild(oldScript);

//             // إضافة السكريبت الجديد إلى body لتنفيذه
//             document.body.appendChild(newScript);
//         }

//         // استدعاء الدوال الإضافية بعد التحميل
//         setupAjaxLinks();
//         initializeCharts();

//     } catch (error) {
//         document.getElementById("Jax").innerHTML = `<p style="color:red;">${error.message}</p>`;
//     } finally {
//         Swal.close();
//     }
// }

// function setupAjaxLinks() {
//     document.querySelectorAll('.ajax-link').forEach(link => {
//         link.onclick = function (e) {
//             e.preventDefault();
//             const page = this.dataset.page;
//             getInfo(`/ajax-page/${page}`);
//         };
//     });
// }

// window.addEventListener('DOMContentLoaded', () => {
//     setupAjaxLinks();

//     // تحميل الصفحة الرئيسية تلقائيًا
//     const initialPage = 'dashboard'; // أو أي قيمة افتراضية تريدها
//     getInfo(`/ajax-page/${initialPage}`);
// });

