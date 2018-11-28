<nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 55px;">
    <a class="navbar-brand" href="index.php">Home</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <?php if(!loginController()): 
            // Aca uso el controller de login para darle dinamica a la navbar.
            // Solo muestro Login y Register a usuarios no autenticados!
        ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php endif;
        
        ?>
        <?php if(isset($_SESSION['email'])): ?>
        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php endif;?>
        <?php 
        if(isset($_SESSION['email'])):
            if(checkRole($_SESSION['email']) == 7):

            ?>
            <li class="nav-item"><a class="nav-link" href="backend.php">Administrar</a></li>
            <?php endif;?>
        <?php endif;?>
        </ul>
    </div>
</nav>
