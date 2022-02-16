<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(!auth()->user()->khc_model->ads)
        {
            abort(403);
        }
        if(Auth::user()->is_admin)
        {
            $ads = Advertisement::all();
        }
        else{
            $ads = Advertisement::where('user_id',auth()->user()->id)->get();
        }
        return view('admin.ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->permission->create_ads)
        {
            abort(403);
        }
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdvertisementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdvertisementRequest $request)
    {   
        // dd($request->photo);

        if($request->has('photo'))
        {
            $filename = date('Y-m-d') . "-" . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('ads', $filename,'public');
        }
        Advertisement::create([
            'user_id'   => auth()->user()->id,
            'title'     => $request->title,
            'ads_photo' => $filename,
            'website_link' => $request->link,
            'expire_at'  => $request->expire_at,
        ]);
        return redirect()->route('ads.index')->with('success','Ads added successfull.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $ad)
    {
        if(!auth()->user()->permission->view_ads)
        {
            abort(403);
        }
        return view('admin.ads.view',compact('ad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $ad)
    {
        if(!auth()->user()->permission->edit_ads)
        {
            abort(403);
        }
        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdvertisementRequest  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdvertisementRequest $request, Advertisement $ad)
    {
        if($request->has('photo'))
        {
            Storage::delete('public/ads/' . $ad->ads_photo);
            $filename = date('Y-m-d') . "-" . $request->file('photo')->getClientOriginalName();
            $request->file('photo')->storeAs('ads', $filename,'public');
        }

        $ad->update([
            'title' => $request->title,
            'ads_photo' => $filename ?? $ad->ads_photo,
            'website_link' => $request->link,
            'expire_at' => $request->expire_at,
        ]);

        return redirect()->route('ads.index')->with('success','Ads updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $ad)
    {
        if(!auth()->user()->permission->delete_ads)
        {
            abort(403);
        }
        $ad->delete();
        Storage::delete('public/ads/'. $ad->ads_photo);
        return redirect()->back()->with('danger','Ads deleted successfully.');
    }
}
