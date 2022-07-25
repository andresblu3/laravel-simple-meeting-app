<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meeting;

class DashboardConroller extends Controller
{
    //
    public function dashboard(Request $request)
    {
        if($request->filled('search')){
            $meetings = Meeting::search($request->search)->paginate();
        }else{
            $meetings = Meeting::latest()->paginate();
        }
          

        return view('dashboard', compact('meetings')); 
    }
}
