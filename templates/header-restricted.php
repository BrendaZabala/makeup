<button id="burger-menu-button">
    <i class="fas fa-bars" id="open-mobile-menu"></i>
    <i class="fas fa-times" id="close-mobile-menu"></i>
</button>
<nav class="restricted-nav">
    <ul id="main-menu">
        <li class="menu-item">
            <a href="index-logged.php" id="nav-home">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <polyline points="5 12 3 12 12 3 21 12 19 12" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
            </a>
        </li>
        <li class="menu-item menu"><a href="search-logged.php">Search</a></li>
        <li class="menu-item menu"><a href="random-logged.php">Random</a></li>
        <li class="menu-item menu"><a href="all-products-logged.php">All products</a></li>
        <li class="menu-item menu"><a href="#seccion-4">Contact</a></li>
        <li class="menu-item menu"><p id="restricted-username"><?php echo $username ?></p></li>
        <li class="menu-item menu">
            <a href="index.php" id="logout">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M7 12h14l-3 -3m0 6l3 -3" />
                </svg>
            </a>
        </li>
    </ul>
</nav>