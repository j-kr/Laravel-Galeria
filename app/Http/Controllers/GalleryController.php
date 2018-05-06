<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    public function viewGalleryList()
    {

        if (!Auth::check()) {
            return redirect('/');
        }

        $galleries = Gallery::where('created_by',Auth::user()->id)->get();
        return view('gallery.gallery')
            ->with('galleries', $galleries);
    }

    public function viewGalleryListAll()
    {

        $galleries = Gallery::where('published', 'Publiczna')->get();


        return view('gallery.gallery-all')
            ->with('galleries', $galleries);
    }

    public function saveGallery(Request $request)
    {
        
        $gallery = new Gallery;

        $gallery->name = $request->input('gallery_name');
        $gallery->created_by = Auth::user()->id;
        $gallery->published = 'Publiczna';
        $gallery->stats = 0;
        $gallery->save();

        return redirect()->back();
    }

    public function viewGalleryPics($id)
    {
        $gallery = Gallery::findOrFail($id);

        $gallery->stats++;
        $gallery->save();

        if (!Auth::check()) {
            return view('gallery.gallery-view-only')
            ->with('gallery', $gallery);
        }

        return view('gallery.gallery-view')
            ->with('gallery', $gallery);
    }

    public function doImageUpload(Request $request)
    {
        $file = $request->file('file');

        $filename = uniqid().$file->getClientOriginalName();

        $file->move('gallery/images', $filename);

        $gallery = Gallery::find($request->input('gallery_id'));
        $image = $gallery->images()->create([
            'gallery_id' => $request->input('gallery_id'),
            'file_name' => $filename,
            'file_size' => $file->getClientSize(),
            'file_mime' => $file->getClientMimeType(),
            'file_path' => 'gallery/images/' . $filename,
            'created_by' => Auth::user()->id,
            'published' => 'Publiczna',
        ]);

        return $image;
    }

    public function deleteGallery($id)
    {
        $currentGallery = Gallery::findOrFail($id);

        if($currentGallery->created_by != Auth::user()->id)
        {
            abort('403','Nie posiadasz wystarczających uprawnień');
        }

        $images = $currentGallery->images();

        foreach ($currentGallery->images as $image){
            unlink(public_path($image->file_path));
        }

        $currentGallery->images()->delete();
        $currentGallery->delete();
        return redirect()->back();

    }

    public function publishGallery($id)
    {
        $currentGallery = Gallery::findOrFail($id);

        $stan = $currentGallery->published;

        if($stan == 'Publiczna'){
            $currentGallery->published='Prywatna';
            $currentGallery->save();
        } 
        else if($stan == 'Prywatna'){
            $currentGallery->published='Publiczna';
            $currentGallery->save();
        }

        return redirect()->back();
    }

    public function addComment(Request $request)
    {
        $gallery = Gallery::find($request->input('gallery_id'));
        $user = Auth::user()->id; 

        $comment = $gallery->comments()->create([
            'gallery_id' => $request->input('gallery_id'),
            'user_id' => $user,
            'comment' => $request->input('comment'),
            'rate' => $request->input('rate'),
        ]);

        return redirect()->back();
    }

}