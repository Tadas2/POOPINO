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
                            'placeholder' => 'įveskite savo email',
                            'validate' => [
                                'validate_not_empty',
                                'validate_email',
                            ]
                        ],
                        'password' => [
                            'label' => 'Password',
                            'type' => 'password',
                            'placeholder' => 'Slaptažodis',
                            'validate' => [
                                'validate_not_empty',
                            ],
                        ],
                    ],
                    'buttons' => [
                        'submit' => [
                            'text' => 'Įrašyti!'
                        ]
                    ],
                    'validate' => [
                        'validate_login'
                    ],
                ]
        );
    }

}
