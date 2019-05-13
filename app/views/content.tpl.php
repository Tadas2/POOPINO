<div class="content">
    <h1><?php print $view['title']; ?></h1>
    <h2><?php print $view['subtitle'] ?? false; ?></h2>
    <div class="<?php print $view['class'] ?? false; ?>"><?php print $view['form'] ?? false; ?></div>
    <h4><?php print $view['message'] ?? false; ?></h4>
    <h3><?php print $view['balance'] ?? false; ?></h3>



</div>