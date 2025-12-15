<div class="p-8">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-2xl font-bold text-gray-800">تفاصيل طلب التسجيل</h3>
        <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Status Badge -->
    <div class="mb-6">
        <span class="status-badge bg-{{ $application->status_color }}-100 text-{{ $application->status_color }}-800 text-lg">
            {{ $application->status_label }}
        </span>
    </div>

    <!-- Student Information -->
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-6 mb-6 border-2 border-purple-100">
        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-6 h-6 ml-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
            </svg>
            بيانات الطالب
        </h4>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">الاسم الكامل</p>
                <p class="font-semibold text-gray-800">{{ $application->student_name }}</p>
            </div>

            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">تاريخ الميلاد</p>
                <p class="font-semibold text-gray-800">{{ $application->birth_date->format('Y/m/d') }}</p>
            </div>

            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">العمر</p>
                <p class="font-semibold text-gray-800">{{ $application->age }}</p>
            </div>

            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">الجنس</p>
                <p class="font-semibold text-gray-800">{{ $application->gender == 'male' ? 'ذكر' : 'أنثى' }}</p>
            </div>

            @if($application->medical_notes)
            <div class="bg-white rounded-xl p-4 md:col-span-2">
                <p class="text-sm text-gray-600 mb-1">ملاحظات طبية</p>
                <p class="font-semibold text-gray-800">{{ $application->medical_notes }}</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Parent Information -->
    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 mb-6 border-2 border-blue-100">
        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-6 h-6 ml-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            بيانات ولي الأمر
        </h4>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">الاسم</p>
                <p class="font-semibold text-gray-800">{{ $application->parent_name }}</p>
            </div>

            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">رقم الجوال</p>
                <p class="font-semibold text-gray-800" dir="ltr">+965 {{ $application->parent_phone }}</p>
            </div>

            <div class="bg-white rounded-xl p-4 md:col-span-2">
                <p class="text-sm text-gray-600 mb-1">البريد الإلكتروني</p>
                <p class="font-semibold text-gray-800">{{ $application->parent_email }}</p>
            </div>

            <div class="bg-white rounded-xl p-4 md:col-span-2">
                <p class="text-sm text-gray-600 mb-1">العنوان</p>
                <p class="font-semibold text-gray-800">{{ $application->address }}</p>
            </div>
        </div>
    </div>

    <!-- Attachments Section -->
    @if($application->student_photo || $application->birth_certificate || $application->civil_id)
    <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-2xl p-6 mb-6 border-2 border-green-100">
        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-6 h-6 ml-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
            </svg>
            المرفقات
        </h4>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @if($application->student_photo)
            <div class="bg-white rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-semibold text-gray-700">صورة الطفل</p>
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <a href="{{ asset('uploads/' . $application->student_photo) }}" target="_blank"
                   class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    عرض الملف
                </a>
            </div>
            @endif

            @if($application->birth_certificate)
            <div class="bg-white rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-semibold text-gray-700">شهادة الميلاد</p>
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <a href="{{ asset('uploads/' . $application->birth_certificate) }}" target="_blank"
                   class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    تحميل الملف
                </a>
            </div>
            @endif

            @if($application->civil_id)
            <div class="bg-white rounded-xl p-4">
                <div class="flex items-center justify-between mb-2">
                    <p class="text-sm font-semibold text-gray-700">البطاقة المدنية</p>
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <a href="{{ asset('uploads/' . $application->civil_id) }}" target="_blank"
                   class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-800 text-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    تحميل الملف
                </a>
            </div>
            @endif
        </div>
    </div>
    @else
    <div class="bg-yellow-50 border-2 border-yellow-200 rounded-2xl p-6 mb-6">
        <div class="flex items-center gap-3">
            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <p class="text-sm font-semibold text-yellow-800">لم يتم رفع أي مرفقات بعد</p>
        </div>
    </div>
    @endif

    <!-- Additional Information -->
    <div class="bg-gray-50 rounded-2xl p-6 mb-6 border-2 border-gray-100">
        <h4 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
            <svg class="w-6 h-6 ml-2 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            معلومات إضافية
        </h4>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">تاريخ التسجيل</p>
                <p class="font-semibold text-gray-800">{{ $application->created_at->format('Y/m/d H:i') }}</p>
            </div>

            <div class="bg-white rounded-xl p-4">
                <p class="text-sm text-gray-600 mb-1">آخر تحديث</p>
                <p class="font-semibold text-gray-800">{{ $application->updated_at->format('Y/m/d H:i') }}</p>
            </div>

            @if($application->admin_notes)
            <div class="bg-white rounded-xl p-4 md:col-span-2">
                <p class="text-sm text-gray-600 mb-1">ملاحظات الإدارة</p>
                <p class="font-semibold text-gray-800">{{ $application->admin_notes }}</p>
            </div>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row gap-3">
        <button onclick="openStatusModal({{ $application->id }}, '{{ $application->status }}')" 
                class="flex-1 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            تغيير الحالة
        </button>

        <form action="{{ route('application.destroy', $application) }}" method="POST" 
              onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟')" class="flex-1">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                </svg>
                حذف الطلب
            </button>
        </form>

        <button onclick="closeModal()" 
                class="sm:w-auto bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all">
            إغلاق
        </button>
    </div>
</div>
