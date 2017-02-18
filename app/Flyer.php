<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
class Flyer extends Model
{
    protected $fillable = [
      "street",
      "zip",
      "city",
      "state",
      "country",
      "price",
      "description"
    ];
    public function photos()
    {
      return $this->hasMany(Photo::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public static function locatedAt($zip, $street)
    {
      $photo = new static;

      return $photo->where([
        "zip" => $zip,
        "street" => $street,
      ])->firstOrFail();
    }
    public function onwnedBy($user)
    {
      return $this->user_id == $user->id;
    }
    public function addPhoto(Photo $photo)
    {
      return $this->photos()->save($photo);
    }
    public function makePhoto(UploadedFile $file)
    {
      return $photo = new Photo ($file);
    }

}
