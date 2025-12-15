@extends('layout')

@section('title', 'تم التسجيل بنجاح!')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-2xl">
        <div class="glass-effect rounded-3xl shadow-2xl p-12 text-center card-hover">
            <!-- Success Icon -->
            <div class="mb-6 animate-float">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-gradient-to-r from-green-400 to-green-600 rounded-full shadow-xl">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Success Message -->
            <h1 class="text-4xl font-black text-gray-800 mb-4">تم التسجيل بنجاح! 🎉</h1>
            <p class="text-xl text-gray-600 mb-8">
                شكراً لك! تم استلام طلبك وسيتم مراجعته قريباً
            </p>

            <!-- Info Boxes -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div class="bg-blue-50 p-6 rounded-2xl border-2 border-blue-100">
                    <div class="text-blue-600 mb-2">
                        <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">سنتواصل معك</h3>
                    <p class="text-sm text-gray-600">عبر البريد الإلكتروني والجوال</p>
                </div>

                <div class="bg-purple-50 p-6 rounded-2xl border-2 border-purple-100">
                    <div class="text-purple-600 mb-2">
                        <svg class="w-8 h-8 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-800 mb-1">مدة المراجعة</h3>
                    <p class="text-sm text-gray-600">خلال 1-2 يوم عمل</p>
                </div>
            </div>

            <!-- What's Next -->
            <div class="bg-gradient-to-r from-purple-50 to-blue-50 p-6 rounded-2xl border-2 border-purple-100 text-right mb-8">
                <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                    <svg class="w-6 h-6 ml-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                    الخطوات القادمة
                </h3>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="flex items-start">
                        <span class="text-purple-600 ml-2">•</span>
                        <span>سيتم مراجعة طلبك من قبل الإدارة</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-purple-600 ml-2">•</span>
                        <span>قد نحتاج لمستندات إضافية (سنتواصل معك)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="text-purple-600 ml-2">•</span>
                        <span>سيتم إعلامك بنتيجة الطلب عبر البريد والجوال</span>
                    </li>
                </ul>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('registration') }}" 
                   class="flex-1 btn-primary text-white font-bold py-4 px-8 rounded-xl shadow-lg flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    تسجيل طالب آخر
                </a>
                <a href="{{ route('dashboard') }}" 
                   class="flex-1 bg-gray-600 hover:bg-gray-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg flex items-center justify-center gap-2 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    لوحة التحكم
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
