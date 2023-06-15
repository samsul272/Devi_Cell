<!-- ====== Menu Navbar Bottom karyawan ====== -->
<nav class="navbar navbar-dark navbar navbar-expand navbar-default navbar-light fixed-bottom d-md-none d-lg-none d-xl-none p-0">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item <?php if ($hal == 'MyApp/karyawan') {
                                echo 'active';
                            } ?>">
            <a href="?page=MyApp/karyawan" class="nav-link text-center">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg>
                <span class="small d-block">Home</span>
            </a>
        </li>
        <li class="nav-item dropup <?php if (
                                        $hal == 'i_data_kmk' || $hal == 'o_data_kmk'
                                        || $hal == 'rekap_kmk'
                                    ) {
                                        echo 'active';
                                    } ?>">
            <a href="#" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z" />
                </svg>
                <span class="small d-block">Transaction</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuProfil">
                <a class="dropdown-item <?php if ($hal == 'i_data_kmk') {
                                            echo 'active';
                                        } ?>" href="?page=i_data_kmk">Pemasukan</a>
                <a class="dropdown-item <?php if ($hal == 'o_data_kmk') {
                                            echo 'active';
                                        } ?>" href="?page=o_data_kmk">Pengeluaran</a>
                <a class="dropdown-item <?php if ($hal == 'rekap_kmk') {
                                            echo 'active';
                                        } ?>" href="?page=rekap_kmk">Rekap</a>
            </div>
        </li>
        <li class="nav-item dropup <?php if ($hal == 'MyApp/data_pengguna' || $hal == 'MyApp/profile' || $hal == 'MyApp/about' || $hal == 'lap_pulsa') {
                                        echo 'active';
                                    } ?>">
            <a href="#" class="nav-link text-center" role="button" id="dropdownMenuProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg width="1.5em" height="1.5em" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                </svg>
                <span class="small d-block">Setting</span>
            </a>
            <!-- Dropup menu for profile -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuProfile">
                <a class="dropdown-item <?php if ($hal == 'MyApp/profile') {
                                            echo 'active';
                                        } ?>" href="?page=MyApp/profile">Profil</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item <?php if ($hal == 'lap_pulsak') {
                                            echo 'active';
                                        } ?>" href="?page=lap_pulsak">Print</a>
                <a class="dropdown-item <?php if ($hal == 'MyApp/about') {
                                            echo 'active';
                                        } ?>" href="?page=MyApp/about">About</a>
                <a class="dropdown-item text-danger" href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>