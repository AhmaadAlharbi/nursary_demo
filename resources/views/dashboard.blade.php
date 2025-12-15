@extends('layout')

@section('title', 'لوحة التحكم - إدارة الطلبات')

@section('content')
<div class="min-h-screen p-4 md:p-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="glass-effect rounded-3xl shadow-2xl p-8 mb-6 card-hover">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <h1 class="text-4xl font-black gradient-bg bg-clip-text text-transparent mb-2">
                        لوحة التحكم
                    </h1>
                    <p class="text-gray-600">إدارة طلبات التسجيل والمتابعة</p>
                </div>
                <a href="{{ route('registration') }}" 
                   class="btn-primary text-white font-bold py-3 px-6 rounded-xl shadow-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    طلب تسجيل جديد
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
            <div class="glass-effect rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">إجمالي الطلبات</p>
                        <p class="text-3xl font-black text-gray-800 mt-2">{{ $stats['total'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">قيد المراجعة</p>
                        <p class="text-3xl font-black text-yellow-600 mt-2">{{ $stats['pending'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">معتمد</p>
                        <p class="text-3xl font-black text-green-600 mt-2">{{ $stats['approved'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">ينقص مستندات</p>
                        <p class="text-3xl font-black text-orange-600 mt-2">{{ $stats['missing_documents'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="glass-effect rounded-2xl p-6 card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-semibold">مرفوض</p>
                        <p class="text-3xl font-black text-red-600 mt-2">{{ $stats['rejected'] }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-br from-red-400 to-red-600 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="glass-effect rounded-3xl shadow-2xl p-6 mb-6 card-hover">
            <form method="GET" action="{{ route('dashboard') }}" class="space-y-4">
                <div class="flex items-center gap-3 mb-4">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">فلترة الطلبات</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">البحث</label>
                        <input type="text" name="search" value="{{ request('search') }}" 
                               class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all"
                               placeholder="اسم الطالب أو ولي الأمر...">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">الحالة</label>
                        <select name="status" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all">
                            <option value="">جميع الحالات</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>قيد المراجعة</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>معتمد</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>مرفوض</option>
                            <option value="missing_documents" {{ request('status') == 'missing_documents' ? 'selected' : '' }}>ينقص مستندات</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">ترتيب حسب</label>
                        <select name="sort_by" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all">
                            <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>تاريخ التسجيل</option>
                            <option value="student_name" {{ request('sort_by') == 'student_name' ? 'selected' : '' }}>اسم الطالب</option>
                            <option value="status" {{ request('sort_by') == 'status' ? 'selected' : '' }}>الحالة</option>
                        </select>
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit" 
                                class="flex-1 btn-primary text-white font-bold py-3 px-6 rounded-xl shadow-lg flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            بحث
                        </button>
                        <a href="{{ route('dashboard') }}" 
                           class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all">
                            ✕
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Applications Table -->
        <div class="glass-effect rounded-3xl shadow-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-purple-600 to-blue-600 text-white">
                        <tr>
                            <th class="px-6 py-4 text-right text-sm font-bold">#</th>
                            <th class="px-6 py-4 text-right text-sm font-bold">اسم الطالب</th>
                            <th class="px-6 py-4 text-right text-sm font-bold">العمر</th>
                            <th class="px-6 py-4 text-right text-sm font-bold">ولي الأمر</th>
                            <th class="px-6 py-4 text-right text-sm font-bold">الجوال</th>
                            <th class="px-6 py-4 text-right text-sm font-bold">تاريخ التسجيل</th>
                            <th class="px-6 py-4 text-right text-sm font-bold">الحالة</th>
                            <th class="px-6 py-4 text-center text-sm font-bold">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($applications as $application)
                        <tr class="hover:bg-purple-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $application->id }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-400 to-blue-400 flex items-center justify-center text-white font-bold">
                                        {{ mb_substr($application->student_name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $application->student_name }}</p>
                                        <p class="text-xs text-gray-500">{{ $application->gender == 'male' ? 'ذكر' : 'أنثى' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $application->age }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $application->parent_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600" dir="ltr">{{ $application->parent_phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $application->created_at->format('Y/m/d') }}</td>
                            <td class="px-6 py-4">
                                <span class="status-badge bg-{{ $application->status_color }}-100 text-{{ $application->status_color }}-800">
                                    {{ $application->status_label }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openModal({{ $application->id }})"
                                            class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg transition-all"
                                            title="تفاصيل">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </button>
                                    <button onclick="openStatusModal({{ $application->id }}, '{{ $application->status }}')"
                                            class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-lg transition-all"
                                            title="تغيير الحالة">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                    </svg>
                                    <p class="text-xl font-semibold">لا توجد طلبات</p>
                                    <p class="text-sm mt-2">ابدأ بإضافة طلب تسجيل جديد</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($applications->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $applications->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Application Detail Modal -->
<div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div id="modalContent"></div>
    </div>
</div>

<!-- Status Change Modal -->
<div id="statusModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full">
        <div id="statusModalContent"></div>
    </div>
</div>

@push('scripts')
<script>
// Application Detail Modal
function openModal(id) {
    fetch(`/dashboard/application/${id}`)
        .then(response => response.text())
        .then(html => {
            document.getElementById('modalContent').innerHTML = html;
            document.getElementById('detailModal').classList.remove('hidden');
        });
}

function closeModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

// Status Change Modal
function openStatusModal(id, currentStatus) {
    const statuses = [
        { value: 'pending', label: 'قيد المراجعة', color: 'yellow' },
        { value: 'approved', label: 'معتمد', color: 'green' },
        { value: 'rejected', label: 'مرفوض', color: 'red' },
        { value: 'missing_documents', label: 'ينقص مستندات', color: 'orange' }
    ];

    let html = `
        <div class="p-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">تغيير حالة الطلب</h3>
                <button onclick="closeStatusModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="/dashboard/application/${id}/status" method="POST">
                <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]')?.content || ''}">
                
                <div class="space-y-4 mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">اختر الحالة الجديدة</label>
                    ${statuses.map(status => `
                        <label class="flex items-center p-4 border-2 ${currentStatus === status.value ? 'border-purple-500 bg-purple-50' : 'border-gray-200'} rounded-xl cursor-pointer hover:border-purple-300 transition-all">
                            <input type="radio" name="status" value="${status.value}" ${currentStatus === status.value ? 'checked' : ''} class="ml-3">
                            <span class="status-badge bg-${status.color}-100 text-${status.color}-800">${status.label}</span>
                        </label>
                    `).join('')}
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">ملاحظات إدارية (اختياري)</label>
                    <textarea name="admin_notes" rows="3" class="w-full px-4 py-3 rounded-xl border-2 border-gray-200 transition-all" placeholder="أضف ملاحظات للمتابعة..."></textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="flex-1 btn-primary text-white font-bold py-3 px-6 rounded-xl shadow-lg">
                        حفظ التغييرات
                    </button>
                    <button type="button" onclick="closeStatusModal()" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-xl">
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

// Close modals when clicking outside
document.getElementById('detailModal')?.addEventListener('click', function(e) {
    if (e.target === this) closeModal();
});

document.getElementById('statusModal')?.addEventListener('click', function(e) {
    if (e.target === this) closeStatusModal();
});
</script>
@endpush
@endsection
