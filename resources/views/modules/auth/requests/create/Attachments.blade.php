@vite(['resources/css/requests.css'])


    <div class="content_requests">
        <div class="contener_requests">

            <div class="modal-body">
                <h5 class="h5_lab">المرفقات</h5>
                {{-- form - --}}

                <form class="form_attachments" id="form_attachments" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>المخطط الإنشائي (pdf)</label>
                            <input type="file" class="form-control" name="structural_plan_path" accept="application/pdf">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>المخطط المعماري (pdf)</label>
                            <input type="file" class="form-control" name="architectural_plan_path" accept="application/pdf">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>صورة بطاقة المستفيد الشخصية (pdf)</label>
                            <input type="file" class="form-control" name="id_card_image_path" accept="application/pdf">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>صك الملكية .طبق الاصل(pdf)</label>
                            <input type="file" class="form-control" name="ownership_deed_path" accept="application/pdf">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>تقرير التربة (pdf)</label>
                            <input type="file" class="form-control" name="soil_report_path" accept="application/pdf">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>صورة الموقع العام (ipg,png,jpeg,tif,tiff,bmp,gif,pdf)</label>
                            <input type="file" class="form-control" name="site_image_path" accept="application/pdf">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>صورة الواجهة</label>
                            <input type="file" class="form-control" name="facade_image_path" accept="application/pdf">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>مرفقات اخرى</label>
                            <input type="file" class="form-control" name="other_attachments_path" accept="application/pdf">
                        </div>
                    </div>

                    <br>
            <button type="submit" class="btn btn-primary btn-save-request-number next-step-btn" data-action="save"
                                data-form="#form_attachments" data-url="add-attachments_Ajax" data-method="POST" data-step-target="5">
                                <i class="fas fa-save me-2"></i> اضافة
                            </button>

                </form>
            </div>







            {{-- end form - --}}
        </div>


        </div>
    </div>




