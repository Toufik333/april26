# SHOPNTQ - PRD EXECUTIVE SUMMARY

## 🎯 Project Vision
Build a **lightweight, modern shopping site** with minimal JavaScript, Apple-like design, and phased complexity growth.

---

## 📊 RECOMMENDED TECH STACK

```
┌─────────────────────────────────────┐
│  Frontend: Astro + Tailwind CSS     │  (5-15KB JS)
│  UI Library: DaisyUI + Alpine.js    │  (15KB interactivity)
│  Carousel: Embla Carousel           │  (8KB, accessible)
│  Styling: Tailwind CSS v4           │  (latest, zero-config)
└─────────────────────────────────────┘
               ↓
┌─────────────────────────────────────┐
│  Backend: PHP 8.2 + MySQL           │  (Existing stack)
│  API: RESTful endpoints (/api/)     │  (search, products, etc.)
│  Database: shopntq (your schema)    │  (No changes needed!)
└─────────────────────────────────────┘
```

---

## 🚀 PHASE 1: MVP (Weeks 1-3) - Quick Win

### Homepage Layout (All visible without scroll on desktop)
```
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
   HEADER (Search, Cart Icon)        ~80px
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                   
   HERO CAROUSEL (Featured Items)   ~400px
   [Image] [Dots] [Prev] [Next]
   
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                   
   CATEGORIES (4-6 Cards)           ~200px
   [Electronics] [Fashion] [Books]...
   
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
                                   
   FEATURED PRODUCTS (Scrollable)    ~400px
   [Product] [Product] [Product] [Product]
   
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
```

### Core Features
✅ **Search** - Type to find products (< 200ms response)
✅ **Hero Carousel** - Auto-rotate featured items with controls
✅ **Categories** - Browse by category, filter products
✅ **Product Grid** - Responsive (4 cols desktop, 2 tablet, 1-2 mobile)
✅ **Product Detail** - View full product info
✅ **Shopping Cart** - Add/remove items (localStorage Phase 1)
✅ **Checkout** - Collect shipping info, create order
✅ **Responsive** - Works perfectly on all devices

---

## 📱 Responsive Design

| Device | Hero | Categories | Products |
|--------|------|-----------|----------|
| Desktop (1024+) | 500px | 6 cols | 4 cols |
| Tablet (768-1023) | 400px | 3 cols | 2 cols |
| Mobile (< 768px) | 300px | Scroll | 1-2 cols |

---

## 🎨 Design Philosophy
- **Minimal:** Only necessary elements, generous whitespace
- **Apple-like:** Clean typography, system fonts, subtle shadows
- **Lightweight:** 5-15KB JS, fast performance, minimal dependencies
- **Modern:** Latest Tailwind, accessibility-first, mobile-optimized

---

## 📈 Performance Targets

| Metric | Target |
|--------|--------|
| Lighthouse Score | 90+ (desktop), 85+ (mobile) |
| First Contentful Paint | < 1.5s |
| Largest Contentful Paint | < 2.5s |
| Time to Interactive | < 2s |
| JS Bundle Size | < 20KB |

---

## 📋 Implementation Timeline

**Week 1:** Foundation & Setup
- Astro project + Tailwind setup
- Header, Navigation, Footer components
- PHP API endpoints (products, categories, search)

**Week 2:** Core Features
- Search functionality
- Hero carousel (Embla)
- Categories section
- Featured products grid
- Filtering/interaction (Alpine.js)

**Week 3:** Pages & Polish
- Product detail page
- Shopping cart page
- Checkout form
- Order confirmation
- Testing, optimization, deployment

---

## 🗄️ Database (NO CHANGES NEEDED!)

Your existing schema is perfect:
```
✅ products       - All product data
✅ categories     - Categories for filtering
✅ users          - Customer accounts
✅ orders         - Order history
✅ order_items    - Order line items
```

**Optional Phase 1 addition:**
- Add `featured_products` table OR `is_featured` column to `products`

---

## 💡 Key Decisions

### Why Astro?
- **Smallest JS bundle:** 5-15KB vs 80KB+ (Next.js, etc.)
- **Best performance:** 95+ Lighthouse scores
- **HTML-first:** Minimal JavaScript overhead
- **Quick learning:** If you know HTML/CSS, you're good
- **Works with PHP backend:** Completely decoupled

### Why NOT full e-commerce platforms?
- Medusa, Saleor, WooCommerce = overkill for Phase 1
- Your simple needs = custom lightweight solution faster
- Less bloat, better performance
- Add complexity in Phase 2 if needed

---

## 🔄 Phase 2+ (Future)

Will add after Phase 1 validation:
- 🔐 User authentication (signup/login)
- 💳 Payment gateway (Stripe/PayPal)
- ⭐ Reviews & ratings
- ❤️ Wishlist
- 🔍 Advanced filters
- 👨‍💼 Admin dashboard
- 📊 Analytics

---

## 🎯 Success Metrics

### Technical
- ✅ Lighthouse 90+ / 85+
- ✅ < 2 second load time
- ✅ Mobile responsive 100%
- ✅ All Core Web Vitals "Good"

### Business
- ✅ MVP launched in 3 weeks
- ✅ Search working & fast
- ✅ Cart/checkout functional
- ✅ Zero critical bugs at launch

---

## ❓ Questions For You

1. **Featured Products?** → New table or column in products?
2. **Product Images?** → Ready, or use placeholders?
3. **User Accounts?** → Phase 1 or 2?
4. **Hosting?** → Stay on XAMPP or move to cloud?
5. **Analytics?** → Google Analytics from day 1?

---

## 🚀 Next Steps (If You Approve)

1. ✅ **Review this PRD** - Give feedback
2. 🔨 **Setup dev environment** - Clone Astro, install packages
3. 📐 **Design system** - Quick wireframes/component list
4. 🏃 **Start Phase 1** - Week 1: Foundation
5. 🎯 **Launch MVP** - Week 3: Go live!

---

**Status:** 📖 Ready for Your Review  
**Timeline:** 2-3 weeks to MVP  
**Team:** 1-2 developers (depending on your involvement)  
**Cost:** < $50/month hosting  

**Ready to move forward?** 👉 Approve PRD → Start Phase 1 setup

