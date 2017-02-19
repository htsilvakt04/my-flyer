<?php
namespace App;
use Illuminate\Http\UploadedFile;

class AddPhotoToFlyer
{
  protected $flyer;
  protected $file;

  public function __construct(Flyer $flyer, UploadedFile $file)
  {
    $this->flyer = $flyer;
    $this->file = $file;
  }
  public function save()
  {
    //attach photo to proper flyer and move file to images/photos
    $photo = $this->flyer->addPhoto($this->makePhoto());
    // make photo thumbanaill

    (new Thumbnail)->makeThumbnail($photo);

  }
  public function makePhoto()
  {
    return Photo::makeFromFile($this->file);
  }
}
