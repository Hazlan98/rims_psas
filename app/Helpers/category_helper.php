<?php

use App\Models\RimsCategory;

if (!function_exists('get_category_desc')) {
    function get_category_desc($category_id)
    {
        $model = new RimsCategory();
        $category = $model->find($category_id);

        return $category ? $category->rc_desc : 'Unknown Category';
    }
}
