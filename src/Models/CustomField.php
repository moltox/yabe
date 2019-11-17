<?php

namespace moltox\yabe\Models;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{

    protected $fillable = ['name', 'value', 'image', 'file', 'type', 'content_type', 'created_at', 'updated_at'];

    public function customFieldable(  ) {

        return $this->morphTo();

    }

}
