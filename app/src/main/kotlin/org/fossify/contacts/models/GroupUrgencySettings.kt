package org.fossify.contacts.models

import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity(tableName = "group_urgency_settings")
data class GroupUrgencySettings(
    @PrimaryKey val groupId: Long,
    val greenThresholdDays: Int = 7,
    val yellowThresholdDays: Int = 14,
    val orangeThresholdDays: Int = 21,
    val redThresholdDays: Int = 30
)
