<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\APIHelper;
use App\Helpers\CMSHelper;
use App\Http\Requests\CMS\Knowledge_Hub\ImageCreateRequest;
use App\Http\Requests\CMS\Knowledge_Hub\ImageUpdateRequest;
use App\KnowledgeHubImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class  KnowledgeHubImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledge_hub_images = KnowledgeHubImage::paginate(10);
        return view('backend.pages.knowledge_hub_images.index',["knowledge_hub_images"=> $knowledge_hub_images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowledge_hub_images = KnowledgeHubImage::latest()->get();
        return view('backend.pages.knowledge_hub_images.create',["knowledge_hub_images"=>$knowledge_hub_images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageCreateRequest $request)
    {
        $thumbnail_url = APIHelper::uploadFileToStorage($request->file('image_thumbnail'), 'knowledge_hub_images');
        $image_url = APIHelper::uploadFileToStorage($request->file('main_image'),'knowledge_hub_images');

        $knowledge_hub_image = new KnowledgeHubImage();
        $knowledge_hub_image->title_en = $request->input("title_en");
        $knowledge_hub_image->title_si = $request->input("title_si");
        $knowledge_hub_image->title_ta = $request->input("title_ta");
        $knowledge_hub_image->image_thumbnail = $thumbnail_url;
        $knowledge_hub_image->image = $image_url;
        $knowledge_hub_image->content_en = $request->input("content_en");
        $knowledge_hub_image->content_si = $request->input("content_si");
        $knowledge_hub_image->content_ta = $request->input("content_ta");
        $knowledge_hub_image->status = 1;

        $result = $knowledge_hub_image->save();

        if ($result) {
            return redirect()->route('backend.knowledge_hub_images.index')->with(session()->flash('success', 'Knowledge Hub Image Added!'));
        } else {
            return redirect()->route('backend.knowledge_hub_images.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $knowledge_hub_image = KnowledgeHubImage::find($id);
        return view('backend.pages.knowledge_hub_images.edit',["knowledge_hub_image"=>$knowledge_hub_image]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageUpdateRequest $request, $id)
    {
        $thumbnail_url = APIHelper::uploadFileToStorage($request->file('image_thumbnail'), 'knowledge_hub_images');
        $image_url = APIHelper::uploadFileToStorage($request->file('main_image'),'knowledge_hub_images');

        $knowledge_hub_image = KnowledgeHubImage::find($id);
        $knowledge_hub_image->title_en = $request->input("title_en");
        $knowledge_hub_image->title_si = $request->input("title_si");
        $knowledge_hub_image->title_ta = $request->input("title_ta");
        if ($thumbnail_url != null){
            $knowledge_hub_image->image_thumbnail = $thumbnail_url;
        }
        if ($image_url != null){
            $knowledge_hub_image->image = $image_url;
        }
        $knowledge_hub_image->content_en = $request->input("content_en");
        $knowledge_hub_image->content_si = $request->input("content_si");
        $knowledge_hub_image->content_ta = $request->input("content_ta");
        $knowledge_hub_image->status = 1;

        $result = $knowledge_hub_image->save();

        if ($result) {
            return redirect()->route('backend.knowledge_hub_images.index')->with(session()->flash('success', 'Knowledge Hub Image Updated!'));
        } else {
            return redirect()->route('backend.knowledge_hub_images.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = KnowledgeHubImage::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.knowledge_hub_images.index')->with(session()->flash('success', 'Knowledge Hub Image Deleted!'));
        } else {
            return redirect()->route('backend.knowledge_hub_images.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}

