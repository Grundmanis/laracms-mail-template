<?php

namespace Grundmanis\Laracms\Modules\MailTemplate\Models;

use Illuminate\Database\Eloquent\Model;

class LaracmsMailTemplate extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translatedAttributes = ['title', 'body'];

    protected $fillable = ['icon'];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
