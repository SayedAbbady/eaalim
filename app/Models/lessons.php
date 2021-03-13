<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
  protected $fillable = [
    'l_name','l_video','l_notes','l_quiz','l_game','l_level','l_file','l_num'
  ];

  public $timestamps = false;
}
