package org.fossify.contacts.helpers

import android.content.Context
import org.fossify.contacts.databases.RelationshipDatabase
import org.fossify.contacts.models.ContactInteraction
import org.fossify.contacts.models.ContactUrgencySettings
import org.fossify.contacts.models.GroupUrgencySettings
import org.fossify.contacts.models.SyncSettings
import java.util.concurrent.TimeUnit

class RelationshipRepository(context: Context) {
    private val database = RelationshipDatabase.getInstance(context)
    private val urgencyDao = database.contactUrgencySettingsDao()
    private val groupUrgencyDao = database.groupUrgencySettingsDao()
    private val interactionDao = database.contactInteractionDao()
    private val syncDao = database.syncSettingsDao()

    // Contact Urgency Settings
    fun upsertUrgencySettings(settings: ContactUrgencySettings) = urgencyDao.upsert(settings)
    fun getUrgencySettings(contactId: Int): ContactUrgencySettings? = urgencyDao.getByContactId(contactId)
    fun getAllUrgencySettings(): List<ContactUrgencySettings> = urgencyDao.getAll()
    fun deleteUrgencySettings(contactId: Int) = urgencyDao.deleteByContactId(contactId)

    // Group Urgency Settings
    fun upsertGroupUrgencySettings(settings: GroupUrgencySettings) = groupUrgencyDao.upsert(settings)
    fun getGroupUrgencySettings(groupId: Long): GroupUrgencySettings? = groupUrgencyDao.getByGroupId(groupId)
    fun getAllGroupUrgencySettings(): List<GroupUrgencySettings> = groupUrgencyDao.getAll()
    fun deleteGroupUrgencySettings(groupId: Long) = groupUrgencyDao.deleteByGroupId(groupId)

    // Contact Interactions
    fun insertInteraction(interaction: ContactInteraction): Long = interactionDao.insert(interaction)
    fun getInteractions(contactId: Int): List<ContactInteraction> = interactionDao.getByContactId(contactId)
    fun getLatestInteraction(contactId: Int): ContactInteraction? = interactionDao.getLatestForContact(contactId)
    fun deleteInteractions(contactId: Int) = interactionDao.deleteByContactId(contactId)
    fun deleteInteraction(id: Long) = interactionDao.deleteById(id)

    // Sync Settings
    fun upsertSyncSettings(settings: SyncSettings) = syncDao.upsert(settings)
    fun getSyncSettings(): SyncSettings? = syncDao.get()
    fun updateSyncSettings(settings: SyncSettings) = syncDao.update(settings)

    // Helpers
    fun getDaysSinceLastInteraction(contactId: Int): Long? {
        val latest = interactionDao.getLatestForContact(contactId) ?: return null
        val diffMillis = System.currentTimeMillis() - latest.timestamp
        return TimeUnit.MILLISECONDS.toDays(diffMillis)
    }
}
