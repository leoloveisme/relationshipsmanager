#!/bin/bash

# Set Android SDK location
export ANDROID_HOME="$HOME/Android"
export PATH="$ANDROID_HOME/platform-tools:$PATH"

APK_PATH="./app/build/outputs/apk/foss/debug/contacts-13-foss-debug.apk"

echo "Checking for device..."
if "$ANDROID_HOME/platform-tools/adb" devices | grep -q "offline"; then
    echo "Device is booting, waiting for it to be ready..."
fi
"$ANDROID_HOME/platform-tools/adb" wait-for-device
echo "Device ready!"

echo "Installing Fossify Contacts..."
"$ANDROID_HOME/platform-tools/adb" install -r "$APK_PATH"

echo ""
echo "Launching app..."
"$ANDROID_HOME/platform-tools/adb" shell am start -n org.fossify.contacts.debug/org.fossify.contacts.activities.MainActivity

echo ""
echo "App installed and launched successfully!"
