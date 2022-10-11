<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestionSetting extends Model
{
    protected $fillable = ['screen'];

    protected $table = 'suggestion_setting';
}
