<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Support\Str;
use App\Http\Requests\StorePlatformRequest;
use App\Http\Requests\UpdatePlatformRequest;

class PlatformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all platforms from the database and return to view
        $platforms = Platform::paginate(20);
        return view('platforms.index', ['platforms' => $platforms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('platforms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlatformRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlatformRequest $request)
    {
        //check the input
        $this->validate($request, [
            'platform' => 'required'
        ]);

        $get_platform = Platform::where('name', '=', $request->input('platform'))->first();

        if ($get_platform) {
            return redirect()->route('platforms.create')->with('error', 'Platform ' . $request->input('platform') . ' is already in the database.');
        }
        if (!$get_platform) {
            $platform = new Platform();
            $platform->name = $request->input('platform');
            if (Str::startsWith($request->input('url'), 'https://') || Str::startsWith($request->input('url'), 'http://')) {
                    $platform->url = $request->input('url');
            } else {
                    $platform->url = "https://" . $request->input('url');
            }
            $platform->save(); //persist the data
            return redirect()->route('platforms.create')->with('info', 'Platform ' . $request->input('platform') . ' added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function show(Platform $platform)
    {
        //Return view to detail label
        $platform = Platform::find($platform->id);

        return view('platforms.details', ['platform' => $platform]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function edit(Platform $platform)
    {
        //Find the label
        $platform = Platform::where('id', '=', $platform->id)->first();

        if (empty($platform)) {
            return redirect()->route('platforms.index')->with('error', 'Invalid Platform');
        } else {
            return view('platforms.edit', ['platform' => $platform]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlatformRequest  $request
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlatformRequest $request, Platform $platform)
    {
        //check the input
        $this->validate($request, [
            'platform' => 'required'
        ]);
        // Ermitteln ob Artist vorhanden ist oder geändert worden ist
        $get_platform = Platform::firstOrCreate([
            'name' => $request->platform
        ]);
        $platform->id = $get_platform->id;
        $platform->name = $request->platform;
        $platform->url = $request->url;

        $platform->save();

        return redirect()->route('platforms.index')->with('info', 'Platform ' . $platform->name . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Platform  $platform
     * @return \Illuminate\Http\Response
     */
    public function destroy(Platform $platform)
    {
        //
    }
}
