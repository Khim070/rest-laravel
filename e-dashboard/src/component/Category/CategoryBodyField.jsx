import React from 'react'

const CategoryBodyField = () => {
    return (
        <div>
            <div class="flex flex-col">
                <div class="card ">
                    <div class="card-body !py-2">
                        <div class=" !mb-5 ">
                            <div class="mb-3 ">
                                <h4 class="text-gray-500 text-lg font-semibold mb-2">Category</h4>
                                <input class="py-3 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0 "/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col mt-6">
                <div class="mb-3">
                    <button type="button" class="text-white !bg-red-700 hover:!bg-red-800 focus:ring-4 focus:outline-none focus:!ring-red-300 font-medium !rounded-lg !text-sm !px-3 !py-2.5 text-center inline-flex items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash mr-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        Remove
                    </button>
                </div>
            </div>
        </div>
    )
}

export default CategoryBodyField