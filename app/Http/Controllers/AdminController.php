<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index(){

         return view('admin.index');
     }


    public function show_unit(){

        return view('admin.show_unit');
    }




    public function create_unit(Request $request)
    {
        // Validate the request data
        $request->validate([
            'unit_name' => 'required|string|max:255',
        ]);

        // Create a new unit
        Unit::create([
            'unit_name' => $request->unit_name,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Unit created successfully!');
    }

    public function show_all_units()
    {
        $units = Unit::all();
        return view('admin.unit_list', compact('units'));
    }

    public function destroy_unit($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->back()->with('success', 'Unit deleted successfully');
    }




}
