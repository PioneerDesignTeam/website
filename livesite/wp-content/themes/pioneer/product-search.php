<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IRHelper {
    
    static function getValues($fieldName, $postType, $taxonomyId = null) {
        global $wpdb;
        $sql = "SELECT distinct meta_value FROM wp_postmeta met INNER JOIN wp_posts pst ON pst.id=met.post_id
                 WHERE meta_key like '$fieldName'
                   AND pst.post_type = '$postType'
                   AND pst.post_status = 'publish'
                   AND meta_value not like 'field\_%'";
        if ($taxonomyId) {
            $sql .= ' and exists (select 1 from wp_term_relationships where term_taxonomy_id = '.$taxonomyId.' and object_id = met.post_id)';
        }
        //var_dump($sql);
        $values = $wpdb->get_col($sql);
        sort($values); 
        return $values;
    }
}
    