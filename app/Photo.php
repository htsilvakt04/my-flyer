<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Image;
class Photo extends Model
{
    protected $table = "flyer_photos";
    protected $baseDir = "images/photos";
    protected $file;

    protected $fillbale = ["name", "path", "thumbnail_path"];
    public function __construct()
    {

    }
    public function getRouteKeyName()
    {
        return 'name';
    }
    public function setNameAttribute($name)
    {
      $this->attributes["name"] = $name;
      $this->path = $this->baseDir."/".$name;
      $this->thumbnail_path = $this->baseDir."/tn-".$name;
    }
    public static function makeFromFile(UploadedFile $file)
    {
      $photo = new static;
      $photo->file = $file;
      $photo->makePhotoName($file);

      return $photo;
    }
    public function flyer()
    {
      return $this->belongsTo(Flyer::class);
    }
    public function makePhotoName($file)
    {
      $name = $file->getClientOriginalName();
      $this->name = time().$name;

      //move photo to proper directory
      $this->file->move($this->baseDir, $this->name);
    }
    
}
