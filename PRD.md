# Product Requirements Document (PRD)
## Modern Lightweight E-Commerce Platform

**Project Name:** ShopHub (or your preferred name)  
**Tech Stack:** MERN (MongoDB, Express, React, Node.js)  
**Timeline:** Phased Development  
**Version:** 1.0 (Phase 1)  
**Last Updated:** April 18, 2026

---

## 1. EXECUTIVE SUMMARY

Build a modern, lightweight, Apple-inspired e-commerce platform using MERN stack. Focus on exceptional UX with minimal complexity, phased rollout with quick wins, and scalability for future features.

### Key Philosophy
- **Lightweight**: No bloated frameworks, use modern tools (Vite, Tailwind CSS)
- **Modern Design**: Minimalist, clean aesthetics inspired by Apple
- **Phased Growth**: Build core features first, expand later without database migration pain
- **User-First**: Frictionless shopping (no mandatory login), simple admin panel

---

## 2. VISION & GOALS

### Primary Goals
1. **Phase 1 (Quick Win)**: Launch with hero carousel, featured products, basic search, order management
2. **Mobile & Desktop**: Fully responsive with zero layout issues
3. **Admin Control**: Non-technical admin can manage products and orders
4. **Guest Checkout**: Users order without login (email is captured)
5. **Performance**: Sub-2s load time, smooth animations

### Success Metrics
- Page load < 2 seconds
- Mobile usability score > 90
- Order completion rate > 70%
- Admin operations < 5 clicks per action

---

## 3. RESEARCH FINDINGS & RECOMMENDATIONS

### 3.1 Technology Stack Analysis

**Why MERN?**
- ✅ Full JavaScript stack (faster development)
- ✅ MongoDB allows schema flexibility (easy to add fields later)
- ✅ React with Vite = fastest modern SPA possible
- ✅ Express is lightweight & minimal

**Recommended Alternatives for Components:**
- **UI Library**: Use **shadcn/ui** (copy-paste, fully customizable, no dependencies)
- **Icons**: Lucide React (lightweight, SVG-based)
- **Forms**: React Hook Form + Zod for validation
- **Carousel**: Embla Carousel (lightweight, headless)
- **Build Tool**: Vite (vs Create React App - 10x faster builds)

### 3.2 Open-Source Solutions Reviewed

| Solution | Type | Why Not Use | Why Consider |
|----------|------|------------|--------------|
| **Medusa** | Headless Commerce | Overkill for Phase 1, Complex setup | For Phase 2+ if scaling to B2B |
| **Saleor** | GraphQL E-Commerce | Enterprise-level, Expensive hosting | Future integration possible |
| **WooCommerce** | WordPress Plugin | Tied to WordPress, Heavy | Not MERN |
| **OpenCart** | Standalone | Not MERN, PHP-based | Reference for UI patterns |
| **Shopify API** | Hosted | Expensive, Vendor lock-in | Integration for Phase 2 |
| **Custom MERN** ⭐ | Lightweight | Takes longer initially | Best for control & learning |

**Verdict**: Build custom MERN (using research findings) for Phase 1. Blueprint from open-source UI patterns but keep code minimal.

### 3.3 MCPs & Tools for Development
- **Prisma ORM** (Optional): Easier than raw MongoDB, but adds overhead
- **GraphQL** (Optional): Skip for Phase 1, add in Phase 2 if needed
- **Testing**: Jest + Vitest for unit tests, Playwright for E2E
- **AI Integration**: MCPs available for product descriptions, image generation later

---

## 4. PRODUCT SPECIFICATIONS

### 4.1 User Experience (Desktop First, Mobile Responsive)

#### Layout: Above-the-Fold (No Initial Scroll)
```
┌────────────────────────────────────────┐
│        Navigation Bar                  │
│  [Logo]  [Search]  [Cart]  [Account]   │
├────────────────────────────────────────┤
│                                        │
│      Hero Carousel                     │
│   (Featured Items - Autoplay)          │
│      [Prev] [Indicators] [Next]        │
│                                        │
├────────────────────────────────────────┤
│   Categories (Horizontal Scroll)       │
│  [All] [Electronics] [Fashion] [Home]  │
├────────────────────────────────────────┤
│   Featured Products Grid (4 columns)   │
│  [Product] [Product] [Product] [Product]│
│  [Product] [Product] [Product] [Product]│
└────────────────────────────────────────┘
                 ↓ SCROLL ↓
      (More featured products)
```

#### Components

**1. Navigation Bar**
- Logo (left)
- Search bar (center) with autocomplete
- Cart icon (right) - shows item count
- Account / Guest checkout (right)
- Sticky on scroll
- Mobile: Hamburger menu collapses search & account

**2. Hero Carousel**
- 3-5 featured/promotional items
- Autoplay (5s interval)
- Smooth fade transitions
- Indicators (dots) at bottom
- Prev/Next arrows
- Responsive height (80vh desktop, 60vh mobile)

**3. Categories Section**
- Horizontal scrollable (4-6 categories only, not all)
- Card style with icon + label
- Tap to filter products below
- Mobile: Smaller cards, full width

**4. Featured Products Grid**
- 4 columns (desktop), 2 columns (tablet), 1 column (mobile)
- Product card structure:
  - Image (lazy-loaded)
  - Name (1-2 lines, truncated)
  - Price (bold, primary color)
  - Star rating (if available in Phase 1)
  - "Add to Cart" button (hover effect)
- Smooth hover animations

**5. Search Feature**
- Real-time search (debounced API calls)
- Search by: Product name, category, SKU
- Autocomplete dropdown showing top 5 results
- Empty state with trending items
- Mobile: Full-screen search overlay

### 4.2 Shopping Flow (Guest Checkout)

```
Browse → Search/Filter → View Product Details → 
Add to Cart → Checkout → Enter Email → 
Select Payment (Stripe) → Confirm Order → 
Success Page with Order ID
```

**Order Placement (No Login Required)**
- Minimal checkout form:
  - Email
  - Full Name
  - Phone (optional)
  - Shipping Address
  - City, State, ZIP
  - Payment via Stripe
- Save email in database (for admin to contact & future marketing)
- Order confirmation email sent immediately
- Order ID displayed for reference

### 4.3 Admin Panel

**Access**: Simple username/password (not full multi-user system for Phase 1)

**Dashboard Overview**
- Total Orders (count)
- Total Revenue (sum)
- Recent Orders (last 10)
- Top Selling Products (count)

**Order Management**
- View all orders (sortable by date, status)
- Order details: customer email, items, total, address
- Mark status: Pending → Processing → Shipped → Delivered
- Print shipping label (future integration)
- Customer notes section

**Product Management**
- List all products (with pagination)
- Add/Edit/Delete products
  - Name, Description, Price, Category
  - Image upload (single image in Phase 1)
  - Stock quantity
  - SKU (optional in Phase 1)
- Import products (CSV upload - Phase 2)

**Category Management**
- Add/Edit/Delete categories
- Simple: Name + Icon/Color
- Show product count per category

**Reports** (Basic - Phase 1)
- Orders by date (simple chart)
- Best selling products
- Export orders as CSV

---

## 5. PHASED DEVELOPMENT APPROACH

### Phase 1: MVP (Quick Win) - 2-3 Weeks
**Focus**: Core shopping + admin, zero technical debt

**Frontend**
- [x] Homepage with hero carousel, categories, featured products
- [x] Product detail page
- [x] Search functionality (client-side search initially)
- [x] Shopping cart (localStorage)
- [x] Checkout form
- [x] Order confirmation page
- [x] Responsive mobile/desktop layout
- [x] Dark mode toggle (optional, nice-to-have)

**Backend**
- [x] Products API (CRUD)
- [x] Categories API (CRUD)
- [x] Orders API (Create, Read)
- [x] Search endpoint (filtered products)
- [x] Stripe payment integration
- [x] Email notifications (order confirmation)

**Admin Panel**
- [x] Login (hardcoded credentials or basic JWT)
- [x] Dashboard (stats overview)
- [x] Order management (view, update status)
- [x] Product management (CRUD)
- [x] Category management (CRUD)

**Database** (See Section 6)
- Users (minimal - only for admin)
- Products
- Categories
- Orders
- OrderItems

### Phase 2: Enhanced Features - Future
- User accounts & authentication
- Product reviews & ratings
- Wishlist feature
- Inventory notifications
- Advanced search filters
- Email marketing integration
- Bulk product import
- Analytics dashboard
- Multi-language support

### Phase 3: Scale & Optimize
- Caching layer (Redis)
- CDN for images
- Payment gateway alternatives
- Marketplace features
- Subscription products

---

## 6. DATABASE SCHEMA (MongoDB Collections)

### Collection: Products
```javascript
{
  _id: ObjectId,
  name: String,
  description: String,
  price: Number,
  categoryId: ObjectId (reference),
  image: String (URL),
  stock: Number,
  sku: String (optional),
  slug: String (for URL-friendly paths),
  featured: Boolean,
  createdAt: Date,
  updatedAt: Date
}
```

### Collection: Categories
```javascript
{
  _id: ObjectId,
  name: String,
  slug: String,
  icon: String (emoji or icon name),
  description: String (optional),
  createdAt: Date
}
```

### Collection: Orders
```javascript
{
  _id: ObjectId,
  orderNumber: String (unique, like "ORD-20260418-001"),
  customerEmail: String,
  customerName: String,
  customerPhone: String,
  shippingAddress: {
    street: String,
    city: String,
    state: String,
    zip: String,
    country: String
  },
  items: [
    {
      productId: ObjectId,
      productName: String,
      quantity: Number,
      price: Number,
      subtotal: Number
    }
  ],
  total: Number,
  status: String (Pending, Processing, Shipped, Delivered),
  paymentId: String (Stripe transaction ID),
  paymentStatus: String (Paid, Pending, Failed),
  notes: String (admin notes),
  createdAt: Date,
  updatedAt: Date
}
```

### Collection: Admin (Phase 1 - Simple)
```javascript
{
  _id: ObjectId,
  username: String,
  password: String (hashed),
  email: String,
  role: String (admin)
}
```

**Design Philosophy**: All collections start simple. Easy to add fields later (MongoDB's strength).

---

## 7. DESIGN SYSTEM

### Color Palette
- **Primary**: Minimal (light gray #F5F5F5 for light mode, #000 for dark mode)
- **Accent**: Subtle blue/green (#0066CC for actions)
- **Text**: #333 on light, #FFF on dark
- **Borders**: #DDD (light), #444 (dark)
- **Error**: #DC2626 (red)
- **Success**: #059669 (green)

### Typography
- **Font Family**: `-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto` (Apple-like)
- **Font Scale**:
  - H1: 32px bold
  - H2: 24px bold
  - H3: 18px semi-bold
  - Body: 16px regular
  - Small: 14px regular

### Spacing
- Base: 8px grid (8, 16, 24, 32, 48, 64px)
- Margins between sections: 48-64px
- Padding within sections: 16-24px

### Interactions
- Button hover: Slight background darken (5%)
- Links: Underline on hover
- Transitions: 200ms ease (CSS)
- Carousels: Smooth scroll behavior
- Modals: Fade-in, 300ms duration

---

## 8. TECHNICAL ARCHITECTURE

### Folder Structure
```
april26/
├── frontend/
│   ├── src/
│   │   ├── components/          # Reusable UI components
│   │   │   ├── Navbar.jsx
│   │   │   ├── HeroCarousel.jsx
│   │   │   ├── ProductCard.jsx
│   │   │   ├── SearchBar.jsx
│   │   │   └── ...
│   │   ├── pages/               # Page-level components
│   │   │   ├── HomePage.jsx
│   │   │   ├── ProductPage.jsx
│   │   │   ├── CheckoutPage.jsx
│   │   │   ├── AdminDashboard.jsx
│   │   │   └── ...
│   │   ├── hooks/               # Custom React hooks
│   │   ├── context/             # React Context API (cart, auth)
│   │   ├── utils/               # Helpers, API calls
│   │   ├── styles/              # Global CSS (Tailwind config)
│   │   ├── App.jsx
│   │   └── main.jsx
│   ├── index.html
│   ├── vite.config.js
│   ├── tailwind.config.js
│   └── package.json
│
├── backend/
│   ├── src/
│   │   ├── models/              # MongoDB schemas
│   │   │   ├── Product.js
│   │   │   ├── Category.js
│   │   │   ├── Order.js
│   │   │   └── Admin.js
│   │   ├── routes/              # API routes
│   │   │   ├── products.js
│   │   │   ├── categories.js
│   │   │   ├── orders.js
│   │   │   ├── admin.js
│   │   │   └── search.js
│   │   ├── controllers/         # Business logic
│   │   ├── middleware/          # Auth, validation
│   │   ├── config/              # DB, environment
│   │   ├── server.js
│   │   └── ...
│   ├── .env.example
│   ├── package.json
│   └── README.md
│
├── .gitignore
├── PRD.md
└── README.md
```

### Technology Choices

**Frontend**
- **Build**: Vite (not Create React App)
- **Framework**: React 18+
- **Styling**: Tailwind CSS v4 (latest)
- **Components**: shadcn/ui (optional, copy-paste as needed)
- **Icons**: Lucide React
- **Carousel**: Embla Carousel or Swiper (lightweight)
- **Forms**: React Hook Form + Zod
- **HTTP Client**: Axios or Fetch API
- **State Management**: React Context API (avoid Redux for Phase 1)
- **Payment**: Stripe.js library

**Backend**
- **Runtime**: Node.js 18+
- **Framework**: Express.js (minimal)
- **Database**: MongoDB (Atlas for cloud)
- **Authentication**: JWT for admin (simple)
- **Validation**: Joi or Zod
- **Payment**: Stripe API
- **Email**: Nodemailer or SendGrid (simple)
- **Hosting**: Vercel (frontend) + Railway/Render (backend)

---

## 9. API ENDPOINTS (Phase 1)

### Products
- `GET /api/products` → List all products with pagination
- `GET /api/products/:id` → Product details
- `POST /api/products` → Create (admin only)
- `PUT /api/products/:id` → Update (admin only)
- `DELETE /api/products/:id` → Delete (admin only)

### Categories
- `GET /api/categories` → List all categories
- `POST /api/categories` → Create (admin only)
- `PUT /api/categories/:id` → Update (admin only)
- `DELETE /api/categories/:id` → Delete (admin only)

### Orders
- `POST /api/orders` → Create new order (guest)
- `GET /api/orders` → List all orders (admin only)
- `GET /api/orders/:id` → Order details (admin only)
- `PUT /api/orders/:id` → Update order status (admin only)

### Search
- `GET /api/search?q=keyword` → Search products

### Payments
- `POST /api/payments/create-intent` → Create Stripe intent
- `POST /api/payments/confirm` → Confirm payment

### Admin
- `POST /api/admin/login` → Admin login
- `GET /api/admin/dashboard` → Dashboard stats

---

## 10. EXTERNAL INTEGRATIONS

### Stripe
- Payment processing
- Webhook for payment confirmations
- PCI compliance handled by Stripe

### Email Service (Choose one)
- **Nodemailer**: Free, SMTP-based
- **SendGrid**: Free tier 100 emails/day
- **Mailgun**: Free tier 1000 emails/month

### Image Hosting (Phase 1)
- Use relative paths in React (store images in `/public`)
- Phase 2: Upgrade to Cloudinary or AWS S3

---

## 11. PERFORMANCE TARGETS

| Metric | Target | Tool |
|--------|--------|------|
| Lighthouse Score | >90 | Google PageSpeed |
| LCP (Largest Contentful Paint) | <2.5s | Core Web Vitals |
| FID (First Input Delay) | <100ms | Core Web Vitals |
| CLS (Cumulative Layout Shift) | <0.1 | Core Web Vitals |
| Bundle Size (gzipped) | <150KB | Webpack Bundle Analyzer |
| Mobile FCP | <1.8s | Lighthouse |

**Optimization Tactics**
- Code splitting by route (React lazy + Suspense)
- Image lazy-loading (native `loading="lazy"`)
- Minification & compression (Vite does this)
- CDN for frontend (Vercel)

---

## 12. SUCCESS CRITERIA (Phase 1 Definition of Done)

**Frontend**
- [x] All pages responsive (mobile 320px+, desktop 1920px+)
- [x] Search functional with autocomplete
- [x] Cart persists across browser refresh
- [x] Checkout flow complete & tested
- [x] Admin login & product management working
- [x] No console errors or warnings
- [x] Lighthouse score > 85

**Backend**
- [x] All API endpoints returning correct data
- [x] Stripe payments working (test mode)
- [x] Order emails sending
- [x] Admin can see and manage orders
- [x] Database indexed properly
- [x] Error handling implemented (try-catch, validation)

**Deployment**
- [x] Frontend deployed to Vercel
- [x] Backend deployed to Railway/Render
- [x] Environment variables secured
- [x] CORS configured properly
- [x] Database backups working

---

## 13. RISKS & MITIGATION

| Risk | Likelihood | Impact | Mitigation |
|------|-----------|--------|-----------|
| Stripe integration delays | Low | High | Start early, use test mode |
| Mobile layout issues | Medium | High | Test on real devices early |
| Database scaling | Low | Medium | Use MongoDB Atlas auto-scaling |
| Payment failures | Low | High | Implement retry logic & webhooks |
| Admin password loss | Low | Medium | Email recovery flow Phase 2 |

---

## 14. NEXT STEPS (After PRD Approval)

1. **Week 1**: 
   - Setup project structure (Vite + React frontend, Express backend)
   - Create Git branches for features
   - Setup MongoDB Atlas & Stripe accounts
   - Database schema finalized

2. **Week 2**:
   - Build core components (Navbar, Hero Carousel, Product Grid)
   - Setup API routes
   - Implement search functionality
   - Admin login & dashboard

3. **Week 3**:
   - Payment integration
   - Order creation & management
   - Email notifications
   - Testing & deployment

---

## 15. APPENDIX

### Useful Resources
- **Vite Docs**: https://vitejs.dev/
- **Tailwind CSS**: https://tailwindcss.com/
- **shadcn/ui**: https://ui.shadcn.com/
- **Stripe React Integration**: https://stripe.com/docs/stripe-js/react
- **MongoDB Best Practices**: https://docs.mongodb.com/

### Glossary
- **Hero Carousel**: Large rotating banner at top of page with featured items
- **Featured Products**: Curated selection of popular/promoted items
- **Guest Checkout**: Shopping without account creation
- **SKU**: Stock Keeping Unit (product identifier)
- **LCP/FID/CLS**: Core Web Vitals (performance metrics)

---

## APPROVAL & SIGN-OFF

**Created By**: AI Assistant  
**Date**: April 18, 2026  
**Status**: Ready for Review  

**Stakeholder Review**:
- [ ] Approved by: ___________________
- [ ] Date Approved: ___________________
- [ ] Notes/Changes: ___________________
