<?php

namespace MichelCalisto\Site\Http\Controllers;

use MichelCalisto\Site\Site;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use MichelCalisto\Site\Http\Requests\StoreSite;
use MichelCalisto\Site\Slider;
use MichelCalisto\Site\Publication;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::all();
        $total = Site::count();
        return Inertia::render('Site/Index', ['sites' => $sites, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Site/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \MichelCalisto\Site\Http\Requests\StoreSite $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSite $request)
    {
        $data = Site::create([
            'dns' => $request->dns
        ]);

        return Redirect::route('sites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site)
    {
        $sliders = Site::find($site->id)->sliders;
        $publications = Site::find($site->id)->publications;
        return Inertia::render('Site/Show', ['site' => $site, 'sliders' => $sliders, 'publications' => $publications]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return Inertia::render('Site/Edit', ['site' => $site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site)
    {
        $request->validate([
            'dns' => 'required|unique:sites,dns,'.$site->id.'|min:3|max:50',
        ]);

        $site->update([
            'dns' => $request->dns,
        ]);

        return Redirect::route('sites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site)
    {
        $site->delete();
        return Redirect::route('sites.index');
    }
}
