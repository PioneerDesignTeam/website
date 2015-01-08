<?php

$repeaterRow = array();
foreach ($data as $key => $value) {
    if (preg_match('/^acf_(.*)/', $key, $matches) && $value != '') {
        $repeaterRow[$matches[1]] = $value;
    }
}
global $repeaterRowId;
if ($id) {
    $repeaterRowId = $id;
}

//$field = get_field('available_finishes');
//var_dump($field, acf_settings());

if (!empty($repeaterRow) && isset($repeaterRowId) && $repeaterRowId ) {
    $field = get_field('field_53df98f1dde57', $repeaterRowId); // 'available_finishes'
    //var_dump($field, $repeaterRowId);
    if ($field && is_array($field)) {
    } else {
        $field = array();
    }
    $field[] = $repeaterRow;
    update_field('field_53df98f1dde57', $field, $repeaterRowId);
}
//var_dump('next');
//var_dump($repeaterRow, $field);

//$repeaterFields = array();
//foreach ($data as $key => $value) {
//    if (preg_match('/^acf_(.*)/', $key, $matches) && $value != '') {
//        $repeaterFields[$matches[1]] = $value;
//        if ($id) {
//            $id = 191;
//            $post = get_post($id);
//            $fieldId = 'available_finishes';//'field_53df98f1dde57'; //available_finishes
//            $fieldId1 = 'field_53df98f1dde57'; //available_finishes
//            $subField = $matches[1];
//            $rows = get_field($fieldId);
//            $rows1 = get_field($fieldId1);
//            //var_dump($post, $rows, $rows1, $subField); die();
//            
//            $fields = get_fields($id);
//
//            if ($fields) {
//                foreach ($fields as $field_name => $value) {
//                    // get_field_object( $field_name, $post_id, $options )
//                    // - $value has already been loaded for us, no point to load it again in the get_field_object function
//                    $field = get_field_object($field_name, false, array('load_value' => false));
//
//                    echo '<div>';
//                    echo '<h3>' . $field_name . '</h3>';
//                    echo $value;
//                    echo '</div>';
//                }
//            }
//            //var_dump($fields);
//            
//            $field = get_field('available_finishes', $id);
//            var_dump($field);
//
//            die();
//        }
//    }
//}
//var_dump($id, $data, $repeaterFields);