package org.fossify.contacts.models

import androidx.room.Entity
import androidx.room.PrimaryKey

@Entity(tableName = "contact_urgency_settings")
data class ContactUrgencySettings(
    @PrimaryKey val contactId: Int,
    val greenThresholdDays: Int = 7,
    val yellowThresholdDays: Int = 14,
    val orangeThresholdDays: Int = 21,
    val redThresholdDays: Int = 30,
    val enabled: Boolean = true
)
