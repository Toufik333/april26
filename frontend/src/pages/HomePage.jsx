import React from 'react'
import Navbar from '../components/Navbar'

const HomePage = () => {
  return (
    <div className="min-h-screen bg-white">
      <Navbar />
      
      {/* Hero Section */}
      <section className="bg-gray-50 py-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center">
            <h1 className="text-4xl font-bold text-gray-900 mb-4">Welcome to ShopHub</h1>
            <p className="text-xl text-gray-600 mb-8">Discover amazing products at great prices</p>
            <button className="bg-primary text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors">
              Shop Now
            </button>
          </div>
        </div>
      </section>

      {/* Featured Products Section */}
      <section className="py-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h2 className="text-3xl font-bold mb-8">Featured Products</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {/* Placeholder Product Cards */}
            {[1, 2, 3, 4].map((i) => (
              <div key={i} className="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
                <div className="h-48 bg-gray-300"></div>
                <div className="p-4">
                  <h3 className="font-semibold text-gray-900 mb-2">Product {i}</h3>
                  <p className="text-primary font-bold">$99.99</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </div>
  )
}

export default HomePage
