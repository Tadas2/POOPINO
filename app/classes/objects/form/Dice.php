<?php

namespace App\Objects\Form;

class Dice extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct(
                [
                    'fields' => [
                        'bobutes' => [
                            'name' => 'selection',
                            'type' => 'radio',
                            'label' => '',
                            'options' => [
                                [
                                    'value' => 1,
                                    'img' => 'bobute-1'
                                ],
                                [
                                    'value' => 2,
                                    'img' => 'bobute-2'
                                ],
                                [
                                    'value' => 3,
                                    'img' => 'bobute-3'
                                ],
                                [
                                    'value' => 4,
                                    'img' => 'bobute-4'
                                ],
                                [
                                    'value' => 5,
                                    'img' => 'bobute-5'
                                ],
                                [
                                    'value' => 6,
                                    'img' => 'bobute-6'
                                ],
                            ],
                            'validate' => [
                            ]
                        ],
                        'input' => [
                            'label' => 'Statai',
                            'type' => 'number',
                            'placeholder' => 'iveskite statoma suma',
                            'validate' => [
                                'validate_not_empty',
                                'validate_is_number',
                                'validate_above_1',
                                'validate_max_number'
                            ]
                        ],
                    ],
                    'buttons' => [
                        'submit' => [
                            'text' => 'Mesti Bobute!'
                        ]
                    ],
                    'validate' => [
                    ],
                ]
        );
    }

}
