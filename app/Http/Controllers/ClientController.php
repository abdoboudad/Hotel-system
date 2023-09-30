<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index',compact('clients'));
    }
    // Show the form for creating a new client
    public function create()
    {
        return view('admin.clients.create');
    }

    // Store a newly created client in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:20',
            'card_type' => 'required|string',
            'card_number' => 'required|string|max:255',
        ]);

        Client::create($validatedData);

        return redirect()->back()->with('success', 'Client created successfully.');
    }

    // Display the specified client
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.show', compact('client'));
    }

    // Show the form for editing the specified client
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('admin.clients.edit', compact('client'));
    }

    // Update the specified client in the database
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $id,
            'phone' => 'required|string|max:20',
            'card_type' => 'required|string',
            'card_number' => 'required|string|max:255',
        ]);

        Client::whereId($id)->update($validatedData);

        return redirect()->back()->with('success', 'Client updated successfully.');
    }

    // Remove the specified client from the database
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->back()->with('success', 'Client deleted successfully.');
    }
}
