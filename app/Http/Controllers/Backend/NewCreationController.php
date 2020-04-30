<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CMS\NewCreationUpdateRequest;
use App\NewCreation;
use Illuminate\Http\Request;
use App\Http\Requests\CMS\NewCreationCreateRequest;
use App\Helpers\APIHelper;

class NewCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new_creations = NewCreation::paginate(10);
        return view('backend.pages.new_creations.index',["new_creations"=> $new_creations ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.pages.new_creations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCreationCreateRequest $request)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'new_creations');

        $new_creation = new NewCreation();
        $new_creation->title_en = $request->input("title_en");
        $new_creation->title_si = $request->input("title_si");
        $new_creation->title_ta = $request->input("title_ta");
        $new_creation->writer_en = $request->input("writer_en");
        $new_creation->writer_si = $request->input("writer_si");
        $new_creation->writer_ta = $request->input("writer_ta");
        $new_creation->video_thumbnail = $upload_result;
        $new_creation->video = $request->input("video");
        $new_creation->content_en = $request->input("content_en");
        $new_creation->content_si = $request->input("content_si");
        $new_creation->content_ta = $request->input("content_ta");
        $new_creation->status = 1;

        $result = $new_creation->save();


        if ($result) {
            return redirect()->route('backend.new_creations.index')->with(session()->flash('success', 'New Creation Created!'));
        } else {
            return redirect()->route('backend.new_creations.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $new_creation = NewCreation::find($id);

        return view('backend.pages.new_creations.edit',["new_creation"=>$new_creation,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewCreationUpdateRequest $request, $id)
    {
        $upload_result = APIHelper::uploadFileToStorage($request->file('video_thumbnail'), 'new_creations');

        $new_creation = NewCreation::find($id);
        $new_creation->title_en = $request->input("title_en");
        $new_creation->title_si = $request->input("title_si");
        $new_creation->title_ta = $request->input("title_ta");
        $new_creation->writer_en = $request->input("writer_en");
        $new_creation->writer_si = $request->input("writer_si");
        $new_creation->writer_ta = $request->input("writer_ta");
        if ($upload_result != null){
            $new_creation->video_thumbnail = $upload_result;
        }
        $new_creation->video = $request->input("video");
        $new_creation->content_en = $request->input("content_en");
        $new_creation->content_si = $request->input("content_si");
        $new_creation->content_ta = $request->input("content_ta");
        $new_creation->status = 1;

        $result = $new_creation->save();



        if ($result) {
            return redirect()->route('backend.new_creations.index')->with(session()->flash('success', 'New Creation Updated!'));
        } else {
            return redirect()->route('backend.new_creations.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = NewCreation::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.new_creations.index')->with(session()->flash('success', 'New Creation Deleted!'));
        } else {
            return redirect()->route('backend.new_creations.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }

}
