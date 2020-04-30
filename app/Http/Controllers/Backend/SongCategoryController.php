<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CMS\SongCategoryCreateRequest;
use App\Http\Requests\CMS\SongCategoryUpdateRequest;
use App\SongCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SongCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song_categories = SongCategory::paginate(10);
        return view('backend.pages.song_categories.index', ["song_categories"=>$song_categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.song_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongCategoryCreateRequest $request)
    {
        $song_category = new SongCategory();
        $song_category->title_en = $request->input('title_en');
        $song_category->title_si = $request->input('title_si');
        $song_category->title_ta = $request->input('title_ta');
        $song_category->status = 1;

        $result = $song_category->save();
        if ($result) {
            return redirect()->route('backend.song_categories.index')->with(session()->flash('success', 'Song Category Created!'));
        } else {
            return redirect()->route('backend.song_categories.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $song_category = SongCategory::find($id);
        return view('backend.pages.song_categories.edit', ["song_category"=>$song_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SongCategoryUpdateRequest $request, $id)
    {
        $song_category = SongCategory::find($id);

        $song_category->title_en = $request->input('title_en');
        $song_category->title_si = $request->input('title_si');
        $song_category->title_ta = $request->input('title_ta');
        $song_category->status = 1;

        $result = $song_category->save();
        if ($result) {
            return redirect()->route('backend.song_categories.index')->with(session()->flash('success', 'Song Category Updated!'));
        } else {
            return redirect()->route('backend.song_categories.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = SongCategory::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.song_categories.index')->with(session()->flash('success', 'Song Category Deleted!'));
        } else {
            return redirect()->route('backend.song_categories.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
