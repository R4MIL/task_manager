<?php
function recursion($array, & $hierarchy, $parent = null)
{
    foreach ($array as $arr) {
        if ($arr['parent_id'] == $parent) {
            $hierarchy[] = $arr;
            recursion($array, $hierarchy, $arr['id']);
        }
    }
    return $hierarchy;
}

?>