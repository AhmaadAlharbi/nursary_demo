@extends('layout')

@section('title', 'تفاصيل الطلب - ' . $application->student_name)

@section('content')
<div class="min-h-screen p-4 md:p-8">
    <div class="max-w-6xl mx-auto">

        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('dashboard') }}"
                class="inline-flex items-center gap-2 px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                العودة للقائمة
            </a>
        </div>

        <!-- Header with Status -->
        <div class="glass-effect rounded-3xl shadow-2xl p-8 mb-6 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute inset-0"
                    style="background-image: radial-gradient(circle, #667eea 1px, transparent 1px); background-size: 20px 20px;">
                </div>
            </div>

            <div class="relative z-10">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
                    <div>
                        <h1 class="text-4xl font-black gradient-bg bg-clip-text text-transparent mb-2">
                            {{ $application->student_name }}
                        </h1>
                        <p class="text-gray-600 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                                </path>
                            </svg>
                            طلب رقم #{{ $application->id }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <span
                            class="status-badge bg-{{ $application->status_color }}-100 text-{{ $application->status_color }}-800 text-lg px-6 py-3">
                            {{ $application->status_label }}
                        </span>
                        <p class="text-sm text-gray-500 text-center">
                            تاريخ التسجيل: {{ $application->created_at->format('Y/m/d') }}
                        </p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="flex flex-wrap gap-3">
                    <button onclick="openStatusModal({{ $application->id }}, '{{ $application->status }}')"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                            </path>
                        </svg>
                        تغيير الحالة
                    </button>

                    <a href="tel:+965{{ $application->parent_phone }}"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                        اتصال
                    </a>

                    <button onclick="window.print()"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-500 to-purple-600 hover:from-purple-600 hover:to-purple-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                            </path>
                        </svg>
                        طباعة
                    </button>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Right Column: Student Photo & Attachments -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Student Photo -->
                @if($application->student_photo)
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden card-hover">
                    <div class="p-6 bg-gradient-to-r from-purple-600 to-blue-600">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            صورة الطفل
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="relative group cursor-pointer"
                            onclick="viewImage('{{ url('uploads/' . $application->student_photo) }}', '{{ addslashes($application->student_name) }}')">
                            <img src="{{ url('uploads/' . $application->student_photo) }}"
                                alt="صورة {{ $application->student_name }}"
                                class="w-full h-80 object-cover rounded-2xl shadow-lg transition-transform transform group-hover:scale-105"
                                onerror="this.src='data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'320\' height=\'320\'%3E%3Crect fill=\'%23A78BFA\' width=\'320\' height=\'320\'/%3E%3Ctext x=\'160\' y=\'180\' text-anchor=\'middle\' fill=\'white\' font-size=\'80\' font-family=\'Arial\'%3E👶%3C/text%3E%3C/svg%3E'">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity rounded-2xl flex items-center justify-center">
                                <div
                                    class="text-white text-center transform translate-y-4 group-hover:translate-y-0 transition-transform">
                                    <svg class="w-16 h-16 mx-auto mb-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7">
                                        </path>
                                    </svg>
                                    <p class="font-bold text-lg">انقر للتكبير</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Other Attachments -->
                <div class="glass-effect rounded-3xl shadow-2xl p-6 card-hover">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                            </path>
                        </svg>
                        المستندات الرسمية
                    </h3>

                    <div class="space-y-3">
                        @if($application->birth_certificate)
                        <a href="{{ url('uploads/' . $application->birth_certificate) }}" target="_blank"
                            class="flex items-center gap-4 p-4 bg-gradient-to-r from-blue-50 to-blue-100 hover:from-blue-100 hover:to-blue-200 rounded-xl transition-all group border-2 border-blue-200">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-800">شهادة الميلاد</p>
                                <p class="text-sm text-gray-600">مستند رسمي</p>
                            </div>
                            <svg class="w-6 h-6 text-blue-600 group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        @endif

                        @if($application->civil_id)
                        <a href="{{ url('uploads/' . $application->civil_id) }}" target="_blank"
                            class="flex items-center gap-4 p-4 bg-gradient-to-r from-green-50 to-green-100 hover:from-green-100 hover:to-green-200 rounded-xl transition-all group border-2 border-green-200">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2">
                                    </path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="font-bold text-gray-800">البطاقة المدنية</p>
                                <p class="text-sm text-gray-600">وثيقة هوية</p>
                            </div>
                            <svg class="w-6 h-6 text-green-600 group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        @endif

                        @if(!$application->birth_certificate || !$application->civil_id)
                        <div class="p-6 text-center bg-yellow-50 border-2 border-yellow-200 rounded-xl">
                            <svg class="w-12 h-12 text-yellow-500 mx-auto mb-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                            <p class="text-sm font-semibold text-yellow-800">لم يتم رفع المستندات بعد</p>
                        </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Left Column: Details -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Student Information -->
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">
                    <div class="p-6 bg-gradient-to-r from-purple-600 to-blue-600">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            معلومات الطالب
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div
                                class="bg-gradient-to-br from-purple-50 to-blue-50 rounded-xl p-4 border-2 border-purple-100">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    الاسم الكامل
                                </p>
                                <p class="font-bold text-gray-900 text-lg">{{ $application->student_name }}</p>
                            </div>

                            <div
                                class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-4 border-2 border-blue-100">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    تاريخ الميلاد
                                </p>
                                <p class="font-bold text-gray-900 text-lg">{{ $application->birth_date }}</p>
                            </div>

                            <div
                                class="bg-gradient-to-br from-green-50 to-blue-50 rounded-xl p-4 border-2 border-green-100">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    العمر
                                </p>
                                <p class="font-bold text-gray-900 text-lg">{{ $application->calculated_age }}</p>
                            </div>

                            <div
                                class="bg-gradient-to-br from-pink-50 to-purple-50 rounded-xl p-4 border-2 border-pink-100">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                    الجنس
                                </p>
                                <p class="font-bold text-gray-900 text-lg">{{ $application->gender == 'male' ? 'ذكر' :
                                    'أنثى' }}</p>
                            </div>
                        </div>

                        @if($application->medical_notes)
                        <div
                            class="mt-4 p-4 bg-gradient-to-r from-yellow-50 to-orange-50 border-2 border-yellow-200 rounded-xl">
                            <p class="text-sm text-gray-600 mb-2 flex items-center gap-2 font-semibold">
                                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                ملاحظات طبية
                            </p>
                            <p class="text-gray-800">{{ $application->medical_notes }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Parent Information -->
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">
                    <div class="p-6 bg-gradient-to-r from-blue-600 to-purple-600">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            معلومات ولي الأمر
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div
                                class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-4 border-2 border-blue-100">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    اسم ولي الأمر
                                </p>
                                <p class="font-bold text-gray-900 text-lg">{{ $application->parent_name }}</p>
                            </div>

                            <div
                                class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border-2 border-green-100">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                    رقم الجوال
                                </p>
                                <p class="font-bold text-gray-900 text-lg" dir="ltr">+965 {{ $application->parent_phone
                                    }}</p>
                            </div>

                            <div
                                class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-4 border-2 border-purple-100 md:col-span-2">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                    البريد الإلكتروني
                                </p>
                                <p class="font-bold text-gray-900 text-lg">{{ $application->parent_email }}</p>
                            </div>

                            <div
                                class="bg-gradient-to-br from-orange-50 to-yellow-50 rounded-xl p-4 border-2 border-orange-100 md:col-span-2">
                                <p class="text-sm text-gray-600 mb-1 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    العنوان
                                </p>
                                <p class="font-bold text-gray-900 text-lg">{{ $application->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Admin Notes -->
                @if($application->admin_notes)
                <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">
                    <div class="p-6 bg-gradient-to-r from-orange-600 to-red-600">
                        <h3 class="text-xl font-bold text-white flex items-center gap-2">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            ملاحظات إدارية
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="bg-orange-50 border-2 border-orange-200 rounded-xl p-4">
                            <p class="text-gray-800 leading-relaxed">{{ $application->admin_notes }}</p>
                        </div>
                    </div>
                </div>
                @endif

            </div>

        </div>
    </div>
</div>

<!-- Status Change Modal -->
<div id="statusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full">
        <div id="statusModalContent"></div>
    </div>
</div>

<!-- Image Viewer Modal -->
<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-95 z-[100] flex items-center justify-center p-4"
    onclick="if(event.target === this) closeImageModal()">
    <div class="max-w-5xl w-full relative animate-fade-in">
        <button onclick="closeImageModal()"
            class="absolute -top-14 left-0 text-white hover:text-red-400 transition-all duration-300 group">
            <div class="flex items-center gap-2">
                <svg class="w-12 h-12 group-hover:rotate-90 transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
                <span class="text-sm font-semibold">ESC</span>
            </div>
        </button>

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden transform transition-all">
            <div class="p-6 bg-gradient-to-r from-purple-600 via-blue-600 to-purple-600">
                <h3 id="imageModalTitle" class="text-2xl font-black text-white text-center"></h3>
            </div>

            <div class="p-8 flex items-center justify-center bg-gray-50 min-h-[400px]">
                <img id="imageModalImg" src="" alt=""
                    class="max-w-full max-h-[75vh] object-contain rounded-2xl shadow-2xl">
            </div>

            <div class="p-6 bg-gradient-to-r from-gray-100 to-gray-50 flex justify-center gap-4">
                <a id="imageDownloadBtn" href="" download
                    class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white font-bold rounded-2xl shadow-xl hover:shadow-2xl transition-all transform hover:scale-105">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    <span>تحميل الصورة</span>
                </a>
                <button onclick="closeImageModal()"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-gray-600 hover:bg-gray-700 text-white font-bold rounded-2xl shadow-lg hover:shadow-xl transition-all">
                    <span>إغلاق</span>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: scale(0.95);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }

    @media print {

        .no-print,
        button,
        a[href*="tel:"] {
            display: none !important;
        }

        .glass-effect {
            box-shadow: none !important;
            border: 1px solid #e5e7eb;
        }
    }
</style>

@push('scripts')
<script>
    // Image Viewer
function viewImage(imageUrl, studentName) {
    document.getElementById('imageModalImg').src = imageUrl;
    document.getElementById('imageModalTitle').textContent = 'صورة ' + studentName;
    document.getElementById('imageDownloadBtn').href = imageUrl;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Status Change Modal
function openStatusModal(id, currentStatus) {
    const statuses = [
        { value: 'pending', label: 'قيد المراجعة', color: 'yellow' },
        { value: 'approved', label: 'معتمد', color: 'green' },
        { value: 'rejected', label: 'مرفوض', color: 'red' },
        { value: 'missing_documents', label: 'ينقص مستندات', color: 'orange' }
    ];

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content || '';

    let html = `
        <div class="p-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">تغيير حالة الطلب</h3>
                <button onclick="closeStatusModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="${window.location.origin}/dashboard/application/${id}/status" method="POST">
                <input type="hidden" name="_token" value="${csrfToken}">
                
                <div class="space-y-4 mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">اختر الحالة الجديدة</label>
                    ${statuses.map(status => `
                        <label class="flex items-center p-4 border-2 ${currentStatus === status.value ? 'border-purple-500 bg-purple-50' : 'border-gray-200'} rounded-xl cursor-pointer hover:border-purple-300 transition-all">
                            <input type="radio" name="status" value="${status.value}" ${currentStatus === status.value ? 'checked' : ''} class="ml-3" required>
                            <span class="status-badge bg-${status.color}-100 text-${status.color}-800">${status.label}</span>
                        </label>
                    `).join('')}
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">ملاحظات إدارية (اختياري)</label>
                    <textarea name="admin_notes" rows="3" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all" placeholder="أضف ملاحظات للمتابعة..."></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 btn-primary text-white font-bold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl transition-all">
                        حفظ التغييرات
                    </button>
                    <button type="button" onclick="closeStatusModal()" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl transition-all">
                        إلغاء
                    </button>
                </div>
            </form>
        </div>
    `;

    document.getElementById('statusModalContent').innerHTML = html;
    document.getElementById('statusModal').classList.remove('hidden');
}

function closeStatusModal() {
    document.getElementById('statusModal').classList.add('hidden');
}

// ESC key handler
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
        closeStatusModal();
    }
});

// Close modal when clicking outside
document.getElementById('statusModal')?.addEventListener('click', function(e) {
    if (e.target === this) closeStatusModal();
});
</script>
@endpush
@endsection