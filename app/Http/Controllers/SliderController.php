<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->khc_model->slider)
        {
            abort(403);
        }
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->permission->create_slider)
        {
            abort(403);
        }
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        if($request->has('image'))
        {
            $filename = date('Y-m-d') . "-" . rand(1000,100000) . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('slider', $filename , 'public');
        }

        Slider::create([
            'user_id'       => auth()->user()->id,
            'title'         => $request->title,
            'image'         => $filename,
            'description'   => $request->description,
        ]);

        return redirect()->route('slider.index')->with('success','Slider added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        if(!auth()->user()->permission->view_slider)
        {
            abort(403);
        }
        return view('admin.slider.view',compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        if(!auth()->user()->permission->edit_slider)
        {
            abort(403);
        }
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        if($request->has('image'))
        {
            Storage::delete('public/slider/' . $slider->image);
            $filename = date('Y-m-d') . "-" . rand(10000,100000) . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('slider', $filename,'public');
        }

        $slider->update([
            'title' => $request->title,
            'image' => $filename ?? $slider->image,
            'description' => $request->description,
        ]);

        return redirect()->route('slider.index')->with('success','Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if(!auth()->user()->permission->delete_slider)
        {
            abort(403);
        }

        $slider->delete();
        Storage::delete('public/slider/'. $slider->image);

        return redirect()->back()->with('danger','Slider deleted successfully');
    }
}
