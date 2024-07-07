<?php

namespace App\Http\Controllers;

use App\Mail\DocumentSubmissionNotification;
use App\Mail\DocumentSubmitted;
use App\Mail\StudentReg;
use App\Models\Document;
use App\Models\FutureDocs;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserRequirement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
     public function index(){

         return view('home.index');
     }

    public function student_index(){

        $all_student =    User::with('student')->where('id', Auth::id())->first();
//         echo "<pre>";
//         echo json_encode($all_student, JSON_PRETTY_PRINT);
//         echo "</pre>";

        return view('student.index', ['student' => $all_student]);
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
            'role' => "student",
            'password' => bcrypt($matricNumber), // Hash the password before storing it,
            'matric_number' => $matricNumber,
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

        Mail::to($request->student_email)->send(new StudentReg($matricNumber));

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

    public function login(){

        return view('home.login');
    }



    public function staff_login(){

        return view('home.staff_login');
    }


    public function student_dashboard()
    {
        // Get all units
        $units = Unit::all();

        // Retrieve clearance with documents filtered by user_id
        $clearance = Unit::with(['documents' => function ($query) {
            $query->where('user_id', Auth::id());
        }])->get();

        // Fetch documents associated with all units submitted by the user
        $data = Unit::with(['documents.user'])
            ->whereHas('documents', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        $percentageCount = Unit::with(['documents.user'])
            ->whereHas('documents', function ($query) {
                $query->where('user_id', Auth::id())
                    ->where('status', 'approved');
            })
            ->get();

        // Calculate progress percentage
        $totalUnits = count($units);
        $unitsWithDocuments = $percentageCount->count();
        $progressPercentage1 = $totalUnits > 0 ? ($unitsWithDocuments / $totalUnits) * 100 : 0;
        $progressPercentage = round($progressPercentage1);
        // Uncommented JSON output for debugging
//         echo "<pre>";
//         echo json_encode($data, JSON_PRETTY_PRINT);
//         echo "</pre>";

        return view('student.clearance', compact('units', 'clearance', 'data', 'progressPercentage'));
    }






    public function clearance_approval_unit($unit_id)
    {

//        $unit  = Unit::find($unit_id);
////        $unit = Unit::with('requirements')->find($unit_id)->get();
//
//        echo "<pre";
//        echo json_encode($unit, JSON_PRETTY_PRINT);
//        echo  "</pre>";

        // Fetch the unit along with its requirements
        $unit = Unit::with('requirements')->find($unit_id);


        return view('student.process', compact('unit'));
    }


    public function save_documents(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'document_names' => 'required|array',
            'document_names.*' => 'required|string',
            'documents' => 'required|array',
            'documents.*' => 'required|file'
        ]);

        $unitId = $request->unit_id;
        $documentNames = $request->document_names;
        $userId = Auth::id();

        try {
            // Check if user has already submitted documents for this unit
            $existingDocuments = Document::where('unit_id', $unitId)
                ->where('user_id', $userId)
                ->count();

            // Determine if this is a re-upload scenario
            $isReUpload = $existingDocuments > 0;

            // Upload documents using the reusable function
            $uploadedFilePaths = $this->uploadImageMultiple($request->file('documents'));

            // Store each document in the database
            foreach ($uploadedFilePaths as $index => $filePath) {
                Document::create([
                    'unit_id' => $unitId,
                    'user_id' => $userId,
                    'names' => $documentNames[$index],
                    'file_path' => $filePath,
                    'is_reuploaded' => $isReUpload ? 'reuploaded' : 'submitted' // Track if it's a re-upload
                ]);
            }

            // Notify the unit about the submission or re-upload
            $unit = Unit::find($unitId);
            if ($unit) {
                $unit->users()->each(function ($user) use ($unit, $isReUpload) {
                    // Example notification logic, adjust as per your application's needs
                    $notificationMessage = $isReUpload
                        ? "User {$user->name} has re-uploaded documents for unit {$unit->unit_name}."
                        : "User {$user->name} has submitted documents for unit {$unit->unit_name}.";

                    // Send notification email or perform any other required actions
                    Mail::to($user->email)->send(new DocumentSubmissionNotification($notificationMessage));
                });
            }

            return redirect()->back()->with('success', 'Documents ' . ($isReUpload ? 're-' : '') . 'uploaded successfully.');

        } catch (\Exception $e) {
            // Log or handle any exceptions that occur during file upload or database storage
            return redirect()->back()->with('error', 'An error occurred while uploading documents: ' . $e->getMessage());
        }
    }



//    public function save_documents(Request $request)
//    {
//        // Validate the incoming request data
//        $request->validate([
//            'unit_id' => 'required|exists:units,id',
//            'document_names' => 'required|array',
//            'document_names.*' => 'required|string',
//            'documents' => 'required|array',
//            'documents.*' => 'required|file'
//        ]);
//
//        $unit_id = $request->unit_id;
//
//
//
//        $unitId = $request->unit_id;
//        $documentNames = $request->document_names;
//        $userId = Auth::id();
//
////        // Check if user has already submitted documents for this unit
//        $existingDocuments = Document::where('unit_id', $unitId)
//            ->where('user_id', $userId)
//            ->count();
//
//        if ($existingDocuments > 0) {
//            return redirect()->back()->with('error', 'Documents have already been submitted for this unit.');
//        }
//
//        // Check if the number of document names matches the number of uploaded files
//        if (count($documentNames) != count($request->file('documents'))) {
//            return redirect()->back()->with('error', 'Number of document names must match the number of uploaded files.');
//        }
//
//        try {
//            // Upload documents using the reusable function
//            $uploadedFilePaths = $this->uploadImageMultiple($request->file('documents'));
//
//            // Store each document in the database
//            foreach ($uploadedFilePaths as $index => $filePath) {
//                Document::create([
//                    'unit_id' => $unitId,
//                    'user_id' => $userId,
//                    'names' => $documentNames[$index],
//                    'file_path' => $filePath
//                ]);
//            }
//
//            $users = User::whereHas('units', function ($query) use ($unit_id) {
//                $query->where('unit_id', 5);
//            })->first();
//
//            # Send email notification to the unit
////            $this->sendDocumentSubmittedNotification($users);
//
//            return redirect()->back()->with('success', 'Documents uploaded successfully.');
//
//        } catch (\Exception $e) {
//            // Log or handle any exceptions that occur during file upload or database storage
//            return response()->json([
//                'status' => 'error',
//                'message' => 'An error occurred while uploading documents: ' . $e->getMessage()
//            ]);
//
////            return redirect()->back()->with('error', 'An error occurred while uploading documents'. $e->getMessage());
//        }
//    }

    private function uploadImageMultiple($files): array
    {
        $uploadedFilePaths = [];

        foreach ($files as $file) {
            if ($file->isValid()) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('public/uploads', $fileName); // Store in 'public/uploads' directory
                $uploadedFilePaths[] = asset('storage/uploads/' . $fileName); // Generate public URL
            } else {
                // Handle invalid files here (if needed)
                throw new \Exception('Invalid file encountered.');
            }
        }

        return $uploadedFilePaths;
    }

    public function login_user(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'matric_number' => 'required|string',
            'firstname' => 'required|string',
        ]);

        // Fetch the user by matric number
        $user = User::where('matric_number', $credentials['matric_number'])->first();

        if ($user && $user->name === $credentials['firstname'] && Hash::check($credentials['matric_number'], $user->password)) {
            // Manually log in the user
            Auth::login($user);

            return redirect()->route('student_dashboard');
        }

        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }

    public function login_staff(Request $request)
    {

        // Fetch the user by matric number
        $user = User::where('matric_number', $request->matric_number)->first();

        // Check if the user exists and the firstname matches
        if ($user && $user->name === $request->firstname && Hash::check($request->matric_number, $user->password)) {
            // Check if the user is a staff member
            $staff = Staff::where('user_id', $user->id)->first();
            if ($staff) {

                $roleStaff = DB::table('role_staff')->where('user_id', $user->id)->first();
                if ($roleStaff) {
                    // Manually log in the user
                    Auth::login($user);

                    return redirect()->route('staff_dashboard');
                } else {
                    return redirect()->back()->with('error', 'The staff is currently not appointed to head a unit.');
                }

            } else {
                return redirect()->back()->with('error', 'The provided credentials do not match our records.');
            }
        }

        return redirect()->back()->with('error', 'The provided credentials do not match our records.');
    }

    public function all_docs(){

        $futureDocs = FutureDocs::where('user_id', Auth::id())->latest()->get();

          return view('student.docs', ['futureDocs' => $futureDocs]);
    }

    public function save_docs(Request $request)
    {
        $file = $request->file('file');
        $filePath = "";

        if ($request->hasFile('file')) {
            $filePath =    $this->uploadImage($request);
        }

        FutureDocs::create([
            'name' => $request->name,
            'file_path' => $filePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Document uploaded successfully.');
    }

    private function uploadImage($request): ?string
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Generate a unique name for the file
            $file->storeAs('public/uploads', $fileName);
            return asset('storage/uploads/' . $fileName);
        }

}

    public function download_docs($id)
    {
        $futureDoc = FutureDocs::findOrFail($id);

        // Check if user is authorized to download this document
        if ($futureDoc->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if (!Storage::exists($futureDoc->file_path)) {
            abort(404, 'File not found.');
        }

         return Storage::url($futureDoc->file_path);


    }

    public  function delete_docs($id)
    {
     FutureDocs::find($id)->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

//    public function process_verification($documentId)
//    {
//        try {
//            $document = Document::with(['user', 'unit.requirements'])
//                ->findOrFail($documentId);
//
//            // Get the user ID associated with the document
//            $user_id = $document->user->id;
//
//            // Fetch user requirements for the unit associated with the document
//            $unitId = $document->unit->id;
//            $userRequirements = UserRequirement::where('user_id', $user_id)
//                ->where('unit_id', $unitId)
//                ->whereIn('requirement_id', $document->unit->requirements->pluck('id'))
//                ->get();
//
//            // Transform user requirements into an array of IDs for easier checking in the view
//            $userRequirementsIds = $userRequirements->pluck('requirement_id')->toArray();
//            $userRequirementsStatus = $userRequirements->pluck('is_met', 'requirement_id')->toArray();
////
//
//            return view('student.view-process', compact('document', 'userRequirementsIds'));
//        } catch (\Exception $e) {
//            return redirect()->back()->with('error', 'Error fetching document details.');
//        }
//    }


    public function process_verification($documentId)
    {
        try {
            $document = Document::with(['user', 'unit.requirements'])
                ->findOrFail($documentId);

            // Get the user ID associated with the document
            $user_id = $document->user->id;

            // Fetch user requirements for the unit associated with the document
            $unitId = $document->unit->id;
            $userRequirements = UserRequirement::where('user_id', $user_id)
                ->where('unit_id', $unitId)
                ->whereIn('requirement_id', $document->unit->requirements->pluck('id'))
                ->get();

            // Transform user requirements into an array with requirement_id as key and is_met as value
            $userRequirementsStatus = $userRequirements->pluck('is_met', 'requirement_id')->toArray();

            return view('student.view-process', compact('document', 'userRequirementsStatus'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching document details.');
        }
    }



        // Download a specific future document

    private function sendDocumentSubmittedNotification($unit)
    {
         $unitEmail = $unit->email; // Assuming the unit has an email attribute
        $unitName = $unit->name; // Replace with actual attribute name if different

        // Send email to unit
        Mail::to($unitEmail)->send(new DocumentSubmitted($unitName));
    }


}
