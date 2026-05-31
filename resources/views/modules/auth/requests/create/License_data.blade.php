
    @vite(['resources/css/requests.css'])


    <div class="content_requests">
        <div class="contener_requests">

            <div class="modal-body">
                <h5 class="h5_lab">بيانات الرخصة</h5>
                {{-- form - --}}

                <form class="form_add">


                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom02">نوع البناء</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected><...></option>
                                    <option value="1"> مبنى سكني</option>
                                    <option value="2"> مبنى تجاري</option>
                                    <option value="3"> هنجر</option>
                                    <option value="3">مبنى صناعي</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom01">نوع الواجهة</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected><...></option>
                                    <option value="1">خرسانة</option>
                                    <option value="2">طوبيه</option>
                                    <option value="3">زجاجية</option>
                                </select>
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom03">الاستخدام الرئيسي</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom04">الاستخدام الفرعي</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom03">الجهة المصدرة</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom04">اجمالي عدد المباني</label>
                                <input type="number" class="form-control" id="validationCustom03" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">


                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="message-text" class="col-form-label">وصف المبنى</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </div>

                    </div>


                        <br>
                        <button class="btn btn-primary" type="submit">اضافة</button>


                </form>

                {{-- end form - --}}
            </div>


        </div>
    </div>


