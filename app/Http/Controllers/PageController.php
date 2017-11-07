<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\PageDetail;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    public function store(Request $request) 
    {
        
        //Server validation form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        //Instantiate models
        $page = new Page;
        $detail = new PageDetail;

        //Form data for pages table
        $page->title = $request->title;
        $page->slug = str_slug($request->title, '-');

        //Form data for page_details table
        $detail->body = $request->body;
        
        //Save new page and relationships
        $page->save();
        $page->detail()->save($detail);

        return redirect()->action('DashboardController@pages');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Retrieve $page object with details by page slug
        $page = Page::with('detail')->where('id', $id)->first();

        return view('page.edit')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //Server validation form data
         $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        //Gather page and relationships
        $page = Page::where('id', $id)->first();
        $detail = $page->detail;

        //Form data for pages table
        $page->title = $request->input('title');
        $page->slug = str_slug($request->input('title'), '-');

        //Form data for page_details table
        $detail->body = $request->input('body');

        //Update page and relationships
        $page->save();
        $page->detail()->save($detail);
        
        return redirect()->action('DashboardController@pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::where('id', $id)->first();
        $page->detail()->delete();
        $page->delete();

        //Redirect to /blog URL for post list
        return redirect()->action('DashboardController@pages');
    }
}
