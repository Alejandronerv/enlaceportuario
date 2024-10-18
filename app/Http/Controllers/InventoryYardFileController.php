<?php

namespace App\Http\Controllers;
use App\Models\InventoryYardFile;
use Illuminate\Http\Request;
//use Illuminate\Validation\Validator;




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

            $inventory_yard_file = new InventoryYardFile();
            $inventory_yard_file->file_name = $fileName;
            $inventory_yard_file->agency_code = $request->input('shipagency');
            $inventory_yard_file->create_user = 'test@email.com';
            $inventory_yard_file->save();

            return redirect()->route('yardinventory.table')->with('success', 'Data saved successfully.');
        }

         //return redirect()->route('yardinventory.form')->with('error', 'File upload failed.');
    }

    public function table()
    {
        $inventoryyardfile = InventoryYardFile::all();
        return view('yardinventory.table', compact('inventoryyardfile'));
    }
}
