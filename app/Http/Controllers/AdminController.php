<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function create_users(Request $request)
    {
        return view('admin.create_users');
    }



    public function save_users(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'staff_name' => 'required|string|max:255',
            'staff_email' => 'required|email',
        ]);

        // Check if the email already exists in the users table
        if (User::where('email', $request->staff_email)->exists()) {
            return redirect()->back()->with('error', 'Email already exists.');
        }

        $generatePasswordNumber = $this->generatePasswordNumber($request->staff_name);

        // Create a new user for the staff
        $user = User::create([
            'name' => $request->staff_name,
            'email' => $request->staff_email,
            'password' => Hash::make($generatePasswordNumber), // Set a default password, you may want to prompt for this or generate it
        ]);

        // Create the staff record and link it to the user
        $staff = Staff::create([
            'name' => $request->staff_name,
            'email' => $request->staff_email,
            'user_id' => $user->id,
            'password' => $generatePasswordNumber
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Staff created successfully.');
    }

    private function generatePasswordNumber($firstName): string
    {
        $firstThreeLetters = strtoupper(substr($firstName, 0, 3));
        $dayOfRegistration = Carbon::now()->format('d');
        $randomDigits = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
        return "FUO/{$dayOfRegistration}/{$randomDigits}";
    }

    public function show_all_users()
    {
        $units = Unit::all();
        return view('admin.unit_list', compact('units'));
    }

    public function destroy_users($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->back()->with('success', 'Unit deleted successfully');
    }








}
