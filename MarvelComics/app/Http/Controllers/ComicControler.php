<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ComicControler extends Controller
{
    public function getAllcomics() {
   $comics = Comic::get()->toJson(JSON_PRETTY_PRINT);
   return response($comics, 200);
  }
}
