package com.expensetracker.data.model

import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity(tableName = "transactions")
data class Transaction(
    @PrimaryKey(autoGenerate = true) val id: Long = 0,
    val amount: Double,
    val category: String,
    val notes: String? = null,
    val timestamp: Long,  // milliseconds since epoch
    val isIncome: Boolean  // true = income (+), false = expense (-)
)
