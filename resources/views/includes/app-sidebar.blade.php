{{-- <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button> --}}

<aside id="logo-sidebar"
    class="fixed md:top-24 2xl:top-16 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full  py-4 bg-brand overflow-y-auto ">
        <a href="/dashboard" class="text-center grid items-center ps-2.5 mb-5">
            <img src="{{ Vite::asset('resources/images/ictc_logo.svg') }}" class="w-32 h-auto mx-auto"
                alt="Flowbite Logo" />
            <span class="self-center text-[0.8rem] text-secondary font-semibold whitespace-nowrap dark:text-white">Events
                Management System</span>
        </a>
        <ul class="space-y-2 font-medium">
            <x-side-bar-link name="Dashboard" link="{{ route('dashboard') }}" route='dashboard'
                active="{{ request()->routeIs('dashboard') }}">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_568_331)">
                        <path
                            d="M8.892 0.555207C8.64716 0.334832 8.32941 0.212891 8 0.212891C7.67059 0.212891 7.35284 0.334832 7.108 0.555207L0 6.95254V13.8859C0 14.4517 0.224761 14.9943 0.624839 15.3944C1.02492 15.7944 1.56754 16.0192 2.13333 16.0192H13.8667C14.4325 16.0192 14.9751 15.7944 15.3752 15.3944C15.7752 14.9943 16 14.4517 16 13.8859V6.95254L8.892 0.555207ZM10 14.6839H6V11.3332C6 10.8028 6.21071 10.2941 6.58579 9.91899C6.96086 9.54392 7.46957 9.33321 8 9.33321C8.53043 9.33321 9.03914 9.54392 9.41421 9.91899C9.78929 10.2941 10 10.8028 10 11.3332V14.6839ZM14.6667 13.8839C14.6667 14.096 14.5824 14.2995 14.4324 14.4496C14.2823 14.5996 14.0788 14.6839 13.8667 14.6839H11.3333V11.3332C11.3333 10.4492 10.9821 9.60131 10.357 8.97618C9.7319 8.35106 8.88406 7.99987 8 7.99987C7.11595 7.99987 6.2681 8.35106 5.64298 8.97618C5.01786 9.60131 4.66667 10.4492 4.66667 11.3332V14.6839H2.13333C1.92116 14.6839 1.71768 14.5996 1.56765 14.4496C1.41762 14.2995 1.33333 14.096 1.33333 13.8839V7.54587L8 1.54587L14.6667 7.54587V13.8839Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_568_331">
                            <rect width="16" height="16" fill="white" />
                        </clipPath>
                    </defs>
                </svg>

            </x-side-bar-link>
            <x-side-bar-link name="Event Bookings" route='event-booking'
                active="{{ request()->routeIs('event-booking') }}">
                <svg viewBox="0 0 18 18" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" d="M17.4375 5.625H0.5625V4.5H17.4375V5.625Z" />
                    <path clip-rule="evenodd" d="M17.4375 7.875H0.5625V6.75H17.4375V7.875Z" />
                    <path clip-rule="evenodd"
                        d="M2.25 12.9375C2.25 12.6268 2.50184 12.375 2.8125 12.375H9C9.31066 12.375 9.5625 12.6268 9.5625 12.9375C9.5625 13.2482 9.31066 13.5 9 13.5H2.8125C2.50184 13.5 2.25 13.2482 2.25 12.9375Z" />
                    <path clip-rule="evenodd"
                        d="M1.6875 3.375C1.37684 3.375 1.125 3.62684 1.125 3.9375V14.0625C1.125 14.3732 1.37684 14.625 1.6875 14.625H16.3125C16.6232 14.625 16.875 14.3732 16.875 14.0625V3.9375C16.875 3.62684 16.6232 3.375 16.3125 3.375H1.6875ZM0 3.9375C0 3.00552 0.755519 2.25 1.6875 2.25H16.3125C17.2445 2.25 18 3.00552 18 3.9375V14.0625C18 14.9945 17.2445 15.75 16.3125 15.75H1.6875C0.755519 15.75 0 14.9945 0 14.0625V3.9375Z" />
                </svg>
            </x-side-bar-link>

            <x-side-bar-link name="My Bookings" route='my-booking' active="{{ request()->routeIs('my-booking') }}">
                <svg viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd"
                        d="M7.875 2.8125C7.56432 2.8125 7.3125 3.06432 7.3125 3.375V4.5H6.1875V3.375C6.1875 2.44301 6.94299 1.6875 7.875 1.6875H10.125C11.057 1.6875 11.8125 2.443 11.8125 3.375V4.5H10.6875V3.375C10.6875 3.06433 10.4357 2.8125 10.125 2.8125H7.875Z"
                        fill="currentColor" />
                    <path clip-rule="evenodd"
                        d="M1.6875 5.0625C1.37684 5.0625 1.125 5.31434 1.125 5.625V14.625C1.125 14.9357 1.37684 15.1875 1.6875 15.1875H16.3125C16.6232 15.1875 16.875 14.9357 16.875 14.625V5.625C16.875 5.31434 16.6232 5.0625 16.3125 5.0625H1.6875ZM0 5.625C0 4.69302 0.755519 3.9375 1.6875 3.9375H16.3125C17.2445 3.9375 18 4.69302 18 5.625V14.625C18 15.557 17.2445 16.3125 16.3125 16.3125H1.6875C0.755519 16.3125 0 15.557 0 14.625V5.625Z"
                        fill="currentColor" />
                </svg>
            </x-side-bar-link>

            <x-side-bar-link name="Individual Bookings" route='individual-booking'
                active="{{ request()->routeIs('individual-booking') }}">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_568_335)">
                        <path
                            d="M8 8C8.79113 8 9.56449 7.76541 10.2223 7.32588C10.8801 6.88635 11.3928 6.26164 11.6955 5.53074C11.9983 4.79983 12.0775 3.99556 11.9231 3.21964C11.7688 2.44372 11.3878 1.73098 10.8284 1.17157C10.269 0.612165 9.55629 0.231202 8.78036 0.0768607C8.00444 -0.0774802 7.20017 0.00173314 6.46927 0.304484C5.73836 0.607234 5.11365 1.11992 4.67412 1.77772C4.2346 2.43552 4 3.20888 4 4C4.00106 5.06054 4.42283 6.07734 5.17274 6.82726C5.92266 7.57718 6.93946 7.99894 8 8ZM8 1.33334C8.52742 1.33334 9.04299 1.48973 9.48152 1.78275C9.92005 2.07577 10.2618 2.49224 10.4637 2.97951C10.6655 3.46678 10.7183 4.00296 10.6154 4.52024C10.5125 5.03753 10.2586 5.51268 9.88562 5.88562C9.51268 6.25856 9.03752 6.51254 8.52024 6.61543C8.00296 6.71832 7.46678 6.66551 6.97951 6.46368C6.49224 6.26185 6.07577 5.92005 5.78275 5.48152C5.48973 5.04299 5.33333 4.52742 5.33333 4C5.33333 3.29276 5.61428 2.61448 6.11438 2.11438C6.61448 1.61429 7.29276 1.33334 8 1.33334Z"
                            fill="currentColor" />
                        <path
                            d="M8 9.33398C6.40924 9.33575 4.88414 9.96846 3.75931 11.0933C2.63447 12.2181 2.00176 13.7432 2 15.334C2 15.5108 2.07024 15.6804 2.19526 15.8054C2.32029 15.9304 2.48986 16.0007 2.66667 16.0007C2.84348 16.0007 3.01305 15.9304 3.13807 15.8054C3.2631 15.6804 3.33333 15.5108 3.33333 15.334C3.33333 14.0963 3.825 12.9093 4.70017 12.0342C5.57534 11.159 6.76232 10.6673 8 10.6673C9.23768 10.6673 10.4247 11.159 11.2998 12.0342C12.175 12.9093 12.6667 14.0963 12.6667 15.334C12.6667 15.5108 12.7369 15.6804 12.8619 15.8054C12.987 15.9304 13.1565 16.0007 13.3333 16.0007C13.5101 16.0007 13.6797 15.9304 13.8047 15.8054C13.9298 15.6804 14 15.5108 14 15.334C13.9982 13.7432 13.3655 12.2181 12.2407 11.0933C11.1159 9.96846 9.59076 9.33575 8 9.33398Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_568_335">
                            <rect width="16" height="16" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>

            </x-side-bar-link>

            <x-side-bar-link name="Group Bookings" route='group-booking'
                active="{{ request()->routeIs('group-booking') }}">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_568_347)">
                        <path
                            d="M10.3263 12.9374C9.89365 12.9374 9.61392 12.4345 9.85715 12.0653C9.93411 11.9483 10.0146 11.8138 10.0782 11.6554C9.72476 11.6152 9.26416 11.531 8.828 11.3908C8.53219 11.2956 8.3696 10.9788 8.46463 10.6831C8.55993 10.3875 8.87552 10.2243 9.17242 10.3198C9.62039 10.4638 10.1104 10.5365 10.3941 10.5549C10.9132 10.5888 11.3003 11.0697 11.2447 11.583C11.2014 11.9827 11.0154 12.3526 10.7965 12.6844C10.6883 12.8484 10.5092 12.9374 10.3263 12.9374Z"
                            fill="currentColor" />
                        <path
                            d="M17.4377 15.1876C17.2037 15.1876 16.9853 15.0407 16.9054 14.8071C16.6681 14.1135 16.3852 14.0426 15.8213 13.9011C15.1778 13.7398 14.2967 13.5188 13.6675 12.172C13.476 11.7618 13.4037 11.2509 13.7161 10.8791C13.8779 10.6863 14.1042 10.5711 14.3536 10.5548C14.5656 10.5411 16.5324 10.2947 16.2819 9.82342C15.4324 8.21832 14.6944 5.88297 14.6634 5.7843C14.3585 4.60018 13.5277 3.9375 12.3758 3.9375C11.2236 3.9375 10.3927 4.60011 10.0964 5.75546C10.0189 6.05621 9.71514 6.2379 9.41164 6.16051C9.11061 6.08326 8.92934 5.77675 9.00652 5.47586C9.43443 3.80814 10.694 2.8125 12.3758 2.8125C14.0572 2.8125 15.3168 3.80814 15.745 5.47579C15.745 5.47579 16.4761 7.78567 17.2759 9.29656C17.383 9.4985 17.4377 9.70917 17.4377 9.92203C17.4377 11.2336 15.4148 11.5746 14.6694 11.6558C14.9434 12.3269 15.4201 12.6406 16.0949 12.8099C16.7365 12.9708 17.5347 13.171 17.97 14.4429C18.0705 14.7369 17.9137 15.0566 17.6198 15.1572C17.5594 15.1778 17.4981 15.1876 17.4377 15.1876Z"
                            fill="currentColor" />
                        <path
                            d="M10.6877 15.1876C10.4537 15.1876 10.2353 15.0407 10.1554 14.8071C9.91288 14.0984 9.58604 14.0025 8.99251 13.8284C8.47148 13.6756 7.82301 13.4854 7.26738 12.7925C6.62825 11.9949 6.57963 10.8463 7.14598 9.93404C7.6162 9.17729 7.8752 8.07234 7.8752 6.82258C7.8752 4.96211 7.07622 3.9375 5.6252 3.9375C4.17418 3.9375 3.3752 4.96211 3.3752 6.82258C3.3752 8.07269 3.63393 9.17764 4.10414 9.93398C4.67104 10.8463 4.62215 11.995 3.98275 12.7925C3.42739 13.4854 2.77892 13.6756 2.25789 13.8285C1.66435 14.0025 1.33751 14.0984 1.09499 14.8071C0.994465 15.101 0.675584 15.2577 0.380603 15.1572C0.0867191 15.0566 -0.0701115 14.7369 0.0304129 14.4429C0.461625 13.1828 1.28203 12.9422 1.94121 12.749C2.38643 12.6183 2.77095 12.5056 3.10494 12.0889C3.44661 11.6628 3.46391 11.0355 3.14861 10.5278C2.40593 9.33295 2.2502 7.85337 2.2502 6.82258C2.2502 4.34908 3.54329 2.8125 5.6252 2.8125C7.7071 2.8125 9.0002 4.34908 9.0002 6.82258C9.0002 7.85316 8.84419 9.33254 8.10179 10.5277C7.78648 11.0354 7.80378 11.6629 8.14518 12.0889C8.47917 12.5055 8.86369 12.6183 9.30919 12.7489C9.96837 12.9422 10.7888 13.1828 11.22 14.4429C11.3205 14.7368 11.1637 15.0566 10.8698 15.1572C10.8094 15.1778 10.7481 15.1876 10.6877 15.1876Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_568_347">
                            <rect width="18" height="18" fill="white" />
                        </clipPath>
                    </defs>
                </svg>


            </x-side-bar-link>

            <x-side-bar-link name="Exhibition Bookings" route='exhibition-booking'
                active="{{ request()->routeIs('exhibition-booking') }}">
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_568_351)">
                        <path
                            d="M4.08333 0H2.33333C1.71449 0 1.121 0.245833 0.683417 0.683417C0.245833 1.121 0 1.71449 0 2.33333L0 4.08333C0 4.70217 0.245833 5.29566 0.683417 5.73325C1.121 6.17083 1.71449 6.41667 2.33333 6.41667H4.08333C4.70217 6.41667 5.29566 6.17083 5.73325 5.73325C6.17083 5.29566 6.41667 4.70217 6.41667 4.08333V2.33333C6.41667 1.71449 6.17083 1.121 5.73325 0.683417C5.29566 0.245833 4.70217 0 4.08333 0V0ZM5.25 4.08333C5.25 4.39275 5.12708 4.6895 4.90829 4.90829C4.6895 5.12708 4.39275 5.25 4.08333 5.25H2.33333C2.02391 5.25 1.72717 5.12708 1.50838 4.90829C1.28958 4.6895 1.16667 4.39275 1.16667 4.08333V2.33333C1.16667 2.02391 1.28958 1.72717 1.50838 1.50838C1.72717 1.28958 2.02391 1.16667 2.33333 1.16667H4.08333C4.39275 1.16667 4.6895 1.28958 4.90829 1.50838C5.12708 1.72717 5.25 2.02391 5.25 2.33333V4.08333Z"
                            fill="currentColor" />
                        <path
                            d="M4.08333 7.5835H2.33333C1.71449 7.5835 1.121 7.82933 0.683417 8.26691C0.245833 8.7045 0 9.29799 0 9.91683L0 11.6668C0 12.2857 0.245833 12.8792 0.683417 13.3168C1.121 13.7543 1.71449 14.0002 2.33333 14.0002H4.08333C4.70217 14.0002 5.29566 13.7543 5.73325 13.3168C6.17083 12.8792 6.41667 12.2857 6.41667 11.6668V9.91683C6.41667 9.29799 6.17083 8.7045 5.73325 8.26691C5.29566 7.82933 4.70217 7.5835 4.08333 7.5835ZM5.25 11.6668C5.25 11.9763 5.12708 12.273 4.90829 12.4918C4.6895 12.7106 4.39275 12.8335 4.08333 12.8335H2.33333C2.02391 12.8335 1.72717 12.7106 1.50838 12.4918C1.28958 12.273 1.16667 11.9763 1.16667 11.6668V9.91683C1.16667 9.60741 1.28958 9.31067 1.50838 9.09187C1.72717 8.87308 2.02391 8.75016 2.33333 8.75016H4.08333C4.39275 8.75016 4.6895 8.87308 4.90829 9.09187C5.12708 9.31067 5.25 9.60741 5.25 9.91683V11.6668Z"
                            fill="currentColor" />
                        <path
                            d="M11.6667 7.5835H9.9167C9.29787 7.5835 8.70437 7.82933 8.26679 8.26691C7.82921 8.7045 7.58337 9.29799 7.58337 9.91683V11.6668C7.58337 12.2857 7.82921 12.8792 8.26679 13.3168C8.70437 13.7543 9.29787 14.0002 9.9167 14.0002H11.6667C12.2855 14.0002 12.879 13.7543 13.3166 13.3168C13.7542 12.8792 14 12.2857 14 11.6668V9.91683C14 9.29799 13.7542 8.7045 13.3166 8.26691C12.879 7.82933 12.2855 7.5835 11.6667 7.5835ZM12.8334 11.6668C12.8334 11.9763 12.7105 12.273 12.4917 12.4918C12.2729 12.7106 11.9761 12.8335 11.6667 12.8335H9.9167C9.60729 12.8335 9.31054 12.7106 9.09175 12.4918C8.87296 12.273 8.75004 11.9763 8.75004 11.6668V9.91683C8.75004 9.60741 8.87296 9.31067 9.09175 9.09187C9.31054 8.87308 9.60729 8.75016 9.9167 8.75016H11.6667C11.9761 8.75016 12.2729 8.87308 12.4917 9.09187C12.7105 9.31067 12.8334 9.60741 12.8334 9.91683V11.6668Z"
                            fill="currentColor" />
                        <path
                            d="M8.16671 4.0835H9.91671V5.8335C9.91671 5.98821 9.97816 6.13658 10.0876 6.24598C10.197 6.35537 10.3453 6.41683 10.5 6.41683C10.6548 6.41683 10.8031 6.35537 10.9125 6.24598C11.0219 6.13658 11.0834 5.98821 11.0834 5.8335V4.0835H12.8334C12.9881 4.0835 13.1365 4.02204 13.2459 3.91264C13.3552 3.80325 13.4167 3.65487 13.4167 3.50016C13.4167 3.34545 13.3552 3.19708 13.2459 3.08768C13.1365 2.97829 12.9881 2.91683 12.8334 2.91683H11.0834V1.16683C11.0834 1.01212 11.0219 0.863747 10.9125 0.75435C10.8031 0.644954 10.6548 0.583496 10.5 0.583496C10.3453 0.583496 10.197 0.644954 10.0876 0.75435C9.97816 0.863747 9.91671 1.01212 9.91671 1.16683V2.91683H8.16671C8.012 2.91683 7.86362 2.97829 7.75423 3.08768C7.64483 3.19708 7.58337 3.34545 7.58337 3.50016C7.58337 3.65487 7.64483 3.80325 7.75423 3.91264C7.86362 4.02204 8.012 4.0835 8.16671 4.0835Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_568_351">
                            <rect width="14" height="14" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
            </x-side-bar-link>

            <x-side-bar-link name="Event Materials" route='event-material'
                active="{{ request()->routeIs('event-material') }}">
                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_568_355)">
                        <path
                            d="M11.3334 9.33335C11.3334 9.51016 11.2632 9.67973 11.1382 9.80475C11.0131 9.92978 10.8436 10 10.6668 10H5.33344C5.15662 10 4.98706 9.92978 4.86203 9.80475C4.73701 9.67973 4.66677 9.51016 4.66677 9.33335C4.66677 9.15654 4.73701 8.98697 4.86203 8.86194C4.98706 8.73692 5.15662 8.66668 5.33344 8.66668H10.6668C10.8436 8.66668 11.0131 8.73692 11.1382 8.86194C11.2632 8.98697 11.3334 9.15654 11.3334 9.33335ZM8.66677 11.3333H5.33344C5.15662 11.3333 4.98706 11.4036 4.86203 11.5286C4.73701 11.6536 4.66677 11.8232 4.66677 12C4.66677 12.1768 4.73701 12.3464 4.86203 12.4714C4.98706 12.5964 5.15662 12.6667 5.33344 12.6667H8.66677C8.84358 12.6667 9.01315 12.5964 9.13817 12.4714C9.2632 12.3464 9.33344 12.1768 9.33344 12C9.33344 11.8232 9.2632 11.6536 9.13817 11.5286C9.01315 11.4036 8.84358 11.3333 8.66677 11.3333ZM14.6668 6.99002V12.6667C14.6657 13.5504 14.3142 14.3976 13.6893 15.0225C13.0644 15.6474 12.2172 15.999 11.3334 16H4.66677C3.78304 15.999 2.93581 15.6474 2.31091 15.0225C1.68602 14.3976 1.33449 13.5504 1.33344 12.6667V3.33335C1.33449 2.44962 1.68602 1.60239 2.31091 0.977495C2.93581 0.352603 3.78304 0.00107394 4.66677 1.53658e-05H7.67677C8.28985 -0.00156258 8.89716 0.118407 9.46358 0.352988C10.03 0.587569 10.5443 0.932107 10.9768 1.36668L13.2994 3.69068C13.7343 4.12284 14.079 4.63699 14.3137 5.20333C14.5484 5.76968 14.6684 6.37696 14.6668 6.99002ZM10.0341 2.30935C9.82429 2.10612 9.58872 1.9313 9.33344 1.78935V4.66668C9.33344 4.84349 9.40367 5.01306 9.5287 5.13809C9.65372 5.26311 9.82329 5.33335 10.0001 5.33335H12.8774C12.7354 5.07814 12.5603 4.84278 12.3568 4.63335L10.0341 2.30935ZM13.3334 6.99002C13.3334 6.88002 13.3121 6.77468 13.3021 6.66668H10.0001C9.46967 6.66668 8.96096 6.45597 8.58589 6.0809C8.21082 5.70582 8.0001 5.19711 8.0001 4.66668V1.36468C7.8921 1.35468 7.7861 1.33335 7.67677 1.33335H4.66677C4.13634 1.33335 3.62763 1.54406 3.25255 1.91914C2.87748 2.29421 2.66677 2.80292 2.66677 3.33335V12.6667C2.66677 13.1971 2.87748 13.7058 3.25255 14.0809C3.62763 14.456 4.13634 14.6667 4.66677 14.6667H11.3334C11.8639 14.6667 12.3726 14.456 12.7476 14.0809C13.1227 13.7058 13.3334 13.1971 13.3334 12.6667V6.99002Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_568_355">
                            <rect width="16" height="16" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
            </x-side-bar-link>

            <x-side-bar-link name="Questions & Answers" route='question-and-answer'
                active="{{ request()->routeIs('question-and-answer') }}">
                <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_568_359)">
                        <path
                            d="M14 9.33333V14H9.33333C8.51497 13.9992 7.71122 13.7831 7.00271 13.3736C6.2942 12.964 5.70585 12.3754 5.29667 11.6667C5.73642 11.6635 6.17469 11.615 6.6045 11.522C6.93184 11.9313 7.34708 12.2617 7.81946 12.4887C8.29184 12.7157 8.80924 12.8335 9.33333 12.8333H12.8333V9.33333C12.8332 8.80905 12.715 8.29153 12.4876 7.81914C12.2602 7.34675 11.9294 6.93161 11.5197 6.6045C11.6135 6.17477 11.6628 5.73651 11.6667 5.29667C12.3754 5.70585 12.964 6.2942 13.3736 7.00271C13.7831 7.71122 13.9992 8.51497 14 9.33333ZM10.5 5.25C10.5 3.85761 9.94688 2.52226 8.96231 1.53769C7.97774 0.553123 6.64239 0 5.25 0C3.85761 0 2.52226 0.553123 1.53769 1.53769C0.553123 2.52226 0 3.85761 0 5.25L0 10.5H5.25C6.64191 10.4985 7.97637 9.94484 8.9606 8.9606C9.94484 7.97637 10.4985 6.64191 10.5 5.25ZM1.16667 5.25C1.16667 4.44239 1.40615 3.65292 1.85483 2.98142C2.30351 2.30992 2.94124 1.78655 3.68738 1.47749C4.43351 1.16843 5.25453 1.08757 6.04662 1.24513C6.83871 1.40268 7.56629 1.79158 8.13735 2.36265C8.70842 2.93371 9.09732 3.66129 9.25487 4.45338C9.41243 5.24547 9.33157 6.06649 9.02251 6.81262C8.71345 7.55876 8.19008 8.19649 7.51858 8.64517C6.84708 9.09385 6.05761 9.33333 5.25 9.33333H1.16667V5.25Z"
                            fill="currentColor" />
                    </g>
                    <defs>
                        <clipPath id="clip0_568_359">
                            <rect width="14" height="14" fill="currentColor" />
                        </clipPath>
                    </defs>
                </svg>
            </x-side-bar-link>
        </ul>
    </div>
</aside>

{{-- <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-3 gap-4 mb-4">
          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
       </div>
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">
             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
             </svg>
          </p>
       </div>
       <div class="grid grid-cols-2 gap-4 mb-4">
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
       </div>
       <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
          <p class="text-2xl text-gray-400 dark:text-gray-500">
             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
             </svg>
          </p>
       </div>
       <div class="grid grid-cols-2 gap-4">
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
          <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
             <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
             </p>
          </div>
       </div>
    </div>
 </div> --}}
