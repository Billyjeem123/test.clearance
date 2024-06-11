<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
     public function index(){

         return view('home.index');
     }

    public function register(){

        return view('home.register');
    }



    public function register_user(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'student_name' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'college_name' => 'required|string|max:255',
            'student_dept' => 'required|string|max:255',
            'student_level' => 'required|string|max:255',
            'student_origin' => 'required|string|max:255',
            'student_address' => 'required|string|max:255',
            'student_email' => 'required|email|max:255|unique:students',
            'student_dob' => 'required|date',
            'student_hostel' => 'required|string|max:255',
            'student_room_num' => 'required|string|max:255',
            'student_title' => 'required|string|max:255',
            'student_clinic_card' => 'required|string|max:255',
            'student_marital_status' => 'required|string|max:255',
//            'student_signature' => 'required|file|mimes:jpg,jpeg,png|max:2048', // Validation for the signature
//            'student_passport' => 'required|file|mimes:jpg,jpeg,png|max:2048',  // Validation for the passport
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $matricNumber = $this->matricNumber($request->student_name);

        // Create a corresponding User record for authentication
        $user = User::create([
            'name' => $request->student_name,
            'email' => $request->student_email,
            'password' => bcrypt($matricNumber), // Hash the password before storing it
        ]);

        // Handle file uploads
        $student_signature = $this->uploadStudentSignature($request);
        $student_passport = $this->uploadStudentPassport($request);


        // Create a new student record in the database
        $student = Student::create([
            'user_id' => $user->id, // Associate the user_id
            'student_name' => $request->student_name,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'matric_number' => $matricNumber,
            'college_name' => $request->college_name,
            'student_dept' => $request->student_dept,
            'student_level' => $request->student_level,
            'student_origin' => $request->student_origin,
            'student_address' => $request->student_address,
            'student_email' => $request->student_email,
            'student_dob' => $request->student_dob,
            'student_hostel' => $request->student_hostel,
            'student_room_num' => $request->student_room_num,
            'student_title' => $request->student_title,
            'student_clinic_card' => $request->student_clinic_card,
            'student_marital_status' => $request->student_marital_status,
            'student_signature' => $student_signature,
            'student_passport' => $student_passport,
        ]);

        // Log in the newly registered user
        Auth::login($user);

        // Redirect the user after successful registration
        return redirect()->route('student_dashboard')->with('success', 'Registration successful!');
    }

    private function MatricNumber($firstName)
    {
        $firstThreeLetters = strtoupper(substr($firstName, 0, 3));
        $dayOfRegistration = Carbon::now()->format('d');
        $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        return "FUO/{$dayOfRegistration}/{$randomDigits}";
    }

    private function uploadStudentSignature($request): ?string
    {
        $fileUrl = null;

        if ($request->hasFile('student_signature')) {
            $file = $request->file('student_signature');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generate a unique name for the file
            $filePath = $file->storeAs('public/uploads', $fileName);
            $fileUrl = asset('storage/uploads/' . $fileName);
        }

        return $fileUrl;
    }

    private function uploadStudentPassport($request): ?string
    {
        $fileUrl = null;

        if ($request->hasFile('student_passport')) {
            $file = $request->file('student_passport');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generate a unique name for the file
            $filePath = $file->storeAs('public/uploads', $fileName);
            $fileUrl = asset('storage/uploads/' . $fileName);
        }

        return $fileUrl;
    }

    public function student_dashboard()
    {
         $unit = Unit::all();
        return view('student.index', compact('unit'));
    }

      public function clearance_approval_unit($unit_id){

          $unit = Unit::find($unit_id);

          return view('student.process', compact('unit'));

}
}
