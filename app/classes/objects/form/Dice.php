<?php

namespace App\Objects\Form;

class Dice extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct(
                [
                    'fields' => [
                        '1' => [
                            'label' => '1 babuška',
                            'name' => 'selection',
                            'type' => 'radio',
                            'validate' => [
                                'validate_not_empty',
                            ]
                        ],
                        '2' => [
                            'label' => '2 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                                'validate_not_empty',
                            ]
                        ],
                        '3' => [
                            'label' => '3 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                                'validate_not_empty',
                            ]
                        ],
                        '4' => [
                            'label' => '4 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                                'validate_not_empty',
                            ]
                        ],
                        '5' => [
                            'label' => '5 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                                'validate_not_empty',
                            ]
                        ],
                        '6' => [
                            'label' => '6 babuškos',
                            'name' => 'selection',
                            'type' => 'radio',
                            'value' => 'radio',
                            'validate' => [
                                'validate_not_empty',
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
