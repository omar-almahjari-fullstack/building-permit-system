function reloadTable(containerSelector, reloadUrl) {
    $.ajax({
        url: reloadUrl,
        type: 'GET',
        success: function(response) {
            $(containerSelector).html(response);
        },
        error: function() {
            alert('فشل في تحديث الجدول.');
        }
    });
}

function showProgressAlert(title) {
    Swal.fire({
        title: title || 'جاري رفع البيانات...',
        html: `
            <div style="min-width: 300px;">
                <div class="progress mt-3" style="height: 25px;">
                    <div id="upload-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-info"
                        role="progressbar" style="width: 0%">0%</div>
                </div>
            </div>
        `,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => Swal.showLoading()
    });
}

function handleUploadProgress() {
    let xhr = new window.XMLHttpRequest();
    xhr.upload.addEventListener('progress', function(e) {
        if (e.lengthComputable) {
            let percent = Math.round((e.loaded / e.total) * 100);
            let progressBar = $('#upload-progress-bar');
            progressBar.css('width', percent + '%');
            progressBar.text(percent + '%');
            if (percent === 100) {
                progressBar.removeClass('bg-info').addClass('bg-success');
            }
        }
    }, false);
    return xhr;
}

///////////////////////////////////////داله الحفظ ////////////////////////////////////////////////////////

$(document).on('click', '.btn-save-entity', function(e) {
    e.preventDefault();
    const button = $(this);
    const form = $(button.data('form'))[0];
    const modal = button.data('modal');
    const reloadContainer = button.data('reload-container');
    const reloadUrl = button.data('reload-url');
    const url = button.data('url');
    const method = button.data('method') || 'POST';

    const formData = new FormData(form);

    showProgressAlert();

    $.ajax({
        method: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        xhr: handleUploadProgress,
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'تم بنجاح',
                text: 'تمت العملية بنجاح',
                icon: 'success',
                timer: 700,
                showConfirmButton: false,
                timerProgressBar: true,
                width: '300px'
            });
            if (modal) $(modal).modal('hide');
            if (reloadUrl && reloadContainer) reloadTable(reloadContainer, reloadUrl);
            if (form) form.reset();
        },
     error: function(xhr, status, error) {
    // تسجيل تفاصيل الخطأ في الكونسول
    console.groupCollapsed('تفاصيل الخطأ - AJAX Request Failed');
    console.error('Status:', status);
    console.error('Error:', error);
    console.error('Full Response:', xhr.responseText);

    if (xhr.responseJSON) {
        console.error('Parsed JSON:', xhr.responseJSON);

        // تسجيل تفاصيل إضافية إذا كانت متاحة
        if (xhr.responseJSON.debug) {
            console.error('Debug Info:', xhr.responseJSON.debug);
        }
        if (xhr.responseJSON.exception) {
            console.error('Server Exception:', xhr.responseJSON.exception);
        }
    }

    console.groupEnd();

    // عرض رسالة المستخدم (كما هي)
    let message = 'حدث خطأ أثناء العملية';
    if (xhr.responseJSON && xhr.responseJSON.message) {
        message = xhr.responseJSON.message;
    }

    Swal.fire({
        icon: 'error',
        title: 'خطأ!',
        html: message,
        showConfirmButton: true
    });
}
    });
});

///////////////////////////////////////داله التعديل ////////////////////////////////////////////////////////

$(document).on('click', '.btn-update-entity', function(e) {
    e.preventDefault();

    const button = $(this);
    const form = $(button.data('form'))[0];
    const modal = button.data('modal');
    const reloadContainer = button.data('reload-container');
    const reloadUrl = button.data('reload-url');
    const route = button.data('route');
    const method = button.data('method') || 'POST';

    // ✅ الحصول على ID من الفورم (حقل مخفي)
    const recordId = $(form).find('[name="id"]').val();/////*************************************************************** */
    if (!recordId) {
        console.error('لم يتم العثور على id داخل الفورم!');
        return;
    }

    const url = `/${route}/${recordId}`; // نفس طريقة route/id

    const formData = new FormData(form);

    showProgressAlert();

    $.ajax({
        method: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        xhr: handleUploadProgress,
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'تم التعديل',
                text: 'تم تعديل البيانات بنجاح',
                icon: 'success',
                timer: 1200,
                showConfirmButton: false,
                timerProgressBar: true,
                width: '300px'
            });
            if (modal) $(modal).modal('hide');
            if (reloadUrl && reloadContainer) reloadTable(reloadContainer, reloadUrl);
            if (form) form.reset();
        },
        error: function(xhr) {
            let message = 'حدث خطأ أثناء التعديل';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }
            Swal.update({
                icon: 'error',
                title: 'خطأ!',
                html: message,
                showConfirmButton: true
            });
        }
    });
});

//////////////////////////////////////////داله الحذف ////////////////////////////////////////////////////////

$(document).on('click', '.btn-delete-entity', function (e) {
    e.preventDefault();

    const button = $(this);
    const recordId = button.data('id');
    const route = button.data('route');
    const method = button.data('method') || 'DELETE';
    const reloadContainer = button.data('reload-container');
    const reloadUrl = button.data('reload-url');

    if (!recordId || !route) {
        console.error('Missing id or route for deletion.');
        return;
    }

    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: 'لن تتمكن من استعادة هذا العنصر!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'نعم، احذفه',
        cancelButtonText: 'إلغاء',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `/${route}/${recordId}`,
                method: method,
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم الحذف',
                        text: response.message || 'تم حذف العنصر بنجاح!',
                        timer: 2000,
                        showConfirmButton: false,
                        timerProgressBar: true,
                        width: '300px'
                    });

                    // تحديث الجدول إذا وُجد
                    if (reloadContainer && reloadUrl) {
                        $.get(reloadUrl, function (data) {
                            $(reloadContainer).html(data);
                        });
                    }
                },
                error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'خطأ!',
                        text: xhr.responseJSON?.message || 'حدث خطأ أثناء الحذف.'
                    });
                }
            });
        }
    });
});



//////////////////////////////اكواد اضهار بينات التعديل للفورم ///////////////////////////////////////

function fillEditForm(responseData, formSelector) {
    const form = $(formSelector);

    Object.entries(responseData).forEach(([key, value]) => {
        const input = form.find(`[name="${key}"]`);


         if (key === "id") {///////////////**************************************************************************************** */
            input.val(value);
            return;
        }

        // عرض الصورة
        if (key === "personal_photo" && value) {
            $('#previewImageEdit').attr('src', value);
            return;
        }

        // عرض رابط PDF
        if (key === "id_card_pdf_url" && value) {
            $('#btnViewPdf').show().off('click').on('click', function() {
                window.open(value, '_blank');
            });
            return;
        }

        if (input.length > 0) {
            const tagName = input.prop("tagName").toLowerCase();
            const type = input.attr("type");

            if (tagName === "input" || tagName === "textarea") {
                if (type === "checkbox") {
                    input.prop("checked", !!value);
                }
                else if (type === "file") {
                    // تجاهل أي input type="file"
                    return;
                }
                else {
                    input.val(value ?? '');
                }
            }
            else if (tagName === "select") {
                input.val(value ?? '').trigger("change");
            }
            else {
                input.val(value ?? '');
            }
        }
    });
}



$(document).on('click', '.edit-record-btn', function(e) {
    e.preventDefault();

    const recordId = $(this).data('id');
    const route = $(this).data('route');
    const formId = $(this).data('form') || '#form_edit';
    const modalId = $(this).data('modal') || '#editModal';


    const url = `/${route}/${recordId}`;

    $.ajax({
        url: url,
        method: 'GET',
        success: function(response) {
             console.log(response);
            fillEditForm(response, formId);
            $(modalId).modal('show');
        },
        error: function(xhr, status, error) {
    console.error("خطأ في Ajax:", status, error);
    console.error("تفاصيل الاستجابة:", xhr.responseText);

    let message = 'فشل في تحميل البيانات';

    // إذا كانت الاستجابة JSON ولديها رسالة خطأ، نستخدمها
    if (xhr.responseJSON && xhr.responseJSON.message) {
        message = xhr.responseJSON.message;
    } else if (xhr.responseText) {
        // نحاول عرض نص الاستجابة الخام (يمكن أن تكون HTML أو نص خطأ)
        message = xhr.responseText;
    }

    Swal.fire('خطأ', message, 'error');
      }

    });
});


// function fillEditForm(responseData, formSelector) {
//     const form = $(formSelector);

//     Object.entries(responseData).forEach(([key, value]) => {
//         const input = form.find(`[name="${key}"]`);

//         // ✅ خاص بالصورة:
//         if (key === "personal_photo" && value) {
//             $('#previewImageEdit').attr('src', value); // هنا تعيين src للصورة
//             return;
//         }

//         if (input.length > 0) {
//             const tagName = input.prop("tagName").toLowerCase();
//             const type = input.attr("type");

//             if (tagName === "input" || tagName === "textarea") {
//                 if (type === "checkbox") {
//                     input.prop("checked", !!value);
//                 } else {
//                     input.val(value);
//                 }
//             } else if (tagName === "select") {
//                 input.val(value).trigger("change");
//             } else {
//                 input.val(value);
//             }
//         }
//     });
// }


// function fillEditForm(responseData, formSelector) {
//     const form = $(formSelector);

//     Object.entries(responseData).forEach(([key, value]) => {
//         const input = form.find(`[name="${key}"]`);

//         // ✅ خاص بالصورة:
//         if (key === "personal_photo" && value) {
//             $('#previewImageEdit').attr('src', value);
//             return; // لا تمرر القيمة للفورم
//         }

//         // ✅ تجاهل حقول الـ PDF أو أي ملفات كبيرة
//         if (key === "id_card_pdf" || key === "id_card_pdf_url") {
//             return;
//         }

//         // بعد جلب البيانات عبر Ajax
// if (responseData.id_card_pdf) {
//     $('#btnViewPdf').show().off('click').on('click', function() {
//         $('#pdfFrame').attr('src', responseData.id_card_pdf);
//         $('#pdfModal').modal('show');
//     });
// } else {
//     $('#btnViewPdf').hide();
// }



//         if (input.length > 0) {
//             const tagName = input.prop("tagName").toLowerCase();
//             const type = input.attr("type");

//             if (tagName === "input" || tagName === "textarea") {
//                 if (type === "checkbox") {
//                     input.prop("checked", !!value);
//                 } else {
//                     input.val(value);
//                 }
//             } else if (tagName === "select") {
//                 input.val(value).trigger("change");
//             } else {
//                 input.val(value);
//             }
//         }
//     });
// }

// هذه دالة تقوم عند الضغط على زر "تعديل":

// تأخذ id المستخدم من الزر.

 // ترسل طلب Ajax إلى السيرفر لجلب بيانات المستخدم.

 // عند النجاح، تستدعي fillEditForm() لتعبئة النموذج تلقائيًا.

 // ثم تعرض المودال (نافذة التعديل).






///////////////////////////////////////داله البحث ////////////////////////////////////////////////////////




$(document).on('click', '#searchBtn', function () {
    const button = $(this);
    const url = button.data('reload-url');
    const container = $(button.data('reload-container'));

    const name = $('#searchByName').val();
    const identityNumber = $('#searchByIdentity').val();

    if (!url || !container.length) return;

    container.html('<tr><td colspan="100%">جاري البحث...</td></tr>');

    $.ajax({
        type: 'GET',
        url: url,
        data: {
            name: name,
            identity_number: identityNumber
        },
        success: function (response) {
            container.html(response);
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            container.html('<tr><td colspan="100%">حدث خطأ أثناء البحث</td></tr>');
        }
    });
});




///////////////////////////////////////داله البحث ////////////////////////////////////////////////////////
/*************************************************************** لتعامل من غير الModel ********************************************/
function fillEditFormRaa(responseData, formSelector) {
    const form = $(formSelector);


    let formB = $('#form_request');
    formB.find('[name="id"]').val(responseData.id);

    Object.entries(responseData).forEach(([key, value]) => {
        const input = form.find(`[name="${key}"]`);

        if (input.length) {
            const tagName = input.prop("tagName").toLowerCase();
            const type = input.attr("type");

            if (tagName === "input" || tagName === "textarea") {
                if (type === "checkbox") {
                    input.prop("checked", !!value);
                } else {
                    input.val(value ?? '');
                }
            } else if (tagName === "select") {
                input.val(value ?? '').trigger("change");
            }
        }
    });
}


$(document).on('click', '.next-step-btn', function(e) {
    e.preventDefault();

    const reloadUrl = $(this).data('reload-url'); // الرابط من data-reload-url
    const formSelector = '#form_Req';

    $.ajax({
        url: reloadUrl,
        method: 'GET',
        success: function(response) {
            console.log("✅ البيانات المستلمة:", response);
            fillEditFormRaa(response, formSelector);
        },
        error: function(xhr, status, error) {
            console.error("❌ خطأ:", status, error, xhr.responseText);
            Swal.fire('خطأ', xhr.responseJSON?.message || 'فشل في جلب البيانات', 'error');
        }
    });
});

/*************************************************************** داله الحفظ مع ارجاع رقم الطلب ********************************************/

$(document).on('click', '.btn-save-request', function(e) {
    e.preventDefault();
    const button = $(this);
    const form = $(button.data('form'))[0];
    const modal = button.data('modal');
    const reloadContainer = button.data('reload-container');
    const reloadUrl = button.data('reload-url');
    const url = button.data('url');
    const method = button.data('method') || 'POST';

    const formData = new FormData(form);

    showProgressAlert();

    $.ajax({
        method: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        xhr: handleUploadProgress,
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'تم بنجاح',
                text: 'تمت العملية بنجاح',
                icon: 'success',
                timer: 700,
                showConfirmButton: false,
                timerProgressBar: true,
                width: '300px'
            });

            // إظهار رقم الطلب ومعرّفه في العنصر <span class="request-number">
                   if (response.request_id && response.request_number) {
                       $('.request-number')
                           .attr('data-id', response.request_id) // نخزن الـ id في data-id
                           .text(response.request_number);       // نعرض رقم الطلب كنص
                   }

            if (modal) $(modal).modal('hide');
            if (reloadUrl && reloadContainer) reloadTable(reloadContainer, reloadUrl);
            if (form) form.reset();
        },
        error: function(xhr, status, error) {
            console.groupCollapsed('تفاصيل الخطأ - AJAX Request Failed');
            console.error('Status:', status);
            console.error('Error:', error);
            console.error('Full Response:', xhr.responseText);

            if (xhr.responseJSON) {
                console.error('Parsed JSON:', xhr.responseJSON);
                if (xhr.responseJSON.debug) console.error('Debug Info:', xhr.responseJSON.debug);
                if (xhr.responseJSON.exception) console.error('Server Exception:', xhr.responseJSON.exception);
            }
            console.groupEnd();

            let message = 'حدث خطأ أثناء العملية';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }

            Swal.fire({
                icon: 'error',
                title: 'خطأ!',
                html: message,
                showConfirmButton: true
            });
        }
    });
});


/*************************************************************** داله الحفظ مع جلب رقم الطلب ********************************************/

$(document).on('click', '.btn-save-request-number', function(e) {
    e.preventDefault();
    const button = $(this);
    const form = $(button.data('form'))[0];
    const modal = button.data('modal');
    const reloadContainer = button.data('reload-container');
    const reloadUrl = button.data('reload-url');
    const url = button.data('url');
    const method = button.data('method') || 'POST';

    const formData = new FormData(form);

    // 👇 هنا التعديل: نجلب رقم الطلب من العنصر span
   const requestId = $('.request-number').data('id'); // هذا هو id الصحيح
if (requestId) {
    formData.append('request_id', requestId);
}


    showProgressAlert();

    $.ajax({
        method: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        xhr: handleUploadProgress,
        success: function(response) {
            Swal.close();
            Swal.fire({
                title: 'تم بنجاح',
                text: 'تمت العملية بنجاح',
                icon: 'success',
                timer: 700,
                showConfirmButton: false,
                timerProgressBar: true,
                width: '300px'
            });

            // ما نغير النص لأننا صرنا نقرأه من span
            if (modal) $(modal).modal('hide');
            if (reloadUrl && reloadContainer) reloadTable(reloadContainer, reloadUrl);
            if (form) form.reset();
        },
        error: function(xhr, status, error) {
            console.groupCollapsed('تفاصيل الخطأ - AJAX Request Failed');
            console.error('Status:', status);
            console.error('Error:', error);
            console.error('Full Response:', xhr.responseText);

            if (xhr.responseJSON) {
                console.error('Parsed JSON:', xhr.responseJSON);
                if (xhr.responseJSON.debug) console.error('Debug Info:', xhr.responseJSON.debug);
                if (xhr.responseJSON.exception) console.error('Server Exception:', xhr.responseJSON.exception);
            }
            console.groupEnd();

            let message = 'حدث خطأ أثناء العملية';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }

            Swal.fire({
                icon: 'error',
                title: 'خطأ!',
                html: message,
                showConfirmButton: true
            });
        }
    });
});





