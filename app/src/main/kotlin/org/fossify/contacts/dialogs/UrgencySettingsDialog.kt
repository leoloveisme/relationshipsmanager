package org.fossify.contacts.dialogs

import android.view.View
import androidx.appcompat.app.AlertDialog
import org.fossify.commons.activities.BaseSimpleActivity
import org.fossify.commons.extensions.getAlertDialogBuilder
import org.fossify.commons.extensions.setupDialogStuff
import org.fossify.commons.extensions.toast
import org.fossify.contacts.R
import org.fossify.contacts.databinding.DialogUrgencySettingsBinding
import org.fossify.contacts.helpers.UrgencyThresholds

class UrgencySettingsDialog(
    val activity: BaseSimpleActivity,
    val titleResId: Int,
    val currentThresholds: UrgencyThresholds,
    val showEnabledToggle: Boolean = false,
    val callback: (UrgencyThresholds) -> Unit
) {
    init {
        val binding = DialogUrgencySettingsBinding.inflate(activity.layoutInflater)

        binding.urgencyGreen.setText(currentThresholds.green.toString())
        binding.urgencyYellow.setText(currentThresholds.yellow.toString())
        binding.urgencyOrange.setText(currentThresholds.orange.toString())
        binding.urgencyRed.setText(currentThresholds.red.toString())

        if (showEnabledToggle) {
            binding.urgencyEnabledHolder.visibility = View.VISIBLE
            binding.urgencyEnabled.isChecked = currentThresholds.enabled
        }

        activity.getAlertDialogBuilder()
            .setPositiveButton(org.fossify.commons.R.string.ok, null)
            .setNegativeButton(org.fossify.commons.R.string.cancel, null)
            .apply {
                activity.setupDialogStuff(binding.root, this, titleResId) { alertDialog ->
                    alertDialog.getButton(AlertDialog.BUTTON_POSITIVE).setOnClickListener(View.OnClickListener {
                        val greenStr = binding.urgencyGreen.text.toString()
                        val yellowStr = binding.urgencyYellow.text.toString()
                        val orangeStr = binding.urgencyOrange.text.toString()
                        val redStr = binding.urgencyRed.text.toString()

                        if (greenStr.isEmpty() || yellowStr.isEmpty() || orangeStr.isEmpty() || redStr.isEmpty()) {
                            activity.toast(org.fossify.commons.R.string.empty_name)
                            return@OnClickListener
                        }

                        val green = greenStr.toIntOrNull()
                        val yellow = yellowStr.toIntOrNull()
                        val orange = orangeStr.toIntOrNull()
                        val red = redStr.toIntOrNull()

                        if (green == null || yellow == null || orange == null || red == null
                            || green <= 0 || yellow <= 0 || orange <= 0 || red <= 0
                        ) {
                            activity.toast(R.string.urgency_values_must_be_positive)
                            return@OnClickListener
                        }

                        if (green >= yellow || yellow >= orange || orange >= red) {
                            activity.toast(R.string.urgency_values_must_increase)
                            return@OnClickListener
                        }

                        val enabled = if (showEnabledToggle) binding.urgencyEnabled.isChecked else currentThresholds.enabled
                        callback(UrgencyThresholds(green, yellow, orange, red, enabled))
                        alertDialog.dismiss()
                    })
                }
            }
    }
}
