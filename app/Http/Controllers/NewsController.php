<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use DB;
use Validator;
use Redirect;
use Session;
use URL;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('news.index')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required|max:30|min:5',
            'description' => 'required|max:255|min:30'
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails())
            return Redirect::back()->withErrors($validator);

        // Store
        $news = new News;
        $news->title        = $request->input('title');
        $news->description = $request->input('description');
        $news->save();

        Session::flash('message', 'Noticia Adicionada!');

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $news = News::find($id);

        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $news = News::find($id);

        return view('news.create')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, int $id)
    {
        $rules = array(
            'title' => 'required|max:30|min:5',
            'description' => 'required|max:255|min:30'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails())
            return Redirect::to('news/'.$id.'/edit')->withErrors($validator);

        // Update
        $news = News::find($id);
        $news->title        = $request->input('title');
        $news->description = $request->input('description');
        $news->save();

        Session::flash('message', 'Noticia Atualizada!');

        return Redirect::to('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $news = News::find($id);
        $news->destroy();

        Session::flash('message', 'Noticia Excluida!');

        return Redirect::to('news');
    }


    /**
     * Search content.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        $news = News::where('description', 'like', '%'.$search.'%')->get();

        return view('news.index')->with('news', $news);
    }
}
