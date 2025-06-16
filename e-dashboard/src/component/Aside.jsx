import React, { useState } from 'react';
import logo from '../../logo.png';
import { Link, useNavigate, useLocation } from 'react-router-dom';

const Aside = () => {
    const menuItems = [
        { icon: "ti ti-basket", label: "Product", to: '/product' },
        { icon: "ti ti-category", label: "Category", to: '/category' },
        { icon: "ti ti-stars", label: "Review", to: '/review' },
        { icon: "ti ti-shopping-cart", label: "Carts", to: '/cart' },
        { icon: "ti ti-package", label: "Shipping", to: '/shipping' },
        { icon: "ti ti-basket-heart", label: "Wishlist", to: '/wishlist' },
        // { icon: "ti ti-progress-check", label: "Product Status", to: '/status' },
        { icon: "ti ti-truck-delivery", label: "Order Items", to: '/order' },
        { icon: "ti ti-photo", label: "Image", to: '/image' },
        { icon: "ti ti-ticket", label: "Coupons", to: '/coupon' },
        { icon: "ti ti-users-group", label: "User", to: '/user' },
    ];

    // const location = useLocation();
    const navigate = useNavigate();

    return (
        <aside id="application-sidebar-brand"
            className="! hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:!top-[20px] xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300" >
            <div className="p-4 flex gap-4 cursor-pointer">
                <a href="../" className="text-nowrap ">
                    <img
                    src={logo}
                    alt="Logo-Dark"
                    className='size-12'
                    />
                </a>
                <span className='my-auto uppercase'>online shop</span>
            </div>
            <div className="scroll-sidebar" data-simplebar="">
                <nav className="w-full flex flex-col sidebar-nav px-4">
                    <ul id="sidebarnav" className="text-gray-600 text-sm">
                        {menuItems.map((item, index) => (
                            <li key={index} className="sidebar-item">
                                <button
                                    onClick={() => {
                                        navigate(item.to);
                                        window.location.reload();
                                    }}
                                    className={`sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md w-full ${
                                        location.pathname.startsWith(item.to) ? 'active text-[#006aaf]' : 'text-gray-500'
                                    }`}
                                    >
                                    <i className={`${item.icon} ps-2 text-2xl`}></i> <span>{item.label}</span>
                                </button>
                            </li>
                        ))}
                    </ul>
                </nav>
            </div>
        </aside>
    )
}

export default Aside