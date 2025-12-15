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
                <p class="font-semibold text-gray-800" dir="ltr">{{ $application->parent_phone }}</p>
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
