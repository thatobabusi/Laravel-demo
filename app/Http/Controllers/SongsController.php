<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use Auth;

use App\Http\Requests;
use App\Http\Requests\CreateSongRequest;
use App\Http\Controllers\Controller;

class SongsController extends Controller
{
    /**
     * @var Song
     */
    private $song;

    /**
     * SongsController constructor.
     * @param Song $song
     */
    public function __construct(Song $song)
    {
        $this->middleware('auth');

        $this->song = $song;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $songs = $this->song->get();

        return view('songs.index', compact('songs'));
    }

    /**
     * @param Song $song
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Song $song)
    {
        $songs = $this->song->take(10)->get();

        return view('songs.show', compact('song', 'songs'));
    }

    /**
     * Show a form to create a new song.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * @param Song $song
     * @param CreateSongRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Song $song, CreateSongRequest $request)
    {
        $new_song = $song->create($request->all());

        $new_song->User()->associate(Auth::user()->id);

        $new_song->save();

        return redirect()->route('index_path');
    }

    /**
     * @param Song $song
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * @param Song $song
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Song $song, Request $request)
    {
        $song->fill($request->input())->save();

        $song->save();

        return redirect('songs');
    }

    /**
     * @param Song $song
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('index_path');
    }
}
