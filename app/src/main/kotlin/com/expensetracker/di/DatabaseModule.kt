package com.expensetracker.di

import android.content.Context
import com.expensetracker.data.database.AppDatabase
import com.expensetracker.data.database.CategoryDao
import com.expensetracker.data.database.TransactionDao
import com.expensetracker.data.repository.ExpenseRepository
import dagger.Module
import dagger.Provides
import dagger.hilt.InstallIn
import dagger.hilt.android.qualifiers.ApplicationContext
import dagger.hilt.components.SingletonComponent
import javax.inject.Singleton

@Module
@InstallIn(SingletonComponent::class)
object DatabaseModule {

    @Singleton
    @Provides
    fun provideAppDatabase(
        @ApplicationContext context: Context
    ): AppDatabase {
        return AppDatabase.getInstance(context)
    }

    @Singleton
    @Provides
    fun provideTransactionDao(database: AppDatabase): TransactionDao {
        return database.transactionDao()
    }

    @Singleton
    @Provides
    fun provideCategoryDao(database: AppDatabase): CategoryDao {
        return database.categoryDao()
    }

    @Singleton
    @Provides
    fun provideExpenseRepository(
        transactionDao: TransactionDao,
        categoryDao: CategoryDao
    ): ExpenseRepository {
        return ExpenseRepository(transactionDao, categoryDao)
    }
}
