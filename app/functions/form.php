<?php

require_once '../bootloader.php';

function validate_age($field_input, &$field, $safe_input) {
    if ($field_input <= 18) {
        $field['error_msg'] = 'Nepilnameciai nezaidzia';
    } else {
        return true;
    }
}

function validate_password(&$safe_input, &$form) {
    if ($safe_input['password'] === $safe_input['repeat_password']) {
        return true;
    } else {
        $form['error_msg'] = 'nesutampa slaptazodziai';
    }
}

function validate_select_option($field_input, &$field, &$safe_input) {
    if (array_key_exists($field_input, $field['options'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field yra neteisingas', ['@field' => $field['label']
        ]);
    }
}

function validate_char($field_input, &$field, $safe_input) {
    $min_char = 8;
    if (mb_strlen($field_input) < $min_char) {
        $field['error_msg'] = 'Per trumpas pass';
    } else {
        return true;
    }
}

function validate_pos_number($field_input, &$field, $safe_input) {
    if ($field_input <= 0) {
        $field['error_msg'] = 'Negali buti neigiamas skaitmuo';
    } else {
        return true;
    }
}

function validate_above_1($field_input, &$field, $safe_input) {
    if ($field_input <= 0) {
        $field['error_msg'] = 'Negali buti neigiamas skaitmuo';
    } else {
        return true;
    }
}

function validate_is_number($field_input, &$field, $safe_input) {
    if (!is_numeric($field_input)) {
        $field['error_msg'] = 'Ei, reikia ivesti skaiciu!';
    } else {
        return true;
    }
}

function validate_min_sum($field_input, &$field, $safe_input) {
    $min_char = 5;
    if ($field_input < $min_char) {
        $field['error_msg'] = 'Per maza suma';
    } else {
        return true;
    }
}

function validate_max_number($field_input, &$field, $safe_input) {
    if ($field_input >= 10000) {
        $field['error_msg'] = 'Nestatyk tiek daug pinigu';
    } else {
        return true;
    }
}
