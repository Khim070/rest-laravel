import React, {useState} from 'react'
import logo from "../assets/image/logo.png"

const Login = () => {
    const [showPassword, setShowPassword] = useState(false);

    return (
        <div class="flex flex-col w-full  overflow-hidden relative min-h-screen radial-gradient items-center justify-center g-0 px-4">
            <div class="justify-center items-center w-full card lg:flex max-w-md ">
                <div class=" w-full card-body">
                    <a href="../" class="py-4 block"><img src={logo} alt="" class="mx-auto w-30 rounded-full"/></a>
                    <p class="mb-4 text-gray-400 text-sm text-center">Your Everything is here!</p>
                    {/* <!-- form --> */}
                    <form>
                        {/* <!-- email --> */}
                        <div class="mb-4">
                            <label for="forEmail"
                                class="block text-sm mb-2 text-gray-400">Email</label>
                            <input type="email" id="forEmail"
                            class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text"/>
                        </div>
                        {/* <!-- password --> */}
                        <div class="mb-6">
                            <label for="forPassword"
                            class="block text-sm  mb-2 text-gray-400">Password</label>
                        <input type={showPassword ? "text" : "password"} id="forPassword"
                            class="py-3 px-4 block w-full border-gray-200 rounded-sm text-sm focus:border-blue-600 focus:ring-0 " aria-describedby="hs-input-helper-text"/>
                        </div>
                        {/* <!-- checkbox --> */}
                        <div class="flex justify-between">
                            <div class="flex">
                                <input
                                  type="checkbox"
                                  className="shrink-0 mt-0.5 border-gray-200 rounded-[4px] text-blue-600 focus:ring-blue-500"
                                  id="hs-default-checkbox"
                                  checked={showPassword}
                                  onChange={() => setShowPassword(!showPassword)}
                                />
                                <label for="hs-default-checkbox" class="text-sm text-gray-500 ms-3">Show Password</label>
                            </div>
                                {/* <a href="../" class="text-sm font-semibold text-blue-600 hover:text-blue-700">Forgot Password ?</a> */}
                        </div>
                        {/* <!-- button --> */}
                        <div class="grid my-6">
                            <a href="../" class="btn py-[10px] text-base text-white font-medium hover:bg-blue-700">Sign In</a>
                        </div>
                        <div class="flex justify-center gap-2 items-center">
                            <p class="text-base font-semibold text-gray-400">New to Online Shop?</p>
                            <a href="./authentication-register.html" class="text-sm font-semibold text-blue-600 hover:text-blue-700">Create an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    )
}

export default Login