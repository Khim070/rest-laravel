import React from 'react'

const CategoryDashboard = () => {
    const categorys = [
        {
            id: 1,
            name: "Technology",
            product: "Apple Watch",
        },
        {
            id: 2,
            name: "Technology",
            product: "IMac",
        },
        {
            id: 3,
            name: "Electronics",
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
                    {categorys.map((category) => (
                        <tr key={category.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td class="px-6 py-4 font-semibold text-gray-900 cursor-pointer hover:underline hover:!text-red-600 ">
                                {category.name}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {category.product}
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default CategoryDashboard