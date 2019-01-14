<?php

namespace Grundmanis\Laracms\Modules\MailTemplate\Models;

use Illuminate\Database\Eloquent\Model;

class LaracmsMailTemplateTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'body'];
}
