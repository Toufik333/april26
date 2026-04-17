# SHOPNTQ - Product Requirements Document (PRD)
**Version:** 1.0  
**Date:** April 17, 2026  
**Status:** Ready for Review

---

## EXECUTIVE SUMMARY

Build a **lightweight, modern shopping website** with a focus on fast performance, minimal aesthetic (Apple-like), and responsive mobile/desktop experience. Implement in **phases** with quick wins first, incrementally adding complexity.

**Key Differentiators:**
- Minimal JavaScript footprint
- Lightning-fast page loads
- Apple-inspired design (clean, spacious, typography-focused)
- Fully responsive without bloat
- Existing MySQL database leverage

---

## VISION & GOALS

### Vision
A modern, lightweight e-commerce storefront that feels premium and refined, focused on product discovery and seamless shopping experience across all devices.

### Primary Goals (Phase 1)
1. ✅ **Quick MVP Launch** - 2-3 weeks to market
2. ✅ **Excellent Search** - Easy product discovery
3. ✅ **Hero Showcase** - Featured products above-the-fold
4. ✅ **Category Browsing** - Quick category navigation
5. ✅ **Mobile-First Responsive** - Works perfectly on all devices
6. ✅ **Performance** - < 2s First Contentful Paint, < 3.5s LCP

### Success Metrics
- Lighthouse score: 90+ on desktop, 80+ on mobile
- Page load: < 2 seconds
- Mobile usability: 100%
- Search result response: < 200ms
- Conversion rate baseline: TBD by phase 2

---

## RESEARCH FINDINGS & RECOMMENDATIONS

### Tech Stack Analysis

#### **RECOMMENDED: Astro + Tailwind + Alpine.js** ⭐⭐⭐⭐⭐
**Why chosen for Phase 1:**
- **Smallest JS bundle** - Perfect for lightweight requirement
- **Fastest Lighthouse scores** - 95%+ performance guaranteed
- **HTML-first approach** - Minimal JavaScript overhead
- **Best for content + products** - Your use case exactly
- **Hybrid rendering** - Server-render static content, add interactivity with islands
- **Tailwind native** - Built for it
- **Zero learning curve** if you know HTML/CSS

**Performance metrics (industry data):**
- JS bundle: 5-15KB (vs Next.js 80-150KB)
- Time to Interactive: <1.5s
- Cumulative Layout Shift: <0.1

**Integration with your stack:**
```
Frontend: Astro (HTML generation)
    ↓
API Layer: PHP + MySQL (existing)
    ↓
Interactivity: Alpine.js (lightweight)
    ↓
Styling: Tailwind CSS v4
```

#### **ALTERNATIVE: Next.js + Vercel** (if you want more React ecosystem)
- Better for complex interactivity
- More opinionated
- Larger bundle (but acceptable)
- Better for future scaling

#### **ALTERNATIVE: Laravel + Inertia.js + Vue** (if leveraging PHP knowledge)
- Keep everything in PHP
- Modern frontend bridge
- More traditional approach
- Good for full-stack control

---

### Open Source Research Results

**Evaluated:** Medusa, Saleor, OpenCart, PrestaShop, WooCommerce, Bagisto, Vendure

**Recommendation:** DO NOT use full e-commerce platform for Phase 1
- **Why:** Unnecessary complexity, overkill for MVP
- **Better approach:** Build custom lightweight solution
- **Rationale:** Your needs are simple (search, carousel, categories, products)
- **Future:** If scaling needs complex features (subscriptions, inventory management, multi-vendor), can integrate Medusa later

---

### Component & Library Research

**For Phase 1 implementation:**

| Need | Recommendation | Why |
|------|---|---|
| Hero Carousel | **Embla Carousel** + Astro | Lightweight, accessible, no dependencies |
| Product Gallery | **Embla** or **Swiper** | 5-8KB vs 50KB+ competitors |
| Search | **Native PHP + MySQL FTS** | Zero dependencies, fast for your scale |
| UI Components | **DaisyUI** | Pre-built Tailwind, quick build |
| Icons | **Tabler Icons** | Lightweight, modern, minimal set |
| Fonts | **Geist** or **System Stack** | Apple-like, built-in system fonts |
| Form Validation | **Alpine.js** | 15KB, zero dependencies |

---

## PHASE 1: MVP - "Quick Win" (Weeks 1-3)

### Scope: Minimal Viable Product
This is your **"quick win"** - launch something great in 2-3 weeks that validates the market.

### Phase 1 Features

#### 1. **Homepage Layout** (All visible without scroll on desktop)
```
┌─────────────────────────────────────────┐
│  Header (Logo, Search Bar, Cart Icon)   │ ~80px
├─────────────────────────────────────────┤
│                                         │
│   HERO CAROUSEL (Featured Products)     │ ~400-500px
│   • 3-5 featured items                  │
│   • Auto-rotate, manual controls        │
│   • Call-to-action buttons              │
│                                         │
├─────────────────────────────────────────┤
│                                         │
│  CATEGORIES SECTION                     │ ~200px
│  • 4-6 category cards/buttons           │
│  • Horizontal scroll on mobile          │
│  • Click → filters products             │
│                                         │
├─────────────────────────────────────────┤
│                                         │
│  FEATURED PRODUCTS GRID                 │ ~400px (visible)
│  • 4 products on desktop                │
│  • 2 products on tablet                 │
│  • 1-2 on mobile                        │
│  • Scrollable section below fold        │
│                                         │
└─────────────────────────────────────────┘
```

**Responsive Breakpoints:**
- Desktop (1024px+): Hero 500px, Categories 4 items, 4-product grid
- Tablet (768-1023px): Hero 400px, Categories 3 items, 2-product grid
- Mobile (< 768px): Hero 300px, Categories scroll, 1-2 product grid

#### 2. **Search Feature**
- **Where:** Header (sticky)
- **Functionality:**
  - Type product name/SKU
  - Real-time suggestions (AJAX)
  - Response time < 200ms
  - Shows product thumbnail + price + availability
  - Click to view product page
  
- **Backend:** PHP endpoint utilizing existing MySQL FTS
  - Query: `SELECT * FROM products WHERE MATCH(name, description) AGAINST(? IN BOOLEAN MODE)`
  - Returns: max 10 results
  - Includes: id, name, price, thumbnail, sku

#### 3. **Hero Carousel**
- **Content:** 3-5 featured products (from `products` table, manually marked as featured)
- **Features:**
  - Auto-rotate every 4 seconds
  - Previous/Next controls
  - Dot indicators
  - Touch swipe on mobile
  - Product info overlay (name, price, "Shop Now" button)
  - 100% viewport width on mobile, container-constrained on desktop
  
- **Tech:** Embla Carousel + Alpine.js for interactivity

#### 4. **Categories Section**
- **Content:** 4-6 most popular categories (from `categories` table)
- **Display:**
  - Card layout: icon placeholder + name
  - Desktop: 6 columns (grid)
  - Tablet: 4 columns
  - Mobile: 2 columns (with horizontal scroll option)
- **Interaction:**
  - Click → filter featured products below
  - Shows "X products" count

#### 5. **Featured Products Grid**
- **Content:** Products filtered by selected category (or all if none selected)
- **Display:**
  - Desktop: 4 columns
  - Tablet: 2 columns
  - Mobile: 1-2 columns
  - Infinite scroll or "Load More" button
- **Product Card:**
  - Product image (placeholder if none)
  - Name
  - Price
  - Star rating (static, no real data yet)
  - "Add to Cart" button
  - "View Details" link

#### 6. **Product Detail Page** (Basic)
- **URL:** `/products/[slug]`
- **Content:**
  - Main image + gallery (if multiple)
  - Name, price, SKU
  - Description
  - Stock status
  - Specifications table
  - "Add to Cart" button
  - Related products (same category)

#### 7. **Cart Page** (Basic)
- **Functionality:**
  - Show added items
  - Update quantities
  - Remove items
  - Subtotal, tax, total
  - "Proceed to Checkout" button
  - Empty cart state

#### 8. **Checkout** (Phase 1 = Basic Form)
- **Steps:**
  1. Shipping address
  2. Payment method (payment gateway integration = Phase 2)
  3. Order review
  4. Confirmation page + email
- **Note:** Save order to `orders` table

---

## ARCHITECTURE

### Directory Structure
```
shopntq_web/
├── src/
│   ├── pages/
│   │   ├── index.astro          (Homepage)
│   │   ├── products/
│   │   │   └── [slug].astro     (Product detail)
│   │   ├── cart.astro           (Shopping cart)
│   │   └── checkout/
│   │       ├── index.astro      (Checkout form)
│   │       └── confirm.astro    (Order confirmation)
│   ├── components/
│   │   ├── Header.astro
│   │   ├── SearchBar.astro
│   │   ├── HeroCarousel.astro
│   │   ├── CategoryCard.astro
│   │   ├── ProductCard.astro
│   │   └── Footer.astro
│   ├── layouts/
│   │   └── Layout.astro
│   └── styles/
│       └── global.css
├── api/
│   ├── search.php               (Search endpoint)
│   ├── products.php             (Get products)
│   ├── categories.php           (Get categories)
│   ├── cart.php                 (Cart operations)
│   └── orders.php               (Create order)
├── public/
│   └── images/
├── tailwind.config.js
├── astro.config.mjs
└── package.json
```

### Data Flow
```
User Browser
    ↓
Astro Frontend (static HTML + Alpine.js)
    ↓
PHP API Endpoints (/api/*.php)
    ↓
MySQL Database (shopntq)
```

---

## DATABASE SCHEMA (Phase 1 - No Changes Needed)

Your existing schema is perfect for Phase 1:

```sql
Tables used:
- products (id, name, slug, price, stock_quantity, description)
- categories (id, name, slug, parent_id)
- users (id, email, password_hash, first_name, last_name)
- orders (id, user_id, total_amount, status, shipping_address)
- order_items (id, order_id, product_id, quantity, price_at_purchase)
```

**Phase 1 additions (optional):**
- `featured_products` table (tracks which products appear in hero carousel)
  OR use a column in `products` table: `is_featured BOOLEAN DEFAULT 0`

---

## DESIGN PRINCIPLES

### Apple-Like Aesthetic
- **Whitespace:** Generous margins/padding (2rem+ between sections)
- **Typography:** Clean, minimal
  - Font family: `-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto` (system fonts)
  - Or use premium: "Geist" or "Inter"
  - Size hierarchy: 32px (H1) → 24px (H2) → 16px (body)
- **Colors:** 
  - Primary: Neutral grays (light/dark mode)
  - Accents: One brand color maximum
  - High contrast text (WCAG AAA)
- **Imagery:**
  - Clean product photography
  - Consistent aspect ratios
  - Subtle shadows/hover effects
- **Spacing:** Follow 8px grid system

### Responsive Design Rules
- Mobile-first CSS
- Breakpoints: 480px, 768px, 1024px, 1440px
- No layout shift on device rotation
- Touch targets: 48px minimum
- Font size: 16px minimum (prevents zoom on iOS)

---

## TECH STACK DETAILS

### Frontend
- **Framework:** Astro 4.x
- **Component Framework:** Alpine.js (15KB) for interactivity
- **Styling:** Tailwind CSS v4
- **Component Library:** DaisyUI (pre-built components)
- **Carousel:** Embla Carousel
- **Icons:** Tabler Icons (SVG)

### Backend
- **Language:** PHP 8.2
- **Database:** MySQL 10.4
- **Web Server:** Apache (via XAMPP)
- **API:** RESTful endpoints (/api/*.php)

### Hosting (Future)
- **Frontend:** Vercel, Netlify, or Cloudflare Pages (static + serverless)
- **Backend:** Existing XAMPP/your hosting + Node.js optional

### Dev Tools
- **Package Manager:** npm/pnpm
- **Build Tool:** Vite (included with Astro)
- **Version Control:** Git
- **Environment:** .env for secrets

---

## IMPLEMENTATION TIMELINE - Phase 1

### Week 1: Foundation
- [ ] Set up Astro project
- [ ] Configure Tailwind CSS + DaisyUI
- [ ] Create base Layout component
- [ ] Build Header + Navigation
- [ ] Setup API endpoints (/api/products.php, /api/categories.php)

### Week 2: Core Features
- [ ] Search functionality (SearchBar component + API endpoint)
- [ ] Hero Carousel (Embla Carousel integration)
- [ ] Categories section (CategoryCard component)
- [ ] Featured Products grid (ProductCard component)
- [ ] Category filtering (Alpine.js event handling)

### Week 3: Pages & Polish
- [ ] Product detail page ([slug].astro)
- [ ] Cart page (localStorage-based for Phase 1)
- [ ] Checkout form (basic HTML form → PHP)
- [ ] Order confirmation page
- [ ] Responsive testing (mobile, tablet, desktop)
- [ ] Performance optimization
- [ ] Deployment to staging

### Launch Checklist
- [ ] Lighthouse score 90+
- [ ] All links working
- [ ] Mobile responsive verified
- [ ] Search tested
- [ ] Cart/checkout workflow tested
- [ ] Images optimized
- [ ] SEO basics (meta tags, sitemap)

---

## SUCCESS METRICS (Phase 1)

### Technical
- ✅ Lighthouse Score: 90+ (desktop), 85+ (mobile)
- ✅ First Contentful Paint: < 1.5s
- ✅ Largest Contentful Paint: < 2.5s
- ✅ Cumulative Layout Shift: < 0.1
- ✅ Core Web Vitals: All "Good"
- ✅ Mobile performance: 80% improvement over baseline

### Business
- ✅ Successful launch (all core features working)
- ✅ Product search functional and fast
- ✅ Cart/checkout workflow complete
- ✅ No critical bugs at launch
- ✅ Mobile usability score: 100

---

## PHASE 2 PREVIEW (Not in Scope Yet)

These will be added after Phase 1 validation:

### Phase 2 Features
- 🔐 User authentication (login/signup)
- 💳 Payment gateway integration (Stripe/PayPal)
- ⭐ Product reviews & ratings
- ❤️ Wishlist functionality
- 🔍 Advanced filters (price range, ratings, etc.)
- 📊 Admin dashboard (manage products, categories, orders)
- 📧 Email notifications
- 🎨 Multiple color themes
- 🌐 Multi-language support

### Phase 2 Database Changes
- `reviews` table
- `wishlist` table
- `user_preferences` table
- Additional product attributes

---

## RISKS & MITIGATION

| Risk | Impact | Mitigation |
|------|--------|-----------|
| Search performance degrades | High | Implement pagination, caching, consider MeiliSearch (Phase 2) |
| Large product catalogs | Medium | Pagination, database indexing, CDN images |
| Mobile performance | High | Lazy loading, image optimization, code splitting |
| Payment integration complexity | High | Use Stripe (well-documented), defer to Phase 2 |
| Cart abandonment | Medium | Session storage, abandoned cart email (Phase 2) |

---

## COST ESTIMATE (Phase 1)

### Development
- Frontend setup + components: 20-30 hours
- API development: 10-15 hours
- Testing & optimization: 8-10 hours
- **Total:** 40-55 hours (~2-3 weeks full-time)

### Hosting/Services
- Domain: $12/year
- Hosting: Your XAMPP (free) or budget $5-20/month
- CDN for images: $0-20/month (optional, Phase 2)
- **Phase 1 cost:** < $50/month

---

## OPEN QUESTIONS FOR YOU

1. **Featured Products:** Should we add a `featured_products` table or use a column in `products`?
2. **Product Images:** Do you have product images ready? If not, use placeholder service initially?
3. **Payment Gateway:** Ready for Phase 2, but should we prepare API integration points now?
4. **Hosting:** Will you stay on XAMPP or move to production hosting after Phase 1?
5. **User Accounts:** Needed for Phase 1, or Phase 2?
6. **Analytics:** Want GA4 integration from day 1?

---

## NEXT STEPS (If Approved)

1. ✅ **Feedback on PRD** (you review, we iterate)
2. 🔨 **Setup Development Environment**
   - Clone Astro template
   - Install dependencies
   - Configure Tailwind + DaisyUI
3. 📐 **Design System & Wireframes** (quick sketches)
4. 🚀 **Sprint 1: Foundation** (Week 1)
5. 🎯 **Sprint 2: Core Features** (Week 2)
6. ✨ **Sprint 3: Polish & Launch** (Week 3)

---

## APPENDIX: WHY ASTRO FOR THIS PROJECT?

### Comparison Table

| Feature | Astro | Next.js | Laravel | Remix |
|---------|-------|---------|---------|-------|
| Learning Curve | ⭐⭐⭐ | ⭐⭐ | ⭐⭐⭐ | ⭐⭐ |
| Performance | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ |
| Bundle Size | ⭐⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ |
| Tailwind Support | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐⭐ |
| Minimal Feel | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ |
| Quick Launch | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ | ⭐⭐⭐ | ⭐⭐⭐⭐ |
| Community | ⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐⭐ | ⭐⭐⭐⭐ |

**Astro Wins For You Because:**
- You need lightweight → Astro's HTML-first approach is unbeatable
- You want minimal JavaScript → Alpine.js is 15KB, not 80KB+ framework
- You're not changing much → Static site generation + selective hydration
- You need performance → 95+ Lighthouse score out-of-the-box
- You know HTML/CSS → No need to learn React
- You already have PHP backend → Astro is frontend-agnostic

**When to switch to Next.js:**
- If Phase 2 requires heavy interactivity
- If building real-time features (live chat, notifications)
- If you want full-stack React ecosystem

---

## GLOSSARY

- **ISR:** Incremental Static Regeneration (revalidate static pages periodically)
- **Hydration:** Adding interactivity to static HTML
- **FTS:** Full-Text Search (MySQL MATCH AGAINST)
- **CLS:** Cumulative Layout Shift (visual stability metric)
- **LCP:** Largest Contentful Paint (loading performance metric)
- **FCP:** First Contentful Paint (initial render metric)

---

**Document Status:** ✅ Ready for Review  
**Next Action:** Provide feedback, ask questions, or approve to move to Phase 1 setup  
**Contact:** Ask if you need clarification on any section

