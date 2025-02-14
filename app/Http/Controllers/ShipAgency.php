<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipAgency as ShipAgencyModel;

class ShipAgency extends Controller
{
    public function create()
    {
        return view('shipagency.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:ship_agency_codes',
        ]);

        $shipAgency = new ShipAgencyModel();
        $shipAgency->name = $request->input('name');
        $shipAgency->code = $request->input('code');
        $shipAgency->save();

        return redirect()->route('shipagency.table')->with('success', 'Ship Agency created successfully.');
    }

    public function listBox()
    {
        $shipAgencies = ShipAgencyModel::all();
        return view('components.listboxShipAgendyCodes', compact('shipAgencies'));
    }
    public function listBoxMain()
    {
        $shipAgenciesMains = ShipAgencyModel::all();
        return view('shipagency.table', compact('shipAgenciesMains'));
    }
}
