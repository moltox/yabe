<?php

namespace moltox\yabe;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    protected $fillable = ['name', 'title', 'url', 'menu_icon', 'context', 'permission', 'sequence', 'parent_id', 'parent', 'active'];

    public function getParentNameAttribute() {

        if ($this->parent_id == 0) return '';

        $query = $this->newQuery();

        $query = $query->select('name')
            ->where('id', $this->parent_id)
            ->first();

        return $query->name;

    }

    public function getChildsAttribute()  {

        $childs = $this->newQuery()->where('parent_id', $this->id );

        return $childs->get();

    }

    public function getParentMenuAttribute()  {

        $parent = $this->newQuery()->where('id', $this->parent_id );

        return $parent->first();

    }

}
