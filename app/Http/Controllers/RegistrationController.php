<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'parent_name' => 'required|string|max:255',
            'parent_phone' => ['required', 'regex:/^[569]\d{7}$/'],
            'parent_email' => 'required|email|max:255',
            'address' => 'required|string',
            'medical_notes' => 'nullable|string',
            'student_photo' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'birth_certificate' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:2048',
            'civil_id' => 'nullable|file|mimes:pdf,jpeg,jpg,png|max:2048',
        ], [
            'parent_phone.regex' => 'رقم الهاتف يجب أن يكون رقم كويتي صحيح (8 أرقام تبدأ بـ 5، 6، أو 9)',
            'student_photo.image' => 'صورة الطفل يجب أن تكون صورة',
            'student_photo.mimes' => 'صورة الطفل يجب أن تكون بصيغة JPEG أو PNG',
            'student_photo.max' => 'حجم صورة الطفل يجب ألا يتجاوز 2 ميجابايت',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->except(['student_photo', 'birth_certificate', 'civil_id']);

        // Handle file uploads
        if ($request->hasFile('student_photo')) {

            $file = $request->file('student_photo');
            $filename = time() . '_photo_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['student_photo'] = $filename;
        }

        if ($request->hasFile('birth_certificate')) {
            $file = $request->file('birth_certificate');
            $filename = time() . '_birth_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['birth_certificate'] = $filename;
        }

        if ($request->hasFile('civil_id')) {
            $file = $request->file('civil_id');
            $filename = time() . '_civil_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $data['civil_id'] = $filename;
        }

        Application::create($data);

        return redirect()->route('registration.success');
    }

    public function success()
    {
        return view('success');
    }
}
