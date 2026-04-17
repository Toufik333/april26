# SHOPNTQ - WEEK 2 IMPLEMENTATION GUIDE

**Status:** Components Created ✅ Ready to Test  
**Week:** Week 2 (Core Features)  
**Goal:** Search, Carousel, Categories, Product Grid  

---

## 🎯 WEEK 2 OVERVIEW

All Week 2 components have been created and are ready to use. You now have:

✅ **Utility Files**
- `src/lib/api.js` - Centralized API calls
- `src/lib/cart.js` - Shopping cart management (localStorage)

✅ **Components Created**
- `src/components/SearchBar.astro` - Real-time search with dropdown
- `src/components/HeroCarousel.astro` - Featured products carousel (Embla)
- `src/components/CategoryCard.astro` - Individual category card
- `src/components/CategorySection.astro` - Categories grid with filtering
- `src/components/ProductCard.astro` - Individual product card
- `src/components/ProductGrid.astro` - Products grid with load more
- `src/components/Header.astro` - Updated with search & cart
- `src/components/Footer.astro` - Site footer
- Updated `src/pages/layouts/Layout.astro` - With Header/Footer
- Updated `src/pages/index.astro` - Using new components

---

## 📋 GETTING STARTED

### Step 1: Test the Dev Server

```bash
cd beneficial-belt
npm run dev
```

Visit: `http://localhost:3000`

**You should see:**
- ✅ Header with search bar and cart icon (0)
- ✅ Hero carousel auto-rotating with featured products
- ✅ Categories section (6 cards)
- ✅ Featured products grid (20 products)
- ✅ Footer

### Step 2: Test All Features

#### **Search (Top of page)**
- Type in search box (e.g., "wireless")
- See dropdown with matching products
- Click a result → goes to product page (will create in Week 3)

#### **Hero Carousel**
- Auto-rotates every 4 seconds
- Click prev/next buttons to manual control
- Click dot indicators to jump to slide
- Shows featured products (4 from database)

#### **Categories**
- Click a category card (e.g., "Electronics")
- Product grid should filter to show only that category's products
- Category card highlights in blue when active

#### **Products Grid**
- Shows 20 products by default
- Click "Add to Cart" button
- Button changes to "✓ Added to Cart" briefly
- Cart count in header increases

#### **Cart**
- Click cart icon in header
- Items are stored in localStorage
- Survives page refresh
- (Will create cart page in Week 3)

---

## 🔧 API VERIFICATION

Before continuing, verify all APIs are working:

### Test in Browser or Curl:

```bash
# Get categories
curl http://localhost/api/categories.php

# Get all products
curl http://localhost/api/products.php

# Get featured products
curl http://localhost/api/products.php?featured=1

# Get products by category
curl http://localhost/api/products.php?category_id=1

# Search products
curl "http://localhost/api/search.php?q=wireless"
```

All should return JSON arrays. If not, check:
1. XAMPP MySQL is running
2. `shopntq` database is imported
3. API files are in `beneficial-belt/public/api/`

---

## 📂 CURRENT PROJECT STRUCTURE

```
beneficial-belt/
├── src/
│   ├── pages/
│   │   ├── layouts/
│   │   │   └── Layout.astro       ✅ Updated
│   │   └── index.astro            ✅ Updated
│   ├── components/
│   │   ├── Header.astro           ✅ Updated (with search & cart)
│   │   ├── SearchBar.astro        ✅ NEW
│   │   ├── HeroCarousel.astro     ✅ NEW
│   │   ├── CategoryCard.astro     ✅ NEW
│   │   ├── CategorySection.astro  ✅ NEW
│   │   ├── ProductCard.astro      ✅ NEW
│   │   ├── ProductGrid.astro      ✅ NEW
│   │   └── Footer.astro           ✅ NEW
│   ├── lib/
│   │   ├── api.js                 ✅ NEW (6 functions)
│   │   └── cart.js                ✅ NEW (8 functions)
│   └── styles/
│       └── global.css
│
└── public/
    └── api/
        ├── categories.php         ✅ VERIFIED
        ├── products.php           ✅ VERIFIED
        └── search.php             ✅ VERIFIED
```

---

## 🧪 WHAT TO TEST

### Feature Checklist:

- [ ] **Homepage loads** without errors
- [ ] **Search bar** appears and works
- [ ] **Hero carousel** auto-rotates (4 sec intervals)
- [ ] **Carousel controls** (prev/next/dots) work
- [ ] **Categories** display in grid
- [ ] **Click category** filters products
- [ ] **Products display** in responsive grid
- [ ] **"Add to Cart"** works (button feedback)
- [ ] **Cart count** updates in header
- [ ] **Cart persists** after page refresh
- [ ] **No console errors**
- [ ] **Mobile responsive** (test at 480px, 768px, 1024px)
- [ ] **Footer** displays at bottom

### Browser Verification:

- [ ] Chrome/Edge (Windows)
- [ ] Firefox
- [ ] Safari (if available)
- [ ] Mobile Safari (if available)

---

## 🎯 COMPONENT BREAKDOWN

### SearchBar.astro
**What it does:**
- Real-time search with 300ms debounce
- Shows up to 8 matching products
- Click result → navigate to product page
- Shows "No products found" when appropriate

**Key Features:**
- AJAX requests to `/api/search.php`
- Alpine.js for interactivity
- Keyboard accessible
- Responsive dropdown

**Test:**
```
Type "wireless" → Should show matching products
Type "zzz" → Should show "No products found"
Click result → (Will create product page in Week 3)
```

---

### HeroCarousel.astro
**What it does:**
- Displays 4-5 featured products (from database)
- Auto-rotates every 4 seconds
- Manual navigation with prev/next buttons
- Dot indicators show current slide
- Shows product name, price, "Shop Now" CTA

**Key Features:**
- Embla Carousel library
- Auto-rotate with autoplay plugin
- Responsive height (400px mobile, 500px desktop)
- Product info overlay

**Test:**
```
Watch carousel auto-rotate
Click prev/next buttons
Click dot indicators
Hover over product → opacity change
Click "Shop Now" → (Will create product page in Week 3)
```

---

### CategorySection.astro
**What it does:**
- Displays all 6 categories from database
- Click category to filter products below
- Active category highlights in blue
- Shows product count per category

**Key Features:**
- Fetches categories from API
- Click handler with custom event
- Updates product grid when selected

**Test:**
```
Click "Electronics" → Grid shows only electronics
Click "Fashion" → Grid shows only fashion
Click another category → Grid updates
Grid shows correct number of products per category
```

---

### ProductGrid.astro
**What it does:**
- Displays products in responsive grid
- Can filter by category (from CategorySection)
- "Load More" button for pagination
- Shows product card with image, name, price, stock, CTA

**Key Features:**
- Responsive grid (1-2 mobile, 2 tablet, 4 desktop)
- Dynamic product loading
- "Add to Cart" with feedback
- Stock status indicator
- Out of stock disables button

**Test:**
```
Grid shows 20 products initially
Click "Load More" → Adds 20 more
Click category → Grid updates with filtered products
Stock out items show "Out of Stock"
Click "Add to Cart" → Feedback and cart count update
Hover product → Shadow effect
```

---

### Header.astro
**What it does:**
- Sticky header with logo, search, and cart
- Shows cart count badge
- Responsive on all devices

**Key Features:**
- Integrates SearchBar component
- Cart count updates in real-time
- Sticky positioning (stays at top on scroll)

**Test:**
```
Click cart icon → Goes to /cart (will create in Week 3)
Add product to cart → Count increases
Refresh page → Count persists
On mobile → Becomes responsive hamburger (Week 3)
```

---

### Footer.astro
**What it does:**
- Site footer with links and copyright
- 4-column layout on desktop, 1 on mobile

**Test:**
```
Appears at bottom of page
Responsive layout on different screen sizes
All links are clickable (though they go nowhere)
```

---

## 🐛 COMMON ISSUES & FIXES

### Issue: "Cannot find module 'api.js'"
**Fix:** Make sure imports use relative paths:
```javascript
import { getCategories } from '../lib/api.js'
```

### Issue: "Products not loading"
**Fix:** Check:
1. XAMPP MySQL is running
2. Database `shopntq` is imported
3. API endpoint returns JSON: `http://localhost/api/products.php`

### Issue: "Cart doesn't persist"
**Fix:** Check browser allows localStorage:
```javascript
// In console, test:
localStorage.setItem('test', 'value')
localStorage.getItem('test')
```

### Issue: "Search is slow"
**Fix:** MySQL full-text search needs indexed columns:
```sql
ALTER TABLE products ADD FULLTEXT INDEX ft_search (name, description);
```

### Issue: "Carousel doesn't auto-rotate"
**Fix:** Check Embla Carousel is installed:
```bash
npm list embla-carousel
```

If missing:
```bash
npm install embla-carousel embla-carousel-autoplay
```

---

## 📊 TESTING CHECKLIST

Print this out and check off as you test:

### Functionality
- [ ] Search dropdown appears with results
- [ ] Search results are accurate
- [ ] Carousel auto-rotates every 4 seconds
- [ ] Carousel manual controls work (prev/next/dots)
- [ ] Categories filter products correctly
- [ ] Product grid shows correct number of items
- [ ] "Load More" appends new products
- [ ] "Add to Cart" increases cart count
- [ ] Cart count persists on refresh
- [ ] All links are clickable

### Performance
- [ ] Page loads in < 2 seconds
- [ ] Search responds in < 200ms
- [ ] No console errors
- [ ] No network errors (404, 500)

### Responsive Design
- [ ] Mobile (320px, 480px) - single column
- [ ] Tablet (768px) - 2 columns
- [ ] Desktop (1024px+) - 4 columns
- [ ] Images scale properly
- [ ] Text is readable on all sizes
- [ ] Touch targets are 48px+ on mobile

### Cross-Browser
- [ ] Chrome/Edge
- [ ] Firefox
- [ ] Safari
- [ ] Mobile browsers

---

## ✅ WEEK 2 SUCCESS CRITERIA

**You know Week 2 is complete when:**

✅ All components render without errors  
✅ Search returns results in < 200ms  
✅ Carousel auto-rotates  
✅ Categories filtering works  
✅ Product grid is responsive  
✅ "Add to Cart" updates cart count  
✅ Cart persists after refresh  
✅ No console errors  
✅ Mobile responsive (tested at 3 sizes)  
✅ All API endpoints working  

---

## 🚀 NEXT: WEEK 3 PREVIEW

What you'll build in Week 3:

### Week 3 Components:
- **Product Detail Page** (`/products/[slug].astro`)
  - Full product info, gallery, related products
  
- **Shopping Cart Page** (`/cart.astro`)
  - Show cart items, update quantities, remove items
  - Calculate totals, tax, subtotal
  
- **Checkout Page** (`/checkout/index.astro`, `/checkout/confirm.astro`)
  - Shipping address form
  - Order review
  - Create order in database
  - Confirmation with order number

### Week 3 APIs to Create:
- `/api/orders.php` - Create orders
- `/api/product-detail.php` - Get single product with gallery
- Update login/session handling (basic Phase 1)

---

## 📞 COMMON QUESTIONS

### Q: Why is my search slow?
**A:** Database might not have fulltext index. Run this in phpMyAdmin:
```sql
ALTER TABLE products ADD FULLTEXT INDEX ft_search (name, description);
```

### Q: How do I add more featured products?
**A:** In `phpMyAdmin`, edit the `products` table and set `is_featured = 1` for any product.

### Q: Can I customize the carousel duration?
**A:** Yes! In `HeroCarousel.astro`, find:
```javascript
autoplay({ delay: 4000 })  // 4000ms = 4 seconds
```
Change to your desired value.

### Q: How do I clear the cart?
**A:** In browser console:
```javascript
localStorage.removeItem('shopntq_cart')
```

### Q: Where do placeholder images come from?
**A:** Currently using Unsplash API. To use your own:
```javascript
// In ProductCard.astro, replace:
const placeholderImage = 'your-image-url'
```

---

## 🎓 KEY CONCEPTS USED

**Alpine.js** - Lightweight JavaScript for interactivity
**Embla Carousel** - Carousel library (8KB gzipped)
**localStorage** - Browser storage for cart
**Fetch API** - API calls
**Tailwind CSS** - Styling
**Astro** - Static site generation

---

## 📝 NOTES FOR NEXT WEEK

- Placeholder images will be replaced in Phase 2
- Payment processing added in Phase 2
- User authentication expanded in Phase 2
- Admin panel for managing featured products in Phase 2

---

## ✨ YOU'RE READY!

All Week 2 components are built and ready to use. 

**Next action:**
1. Run `npm run dev` in `beneficial-belt/`
2. Test all features from the checklist above
3. Fix any issues
4. When all tests pass → Move to Week 3!

**Timeline:** Stay on track for Week 3 launch! 🚀

