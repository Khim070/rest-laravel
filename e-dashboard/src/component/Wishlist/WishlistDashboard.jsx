import React from 'react'
import user from '../../assets/image/user.jpg';

const WishlistDashboard = () => {
    const wishlists = [
        {
            id: 1,
            image: user,
            name: "User 1",
            product: "Apple Watch",
        },
        {
            id: 2,
            image: user,
            name: "User 1",
            product: "IMac",
        },
        {
            id: 3,
            image: user,
            name: "User 1",
            product: "Iphone 12",
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
                    </tr>
                </thead>
                <tbody>
                    {wishlists.map((wishlist) => (
                        <tr key={wishlist.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                <img class="w-10 h-10 rounded-full" src={wishlist.image}/>
                                <div class="ps-3">
                                    <div class="text-base font-semibold invisible md:visible ">{wishlist.name}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {wishlist.product}
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default WishlistDashboard