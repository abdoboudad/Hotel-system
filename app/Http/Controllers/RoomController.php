<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index',compact('rooms'));
    }

     // Show the form for creating a new Room
     public function create()
     {
         $clients = Client::all();
         return view('admin.rooms.create', compact('clients'));
     }
 
     // Store a newly created Room in the database
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'client_id' => 'required|exists:clients,id',
             'room_type' => 'required|string|max:255',
             'room_num' => 'required|string|max:255',
             'total_price' => 'required',
             'first_price'=>'',
             'final_price'=>'',
             'reserved' => 'required',
             'rev_date' => 'required|date',
             'rev_ex_date' => 'required|date',
         ]);
 
         Room::create($validatedData);
 
         return redirect()->back()->with('success', 'Room created successfully.');
     }
 
     // Display the specified Room
     public function show($id)
     {
         $Room = Room::findOrFail($id);
         return view('Room.show', compact('Room'));
     }
 
     // Show the form for editing the specified Room
     public function edit($id)
     {
         $room = Room::findOrFail($id);
         $clients = Client::all();
         return view('admin.rooms.edit', compact('room', 'clients'));
     }
 
     // Update the specified Room in the database
     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'client_id' => 'required|exists:clients,id',
             'room_type' => 'required|string|max:255',
             'room_num' => 'required|string|max:255',
             'first_price'=>'',
             'final_price'=>'',
             'reserved' => 'required',
             'total_price' => 'required',             
             'rev_date' => 'required|date',
             'rev_ex_date' => 'required|date',
         ]);
 
         Room::whereId($id)->update($validatedData);
 
         return redirect()->back()->with('success', 'Room updated successfully.');
     }
 
     // Remove the specified Room from the database
     public function destroy($id)
     {
         $Room = Room::findOrFail($id);
         $Room->delete();
 
         return redirect()->back()->with('success', 'Room deleted successfully.');
     }
}
