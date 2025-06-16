import React from 'react'
import Profile from '../Profile'
import { Link } from 'react-router-dom'

const ImageHeader = () => {
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

                    <li className="relative">
                        <form className="">
                            <label htmlFor="fileUpload" className="btn-outline-primary font-medium text-[15px] w-full cursor-pointer hover:bg-blue-600 hover:text-white">
                                Upload Image
                            </label>
                            <input
                                type="file"
                                id="fileUpload"
                                name="file"
                                className="hidden"
                                // onChange={(e) => {
                                //     const file = e.target.files[0];
                                //     if (file) {
                                //         console.log("Selected file:", file.name);
                                //         // You can add upload logic here
                                //     }
                                // }}
                            />
                        </form>
                    </li>
                </ul>
                <Profile/>
            </nav>
        </header>
    )
}

export default ImageHeader