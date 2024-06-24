<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NLOffice</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,0" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/akar-icons-fonts"></script>
</head>

<body>
    <aside class="sidebar">
        <nav>
            <ul>
                <li>
                    <button type="button" onclick="window.location='{{ url('/dashboard') }}'">
                        <i class="ai-dashboard"></i>
                        <p>Dashboard</p>
                    </button>
                </li>
                <li>
                    <button type="button" onclick="expandAndCollapseItem(this)">
                        <i class="ai-person"></i>
                        <p>Personel</p>
                        <i class="ai-chevron-down-small"></i>
                    </button>
                    <div class="sub-menu">
                        <ul>
                            <li>
                                <button type="button"
                                    onclick="window.location='{{ url('/department') }}'">Department</button>
                            </li>
                            <li>
                                <button type="button" onclick="window.location='{{ url('/position') }}'">
                                    <p>Position</p>
                                </button>
                            </li>
                            <li>
                                <button type="button" onclick="window.location='{{ url('/staff') }}'">Staff</button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button type="button" onclick="expandAndCollapseItem(this)">
                        <i class="ai-money"></i>
                        <p>Salary</p>
                        <i class="ai-chevron-down-small"></i>
                    </button>
                    <div class="sub-menu">
                        <ul>
                            <li>
                                <button type="button">Payroll</button>
                                <button type="button">Wage</button>
                                <button type="button">Gross salary</button>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button type="button" onclick="expandAndCollapseItem(this)">
                        <i class="ai-gear"></i>
                        <p>Settings</p>
                        <span>
                            <div class="sub-menu"></div>
                        </span>
                        <i class="ai-chevron-down-small"></i>
                    </button>
                    <div class="sub-menu">
                        <ul>
                            <li>
                                <button type="button" onclick="">
                                    <p>Your enterprise</p>
                                </button>
                            </li>
                            <li>
                                <button type="button" onclick="">
                                    <p>Maintanence mode</p>
                                </button>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
    </aside>
    <section id="top-nav-bar">
        <nav>
            <button type="button" class="burger" onclick="toggleSidebar()"><i class="fa fa-bars"
                    aria-hidden="false"></i></button>
        </nav>
    </section>
    {{-- <section id="main-body-web">
        <div>
            @yield('main-body-web')
        </div>
    </section> --}}
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
