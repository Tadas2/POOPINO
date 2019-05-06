<?php

namespace App\Objects\Form;

class Login extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct(
                [
                    'fields' => [
                        'email' => [
                            'label' => 'Email',
                            'type' => 'text',
                            'placeholder' => 'iveskite savo email',
                            'validate' => [
                                'validate_not_empty',
                                'validate_email',
                            ]
                        ],
                        'password' => [
                            'label' => 'Password',
                            'type' => 'password',
                            'placeholder' => 'Slaptazodis',
                            'validate' => [
                                'validate_not_empty',
                            ],
                        ],
                    ],
                    'buttons' => [
                        'submit' => [
                            'text' => 'Irasyti!'
                        ]
                    ],
                    'validate' => [
                        'validate_login'
                    ],
                ]
        );
    }

}
