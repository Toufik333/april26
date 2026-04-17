# ShopHub Backend

Express.js API for ShopHub e-commerce platform.

## Setup

```bash
cd backend
npm install
cp .env.example .env
npm run dev
```

## API Endpoints

- `GET /api/health` - Health check
- `GET /api/products` - List products
- `GET /api/categories` - List categories
- `POST /api/orders` - Create order
- `GET /api/orders` - List orders (admin)

## Environment Variables

See `.env.example` for required variables.

## Database

MongoDB Atlas - Schema includes Products, Categories, Orders, Admins.
