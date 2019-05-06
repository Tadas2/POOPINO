<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\View;

class Footer extends \Core\Page\View {
    
     public function render($tpl_path = ROOT_DIR . '/app/views/footer.tpl.php') {
        return parent::render($tpl_path);
    }
}
