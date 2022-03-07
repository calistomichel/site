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
     * Show the form for creating a new resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function create(Site $site)
    {
        return Inertia::render('Publication/Create', ['site' => $site]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \MichelCalisto\Site\Http\Requests\StorePublication $request
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function store(StorePublication $request, Site $site)
    {
        $data = Publication::create([
            'site_id' => $site->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return Redirect::route('sites.show', $site);
    }

    /**
     * Display the specified resource.
     *
     * @param  \MichelCalisto\Site\Publication  $publication
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication, Site $site)
    {
        return Inertia::render('Publication/Show', ['publication' => $publication, 'site' => $site]);
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
