<?php

namespace MichelCalisto\Site\Http\Controllers;

use MichelCalisto\Site\Slider;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use MichelCalisto\Site\Http\Requests\StoreSlider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Slider::all();
        $total = Slider::count();
        return Inertia::render('Slider/Index', ['items' => $items, 'total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total = Slider::count();

        if ($total < 5) {
            return Inertia::render('SLider/Create');
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \MichelCalisto\Site\Http\Requests\StoreSite $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlider $request)
    {
        $image_path = '';

        if ($request->hasFile('slider')) {
            $image_path = $request->file('slider')->store('sliders', 'public');
        }

        $data = SLider::create([
            'name' => $request->name,
            'path' => $image_path,
        ]);

        return Redirect::route('sliders.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return Inertia::render('Slider/Edit', ['item' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sliser $slider)
    {
        $image_path = '';
        
        if ($request->hasFile('slider')) {
            $request->validate([
                'name' => 'required|unique:sliders,name,'.$slider->id.'|min:3|max:50',
                'slider' => 'required|slider|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            if(Storage::exists('public/'.$slider->path)){
                Storage::delete('public/'.$slider->path);
            }

            $image_path = $request->file('slider')->store('sliders', 'public');
            
            $slider->update([
                'name' => $request->name,
                'path' => $image_path,
            ]);
        } else {
            $request->validate([
                'name' => 'required|unique:sliders,name,'.$slider->id.'|min:3|max:50',
            ]);

            $slider->update([
                'name' => $request->name,
            ]);
        }

        return Redirect::route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \MichelCalisto\Site\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(Storage::exists('public/'.$slider->path)){
            Storage::delete('public/'.$slider->path);
            $slider->delete();
            return Redirect::route('sliders.index');
        }
    }
}
