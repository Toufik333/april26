# Product Requirements Document: Monthly Expense Tracker App

**Version:** 1.0
**Date:** April 16, 2026
**Status:** Ready for Review

---

## Executive Summary

A lightweight, privacy-first Android expense tracking app that helps users monitor their monthly spending. The app provides real-time balance visibility, transaction management with categories, and a clean transaction history view. Unlike competitors (Firefly III, Mint), this app prioritizes simplicity and fast initial delivery over complex features.

**Target User:** Individual users wanting quick expense tracking without data synchronization complexity.

---

## Market Analysis & Competitive Landscape

### Existing Solutions Research
We reviewed 15+ open-source projects and found:

| Solution | Complexity | Learning Curve | Best For |
|----------|-----------|---------------|---------|
| **Firefly III** | High | Steep | Accounting professionals, multi-account |
| **Expenso** | Low | Low | Personal use, UI-heavy |
| **Ledger CLI** | High | Very Steep | Unix power users |
| **GnuCash** | High | Steep | Detailed bookkeeping |
| **Our App (Phase 1)** | **Very Low** | **None** | Fast expense tracking, everyday users |

### Key Advantages of Our Approach
- ✅ **Simplicity First**: No accounting jargon, no cloud sync complexity
- ✅ **Offline-First**: Data stays on device (privacy + speed)
- ✅ **Speed to Market**: Phase 1 launches in 2-3 weeks
- ✅ **Learn & Iterate**: Gather real user feedback before building complexity

---

## Product Description

### Core Vision
A clean, intuitive app where users can:
1. See their current balance at a glance (positive or negative)
2. Add or remove money with category and optional notes
3. Browse recent transactions in a simple timeline
4. Manage categories (default + custom)

### Out of Scope (Phase 1)
- Cloud synchronization
- Multi-device sync
- Recurring transactions
- CSV import/export
- Budgeting/forecasting
- Charts and analytics
- Multi-currency support
- Receipt attachments

---

## Detailed Feature Specifications

### 1. **Balance Display (Top Section)**
- **Current Balance**: Large, prominent display
- **Visual Indicators**:
  - Green text for positive balance
  - Red text for negative balance
- **No decimals required** (keep simple: $1,250 not $1,250.99)
- Tappable to refresh (pulls latest from local DB)

### 2. **Add/Remove Transaction**
- **Single Action Button** (floating action button / bottom sheet)
- **Transaction Form**:
  - Amount field (numeric input)
  - Category dropdown (preset + custom options)
  - Optional notes/comment field (max 200 chars)
  - Timestamp (auto-current, editable)
  - +/- toggle to indicate income or expense
- **Validation**: Amount required, category required
- **Success Feedback**: Toast notification, balance updates instantly

### 3. **Category System**
- **Default Categories** (8-10 options):
  - Food & Dining
  - Transport
  - Utilities
  - Entertainment
  - Shopping
  - Health & Fitness
  - Other
- **Add Custom Category**:
  - Modal dialog / bottom sheet
  - Category name (required, max 30 chars)
  - Optional color picker (optional for Phase 1)
  - Saved to app database
- **View All Categories**: Settings page showing all categories (edit/delete in Phase 2)

### 4. **Transaction History**
- **Display Format**: Chronological list (newest first)
- **Show Last 7 Transactions** on main page:
  - Category icon/label
  - Transaction amount (+$50 or -$30)
  - Category name
  - Notes (1-line truncated if present)
  - Date/time
- **Tap to Expand**: Show full details + edit/delete buttons
- **"View All" Button**: Navigate to dedicated history page

### 5. **Full Transaction History Page**
- **Pagination/Scrolling**:
  - Lazy load next 7 transactions as user scrolls
  - "Load More" button OR infinite scroll
  - Total count displayed ("Showing 7 of 145 transactions")
- **Filters** (Phase 1 basic):
  - By category dropdown
  - Date range picker (optional for Phase 1)
- **Search**: Search by notes/comment text (optional for Phase 1)
- **Edit/Delete Actions**:
  - Swipe left to delete OR long-press menu
  - Tap to edit (opens transaction form pre-filled)

### 6. **Settings Page**
- Manage categories (view, delete, rename in Phase 2)
- App version
- Clear all data (with confirmation)
- About page

---

## Phased Rollout Plan

### **PHASE 1: MVP (Quick Win) - 2-3 Weeks**
**Goal**: Functional app users can use daily with core features

#### Features Included:
- ✅ Balance display (top section)
- ✅ Add transaction (amount, category, notes, +/-)
- ✅ View last 7 transactions on home page
- ✅ Tap to view full transaction details
- ✅ Delete transaction (long-press or swipe)
- ✅ Simple category list with 8 defaults
- ✅ Basic local database (Room)

#### Features NOT Included:
- ❌ Edit existing transactions
- ❌ Add custom categories
- ❌ Full transaction history page with pagination
- ❌ Search/filters
- ❌ Settings page
- ❌ Data export

#### Definition of Done:
- App builds and runs without crashes
- Can add 10+ transactions without issues
- Balance updates correctly (adds/subtracts properly)
- Categories display correctly
- At least 3 default categories working
- App tested on Android 12+ emulator/device

---

### **PHASE 2: Core Features (4-6 Weeks)**
- Full transaction history page with lazy loading
- Add custom categories
- Edit existing transactions
- Search by notes
- Date range filters
- Settings page with category management
- App icon & branding

---

### **PHASE 3: Polish & Sharing (6-8 Weeks)**
- Charts/graphs (monthly spending by category)
- Recurring transactions
- CSV export for data portability
- Backup/restore functionality
- Dark mode
- Notification reminders
- Multi-language support

---

### **PHASE 4: Advanced (Future)**
- Cloud sync (optional)
- Budget alerts
- Receipt photo attachments
- Bank API integration (Plaid)
- AI categorization (MCP integration for Claude)

---

## Technical Architecture

### Recommended Tech Stack (Phase 1)

```
Language:        Kotlin (Android standard 2025)
UI Framework:    Jetpack Compose + Material Design 3
Architecture:    MVVM + Repository Pattern
State Mgmt:      ViewModel + StateFlow
Database:        Room (SQLite abstraction)
Preferences:     DataStore
Async:           Kotlin Coroutines
DI:              Dagger Hilt
Testing:         JUnit 4 + Mockk
```

### Database Schema (Phase 1)

```kotlin
// Transaction Table
@Entity(tableName = "transactions")
data class Transaction(
    @PrimaryKey(autoGenerate = true) val id: Long = 0,
    val amount: Double,
    val category: String,
    val notes: String? = null,
    val timestamp: Long,  // milliseconds
    val isIncome: Boolean  // true = +, false = -
)

// Category Table
@Entity(tableName = "categories")
data class Category(
    @PrimaryKey(autoGenerate = true) val id: Long = 0,
    val name: String,
    val isDefault: Boolean = false
)
```

### App Structure
```
android-expense-tracker/
├── app/
│   ├── src/
│   │   ├── main/
│   │   │   ├── kotlin/
│   │   │   │   ├── data/
│   │   │   │   │   ├── database/
│   │   │   │   │   │   ├── TransactionDao.kt
│   │   │   │   │   │   ├── CategoryDao.kt
│   │   │   │   │   │   └── AppDatabase.kt
│   │   │   │   │   ├── repository/
│   │   │   │   │   │   └── ExpenseRepository.kt
│   │   │   │   │   └── model/
│   │   │   │   │       ├── Transaction.kt
│   │   │   │   │       └── Category.kt
│   │   │   │   │
│   │   │   │   ├── ui/
│   │   │   │   │   ├── screens/
│   │   │   │   │   │   ├── HomeScreen.kt
│   │   │   │   │   │   ├── HistoryScreen.kt
│   │   │   │   │   │   └── TransactionDetailScreen.kt
│   │   │   │   │   ├── components/
│   │   │   │   │   │   ├── BalanceDisplay.kt
│   │   │   │   │   │   ├── TransactionItem.kt
│   │   │   │   │   │   └── CategoryDropdown.kt
│   │   │   │   │   └── viewmodel/
│   │   │   │   │       ├── HomeViewModel.kt
│   │   │   │   │       └── HistoryViewModel.kt
│   │   │   │   │
│   │   │   │   └── MainActivity.kt
│   │   │   │
│   │   │   └── res/
│   │   │       ├── drawable/
│   │   │       └── values/
│   │   │           ├── colors.xml
│   │   │           ├── strings.xml
│   │   │           └── themes.xml
│   │   │
│   │   └── test/
│   │       └── TransactionRepositoryTest.kt
│   │
│   └── build.gradle.kts
│
└── README.md
```

### Key Dependencies (Phase 1)

```gradle
// Jetpack
androidx.compose.ui:ui:1.7.0
androidx.compose.material3:material3:latest
androidx.room:room-runtime:2.6.0
androidx.datastore:datastore-preferences:1.1.0
androidx.lifecycle:lifecycle-viewmodel-compose:latest

// Dependency Injection
com.google.dagger:hilt-android:latest
com.google.dagger:hilt-compiler:latest

// Kotlin
org.jetbrains.kotlinx:kotlinx-coroutines-android:latest

// Testing
junit:junit:4.13.2
io.mockk:mockk:latest
```

---

## Data Flow (Phase 1)

```
HomeScreen
  ├── observes: HomeViewModel.balanceFlow
  ├── observes: HomeViewModel.recentTransactionsFlow
  ├── actions: onAddTransaction()
  └── actions: onDeleteTransaction(id)
       ↓
HomeViewModel
  ├── exposesFlow: balanceFlow
  ├── exposesFlow: recentTransactionsFlow (last 7)
  └── calls: expenseRepository
       ↓
ExpenseRepository
  ├── reads: Room Database
  ├── calculates: Sum of all transactions
  └── returns: Flow<List<Transaction>>
       ↓
LocalDataSource (Room Database)
  └── stores: transactions, categories
```

---

## Success Metrics (Phase 1)

- **Stability**: Zero crashes during 50 add/delete transactions
- **Performance**: App loads home screen in < 2 seconds
- **Data Integrity**: Balance calculation always correct
- **Usability**: New user can add first transaction in < 1 minute
- **Code Quality**: Test coverage > 60% for repository layer

---

## Known Constraints

- **Phase 1 is intentionally minimal** - We're not building Firefly III
- **No cloud sync** - Keeps app simple and fast to build
- **No complex features** - Save for Phase 2+ based on user feedback
- **Single-user** - No multi-user support planned
- **Android only** - iOS scoped for Phase 3+

---

## Next Steps if Approved

1. **Week 1**: Setup Android project, database schema, basic UI
2. **Week 2**: Implement core features (add, view, delete)
3. **Week 3**: Testing, bug fixes, prepare for release
4. **Week 4**: Beta testing with select users, gather feedback for Phase 2

---

## Questions for Your Review

1. Does Phase 1 scope meet your "quick win" expectation?
2. Is the tech stack (Kotlin/Compose/Room) acceptable?
3. Should we prioritize edit transactions for Phase 1?
4. Any other default categories you'd like to see?
5. Any features from Phase 2 that should move to Phase 1?

---

**Document Status**: ✅ Ready for approval to begin Phase 1 development
