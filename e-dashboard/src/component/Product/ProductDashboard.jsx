import React from 'react'
import applewatch from "../../assets/image/apple-watch.png";
import imac from "../../assets/image/imac.png";
import iphone12 from "../../assets/image/iphone-12.png";

const ProductDashboard = () => {
    const products = [
        {
            id: 1,
            image: applewatch,
            alt: "Apple Watch",
            name: "Apple Watch",
            category: "Technology",
            display: "Enable"
        },
        {
            id: 2,
            image: imac,
            alt: "Apple iMac",
            name: 'iMac 27"',
            category: "Technology",
            display: "Disable"
        },
        {
            id: 3,
            image: iphone12,
            alt: "iPhone 12",
            name: "iPhone 12",
            category: "Phone",
            display: "Enable"
        }
    ];
    return (
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-16 py-3">
                            <span class="sr-only">Image</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Display
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {products.map((product) => (
                        <tr key={product.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="p-4">
                                <img src={product.image} class="w-16 md:!w-32 !h-32 max-w-full max-h-full object-contain" alt={product.alt} />
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900 cursor-pointer hover:underline hover:!text-red-600 ">
                                {product.name}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {product.category}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                <button type="button"
                                    class={`!cursor-default py-1 !my-auto px-4 justify-center items-center gap-x-2 !text-[10px] font-medium rounded-2xl border ${product.display === 'Enable' ? `border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600` : `!border-red-600 !text-red-600 hover:!border-red-600 hover:!text-white hover:!bg-red-600`}`}
                                    >
                                    {product.display}
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <div className='cursor-pointer items-center justify-center flex-col ml-2'>
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-up hover:!text-blue-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 15l6 -6l6 6" /></svg>
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-down hover:!text-blue-500"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 9l6 6l6 -6" /></svg>
                                </div>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>

    )
}

export default ProductDashboard