<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['banners'] = Banner::all();

        return view('admin.banner.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerRequest $request)
    {
        // dd($request->all());

        $path = $request->file('banner')->store('images/banner');
        if(!$path) {
            return redirect()->back()->with("ERROR", __("Failed to upload image"));
        }

        $banner = Banner::create([
            'banner' => $path,
        ]);
        if(empty($banner)) {
            return redirect()->back();
        }
        return redirect()->route('banners.index')->with("SUCCESS", __("Banner has been created successfully"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $data['banner'] = $banner;

        return view('admin.banner.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(BannerRequest $request, Banner $banner)
    {
        // dd($request->file());
        if($request->hasFile('banner')) {
            if($banner->banner) {
                storage::delete($banner->banner);
            }
            $path = $request->file('banner')->store('images/banner');

        }
        if($banner->update([
            'banner' => $path,
        ])) {
            return redirect()->route('banners.index')->with('SUCCESS', __('Banner has been updated successfully'));
        }
        return redirect()->back()->with("ERROR", __('Failed to updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //  dd($banner);
        // if($banner->banner) {
        //     storage::delete($banner->banner);
        //     return redirect()->route('banners.index')->with('SUCCESS', __('Banner has been deleted successfully'));
        // }
        // return redirect()->back()->with('ERROR', __('Failed to delete'));

        storage::delete($banner->banner);
        if($banner->delete()) {
            return redirect()->back()->with('SUCCESS', __('Banner has been deleted successfully'));
        }
        return redirect()->back()->with('ERROR', __('Failed to delete'));
    }
}