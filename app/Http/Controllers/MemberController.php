<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MaritalStatus;
use Illuminate\Http\Request;
use DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    $members = Member::all();
    // Count total members
    $totalMembers = $members->count();
    // Count attended members
    $attendedMembers = $members->where('attend', 1)->count();
    $notAttendedMembers = $totalMembers - $attendedMembers;
    $marital_data = MaritalStatus::all();

    $maritalStatuses = Member::select('marital_status', DB::raw('count(*) as count'))
                           ->groupBy('marital_status')
                           ->get();

    return view('welcome', compact('totalMembers', 'attendedMembers', 'notAttendedMembers','maritalStatuses','marital_data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::all();
        $maritalStatuses = MaritalStatus::all();

        return view('attendance', compact('members','maritalStatuses'));
    }

    public function register()
    {
        $maritalStatuses = MaritalStatus::all();
        return view('register', compact('maritalStatuses'));
    }

    public function updateAttendance(Request $request, $id)
    {
     
        $member = Member::findOrFail($id);
        $marital_status = $request->marital_status;
        $phone_number = $request->phone_number;
        if($phone_number){
            $member->phone_number = $phone_number;
        }
        if($marital_status){
            $member->marital_status = $marital_status;
        }

        $member->attend = 1;
        $member->save();

        return redirect()->route('attendance.create')->with('success', 'Member details updated successfully.');


    }

    public function registerMember(Request $request)
    {
        // Validation
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'marital_status' => 'required|string|max:255',
        ]);

        // Create a new member
        $member = new Member();
        $member->firstname = $request->firstname;
        $member->lastname = $request->lastname;
        $member->phone_number = $request->phone_number;
        $member->marital_status = $request->marital_status;
        $member->attend = 1; // Automatically mark as attended
        $member->save();

        return redirect()->route('attendance.create')->with('success', 'Member registered successfully.');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
