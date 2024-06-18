<?php

namespace App\Http\Controllers;

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

         echo "<pre>";
         echo json_encode($clearance, JSON_PRETTY_PRINT);
         ECHO "</pre>";


        return view('staff.index', compact( 'clearance'));
    }



     public function  submitted_docs()
     {
         $units= Unit::all();

         return view('staff.credentials', compact('units'));
            }
            }
