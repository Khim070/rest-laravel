import React from 'react'
import user from '../../assets/image/user.jpg';
import { useNavigate } from 'react-router-dom';

const ShippingDashboard = () => {
    const navigate = useNavigate();
    const carts = [
        {
            id: 1,
            image: user,
            name: "User 1",
            tracking: "AH0934523",
            status: "pending",
            total: 110.5,
        },
        {
            id: 2,
            image: user,
            name: "User 2",
            tracking: "AM3453535",
            status: "shipped",
            total: 90.5,
        },
        {
            id: 3,
            image: user,
            name: "User 3",
            tracking: "AZ9004325",
            status: "delievered",
            total: 88.5,
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
                            Tracking
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {carts.map((cart) => (
                        <tr key={cart.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                <img class="w-10 h-10 rounded-full" src={cart.image}/>
                                <div class="ps-3">
                                    <div class="text-base font-semibold invisible md:visible ">{cart.name}</div>
                                </div>
                            </td>
                            <td onClick={() => navigate("/shipping-detail")} class="px-6 py-4 font-semibold text-gray-900 hover:underline hover:text-red-700 cursor-pointer">
                                {cart.tracking}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" class="!cursor-default mx-auto text-white !bg-purple-700 font-medium !rounded-full !text-[12px] !px-3 !py-1 !text-center mb-2">{cart.status}</button>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {cart.total} $
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default ShippingDashboard