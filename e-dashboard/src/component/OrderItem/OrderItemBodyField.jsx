import React from 'react'
import user from '../../assets/image/user.jpg';

const OrderItemBodyField = () => {

    const [price, setPrice] = React.useState(0);
    const [quantity, setQuantity] = React.useState(0);

    const handlePriceChange = (e) => {
      const value = parseFloat(e.target.value) || 0;
      setPrice(value);
    };

    const handleQuantityChange = (e) => {
      const value = parseFloat(e.target.value) || 0;
      setQuantity(value);
    };

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
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Address</h4>
                                    <textarea class=" w-full h-44 px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0 "/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-gray-500 text-lg font-semibold mb-4">User</h4>
                            <div class="flex items-center justify-between gap-12">
                                <div class="flex items-center justify-center w-full">
                                    <div className='flex flex-col justify-center items-center'>
                                        <img src={user} alt="" className='h-48 w-48 object-contain rounded-3xl'/>
                                        <div className='gap-2 flex flex-col mt-2 items-center'>
                                            <span className='text-gray-800 text-lg'>John Doe</span>
                                            <span className='text-gray-400 text-sm'>john.doe@gmail.com</span>
                                        </div>
                                    </div>
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
                                        <input
                                          type="number"
                                          value={price}
                                          onChange={handlePriceChange}
                                          class="py-3 w-full px-4 text-gray-500 block border-gray-200 !rounded-e-lg text-md focus:border-blue-600 focus:ring-0"
                                        />
                                    </div>
                                </div>
                                <div class="mb-3 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Quantity</h4>
                                    <input
                                      type="number"
                                      value={quantity}
                                      onChange={handleQuantityChange}
                                      class="py-3 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0"
                                    />
                                </div>
                                <div class="mb-3 ">
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Total</h4>
                                    <div class="flex ">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border !rounded-e-0 border-gray-300 !border-e-0 !rounded-s-lg">
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-currency-dollar"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                                        </span>
                                        <input
                                          type="number"
                                          value={(price * quantity).toFixed(2)}
                                          class="py-3 w-full px-4 text-gray-500 block border-gray-200 !rounded-e-lg text-md focus:border-blue-600 focus:ring-0"
                                        />
                                    </div>
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
                                    <h4 class="text-gray-500 text-lg font-semibold mb-2">Status</h4>
                                    <select class="py-2.5 w-full px-4 text-gray-500 block border-gray-200 rounded-sm text-md focus:border-blue-600 focus:ring-0">
                                        <option selected>Choose a status</option>
                                        <option value="">Pending</option>
                                        <option value="">Shipped</option>
                                        <option value="">Delivered</option>
                                    </select>
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

export default OrderItemBodyField