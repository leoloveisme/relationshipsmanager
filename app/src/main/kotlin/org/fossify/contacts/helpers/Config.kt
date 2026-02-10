package org.fossify.contacts.helpers

import android.content.Context
import org.fossify.commons.helpers.BaseConfig
import org.fossify.commons.helpers.SHOW_TABS

class Config(context: Context) : BaseConfig(context) {
    companion object {
        fun newInstance(context: Context) = Config(context)
    }

    var showTabs: Int
        get() = prefs.getInt(SHOW_TABS, ALL_TABS_MASK)
        set(showTabs) = prefs.edit().putInt(SHOW_TABS, showTabs).apply()

    var autoBackupContactSources: Set<String>
        get() = prefs.getStringSet(AUTO_BACKUP_CONTACT_SOURCES, setOf())!!
        set(autoBackupContactSources) = prefs.edit().remove(AUTO_BACKUP_CONTACT_SOURCES).putStringSet(AUTO_BACKUP_CONTACT_SOURCES, autoBackupContactSources)
            .apply()

    var urgencyDefaultGreen: Int
        get() = prefs.getInt(URGENCY_DEFAULT_GREEN, 7)
        set(value) = prefs.edit().putInt(URGENCY_DEFAULT_GREEN, value).apply()

    var urgencyDefaultYellow: Int
        get() = prefs.getInt(URGENCY_DEFAULT_YELLOW, 14)
        set(value) = prefs.edit().putInt(URGENCY_DEFAULT_YELLOW, value).apply()

    var urgencyDefaultOrange: Int
        get() = prefs.getInt(URGENCY_DEFAULT_ORANGE, 21)
        set(value) = prefs.edit().putInt(URGENCY_DEFAULT_ORANGE, value).apply()

    var urgencyDefaultRed: Int
        get() = prefs.getInt(URGENCY_DEFAULT_RED, 30)
        set(value) = prefs.edit().putInt(URGENCY_DEFAULT_RED, value).apply()

}
