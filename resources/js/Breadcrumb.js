// function initBreadcrumb() {
//     const steps = document.querySelectorAll('.process-step');
//     const stepContents = document.querySelectorAll('.step-content');
//     const progressFill = document.querySelector('.process-fill');
//     const prevBtn = document.getElementById('prevBtn');
//     const nextBtn = document.getElementById('nextBtn');

//     let currentStep = 1;
//     const totalSteps = steps.length;

//     function updateProgress() {
//         const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
//         progressFill.style.width = `${progressPercent}%`;

//         steps.forEach((step, index) => {
//             step.classList.remove('completed', 'active');
//             if (index < currentStep - 1) {
//                 step.classList.add('completed');
//             } else if (index === currentStep - 1) {
//                 step.classList.add('active');
//             }
//         });

//         if (prevBtn) prevBtn.disabled = currentStep === 1;
//          if(nextBtn) nextBtn.style.display = currentStep === 1 ? 'none' : 'block';
//         if (nextBtn) nextBtn.textContent = currentStep === totalSteps ? 'إرسال الطلب' : 'التالي';

//         stepContents.forEach(content => {
//             content.classList.remove('active');
//             if (parseInt(content.id.replace('step', '')) === currentStep) {
//                 content.classList.add('active');
//             }
//         });
//     }

//     // معالجة النقر على الأزرار داخل الجدول
//     document.addEventListener('click', function(e) {
//         if (e.target.closest('.next-step-btn')) {
//             e.preventDefault();
//             const button = e.target.closest('.next-step-btn');
//             const targetStep = parseInt(button.getAttribute('data-step-target'));
//             const beneficiaryId = button.getAttribute('data-beneficiary-id');

//             console.log('تم اختيار المستفيد:', beneficiaryId);
//             console.log('الانتقال إلى الخطوة:', targetStep);

//             // هنا يمكنك إضافة أي منطق إضافي قبل الانتقال
//             // مثل حفظ بيانات المستفيد المحدد

//             // الانتقال إلى الخطوة المطلوبة
//             if (targetStep && targetStep > currentStep) {
//                 currentStep = targetStep;
//                 updateProgress();

//                 // يمكنك هنا تحميل بيانات المستفيد في الخطوة التالية إذا لزم الأمر
//                 // loadBeneficiaryData(beneficiaryId);
//             }
//         }
//     });

//     if (prevBtn) {
//         prevBtn.addEventListener('click', function() {
//             if (currentStep > 1) {
//                 currentStep--;
//                 updateProgress();
//             }
//         });
//     }

//     if (nextBtn) {
//         nextBtn.addEventListener('click', function() {
//             if (currentStep < totalSteps) {
//                 currentStep++;
//                 updateProgress();
//             } else {
//                 alert('تم إرسال الطلب بنجاح');
//             }
//         });
//     }

//     updateProgress();
// }

// // تنفيذ الدالة عند تحميل الصفحة
// if (document.readyState !== 'loading') {
//     initBreadcrumb();
// } else {
//     document.addEventListener('DOMContentLoaded', initBreadcrumb);
// }



function initBreadcrumb() {
    // منع إعادة التهيئة إذا كانت موجودة
    if (window.breadcrumbInitialized) return;
    window.breadcrumbInitialized = true;

    const steps = document.querySelectorAll('.process-step');
    const stepContents = document.querySelectorAll('.step-content');
    const progressFill = document.querySelector('.process-fill');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');


    let currentStep = 1;
    const totalSteps = steps.length;

    function updateProgress() {
        const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
        if (progressFill) progressFill.style.width = `${progressPercent}%`;

        steps.forEach((step, index) => {
            step.classList.remove('completed', 'active');
            if (index < currentStep - 1) step.classList.add('completed');
            else if (index === currentStep - 1) step.classList.add('active');
        });

        if (prevBtn) prevBtn.disabled = currentStep === 1;
        if (nextBtn) {
            nextBtn.style.display = currentStep === 1 ? 'none' : 'block';
            nextBtn.textContent = currentStep === totalSteps ? 'إرسال الطلب' : 'التالي';
        }

        stepContents.forEach(content => {
            content.classList.remove('active');
            if (parseInt(content.id.replace('step', '')) === currentStep) {
                content.classList.add('active');
            }
        });
    }

    // النقر على أزرار الانتقال المخصصة داخل الجدول
    document.addEventListener('click', function(e) {
        const nextBtnCustom = e.target.closest('.next-step-btn');
        if (!nextBtnCustom) return;

        e.preventDefault();
        const targetStep = parseInt(nextBtnCustom.getAttribute('data-step-target'));
        const beneficiaryId = nextBtnCustom.getAttribute('data-beneficiary-id');

        console.log('تم اختيار المستفيد:', beneficiaryId);
        console.log('الانتقال إلى الخطوة:', targetStep);

        if (targetStep && targetStep > currentStep) {
            currentStep = targetStep;
            updateProgress();
            // loadBeneficiaryData(beneficiaryId); // يمكن تفعيل التحميل إذا لزم
        }
    });



    ///////  انتقال من الطلب للخطوه الثالثه
     // النقر على أزرار الانتقال المخصصة داخل الجدول
    // document.addEventListener('click', function(e) {
    //     const nextBtnCustom = e.target.closest('.next-step-btn-request');
    //     if (!nextBtnCustom) return;

    //     e.preventDefault();
    //     const targetStep = parseInt(nextBtnCustom.getAttribute('data-step-target'));
    //     // const beneficiaryId = nextBtnCustom.getAttribute('data-beneficiary-id');

    //     // console.log('تم اختيار المستفيد:', beneficiaryId);
    //     console.log('الانتقال إلى الخطوة:', targetStep);

    //     if (targetStep && targetStep > currentStep) {
    //         currentStep = targetStep;
    //         updateProgress();
    //         // loadBeneficiaryData(beneficiaryId); // يمكن تفعيل التحميل إذا لزم
    //     }
    // });

    // أزرار التنقل
    if (prevBtn) prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            currentStep--;
            updateProgress();
        }
    });

    if (nextBtn) nextBtn.addEventListener('click', () => {
        if (currentStep < totalSteps) {
            currentStep++;
            updateProgress();
        } else {
            alert('تم إرسال الطلب بنجاح');
        }
    });

    updateProgress();
}

// تنفيذ الدالة عند تحميل الصفحة
if (document.readyState !== 'loading') {
    initBreadcrumb();
} else {
    document.addEventListener('DOMContentLoaded', initBreadcrumb);
}
