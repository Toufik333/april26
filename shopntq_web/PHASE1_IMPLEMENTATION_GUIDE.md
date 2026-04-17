# SHOPNTQ - Phase 1 Implementation Guide

**Status:** Ready to Build  
**Timeline:** 2-3 weeks  
**Target Launch:** End of Week 3  

---

## 🎯 PHASE 1 SCOPE SUMMARY

### Decisions Finalized ✅
1. **Hero Carousel Management:** Admin can mark products as `is_featured = 1`
2. **Product Images:** Use placeholders for MVP (no real images needed yet)
3. **Sample Accounts:**
   - **Customer:** user1@shop.local / password: `user1`
   - **Admin:** admin1@shop.local / password: `admin1`
4. **Hosting:** Stay on XAMPP (no cloud migration for Phase 1)
5. **Database:** Added `is_featured` column to products + sample data

### Database Changes Made ✅
- ✅ Added `is_featured` boolean column to products table
- ✅ Added sample user/admin accounts (pre-hashed passwords)
- ✅ Added 6 sample categories with 10 sample products
- ✅ Marked 4 products as featured for hero carousel

---

## 🗂️ PROJECT STRUCTURE (To Build)

```
shopntq_web/
├── api/                           # PHP Backend APIs
│   ├── search.php                 # Product search endpoint
│   ├── products.php               # Get products with filters
│   ├── categories.php             # Get categories
│   ├── cart.php                   # Cart operations (add, remove, update)
│   ├── orders.php                 # Create orders
│   ├── auth.php                   # Login/logout
│   └── admin/
│       ├── products.php           # Manage product featured status
│       ├── featured.php           # Manage hero carousel items
│       └── dashboard.php          # Admin overview
│
├── src/                           # Astro Frontend
│   ├── pages/
│   │   ├── index.astro            # Homepage
│   │   ├── search.astro           # Search results page
│   │   ├── products/
│   │   │   └── [slug].astro       # Product detail page
│   │   ├── cart.astro             # Shopping cart page
│   │   ├── checkout/
│   │   │   ├── index.astro        # Checkout form
│   │   │   └── confirm.astro      # Order confirmation
│   │   ├── login.astro            # Login page
│   │   └── admin/
│   │       ├── dashboard.astro    # Admin dashboard
│   │       └── products.astro     # Manage featured products
│   │
│   ├── components/
│   │   ├── Header.astro           # Top navigation + search bar
│   │   ├── SearchBar.astro        # Search input with AJAX
│   │   ├── HeroCarousel.astro     # Featured products carousel
│   │   ├── CategorySection.astro  # Browse categories
│   │   ├── CategoryCard.astro     # Individual category card
│   │   ├── ProductGrid.astro      # Grid of products
│   │   ├── ProductCard.astro      # Individual product card
│   │   ├── Footer.astro           # Footer section
│   │   └── Cart/
│   │       ├── CartIcon.astro     # Cart count indicator
│   │       └── CartDrawer.astro   # Side cart preview (optional Phase 1)
│   │
│   ├── layouts/
│   │   ├── Layout.astro           # Main layout wrapper
│   │   └── AdminLayout.astro      # Admin area layout
│   │
│   ├── styles/
│   │   └── global.css             # Global Tailwind styles
│   │
│   └── lib/
│       ├── api.js                 # API client helper functions
│       ├── cart.js                # Cart logic (localStorage)
│       └── utils.js               # Utility functions
│
├── public/
│   ├── images/
│   │   ├── placeholder.jpg        # Placeholder product image
│   │   ├── logo.svg               # SHOPNTQ logo
│   │   └── icons/                 # SVG icons (Tabler Icons)
│   └── fonts/                     # System fonts or Geist
│
├── db_test.php                    # Database connection test (EXISTING)
├── setup-accounts.php             # Setup sample accounts (NEW)
├── shopntq.sql                    # Updated schema with is_featured (UPDATED)
├── package.json                   # Dependencies
├── astro.config.mjs               # Astro configuration
├── tailwind.config.js             # Tailwind configuration
└── .env.example                   # Environment variables template
```

---

## 📋 BUILD CHECKLIST - WEEK 1: FOUNDATION

### Phase 1.1: Project Setup (Days 1-2)
- [ ] Initialize Astro project
  ```bash
  npm create astro@latest shopntq-frontend -- --template minimal
  cd shopntq-frontend
  ```
- [ ] Install dependencies:
  ```bash
  npm install -D tailwindcss postcss autoprefixer daisyui embla-carousel embla-carousel-autoplay
  npm install alpinejs
  ```
- [ ] Configure Tailwind CSS + DaisyUI
- [ ] Setup `.env` file with API base URL (`http://localhost/api`)
- [ ] Create base `Layout.astro` component
- [ ] Setup global CSS with Tailwind

### Phase 1.2: Component Foundation (Days 2-3)
- [ ] Create `Header.astro` component
  - Logo + branding
  - Search bar (input only, no functionality yet)
  - Cart icon (placeholder)
  - Navigation menu
- [ ] Create `Footer.astro` component
  - Links, copyright, contact
- [ ] Create base styling utilities
- [ ] Setup responsive breakpoints

### Phase 1.3: API Endpoints (Days 3-4)
- [ ] `/api/categories.php` - GET all categories
  ```php
  Returns: [{ id, name, slug, product_count }]
  ```
- [ ] `/api/products.php` - GET products with filters
  ```php
  Params: category_id (optional), featured (optional), limit, offset
  Returns: [{ id, name, slug, price, stock_quantity, is_featured }]
  ```
- [ ] `/api/products/[id].php` - GET single product
  ```php
  Returns: { id, name, slug, description, price, stock_quantity, sku, category }
  ```
- [ ] Test all endpoints with Postman or curl

### Phase 1.4: Database Verification (Day 5)
- [ ] Run `shopntq.sql` import in phpMyAdmin
- [ ] Visit `/setup-accounts.php` to verify sample accounts
- [ ] Verify sample products and categories in database
- [ ] Test search using simple MySQL query

---

## 📋 BUILD CHECKLIST - WEEK 2: CORE FEATURES

### Phase 2.1: Search Functionality (Days 1-2)
- [ ] Create `/api/search.php` endpoint
  ```php
  Params: q (search query), limit (default: 10)
  Returns: [{ id, name, slug, price, sku }]
  Uses: MATCH AGAINST for full-text search on products table
  Response time: < 200ms
  ```
- [ ] Create `SearchBar.astro` component
  - Input field
  - AJAX request on keystroke (debounced)
  - Dropdown results
  - Click result → view product
- [ ] Add Alpine.js for interactivity
- [ ] Style with DaisyUI

### Phase 2.2: Hero Carousel (Days 2-3)
- [ ] Create `/api/featured-products.php` endpoint
  ```php
  Returns: Featured products (WHERE is_featured = 1)
  Limit: 5 products
  ```
- [ ] Create `HeroCarousel.astro` component
  - Install Embla Carousel
  - Auto-rotate every 4 seconds
  - Manual Previous/Next buttons
  - Dot indicators
  - Product info overlay (name, price, "Shop Now" button)
  - 100% viewport width, responsive height
- [ ] Add Alpine.js for carousel control
- [ ] Touch swipe support on mobile

### Phase 2.3: Categories Section (Days 3-4)
- [ ] Create `CategoryCard.astro` component
  - Icon placeholder (Tabler icon)
  - Category name
  - Product count
- [ ] Create `CategorySection.astro` component
  - Display 4-6 categories in grid
  - Click → filter featured products
  - Responsive: 6 cols (desktop), 4 (tablet), 2 (mobile)
- [ ] Add filtering logic with Alpine.js

### Phase 2.4: Featured Products Grid (Days 4-5)
- [ ] Create `ProductCard.astro` component
  - Placeholder image (use via Unsplash/via service or local placeholder)
  - Product name
  - Price
  - Stock status
  - "Add to Cart" button (onClick → add to localStorage)
  - "View Details" link
- [ ] Create `ProductGrid.astro` component
  - Display products in grid
  - Responsive: 4 cols (desktop), 2 (tablet), 1-2 (mobile)
  - Infinite scroll OR "Load More" button
- [ ] Add localStorage cart functionality

---

## 📋 BUILD CHECKLIST - WEEK 3: PAGES & POLISH

### Phase 3.1: Product Detail Page (Days 1-2)
- [ ] Create `/src/pages/products/[slug].astro`
  - Server-side render product data from API
  - Main product image (placeholder)
  - Gallery/thumbnails (if multiple images)
  - Product name, price, SKU
  - Description (formatted)
  - Specifications/details table
  - Stock status + quantity selector
  - "Add to Cart" button
  - Related products (same category)
  - Responsive layout

### Phase 3.2: Shopping Cart Page (Days 2-3)
- [ ] Create `/src/pages/cart.astro`
  - List items from localStorage
  - Show image, name, price, quantity
  - Update quantity (-, +, input)
  - Remove item button (X)
  - Subtotal calculation
  - Tax calculation (fixed % for Phase 1)
  - Total amount
  - Continue Shopping button
  - Proceed to Checkout button
  - Empty cart message (if no items)

### Phase 3.3: Checkout Page (Days 3-4)
- [ ] Create `/src/pages/checkout/index.astro`
  - Step 1: Shipping Address Form
    - First name, Last name, Email
    - Address, City, State/Province, ZIP, Country
    - Save to localStorage for review
  - Step 2: Order Summary
    - Review items and total
    - Option to edit (go back)
  - Step 3: Confirm
    - Final review before submission
- [ ] Create `/api/orders.php` POST endpoint
  - Accept order data
  - Create order in `orders` table
  - Create order items in `order_items` table
  - Return order confirmation
  - Send confirmation email (Phase 2)
- [ ] Create `/src/pages/checkout/confirm.astro`
  - Order success message
  - Order number, date, total
  - Shipping address display
  - Order items summary
  - "Continue Shopping" button
  - "View Account" button (Phase 2)

### Phase 3.4: Testing & Optimization (Days 4-5)
- [ ] Responsive testing
  - Desktop (1440px, 1024px)
  - Tablet (768px)
  - Mobile (480px, 320px)
  - Device rotation
  - Touch interactions
- [ ] Performance testing
  - Lighthouse audit (target: 90+/85+)
  - Page load time (target: < 2s)
  - Core Web Vitals check
  - Image optimization
  - JS bundle size check
- [ ] Functional testing
  - All links working
  - Search functionality
  - Cart add/remove
  - Checkout workflow
  - Responsive layout shift
- [ ] Cross-browser testing
  - Chrome, Firefox, Safari, Edge
  - Mobile browsers
- [ ] Accessibility check
  - WCAG AA compliance
  - Keyboard navigation
  - Screen reader testing

### Phase 3.5: Launch Preparation (Day 5)
- [ ] SEO basics
  - Meta tags on all pages
  - OG tags for sharing
  - Robots.txt + sitemap.xml
- [ ] Error pages (404, 500)
- [ ] Loading states
- [ ] Empty states
- [ ] Form validation
- [ ] Deployment checklist
  - Environment variables set
  - Database backed up
  - API endpoints tested
  - Images optimized

---

## 🔑 KEY IMPLEMENTATION DETAILS

### Hero Carousel (Embla + Alpine.js)
```astro
---
// src/components/HeroCarousel.astro
import EmblaCarousel from 'embla-carousel'
import autoplay from 'embla-carousel-autoplay'

const featuredProducts = await fetch(
  'http://localhost/api/featured-products.php'
).then(r => r.json())
---

<div class="relative w-full h-[400px] md:h-[500px] bg-gray-100" 
     x-data="heroCarousel()" 
     x-init="init()">
  <!-- Carousel content -->
  <div class="embla h-full">
    <div class="embla__container">
      {featuredProducts.map(product => (
        <div class="embla__slide">
          <!-- Product image, overlay, CTA -->
        </div>
      ))}
    </div>
  </div>
  
  <!-- Controls -->
  <button class="embla__prev">← Prev</button>
  <button class="embla__next">Next →</button>
  <div class="embla__dots"><!-- Dot indicators --></div>
</div>

<script define:vars={{ duration: 4000 }}>
function heroCarousel() {
  return {
    emblaApi: null,
    init() {
      this.emblaApi = EmblaCarousel(document.querySelector('.embla'), {
        loop: true
      })
      autoplay(this.emblaApi, { delay: duration })
    }
  }
}
</script>
```

### Search Implementation
```php
// api/search.php
<?php
header('Content-Type: application/json');

$q = $_GET['q'] ?? '';
$limit = (int)($_GET['limit'] ?? 10);

if (strlen($q) < 2) {
    echo json_encode([]);
    exit;
}

// ... database connection ...

$stmt = $pdo->prepare("
    SELECT id, name, slug, price, stock_quantity
    FROM products
    WHERE MATCH(name, description) AGAINST(? IN BOOLEAN MODE)
    LIMIT ?
");
$stmt->execute([$q . '*', $limit]);
$results = $stmt->fetchAll();

echo json_encode($results);
?>
```

### Cart Management (localStorage)
```javascript
// src/lib/cart.js
export const cart = {
  getItems() {
    return JSON.parse(localStorage.getItem('cart') || '[]');
  },
  
  addItem(product) {
    const items = this.getItems();
    const existing = items.find(i => i.id === product.id);
    
    if (existing) {
      existing.quantity += product.quantity || 1;
    } else {
      items.push({ ...product, quantity: 1 });
    }
    
    localStorage.setItem('cart', JSON.stringify(items));
  },
  
  removeItem(productId) {
    let items = this.getItems();
    items = items.filter(i => i.id !== productId);
    localStorage.setItem('cart', JSON.stringify(items));
  },
  
  getTotal() {
    return this.getItems().reduce((sum, item) => 
      sum + (item.price * item.quantity), 0
    );
  }
};
```

### Admin Featured Products Management
```php
// api/admin/featured.php
<?php
// Requires admin authentication (Phase 1: simple session check)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];
    $is_featured = (int)$_POST['is_featured']; // 0 or 1
    
    $stmt = $pdo->prepare("
        UPDATE products 
        SET is_featured = ? 
        WHERE id = ?
    ");
    $stmt->execute([$is_featured, $product_id]);
    
    echo json_encode(['success' => true]);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Return all products with featured status
    $stmt = $pdo->query("
        SELECT id, name, slug, is_featured, price 
        FROM products 
        ORDER BY name
    ");
    
    echo json_encode($stmt->fetchAll());
}
?>
```

---

## 🎨 DESIGN SPECIFICATIONS

### Typography
- **Font Family:** `-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`
- **Heading (H1):** 32px, bold, gray-900
- **Heading (H2):** 24px, semibold, gray-800
- **Body:** 16px, regular, gray-600
- **Small:** 14px, regular, gray-500

### Colors
- **Primary:** Gray (neutral)
- **Accent:** Your brand color (TBD)
- **Background:** White / Gray-50
- **Text:** Gray-900 (dark text on light)
- **Borders:** Gray-200
- **Success:** Green-500
- **Error:** Red-500

### Spacing
- Follow 8px grid system
- Sections: 2rem (32px) top/bottom padding
- Components: 1rem (16px) internal padding
- Whitespace between elements: 1rem

### Breakpoints (Tailwind)
- Mobile: < 640px (sm)
- Tablet: 640px - 1024px (md, lg)
- Desktop: > 1024px (xl, 2xl)

---

## 🚀 DEPLOYMENT CHECKLIST

- [ ] All `.env` variables configured
- [ ] Database backed up
- [ ] API endpoints working
- [ ] Images optimized (< 100KB each)
- [ ] CSS minified (Astro default)
- [ ] JS bundles < 50KB total
- [ ] Lighthouse score 90+
- [ ] Mobile responsive verified
- [ ] All forms working
- [ ] Error handling in place
- [ ] 404 page configured
- [ ] Analytics code added (optional)

---

## 📞 OPEN QUESTIONS BEFORE STARTING

1. **Logo:** Do you have a logo, or should we use placeholder?
2. **Brand Color:** What's your primary accent color?
3. **Product Images:** Where will you host placeholder images? (Unsplash API, local, etc.)
4. **Email Service:** For order confirmation emails (Phase 2)?
5. **Domain:** What's your domain for Phase 1? (localhost during dev, then?)

---

## 🎯 SUCCESS = Phase 1 Complete When:

✅ Homepage loads without scroll (desktop)
✅ Hero carousel rotates automatically
✅ Search works < 200ms
✅ Categories filter products
✅ Products show in grid (responsive)
✅ Add to cart works
✅ Cart page calculates totals
✅ Checkout creates order in database
✅ Lighthouse score 90+ / 85+
✅ Mobile responsive verified
✅ Zero critical bugs

---

**Ready to start Week 1?** 🚀  
Next action: Feedback → Begin project setup

