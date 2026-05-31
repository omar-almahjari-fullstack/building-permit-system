
    @vite(['resources/css/requests.css'])


    <div class="content_requests">
        <div class="contener_requests">
            {{-- بيانات مقدم الطلب --}}
            <div class="modal-body">
                <h5 class="h5_lab">بيانات مقدم الطلب</h5>
                {{-- form - --}}

                <form class="form_add">


                    <div class="form-row">

                         <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom01"> صفه مقدم الطلب</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom02"> رقم هوية مقدم الطلب</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    required>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">
                         <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom03"> اسم مقدم الطلب</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    required>
                            </div>
                        </div>


                         <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom04"> رقم الجوال</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    required>
                            </div>
                        </div>

                    </div>

                    <div class="form-row">

                         <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom05"> البريد الالكتروني</label>
                                <input type="email" class="form-control" id="validationCustom01"
                                    required>
                            </div>
                        </div>



                        <div class="col-md-2 mb-3">
                            <br>
                            <button class="btn btn-primary" type="submit">اضافة</button>
                        </div>
                    </div>

                </form>

                {{-- end form - --}}
            </div>

            {{-- بيانات الطلب --}}
            <div class="modal-body">
                <h5 class="h5_lab">بيانات الطلب</h5>
                {{-- form - --}}

                <form class="form_add">
                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom01">رقم الطلب</label>
                                <input type="text" class="form-control" id="validationCustom02" value="Otto"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom02">تاريخ تقديم الطلب</label>
                                <input type="datetime" class="form-control" id="validationCustom02" value="Otto"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom03">نوع الطلب</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected><...></option>
                                    <option value="1">ترخيص بناء</option>
                                    <option value="3">ترخيص تسوير</option>
                                    <option value="2">ترخيص هدم</option>
                                </select>
                            </div>
                        </div>


                        </div>

                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom04">القطاع الاداري</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected><...></option>
                                    <option value="1">تراخيص بناء</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom05">القسم</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected><...></option>
                                    <option value="1">تراحيص بناء</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">


                        <div class="col-md-6 mb-3">
                            <div class="bac">
                                <label for="validationCustom01">المديرية</label>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected><...></option>
                                    <option value="1">السبعين</option>
                                    <option value="2">الثورة</option>
                                    <option value="3">بني الحارث</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4 mb-3">
                            <div class="bac">
                                <label for="validationCustom02">حالة الطلب</label>
                                <input type="tel" class="form-control" id="validationCustom02" value="Otto"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-2 mb-3">
                            <br>
                            <button class="btn btn-primary" type="submit">اضافة</button>
                        </div>
                    </div>

                </form>

                {{-- end form - --}}
            </div>

        </div>
    </div>




