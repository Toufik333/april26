package com.expensetracker.data.repository

import com.expensetracker.data.database.CategoryDao
import com.expensetracker.data.database.TransactionDao
import com.expensetracker.data.model.Category
import com.expensetracker.data.model.Transaction
import kotlinx.coroutines.flow.Flow
import javax.inject.Inject

class ExpenseRepository @Inject constructor(
    private val transactionDao: TransactionDao,
    private val categoryDao: CategoryDao
) {

    // Transaction operations
    suspend fun addTransaction(transaction: Transaction): Long {
        return transactionDao.insertTransaction(transaction)
    }

    suspend fun deleteTransaction(transaction: Transaction) {
        transactionDao.deleteTransaction(transaction)
    }

    fun getRecentTransactions(limit: Int = 7): Flow<List<Transaction>> {
        return transactionDao.getRecentTransactions(limit)
    }

    fun getAllTransactions(): Flow<List<Transaction>> {
        return transactionDao.getAllTransactions()
    }

    fun getBalance(): Flow<Double?> {
        return transactionDao.getBalance()
    }

    fun getTransactionCount(): Flow<Long> {
        return transactionDao.getTransactionCount()
    }

    // Category operations
    suspend fun addCategory(category: Category): Long {
        return categoryDao.insertCategory(category)
    }

    suspend fun deleteCategory(category: Category) {
        categoryDao.deleteCategory(category)
    }

    fun getAllCategories(): Flow<List<Category>> {
        return categoryDao.getAllCategories()
    }

    fun getDefaultCategories(): Flow<List<Category>> {
        return categoryDao.getDefaultCategories()
    }

    // Cleanup
    suspend fun deleteAllTransactions() {
        transactionDao.deleteAllTransactions()
    }

    suspend fun deleteAllCategories() {
        categoryDao.deleteAllCategories()
    }
}
