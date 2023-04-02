<?php

namespace Ferdiunal\History\Tests;

use Illuminate\Database\Eloquent\Model;
use Ferdiunal\History\HasHistories;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes, HasHistories;
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = [];

    public function getModelLabel()
    {
        return $this->getOriginal('title', $this->title);
    }
}