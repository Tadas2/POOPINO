<?php

namespace App\Objects\Form;

class CashIn extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct(
                [
                    'fields' => [
                        'balance' => [
                            'label' => 'Įdėti pinigų',
                            'type' => 'text',
                            'placeholder' => 'čia',
                            'validate' => [
                                'validate_not_empty',
                                'validate_is_number',
                                'validate_pos_number',
                                'validate_min_sum',
                                'validate_max_number',
                                'validate_is_float',
                            ]
                        ],
                    ],
                    'buttons' => [
                        'submit' => [
                            'text' => 'Įdėti'
                        ]
                    ],
                    'validate' => [
                    ],
                ]
        );
    }

}
