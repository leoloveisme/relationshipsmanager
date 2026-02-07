package org.fossify.contacts.databases

import androidx.room.Dao
import androidx.room.Insert
import androidx.room.Query
import org.fossify.contacts.models.ContactInteraction

@Dao
interface ContactInteractionDao {
    @Insert
    fun insert(interaction: ContactInteraction): Long

    @Query("SELECT * FROM contact_interactions WHERE contactId = :contactId ORDER BY timestamp DESC")
    fun getByContactId(contactId: Int): List<ContactInteraction>

    @Query("SELECT * FROM contact_interactions WHERE contactId = :contactId ORDER BY timestamp DESC LIMIT 1")
    fun getLatestForContact(contactId: Int): ContactInteraction?

    @Query("DELETE FROM contact_interactions WHERE contactId = :contactId")
    fun deleteByContactId(contactId: Int)

    @Query("DELETE FROM contact_interactions WHERE id = :id")
    fun deleteById(id: Long)
}
