<div class="navigation sticky-top">
    <nav class="navbar navbar-dark bg-gradient-light">
        <ul class="nav justify-content-center">

            <!-- navigation -->
            <li class="nav-item">
                <?php foreach ($view['links'] as $item): ?>
                    <a class="nav-link active d-inline" href="<?php print $item['link']; ?>"><?php print $item['title']; ?></a>
                <?php endforeach; ?>
            </li>
        </ul>

        <!-- user data if logged in -->      
        <?php if ($view['user'] ?? false): ?>
            <div class="user-data">
                <div>
                    Logged in as: 
                    <span class="text-primary"><?php print $view['user']['name']; ?></span>
                </div>
                <div>
                    <div>
                        Current balance:
                        <span class="text-primary"><?php print $view['user']['balance']; ?>$</span>
                    </div>
                </div>
            <?php endif; ?>
    </nav>
</div>


