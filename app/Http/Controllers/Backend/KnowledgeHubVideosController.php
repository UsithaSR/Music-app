<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\APIHelper;
use App\Helpers\CMSHelper;
use App\Http\Requests\CMS\Knowledge_Hub\VideoCreateRequest;
use App\Http\Requests\CMS\Knowledge_Hub\VideoUpdateRequest;
use App\KnowledgeHubVideo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KnowledgeHubVideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledge_hub_videos = KnowledgeHubVideo::paginate(10);
        return view('backend.pages.knowledge_hub_videos.index',["knowledge_hub_videos"=> $knowledge_hub_videos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowledge_hub_videos = KnowledgeHubVideo::latest()->get();
        return view('backend.pages.knowledge_hub_videos.create',["knowledge_hub_videos"=>$knowledge_hub_videos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoCreateRequest $request)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'knowledge_hub_videos');

        $knowledge_hub_video = new KnowledgeHubVideo();
        $knowledge_hub_video->title_en = $request->input("title_en");
        $knowledge_hub_video->title_si = $request->input("title_si");
        $knowledge_hub_video->title_ta = $request->input("title_ta");
        $knowledge_hub_video->video_thumbnail = $upload_result;
        $knowledge_hub_video->video = $request->input("video");
        $knowledge_hub_video->content_en = $request->input("content_en");
        $knowledge_hub_video->content_si = $request->input("content_si");
        $knowledge_hub_video->content_ta = $request->input("content_ta");
        $knowledge_hub_video->status = 1;

        $result = $knowledge_hub_video->save();

        if ($result) {
            return redirect()->route('backend.knowledge_hub_videos.index')->with(session()->flash('success', 'Knowledge Hub Video Added!'));
        } else {
            return redirect()->route('backend.knowledge_hub_videos.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $knowledge_hub_video = KnowledgeHubVideo::find($id);
        return view('backend.pages.knowledge_hub_videos.edit',["knowledge_hub_video"=>$knowledge_hub_video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoUpdateRequest $request, $id)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'knowledge_hub_videos');

        $knowledge_hub_video = KnowledgeHubVideo::find($id);
        $knowledge_hub_video->title_en = $request->input("title_en");
        $knowledge_hub_video->title_si = $request->input("title_si");
        $knowledge_hub_video->title_ta = $request->input("title_ta");
        if ($upload_result != null){
            $knowledge_hub_video->video_thumbnail = $upload_result;
        }
        $knowledge_hub_video->video = $request->input("video");
        $knowledge_hub_video->content_en = $request->input("content_en");
        $knowledge_hub_video->content_si = $request->input("content_si");
        $knowledge_hub_video->content_ta = $request->input("content_ta");
        $knowledge_hub_video->status = 1;

        $result = $knowledge_hub_video->save();

        if ($result) {
            return redirect()->route('backend.knowledge_hub_videos.index')->with(session()->flash('success', ' Knowledge Hub Video Updated!'));
        } else {
            return redirect()->route('backend.knowledge_hub_videos.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = KnowledgeHubVideo::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.knowledge_hub_videos.index')->with(session()->flash('success', 'Knowledge Hub Video Deleted!'));
        } else {
            return redirect()->route('backend.knowledge_hub_videos.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}

