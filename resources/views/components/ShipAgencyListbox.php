<?php

// namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\ShipAgency as ShipAgencyModel;

class ShipAgencyListbox extends Component
{
    public $shipAgencies;

    public function __construct()
    {
        // Fetch all ship agencies from the database
        $this->shipAgencies = ShipAgencyModel::all();
    }

    public function render()
    {
        return view('components.ship-agency-list-box');
    }
}
