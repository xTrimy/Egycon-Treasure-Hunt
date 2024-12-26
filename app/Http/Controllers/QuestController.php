<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BelongingHistory;


class QuestController extends Controller
{
  public function view()
  {
    return inertia('Quest/Home');
  }
}
