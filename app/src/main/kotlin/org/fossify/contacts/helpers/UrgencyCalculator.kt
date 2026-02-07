package org.fossify.contacts.helpers

import android.content.Context
import org.fossify.commons.models.contacts.Contact
import org.fossify.contacts.models.ContactUrgencySettings
import java.util.concurrent.TimeUnit

class UrgencyCalculator(context: Context) {
    private val repository = RelationshipRepository(context)

    fun calculateUrgency(contact: Contact): UrgencyLevel {
        val settings = repository.getUrgencySettings(contact.id)
        if (settings != null && !settings.enabled) {
            return UrgencyLevel.NONE
        }

        val thresholds = settings ?: resolveThresholds(contact)
        val daysSince = repository.getDaysSinceLastInteraction(contact.id)
            ?: return UrgencyLevel.RED // no history defaults to RED

        return when {
            daysSince <= thresholds.greenThresholdDays -> UrgencyLevel.GREEN
            daysSince <= thresholds.yellowThresholdDays -> UrgencyLevel.YELLOW
            daysSince <= thresholds.orangeThresholdDays -> UrgencyLevel.ORANGE
            else -> UrgencyLevel.RED
        }
    }

    fun calculateBatchUrgency(contacts: List<Contact>): Map<Int, UrgencyLevel> {
        val allContactSettings = repository.getAllUrgencySettings().associateBy { it.contactId }
        val allGroupSettings = repository.getAllGroupUrgencySettings().associateBy { it.groupId }
        val defaultThresholds = ContactUrgencySettings(contactId = 0)

        val result = mutableMapOf<Int, UrgencyLevel>()
        for (contact in contacts) {
            val settings = allContactSettings[contact.id]
            if (settings != null && !settings.enabled) {
                result[contact.id] = UrgencyLevel.NONE
                continue
            }

            val thresholds = settings
                ?: contact.groups.firstNotNullOfOrNull { group ->
                    group.id?.let { allGroupSettings[it] }
                }?.let {
                    ContactUrgencySettings(
                        contactId = contact.id,
                        greenThresholdDays = it.greenThresholdDays,
                        yellowThresholdDays = it.yellowThresholdDays,
                        orangeThresholdDays = it.orangeThresholdDays,
                        redThresholdDays = it.redThresholdDays
                    )
                }
                ?: defaultThresholds

            val daysSince = repository.getDaysSinceLastInteraction(contact.id)
            if (daysSince == null) {
                result[contact.id] = UrgencyLevel.RED
                continue
            }

            result[contact.id] = when {
                daysSince <= thresholds.greenThresholdDays -> UrgencyLevel.GREEN
                daysSince <= thresholds.yellowThresholdDays -> UrgencyLevel.YELLOW
                daysSince <= thresholds.orangeThresholdDays -> UrgencyLevel.ORANGE
                else -> UrgencyLevel.RED
            }
        }
        return result
    }

    fun getDaysSinceLastInteraction(contactId: Int): Long? {
        return repository.getDaysSinceLastInteraction(contactId)
    }

    private fun resolveThresholds(contact: Contact): ContactUrgencySettings {
        // Check group settings
        for (group in contact.groups) {
            val groupId = group.id ?: continue
            val groupSettings = repository.getGroupUrgencySettings(groupId)
            if (groupSettings != null) {
                return ContactUrgencySettings(
                    contactId = contact.id,
                    greenThresholdDays = groupSettings.greenThresholdDays,
                    yellowThresholdDays = groupSettings.yellowThresholdDays,
                    orangeThresholdDays = groupSettings.orangeThresholdDays,
                    redThresholdDays = groupSettings.redThresholdDays
                )
            }
        }
        // Return defaults
        return ContactUrgencySettings(contactId = contact.id)
    }
}
