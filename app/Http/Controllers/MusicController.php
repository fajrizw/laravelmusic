<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Music;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::all();
        return view('music', ['musics' => $musics]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'lyrics' => 'required',
            'audio'=>'required',
            'audio.*'=> 'audio|file|max:2048']);

        $audioName = time().'.'.$request->audio->extension();
        $request->audio->move(public_path().'/audio/', $audioName);
        $music = Music::create([
            'title' => $request['title'],
            'artist' => $request['artist'],
            'lyrics' => $request['lyrics'],
            'audio'=>$request['audio'],
            'audio'=>$audioName]);

        return redirect('/dashboard')->with('success', 'Music has been added.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $music = Music::findorFail($id);
        $musics = Music::all();
        return view('detail', [
        'music' => $music,
        'musics' => $musics
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $music = Music::findorfail($id);
        return view('edit', [
            'title' => 'Music',
            'music' => $music

        ]);
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
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'lyrics' => 'required',
            'audio'=>'required',
            'audio.*'=> 'audio|mimes:|max:2048']);

        $audioName = time().'.'.$request->audio->extension();
        $request->audio->move(public_path().'/audio/', $audioName);
       
        $music = Music::find($id)->update([
            'title' => $request['title'],
            'artist' => $request['artist'],
            'lyrics' => $request['lyrics'],
            'audio'=>$request['audio'],
            'audio'=>$audioName]);

        return redirect('/dashboard')->with('success', 'Music has been added.');
    
    }
  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = Music::find($id);
        $music->delete();
        return redirect('dashboard')->with('success', 'Music has been deleted.');
    }
}
