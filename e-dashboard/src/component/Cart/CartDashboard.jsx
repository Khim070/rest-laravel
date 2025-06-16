import React from 'react'
import user from '../../assets/image/user.jpg';

const CartDashboard = () => {
    const carts = [
        {
            id: 1,
            image: user,
            name: "User 1",
            product: "Apple Watch",
            amount: 10,
        },
        {
            id: 2,
            image: user,
            name: "User 2",
            product: "Iphone 12",
            amount: 20,
        },
        {
            id: 3,
            image: user,
            name: "User 3",
            product: "Jacket",
            amount: 30,
        }
    ];
    return (
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {carts.map((cart) => (
                        <tr key={cart.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap cursor-pointer">
                                <img class="w-10 h-10 rounded-full" src={cart.image}/>
                                <div class="ps-3">
                                    <div class="text-base font-semibold invisible md:visible hover:underline hover:text-red-700">{cart.name}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {cart.product}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {cart.amount}
                            </td>
                            <td class="px-6 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="20"  height="20"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash ml-3 cursor-pointer hover:text-red-800"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default CartDashboard