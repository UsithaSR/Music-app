<?php

namespace App\Http\Controllers\Backend;

use App\HandWork;
use App\HandWorkImage;
use App\Helpers\APIHelper;
use App\Http\Requests\CMS\HandWorkImageCreateRequest;
use App\Http\Requests\CMS\HandWorkImageUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HandWorkImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hand_work_images = HandWorkImage::paginate(10);
        return view('backend.pages.hand_work_images.index',["hand_work_images"=>$hand_work_images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hand_works = HandWork::orderBy('title_en')->get();
        return view('backend.pages.hand_work_images.create',["hand_works"=>$hand_works]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandWorkImageCreateRequest $request)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('image'), 'hand_work_images');

        $hand_work_image = new HandWorkImage();
        $hand_work_image->hand_work_id = $request->input('hand_work_id');
        $hand_work_image->image = $upload_result;
        $hand_work_image->status = 1;

        $result = $hand_work_image->save();
        if ($result) {
            return redirect()->route('backend.hand_work_images.index')->with(session()->flash('success', 'Hand Work Image Added!'));
        } else {
            return redirect()->route('backend.hand_work_images.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hand_work_image = HandWorkImage::find($id);
        $hand_works = HandWork::orderBy('title_en')->get();
        return view('backend.pages.hand_work_images.edit',["hand_work_image"=>$hand_work_image, "hand_works"=>$hand_works]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HandWorkImageUpdateRequest $request, $id)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('image'), 'hand_work_images');

        $hand_work_image = HandWorkImage::find($id);
        $hand_work_image->hand_work_id = $request->input('hand_work_id');
        if ($upload_result != null){
            $hand_work_image->image = $upload_result;
        }
        $hand_work_image->status = 1;

        $result = $hand_work_image->save();
        if ($result) {
            return redirect()->route('backend.hand_work_images.index')->with(session()->flash('success', 'Hand Work Image Updated!'));
        } else {
            return redirect()->route('backend.hand_work_images.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = HandWorkImage::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.hand_work_images.index')->with(session()->flash('success', 'Hand Work Image Deleted!'));
        } else {
            return redirect()->route('backend.hand_work_images.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
