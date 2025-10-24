<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CellController extends Controller
{
      public function selectCell()
    {
        return view('selectCell');
    }
}
