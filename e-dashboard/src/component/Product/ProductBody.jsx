import React from 'react'
import Aside from '../Aside'
import ProductBodyHeader from './ProductBodyHeader'
import ProductBodyField from './ProductBodyField'

const ProductBody = () => {
    return (
        <main>
            <div id="main-wrapper" class="flex p-5 xl:pr-0">
                <Aside/>
                <div class=" w-full page-wrapper xl:px-6 px-0">
                    <main class="h-full  max-w-full">
                        <div class="container full-container p-0 flex flex-col gap-6">
                            <ProductBodyHeader/>
                            <ProductBodyField />
                        </div>
                    </main>
                </div>
            </div>
        </main>
    )
}

export default ProductBody