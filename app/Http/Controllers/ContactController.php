<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;
use SimpleXMLElement;
use Redirect;

class ContactController extends Controller
{
    public function welcome()
{
    $contacts = Contact::all(); 
    return view('welcome', compact('contacts'));
}

public function import()   {
    return view('import');
}
   
public function create()   {
    return view('create');
}


    public function importXML(Request $request)
    {
    
        $request->validate([
            'xml_file' => 'required',
        ]);

        try {
            $xml = simplexml_load_file($request->file('xml_file')->getRealPath());

            
            foreach ($xml->contact as $contact) {
            
        
                Contact::create([
                    'name'  => (string) $contact->name,
                    'phone' => (string) $contact->phone,
                ]);
            }

            return Redirect::back();

        } catch (\Exception $e) {
            return Redirect::back();
        }
    }

    public function edit($id){
        $contact = Contact::find($id);
        return view('edit', compact('contact'));
    }

    public function update(Request $request, $id){
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->save();
        return Redirect::route('welcome');
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return Redirect::back();
    } 
}
