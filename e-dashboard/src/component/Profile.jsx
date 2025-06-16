import React from 'react'
import user from '../assets/image/user.jpg';
import { Link } from 'react-router-dom';

const Profile = () => {
    return (
        <div class="flex items-center gap-4">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    <img class="object-cover w-9 h-9 rounded-full" src={user} alt=""
                        aria-hidden="true"/>
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="card-body p-0 py-2">
                        <Link to="/profile" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-user  text-xl "></i>
                            <p class="text-sm ">My Profile</p>
                        </Link>
                        <Link to="/change-password" class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-lock text-xl "></i>
                            <p class="text-sm ">Change Password</p>
                        </Link>
                        <div class="px-4 mt-[7px] grid">
                            <Link to="/login" class="btn-outline-danger font-medium text-[15px] w-full hover:bg-red-500 hover:text-white">Logout</Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Profile