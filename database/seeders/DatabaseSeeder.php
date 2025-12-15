<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Application;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    // User::factory(10)->create();

    public function run(): void
    {
        $applications = [
            [
                'student_name' => 'أحمد محمد العلي',
                'birth_date' => '2021-03-15',
                'gender' => 'male',
                'parent_name' => 'محمد عبدالله العلي',
                'parent_phone' => '0501234567',
                'parent_email' => 'mohamed.ali@email.com',
                'address' => 'الرياض، حي النرجس، شارع التحلية',
                'medical_notes' => 'لا توجد',
                'status' => 'pending',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'student_name' => 'فاطمة سعيد الحربي',
                'birth_date' => '2020-07-22',
                'gender' => 'female',
                'parent_name' => 'سعيد خالد الحربي',
                'parent_phone' => '0557654321',
                'parent_email' => 'saeed.harbi@email.com',
                'address' => 'جدة، حي الروضة، شارع الأمير سلطان',
                'medical_notes' => 'حساسية من الفول السوداني',
                'status' => 'approved',
                'admin_notes' => 'تم قبول الطالبة، يرجى إحضار المستندات المطلوبة',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(1),
            ],
            [
                'student_name' => 'عمر عبدالعزيز السالم',
                'birth_date' => '2022-01-10',
                'gender' => 'male',
                'parent_name' => 'عبدالعزيز فهد السالم',
                'parent_phone' => '0509876543',
                'parent_email' => 'abdulaziz.salem@email.com',
                'address' => 'الدمام، حي الفيصلية، شارع الملك فهد',
                'medical_notes' => null,
                'status' => 'missing_documents',
                'admin_notes' => 'ينقص شهادة الميلاد وصورة البطاقة',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subHours(6),
            ],
            [
                'student_name' => 'نورة راشد القحطاني',
                'birth_date' => '2021-11-05',
                'gender' => 'female',
                'parent_name' => 'راشد صالح القحطاني',
                'parent_phone' => '0503334444',
                'parent_email' => 'rashed.qahtani@email.com',
                'address' => 'الرياض، حي العليا، برج المملكة',
                'medical_notes' => 'ربو خفيف',
                'status' => 'approved',
                'admin_notes' => 'تم القبول، البدء يوم الأحد القادم',
                'created_at' => now()->subWeek(),
                'updated_at' => now()->subDays(2),
            ],
            [
                'student_name' => 'يوسف عبدالله المطيري',
                'birth_date' => '2019-09-18',
                'gender' => 'male',
                'parent_name' => 'عبدالله حسن المطيري',
                'parent_phone' => '0551112222',
                'parent_email' => 'abdullah.mutairi@email.com',
                'address' => 'الخبر، حي الثقبة، شارع الظهران',
                'medical_notes' => null,
                'status' => 'rejected',
                'admin_notes' => 'عمر الطالب أكبر من الحد المسموح',
                'created_at' => now()->subDays(8),
                'updated_at' => now()->subDays(4),
            ],
            [
                'student_name' => 'مريم ناصر العتيبي',
                'birth_date' => '2021-05-30',
                'gender' => 'female',
                'parent_name' => 'ناصر فيصل العتيبي',
                'parent_phone' => '0502223333',
                'parent_email' => 'nasser.otaibi@email.com',
                'address' => 'مكة المكرمة، حي العزيزية، شارع الحج',
                'medical_notes' => 'لا توجد',
                'status' => 'pending',
                'created_at' => now()->subHours(12),
                'updated_at' => now()->subHours(12),
            ],
            [
                'student_name' => 'خالد سليمان الدوسري',
                'birth_date' => '2020-12-25',
                'gender' => 'male',
                'parent_name' => 'سليمان محمد الدوسري',
                'parent_phone' => '0556667777',
                'parent_email' => 'sulaiman.dosari@email.com',
                'address' => 'الرياض، حي الملقا، شارع العروبة',
                'medical_notes' => 'حساسية من البيض',
                'status' => 'approved',
                'admin_notes' => 'مقبول في الفصل الأزرق',
                'created_at' => now()->subDays(10),
                'updated_at' => now()->subDays(6),
            ],
            [
                'student_name' => 'سارة عبدالرحمن الشمري',
                'birth_date' => '2022-04-12',
                'gender' => 'female',
                'parent_name' => 'عبدالرحمن علي الشمري',
                'parent_phone' => '0508889999',
                'parent_email' => 'abdulrahman.shamri@email.com',
                'address' => 'المدينة المنورة، حي السلام، شارع قباء',
                'medical_notes' => null,
                'status' => 'pending',
                'created_at' => now()->subDays(1),
                'updated_at' => now()->subDays(1),
            ],
            [
                'student_name' => 'زياد أحمد الغامدي',
                'birth_date' => '2021-08-08',
                'gender' => 'male',
                'parent_name' => 'أحمد يحيى الغامدي',
                'parent_phone' => '0554445555',
                'parent_email' => 'ahmed.ghamdi@email.com',
                'address' => 'الطائف، حي الشهداء، شارع الحويه',
                'medical_notes' => 'يحتاج نظارات طبية',
                'status' => 'missing_documents',
                'admin_notes' => 'ينقص التقرير الطبي',
                'created_at' => now()->subDays(4),
                'updated_at' => now()->subDays(2),
            ],
            [
                'student_name' => 'ريم سعود الزهراني',
                'birth_date' => '2020-10-20',
                'gender' => 'female',
                'parent_name' => 'سعود عبدالله الزهراني',
                'parent_phone' => '0507778888',
                'parent_email' => 'saud.zahrani@email.com',
                'address' => 'أبها، حي المنسك، شارع الملك عبدالعزيز',
                'medical_notes' => 'لا توجد',
                'status' => 'approved',
                'admin_notes' => 'مقبولة، تبدأ الأسبوع القادم',
                'created_at' => now()->subDays(7),
                'updated_at' => now()->subDays(3),
            ],
        ];

        foreach ($applications as $application) {
            Application::create($application);
        }
    }
}
