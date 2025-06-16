import React from 'react'
import Aside from '../component/Aside'
import ShippingHeader from '../component/Shipping/ShippingHeader'
import ShippingDashboard from '../component/Shipping/ShippingDashboard'

const Shipping = () => {
    return (
        <main>
            <div id="main-wrapper" class="flex p-5 xl:pr-0">
                <Aside/>
                <div class=" w-full page-wrapper xl:px-6 px-0">
                    <main class="h-full  max-w-full">
                        <div class="container full-container p-0 flex flex-col gap-6">
                            <ShippingHeader/>
                            <ShippingDashboard />
                        </div>
                    </main>
                </div>
            </div>
        </main>
    )
}

export default Shipping