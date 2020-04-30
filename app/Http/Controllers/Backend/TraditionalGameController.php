<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\APIHelper;
use App\Http\Requests\CMS\TraditionalGameCreateRequest;
use App\Http\Requests\CMS\TraditionalGameUpdateRequest;
use App\TraditionalGame;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TraditionalGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $traditional_games = TraditionalGame::paginate(10);
        return view('backend.pages.traditional_games.index',["traditional_games"=>$traditional_games]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.traditional_games.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TraditionalGameCreateRequest $request)
    {
        $upload_image_thumbnail_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'traditional_games');
        $upload_image_result = APIHelper::uploadFileToStorage($request->file('image'), 'traditional_games');

        $traditional_game = new TraditionalGame();
        $traditional_game->title_en = $request->input("title_en");
        $traditional_game->title_si = $request->input("title_si");
        $traditional_game->title_ta = $request->input("title_ta");
        $traditional_game->image_thumbnail = $upload_image_thumbnail_result;
        $traditional_game->image = $upload_image_result;
        $traditional_game->content_en = $request->input("content_en");
        $traditional_game->content_si = $request->input("content_si");
        $traditional_game->content_ta = $request->input("content_ta");
        $traditional_game->status = 1;

        $result = $traditional_game->save();
        if ($result) {
            return redirect()->route('backend.traditional_games.index')->with(session()->flash('success', 'Traditional Game Created!'));
        } else {
            return redirect()->route('backend.traditional_games.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $traditional_game = TraditionalGame::find($id);
        return view('backend.pages.traditional_games.edit',["traditional_game"=>$traditional_game]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TraditionalGameUpdateRequest $request, $id)
    {
        $upload_image_thumbnail_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'traditional_games');
        $upload_image_result = APIHelper::uploadFileToStorage($request->file('image'), 'traditional_games');

        $traditional_game = TraditionalGame::find($id);

        $traditional_game->title_en = $request->input("title_en");
        $traditional_game->title_si = $request->input("title_si");
        $traditional_game->title_ta = $request->input("title_ta");
        if ($upload_image_thumbnail_result != null){
            $traditional_game->image_thumbnail = $upload_image_thumbnail_result;
        }
        if ($upload_image_result != null){
            $traditional_game->image = $upload_image_result;
        }
        $traditional_game->content_en = $request->input("content_en");
        $traditional_game->content_si = $request->input("content_si");
        $traditional_game->content_ta = $request->input("content_ta");
        $traditional_game->status = 1;

        $result = $traditional_game->save();
        if ($result) {
            return redirect()->route('backend.traditional_games.index')->with(session()->flash('success', 'Traditional Game Updated!'));
        } else {
            return redirect()->route('backend.traditional_games.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = TraditionalGame::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.traditional_games.index')->with(session()->flash('success', 'Traditional Game Deleted!'));
        } else {
            return redirect()->route('backend.traditional_games.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
