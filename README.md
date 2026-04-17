# ShopHub - Modern Lightweight E-Commerce Platform

A fast, lightweight, Apple-inspired e-commerce platform built with MERN stack (MongoDB, Express, React, Node.js).

## 📁 Project Structure

```
april26/
├── frontend/          # React + Vite + Tailwind CSS
├── backend/           # Express.js + MongoDB
├── PRD.md             # Product Requirements Document
├── RESEARCH_SUMMARY.md # Tools & Platform Research
└── QUICK_REFERENCE.md # Review Checklist
```

## 🚀 Quick Start

### Frontend
```bash
cd frontend
npm install
npm run dev
```
Visit http://localhost:5173

### Backend
```bash
cd backend
npm install
cp .env.example .env
npm run dev
```
Server runs on http://localhost:5000

## 🎯 Phase 1 Features

- ✅ Hero carousel with featured items
- ✅ Product search with autocomplete
- ✅ Category filtering (4-6 categories)
- ✅ Featured products grid
- ✅ Shopping cart (localStorage)
- ✅ Guest checkout
- ✅ Stripe payment integration
- ✅ Admin dashboard (orders & products)
- ✅ Responsive design (mobile + desktop)

## 🛠️ Tech Stack

**Frontend**
- React 18 + Vite
- Tailwind CSS v4
- React Hook Form + Zod
- Embla Carousel
- Stripe.js

**Backend**
- Express.js
- MongoDB
- Stripe API
- JWT Authentication
- Nodemailer

## 📚 Documentation

- [PRD.md](./PRD.md) - Complete product specifications
- [RESEARCH_SUMMARY.md](./RESEARCH_SUMMARY.md) - Tool & platform research
- [QUICK_REFERENCE.md](./QUICK_REFERENCE.md) - Phase 1 checklist
- [frontend/README.md](./frontend/README.md) - Frontend setup
- [backend/README.md](./backend/README.md) - Backend setup

## 🔧 Environment Setup

### Prerequisites
- Node.js 18+
- MongoDB Atlas account (free tier)
- Stripe account (free tier)

### Environment Variables

**Frontend** (.env)
```
VITE_API_URL=http://localhost:5000
VITE_STRIPE_PUBLIC_KEY=pk_test_xxx
```

**Backend** (.env)
```
MONGODB_URI=mongodb+srv://user:pass@cluster.mongodb.net/shophub
STRIPE_SECRET_KEY=sk_test_xxx
JWT_SECRET=your_secret_key
```

## 🔄 Development Workflow

1. Create feature branches from `main`
2. Develop features (frontend + backend)
3. Test locally
4. Create pull request
5. Deploy to production

## 📊 Performance Targets

- Page load: < 2s
- Bundle size: ~90KB gzipped
- Mobile score: > 90
- Lighthouse: > 85

## 💰 Cost Estimate

| Service | Cost |
|---------|------|
| Frontend (Vercel) | $0 |
| Backend (Railway) | $5-10 |
| Database (MongoDB Atlas) | $0 |
| Stripe | 2.9% + 30¢ |
| **Total** | **~$10-20/month** |

## 🎨 Design Philosophy

- Minimal, clean, Apple-inspired
- System fonts (San Francisco, Segoe UI)
- Light mode default, dark mode support
- Smooth animations & transitions
- Mobile-first responsive design

## 🔐 Security

- JWT for admin authentication
- Password hashing (bcryptjs)
- CORS configured
- Stripe PCI compliance
- HTTPS required in production

## 📈 Roadmap

**Phase 1** (Current): MVP with core features  
**Phase 2**: User accounts, reviews, wishlist  
**Phase 3**: Advanced analytics, inventory, scaling

## 📞 Support

For issues or questions, check the documentation in the repo or review the PRD.

---

**Ready to launch Phase 1? 🚀**
