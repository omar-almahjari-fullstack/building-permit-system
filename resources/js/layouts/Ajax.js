



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
                        //////////////////عند الانتقال الا الصفحه يرجع الاسكرول لافوق
         const jax = document.getElementById("Jax");
            if (jax) {
                // تمرير عمودي بمقدار 300px
                jax.scrollTop = 0;
            }

    } else if (this.readyState === 4) {
        document.getElementById('loader').style.display = 'none';
        Swal.close();


        if (this.status === 200) {
            // إضافة المحتوى إلى الصفحة
            document.getElementById("Jax").innerHTML = this.responseText;

            if (typeof initRequestPage === "function") initRequestPage();///////////////////////////////////////////////


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

// function ajaxHandler(e) {
//     let target = e.target;
//     while (target && !target.classList.contains('ajax-link')) {
//         target = target.parentElement;
//     }
//     if (!target) return;

//     e.preventDefault();
//     const page = target.dataset.page;
//     if (!page) return;

//     getInfo('/ajax-page/' + page, handleHtmlResponse);
// }

function ajaxHandler(e) {
    let target = e.target;
    while (target && !target.classList.contains('ajax-link')) {
        target = target.parentElement;
    }
    if (!target) return;

    e.preventDefault();
    const page = target.dataset.page;
    const id = target.dataset.id; // قراءة الـ id

    if (!page) return;

    let url = '/ajax-page/' + page;
    if (id) {
        url += '?id=' + encodeURIComponent(id); // تمرير الـ id كـ Query String
    }

    getInfo(url, handleHtmlResponse);

}



// ✅ عند تحميل الصفحة لأول مرة



// window.addEventListener('DOMContentLoaded', () => {
//     setupAjaxLinks(); // تهيئة كل الروابط ajax-link

//     // استدعاء الصفحة الافتراضية مباشرة
//     const initialPage = 'dashboard';
//     const container = document.getElementById("Jax"); // مكان عرض الصفحات
//     if (container) {
//         getInfo(`/ajax-page/${initialPage}`, handleHtmlResponse);
//     }
// });


window.addEventListener('DOMContentLoaded', () => {
    setupAjaxLinks(); // تهيئة كل الروابط ajax-link

    const container = document.getElementById("Jax"); // مكان عرض الصفحات
    if (!container) return;

    // جلب الصفحة الأخيرة من التخزين المحلي
    let lastPage = localStorage.getItem('lastPage');

    // إذا ما في صفحة محفوظة → اعرض الداشبورد
    if (!lastPage) {
        lastPage = 'dashboard';
    }

    // تحميل الصفحة المطلوبة
    getInfo(`/ajax-page/${lastPage}`, handleHtmlResponse);

    // ربط كل الروابط ajax-link لتخزين الصفحة عند الضغط
    document.querySelectorAll('.ajax-link').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const page = this.getAttribute('data-page');
            if (page) {
                localStorage.setItem('lastPage', page); // حفظ الصفحة
                getInfo(`/ajax-page/${page}`, handleHtmlResponse);
            }
        });
    });
});

