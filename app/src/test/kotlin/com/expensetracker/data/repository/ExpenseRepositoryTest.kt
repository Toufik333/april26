package com.expensetracker.data.repository

import com.expensetracker.data.database.CategoryDao
import com.expensetracker.data.database.TransactionDao
import com.expensetracker.data.model.Category
import com.expensetracker.data.model.Transaction
import io.mockk.MockKAnnotations
import io.mockk.coVerify
import io.mockk.impl.annotations.MockK
import io.mockk.mockk
import kotlinx.coroutines.flow.flowOf
import kotlinx.coroutines.flow.toList
import kotlinx.coroutines.test.runTest
import org.junit.Before
import org.junit.Test

class ExpenseRepositoryTest {

    @MockK
    private lateinit var transactionDao: TransactionDao

    @MockK
    private lateinit var categoryDao: CategoryDao

    private lateinit var repository: ExpenseRepository

    @Before
    fun setup() {
        MockKAnnotations.init(this)
        repository = ExpenseRepository(transactionDao, categoryDao)
    }

    @Test
    fun testAddTransaction() = runTest {
        val transaction = Transaction(
            amount = 100.0,
            category = "Food",
            notes = "Lunch",
            timestamp = System.currentTimeMillis(),
            isIncome = false
        )

        io.mockk.coEvery { transactionDao.insertTransaction(any()) } returns 1L

        repository.addTransaction(transaction)

        coVerify { transactionDao.insertTransaction(transaction) }
    }

    @Test
    fun testGetBalance() = runTest {
        io.mockk.every { transactionDao.getBalance() } returns flowOf(500.0)

        val result = repository.getBalance().toList()

        assert(result.contains(500.0))
    }

    @Test
    fun testAddCategory() = runTest {
        val category = Category(name = "Food", isDefault = true)

        io.mockk.coEvery { categoryDao.insertCategory(any()) } returns 1L

        repository.addCategory(category)

        coVerify { categoryDao.insertCategory(category) }
    }
}
