package org.fossify.contacts.databases

import androidx.room.Dao
import androidx.room.Query
import androidx.room.Update
import androidx.room.Upsert
import org.fossify.contacts.models.SyncSettings

@Dao
interface SyncSettingsDao {
    @Upsert
    fun upsert(settings: SyncSettings)

    @Query("SELECT * FROM sync_settings WHERE id = 1")
    fun get(): SyncSettings?

    @Update
    fun update(settings: SyncSettings)
}
