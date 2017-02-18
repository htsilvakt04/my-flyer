<?php
namespace App\Http;
class Flash
{
    public function base($title, $message, $level, $key="flash_message")
    {
      return session()->flash($key, [
        "title" => $title,
        "text" => $message,
        "type" => $level,
      ]);
    }
    public function success($title, $message)
    {
      return $this->base($title, $message, "success");
    }

    public function error($title, $message)
    {
      return $this->base($title, $message, "error");
    }
    public function info($title, $message)
    {
      return $this->base($title, $message, "info");
    }
    public function button($title, $message)
    {
      return $this->base($title, $message, "info", "flash_message_button");
    }
}
