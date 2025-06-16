import React from 'react'

const ProductBodyField = () => {
    const [isEnabled, setIsEnabled] = React.useState(false);

    return (
        <div>
            <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-3 gap-y-6">
                <div class="col-span-2">
                    <div class="card ">
                        <div class="card-body !py-2">
                            <div class=" !mb-5 ">
                                <div class="mb-3 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Product</h4>
                                    <input class="py-3 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0 "/>
                                </div>
                                <div class="mb-6 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Details</h4>
                                    <textarea class=" w-full h-44 px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0 "/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-gray-500 text-lg font-semibold mb-4">Product Image</h4>
                            <div class="flex items-center justify-between gap-12">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 !border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-12 h-12 mb-4 !text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                            </svg>
                                            <p class="mb-2 text-sm !text-gray-500 "><span class="font-semibold">Click to upload the image</span></p>
                                        </div>
                                        <input id="dropzone-file" type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-3 gap-y-6 mt-8">
                <div class="col-span-1">
                    <div class="card ">
                        <div class="card-body !py-2">
                            <div class=" !mb-5 ">
                                <div class="mb-3 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Price</h4>
                                    <div class="flex ">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border !rounded-e-0 border-gray-300 !border-e-0 !rounded-s-lg">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                                        </span>
                                        <input type="number" class="py-3 w-full px-4 text-gray-500 block border-gray-200 !rounded-e-lg text-md focus:border-blue-600 focus:ring-0"/>
                                    </div>
                                </div>
                                <div class="mb-6 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Stock</h4>
                                    <input type="number" class="py-3 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0 "/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class="card ">
                        <div class="card-body !py-2">
                            <div class=" !mb-5 ">
                                <div class="mb-3 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Category</h4>
                                    <select class="py-2.5 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0">
                                        <option selected>Choose a category</option>
                                        <option value="">Clothes</option>
                                        <option value="">Accessories</option>
                                        <option value="">Technology</option>
                                        <option value="">Electronics</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-1">
                    <div class=" flex justify-end gap-2">
                        <div class="mb-3 ">
                            <button
                                type="button"
                                onClick={() => setIsEnabled(!isEnabled)}
                                className={`text-white ${
                                    isEnabled ? '!bg-blue-700 hover:!bg-blue-800 focus:!ring-blue-300' : '!bg-red-700 hover:!bg-red-800 focus:!ring-red-300'
                                } focus:ring-4 focus:outline-none font-medium !rounded-lg !text-sm !px-3 !py-2.5 text-center inline-flex items-center me-2`}
                            >
                                {isEnabled ? (
                                    <>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="icon icon-tabler icons-tabler-outline icon-tabler-circle-check mr-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M9 12l2 2l4 -4" /></svg>
                                    Enable
                                    </>
                                ) : (
                                    <>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="icon icon-tabler icons-tabler-outline icon-tabler-xbox-x mr-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 21a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9a9 9 0 0 0 -9 9a9 9 0 0 0 9 9z" /><path d="M9 8l6 8" /><path d="M15 8l-6 8" /></svg>
                                    Disable
                                    </>
                                )}
                            </button>
                        </div>
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

export default ProductBodyField