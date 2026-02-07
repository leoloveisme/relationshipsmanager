#!/bin/bash

# Quick development cycle script
# Builds the app and installs it on the running emulator/device

export ANDROID_HOME="$HOME/Android"
export PATH="$ANDROID_HOME/platform-tools:$PATH"

echo "======================================"
echo "  Fossify Contacts - Development Cycle"
echo "======================================"
echo ""

# Build the app
echo "📦 Building app..."
./gradlew assembleFossDebug

if [ $? -ne 0 ]; then
    echo ""
    echo "❌ Build failed!"
    exit 1
fi

echo ""
echo "✅ Build successful!"
echo ""

# Check if device is connected
echo "🔍 Checking for connected devices..."
DEVICE_COUNT=$("$ANDROID_HOME/platform-tools/adb" devices | grep -c "device$")

if [ $DEVICE_COUNT -eq 0 ]; then
    # Check if device is offline (still booting)
    if "$ANDROID_HOME/platform-tools/adb" devices | grep -q "offline"; then
        echo "⏳ Device is booting, waiting for it to be ready..."
        "$ANDROID_HOME/platform-tools/adb" wait-for-device
        echo "✅ Device is now ready!"
    else
        echo ""
        echo "⚠️  No device found. Please:"
        echo "   1. Start the emulator: ./start-emulator.sh"
        echo "   2. OR connect a physical device via USB"
        exit 1
    fi
else
    echo "✅ Device found!"
fi
echo ""

# Install the app
echo "📲 Installing app..."
"$ANDROID_HOME/platform-tools/adb" install -r app/build/outputs/apk/foss/debug/contacts-13-foss-debug.apk

if [ $? -ne 0 ]; then
    echo ""
    echo "❌ Installation failed!"
    exit 1
fi

echo ""
echo "🚀 Launching app..."
"$ANDROID_HOME/platform-tools/adb" shell am start -n org.fossify.contacts.debug/org.fossify.contacts.activities.MainActivity

echo ""
echo "======================================"
echo "✨ Done! App is running on device."
echo "======================================"
