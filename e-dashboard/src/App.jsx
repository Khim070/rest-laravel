import { useState } from 'react'
import './App.css'
import { BrowserRouter as Router, Routes, Route  } from 'react-router-dom'
import { Navigate } from 'react-router-dom'
import Home from './page/home'
import Product from './page/Product'
import ProductBody from './component/Product/ProductBody'
import Category from './page/Category'
import CategoryBody from './component/Category/CategoryBody'
import Review from './page/Review'
import ReviewBody from './component/Review/ReviewBody'
import Cart from './page/Cart'
import Shipping from './page/Shipping'
import ShippingBody from './component/Shipping/ShippingBody'
import Wishlist from './page/Wishlist'
import ProductStatus from './page/ProductStatus'
import OrderItem from './page/OrderItem'
import OrderItemBody from './component/OrderItem/OrderItemBody'
import Image from './page/Image'
import Coupon from './page/Coupon'
import CouponBody from './component/Coupon/CouponBody'
import User from './page/User'
import UserBody from './component/User/UserBody'
import MyProfile from './page/MyProfile'
import Login from './page/Login'
import ChangePassword from './page/ChangePassword'

function App() {

  return (
    <Router>
      <Routes>
        <Route path='/' element={<Navigate to="/home" />}/>
        <Route path='/home' element={<Home/>} />
        <Route path='/product' element={<Product/>}/>
        <Route path='/product-detail' element={<ProductBody/>}/>
        <Route path='/category' element={<Category/>}/>
        <Route path='/category-detail' element={<CategoryBody/>}/>
        <Route path='/review' element={<Review/>}/>
        <Route path='/review-detail' element={<ReviewBody/>}/>
        <Route path='/cart' element={<Cart/>}/>
        <Route path='/shipping' element={<Shipping/>}/>
        <Route path='/shipping-detail' element={<ShippingBody/>}/>
        <Route path='/wishlist' element={<Wishlist/>}/>
        <Route path='/status' element={<ProductStatus/>}/>
        <Route path='/order' element={<OrderItem/>}/>
        <Route path='/order-detail' element={<OrderItemBody/>}/>
        <Route path='/image' element={<Image/>}/>
        <Route path='/coupon' element={<Coupon/>}/>
        <Route path='/coupon-detail' element={<CouponBody/>}/>
        <Route path='/user' element={<User/>}/>
        <Route path='/user-detail' element={<UserBody/>}/>
        <Route path='/profile' element={<MyProfile/>}/>
        <Route path='/login' element={<Login/>}/>
        <Route path='/change-password' element={<ChangePassword/>}/>
      </Routes>
    </Router>
  )
}

export default App
