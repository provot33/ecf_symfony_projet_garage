<?php
function arrayToSelect($option, $selected = '')
{
    $returnStatement = '<select>';

    if ($selected == '') {
        $returnStatement .= '<option value="0" selected="selected"> --- </option>';
    } else {
        $returnStatement .= '<option value="0"> --- </option>';
    }

    foreach ($option as $key => $value) {
        if ($key == $selected) {
            $returnStatement .= '<option selected="selected" value="' . $key . '">' . $value . '</option>';
        } else {
            $returnStatement .= '<option value="' . $key . '">' . $value . '</option>';
        }
    }

    $returnStatement .= '</select>';
    return $returnStatement;
}
?>