import React from 'react'
import { FaArrowsRotate } from "react-icons/fa6";

const CouponBodyField = () => {

    const [code, setCode] = React.useState('');

    const generateCode = () => {
        const random = Math.random().toString(36).substring(2, 8).toUpperCase();
        setCode(random);
    };

    return (
        <div>
            <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-3 gap-y-6">
                <div class="col-span-1">
                    <div class="card ">
                        <div class="card-body !py-2">
                            <div class=" !mb-5 ">
                                <div class="mb-3 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Code</h4>
                                    <div class="flex ">
                                        <span class="cursor-pointer inline-flex items-center px-3 text-smtext-gray-900 bg-gray-200 border !rounded-e-0 border-gray-300 !border-e-0 !rounded-s-lg">
                                            <FaArrowsRotate className='size-4' onClick={generateCode}/>
                                        </span>
                                        <input
                                            type="text"
                                            value={code}
                                            readOnly
                                            className="py-3 w-full px-4 text-gray-500 block border-gray-200 !rounded-e-lg text-md focus:border-blue-600 focus:ring-0 cursor-pointer"
                                        />
                                    </div>
                                </div>
                                <div class="mb-6 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Discount</h4>
                                    <input type="number" class=" py-3 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0 "/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="card ">
                        <div class="card-body !py-2">
                            <div class=" !mb-5 ">
                                <div className="mb-3">
                                    <h4 className="text-gray-500 text-lg font-semibold mb-2">Expiry date</h4>
                                    <input
                                      type="date"
                                      className="!cursor-pointer py-2.5 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class=" flex justify-end gap-2">
                        <div class="mb-3">
                            <button type="button" class="text-white !bg-red-700 hover:!bg-red-800 focus:ring-4 focus:outline-none focus:!ring-red-300 font-medium !rounded-lg !text-sm !px-3 !py-2.5 text-center inline-flex items-center me-2">
                            <svg xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash mr-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                Remove
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default CouponBodyField