import React, {useState} from 'react'

const ChangePassword = () => {

    return (
        <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">
            <div class="justify-center items-center w-full card lg:flex max-w-md ">
                <div class=" w-full card-body">
                    <p class="mb-6 text-gray-800 font-semibold text-2xl text-center">Change Password</p>
                    {/* <!-- form --> */}
                    <form>
                        {/* <!-- old password --> */}
                        <div class="mb-6">
                            <label for="forPassword"
                                class="block text-sm  mb-2 text-gray-400">Old Password</label>
                            <input type="password" id="forPassword"
                                class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text"/>
                        </div>
                        {/* <!-- new password --> */}
                        <div class="mb-6">
                            <label for="forPassword"
                                class="block text-sm  mb-2 text-gray-400">New Password</label>
                            <input type="password" id="forPassword"
                                class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text"/>
                        </div>
                        {/* <!-- confirm password --> */}
                        <div class="mb-6">
                            <label for="forPassword"
                                class="block text-sm  mb-2 text-gray-400">Confirm Password</label>
                            <input type="password" id="forPassword"
                                class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text"/>
                        </div>
                        {/* <!-- button --> */}
                        <div class="grid my-2">
                            <a href="../" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Change Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    )
}

export default ChangePassword