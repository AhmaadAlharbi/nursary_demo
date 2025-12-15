@extends('layout')

@section('title', 'تسجيل طالب جديد - سحاب كود')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4 md:p-8">
    <div class="w-full max-w-4xl">
        <!-- Header -->
        <div class="text-center mb-8 animate-float">
            <div class="inline-block px-6 py-3 bg-white rounded-2xl shadow-xl mb-4">
                <h1 class="text-4xl md:text-5xl font-black gradient-bg bg-clip-text text-transparent">
                    سحاب كود
                </h1>
            </div>
            <p class="text-white text-xl font-semibold">نظام إدارة الحضانات الذكي</p>
            <p class="text-white/80 mt-2">سجّل الآن وابدأ رحلة طفلك التعليمية معنا</p>
        </div>

        <!-- Registration Form -->
        <div class="glass-effect rounded-3xl shadow-2xl p-8 md:p-12 card-hover">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">تسجيل طالب جديد</h2>
                    <p class="text-gray-600 mt-2">املأ البيانات أدناه لتسجيل طفلك</p>
                </div>
                <div class="hidden md:block">
                    <svg class="w-16 h-16 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                </div>
            </div>

            @if($errors->any())
                <div class="bg-red-50 border-r-4 border-red-500 p-4 mb-6 rounded-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="mr-3">
                            <h3 class="text-sm font-medium text-red-800">يرجى تصحيح الأخطاء التالية:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('registration.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Student Information -->
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 p-6 rounded-2xl border-2 border-purple-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 ml-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        بيانات الطالب
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">اسم الطالب *</label>
                            <input type="text" name="student_name" value="{{ old('student_name') }}" 
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all"
                                   placeholder="أدخل اسم الطالب الكامل" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">تاريخ الميلاد *</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" 
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">الجنس *</label>
                            <select name="gender" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all" required>
                                <option value="">اختر الجنس</option>
                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ذكر</option>
                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>أنثى</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">ملاحظات طبية (اختياري)</label>
                            <input type="text" name="medical_notes" value="{{ old('medical_notes') }}" 
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all"
                                   placeholder="حساسية، أمراض مزمنة، إلخ">
                        </div>
                    </div>
                </div>

                <!-- Parent Information -->
                <div class="bg-gradient-to-r from-blue-50 to-purple-50 p-6 rounded-2xl border-2 border-blue-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-6 h-6 ml-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        بيانات ولي الأمر
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">اسم ولي الأمر *</label>
                            <input type="text" name="parent_name" value="{{ old('parent_name') }}" 
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all"
                                   placeholder="أدخل الاسم الكامل" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">رقم الجوال *</label>
                            <input type="tel" name="parent_phone" value="{{ old('parent_phone') }}" 
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all"
                                   placeholder="05xxxxxxxx" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">البريد الإلكتروني *</label>
                            <input type="email" name="parent_email" value="{{ old('parent_email') }}" 
                                   class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all"
                                   placeholder="example@email.com" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">العنوان *</label>
                            <textarea name="address" rows="1" 
                                      class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all"
                                      placeholder="أدخل العنوان الكامل" required>{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4">
                    <button type="submit" 
                            class="flex-1 btn-primary text-white font-bold py-4 px-8 rounded-xl shadow-lg flex items-center justify-center gap-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        إرسال الطلب
                    </button>
                    <a href="{{ route('dashboard') }}" 
                       class="sm:w-auto bg-gray-600 hover:bg-gray-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg flex items-center justify-center gap-2 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        لوحة التحكم
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8 text-white">
            <p class="text-sm opacity-90">© 2024 سحاب كود - جميع الحقوق محفوظة</p>
            <p class="text-xs opacity-75 mt-2">نظام متكامل لإدارة الحضانات والروضات</p>
        </div>
    </div>
</div>
@endsection
