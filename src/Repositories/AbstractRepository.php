<?php


namespace moltox\yabe\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AbstractRepository {

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var boolean
     */
    protected $modelHasCustomFields;

    /**
     * @var string
     */
    protected $modelsClassBaseName;

    /**
     * @var array
     */
    protected $modelsCustomFieldConfig;

    /**
     * @var array     *
     */
    protected $customFieldsConfig;

    public function __construct( Model $model ) {

        $this->model = $model;

        $this->modelsClassBaseName = class_basename( $model );

        $configString = 'custom_fields.' . $this->modelsClassBaseName;

        $this->modelsCustomFieldConfig = config( $configString );

        $this->customFieldsConfig = config( 'custom_fields.config' );

        $this->modelHasCustomFields = in_array('moltox\yabe\traits\Yabe', class_uses( $model ) );

    }

    public function destroy( $id ) {

        $model = $this->model->find( $id );

        if ($this->modelHasCustomFields)  {

            $model->customFields()->delete();

        }

        return $model->delete();

    }

    /**
     * @param $id
     * @param $request
     *
     * @return mixed
     *
     *   Function to update (and save!) a request according to the
     *   given model.
     *
     *   Customfields are also updated / created if in request
     *
     */
    public function update( $id, $request ) {

        // TODO add password check

        /**
         * @var Model
         */
        $model = $this->model->find( $id );

        if ( $this->modelHasCustomFields ) {

            $parsedCustomFields = $this->getParsedCustomFieldsFromRequest( $request );

            $model = $this->updateCustomFields( $model, $parsedCustomFields );

        }

        $request = $this->clearRequestFromCustomFields( $request );

        $model->update( $request->all() );

        $model->save();

        return $model;

    }

    public function clearRequestFromCustomFields( $request ) {

        $leadingCfFieldPattern = $this->customFieldsConfig[ 'leading_cf_field_pattern' ];

        $requestDatas = $request->all();

        foreach ( $requestDatas as $key => $data ) {

            if ( strpos( $key, $leadingCfFieldPattern ) ) {

                unset ( $request[ $key ] );

            }

        }

        return $request;

    }



    public function updateCustomFields( $object, array $data ) {

        foreach ( $data as $idx => $value ) {

            $field = $object->field( $idx );

            if ( $field ) {

                $field->value = $value;

                $field->save();

            } else {

                $cfg = $this->getFieldsCfg( $idx );

                $newFieldData = array(

                    'name' => $idx,
                    'value' => $value,
                    'type' => $cfg[ 'type' ],
                    'content_type' => $cfg[ 'content_type' ]

                );

                $object->customFields()->create( $newFieldData );

            }

        }

        return $object;

    }

    private function getFieldsCfg( $field ) {

        return $this->modelsCustomFieldConfig[ $field ];

    }

    /**
     * @param $request
     *
     * @return array
     */
    private function getParsedCustomFieldsFromRequest( $request ) {

        $cfConfig = $this->modelsCustomFieldConfig;

        $leadingCfFieldPattern = $this->customFieldsConfig[ 'leading_cf_field_pattern' ];

        $data = $request->all();

        $parsedData = [];

        foreach ( $cfConfig as $fieldName => $cfg ) {

            switch ( $cfg[ 'type' ] ) {

                case 'text':
                case 'bulma_dropdown':
                case 'radio':

                    if ( $request->has( $leadingCfFieldPattern . $fieldName ) && $request[ $leadingCfFieldPattern . $fieldName] != null ) {

                        $parsedData[ $fieldName ] = $request[ $leadingCfFieldPattern . $fieldName ];

                    }

                    break;

                case 'checkbox':

                    if ( $request->has( $leadingCfFieldPattern . $fieldName ) && ( $request[$leadingCfFieldPattern . $fieldName] == '1' || $request[$leadingCfFieldPattern . $fieldName] == 'on' ) ) {

                        $parsedData[ $fieldName ] = '1';

                    }  else  {

                        $parsedData[ $fieldName ] = '0';

                    }

                    break;

            }
        }


        return $parsedData;

    }


}
