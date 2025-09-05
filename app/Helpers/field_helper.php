<?php

use App\Models\RimsField;

if (!function_exists('get_field_desc')) {
    function get_field_desc($field_id)
    {
        $model = new RimsField();
        $field = $model->find($field_id);

        return $field ? $field->rf_desc : 'Unknown Field';
    }
}
