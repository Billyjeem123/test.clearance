<?php

namespace App\Http\Controllers;

use App\Mail\DocumentStatusUpdated;
use App\Models\Document;
use App\Models\Student;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserRequirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class StaffController extends Controller
{



    public function index(){

        $student =    User::where('role', 'student')->count();
        $all_student =    User::with('student')->where('role', 'student')->get();
//        echo "<pre>";
//        echo json_encode( $all_student,JSON_PRETTY_PRINT);
//        echo "</pre>";

        $users =    User::all()->count();
        $unit_count = Unit::all()->count();
        $final_year =    Db::table('students')->where('student_level', '500')->count();
        return view('staff.index', [ 'all_student' => $all_student, 'student_count' => $student, 'final_year' => $final_year, 'unit_count' => $unit_count,  'users_count' => $users]);
    }



    public function staff_dashboard()
    {
        $user = auth()->user();
        $staff = $user->staff;

        #  Get the user associated with the staff
        $user = $staff->user;

        $units = $user->units()->first();

        $clearance = Unit::with(['documents.user'])->findOrFail($units->id);
        $approvedCount = $clearance->documents->where('status', 'approved')->count();
        $pendingCount = $clearance->documents->where('status', 'pending')->count();
        $disapprovedCount = $clearance->documents->where('status', 'disapproved')->count();
        $totalCount = $clearance->documents->count();
//
//         echo "<pre>";
//         echo json_encode($clearance, JSON_PRETTY_PRINT);
//        echo "</pre>";


        return view('staff.clearance', compact('clearance', 'approvedCount', 'pendingCount', 'disapprovedCount',    'totalCount'));
    }


    public function submitted_docs()
    {
        $units = Unit::all();

        return view('staff.credentials', compact('units'));
    }

//    public function approveOrReject()
//    {
// return "hhh";
//    }

    public function approveOrReject(Request $request)
    {
        try {
            DB::beginTransaction();

            $documentId = $request->input('document_id');
            $action = $request->input('action');
            $comment = $request->input('comment', '');
            $user_id = $request->input('user_id');
            $requirements = $request->input('requirements', []);

            // Determine approval status based on action
            if ($action === "approve") {
                $approveStatus = "approved";
            } elseif ($action === "reject") {
                $approveStatus = "disapproved";
            } else {
                // Handle invalid action (though this should ideally be validated before this function is called)
                throw new \Exception('Invalid action.');
            }

            // Find the document by ID
            $document = Document::findOrFail($documentId);
            // Update document status and comment
            $document->status = $approveStatus;
            $document->comment = $comment;
            $document->save();

            // Update user requirements based on form submissions
            $unitId = $document->unit->id;

            // Reset all user requirements for this unit
            UserRequirement::where('user_id', $user_id)
                ->where('unit_id', $unitId)
                ->update(['is_met' => false]);

            // Mark requirements as met if checkbox is selected
            foreach ($requirements as $requirementId) {
                UserRequirement::updateOrCreate(
                    [
                        'user_id' => $user_id,
                        'unit_id' => $unitId,
                        'requirement_id' => $requirementId,
                    ],
                    ['is_met' => true]
                );
            }

            // Send email to the user
            $user = User::findOrFail($user_id);
            Mail::to($user->email)->send(new DocumentStatusUpdated($document, $approveStatus));

            DB::commit();

            return redirect()->route('staff_dashboard')->with('status', 'Document has been ' . $approveStatus . ' by ' . $document->unit->unit_name . '.');
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Error processing request.', 'error' => $e->getMessage()], 500);
        }
    }



//    public function approveOrReject(Request $request)
//    {
//        $documentId = $request->input('document_id');
//        $action = $request->input('action');
//        $comment = $request->input('comment', '');
//        $user_id = $request->input('user_id');
//
//        $approveStatus = "";
//
//        // Determine approval status based on action
//        if ($action === "approve") {
//            $approveStatus = "approved";
//        } elseif ($action === "reject") {
//            $approveStatus = "disapproved";
//        } else {
//            // Handle invalid action (though this should ideally be validated before this function is called)
//            return response()->json(['message' => 'Invalid action.'], 400);
//        }
//
//
//        // Find the document by ID
//        $document = Document::findOrFail($documentId);
//        // Update document status and comment
//        $document->status = $approveStatus;
//        $document->comment = $comment;
//        $document->save();
//
//        // Find the user who owns the document
//        $user = User::find($user_id);
//        // Send email to the user
//        Mail::to($user->email)->send(new DocumentStatusUpdated($document, $approveStatus));
//
//        return redirect()->route('staff_dashboard')->with('status', 'Document has been ' . $approveStatus . ' by ' . $document->unit->unit_name . '.');
//
//    }



    public function showApprovalForm($documentId)
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

            // Transform user requirements into an array with requirement_id as the key and is_met as the value
            $userRequirementsStatus = $userRequirements->pluck('is_met', 'requirement_id')->toArray();

            return view('staff.manage_approval', compact('document', 'userRequirementsStatus'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching document details.');
        }
    }










}
