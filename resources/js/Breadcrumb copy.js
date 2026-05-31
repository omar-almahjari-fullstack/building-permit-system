function initBreadcrumb() {
    const steps = document.querySelectorAll('.process-step');
    const stepContents = document.querySelectorAll('.step-content');
    const progressFill = document.querySelector('.process-fill');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentStep = 1;
    const totalSteps = steps.length;

    function updateProgress() {
        const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
        progressFill.style.width = `${progressPercent}%`;

        steps.forEach((step, index) => {
            step.classList.remove('completed', 'active');
            if (index < currentStep - 1) {
                step.classList.add('completed');
            } else if (index === currentStep - 1) {
                step.classList.add('active');
            }
        });

        prevBtn.disabled = currentStep === 1;
        nextBtn.textContent = currentStep === totalSteps ? 'إرسال الطلب' : 'التالي';

        stepContents.forEach(content => {
            content.classList.remove('active');
            if (parseInt(content.id.replace('step', '')) === currentStep) {
                content.classList.add('active');
            }
        });
    }

    prevBtn.addEventListener('click', function() {
        if (currentStep > 1) {
            currentStep--;
            updateProgress();
        }
    });

    nextBtn.addEventListener('click', function() {
        if (currentStep < totalSteps) {
            currentStep++;
            updateProgress();
        } else {
            alert('تم إرسال الطلب بنجاح');
        }
    });


 const BtnNext = document.getElementsByClassName('BtnNext');


    BtnNext.addEventListener('click', function() {
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
