<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configuration\RequestUpdate;
use App\Models\Configuration;
use App\Services\UploadImageService;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $configuration = Configuration::whereNotNull('logo')->first();
        return view('admin.configuration.index', [
            'configuration' => $configuration
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     */
    public function update(
        RequestUpdate $request,
        Configuration $configuration,
        UploadImageService $uploadImageService
    )
    {
        $validated = $request->validated();

        $uploadImageService->validateImageUploadedAndDelete($configuration->logo);

        $path = $uploadImageService->uploadImage($request, 'logo');

        if ($path) {
            $validated['logo'] = $path;
        }

        $configuration->update($validated);

        return back();
    }
}
