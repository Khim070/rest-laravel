import React from 'react'
import applewatch from "../../assets/image/apple-watch.png";
import imac from "../../assets/image/imac.png";
import iphone12 from "../../assets/image/iphone-12.png";
import { useNavigate } from 'react-router-dom';

const OrderItemDashboard = () => {
    const navigate = useNavigate();
    const orderitems = [
        {
            id: 1,
            image: applewatch,
            alt: "Apple Watch",
            name: "Apple Watch",
            status: "pending",
            quantity: 10,
            total: 100,
        },
        {
            id: 2,
            image: imac,
            alt: "Apple iMac",
            name: 'iMac 27"',
            status: "processing",
            quantity: 20,
            total: 200,
        },
        {
            id: 3,
            image: iphone12,
            alt: "iPhone 12",
            name: "iPhone 12",
            status: "shipped",
            quantity: 30,
            total: 300,
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
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {orderitems.map((orderitem) => (
                        <tr key={orderitem.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="p-4">
                                <img src={orderitem.image} class="w-16 md:!w-32 !h-32 max-w-full max-h-full object-contain" alt={orderitem.alt} />
                            </td>
                            <td onClick={() => {navigate('/order-detail')}} class="px-6 py-4 font-semibold text-gray-900 cursor-pointer hover:underline hover:!text-red-600 ">
                                {orderitem.name}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" class="!cursor-default mx-auto text-white !bg-purple-700 font-medium !rounded-full !text-[12px] !px-3 !py-1 !text-center mb-2">{orderitem.status}</button>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {orderitem.quantity}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {orderitem.total} $
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>

    )
}

export default OrderItemDashboard