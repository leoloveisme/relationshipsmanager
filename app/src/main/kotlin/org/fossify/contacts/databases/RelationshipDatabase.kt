package org.fossify.contacts.databases

import android.content.Context
import androidx.room.Database
import androidx.room.Room
import androidx.room.RoomDatabase
import org.fossify.contacts.models.ContactInteraction
import org.fossify.contacts.models.ContactUrgencySettings
import org.fossify.contacts.models.GroupUrgencySettings
import org.fossify.contacts.models.SyncSettings

@Database(
    entities = [
        ContactUrgencySettings::class,
        GroupUrgencySettings::class,
        ContactInteraction::class,
        SyncSettings::class
    ],
    version = 1,
    exportSchema = true
)
abstract class RelationshipDatabase : RoomDatabase() {
    abstract fun contactUrgencySettingsDao(): ContactUrgencySettingsDao
    abstract fun groupUrgencySettingsDao(): GroupUrgencySettingsDao
    abstract fun contactInteractionDao(): ContactInteractionDao
    abstract fun syncSettingsDao(): SyncSettingsDao

    companion object {
        private const val DB_NAME = "relationship_manager.db"

        @Volatile
        private var INSTANCE: RelationshipDatabase? = null

        fun getInstance(context: Context): RelationshipDatabase {
            return INSTANCE ?: synchronized(this) {
                INSTANCE ?: Room.databaseBuilder(
                    context.applicationContext,
                    RelationshipDatabase::class.java,
                    DB_NAME
                ).build().also { INSTANCE = it }
            }
        }

        fun destroyInstance() {
            INSTANCE = null
        }
    }
}
