@vite(['resources/css/requests.css'])

<div class="content_requests">
    <div class="contener_requests">

        <div class="modal-body">
            <h5 class="h5_lab">بيانات مكونات البناء</h5>
            {{-- form - --}}

            <form class="form_add">


                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="validationCustom02">مكون البناء</label>
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>
                                    <...>
                                </option>
                                <option value="1">بدروم</option>
                                <option value="2">دور اول</option>
                                <option value="3">بدروم و دور اول</option>
                                <option value="3">دور متكرر</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="validationCustom01"> المساحة/ طول</label>
                            <input type="text" class="form-control" id="validationCustom01" required>
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="validationCustom03">عدد الادوار</label>
                            <input type="number" class="form-control" id="validationCustom03" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="validationCustom04">عدد الوحدات</label>
                            <input type="number" class="form-control" id="validationCustom03" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-md-6 mb-3">
                        <div class="bac">
                            <label for="validationCustom01">الاستخدام</label>
                            <select class="custom-select" id="inputGroupSelect01">
                                <option selected>
                                    <...>
                                </option>
                                <option value="1">سكني</option>
                                <option value="2">تجاري</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="bac">
                            <label for="validationCustom02">نسبة البناء</label>
                            <input type="tel" class="form-control" id="validationCustom02" value="Otto" required>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <br>
                        <button class="btn btn-primary" type="submit"> <i class="fas fa-plus"></i> إضافة مكون</button>
                    </div>
                </div>

            </form>

            {{-- end form - --}}
        </div>

        <div class="">
            <div dir="rtl">
                <table class="table table-hover text-right">
                    <thead class="">
                        <tr>
                            <th width="5%">#</th>
                            <th>مكون البناء</th>
                            <th>المساحة/ طول</th>
                            <th>عدد الادوار</th>
                            <th>عدد الوحدات</th>
                            <th>الاستخدام</th>
                            <th>نسبة البناء</th>
                            <th width="10%">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>خرسانة</td>
                            <td>150 م²</td>
                            <td>3</td>
                            <td>12</td>
                            <td>سكني</td>
                            <td>75%</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>طوب</td>
                            <td>200 م²</td>
                            <td>2</td>
                            <td>8</td>
                            <td>تجاري</td>
                            <td>60%</td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary" title="تعديل">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" title="حذف">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
