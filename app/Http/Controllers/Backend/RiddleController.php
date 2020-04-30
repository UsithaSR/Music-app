<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\APIHelper;
use App\Http\Requests\CMS\RiddleCreateRequest;
use App\Http\Requests\CMS\RiddleUpdateRequest;
use App\Riddle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RiddleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riddles = Riddle::paginate(10);
        return view('backend.pages.riddles.index',["riddles"=>$riddles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.riddles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RiddleCreateRequest $request)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('image_thumbnail'), 'riddles');

        $riddle = new Riddle();
        $riddle->title_en = $request->input("title_en");
        $riddle->title_si = $request->input("title_si");
        $riddle->title_ta = $request->input("title_ta");
        $riddle->image_thumbnail = $upload_result;
        $riddle->content_en = $request->input("content_en");
        $riddle->content_si = $request->input("content_si");
        $riddle->content_ta = $request->input("content_ta");
        $riddle->status = 1;

        $result = $riddle->save();
        if ($result) {
            return redirect()->route('backend.riddles.index')->with(session()->flash('success', 'Riddle Created!'));
        } else {
            return redirect()->route('backend.riddles.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $riddle = Riddle::find($id);
        return view('backend.pages.riddles.edit',["riddle"=>$riddle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RiddleUpdateRequest $request, $id)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('image_thumbnail'), 'riddles');

        $riddle = Riddle::find($id);
        $riddle->title_en = $request->input("title_en");
        $riddle->title_si = $request->input("title_si");
        $riddle->title_ta = $request->input("title_ta");
        if ($upload_result != null) {
            $riddle->image_thumbnail = $upload_result;
        }
        $riddle->content_en = $request->input("content_en");
        $riddle->content_si = $request->input("content_si");
        $riddle->content_ta = $request->input("content_ta");
        $riddle->status = 1;

        $result = $riddle->save();
        if ($result) {
            return redirect()->route('backend.riddles.index')->with(session()->flash('success', 'Riddle Updated!'));
        } else {
            return redirect()->route('backend.riddles.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = Riddle::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.riddles.index')->with(session()->flash('success', 'Riddle Deleted!'));
        } else {
            return redirect()->route('backend.riddles.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
