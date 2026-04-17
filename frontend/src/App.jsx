import { BrowserRouter as Router, Routes, Route } from 'react-router-dom'
import { CartProvider } from './context/CartContext'
import { AuthProvider } from './context/AuthContext'
import Navbar from './components/Navbar'
import HomePage from './pages/HomePage'

export default function App() {
  return (
    <Router>
      <AuthProvider>
        <CartProvider>
          <div className="min-h-screen bg-white dark:bg-black text-black dark:text-white">
            <Navbar />
            <Routes>
              <Route path="/" element={<HomePage />} />
              {/* More routes will be added */}
            </Routes>
          </div>
        </CartProvider>
      </AuthProvider>
    </Router>
  )
}
