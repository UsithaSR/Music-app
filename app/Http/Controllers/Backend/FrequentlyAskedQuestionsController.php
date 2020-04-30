<?php

namespace App\Http\Controllers\Backend;

use App\FrequentlyAskedQuestion;
use App\Http\Requests\CMS\FAQCreateRequest;
use App\Http\Requests\CMS\FAQUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrequentlyAskedQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = FrequentlyAskedQuestion::paginate(10);
        return view('backend.pages.faq.index', ["faqs" => $faqs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(FAQCreateRequest $request)
    {

        $faq = new FrequentlyAskedQuestion();

        $faq->title_en = $request->input("title_en");
        $faq->title_si = $request->input("title_si");
        $faq->title_ta = $request->input("title_ta");
        $faq->content_en = $request->input("content_en");
        $faq->content_si = $request->input("content_si");
        $faq->content_ta = $request->input("content_ta");
        $faq->status = 1;

        $result = $faq->save();
        if ($result) {
            return redirect()->route('backend.faq.index')->with(session()->flash('success', 'Frequently Asked Question Added!'));
        } else {
            return redirect()->route('backend.faq.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $faq = FrequentlyAskedQuestion::find($id);
        return view('backend.pages.faq.edit', ["faq" => $faq]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(FAQUpdateRequest $request, $id)
    {

        $faq = FrequentlyAskedQuestion::find($id);

        $faq->title_en = $request->input("title_en");
        $faq->title_si = $request->input("title_si");
        $faq->title_ta = $request->input("title_ta");
        $faq->content_en = $request->input("content_en");
        $faq->content_si = $request->input("content_si");
        $faq->content_ta = $request->input("content_ta");
        $faq->status = 1;

        $result = $faq->save();
        if ($result) {
            return redirect()->route('backend.faq.index')->with(session()->flash('success', 'Frequently Asked Question Updated!'));
        } else {
            return redirect()->route('backend.faq.index')->with(session()->flash('error', 'Something went wrong!'));
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
        $result = FrequentlyAskedQuestion::find($id)->delete();
        if ($result) {
            return redirect()->route('backend.faq.index')->with(session()->flash('success', 'Frequently Asked Question Deleted!'));
        } else {
            return redirect()->route('backend.faq.index')->with(session()->flash('error', 'Something went wrong!'));
        }
    }
}
