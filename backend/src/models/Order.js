import mongoose from 'mongoose'

const orderSchema = new mongoose.Schema({
  orderNumber: {
    type: String,
    unique: true,
    required: true
  },
  customerEmail: {
    type: String,
    required: true,
    lowercase: true
  },
  customerName: {
    type: String,
    required: true
  },
  customerPhone: {
    type: String
  },
  shippingAddress: {
    street: String,
    city: String,
    state: String,
    zip: String,
    country: String
  },
  items: [
    {
      productId: mongoose.Schema.Types.ObjectId,
      productName: String,
      quantity: Number,
      price: Number,
      subtotal: Number
    }
  ],
  total: {
    type: Number,
    required: true
  },
  status: {
    type: String,
    enum: ['Pending Admin Approval', 'Approved', 'Processing', 'Shipped', 'Delivered', 'Cancelled'],
    default: 'Pending Admin Approval'
  },
  approvalStatus: {
    type: String,
    enum: ['Waiting', 'Approved', 'Rejected'],
    default: 'Waiting'
  },
  approvalNotes: {
    type: String
  },
  adminNotes: {
    type: String
  },
  notes: {
    type: String
  },
  createdAt: {
    type: Date,
    default: Date.now
  },
  updatedAt: {
    type: Date,
    default: Date.now
  }
})

export default mongoose.model('Order', orderSchema)
