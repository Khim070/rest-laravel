import React from 'react'
import user from '../../assets/image/user.jpg';
import { useNavigate } from 'react-router-dom';

const UserDashbaord = () => {
    const navigate = useNavigate();
    const users = [
        {
            id: 1,
            image: user,
            name: "User 1",
            mail: "user1@gamil.com",
            role: "Customer",
            phone: "+855 10 101 010",
        },
        {
            id: 2,
            image: user,
            name: "User 2",
            mail: "user2@gamil.com",
            role: "Admin",
            phone: "+855 10 101 010",
        },
        {
            id: 3,
            image: user,
            name: "User 3",
            mail: "user3@gamil.com",
            role: "Vendor",
            phone: "+855 10 101 010",
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
                            Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {users.map((user) => (
                        <tr key={user.id} class="bg-white !border-b border-gray-200 hover:!bg-gray-50">
                            <td onClick={() => navigate("/user-detail")} class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap cursor-pointer">
                                <img class="w-10 h-10 rounded-full" src={user.image}/>
                                <div class="ps-3 justify-center flex flex-col">
                                    <div class="text-base font-semibold invisible md:visible hover:underline hover:text-red-700 ">{user.name}</div>
                                    <div class="text-[11px] text-gray-400 invisible md:visible ">{user.mail}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {user.role}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-900">
                                {user.phone}
                            </td>
                        </tr>
                    ))}
                </tbody>
            </table>
        </div>
    )
}

export default UserDashbaord