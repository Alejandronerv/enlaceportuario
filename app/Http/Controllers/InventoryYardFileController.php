<?php

namespace App\Http\Controllers;

use App\Models\InventoryYardFile;
use Illuminate\Http\Request;
//use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;



class InventoryYardFileController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'file_name' => 'required'
            //Other validation rules...
        ]);
        // $path = $request->file('file_name')->store('public/uploads');

        // Handle the file upload
        if ($request->hasFile('file_name')) {

            $file = $request->file('file_name');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $username = Session::get('username');

            try {
                $inventory_yard_file = new InventoryYardFile();
                $inventory_yard_file->file_name = $fileName;
                $inventory_yard_file->agency_code = $request->input('shipagency');
                $inventory_yard_file->file_type = $request->input('filetype');
                $inventory_yard_file->create_user = $username;
                $inventory_yard_file->save();

                return redirect()->route('yardinventory.table')->with('success', 'Data saved successfully.');
            } catch (\Exception $e) {
                // Captura cualquier excepción que ocurra
                Log::error($e); // Registra el error en los logs

                // Redirige hacia atrás con un mensaje de error
                return redirect()->route('yardinventory.table')->with('error', 'There was an error uploading the file. Please try again.');
            }
        }
    }
    public function table()
    {
        $inventoryyardfile = InventoryYardFile::all();
        return view('yardinventory.table', compact('inventoryyardfile'));
    }

    public function list()
    {
        $inventoryfiles = InventoryYardFile::all();
        return view('yardinventory.list', compact('inventoryfiles'));
    }

    public function listInventoryYard()
    {
        // $listinventoryyardfiles = InventoryYardFile::all();
        
        $agencyCode = Session::get('shipping_line');

        $listinventoryyardfiles = InventoryYardFile::where('file_type', 'IY')
        ->where('agency_code', $agencyCode)
        ->get();
        return view('yardinventory.list-inventory-yard', compact('listinventoryyardfiles'));
    }

    public function listDensityForecast()
    {
        // $listinventoryyardfiles = InventoryYardFile::all();
        
        $agencyCode = Session::get('shipping_line');

        $listdensityforecastfiles = InventoryYardFile::where('file_type', 'DF')
        ->where('agency_code', $agencyCode)
        ->get();
        return view('yardinventory.list-density-forecast', compact('listdensityforecastfiles'));
    }
    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:inventory_yard_files,id',
        ]);

        try {
            $inventoryYardFile = InventoryYardFile::find($request->input('id'));

            if ($inventoryYardFile) {
                $inventoryYardFile->delete();
                return redirect()->route('yardinventory.table')->with('success', 'Record deleted successfully.');
            } else {
                return redirect()->route('yardinventory.table')->with('error', 'Record not found.');
            }
        } catch (\Exception $e) {
            Log::error($e); // Log the error
            return redirect()->route('yardinventory.table')->with('error', 'There was an error deleting the record. Please try again.');
        }
    }
    
}
