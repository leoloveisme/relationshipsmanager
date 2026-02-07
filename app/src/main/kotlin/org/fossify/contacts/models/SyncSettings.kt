package org.fossify.contacts.models

import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity(tableName = "sync_settings")
data class SyncSettings(
    @PrimaryKey val id: Int = 1,
    val syncEnabled: Boolean = false,
    val cloudProvider: String? = null,
    val lastSyncTimestamp: Long = 0
)
