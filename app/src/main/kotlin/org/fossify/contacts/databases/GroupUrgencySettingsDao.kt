package org.fossify.contacts.databases

import androidx.room.Dao
import androidx.room.Query
import androidx.room.Upsert
import org.fossify.contacts.models.GroupUrgencySettings

@Dao
interface GroupUrgencySettingsDao {
    @Upsert
    fun upsert(settings: GroupUrgencySettings)

    @Query("SELECT * FROM group_urgency_settings WHERE groupId = :groupId")
    fun getByGroupId(groupId: Long): GroupUrgencySettings?

    @Query("SELECT * FROM group_urgency_settings")
    fun getAll(): List<GroupUrgencySettings>

    @Query("DELETE FROM group_urgency_settings WHERE groupId = :groupId")
    fun deleteByGroupId(groupId: Long)
}
