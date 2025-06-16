import React from 'react'
import profileBg from "../../assets/image/profilebg.jpg";
import user from "../../assets/image/user.jpg";

const ProfileBody = () => {
    return (
        <div>
            <div class=" lg:gap-x-6 gap-x-0 lg:gap-y-3 gap-y-6">
                <div class="">
                    <div class="card">
                        <div class="card-body !pt-0 px-0 ">
                            <div class="">
                                <div className="w-full h-[300px] relative">
                                    <img src={profileBg} alt="" className="w-full h-full object-cover rounded-t-2xl" />
                                    <div
                                        style={{
                                            position: 'absolute',
                                            top: '50%',
                                            left: '50%',
                                            transform: 'translate(-50%, 90%)',
                                            width: '90px',
                                            height: '90px',
                                            borderRadius: '50%',
                                            padding: '3px',
                                            backgroundImage: 'linear-gradient(to bottom, #A4CCD9, #FF9898)',
                                            display: 'flex',
                                            justifyContent: 'center',
                                            alignItems: 'center'
                                        }}
                                    >
                                        <img
                                            src={user}
                                            alt=""
                                            style={{
                                                width: '100%',
                                                height: '100%',
                                                position: 'relative',
                                                borderRadius: '50%',
                                                objectFit: 'cover',
                                                background: 'white',
                                                padding: '3px',
                                                zIndex: '10'
                                            }}
                                        />
                                    </div>
                                </div>
                                <div className='text-center mt-6'>
                                    <h2 className='text-lg'>Mathew Anderson</h2>
                                    <p className='!text-[12px] text-gray-400'>Super Admin</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 lg:gap-x-6 gap-x-0 lg:gap-y-3 gap-y-6">
                <div class="">
                    <div class="card">
                        <div class="card-body !pt-0 px-0 ">
                            <div className='pt-3 px-5 gap-4 flex flex-col'>
                                <h1 className='text-lg font-semibold'>Introduction</h1>
                                {/* Email */}
                                <div className='flex gap-3'>
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="22"  height="22"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-mail"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                                    <span className='text-sm'>xyzjonathan@gmail.com</span>
                                </div>
                                {/* Phone number */}
                                <div className='flex gap-3'>
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="22"  height="22"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>
                                    <span className='text-sm'>+855 10 101 010</span>
                                </div>
                                {/* Address */}
                                <div className='flex gap-3'>
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="22"  height="22"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-map-pin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                                    <span className='text-sm'>Newyow, USA - 1000001</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default ProfileBody