import React from 'react'
import user from '../../assets/image/user.jpg';

const ReviewDashboard = () => {
    const reviews = [
        {
            id: 1,
            image: user,
            name: "User 1",
            product: "Apple Watch",
            display: "Enable",
            rating: 3.5,
        },
        {
            id: 2,
            image: user,
            name: "User 2",
            product: "Iphone 12",
            display: "Disable",
            rating: 1.5,
        },
        {
            id: 3,
            image: user,
            name: "User 3",
            product: "Jacket",
            display: "Enable",
            rating: 2.5,
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
                            Display
                        </th>
                        <th scope="col" class="px-8 py-3">
                            Rating
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {reviews.map((review) => (
                        <tr key={review.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap cursor-pointer">
                                <img class="w-10 h-10 rounded-full" src={review.image}/>
                                <div class="ps-3">
                                    <div class="text-base font-semibold invisible md:visible hover:underline hover:text-red-700">{review.name}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {review.product}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                <button type="button"
                                    class={`!cursor-default py-1 !my-auto px-4 justify-center items-center gap-x-2 !text-[10px] font-medium rounded-2xl border ${review.display === 'Enable' ? `border-blue-600 text-blue-600 hover:border-blue-600 hover:text-white hover:bg-blue-600` : `!border-red-600 !text-red-600 hover:!border-red-600 hover:!text-white hover:!bg-red-600`}`}
                                    >
                                    {review.display}
                                </button>
                            </td>
                           <td className="px-1 py-4 font-semibold text-gray-900 flex items-center gap-1">
                             {[1, 2, 3, 4, 5].map((i) => (
                               <i
                                 key={i}
                                 className={`ti ${review.rating >= i ? 'ti-star-filled text-yellow-400' : 'ti-star text-gray-300'} text-lg`}
                               ></i>
                             ))}
                           </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>

    )
}

export default ReviewDashboard