
  <style>

    /* الحاوية الرئيسية للمحتوى */
    .main-container {
      margin: 30px 20px 20px;
      margin-right: 110px;
      transition: margin 0.3s;
    }

    .profile-header {
      display: flex;
      justify-content: space-between;
      /* justify-content: end; */
      /*في النهاية ( اليسار )*/
      /* justify-content: center; */
      /*في الوسط*/
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    }

    .profile-header h1 {
      color: var(--primary-color);
      font-size: 1.6rem;
    }

    /* تبويبات الملف الشخصي */
    .profile-tabs {
      display: flex;
      background: rgba(0, 5, 97, 0.05);
      border-radius: 10px;
      padding: 5px;
      margin-bottom: 25px;
      overflow-x: auto;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);

    }

    .profile-tab {
      padding: 12px 20px;
      cursor: pointer;
      border-radius: 8px;
      transition: var(--transition);
      text-align: center;
      min-width: 120px;
      font-weight: 500;
      position: relative;
      /* overflow: hidden; */
    }

    .profile-tab::before {
      content: '';
      position: absolute;
      bottom: 0;
      right: 0;
      width: 0;
      height: 3px;
      background: var(--primary-color);
      transition: width 0.3s ease;
    }

    .profile-tab.active {
      background: white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      color: var(--primary-color);
      font-weight: bold;
    }

    .profile-tab.active::before {
      width: 100%;
    }

    /* تلوين خلفية التبويبات الرئيسية */
    .profile-tab:hover:not(.active) {
      background: rgba(0, 2, 97, 0.1);
    }

    /* بطاقات الملف الشخصي */
    .profile-card {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      padding: 25px;
      margin-bottom: 25px;
      position: relative;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .profile-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }

    .profile-card::before {
      content: '';
      position: absolute;
      top: 0;
      right: 0;
      width: 5px;
      height: 100%;
      background: var(--primary-color);
      border-radius: 0 12px 12px 0;
    }

    .profile-card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
      padding-bottom: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .profile-card-header h2 {
      color: var(--primary-color);
      font-size: 1.3rem;
      position: relative;
      padding-right: 10px;
    }

    .profile-card-header h2::before {
      content: '';
      position: absolute;
      right: 0;
      bottom: -5px;
      width: 100px;
      height: 3px;
      background: var(--primary-color);
      border-radius: 3px;
    }

    .profile-card-header .action-btn {
      background: rgba(0, 97, 94, 0.1);
      border: none;
      border-radius: 8px;
      padding: 8px 15px;
      color: var(--primary-color);
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .profile-card-header .action-btn:hover {
      background: var(--primary-color);
      color: white;
      box-shadow: 0 3px 8px rgba(0, 97, 94, 0.3);
    }

    /* نموذج المعلومات الشخصية */
    .profile-info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
    }

    .info-group {
      margin-bottom: 15px;
    }

    .info-label {
      font-size: 0.9rem;
      color: var(--light-text);
      margin-bottom: 5px;
    }

    .info-value {
      font-size: 1rem;
      font-weight: 500;
      padding: 10px 15px;
      background: rgba(0, 0, 0, 0.02);
      border-radius: 8px;
      min-height: 45px;
      display: flex;
      align-items: center;
            border-left: 3px solid var(--primary-color);

    }

    .editable .info-value {
      background: white;
      border: 1px solid #ddd;
    }

    .editable input,
    .editable select {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: var(--transition);
    }

    .editable input:focus,
    .editable select:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
    }

    /* بطاقات الأمان */
    .security-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    .security-item:last-child {
      border-bottom: none;
    }

    .security-info {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .security-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: rgba(0, 97, 94, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-color);
      font-size: 18px;
    }

    .security-details h3 {
      font-size: 1rem;
      margin-bottom: 3px;
    }

    .security-details p {
      font-size: 0.85rem;
      color: var(--light-text);
    }

    .security-status {
      padding: 5px 12px;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    .status-active {
      background: rgba(39, 174, 96, 0.1);
      color: #27ae60;
    }

    .status-inactive {
      background: rgba(231, 76, 60, 0.1);
      color: #e74c3c;
    }

    .toggle-switch {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
    }

    .toggle-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .toggle-slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      right: 0;
      left: 0;
      bottom: 0;
      background-color: #ccc;
      transition: .4s;
      border-radius: 34px;
    }

    .toggle-slider:before {
      position: absolute;
      content: "";
      height: 18px;
      width: 18px;
      left: 3px;
      bottom: 3px;
      background-color: white;
      transition: .4s;
      border-radius: 50%;
    }

    input:checked+.toggle-slider {
      background-color: var(--primary-color);
    }

    input:checked+.toggle-slider:before {
      transform: translateX(-26px);
    }

    /* بطاقات التاريخ والسجل */
    .history-item {
      padding: 15px;
      border-bottom: 1px solid #eee;
      transition: var(--transition);
    }

    .history-item:hover {
      background: rgba(0, 97, 94, 0.03);
    }

    .history-header {
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;
    }

    .history-title {
      font-weight: bold;
      color: var(--primary-color);
    }

    .history-date {
      color: var(--light-text);
      font-size: 0.9rem;
    }

    .history-details {
      color: var(--text-color);
      margin-bottom: 5px;
    }

    .history-ip {
      color: var(--light-text);
      font-size: 0.85rem;
    }

    /* زر الحفظ */
    .save-btn {
      background: var(--primary-color);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 8px;
      margin-top: 20px;
    }

    .save-btn:hover {
      background: #004d4b;
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0, 97, 94, 0.3);
    }

    /* التكيف مع الشاشات الصغيرة */
    @media (max-width: 1200px) {
      .sidebar {
        right: -280px;
      }

      .sidebar.show {
        right: 0;
      }

      .main-container {
        margin-right: 20px;
        margin-left: 20px;
      }

      .mobile-toggle {
        display: block;
      }
    }

    @media (max-width: 768px) {
      .profile-tabs {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 10px;
      }

      .profile-tab {
        min-width: auto;
        padding: 10px 15px;
        font-size: 0.85rem;
      }

      .profile-info-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 480px) {

      .security-item,
      .preference-item,
      .activity-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }

      .payment-method {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
      }

      .payment-actions {
        align-self: flex-end;
      }
    }


    /* تحسينات إضافية */
    .edit-input {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
      font-size: 1rem;
      transition: var(--transition);
    }

    .edit-input:focus {
      border-color: var(--primary-color);
      outline: none;
      box-shadow: 0 0 0 3px rgba(0, 97, 94, 0.1);
    }

    .phone-group {
      display: flex;
      gap: 10px;
      width: 100%;
    }

    .country-code {
      position: relative;
      min-width: 100px;
    }

    .country-code select {
      width: 100%;
      padding: 10px 15px;
      padding-left: 40px;
      border: 1px solid #ddd;
      border-radius: 8px;
      appearance: none;
      background: white;
    }

    .country-code i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #777;
    }

    .phone-number {
      flex: 1;
    }

    .phone-number input {
      width: 100%;
      padding: 10px 15px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .profile-card-header .action-btn i {
      transition: transform 0.3s ease;
    }

    .profile-card-header .action-btn:hover i {
      transform: rotate(15deg);
    }

    .quick-stat {
      flex: 1;
      text-align: center;
      padding: 15px;
      background: rgba(0, 97, 94, 0.03);
      border-radius: 10px;
      transition: transform 0.3s ease;
      border: 1px solid rgba(0, 0, 0, 0.03);
    }

    .quick-stat:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      background: rgba(0, 97, 94, 0.05);
    }

    .quick-stat div:first-child {
      font-size: 1.8rem;
      font-weight: bold;
      color: var(--primary-color);
      margin-bottom: 5px;
    }

    .quick-stat div:last-child {
      font-size: 0.9rem;
      color: var(--light-text);
    }

    /* رسوم متحركة للبطاقات */
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .profile-card {
      animation: fadeIn 0.5s ease forwards;
    }

    .profile-card:nth-child(1) {
      animation-delay: 0.1s;
    }

    .profile-card:nth-child(2) {
      animation-delay: 0.2s;
    }

    .profile-card:nth-child(3) {
      animation-delay: 0.3s;
    }

    .profile-card:nth-child(4) {
      animation-delay: 0.4s;
    }
  </style>

  <!-- الحاوية الرئيسية للمحتوى -->
  <div class="main-container">
    <div class="profile-header">
      <h1>الملف الشخصي</h1>
      <div class="edit-btn">
        <button class="save-btn" id="save-btn">
          <i class="fas fa-save"></i> حفظ التغييرات
        </button>
      </div>
    </div>

    <!-- تبويبات الملف الشخصي -->
    <div class="profile-tabs">
      <div class="profile-tab active" onclick="showTab('overview')">نظرة عامة</div>
      <div class="profile-tab" onclick="showTab('personal')">المعلومات الشخصية</div>
      <div class="profile-tab" onclick="showTab('connections')">الحسابات المتصلة</div>
      <div class="profile-tab" onclick="showTab('history')">سجل النشاط</div>
    </div>

    <!-- محتوى التبويبات -->
    <div id="overview" class="profile-content">
      <!-- بطاقة النظرة العامة -->
      <div class="profile-card">
        <div class="profile-card-header">
          <h2>نظرة عامة على الحساب</h2>
        </div>

        <div class="profile-info-grid">
          <div class="info-group">
            <div class="info-label">الاسم الكامل</div>
            <div class="info-value"><span id="allname"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">البريد الإلكتروني</div>
            <div class="info-value"><span id="email"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">رقم الهاتف</div>
            <div class="info-value"><span id="mobile"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">رقم الهوية</div>
            <div class="info-value"><span id="identity_number"></div>
          </div>

          <div class="info-group">
            <div class="info-label">تاريخ التسجيل</div>
            <div class="info-value"><span id="created_at"></div>
          </div>

          <div class="info-group">
            <div class="info-label">حالة الحساب</div>
            <div class="info-value">
              <span class="status-active">نشط</span>
            </div>
          </div>
        </div>
      </div>

      <!-- بطاقة الإحصائيات -->
      <div class="profile-card">
        <div class="profile-card-header">
          <h2>إحصائيات الحساب</h2>
        </div>

        <div class="quick-stats" style="display: flex; justify-content: space-between; gap: 15px; margin-top: 15px;">
            <div class="quick-stat">
                <div id="active-requests">0</div>
                <div>الطلبات النشطة</div>
            </div>

            <div class="quick-stat">
                <div id="valid-licenses">0</div>
                <div>الرخص السارية</div>
            </div>

            <div class="quick-stat">
                <div id="violations">0</div>
                <div>المخالفات</div>
            </div>

            <div class="quick-stat">
                <div id="total-requests">0</div>
                <div>إجمالي الطلبات</div>
            </div>
        </div>


      </div>

      <!-- بطاقة آخر الأنشطة -->

    </div>

    <!-- محتوى المعلومات الشخصية -->
    <div id="personal" class="profile-content" style="display: none;">
      <div class="profile-card">
        <div class="profile-card-header">
          <h2>المعلومات الشخصية</h2>
          <button class="action-btn" id="edit-btn">
            <i class="fas fa-edit"></i> تعديل المعلومات
          </button>
        </div>

        <div class="profile-info-grid">
          <div class="info-group">
            <div class="info-label">الاسم الأول</div>
            <div class="info-value"><span id="first-name"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">اسم الأب</div>
            <div class="info-value"><span id="father-name"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">اسم الجد</div>
            <div class="info-value"><span id="grandfather-name"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">اسم العائلة</div>
            <div class="info-value"><span id="family-name"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">البريد الإلكتروني</div>
            <div class="info-value"><span id="email-personal"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">رقم الجوال</div>
            <div class="info-value"><span id="phone"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">رقم الهوية الوطنية</div>
            <div class="info-value"><span id="national-id"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">تاريخ الميلاد</div>
            <div class="info-value"><span id="birthdate"></span></div>
          </div>

          <div class="info-group">
            <div class="info-label">الجنسية</div>
            <div class="info-value" id="nationality">سعودي</div>
          </div>

          <div class="info-group">
            <div class="info-label">المدينة</div>
            <div class="info-value" id="city">الرياض</div>
          </div>

          <div class="info-group">
            <div class="info-label">الحي</div>
            <div class="info-value" id="district">الملز</div>
          </div>

          <div class="info-group">
            <div class="info-label">الرمز البريدي</div>
            <div class="info-value" id="postal-code">11564</div>
          </div>
        </div>
      </div>
    </div>

    <!-- محتوى الحسابات المتصلة -->
    <div id="connections" class="profile-content" style="display:none;">
      <div class="profile-card">
        <div class="profile-card-header"><h2>الحسابات المتصلة</h2></div>
        <div id="connections-list"></div>
      </div>

    </div>

    <!-- محتوى التاريخ والسجل -->
    <!-- محتوى سجل النشاط -->
    <div id="history" class="profile-content" style="display:none;">
      <div class="profile-card">
        <div class="profile-card-header">
          <h2>سجل النشاطات</h2>
          <button class="action-btn" id="load-more">
            <i class="fas fa-history"></i> عرض الكل
          </button>
        </div>

        <div id="logs-container">
          <!-- يُملأ بالـ JS -->
        </div>
      </div>
    </div>
  </div>

  @vite(['resources/js/layouts/jquery-3.6.0.min.js'])

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <script>
/*========================= إدارة التبويبات =========================*/
function showTab(tab){
    document.querySelectorAll('.profile-content').forEach(c=>c.style.display='none');
    document.querySelectorAll('.profile-tab').forEach(t=>t.classList.remove('active'));
    document.getElementById(tab).style.display='block';
    event.currentTarget.classList.add('active');
    // خاص بالحسابت المتصلة
        if(tab === 'connections') loadConnectedAccounts();   // <-- هذا السطر
        // خاص بسجل الانشطة
            if(tab === 'history')     loadActivityLogs();   // <-- هذا السطر


}

/*========================= متغيرات عامة =========================*/
window.isEditing = false;
const countryCodes = [
    {code:"+966",flag:"🇸🇦",name:"السعودية"},
    {code:"+20",flag:"🇪🇬",name:"مصر"},
    {code:"+971",flag:"🇦🇪",name:"الإمارات"},
    {code:"+962",flag:"🇯🇴",name:"الأردن"}
];
const cities = ["الرياض","جدة","مكة","المدينة","الدمام","الطائف","تبوك","بريدة","أبها","حائل"];

/*========================= تحميل البيانات =========================*/
function loadUserData(){
    $.ajax({
        url:"/user-data",
        type:"GET",
        dataType:"json",
        success:function(res){
            if(!res.success) return;
            /* نظرة عامة */
            $('#allname').text(res.user_data.name);
            $('#email').text(res.user_data.email);
            $('#mobile').text(res.user_data.mobile);
            $('#identity_number').text(res.user_data.identity_number);
            $('#created_at').text(res.user_data.created_at);
            $('#active-requests').text(res.stats.active_requests);
            $('#valid-licenses').text(res.stats.valid_licenses);
            $('#violations').text(res.stats.violations);
            $('#total-requests').text(res.stats.total_requests);

            /* معلومات شخصية */
            if(!window.isEditing){
                $('#first-name').text(res.user_data.first_name);
                $('#father-name').text(res.user_data.father_name);
                $('#grandfather-name').text(res.user_data.grandfather_name);
                $('#family-name').text(res.user_data.family_name);
                $('#email-personal').text(res.user_data.email);
                $('#phone').text(res.user_data.mobile);
                $('#national-id').text(res.user_data.identity_number);
                $('#birthdate').text((res.user_data.created_at||'').split(' ')[0]);
                $('#nationality').text('سعودي');
                $('#city').text(res.user_data.governorate_name);
                $('#district').text(res.user_data.directorate_name);
                $('#postal-code').text('11564');
            }
        },
        error:xhr=>console.error(xhr.responseJSON?.message||xhr.responseText)
    });
}

/*========================= وضع التعديل =========================*/
$('#edit-btn').on('click',function(){
    window.isEditing=!window.isEditing;
    const fields=['email-personal','phone','city','district','postal-code'];
    fields.forEach(id=>{
        const el=document.getElementById(id);
        if(window.isEditing){
            el.dataset.original=el.textContent;
            let input;
            if(id==='phone'){
                const grp=document.createElement('div');grp.className='phone-group';
                const codeDiv=document.createElement('div');codeDiv.className='country-code';
                const sel=document.createElement('select');countryCodes.forEach(c=>{
                    const opt=document.createElement('option');opt.value=c.code;opt.text=`${c.flag} ${c.code}`;if(c.code==='+966')opt.selected=true;sel.appendChild(opt);
                });
                codeDiv.appendChild(sel);codeDiv.insertAdjacentHTML('beforeend','<i class="fas fa-chevron-down"></i>');
                const numDiv=document.createElement('div');numDiv.className='phone-number';
                const inp=document.createElement('input');inp.type='tel';inp.value=el.textContent.replace('+966 ','');inp.className='edit-input';numDiv.appendChild(inp);
                grp.appendChild(codeDiv);grp.appendChild(numDiv);el.textContent='';el.appendChild(grp);return;
            }
            if(id==='city'){
                input=document.createElement('select');input.className='edit-input';cities.forEach(c=>{const opt=document.createElement('option');opt.value=opt.text=c;input.appendChild(opt);});input.value=el.textContent;
            }else{
                input=document.createElement('input');input.type='text';input.value=el.textContent;input.className='edit-input';
            }
            el.textContent='';el.appendChild(input);
        }else{
            if(el.dataset.original)el.textContent=el.dataset.original;
        }
    });
    $(this).html(window.isEditing?'<i class="fas fa-times"></i> إلغاء التعديل':'<i class="fas fa-edit"></i> تعديل المعلومات');
    $('#save-btn').toggle(window.isEditing);
});

/*========================= الحفظ =========================*/
$('#save-btn').on('click',function(){
    const email   =document.querySelector('#email-personal input')?.value?.trim()||$('#email-personal').text().trim();
    const phoneIn =document.querySelector('#phone input[type=tel]')?.value?.trim();
    const code    =document.querySelector('#phone select')?.value||'+966';
    const mobile  =code+' '+phoneIn;
    const city    =document.querySelector('#city select')?.value?.trim()||$('#city').text().trim();
    const district=document.querySelector('#district input')?.value?.trim()||$('#district').text().trim();
    const postal  =document.querySelector('#postal-code input')?.value?.trim()||$('#postal-code').text().trim();

    $.ajax({
        url:'/user-data/update',
        method:'POST',
        data:{_token:'{{ csrf_token() }}',email:email,mobile:mobile,city:city,district:district,postal_code:postal},
        success:res=>{
            if(res.success){alert(res.message);window.isEditing=false;loadUserData();}
            else{alert(res.message);}
        },
        error:xhr=>{
            const msg=xhr.responseJSON?.errors?Object.values(xhr.responseJSON.errors)[0][0]:'فشل الحفظ';alert(msg);
        }
    });
});

/*========================= تهيئة الصفحة =========================*/
$(function(){loadUserData();});


/* ==========  Connected Accounts  ========== */
function loadConnectedAccounts(){
  $.get('/connected-accounts', res=>{
    if(!res.success) return;
    let html='';
    res.accounts.forEach(a=>{
      const icon = a.name==='facebook' ? 'fab fa-facebook-f'
                 : a.name==='twitter'  ? 'fab fa-twitter'
                                       : 'fab fa-google';
      const color= a.name==='facebook' ? '#3b5998'
                 : a.name==='twitter'  ? '#1da1f2'
                                       : '#db4437';
      html+=`
        <div class="security-item">
          <div class="security-info">
            <div class="security-icon" style="background:${color}20;color:${color}">
              <i class="${icon}"></i>
            </div>
            <div class="security-details">
              <h3>${a.name}</h3>
              <p>${ a.linked ? 'متصل بحساب '+a.name : 'غير متصل بحساب '+a.name }</p>
            </div>
          </div>
           ${ a.linked
          //    ? `<button class="action-btn unlink-btn" data-provider="${"a.name"}" style="background:rgba(231,76,60,0.1);color:#e74c3c;">
          //         <i class="fas fa-unlink"></i> إلغاء الربط
          //       </button>`
          //    : `<a class="action-btn link-btn" href="/auth/redirect/${a.name}" style="background:rgba(39,174,96,0.1);color:#27ae60;">
          //         <i class="fas fa-link"></i> ربط الحساب
          //       </a>`
          // }
             ? `<button class="action-btn unlink-btn" data-provider="${"a.name"}" style="background:rgba(231,76,60,0.1);color:#e74c3c;">
                  <i class="fas fa-unlink"></i> إلغاء الربط
                </button>`
             : `<a class="action-btn link-btn" href="https://www.facebook.com/?locale=ar_AR" style="background:navy;color:white; border-radius: 5px; font-weight: bold; padding: 7px 10px; text-decoration: none; hover:background:black;">
                  <i class="fas fa-link"></i> ربط الحساب
                </a>`
          }
        </div>`;
    });
    $('#connections-list').html(html);
  });
}

/* فك الربط (يبقى كما هو) */
$(document).on('click','.unlink-btn',function(){
  const provider = $(this).data('provider');
  if(!confirm('هل أنت متأكد من فك الربط؟')) return;
  $.ajax({
    url:'/connected-accounts/unlink',
    method:'POST',
    data:{_token:'{{ csrf_token() }}', provider: provider},
    success: r=>{
      alert(r.message);
      loadConnectedAccounts();   // إعادة تحميل الحالة
    },
    error: x=>alert('فشل الفك')
  });
});

function loadActivityLogs(){
    console.log('Fetching activity logs...'); // ✅ تأكد من الاستدعاء
    $.get('/activity-logs', res=>{
        console.log('Response:', res); // ✅ تأكد من الاستجابة
        if(!res.success) {
            console.error('Error:', res.message);
            return;
        }
        let html='';
        res.logs.forEach(l=>{
            html+=`
                <div class="history-item">
                    <div class="history-header">
                        <div class="history-title">${l.title}</div>
                        <div class="history-date">${new Date(l.date).toLocaleString('ar-EG')}</div>
                    </div>
                    <div class="history-details">${l.desc}</div>
                    <div class="history-ip">IP: ${l.ip} ${l.loc?'('+l.loc+')':''}</div>
                </div>`;
        });
        $('#logs-container').html(html || '<p>لا توجد سجلات</p>');
    }).fail(function(xhr){
        console.error('AJAX Error:', xhr.responseText);
    });
}


/* زر «عرض الكل» (اختياري) */
$('#load-more').on('click',function(){
  // لو أردت تحميل المزيد يمكنك صفحة ثانية أو نافذة منبثقة
  alert('سيتم فتح صفحة مستقلة لسجل النشاط الكامل');
});
</script>



</body>
</html>
