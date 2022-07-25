<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Foundation\Mix;
use Illuminate\Http\Request;

class MeetingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Meeting $meeting)
    {
        return view('newmeeting', ['meeting' => $meeting]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validating the request. */
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'url' => 'required|url|max:255',
        ]);

        /* Creating a new meeting and saving it to the database. */
        $meeting = new Meeting;
        $meeting->title = $request->title;
        $meeting->description = $request->description;
        $meeting->start_date = $request->start_date;
        $meeting->end_date = $request->end_date;
        $meeting->url = $request->url;
        $meeting->save();

        $request->session()->flash('success', 'Reunion creada correctamente');

        return redirect()->route('meetings.show', ['meeting' => $meeting]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        return view('show-meeting', ['meeting' => $meeting]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        return view('edit-meeting', ['meeting' => $meeting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'start_date' => 'required',
            'end_date' => 'required',
            'url' => 'required|url|max:255',
        ]);


        $meeting->title = $request->title;
        $meeting->description = $request->description;
        $meeting->start_date = $request->start_date;
        $meeting->end_date = $request->end_date;
        $meeting->url = $request->url;
        $meeting->save();

        $request->session()->flash('success', 'Reunion actualizada correctamente');

        return redirect()->route('meetings.show', ['meeting' => $meeting]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $title = $meeting->title;
        $meeting->delete();

        return redirect('/dashboard')->with('success', "La reunion '" . $title . "' ha sido eliminada");
    }

    //Guest 
    public function add_guest(Request $request, Meeting $meeting)
    {
        /* This is checking if the request has a guest. If it does, it will create a new guest and
        redirect to the add_guest route. */
        if ($request->filled('guest')) {
            $meeting->guests()->create(['name' => $request->guest]);
            $request->session()->flash('success', 'El Invitado se agrego correctamente');
            return redirect()->route('add_guest', ['meeting' => $meeting]);
        }
        return view('new-guest', ['meeting' => $meeting]);
    }

    public function destroy_guest(Request $request, Meeting $meeting, $guest)
    {
        /* Deleting the guest from the database. */
        $meeting->guests()->find($guest)->delete();
        return redirect()->route('add_guest', ['meeting' => $meeting]);
    }

    //Files

    public function add_file(Request $request, Meeting $meeting)
    {
        return view('new-file', ['meeting' => $meeting]);
    }

    public function save_file(Request $request, Meeting $meeting)
    {
       /* Validating the request. */
        $request->validate([
            'file' => 'required|file|max:10000',
        ]);
        /* This is saving the file to the filesystem and then saving the path to the database. */
        $file = $request->file('file');
        $file_name = time() . $file->getClientOriginalName();
        $file->move(public_path('files'), $file_name);
        $meeting->files()->create(['path' => $file_name]);
        $request->session()->flash('success', 'El archivo se agrego correctamente');
        return redirect()->route('add_file', ['meeting' => $meeting]);
    }

    public function delete_file(Request $request, Meeting $meeting, $file)
    {
        
        /* Checking if the file exists and if it does, it will delete it. */
        $file_path = public_path('files/' . $meeting->files()->find($file)->path);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        
        $meeting->files()->find($file)->delete();

        $request->session()->flash('success', 'El archivo se elimino correctamente');
        return redirect()->route('add_file', ['meeting' => $meeting]);
    }
}
