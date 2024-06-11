<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Unit;
//use App\Notification\RoleAssignedNotification;
use App\Models\User;
use App\Notifications\RoleAssignedNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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
        $users = User::all();
        return view('admin.users_list', compact('users'));
    }

    public function destroy_users($id)
    {
        $unit = User::findOrFail($id);
        $unit->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function showAssignForm()
    {
        $staffs = Staff::all();
        $roles = Unit::all();

        return view('admin.manage_roles', compact('staffs', 'roles'));
    }

    public function showUnAssignForm()
    {
        $staffs = Staff::all();
        $roles = Unit::all();

        return view('admin.unassign_role', compact('staffs', 'roles'));
    }





    public function assignRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'unit_id' => 'required',
        ]);


        try {
            $staff = Staff::findOrFail($request->user_id);
            $unit = Unit::findOrFail($request->unit_id);

            // Check if the user is already assigned to this role
            $existingAssignment = DB::table('role_staff')
                ->where('user_id', $staff->user_id)
                ->where('unit_id', $unit->id)
                ->first();

//            if ($existingAssignment) {
//                return redirect()->back()->with('error', 'User has already been assigned to this role: ' . $unit->unit_name)->withInput();
//            }

            // Insert data using raw database query
            DB::table('role_staff')->insert([
                'user_id' => $staff->user_id,
                'unit_id' => $unit->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Create email context details
            $details = [
                'role' => $unit->unit_name,
                'email' => $staff->email,
                'name' => $staff->name,
                'pass_key' => $staff->password, // Replace with actual pass key logic if needed
            ];

            // Send notification
            $staff->notify(new RoleAssignedNotification($details, "Assigned"));

            return redirect()->back()->with('success', 'Role assigned successfully!');
        } catch (Exception $e) {
            Log::error('Role assignment failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to assign role: ' . $e->getMessage())->withInput();
        }

    }


        public function unassignRole(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'unit_id' => 'required|exists:units,id',
        ]);



        try {
            $staff = Staff::findOrFail($request->user_id);
            $unit = Unit::findOrFail($request->unit_id);

            // Check if the user is assigned to this role
            $existingAssignment = DB::table('role_staff')
                ->where('user_id', $staff->user_id)
                ->where('unit_id', $unit->id)
                ->first();

            if (!$existingAssignment) {
                return redirect()->back()->with('error', 'User is not assigned to this role: ' . $unit->unit_name)->withInput();
            }

            // Remove the assignment using raw database query
            DB::table('role_staff')
                ->where('user_id', $staff->user_id)
                ->where('unit_id', $unit->id)
                ->delete();


            $details = [
                'role' => $unit->unit_name,
                'email' => $staff->email,
                'name' => $staff->name,
                'pass_key' => $staff->password, // Replace with actual pass key logic if needed
            ];

            // Send notification
            $staff->notify(new RoleAssignedNotification($details, "Unassigned"));

            return redirect()->back()->with('success', 'Staff as successfully being relieved of role');
        } catch (Exception $e) {
            Log::error('Role unassignment failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to unassign role: ' . $e->getMessage())->withInput();
        }

    }










}
