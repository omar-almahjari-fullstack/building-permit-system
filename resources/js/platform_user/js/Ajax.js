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
            document.getElementById("Jaxprofile").innerHTML = this.responseText;

            // استخراج وتنفيذ جميع نصوص البرامج النصية
            const scripts = document.getElementById("Jaxprofile").getElementsByTagName('script');
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

            initializeCharts();
        } else {
            document.getElementById("Jaxprofile").innerHTML = "<p style='color:red;'>❌ لم يتم تحميل الصفحة</p>";
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

// ✅ دالة تُعيد تفعيل الأحداث لجميع الروابط
function setupAjaxLinks() {
    document.querySelectorAll('.ajax-link-profile').forEach(link => {
        link.onclick = function (e) {
            e.preventDefault();
            const page = this.dataset.page;
            getInfo('/ajax-page-platformprofile/' + page, handleHtmlResponse);
        };
    });
}

// ✅ عند تحميل الصفحة لأول مرة

window.addEventListener('DOMContentLoaded', () => {
    setupAjaxLinks();

    // تحميل الصفحة الرئيسية تلقائيًا
    // const initialPage = 'dashboard';
    const initialPage = 'profile.Control_Panel'; // أو أي قيمة افتراضية تريدها
    getInfo(`/ajax-page-platformprofile/${initialPage}`, handleHtmlResponse);
});

