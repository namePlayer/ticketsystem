<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= $requestedPath ?>/home">TicketSystem</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= $requestedPath ?>/home">Start</a>
                </li>
                <?php if(isLoggedIn()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $requestedPath ?>/mytickets">Tickets</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php
                if(isLoggedIn()):
                ?>
                    <?php
                    if($accountSource->hasSupportBackend()):
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $requestedPath ?>/myaccount">Support-Bereich</a>
                        </li>
                    <?php
                    endif;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $requestedPath ?>/myaccount">Mein Konto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $requestedPath ?>/logout">Abmelden</a>
                    </li>
                <?php
                else:
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $requestedPath ?>/login">Anmelden</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $requestedPath ?>/register">Registrieren</a>
                    </li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
</nav>