<?php


namespace moltox\yabe\Repositories;


class CustomFieldRepository {

    protected $cfg;

    public function __construct() {

        $this->cfg = config( 'custom_fields' );

    }

    public function update( $object, array $data ) {

        foreach ( $data as $idx => $value ) {

            $field = $object->field( $idx );

            if ( $field )  {

                $field->value = $value;

                $field->save();

            }  else  {

                $cfg = $this->getFieldsCfg( $object, $idx );

                $newFieldData = array(

                    'name' => $idx,
                    'value' => $value,
                    'type' => $cfg['type'],
                    'content_type' => $cfg['content_type']

                );

                $object->customFields()->create( $newFieldData );

            }

        }

        return $object;

    }


    private function getFieldsCfg( $object, $field ) {

        return $this->cfg[class_basename( $object )][$field];

    }

}
