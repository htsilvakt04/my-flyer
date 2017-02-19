<?php
namespace App;
use Image;
class Thumbnail
{
  public function makeThumbnail(Photo $photo)
  {

    return Image::make($photo->path)->fit(250)->save($photo->thumbnail_path);

  }


}
