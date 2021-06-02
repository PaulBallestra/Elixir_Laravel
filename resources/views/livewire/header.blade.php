<nav class="bg-black" style="opacity: 0.85;">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!--
                      Icon when menu is closed.
                      Heroicon name: outline/menu
                      Menu open: "hidden", Menu closed: "block"
                    -->

                    <!-- BURGER MENU -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <!--
                      Icon when menu is open.
                      Heroicon name: outline/x
                      Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/">
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block lg:hidden h-8 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                        <img class="hidden lg:block h-8 w-auto"
                             src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg"
                             alt="Workflow">
                    </div>
                </a>
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">

                        {{ Request::segment(1) }}

                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="/actualites"
                           class="hover:bg-gray-700 text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-sans titleHeaderClass @if(Request::segment(1) === 'actualites') bg-gray-900 text-white  @endif">ACTUALITÉS</a>

                        <a href="/service"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans titleHeaderClass @if(Request::segment(1) === 'service') bg-gray-900 text-white @endif">SERVICE</a>

                        <a href="/contact"
                           class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans titleHeaderClass @if(Request::segment(1) === 'contact') bg-gray-900 text-white @endif">CONTACT</a>

                        @if (Route::has('login'))
                            @auth
                                <a href="/abonnement"
                                   class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans titleHeaderClass @if(Request::segment(1) === 'abonnement') bg-gray-900 text-white @endif">ABONNEMENT</a>

                                <a href="/logout"
                                   class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans titleHeaderClass">LOGOUT</a>

                                <a href="/profile" class="hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans @if(Request::segment(1) === 'profile') bg-gray-900 @endif"><svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/></svg> </a>

                            @else

                                    @if (Route::has('register'))

                                    <a href="/login"
                                       class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans titleHeaderClass">LOGIN</a>

                                    <a href="/register"
                                       class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans titleHeaderClass">REGISTER</a>

                                    @endif
                                @endauth
                        @endif

                        <a href="/search"
                           class="hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans">
                            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20"
                                 height="20" viewBox="0 0 24 24">
                                <path
                                    d="M23.822 20.88l-6.353-6.354c.93-1.465 1.467-3.2 1.467-5.059.001-5.219-4.247-9.467-9.468-9.467s-9.468 4.248-9.468 9.468c0 5.221 4.247 9.469 9.468 9.469 1.768 0 3.421-.487 4.839-1.333l6.396 6.396 3.119-3.12zm-20.294-11.412c0-3.273 2.665-5.938 5.939-5.938 3.275 0 5.94 2.664 5.94 5.938 0 3.275-2.665 5.939-5.94 5.939-3.274 0-5.939-2.664-5.939-5.939z"/>
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="/actualites"
               class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-sans titleHeaderClass"
               aria-current="page">ACTUALITÉS</a>

            <a href="/service"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-sans titleHeaderClass">SERVICE</a>

            <a href="/contact"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-sans titleHeaderClass">CONTACT</a>

            <a href="/login"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-sans titleHeaderClass">LOGIN</a>

            <a href="/register"
               class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-sans titleHeaderClass">REGISTER</a>

            <a href="/search"
               class="hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-sans">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                     viewBox="0 0 22 22">
                    <path
                        d="M23.822 20.88l-6.353-6.354c.93-1.465 1.467-3.2 1.467-5.059.001-5.219-4.247-9.467-9.468-9.467s-9.468 4.248-9.468 9.468c0 5.221 4.247 9.469 9.468 9.469 1.768 0 3.421-.487 4.839-1.333l6.396 6.396 3.119-3.12zm-20.294-11.412c0-3.273 2.665-5.938 5.939-5.938 3.275 0 5.94 2.664 5.94 5.938 0 3.275-2.665 5.939-5.94 5.939-3.274 0-5.939-2.664-5.939-5.939z"/>
                </svg>
            </a>

        </div>
    </div>
</nav>
