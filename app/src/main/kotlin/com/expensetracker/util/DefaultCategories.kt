package com.expensetracker.util

import com.expensetracker.data.model.Category

object DefaultCategories {
    fun getDefaults(): List<Category> = listOf(
        Category(name = "Food & Dining", isDefault = true),
        Category(name = "Transport", isDefault = true),
        Category(name = "Utilities", isDefault = true),
        Category(name = "Entertainment", isDefault = true),
        Category(name = "Shopping", isDefault = true),
        Category(name = "Health & Fitness", isDefault = true),
        Category(name = "Salary", isDefault = true),
        Category(name = "Other", isDefault = true)
    )
}
