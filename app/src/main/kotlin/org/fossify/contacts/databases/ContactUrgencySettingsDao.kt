package org.fossify.contacts.databases

import androidx.room.Dao
import androidx.room.Query
import androidx.room.Upsert
import org.fossify.contacts.models.ContactUrgencySettings

@Dao
interface ContactUrgencySettingsDao {
    @Upsert
    fun upsert(settings: ContactUrgencySettings)

    @Query("SELECT * FROM contact_urgency_settings WHERE contactId = :contactId")
    fun getByContactId(contactId: Int): ContactUrgencySettings?

    @Query("SELECT * FROM contact_urgency_settings")
    fun getAll(): List<ContactUrgencySettings>

    @Query("DELETE FROM contact_urgency_settings WHERE contactId = :contactId")
    fun deleteByContactId(contactId: Int)
}
