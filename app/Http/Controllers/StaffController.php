<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//
//         echo "<pre>";
//         echo json_encode($clearance, JSON_PRETTY_PRINT);
//         ECHO "</pre>";


        return view('staff.index', compact( 'clearance'));
    }



     public function  submitted_docs()
     {
         $units= Unit::all();

         return view('staff.credentials', compact('units'));
            }

    public function approveOrReject(Request $request)
    {
        $documentId = $request->input('document_id');
        $action = $request->input('action');
        $comment = $request->input('comment');

        $document = Document::findOrFail($documentId);
        $document->status = $action;
        $document->comment = $comment;
        $document->save();

        return response()->json(['message' => 'Document has been ' . $action . 'd.']);
    }



    public function showApprovalForm($documentId)
    {
        $document = Document::with('user')->findOrFail($documentId);
        return view('staff.manage_approval', compact('document'));
    }

    public function approveRejectDocument(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:documents,id',
            'comment' => 'required|string',
            'action' => 'required|string|in:approve,reject',
        ]);

        $document = Document::findOrFail($request->document_id);
        // Process approval/rejection logic here (e.g., update status in database)

        return redirect()->route('staff_dashboard')->with('status', 'Document has been ' . $request->action . 'd.');
    }

}
