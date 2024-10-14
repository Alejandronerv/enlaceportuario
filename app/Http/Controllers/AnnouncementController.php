<?php

namespace App\Http\Controllers;
use App\Models\Announcement;
use Illuminate\Http\Request;



class AnnouncementController extends Controller
{
    public function save(Request $request)
    {
     $request->validate([
           'inputTitle' => 'required|string|max:100',
    //     'availableDateTime' => 'required|date',
    //     'endDateTime' => 'required|date',
    //     'createUser' => 'required|date',
    //     'created_at' => 'required|date',
     ]);

    $announcement = new Announcement;
    $announcement->anncsTitle = $request->input('inputTitle');
    $announcement->availableDateTime = $request->input('inputAvailableDate') . ' ' . $request->input('inputAvailableTime');
    $announcement->endDateTime = $request->input('inputEndDate'). ' ' . $request->input('inputEndTime');
    $announcement->anncsBody = $request->input('inputBody');
    $announcement->createUser = 'test@email.com';
    $announcement->save();

    return redirect()->route('announcements.table')->with('success', 'Data saved successfully.');
}


    public function table()
    {
        $announcements = Announcement::all();
        return view('announcements.table', compact('announcements'));
    }

    public function list()
    {
        $announcements = Announcement::all();
        return view('dashboard', compact('announcements'));
    }
    
    public function show(Request $request)
    {
        $request->validate([
            'anncsID' => 'required|integer|exists:announcements,anncsID',
        ]);

        $announcement = Announcement::where('anncsID', $request->input('anncsID'))->first();

        if (!$announcement) {
            return redirect()->route('announcements.table')->with('error', 'Announcement not found.');
        }

        return view('announcements.post', compact('announcement'));
    }



}
