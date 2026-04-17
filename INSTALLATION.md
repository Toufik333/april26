# Installation & Setup Guide

Complete step-by-step setup for ShopHub development environment.

## 📋 Prerequisites

- **Node.js** 18+ ([Download](https://nodejs.org/))
- **npm** or **pnpm** (comes with Node.js)
- **Git** ([Download](https://git-scm.com/))
- **MongoDB Atlas Account** ([Free Signup](https://www.mongodb.com/cloud/atlas))
- **Stripe Account** ([Free Signup](https://stripe.com/))

## 🏗️ Project Initialization

### Step 1: Clone or Setup Repository

```bash
cd c:\Users\touf1000\Documents\GIThub\april26
git init
git add .
git commit -m "Initial project setup"
```

### Step 2: Frontend Setup

```bash
cd frontend

# Install dependencies
npm install

# Create environment file
copy .env.example .env

# Update .env with your values
# VITE_API_URL=http://localhost:5000
# VITE_STRIPE_PUBLIC_KEY=pk_test_xxx (from Stripe)
```

**Verify frontend is working:**
```bash
npm run dev
# Open http://localhost:5173
```

### Step 3: Backend Setup

```bash
cd ../backend

# Install dependencies
npm install

# Create environment file
copy .env.example .env

# Update .env with your credentials
```

## 🔑 Get API Keys & Credentials

### MongoDB Atlas Setup

1. Go to [mongodb.com/cloud/atlas](https://www.mongodb.com/cloud/atlas)
2. Sign up (free tier available)
3. Create a new cluster
4. Click "Connect" → "Drivers" → Select "Node.js"
5. Copy connection string
6. Add to `backend/.env`:
   ```
   MONGODB_URI=mongodb+srv://username:password@cluster.mongodb.net/shophub
   ```

### Stripe Setup

1. Go to [stripe.com](https://stripe.com/)
2. Sign up for a free account
3. Dashboard → Developers → API Keys
4. Copy "Publishable Key" and "Secret Key"
5. Add to files:
   ```
   # frontend/.env
   VITE_STRIPE_PUBLIC_KEY=pk_test_xxx
   
   # backend/.env
   STRIPE_SECRET_KEY=sk_test_xxx
   ```

### Email Setup (Nodemailer)

**Option A: Gmail**
1. Enable 2-step verification
2. Create "App Password" at [myaccount.google.com/apppasswords](https://myaccount.google.com/apppasswords)
3. Add to `backend/.env`:
   ```
   EMAIL_HOST=smtp.gmail.com
   EMAIL_PORT=587
   EMAIL_USER=your-email@gmail.com
   EMAIL_PASSWORD=xxxx xxxx xxxx xxxx
   ```

**Option B: SendGrid (Phase 2)**
- Get free tier API key at [sendgrid.com](https://sendgrid.com/)
- Use in Phase 2 when scaling

## ▶️ Running the Application

### Terminal 1: Backend

```bash
cd backend
npm run dev
```

Expected output:
```
✅ MongoDB Connected: cluster.mongodb.net
🚀 Server running on http://localhost:5000
📝 Environment: development
```

### Terminal 2: Frontend

```bash
cd frontend
npm run dev
```

Expected output:
```
  VITE v5.0.8  ready in 123 ms

  ➜  Local:   http://localhost:5173/
  ➜  press h to show help
```

## ✅ Verification Checklist

- [ ] Frontend accessible at http://localhost:5173
- [ ] Backend running on http://localhost:5000
- [ ] Backend `/api/health` returns `{ status: 'API is running' }`
- [ ] No console errors in browser
- [ ] No errors in backend terminal

**Test API connection:**
```bash
# In backend terminal, or use curl/Postman
curl http://localhost:5000/api/health
# Should return: {"status":"API is running"}
```

## 🌳 Git Workflow Setup

```bash
# Create feature branches for Phase 1 work
git branch -b feature/hero-carousel
git branch -b feature/search
git branch -b feature/cart
git branch -b feature/checkout
git branch -b feature/admin-dashboard
```

## 📁 File Structure After Setup

```
april26/
├── .git/                    # Git repository
├── .gitignore
├── README.md
├── INSTALLATION.md          # This file
├── PRD.md
├── RESEARCH_SUMMARY.md
├── QUICK_REFERENCE.md
│
├── frontend/
│   ├── node_modules/        # Created after npm install
│   ├── src/
│   │   ├── components/      # UI components
│   │   ├── pages/          # Page components
│   │   ├── hooks/
│   │   ├── context/
│   │   ├── utils/
│   │   ├── styles/
│   │   ├── App.jsx
│   │   └── main.jsx
│   ├── public/
│   ├── index.html
│   ├── package.json
│   ├── vite.config.js
│   ├── tailwind.config.js
│   ├── postcss.config.js
│   ├── .env.example
│   ├── .env              # Created (gitignored)
│   └── .gitignore
│
└── backend/
    ├── node_modules/        # Created after npm install
    ├── src/
    │   ├── models/          # MongoDB schemas
    │   ├── routes/          # API routes (coming)
    │   ├── controllers/     # Business logic (coming)
    │   ├── middleware/      # Auth, validation (coming)
    │   ├── config/
    │   │   └── db.js
    │   └── server.js
    ├── package.json
    ├── .env.example
    ├── .env              # Created (gitignored)
    ├── .gitignore
    └── README.md
```

## 🚀 Next Steps

After installation:

1. **Test the setup** - Browse to http://localhost:5173
2. **Review the PRD** - Understand Phase 1 features
3. **Start development** - See [QUICK_REFERENCE.md](./QUICK_REFERENCE.md)

## 🆘 Troubleshooting

### "Cannot find module 'express'"
```bash
cd backend
npm install
```

### "EADDRINUSE: port 5000 already in use"
Change port in `backend/src/server.js`:
```javascript
const PORT = process.env.PORT || 5001  // Change 5000 to 5001
```

### "MongoDB connection failed"
- Check `MONGODB_URI` in `.env`
- Ensure IP is whitelisted in MongoDB Atlas
- Check internet connection

### "Stripe key error"
- Verify `VITE_STRIPE_PUBLIC_KEY` starts with `pk_test_`
- Verify `STRIPE_SECRET_KEY` starts with `sk_test_`
- Check for typos

### "CORS errors"
- Ensure backend is running on port 5000
- Check `FRONTEND_URL` in backend `.env`
- Verify proxy in `frontend/vite.config.js`

## 📞 Quick Reference Commands

```bash
# Frontend
cd frontend
npm install              # Install dependencies
npm run dev              # Start dev server
npm run build           # Build for production
npm run preview         # Preview production build
npm run lint            # Check for errors
npm run format          # Format code

# Backend
cd backend
npm install              # Install dependencies
npm run dev              # Start dev server with nodemon
npm start               # Start production server
npm run lint            # Check for errors
npm run format          # Format code
```

## ✨ You're Ready!

Your ShopHub environment is now set up. Start building Phase 1! 🚀

For questions, refer to:
- [PRD.md](./PRD.md) - Full specifications
- [QUICK_REFERENCE.md](./QUICK_REFERENCE.md) - Phase 1 checklist
- Frontend [README.md](./frontend/README.md)
- Backend [README.md](./backend/README.md)
