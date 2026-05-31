

     @vite(['resources/css/requests.css'])


    <div class="content_requests">
        <div class="contener_requests">

            <div class="modal-body">
                <h5 class="h5_lab">حساب الرسوم</h5>
                {{-- form - --}}

                <form class="form_add" style="direction: rtl">


                    <div class="form-row">

                        <div class="alert alert-primary " role="alert">
                            <input type="checkbox" value="اقر بمراجعة نسخة الرخصة ">
                            <p>اقر بمراجعة نسخة الرخصة ( اضغط هناء لاستعراض الرخصة )</p>
                        </div>

                    </div>
                    <br>
                    <div class="form-row">
                        <div class="input-group col-xl-6 ">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">3013.0</span>
                            </div>
                            <input type="text" class="form-control" value="تكلفة الرسوم الاجمالي"
                                placeholder="Recipient's username" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">

                        </div>
                    </div>

                    <div class="form-row fee">
                        <h6>رسوم رفع مخلفات</h6>
                        <h4>20000.0 <span>ريال</span></h4>
                    </div>

                    <div class="form-row fee">
                        <h6>الاجور للدور المتكرر <span>بلك مسلح</span></h6>
                        <h4>12000.0 <span>ريال</span></h4>
                    </div>

                    <div class="form-row fee">
                        <h6>رسوم رخصه انشائية</h6>
                        <h4>128000.0 <span>ريال</span></h4>
                    </div>

                    {{-- end form - --}}
            </div>


        </div>
    </div>



