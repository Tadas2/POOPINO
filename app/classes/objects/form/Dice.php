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
                                'bobute-1'=> 1, 'bobute-2' => 2, 'bobute-3'=> 3, 'bobute-4' => 4, 'bobute-5' => 5, 'bobute-6'=>6
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
                                'validate_pos_number'
                            ]
                        ],
                    ],
                    'buttons' => [
                        'submit' => [
                            'text' => 'Irasyti!'
                        ]
                    ],
                    'validate' => [
                    ],
                ]
        );
    }

}
