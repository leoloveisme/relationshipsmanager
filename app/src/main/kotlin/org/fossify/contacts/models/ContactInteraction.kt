package org.fossify.contacts.models

import androidx.room.ColumnInfo
import androidx.room.Entity
import androidx.room.Index
import androidx.room.PrimaryKey

@Entity(
    tableName = "contact_interactions",
    indices = [Index(value = ["contactId"])]
)
data class ContactInteraction(
    @PrimaryKey(autoGenerate = true) val id: Long = 0,
    @ColumnInfo(name = "contactId") val contactId: Int,
    val interactionType: String,
    val timestamp: Long,
    val source: String? = null,
    val notes: String? = null
)
