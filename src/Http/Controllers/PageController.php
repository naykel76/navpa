<?php

namespace Naykel\Navpa\Http\Controllers;

use App\Http\Controllers\Controller;
use Naykel\Navpa\Models\Page;
use Naykel\Navpa\Http\Requests\ValidatePage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('navpa::pages.index')->with([
            'title' => 'Pages List',
            'pages' => Page::paginate(24),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('navpa::pages.create-edit')->with([
            'title' => 'Create New Page',
            'formType' => 'store',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatePage $request)
    {
        $validatedData = $request->validated();
        $page = Page::create($validatedData);
        return redirect('pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return view('navpa::pages.show')->with([
            'title' => $page->name,
            'page' => $page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('navpa::pages.create-edit')->with([
            'title' => 'Edit Page',
            'page' => $page,
            'formType' => 'update',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(ValidatePage $request, Page $page)
    {
        $validatedData = $request->validated();
        $page->update($validatedData);
        return redirect('pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return back();
    }
}
