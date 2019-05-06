<?php

namespace App\Objects\Form;

class Register extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct([
            'pre_validate' => [],
            'fields' => [
                'email' => [
                    'label' => 'Email',
                    'type' => 'text',
                    'placeholder' => 'iveskite savo email',
                    'validate' => [
                        'validate_not_empty',
                        'validate_email',
                        'validate_user_exists',
                    ]
                ],
                'full_name' => [
                    'label' => 'Full Name',
                    'type' => 'text',
                    'placeholder' => 'iveskite varda ir pavarde',
                    'validate' => [
                        'validate_not_empty',
                        'validate_contain_number'
                    ]
                ],
                'age' => [
                    'label' => 'Age',
                    'type' => 'number',
                    'placeholder' => 'iveskite savo amziu',
                    'validate' => [
                        'validate_not_empty',
                        'validate_age',
                    ]
                ],
                'gender' => [
                    'label' => 'Gender',
                    'type' => 'select',
                    'placeholder' => 'pasirinkite savo lyti',
                    'validate' => [
                        'validate_not_empty',
                        'validate_select_option'
                    ],
                    'options' => \Core\User\User::getGenderOptions(),
                ],
                'orientation' => [
                    'label' => 'Orientation',
                    'type' => 'select',
                    'placeholder' => 'pasirinkite savo orientacija',
                    'validate' => [
                        'validate_not_empty',
                        'validate_select_option'
                    ],
                    'options' => \Core\User\User::getOrientationOptions(),
                ],
                'photo' => [
                    'label' => 'photo',
                    'type' => 'file',
                    'placeholder' => 'file',
                    'validate' => [
                        'validate_file'
                    ]
                ],
                'password' => [
                    'label' => 'Password',
                    'type' => 'password',
                    'placeholder' => 'Slaptazodis',
                    'validate' => [
                        'validate_not_empty',
                        'validate_char'
                    ],
                ],
                'repeat_password' => [
                    'label' => 'Repeat Password',
                    'type' => 'password',
                    'placeholder' => 'Pakartok Slaptazodi',
                    'validate' => [
                        'validate_not_empty',
                        'validate_char'
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'text' => 'Irasyti!'
                ]
            ],
            'validate' => [
                'validate_password',
                'validate_form_file',
            ],
        ]);
    }

}
