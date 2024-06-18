<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function staff_dashboard()
    {
        $unit = Unit::all();

        $user = auth()->user();
        $staff = $user->staff;

        #  Get the units associated with the staff
        $units = $staff->roles;

        echo json_encode($units);

        $clearance = Unit::with(['documents' => function ($query) {
            $query->where('unit_id', Auth::id());
        }]);


        return view('staff.index', compact('unit', 'clearance'));
    }



     public function  submitted_docs()
     {
         $units= Unit::all();

         return view('staff.credentials', compact('units'));
            }
            }
