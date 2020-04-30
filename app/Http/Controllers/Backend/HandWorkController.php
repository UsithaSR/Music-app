<?php

namespace App\Http\Controllers\Backend;

use App\HandWork;
use App\HandWorkCategory;
use App\Http\Requests\CMS\HandWorkCategoryCreateRequest;
use App\Http\Requests\CMS\HandWorkCategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HandWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hand_works = HandWork::paginate(10);
        return view('backend.pages.hand_works.index',["hand_works"=>$hand_works]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = HandWorkCategory::orderBy('title_en')->get();
        return view('backend.pages.hand_works.create',["categories"=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandWorkCategoryCreateRequest $request)
    {
        $hand_work = new HandWork();
        $hand_work->hand_work_category_id = $request->input('hand_work_category_id');
        $hand_work->title_en = $request->input("title_en");
        $hand_work->title_si = $request->input("title_si");
        $hand_work->title_ta = $request->input("title_ta");
        $hand_work->content_en = $request->input("content_en");
        $hand_work->content_si = $request->input("content_si");
        $hand_work->content_ta = $request->input("content_ta");
        $hand_work->status = 1;

        $result = $hand_work->save();

        if ($result) {
            return redirect()->route('backend.hand_works.index')->with(session()->flash('success', 'Hand Work Added!'));
        } else {
            return redirect()->route('backend.hand_works.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $hand_work = HandWork::find($id);
        $categories = HandWorkCategory::orderBy('title_en')->get();
        return view('backend.pages.hand_works.edit',["hand_work"=>$hand_work, "categories"=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HandWorkCategoryUpdateRequest $request, $id)
    {
        $hand_work = HandWork::find($id);
        $hand_work->hand_work_category_id = $request->input('hand_work_category_id');
        $hand_work->title_en = $request->input("title_en");
        $hand_work->title_si = $request->input("title_si");
        $hand_work->title_ta = $request->input("title_ta");
        $hand_work->content_en = $request->input("content_en");
        $hand_work->content_si = $request->input("content_si");
        $hand_work->content_ta = $request->input("content_ta");
        $hand_work->status = 1;

        $result = $hand_work->save();

        if ($result) {
            return redirect()->route('backend.hand_works.index')->with(session()->flash('success', 'Hand Work Updated!'));
        } else {
            return redirect()->route('backend.hand_works.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = HandWork::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.hand_works.index')->with(session()->flash('success', 'Hand Work Deleted!'));
        } else {
            return redirect()->route('backend.hand_works.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
