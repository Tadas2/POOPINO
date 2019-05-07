<?php

namespace App\Objects\Form;

class Dice extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct(
                [
                    'fields' => [
                        'bobute-1' => [
                            'label' => '1 babuška',
                            'name' => 'selection',
                            'type' => 'radio',
                            'validate' => [
                            ]
                        ],
                        'bobute-2' => [
                            'label' => '2 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                            ]
                        ],
                        'bobute-3' => [
                            'label' => '3 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                            ]
                        ],
                        'bobute-4' => [
                            'label' => '4 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                            ]
                        ],
                        'bobute-5' => [
                            'label' => '5 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                            ]
                        ],
                        'bobute-6' => [
                            'label' => '6 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                            ]
                        ],
                        'input' => [
                            'label' => 'Tavo statymas',
                            'type' => 'number',
                            'placeholder' => 'iveskite savo statoma suma',
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
