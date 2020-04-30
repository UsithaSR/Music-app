<?php

namespace App\Http\Controllers\Backend;

use App\HandWorkCategory;
use App\Http\Requests\CMS\HandWorkCategoryCreateRequest;
use App\Http\Requests\CMS\HandWorkCategoryUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HandWorkCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hand_work_categories = HandWorkCategory::paginate(10);
        return view('backend.pages.hand_work_categories.index',["hand_work_categories"=>$hand_work_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.hand_work_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandWorkCategoryCreateRequest $request)
    {
        $hand_work_category = new HandWorkCategory();
        $hand_work_category->title_en = $request->input('title_en');
        $hand_work_category->title_si = $request->input('title_si');
        $hand_work_category->title_ta = $request->input('title_ta');
        $hand_work_category->status = 1;

        $result = $hand_work_category->save();
        if ($result) {
            return redirect()->route('backend.hand_work_categories.index')->with(session()->flash('success', 'Hand Work Category Added!'));
        } else {
            return redirect()->route('backend.hand_work_categories.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $hand_work_category = HandWorkCategory::find($id);
        return view('backend.pages.hand_work_categories.edit',["hand_work_category"=>$hand_work_category]);
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
        $hand_work_category = HandWorkCategory::find($id);
        $hand_work_category->title_en = $request->input('title_en');
        $hand_work_category->title_si = $request->input('title_si');
        $hand_work_category->title_ta = $request->input('title_ta');
        $hand_work_category->status = 1;

        $result = $hand_work_category->save();
        if ($result) {
            return redirect()->route('backend.hand_work_categories.index')->with(session()->flash('success', 'Hand Work Category Updated!'));
        } else {
            return redirect()->route('backend.hand_work_categories.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = HandWorkCategory::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.hand_work_categories.index')->with(session()->flash('success', 'Hand Work Category Deleted!'));
        } else {
            return redirect()->route('backend.hand_work_categories.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
