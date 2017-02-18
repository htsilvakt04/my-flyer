<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
class Photo extends Model
{
    protected $table = "flyer_photos";
    protected $baseDir = "images/photos";
    protected $file;

    protected $fillbale = ["name", "path", "thumbnail_path"];
    public function __construct($file = null)
    {
      if ($file) {
        $this->file = $file;
        $this->makePhotoName();
      }

    }
    public function flyer()
    {
      return $this->belongsTo(Flyer::class);
    }
    public function makePhotoName()
    {
      $name = $this->file->getClientOriginalName();
      $this->name = time().$name;
      $this->path = $this->baseDir."/".$this->name;
      $this->thumbnail_path = $this->baseDir."/tn-".$this->name;
      //move photo to proper directory
      $this->file->move($this->baseDir, $this->name);

      return $this->makeThumnail();
    }
    public function makeThumnail()
    {

      Image::make($this->path)->fit(200)->save($this->thumbnail_path);
      return $this;
    }
}
