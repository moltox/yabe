<?php


namespace moltox\yabe\traits;


trait CustomField {

    public function field( $fieldname ) {

        return $this->customFields()->getQuery()->where('name', $fieldname)->get()->first();

    }

    public function customFields()  {

        return $this->morphMany('moltox\yabe\Models\CustomField', 'custom_fieldable');

    }

}
