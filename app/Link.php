<?php

namespace App;

use App\Exceptions\CodeGenerationException;
use App\Helpers\Math;
use App\Traits\Eloquent\TouchesTimestamps;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use TouchesTimestamps;

    protected $guarded = [];

    protected $dates = [
        'last_requested', 'last_used',
    ];

    public function getCode()
    {
        if ($this->id === null) {
            throw new CodeGenerationException;
        }

        return (new Math)->toBase($this->id);
    }

    public static function byCode($code)
    {
        return static::where('code', $code);
    }

    public function shortenedUrl()
    {
        if ($this->code === null) {
            return null;
        }
        return env('CLIENT_URL') . '/' . $this->code;
    }
}
