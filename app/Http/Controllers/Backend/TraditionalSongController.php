<?php

namespace App\Http\Controllers\backend;

use App\Helpers\APIHelper;
use App\Http\Requests\CMS\TraditionalSongCreateRequest;
use App\Http\Requests\CMS\TraditionalSongUpdateRequest;
use App\SongCategory;
use App\TraditionalSong;
use App\TraditionalSongCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TraditionalSongController extends Controller
{
    public function index(){
        $traditional_songs = TraditionalSong::paginate(10);
        return view('backend.pages.traditional_songs.index',["traditional_songs"=> $traditional_songs]);
    }

    public function create(){
        $song_categories = SongCategory::latest()->get();
        return view('backend.pages.traditional_songs.create',["song_categories"=>$song_categories]);
    }

    public function store(TraditionalSongCreateRequest $request)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'traditional_songs');

        $traditional_song = new TraditionalSong();
        $traditional_song->title_en = $request->input("title_en");
        $traditional_song->title_si = $request->input("title_si");
        $traditional_song->title_ta = $request->input("title_ta");
        $traditional_song->writer_en = $request->input("writer_en");
        $traditional_song->writer_si = $request->input("writer_si");
        $traditional_song->writer_ta = $request->input("writer_ta");
        $traditional_song->video_thumbnail = $upload_result;
        $traditional_song->video = $request->input("video");
        $traditional_song->content_en = $request->input("content_en");
        $traditional_song->content_si = $request->input("content_si");
        $traditional_song->content_ta = $request->input("content_ta");
        $traditional_song->status = 1;

        $result = $traditional_song->save();

        $song_categories = $request->input('categories');
        foreach ($song_categories as $song_category)
            if ($song_category !=null){
                $traditional_song_category = new TraditionalSongCategory();
                $traditional_song_category->traditional_song_id = $traditional_song->id;
                $traditional_song_category->song_category_id = $song_category;
                $traditional_song_category->status = 1;

                $traditional_song_category->save();
            }

        if ($result) {
            return redirect()->route('backend.traditional_songs.index')->with(session()->flash('success', 'Traditional Song Created!'));
        } else {
            return redirect()->route('backend.traditional_songs.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        $traditional_song = TraditionalSong::find($id);
        $traditional_song_category_ids = TraditionalSongCategory::where("traditional_song_id",$id)->pluck("song_category_id")->toArray();
        $song_categories = SongCategory::active()->get();
        return view('backend.pages.traditional_songs.edit',["traditional_song"=>$traditional_song, "traditional_song_category_ids" => $traditional_song_category_ids,"song_categories"=>$song_categories]);
    }

    public function update(TraditionalSongUpdateRequest $request, $id)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'traditional_songs');

        $traditional_song = TraditionalSong::find($id);
        $traditional_song->title_en = $request->input("title_en");
        $traditional_song->title_si = $request->input("title_si");
        $traditional_song->title_ta = $request->input("title_ta");
        $traditional_song->writer_en = $request->input("writer_en");
        $traditional_song->writer_si = $request->input("writer_si");
        $traditional_song->writer_ta = $request->input("writer_ta");
        if ($upload_result != null){
            $traditional_song->video_thumbnail = $upload_result;
        }
        $traditional_song->video = $request->input("video");
        $traditional_song->content_en = $request->input("content_en");
        $traditional_song->content_si = $request->input("content_si");
        $traditional_song->content_ta = $request->input("content_ta");
        $traditional_song->status = 1;

        $result = $traditional_song->save();

        $song_categories = $request->input('categories');
        TraditionalSongCategory::where("traditional_song_id", $id)->delete();

        foreach ($song_categories as $song_category)
            if ($song_category !=null){
                $traditional_song_category = new TraditionalSongCategory();
                $traditional_song_category->traditional_song_id = $traditional_song->id;
                $traditional_song_category->song_category_id = $song_category;
                $traditional_song_category->status = 1;
                $traditional_song_category->save();
            }
        if ($result) {
            return redirect()->route('backend.traditional_songs.index')->with(session()->flash('success', 'Traditional Song Updated!'));
        } else {
            return redirect()->route('backend.traditional_songs.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }

    public function destroy($id)
    {
        $result = TraditionalSong::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.traditional_songs.index')->with(session()->flash('success', 'Traditional Song Deleted!'));
        } else {
            return redirect()->route('backend.traditional_songs.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
