import React from 'react'
import Aside from '../component/Aside'
import ProfileHeader from '../component/Profile/ProfileHeader'
import ProfileBody from '../component/Profile/ProfileBody'

const MyProfile = () => {
    return (
        <main>
            <div id="main-wrapper" class="flex p-5 xl:pr-0">
                <Aside/>
                <div class=" w-full page-wrapper xl:px-6 px-0">
                    <main class="h-full  max-w-full">
                        <div class="container full-container p-0 flex flex-col gap-6">
                            <ProfileHeader/>
                            <ProfileBody />
                        </div>
                    </main>
                </div>
            </div>
        </main>
    )
}

export default MyProfile