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

    public function latestRecord()
    {
        // $latestRecord = InventoryYardFile::orderBy('created_at', 'desc')->first();
        $latestRecord = InventoryYardFile::where('file_type', 'IY')->orderBy('created_at', 'desc')->first();
        // Assign the file_name to a variable and store it in the session

        $archivo = $latestRecord->file_name;
        Session::put('archivo', $archivo);

        return view('yardinventory.latest', compact('archivo'));
    }

    public function latestRecordDF()
    {
        // $latestRecord = InventoryYardFile::orderBy('created_at', 'desc')->first();
        $latestRecord = InventoryYardFile::where('file_type', 'DF')->orderBy('created_at', 'desc')->first();
        // Assign the file_name to a variable and store it in the session

        $archivodf = $latestRecord->file_name;
        Session::put('archivodf', $archivodf);

        return view('yardinventory.forecast', compact('archivodf'));
    }

}
