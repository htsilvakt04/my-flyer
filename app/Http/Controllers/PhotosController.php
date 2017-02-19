<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flyer;
use App\Photo;
use App\AddPhotoToFlyer;
use App\Http\Requests\StorePhotoRequest;
class PhotosController extends Controller
{
    public function __construct()
    {
      $this->middleware("auth");
    }


    public function store($zip, $street,StorePhotoRequest $request)
    {
      $flyer = Flyer::locatedAt($zip, $street);

      $file = $request->file("photos");

      (new AddPhotoToFlyer($flyer, $file))->save();

    }
    public function destroy($photo,Request $request)
    {
      $photo = Photo::where(["name" => $photo])->firstOrFail();
      \File::delete($photo->path, $photo->thumbnail_path);
      $photo->delete();
      flash("Your photo deleted successfuly");
      return redirect()->back();
    }
}
