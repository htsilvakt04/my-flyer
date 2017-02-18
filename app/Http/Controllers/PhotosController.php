<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flyer;
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

      if (! $flyer->onwnedBy($request->user())) {
        return "No way";
      }

      $photo = $flyer->makePhoto($request->file("photos"));
      $flyer->addPhoto($photo);
    }
}
