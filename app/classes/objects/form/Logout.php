<?php

namespace App\Objects\Form;

class Logout extends \Core\Page\Objects\Form {

    public function __construct() {
        parent::__construct(
                [
                    'fields' => [],
                    'buttons' => [
                        'submit' => [
                            'text' => 'Logout bič!'
                        ]
                    ],
                    'validate' => [],
                    'callbacks' => [
                        'success' => [],
                        'fail' => []
                    ]
                ]
        );
    }

}
