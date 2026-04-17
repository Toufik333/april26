# ShopHub Frontend

Modern React + Vite + Tailwind CSS frontend for ShopHub e-commerce platform.

## 🎯 Features

- Hero carousel with featured items
- Product search with autocomplete
- Category filtering
- Shopping cart with localStorage persistence
- Guest checkout flow
- Admin dashboard
- Fully responsive (mobile, tablet, desktop)
- Dark mode support

## 🚀 Quick Start

```bash
# Install dependencies
npm install

# Create environment file
cp .env.example .env

# Start development server
npm run dev
```

Open http://localhost:5173 in your browser.

## 📦 Project Structure

```
src/
├── components/       # Reusable UI components
│   ├── Navbar.jsx
│   ├── HeroCarousel.jsx
│   ├── ProductCard.jsx
│   ├── SearchBar.jsx
│   └── ...
├── pages/           # Page components
│   ├── HomePage.jsx
│   ├── ProductPage.jsx
│   ├── CheckoutPage.jsx
│   ├── AdminDashboard.jsx
│   └── ...
├── hooks/           # Custom React hooks
│   └── useCart.js
│   └── useAuth.js
├── context/         # React Context API
│   ├── CartContext.jsx
│   └── AuthContext.jsx
├── utils/           # Helper functions
│   ├── api.js       # API calls
│   └── helpers.js
├── styles/          # Global styles
│   └── index.css
├── App.jsx
└── main.jsx
```

## 🔧 Environment Variables

```
VITE_API_URL=http://localhost:5000
VITE_STRIPE_PUBLIC_KEY=pk_test_your_key_here
```

## 🏗️ Build & Deploy

```bash
# Build for production
npm run build

# Preview production build
npm run preview

# Lint
npm run lint

# Format code
npm run format
```

## 📚 Dependencies

- **React 18** - UI framework
- **Vite** - Build tool
- **Tailwind CSS** - Styling
- **React Hook Form** - Form management
- **Zod** - Schema validation
- **Embla Carousel** - Carousel component
- **Lucide React** - Icons
- **Stripe.js** - Payment processing

## 🎨 Design System

### Typography
- Font: System fonts (Apple-like)
- H1: 32px bold
- H2: 24px bold
- H3: 18px semi-bold
- Body: 16px regular

### Colors
- Primary: #0066CC (blue)
- Success: #059669 (green)
- Error: #DC2626 (red)
- Neutral: #F5F5F5 (light), #000 (dark)

### Spacing
- Base: 8px grid
- Sections: 48-64px margins
- Components: 16-24px padding

## 🧪 Testing

```bash
# Run tests
npm run test

# Watch mode
npm run test:watch
```

## 🚢 Deployment

### Vercel (Recommended)

```bash
npm install -g vercel
vercel
```

1. Connect GitHub account
2. Select `frontend` folder
3. Set environment variables
4. Deploy

## 📊 Performance

- Bundle size: ~90KB gzipped
- LCP: < 2.5s
- FID: < 100ms
- CLS: < 0.1

## 🤝 Contributing

1. Create feature branch: `git checkout -b feature/your-feature`
2. Commit changes: `git commit -m "Add your feature"`
3. Push branch: `git push origin feature/your-feature`
4. Create Pull Request

## 📝 Notes

- Cart state persists using localStorage
- Admin features require authentication
- Stripe runs in test mode during development

## 🆘 Troubleshooting

**API not connecting?**
- Ensure backend is running on http://localhost:5000
- Check `VITE_API_URL` in `.env`

**Styling not loading?**
- Run `npm install` again
- Clear node_modules and reinstall

**Build errors?**
- Check Node version: `node --version` (18+ required)
- Clear cache: `rm -rf node_modules package-lock.json && npm install`

---

**Need help? Check the main [README.md](../README.md)**
