# SHOPNTQ - Quick Start Guide (Phase 1)

**Goal:** Launch a lightweight, modern shopping site in 2-3 weeks  
**Status:** ✅ Ready to Build  

---

## 📋 PRE-LAUNCH CHECKLIST

Before you start building, complete these steps:

### 1. Database Setup ✅
```bash
# Step 1: Start XAMPP
# Step 2: Open phpMyAdmin (http://localhost/phpmyadmin)
# Step 3: Create new database: shopntq
# Step 4: Import shopntq.sql file
# Step 5: Verify sample data
```

### 2. Verify Sample Accounts
```bash
# Visit: http://localhost/setup-accounts.php
# You should see:
# ✅ user1@shop.local / user1 (customer)
# ✅ admin1@shop.local / admin1 (admin)
# ✅ 6 sample categories
# ✅ 10 sample products (4 marked as featured)
```

### 3. Test Database Connection
```bash
# Visit: http://localhost/db_test.php
# You should see: "🎉 Success! You are connected to the shopntq database!"
```

---

## 🚀 WEEK 1: FOUNDATION SETUP

### Step 1: Initialize Astro Project

```bash
# Navigate to your project directory
cd c:\xampp\htdocs\shopntq_web

# Create new Astro project (choose "minimal" template)
npm create astro@latest . -- --template minimal

# Install dependencies
npm install

# Install additional packages
npm install -D tailwindcss postcss autoprefixer daisyui
npm install embla-carousel embla-carousel-autoplay alpinejs

# Start dev server
npm run dev
```

Visit `http://localhost:3000` - you should see Astro welcome page

### Step 2: Configure Tailwind CSS

Create `tailwind.config.js`:
```javascript
export default {
  content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
  theme: {
    extend: {
      fontFamily: {
        sans: ['-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
      },
    },
  },
  plugins: [require('daisyui')],
  daisyui: {
    themes: ['light'],
  },
}
```

Create `postcss.config.js`:
```javascript
export default {
  plugins: {
    tailwindcss: {},
    autoprefixer: {},
  },
}
```

### Step 3: Create Base Layout

Create `src/layouts/Layout.astro`:
```astro
---
import '../styles/global.css'

interface Props {
  title: string
}

const { title } = Astro.props
---

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="SHOPNTQ - Modern Shopping" />
    <title>{title} | SHOPNTQ</title>
  </head>
  <body class="bg-white text-gray-900 font-sans">
    <header class="border-b border-gray-200">
      <!-- Header component here -->
    </header>
    
    <main>
      <slot />
    </main>
    
    <footer class="bg-gray-50 border-t border-gray-200 mt-16">
      <!-- Footer component here -->
    </footer>
  </body>
</html>

<script>
  import Alpine from 'alpinejs'
  window.Alpine = Alpine
  Alpine.start()
</script>
```

Create `src/styles/global.css`:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Custom global styles */
html {
  scroll-behavior: smooth;
}

body {
  @apply bg-white;
}

/* Headings */
h1 {
  @apply text-4xl font-bold text-gray-900;
}

h2 {
  @apply text-2xl font-semibold text-gray-800;
}

h3 {
  @apply text-xl font-semibold text-gray-700;
}

/* Utility classes */
.container-center {
  @apply max-w-7xl mx-auto px-4 sm:px-6 lg:px-8;
}

.section-spacing {
  @apply py-12 md:py-16;
}
```

### Step 4: Create Header Component

Create `src/components/Header.astro`:
```astro
---
// Header component with logo, search, cart
---

<header class="sticky top-0 z-50 bg-white border-b border-gray-200">
  <nav class="container-center py-4 flex items-center justify-between">
    <!-- Logo -->
    <div class="text-2xl font-bold text-gray-900">
      SHOPNTQ
    </div>
    
    <!-- Search Bar -->
    <div class="flex-1 mx-8 max-w-md">
      <input 
        type="text"
        placeholder="Search products..."
        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
      />
    </div>
    
    <!-- Cart Icon -->
    <div class="flex items-center gap-4">
      <button class="p-2 rounded-lg hover:bg-gray-100">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        <span class="ml-1">0</span>
      </button>
    </div>
  </nav>
</header>
```

### Step 5: Create Homepage

Create `src/pages/index.astro`:
```astro
---
import Layout from '../layouts/Layout.astro'
import Header from '../components/Header.astro'
---

<Layout title="Home">
  <Header />
  
  <main>
    <!-- Hero Carousel Section (placeholder) -->
    <section class="w-full h-96 md:h-[500px] bg-gradient-to-r from-blue-500 to-purple-500 flex items-center justify-center">
      <div class="text-center text-white">
        <h1 class="text-5xl font-bold mb-4">Featured Products</h1>
        <p class="text-xl">Hero carousel coming soon...</p>
      </div>
    </section>
    
    <!-- Categories Section (placeholder) -->
    <section class="container-center section-spacing">
      <h2 class="text-3xl font-bold mb-8">Shop by Category</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        {['Electronics', 'Fashion', 'Books', 'Home', 'Sports', 'Toys'].map(cat => (
          <div class="p-6 bg-gray-100 rounded-lg text-center cursor-pointer hover:bg-gray-200 transition">
            <p class="font-semibold">{cat}</p>
          </div>
        ))}
      </div>
    </section>
    
    <!-- Featured Products (placeholder) -->
    <section class="container-center section-spacing">
      <h2 class="text-3xl font-bold mb-8">Featured Products</h2>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {[1,2,3,4].map(i => (
          <div class="border border-gray-200 rounded-lg p-4 hover:shadow-lg transition">
            <div class="w-full h-48 bg-gray-100 rounded mb-4"></div>
            <h3 class="font-semibold mb-2">Product {i}</h3>
            <p class="text-gray-600 mb-4">$99.99</p>
            <button class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
              Add to Cart
            </button>
          </div>
        ))}
      </div>
    </section>
  </main>
</Layout>
```

### Step 6: Test Dev Server
```bash
# In terminal
npm run dev

# Visit http://localhost:3000
# You should see homepage with placeholder sections
```

---

## 📝 API ENDPOINTS (Create These)

Create these files in `public/api/` directory:

### `/api/categories.php`
```php
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = '127.0.0.1';
$db = 'shopntq';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$pdo = new PDO($dsn, $user, $pass);

$stmt = $pdo->query("
  SELECT id, name, slug, 
    (SELECT COUNT(*) FROM products WHERE category_id = categories.id) as product_count
  FROM categories
  ORDER BY name
");

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
```

### `/api/products.php`
```php
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = '127.0.0.1';
$db = 'shopntq';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$pdo = new PDO($dsn, $user, $pass);

$category_id = $_GET['category_id'] ?? null;
$featured = $_GET['featured'] ?? 0;
$limit = (int)($_GET['limit'] ?? 20);
$offset = (int)($_GET['offset'] ?? 0);

$query = "SELECT id, name, slug, price, stock_quantity, is_featured FROM products WHERE 1=1";
$params = [];

if ($category_id) {
    $query .= " AND category_id = ?";
    $params[] = $category_id;
}

if ($featured) {
    $query .= " AND is_featured = 1";
}

$query .= " LIMIT ? OFFSET ?";
$params[] = $limit;
$params[] = $offset;

$stmt = $pdo->prepare($query);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
```

### `/api/search.php`
```php
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$host = '127.0.0.1';
$db = 'shopntq';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$pdo = new PDO($dsn, $user, $pass);

$q = $_GET['q'] ?? '';
$limit = (int)($_GET['limit'] ?? 10);

if (strlen($q) < 2) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("
  SELECT id, name, slug, price, stock_quantity
  FROM products
  WHERE MATCH(name, description) AGAINST(? IN BOOLEAN MODE)
  LIMIT ?
");

$stmt->execute([$q . '*', $limit]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>
```

---

## ✅ VERIFICATION STEPS

After completing Week 1 setup, verify:

1. **Astro running:** Visit `http://localhost:3000`
2. **Database accessible:** Run `/setup-accounts.php`
3. **API endpoints working:**
   - `http://localhost/api/categories.php` → Returns categories
   - `http://localhost/api/products.php` → Returns products
   - `http://localhost/api/search.php?q=wireless` → Returns search results
4. **Tailwind working:** Elements should have styling
5. **Alpine.js ready:** Check console for errors

---

## 🎯 WEEK 1 SUCCESS LOOKS LIKE:

✅ Astro project initialized
✅ Tailwind CSS configured
✅ Homepage loads with placeholder sections
✅ Header component created
✅ All API endpoints returning JSON
✅ Dev server running without errors
✅ Sample database working

---

## 🚀 WHAT'S NEXT (Week 2)

1. Build SearchBar component with AJAX
2. Create HeroCarousel with Embla
3. Create CategorySection component
4. Create ProductGrid component
5. Add Alpine.js interactivity for filtering

---

## 📞 NEED HELP?

Check these files:
- `PRD.md` - Full project requirements
- `PHASE1_IMPLEMENTATION_GUIDE.md` - Detailed week-by-week checklist
- `PRD_SUMMARY.md` - Quick reference
- Astro docs: https://docs.astro.build

---

**Status:** Ready to build! 🚀  
**Timeline:** Week 1 foundation → Week 2 core features → Week 3 polish & launch

Let's go! 💪

