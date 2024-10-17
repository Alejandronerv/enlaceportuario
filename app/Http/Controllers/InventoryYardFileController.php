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
          //'file_name' => 'required|file_name|mimes:csv,txt,xlsx|max:2048',
            // Other validation rules...
        ]);

    //     // Handle the file upload
    //    // if ($request->hasFile('file')) {
             $file = $request->file('file_name');
             $fileName = time() . '_' . $file->getClientOriginalName();
             $filePath = $file->storeAs('uploads', $fileName, 'public');

            $inventory_yard_file = new InventoryYardFile();
            $inventory_yard_file->file_name = $request->input('file_name'); 
            $inventory_yard_file->file_path = '/storage/' . $filePath;
            $inventory_yard_file->agency_code = $request->input('shipagency');
            $inventory_yard_file->create_user = 'test@email.com';
            $inventory_yard_file->save();

            return redirect()->route('yardinventory.form')->with('success', 'Data saved successfully.');
        //}

         //return redirect()->route('yardinventory.form')->with('error', 'File upload failed.');
    }
}
