<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class AnnouncementController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'inputTitle' => 'required|string|max:100',
            'inputAvailableDate' => 'required|date_format:Y-m-d',
            // 'inputAvailableTime' => 'required|date_format:H:i:s',
            'inputEndDate' => 'required|date_format:Y-m-d|after:inputAvailableDate',
            // 'inputEndTime' => 'required|date_format:H:i:s',
            // 'createUser' => 'required|string|max:255',
        ]);

        try {
        $username = Session::get('username');
        $announcement = new Announcement;
        $announcement->anncsTitle = $request->input('inputTitle');
        $announcement->availableDateTime = $request->input('inputAvailableDate') . ' ' . $request->input('inputAvailableTime');
        $announcement->endDateTime = $request->input('inputEndDate') . ' ' . $request->input('inputEndTime');
        $announcement->anncsBody = $request->input('inputBody');
        $announcement->createUser = $username;
        $announcement->save();
        return redirect()->route('announcements.table')->with('success', 'Data saved successfully.');

    } catch (\Exception $e) {
        // Captura cualquier excepción que ocurra
        Log::error($e); // Registra el error en los logs

        // Redirige hacia atrás con un mensaje de error
        return redirect()->route('announcements.table')->with('error', 'There was an error saving the record. Please try again.');
    }
    }


    public function table()
    {
        $announcements = Announcement::all();
        return view('announcements.table', compact('announcements'));
    }

    public function list()
    {

        $currentDate = Carbon::now();

        $announcements = Announcement::where('availableDateTime', '<=', $currentDate)
            ->where('endDateTime', '>=', $currentDate)
            ->get();
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


        // Get user information for update
        public function editAnnouncement(Request $request)
        {
    
            $anncsID = $request->input('anncsID');
    
            $announcement = Announcement::where('anncsID', $anncsID)->first();
    
            if (!$announcement) {
                return redirect()->route('announcements.table')->with('error', 'User not found.');
            }
    
            return view('announcements.edit', compact('announcement'));
        }

        // Update announcement information
        public function updateAnnouncement(Request $request)
        {
            // $request->validate([
            //     'name' => 'required|string|max:255',
            //     'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            //     'shipping_line' => 'required|string|max:255',
            //     'type' => 'required|integer',
            //     'note' => 'nullable|string|max:255',
            // ]);
    
            try {
                $anncsID = $request->input('inputId');
                $announcement = Announcement::where('anncsID', $anncsID)->first();
    
                if ($announcement) {
                    $announcement->anncsTitle = $request->input('inputTitle');
                    $announcement->availableDateTime = $request->input('inputAvailableDate') . ' ' . $request->input('inputAvailableTime');
                    $announcement->endDateTime = $request->input('inputEndDate') . ' ' . $request->input('inputEndTime');
                    $announcement->anncsBody = $request->input('inputBody');
                    $announcement->save();
    
                    return redirect()->route('announcements.table')->with('success', 'Announcement updated successfully.');
                } else {
                    return redirect()->route('announcements.table')->with('error', 'Announcement not found.');
                }
            } catch (\Exception $e) {
                Log::error($e); // Log the error
                return redirect()->route('announcements.table')->with('error', 'There was an error updating the announcement. Please try again.');
            }
        }


    public function delete(Request $request)
    {
        $request->validate([
            'anncsID' => 'required|integer|exists:announcements,anncsID',
        ]);

        try {
            $announcement = Announcement::where('anncsID', $request->input('anncsID'))->first();

            if ($announcement) {
                $announcement->delete();
                return redirect()->route('announcements.table')->with('success', 'Announcement deleted successfully.');
            } else {
                return redirect()->route('announcements.table')->with('error', 'Announcement not found.');
            }
        } catch (\Exception $e) {
            return redirect()->route('announcements.table')->with('error', 'There was an error deleting the announcement. Please try again.');
        }
    }


}
