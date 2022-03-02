<?php

namespace MichelCalisto\Site\Http\Controllers;

use MichelCalisto\Site\Publication;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use MichelCalisto\Site\Http\Requests\StorePublication;
use MichelCalisto\Site\Site;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Site::all();
        $total = Site::count();
        return Inertia::render('Site/Index', ['items' => $items, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Site $site)
    {
        return Inertia::render('Publication/Create', ['site' => $site]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \MichelCalisto\Site\Http\Requests\StoreSite $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublication $request, Site $site)
    {
        $data = Publication::create([
            'site_id' => $site->id,
            'title' => $request->title,
            'content' => $request->content,
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
        return Inertia::render('Site/Show', ['item' => $site, 'sliders' => $sliders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site)
    {
        return Inertia::render('Site/Edit', ['item' => $site]);
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
