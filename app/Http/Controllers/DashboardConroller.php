<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class DashboardConroller extends Controller
{
    public function dashboard(Request $request)
    {
        /* If the search field is filled, then search for the meeting. If not, then just display the
        latest meetings. */
        if($request->filled('search')){
            $meetings = Meeting::search($request->search)->paginate();
        }else{
            $meetings = Meeting::latest()->paginate();
        }         

        return view('dashboard', compact('meetings')); 
    }
}
