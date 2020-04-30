<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\APIHelper;
use App\Http\Requests\CMS\Knowledge_Hub\AudioCreateRequest;
use App\Http\Requests\CMS\Knowledge_Hub\AudioUpdateRequest;
use App\KnowledgeHubAudio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KnowledgeHubAudiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledge_hub_audios = KnowledgeHubAudio::paginate(10);
        return view('backend.pages.knowledge_hub_audios.index', ["knowledge_hub_audios" => $knowledge_hub_audios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $knowledge_hub_audios = KnowledgeHubAudio::latest()->get();
        return view('backend.pages.knowledge_hub_audios.create', ["knowledge_hub_audios" => $knowledge_hub_audios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AudioCreateRequest $request)

    {
        $thumbnail_url = APIHelper::uploadFileToStorage($request->file('image_thumbnail'), 'knowledge_hub_images');
        $audio_url = APIHelper::uploadFileToStorage($request->file('audio'), 'knowledge_hub_audios');


        $knowledge_hub_audio = new KnowledgeHubAudio();
        $knowledge_hub_audio->title_en = $request->input("title_en");
        $knowledge_hub_audio->title_si = $request->input("title_si");
        $knowledge_hub_audio->title_ta = $request->input("title_ta");
        $knowledge_hub_audio->image_thumbnail = $thumbnail_url;
        $knowledge_hub_audio->audio = $audio_url;
        $knowledge_hub_audio->content_en = $request->input("content_en");
        $knowledge_hub_audio->content_si = $request->input("content_si");
        $knowledge_hub_audio->content_ta = $request->input("content_ta");
        $knowledge_hub_audio->status = 1;

        $result = $knowledge_hub_audio->save();

        if ($result) {
            return redirect()->route('backend.knowledge_hub_audios.index')->with(session()->flash('success', 'Knowledge Hub Audio Added!'));
        } else {
            return redirect()->route('backend.knowledge_hub_audios.index')->with(session()->flash('error', 'Something went wrong!'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $knowledge_hub_audio = KnowledgeHubAudio::find($id);
        return view('backend.pages.knowledge_hub_audios.edit', ["knowledge_hub_audio" => $knowledge_hub_audio]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AudioUpdateRequest $request, $id)
    {
        $thumbnail_url = APIHelper::uploadFileToStorage($request->file('image_thumbnail'), 'knowledge_hub_audios');
        $audio_url = APIHelper::uploadFileToStorage($request->file('audio'), 'knowledge_hub_audios');

        $knowledge_hub_audio = KnowledgeHubAudio::find($id);
        $knowledge_hub_audio->title_en = $request->input("title_en");
        $knowledge_hub_audio->title_si = $request->input("title_si");
        $knowledge_hub_audio->title_ta = $request->input("title_ta");
        if ($thumbnail_url != null) {
            $knowledge_hub_audio->image_thumbnail = $thumbnail_url;
        }
        if ($audio_url != null) {
            $knowledge_hub_audio->audio = $audio_url;
        }
        $knowledge_hub_audio->content_en = $request->input("content_en");
        $knowledge_hub_audio->content_si = $request->input("content_si");
        $knowledge_hub_audio->content_ta = $request->input("content_ta");
        $knowledge_hub_audio->status = 1;

        $result = $knowledge_hub_audio->save();

        if ($result) {
            return redirect()->route('backend.knowledge_hub_audios.index')->with(session()->flash('success', 'Knowledge Hub Audio Updated!'));
        } else {
            return redirect()->route('backend.knowledge_hub_audios.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = KnowledgeHubAudio::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.knowledge_hub_audios.index')->with(session()->flash('success', 'Knowledge Hub Audio Deleted!'));
        } else {
            return redirect()->route('backend.knowledge_hub_audios.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}


