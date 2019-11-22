<?php


namespace moltox\yabe\Helper;


use Illuminate\Database\Eloquent\Model;

class CustomFieldHelper {

    /**
     * @param Model $model
     *
     * @return array
     */
    public function getModelsValidationRules( Model $model, $rulestoMerge = [] ) {

        $classBaseName = class_basename( $model );

        $configs = config( 'custom_fields' );

        $leadingCfFieldPattern = $configs[ 'config' ][ 'leading_cf_field_pattern' ];

        $rules = [];

        foreach ( $configs[ $classBaseName ] as $fieldName => $config ) {

            if ( isset( $config[ 'validation_rules' ] ) ) {

                $rules[ $leadingCfFieldPattern . $fieldName ] = $config[ 'validation_rules' ];

            }
        }

        $return = $rulestoMerge;

        foreach ($rules as $key => $rule)  {

            $return[ $key ] = $rule;

        }

        return $return;

    }


}
