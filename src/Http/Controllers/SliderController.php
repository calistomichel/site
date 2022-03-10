<?php

namespace MichelCalisto\Site\Http\Controllers;

use MichelCalisto\Site\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use MichelCalisto\Site\Http\Requests\StoreSlider;
use MichelCalisto\Site\Site;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function create(Site $site)
    {
        return Inertia::render('Slider/Create', ['site' => $site]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \MichelCalisto\Site\Http\Requests\StoreSite $request
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlider $request, Site $site)
    {
        $image_path = '';

        if ($request->hasFile('image_file')) {
            $image_path = $request->file('image_file')->store('sliders', 'public');
        }

        $data = Slider::create([
            'site_id' => $site->id,
            'name' => $request->name,
            'path' => $image_path,
        ]);

        return Redirect::route('sites.show', $site);
    }

    /**
     * Display the specified resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Site $site, Slider $slider)
    {
        return Inertia::render('Slider/Show', ['site' => $site, 'slider' => $slider]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Site $site, Slider $slider)
    {
        return Inertia::render('Slider/Edit', ['site' => $site, 'slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Site $site, Slider $slider)
    {
        $image_path = '';
        
        if ($request->hasFile('image_file')) {
            $request->validate([
                'name' => 'required|min:3|max:50',
                'image_file' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            if(Storage::exists('public/'.$slider->path)){
                Storage::delete('public/'.$slider->path);
            }

            $image_path = $request->file('image_file')->store('sliders', 'public');
            
            $slider->update([
                'name' => $request->name,
                'path' => $image_path,
            ]);
        } else {
            $request->validate([
                'name' => 'required|min:3|max:50',
            ]);

            $slider->update([
                'name' => $request->name,
            ]);
        }

        return Redirect::route('sites.show', $site);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @param  \MichelCalisto\Site\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Site $site, Slider $slider)
    {
        if(Storage::exists('public/'.$slider->path)){
            Storage::delete('public/'.$slider->path);
            $slider->delete();
            return Redirect::route('sites.show', $site);
        }
    }
}
