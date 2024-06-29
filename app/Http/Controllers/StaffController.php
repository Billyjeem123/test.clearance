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
//         ECHO "</pre>";


        return view('staff.index', compact('clearance', 'approvedCount', 'pendingCount', 'disapprovedCount',    'totalCount'));
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
//        $document = Document::with('user')->findOrFail($documentId);
        $document = Document::with(['user', 'unit.requirements'])
            ->findOrFail($documentId);

//        echo "<pre>";
//         echo json_encode($document, JSON_PRETTY_PRINT);
//         echo "</pre>";
        return view('staff.manage_approval', compact('document'));
    }


    public function saveRequirements(Request $request)
    {
        $userId = Auth::id();
        $unitId = $request->input('unit_id');
        $metRequirements = $request->input('requirements', []);

        // Delete existing entries for this user and unit
        DB::table('user_requirements')->where('user_id', $userId)->where('unit_id', $unitId)->delete();

        // Insert new entries for the met requirements
        foreach ($metRequirements as $requirementId) {
            DB::table('user_requirements')->insert([
                'user_id' => $userId,
                'unit_id' => $unitId,
                'requirement_id' => $requirementId,
                'is_met' => true
            ]);
        }

        return redirect()->back()->with('success', 'Requirements updated successfully!');
    }








}
