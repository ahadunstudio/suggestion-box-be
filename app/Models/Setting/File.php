<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    protected $guarded = [];

    protected $appends = [
        'filename_formated',
    ];

    public function filenameFormated(): Attribute
    {
        return Attribute::make(
            get: fn () => env('APP_URL') . '/storage/' . $this->filename
        );
    }
}
