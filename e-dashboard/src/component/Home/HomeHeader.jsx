import React from 'react'
import Profile from '../Profile'

const HomeHeader = () => {
    return (
        <header class=" bg-white shadow-md rounded-md w-full text-sm py-4 px-6">
            <nav class=" w-ful flex items-center justify-between" aria-label="Global">
                <ul class="icon-nav flex items-center gap-4">
                    <li class="relative xl:hidden">
                        <a class="text-xl  icon-hover cursor-pointer text-heading"
                            id="headerCollapse" data-hs-overlay="#application-sidebar-brand"
                            aria-controls="application-sidebar-brand" aria-label="Toggle navigation" href="javascript:void(0)">
                            <i class="ti ti-menu-2 relative z-1"></i>
                        </a>
                    </li>

                    <li class="relative">
                        <div class="">
                            <a href="../../pages/authentication-login.html" class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Save</a>
                        </div>
                    </li>
                </ul>
                <Profile/>
            </nav>
        </header>
    )
}

export default HomeHeader