<?php

namespace App\Objects\Form;

class CashIn extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct(
                [
                    'fields' => [
                        'balance' => [
                            'label' => 'Ideti piniguuu',
                            'type' => 'text',
                            'placeholder' => 'pinigeliai',
                            'validate' => [
                                'validate_not_empty',
                                'validate_is_number',
                                'validate_pos_number',
                                'validate_min_sum'
                            ]
                        ],
                    ],
                    'buttons' => [
                        'submit' => [
                            'text' => 'Ideti'
                        ]
                    ],
                    'validate' => [
                    ],
                ]
        );
    }

}
