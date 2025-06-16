import { format } from 'date-fns';
import React from 'react'

const CouponDashboard = () => {
    const coupons = [
        {
            id: 1,
            code: "SAVE10",
            discount: 10,
            expire: "2025-07-04",
        },
        {
            id: 2,
            code: "SAVE20",
            discount: 20,
            expire: "2025-08-15",
        },
        {
            id: 3,
            code: "SAVE30",
            discount: 30,
            expire: "2025-09-23",
        }
    ];
    return (
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Code
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Discount
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Expire
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {coupons.map((coupon) => (
                        <tr key={coupon.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-900 cursor-pointer hover:underline hover:!text-red-600 ">
                                {coupon.code}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {coupon.discount} %
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {format(new Date(coupon.expire), 'dd MMM, yyyy')}
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

export default CouponDashboard