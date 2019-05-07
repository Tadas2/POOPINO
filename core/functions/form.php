<?php

require_once '../bootloader.php';

/**
 * Checks if field is empty
 * 
 * @param string $field_input
 * @param array $field $form Field
 * @return boolean
 */
function validate_not_empty($field_input, &$field, $safe_input) {
    if (strlen($field_input) == 0) {
        $field['error_msg'] = strtr('Neuzpildei, '
                . '@field !', ['@field' => $field['label']
        ]);
    } else {
        return true;
    }
}

function validate_user_exists($field_input, &$field, &$safe_input) {

    if (!\App\App::$user_repo->exists($field_input)) {
        return true;
    } else {
        var_dump('ERROR');
        $field['error_msg'] = 'Tokiu emailu useris jau yra!';
    }
}

/**
 * Checks if field is a number
 * 
 * @param string $field_input
 * @param array $field $form Field
 * @return boolean
 */
function validate_contain_number($field_input, &$field, $safe_input) {
    if (is_numeric($field_input)) {
        $field['error_msg'] = 'Full name '
                . 'negali turreti skaiciu';
    } else {
        return true;
    }
}

function validate_file($field_input, &$field, &$safe_input) {
    $file = $_FILES[$field['id']] ?? false;
    if ($file) {
        if ($file['error'] == 0) {
            $safe_input[$field['id']] = $file;
            return true;
        }
    }

    $field['error_msg'] = 'Nenurodei fotkes';
}

function validate_email($field_input, &$field, &$safe_input) {
    if (preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $safe_input['email'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field blogai uzrasytas!', ['@field' => $field['label']
        ]);
    }
}

function validate_field_select($field_input, &$field, &$safe_input) {
    if (array_key_exists($field_input, $field['options'])) {
        return true;
    } else {
        $field['error_msg'] = strtr('Jobans/a tu buhurs/gazele, '
                . 'nes @field yra neteisingas', ['@field' => $field['label']
        ]);
    }
}

function validate_login(&$safe_input, &$form) {
    $status = \App\App::$session->login($safe_input['email'], $safe_input['password']);
    switch ($status) {
        case Core\User\Session::LOGIN_SUCCESS:
            return true;
    }

    $form['error_msg'] = 'Blogas Email/Password!';
}

function validate_form_file(&$safe_input, &$form) {
    $file_saved_url = save_file($safe_input['photo']);
    if ($file_saved_url) {
        $safe_input['photo'] = 'uploads/' . $file_saved_url;
        return true;
    } else {
        $form['error_msg'] = 'blogas failas';
    }
}

function save_file($file, $dir = 'uploads', $allowed_types = ['image/png', 'image/jpeg', 'image/gif']) {
    if ($file['error'] == 0 && in_array($file['type'], $allowed_types)) {
        $target_file_name = microtime() . '-' . strtolower($file['name']);
        $target_path = $dir . '/' . $target_file_name;
        if (move_uploaded_file($file['tmp_name'], $target_path)) {
            return $target_file_name;
        }
    }
    return false;
}
