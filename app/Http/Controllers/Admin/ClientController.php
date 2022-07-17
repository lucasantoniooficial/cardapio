<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\RequestUpdate;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $clients = Client::paginate(10);

        return view('admin.client.index', ['clients' => $clients]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit(Client $client)
    {
        return view('admin.client.edit', ['client' => $client->load('address')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(RequestUpdate $request, Client $client)
    {
        $data = $request->validated();

        $client->update($data);
        $client->address->update($data['address']);

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     */
    public function destroy(Client $client)
    {
        $client->delete();

         return back();
    }
}
