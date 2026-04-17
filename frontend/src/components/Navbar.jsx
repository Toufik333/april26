import React, { useState } from 'react'
import { Search, ShoppingCart, User, Menu, X } from 'lucide-react'
import { useCart } from '../context/CartContext'
import { useAuth } from '../context/AuthContext'

const Navbar = () => {
  const { cartCount } = useCart()
  const { user, isAdmin, logout } = useAuth()
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false)
  const [isSearchFocused, setIsSearchFocused] = useState(false)

  return (
    <nav className="bg-white border-b border-gray-200 sticky top-0 z-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-16">
          {/* Logo */}
          <div className="flex-shrink-0 flex items-center">
            <h1 className="text-2xl font-bold text-primary">ShopHub</h1>
          </div>

          {/* Search Bar - Desktop */}
          <div className="hidden md:block flex-1 max-w-md mx-8">
            <div className={`relative transition-all ${isSearchFocused ? 'ring-2 ring-primary' : ''}`}>
              <input
                type="text"
                placeholder="Search products..."
                onFocus={() => setIsSearchFocused(true)}
                onBlur={() => setIsSearchFocused(false)}
                className="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none"
              />
              <Search className="absolute right-3 top-2.5 w-5 h-5 text-gray-400" />
            </div>
          </div>

          {/* Desktop Navigation */}
          <div className="hidden md:flex items-center space-x-8">
            {/* Cart */}
            <button className="relative flex items-center text-gray-700 hover:text-primary transition-colors">
              <ShoppingCart className="w-6 h-6" />
              {cartCount > 0 && (
                <span className="absolute -top-2 -right-2 bg-error text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                  {cartCount}
                </span>
              )}
            </button>

            {/* User Menu */}
            <div className="relative group">
              <button className="flex items-center text-gray-700 hover:text-primary transition-colors">
                <User className="w-6 h-6" />
              </button>
              {/* Dropdown Menu */}
              <div className="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                {user ? (
                  <>
                    <a href="/account" className="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-t-lg">
                      My Account
                    </a>
                    <a href="/orders" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                      My Orders
                    </a>
                    {isAdmin && (
                      <a href="/admin" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                        Admin Panel
                      </a>
                    )}
                    <button
                      onClick={logout}
                      className="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-b-lg"
                    >
                      Logout
                    </button>
                  </>
                ) : (
                  <>
                    <a href="/login" className="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-t-lg">
                      Sign In
                    </a>
                    <a href="/register" className="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-b-lg">
                      Create Account
                    </a>
                  </>
                )}
              </div>
            </div>
          </div>

          {/* Mobile Menu Button */}
          <div className="md:hidden">
            <button
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
              className="text-gray-700 hover:text-primary"
            >
              {isMobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>
        </div>

        {/* Mobile Menu */}
        {isMobileMenuOpen && (
          <div className="md:hidden pb-4 border-t border-gray-200">
            {/* Mobile Search */}
            <div className="pt-4 pb-2">
              <div className="relative">
                <input
                  type="text"
                  placeholder="Search..."
                  className="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none"
                />
                <Search className="absolute right-3 top-2.5 w-5 h-5 text-gray-400" />
              </div>
            </div>

            {/* Mobile Links */}
            <a href="/cart" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
              Cart ({cartCount})
            </a>
            {user ? (
              <>
                <a href="/account" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                  My Account
                </a>
                <a href="/orders" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                  My Orders
                </a>
                {isAdmin && (
                  <a href="/admin" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    Admin Panel
                  </a>
                )}
                <button
                  onClick={logout}
                  className="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100"
                >
                  Logout
                </button>
              </>
            ) : (
              <>
                <a href="/login" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                  Sign In
                </a>
                <a href="/register" className="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                  Create Account
                </a>
              </>
            )}
          </div>
        )}
      </div>
    </nav>
  )
}

export default Navbar
