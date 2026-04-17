import React, { createContext, useContext, useState, useEffect } from 'react'

const AuthContext = createContext()

export const AuthProvider = ({ children }) => {
  const [user, setUser] = useState(null)
  const [isAdmin, setIsAdmin] = useState(false)
  const [loading, setLoading] = useState(false)

  // Load user from localStorage on mount
  useEffect(() => {
    const savedUser = localStorage.getItem('user')
    const savedToken = localStorage.getItem('token')
    if (savedUser && savedToken) {
      setUser(JSON.parse(savedUser))
    }
  }, [])

  const login = async (email, password) => {
    setLoading(true)
    try {
      // This will be implemented with actual API calls later
      console.log('Login attempt:', { email, password })
      // const response = await fetch('/api/auth/login', ...)
      setLoading(false)
    } catch (error) {
      console.error('Login error:', error)
      setLoading(false)
    }
  }

  const adminLogin = async (username, password) => {
    setLoading(true)
    try {
      // This will be implemented with actual API calls later
      console.log('Admin login attempt:', { username, password })
      // const response = await fetch('/api/admin/login', ...)
      setLoading(false)
    } catch (error) {
      console.error('Admin login error:', error)
      setLoading(false)
    }
  }

  const logout = () => {
    setUser(null)
    setIsAdmin(false)
    localStorage.removeItem('user')
    localStorage.removeItem('token')
    localStorage.removeItem('adminToken')
  }

  return (
    <AuthContext.Provider
      value={{
        user,
        isAdmin,
        loading,
        login,
        adminLogin,
        logout,
      }}
    >
      {children}
    </AuthContext.Provider>
  )
}

export const useAuth = () => {
  const context = useContext(AuthContext)
  if (!context) {
    throw new Error('useAuth must be used within AuthProvider')
  }
  return context
}
