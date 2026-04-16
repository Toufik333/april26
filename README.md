# Expense Tracker - Phase 1 MVP

A lightweight Android expense tracking app built with Kotlin, Jetpack Compose, and Room database.

## Project Structure

```
app/
├── src/
│   ├── main/
│   │   ├── kotlin/
│   │   │   ├── data/
│   │   │   │   ├── database/        # Room database setup & DAOs
│   │   │   │   ├── model/           # Data entities (Transaction, Category)
│   │   │   │   └── repository/      # Data access layer
│   │   │   ├── di/                  # Dependency injection (Hilt)
│   │   │   ├── ui/
│   │   │   │   ├── screens/         # Composable screens
│   │   │   │   ├── components/      # Reusable UI components
│   │   │   │   ├── theme/           # Material Design 3 theming
│   │   │   │   └── viewmodel/       # ViewModels for state management
│   │   │   ├── util/                # Utilities (formatting, constants)
│   │   │   ├── MainActivity.kt      # Entry point
│   │   │   └── ExpenseTrackerApplication.kt
│   │   └── res/
│   │       ├── values/              # Strings, colors, themes
│   │       └── AndroidManifest.xml
│   └── test/                        # Unit tests
├── build.gradle.kts                 # App-level gradle config
└── proguard-rules.pro               # Proguard/R8 rules
```

## Tech Stack

- **Language**: Kotlin
- **UI Framework**: Jetpack Compose + Material Design 3
- **Database**: Room (SQLite)
- **State Management**: ViewModel + StateFlow
- **Dependency Injection**: Dagger Hilt
- **Async**: Coroutines
- **Testing**: JUnit 4 + Mockk

## Phase 1 Features

✅ Balance display (top section)
✅ Add/remove transactions
✅ Default categories (8 options)
✅ View last 7 transactions
✅ Delete transactions
✅ Optional notes on transactions
✅ Local database storage

## Getting Started

### Prerequisites
- Android Studio Flamingo or newer
- Android 12 (SDK 31) minimum
- Java 17+

### Build

```bash
./gradlew assembleDebug
```

### Run Tests

```bash
./gradlew test
```

## Next Steps (Phase 2+)

- [ ] Edit existing transactions
- [ ] Add custom categories
- [ ] Full transaction history with pagination
- [ ] Search and filters
- [ ] Settings page
- [ ] Charts and analytics

## Architecture

This app follows **MVVM + Repository Pattern**:

```
UI (Compose) ← ViewModel ← Repository ← Room Database
```

**Data Flow**:
1. UI triggers action (e.g., add transaction)
2. ViewModel calls repository method
3. Repository executes database operation
4. Database emits updated Flow
5. UI reacts to new state

## Contributing

Phase 1 is under active development. Follow the existing patterns when adding features.

## License

MIT License
