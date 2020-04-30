<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CMS\ProverbCreateRequest;
use App\Http\Requests\CMS\ProverbUpdateRequest;
use App\Proverb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProverbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proverbs = Proverb::paginate(10);
        return view('backend.pages.proverbs.index',["proverbs"=>$proverbs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.proverbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProverbCreateRequest $request)
    {
        $proverb = new Proverb();
        $proverb->title_en = $request->input('title_en');
        $proverb->title_si = $request->input('title_si');
        $proverb->title_ta = $request->input('title_ta');
        $proverb->content_en = $request->input('content_en');
        $proverb->content_si = $request->input('content_si');
        $proverb->content_ta = $request->input('content_ta');
        $proverb->status = 1;

        $result = $proverb->save();
        if ($result) {
            return redirect()->route('backend.proverbs.index')->with(session()->flash('success', 'Proverb Created!'));
        } else {
            return redirect()->route('backend.proverbs.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $proverb = Proverb::find($id);
        return view('backend.pages.proverbs.edit',["proverb"=>$proverb]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProverbUpdateRequest $request, $id)
    {
        $proverb = Proverb::find($id);

        $proverb->title_en = $request->input('title_en');
        $proverb->title_si = $request->input('title_si');
        $proverb->title_ta = $request->input('title_ta');
        $proverb->content_en = $request->input('content_en');
        $proverb->content_si = $request->input('content_si');
        $proverb->content_ta = $request->input('content_ta');
        $proverb->status = 1;

        $result = $proverb->save();
        if ($result) {
            return redirect()->route('backend.proverbs.index')->with(session()->flash('success', 'Proverb Updated!'));
        } else {
            return redirect()->route('backend.proverbs.index')->with(session()->flash('error', 'Something went wrong!'));;
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
        $result = Proverb::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.proverbs.index')->with(session()->flash('success', 'Proverb Deleted!'));
        } else {
            return redirect()->route('backend.proverbs.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
