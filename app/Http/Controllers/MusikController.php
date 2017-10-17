<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metadata;
use Session;
use Auth;
use Carbon\Carbon;

class MusikController extends Controller
{
    //
    /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\View\View
  */
// public function sukaati()
// {
  
// }
  public function showg($id)
  {
    $post = Berita::findOrFail($id);

    return view('guru.berita.show', compact('post'));
  }
  public function showwm($id)
  {
    $post = Berita::findOrFail($id);

    return view('wmurid.berita.show', compact('post'));
  }


  public function index(Request $request)
  {
    $keyword = $request->get('search');
    $perPage = 5;
    $adaMusik = '';

    if (!empty($keyword)) {
      $musik = Musik::where('title', 'LIKE', "%$keyword%")
      ->orWhere('content', 'LIKE', "%$keyword%")
      ->orWhere('image', 'LIKE', "%$keyword%")
      ->orWhere('user_id', 'LIKE', "%$keyword%")

      ->paginate($perPage);
    } else {
      $musik = Metadata::orderBy('created_at', 'desc')->paginate($perPage);
    }
    $aoeu = $request->get('test');
    $musik = Metadata::orderBy('created_at', 'desc')->where('title','LIKE',"%$aoeu%")->paginate($perPage);
    // $tanggal = $musik->created_at;
    // dd($musik->created_at);
// return $tanggal;
    // return collect(Berita::get())->count();
    if (Auth::user()->akses == "admin") {
      if (collect(Metadata::get())->count() == null) {
        $adaMusik = 'tidak ada musik';
      }
      # code...

      return view('admin.musik.index', compact('musik','adaMusik'));
    }
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\View\View
  */
  public function create()
  {
    return view('admin.musik.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param \Illuminate\Http\Request $request
  *
  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
  */
  public function store(Request $request)
  {
    // $this->validate($request, [
    //   'title' => 'required',
    //   'content' => 'required',
    //   'image' => 'required',
    //   ]);

    $musik = new Metadata();
    $musik->amazon_id = $request->get('amazon_id'); 
    $musik->title = $request->get('title'); 
    $musik->artist = $request->get('artist'); 
    $musik->root_genre = $request->get('root_genre'); 
    $musik->label = $request->get('label'); 
    $musik->first_release_year = $request->get('first_release_year'); 
    $musik->imUrl = $request->get('imUrl'); 
    $musik->rate = "0";
    $musik->view = "0";
    $musik->save();

    Session::flash('store_message', 'Berita added!');

    return redirect('admin/kelola_music');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  *
  * @return \Illuminate\View\View
  */
  public function show($id)
  {
    $berita = Berita::findOrFail($id);

    return view('adminn.beritas.show', compact('berita'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  *
  * @return \Illuminate\View\View
  */
  public function edit($id)
  {
    $musik = Metadata::findOrFail($id);

    return view('admin.musik.edit', compact('musik'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @param \Illuminate\Http\Request $request
  *
  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
  */
  public function update($id, Request $request)
  {

    $musik = Metadata::findOrFail($id);
    $musik->amazon_id = $request->get('amazon_id'); 
    $musik->title = $request->get('title'); 
    $musik->artist = $request->get('artist'); 
    $musik->root_genre = $request->get('root_genre'); 
    $musik->label = $request->get('label'); 
    $musik->first_release_year = $request->get('first_release_year'); 
    $musik->imUrl = $request->get('imUrl'); 

    $musik->update();

    Session::flash('update_message', 'Berita updated!');

    return redirect('admin/kelola_music');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  *
  * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
  */
  public function destroy($id)
  {

    // $this->authorize('delete', $berita);
      // Taks::destroy($id);
    $musik = Metadata::findOrFail($id);
    $musik->delete();

    // Berita::destroy($id);

    Session::flash('delete_message', 'Berita deleted!');

    return redirect('admin/kelola_music');
  }
}
