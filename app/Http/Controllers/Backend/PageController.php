<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }
        return abort(404);
    }

    public function privacyPolicy()
    {
        return view('backend.pages.privacy_policy');
    }
}
