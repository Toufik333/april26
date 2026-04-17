# Phase 1 Development Roadmap - ShopHub

**Timeline**: 2-3 weeks  
**Status**: Ready to Start  
**Goal**: Lightweight MVP with hero carousel, search, categories, products, checkout, admin

---

## 📅 Week 1: Core Frontend Components & Homepage

### Day 1-2: Project Setup & Navbar
- [ ] Install dependencies (`npm install` both folders)
- [ ] Configure `.env` files
- [ ] Verify backend health: `GET /api/health` returns `{ status: 'API is running' }`
- [ ] Build **Navbar** component
  - [ ] Logo/branding
  - [ ] Search bar (static for now)
  - [ ] Cart icon (shows count)
  - [ ] Account dropdown (guest/admin)
  - [ ] Mobile hamburger menu
  - [ ] Sticky positioning
  - [ ] Responsive design

**Backend Checkpoint**: API running on port 5000 ✓

### Day 3-4: Hero Carousel & Categories
- [ ] Build **HeroCarousel** component (Embla Carousel)
  - [ ] Featured items display
  - [ ] Autoplay (5s interval)
  - [ ] Fade transitions
  - [ ] Prev/Next arrows
  - [ ] Indicator dots
  - [ ] Responsive sizing
- [ ] Build **CategorySection** component
  - [ ] Horizontal scroll
  - [ ] Card layout (icon + label)
  - [ ] Click handler (prepare for filtering)
  - [ ] Max 4-6 categories displayed
  - [ ] Responsive

**Design Checkpoint**: Homepage skeleton complete ✓

### Day 5: Product Grid & Layout Integration
- [ ] Build **ProductCard** component
  - [ ] Image (lazy-loaded)
  - [ ] Product name (2-line truncate)
  - [ ] Price
  - [ ] "Add to Cart" button
  - [ ] Hover animation
- [ ] Build **ProductGrid** component
  - [ ] 4 columns (desktop)
  - [ ] 2 columns (tablet)
  - [ ] 1 column (mobile)
  - [ ] Gap/spacing
  - [ ] Responsive grid
- [ ] Build **HomePage** component
  - [ ] Integrate Navbar
  - [ ] Integrate HeroCarousel
  - [ ] Integrate CategorySection
  - [ ] Integrate ProductGrid
  - [ ] All visible on desktop without scroll

**Frontend Checkpoint**: Homepage visual complete ✓

---

## 📅 Week 2: Backend APIs, Search & Cart

### Day 6-7: Product & Category APIs
- [ ] Create `/api/products` GET endpoint
  - [ ] Return all products
  - [ ] Pagination (10 per page)
  - [ ] Include category reference
- [ ] Create `/api/categories` GET endpoint
  - [ ] Return all categories
- [ ] Create `/api/products/:id` GET endpoint
  - [ ] Return single product details
- [ ] Create `/api/search?q=keyword` endpoint
  - [ ] Text search on name + description
  - [ ] Limit to 10 results
  - [ ] Return matching products

**Backend Checkpoint**: Product APIs working ✓

### Day 8: Search & Cart Context
- [ ] Build **SearchBar** component with autocomplete
  - [ ] Debounced API calls
  - [ ] Dropdown suggestions (top 5)
  - [ ] Empty state with trending
  - [ ] Mobile full-screen overlay
- [ ] Create **CartContext** (React Context)
  - [ ] Add to cart action
  - [ ] Remove from cart
  - [ ] Update quantity
  - [ ] Calculate total
- [ ] Implement localStorage persistence
  - [ ] Save cart on change
  - [ ] Load cart on mount

**Frontend Checkpoint**: Search & cart working ✓

### Day 9-10: Product & Checkout Pages
- [ ] Build **ProductPage** component
  - [ ] Product details display
  - [ ] Add to cart button
  - [ ] Related products (optional)
- [ ] Build **CheckoutPage** component with React Hook Form + Zod
  - [ ] Form fields (email, name, phone, address)
  - [ ] Address breakdown (street, city, state, zip)
  - [ ] Validation using Zod
  - [ ] Form error display
  - [ ] Submit button
- [ ] Build **CartPage** component (optional for Week 2)
  - [ ] Review items
  - [ ] Update quantities
  - [ ] Remove items
  - [ ] Subtotal display

**Frontend Checkpoint**: All customer pages built ✓

---

## 📅 Week 3: Stripe Payment, Admin & Deployment

### Day 11-12: Stripe Integration
- [ ] Integrate Stripe (test mode)
- [ ] Backend: Create `/api/payments/create-intent` endpoint
  - [ ] Accept order items + customer info
  - [ ] Create Stripe PaymentIntent
  - [ ] Return client secret
- [ ] Backend: Create `/api/payments/confirm` endpoint
  - [ ] Confirm payment
  - [ ] Save order to database
- [ ] Frontend: Add Stripe card form to CheckoutPage
  - [ ] Load Stripe.js
  - [ ] Render card element
  - [ ] Handle payment confirmation
  - [ ] Show error messages
  - [ ] Redirect to confirmation page

**Backend Checkpoint**: Stripe payments working ✓

### Day 13: Admin Login & Dashboard
- [ ] Backend: Create `/api/admin/login` endpoint
  - [ ] Accept username + password
  - [ ] Verify credentials
  - [ ] Generate JWT token
  - [ ] Return token
- [ ] Frontend: Build **AdminLoginPage**
  - [ ] Username/password form
  - [ ] Form validation
  - [ ] Login error handling
  - [ ] Store JWT in localStorage
- [ ] Frontend: Build **AdminDashboard**
  - [ ] Display stats (total orders, revenue)
  - [ ] Recent orders list
  - [ ] Top products (optional)

**Admin Checkpoint**: Login & dashboard working ✓

### Day 14: Admin Management Features
- [ ] Backend: Create admin CRUD endpoints
  - [ ] `POST /api/admin/products` - Create product
  - [ ] `PUT /api/admin/products/:id` - Update product
  - [ ] `DELETE /api/admin/products/:id` - Delete product
  - [ ] `GET /api/admin/orders` - List all orders
  - [ ] `PUT /api/admin/orders/:id` - Update order status
- [ ] Frontend: Build **AdminProductsPage**
  - [ ] Product list table
  - [ ] Add product form
  - [ ] Edit product form
  - [ ] Delete confirmation
- [ ] Frontend: Build **AdminOrdersPage**
  - [ ] Orders table
  - [ ] View order details
  - [ ] Update status dropdown
  - [ ] Notes field

**Admin Checkpoint**: Full CRUD working ✓

### Day 15: Testing & Optimization
- [ ] Test all flows end-to-end
  - [ ] Browse homepage
  - [ ] Search products
  - [ ] Add to cart
  - [ ] Checkout flow
  - [ ] Stripe payment (test card)
  - [ ] Order created in database
  - [ ] Admin sees order
  - [ ] Admin updates order status
- [ ] Responsive testing
  - [ ] Mobile (iPhone 12)
  - [ ] Tablet (iPad)
  - [ ] Desktop (1920px)
- [ ] Performance optimization
  - [ ] Image lazy-loading
  - [ ] Code splitting
  - [ ] Remove console logs/debuggers
  - [ ] Check Lighthouse score

**Testing Checkpoint**: No errors, Lighthouse > 85 ✓

### Day 16-21: Deployment & Polish
- [ ] Email setup (Nodemailer)
  - [ ] Send order confirmation email
  - [ ] Test with real email
- [ ] Deploy backend to Railway
  - [ ] Create Railway account
  - [ ] Connect GitHub repository
  - [ ] Set environment variables
  - [ ] Deploy
  - [ ] Test API endpoints
- [ ] Deploy frontend to Vercel
  - [ ] Create Vercel account
  - [ ] Connect GitHub repository
  - [ ] Set environment variables
  - [ ] Deploy
  - [ ] Verify API connection
- [ ] Final testing
  - [ ] Test live version
  - [ ] Check performance metrics
  - [ ] Security review (HTTPS, secure tokens)
- [ ] Documentation
  - [ ] Update README with deployment info
  - [ ] Create user guide (optional)
  - [ ] Document admin processes

**Deployment Checkpoint**: Live on production ✓

---

## 🎯 Daily Standup Template (For Self)

```
Today's Focus: [Component/Feature]
Completed:
- Item 1
- Item 2

In Progress:
- Item 1

Blockers:
- Any issues?

Tomorrow:
- Next item
```

---

## 🧪 Testing Checklist (Before Each Deploy)

### Frontend Testing
- [ ] No console errors/warnings
- [ ] All pages render correctly
- [ ] Responsive on mobile/tablet/desktop
- [ ] Form validation works
- [ ] Cart persists after refresh
- [ ] Search autocomplete functional
- [ ] Animations smooth
- [ ] Images load properly

### Backend Testing
- [ ] All endpoints return correct data
- [ ] Error handling works (try invalid data)
- [ ] Database saving correctly
- [ ] JWT authentication working
- [ ] CORS headers correct
- [ ] Stripe webhooks firing
- [ ] Email sending works

### E2E Testing
- [ ] Browse → Search → Add to cart → Checkout → Pay → Success
- [ ] Admin: Login → View orders → Update status → Verify
- [ ] Admin: Add product → View on homepage → Edit → Delete
- [ ] Mobile flow works (touch, responsive)
- [ ] No 404 errors
- [ ] API base URL correct in production

---

## 📊 Performance Targets (Track Weekly)

| Metric | Target | Actual | Week 1 | Week 2 | Week 3 |
|--------|--------|--------|--------|--------|--------|
| Bundle Size | < 90KB | _____ | _____ | _____ | _____ |
| LCP | < 2.5s | _____ | _____ | _____ | _____ |
| FID | < 100ms | _____ | _____ | _____ | _____ |
| CLS | < 0.1 | _____ | _____ | _____ | _____ |
| Lighthouse | > 85 | _____ | _____ | _____ | _____ |

---

## 🔗 Useful Links During Development

- [React Docs](https://react.dev/)
- [Vite Docs](https://vitejs.dev/)
- [Tailwind CSS](https://tailwindcss.com/)
- [shadcn/ui](https://ui.shadcn.com/) - Copy components as needed
- [Lucide Icons](https://lucide.dev/)
- [Embla Carousel](https://www.embla-carousel.com/)
- [React Hook Form](https://react-hook-form.com/)
- [Zod Validation](https://zod.dev/)
- [Stripe React](https://stripe.com/docs/stripe-js/react)
- [Express.js](https://expressjs.com/)
- [MongoDB Docs](https://docs.mongodb.com/)

---

## 🚀 Quick Commands Reference

```bash
# Frontend
cd frontend
npm install              # Install dependencies
npm run dev              # Start dev server (http://localhost:5173)
npm run build           # Build for production
npm run preview         # Preview production build
npm run lint            # Check for errors

# Backend
cd backend
npm install              # Install dependencies
npm run dev              # Start dev server with nodemon (http://localhost:5000)
npm start               # Start production server
npm run lint            # Check for errors

# Git
git status              # Check status
git add .               # Stage changes
git commit -m "msg"     # Commit
git push origin main    # Push to GitHub
git checkout -b feature # Create feature branch
```

---

## 🎉 Phase 1 Complete Checklist

### Frontend Complete
- [ ] All pages built and responsive
- [ ] Search functional with autocomplete
- [ ] Cart working with localStorage
- [ ] Checkout form validation
- [ ] Admin panel functional
- [ ] Dark mode (optional)
- [ ] No console errors
- [ ] Lighthouse > 85

### Backend Complete
- [ ] All APIs working
- [ ] Database properly indexed
- [ ] Stripe integration complete
- [ ] Email sending works
- [ ] Authentication implemented
- [ ] Error handling proper
- [ ] No security issues

### Deployed
- [ ] Frontend on Vercel
- [ ] Backend on Railway
- [ ] Database on MongoDB Atlas
- [ ] Environment variables secured
- [ ] CORS working
- [ ] Live testing passed

---

**Ready to build? Start with Day 1! 🚀**

Track your progress in this file and update completed items as you go.
