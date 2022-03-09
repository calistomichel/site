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
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Publication $publication)
    {
        return Inertia::render('Publication/Show', ['site' => $site, 'publication' => $publication]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Publication $publication)
    {
        return Inertia::render('Publication/Edit', ['site' => $site, 'publication' => $publication]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site, Publication $publication)
    {
        $request->validate([
            'title' => 'required|unique:publications,title,'.$publication->id.'|min:3|max:100',
            'content' => 'required|min:3|max:300',
        ]);

        $publication->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return Redirect::route('sites.show', $site);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Publication $publication)
    {
        $publication->delete();
        return Redirect::route('sites.show', $site);
    }
}
