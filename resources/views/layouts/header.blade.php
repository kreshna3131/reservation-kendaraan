<div href="{{ route('dashboard.index') }}" class="kpaw_custom--logo">
    <img src="{{ asset('assets/svg/logo/Logo-Admin.svg') }}" class="logo-image" alt="{{ config('app.name', 'App') }}" />
    <div class="kpaw_btn kpaw_btn--square kpaw_btn--light-warning toggle-sidebar-left"
        data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
        <svg xmlns="http://www.w3.org/2000/svg" id="Group_7367" data-name="Group 7367" width="24" height="24"
            viewBox="0 0 24 24">
            <rect id="Rectangle_3489" data-name="Rectangle 3489" width="24" height="24" fill="none" />
            <path class="kpaw_custom" id="Path_1381" data-name="Path 1381"
                d="M22,11.5A1.5,1.5,0,0,1,20.5,13H3.5a1.5,1.5,0,0,1,0-3h17A1.5,1.5,0,0,1,22,11.5Z" fill="#ff8801"
                fill-rule="evenodd" />
            <path class="kpaw_custom" id="Path_1382" data-name="Path 1382"
                d="M14.5,20a1.5,1.5,0,0,0,0-3H3.5a1.5,1.5,0,0,0,0,3ZM8.5,6a1.5,1.5,0,0,0,0-3h-5a1.5,1.5,0,0,0,0,3Z"
                fill="#ff8801" fill-rule="evenodd" opacity="0.5" />
        </svg>
    </div>
</div>

<header class="header header-nav-menu header-nav-links">
    <div class="logo-container" style="visibility: hidden">
        <a href="{{ route('dashboard.index') }}" class="logo"></a>
    </div>

    <div class="header-nav collapse">
        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 header-nav-main-square">
            <div anim="ripple" href="{{ url('/') }}" class="kpaw_btn kpaw_btn--square kpaw_btn--light-warning mr-3"
                data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                <svg xmlns="http://www.w3.org/2000/svg" id="Group_9902" data-name="Group 9902" width="24" height="24"
                    viewBox="0 0 24 24">
                    <rect id="Rectangle_3489" data-name="Rectangle 3489" width="24" height="24" fill="none" />
                    <path class="kpaw_custom" id="Path_1381" data-name="Path 1381"
                        d="M22,11.5A1.5,1.5,0,0,1,20.5,13H3.5a1.5,1.5,0,0,1,0-3h17A1.5,1.5,0,0,1,22,11.5Z"
                        fill="#ffb300" fill-rule="evenodd" />
                    <path class="kpaw_custom" id="Path_1382" data-name="Path 1382"
                        d="M14.5,20a1.5,1.5,0,0,0,0-3H3.5a1.5,1.5,0,0,0,0,3ZM8.5,6a1.5,1.5,0,0,0,0-3h-5a1.5,1.5,0,0,0,0,3Z"
                        fill="#ffb300" fill-rule="evenodd" opacity="0.5" />
                </svg>
            </div>
            <a anim="ripple" href="{{ route('dashboard.index') }}"
                class="kpaw_btn kpaw_btn--square kpaw_btn--light-primary">
                <svg xmlns="http://www.w3.org/2000/svg" id="Group_7075" data-name="Group 7075" width="24" height="24"
                    viewBox="0 0 24 24">
                    <rect id="Rectangle_4189" data-name="Rectangle 4189" width="24" height="24" fill="none" />
                    <g id="Group_7076" data-name="Group 7076">
                        <rect class="kpaw_custom" id="Rectangle_4179" data-name="Rectangle 4179" width="9" height="9"
                            rx="2" transform="translate(2 2)" fill="#5800FF" />
                        <rect class="kpaw_custom" id="Rectangle_4180" data-name="Rectangle 4180" width="9" height="9"
                            rx="2" transform="translate(13 2)" fill="#5800FF" opacity="0.3" />
                        <rect class="kpaw_custom" id="Rectangle_4181" data-name="Rectangle 4181" width="9" height="9"
                            rx="2" transform="translate(13 13)" fill="#5800FF" opacity="0.3" />
                        <rect class="kpaw_custom" id="Rectangle_4182" data-name="Rectangle 4182" width="9" height="9"
                            rx="2" transform="translate(2 13)" fill="#5800FF" opacity="0.3" />
                    </g>
                </svg>
            </a>
            <a anim="ripple"
                class="kpaw_btn kpaw_btn--light-info ml-3" style="pointer-events: none; cursor: default; text-decoration: none;">
                {{-- {{ optional(auth()->user()->roles->first())->name }} --}}
                Untuk Role
            </a>
        </div>
    </div>

    <div class="header-right">
        @yield('kpaw_action--submit')

        <div id="userbox" class="kpaw_user--box">
            <div class="dropdown dropdown-accordion" data-accordion="#accordion">
                <a href="#" class="kpaw_avatar" data-toggle="dropdown">N</span></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="kpaw_info--user">
                        <div class="kpaw_name kpaw_weight--bold">nama</div>
                        <div class="kpaw_role">role</div>
                    </div>
                    <nav class="kpaw_dropdown--item mt-3">
                        <ul>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <g id="person">
                                            <rect id="Rectangle_4197" data-name="Rectangle 4197" width="24" height="24"
                                                fill="#707793" opacity="0" />
                                            <path class="kpaw_custom" id="Path_1242" data-name="Path 1242"
                                                d="M12,11A4,4,0,1,0,8,7,4,4,0,0,0,12,11Zm0-6a2,2,0,1,1-2,2A2,2,0,0,1,12,5Z"
                                                fill="#707793" />
                                            <path class="kpaw_custom" id="Path_1243" data-name="Path 1243"
                                                d="M12,13a7,7,0,0,0-7,7,1,1,0,0,0,2,0,5,5,0,0,1,10,0,1,1,0,0,0,2,0,7,7,0,0,0-7-7Z"
                                                fill="#707793" />
                                        </g>
                                    </svg>
                                    <span>Profil Saya</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <g id="power">
                                            <rect id="Rectangle_4198" data-name="Rectangle 4198" width="24" height="24"
                                                fill="#707793" opacity="0" />
                                            <path class="kpaw_custom" id="Path_1244" data-name="Path 1244"
                                                d="M12,13a1,1,0,0,0,1-1V2a1,1,0,0,0-2,0V12A1,1,0,0,0,12,13Z"
                                                fill="#707793" />
                                            <path class="kpaw_custom" id="Path_1245" data-name="Path 1245"
                                                d="M16.59,3.11a1,1,0,1,0-.92,1.78,8,8,0,1,1-7.34,0,1,1,0,0,0-.92-1.78,10,10,0,1,0,9.18,0Z"
                                                fill="#707793" />
                                        </g>
                                    </svg>
                                    <span>Keluar</span>
                                </a>
                                <form id="logout-form" action="#" method="POST"
                                    style="display: none;">@csrf</form>
                            </li>
                        </ul>
                    </nav>

                    {{-- @canany(['update about us', 'update privacy policy', 'update term condition', 'access database',
                    'update email smtp', 'view list error', 'view authentication log', 'update two factor
                    authentication'])
                    <nav class="kpaw_dropdown--item mt-3" id="accordion">
                        <ul class="kpaw_parent">
                            @canany(['update about us', 'update privacy policy', 'update term condition', 'access
                            database', 'update email smtp', 'view list error'])
                            <li>
                                <a href="#setting" data-toggle="collapse" data-parent="#accordion">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <g id="settings">
                                            <rect id="Rectangle_4199" data-name="Rectangle 4199" width="24" height="24"
                                                fill="#707793" opacity="0" />
                                            <path class="kpaw_custom" id="_Group_" data-name="&lt;Group&gt;"
                                                d="M8.61,22a2.25,2.25,0,0,1-1.35-.46L5.19,20a2.37,2.37,0,0,1-.49-3.22,2.06,2.06,0,0,0,.23-1.86l-.06-.16a1.83,1.83,0,0,0-1.12-1.22H3.59A2.34,2.34,0,0,1,2.11,10.6L2.93,8A2.18,2.18,0,0,1,4.05,6.59a2.14,2.14,0,0,1,1.68-.12,1.93,1.93,0,0,0,1.78-.29l.13-.1a1.94,1.94,0,0,0,.73-1.51V4.33A2.32,2.32,0,0,1,10.66,2h2.55a2.26,2.26,0,0,1,1.6.67,2.37,2.37,0,0,1,.68,1.68v.28a1.76,1.76,0,0,0,.69,1.43l.11.08a1.74,1.74,0,0,0,1.59.26l.34-.11A2.26,2.26,0,0,1,21.1,7.8l.79,2.52a2.36,2.36,0,0,1-1.46,2.93l-.2.07A1.89,1.89,0,0,0,19,14.6a2,2,0,0,0,.25,1.65l.26.38a2.38,2.38,0,0,1-.5,3.23L17,21.41a2.24,2.24,0,0,1-3.22-.53l-.12-.17a1.75,1.75,0,0,0-1.5-.78,1.8,1.8,0,0,0-1.43.77l-.23.33A2.25,2.25,0,0,1,9,22,2,2,0,0,1,8.61,22ZM4.4,11.62a3.83,3.83,0,0,1,2.38,2.5v.12a4,4,0,0,1-.46,3.62.38.38,0,0,0,0,.51L8.47,20a.25.25,0,0,0,.37-.07l.23-.33a3.77,3.77,0,0,1,6.2,0l.12.18a.3.3,0,0,0,.18.12.25.25,0,0,0,.19-.05l2.06-1.56a.36.36,0,0,0,.07-.49l-.26-.38A4,4,0,0,1,17.1,14a3.92,3.92,0,0,1,2.49-2.61l.2-.07a.34.34,0,0,0,.19-.44L19.2,8.39A.35.35,0,0,0,19,8.2a.21.21,0,0,0-.19,0l-.34.11a3.74,3.74,0,0,1-3.43-.57L15,7.65a3.76,3.76,0,0,1-1.49-3V4.34a.37.37,0,0,0-.1-.26A.31.31,0,0,0,13.2,4H10.66a.31.31,0,0,0-.29.33v.25A3.9,3.9,0,0,1,8.85,7.67l-.13.1a3.91,3.91,0,0,1-3.63.59.22.22,0,0,0-.14,0,.28.28,0,0,0-.12.15L4,11.12a.36.36,0,0,0,.22.45Z"
                                                fill="#707793" />
                                            <path class="kpaw_custom" id="Path_1246" data-name="Path 1246"
                                                d="M12,15.5A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Zm0-5A1.5,1.5,0,1,0,13.5,12,1.5,1.5,0,0,0,12,10.5Z"
                                                fill="#707793" />
                                        </g>
                                    </svg>
                                    <span>Pengaturan</span>
                                </a>
                                <div class="kpaw_collapse collapse" id="setting">
                                    @canany(['update about us', 'update privacy policy', 'update term condition'])
                                    <p class="kpaw_weight--bold my-2">Umum</p>
                                    @endcanany
                                    @can('update about us')
                                    <a href="{{ route('about.index') }}">Tentang Airren</a>
                                    @endcan
                                    @can('update privacy policy')
                                    <a href="{{ route('privacy-policy.index') }}">Kebijakan Privasi</a>
                                    @endcan
                                    @can('update term condition')
                                    <a href="{{ route('term-condition.index') }}">Syarat dan Ketentuan</a>
                                    @endcan
                                    @canany(['access database', 'update email smtp', 'view list error'])
                                    <p class="kpaw_weight--bold my-2">Sistem Config</p>
                                    @endcanany
                                    @can('access database')
                                    <a href="{{ route('setting.databaseBackup') }}">Database Backup</a>
                                    @endcan
                                    @can('update email smtp')
                                    <a href="{{ route('setting.emailSMTP') }}">Email Host</a>
                                    @endcan
                                </div>
                            </li>
                            @endcanany
                            @canany(['view authentication log', 'update two factor authentication'])
                            <li>
                                <a href="#security" data-toggle="collapse" data-parent="#accordion">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" width="24"
                                        height="24" viewBox="0 0 24 24">
                                        <g id="shield">
                                            <rect id="Rectangle_4200" data-name="Rectangle 4200" width="24" height="24"
                                                fill="#707793" opacity="0" />
                                            <path class="kpaw_custom" id="Path_1247" data-name="Path 1247"
                                                d="M12,21.85a2,2,0,0,1-1-.25l-.3-.17A15.17,15.17,0,0,1,3,8.23V8.09A2,2,0,0,1,4,6.34L11,2.4a2,2,0,0,1,2,0l7,3.94a2,2,0,0,1,1,1.75v.14a15.17,15.17,0,0,1-7.72,13.2l-.3.17A2,2,0,0,1,12,21.85Zm0-17.7L5,8.09v.14a13.15,13.15,0,0,0,6.7,11.45l.3.17.3-.17A13.15,13.15,0,0,0,19,8.23V8.09Z"
                                                fill="#707793" />
                                        </g>
                                    </svg>
                                    <span>Keamanan</span>
                                </a>
                                <div class="kpaw_collapse collapse" id="security">
                                    @can('view authentication log')
                                    <a href="{{ route('authlog.index') }}" class="mt-2">Authentication Log</a>
                                    @endcan
                                    @can('update two factor authentication')
                                    <a class="mb-0" href="{{ route('setting.twoFactor') }}">Two Factor
                                        Authentication</a>
                                    @endcan
                                </div>
                            </li>
                            @endcanany
                        </ul>
                    </nav>
                    @endcanany --}}
                </div>
            </div>
        </div>
    </div>
</header>
