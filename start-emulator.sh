#!/bin/bash

# Set Android SDK location
export ANDROID_HOME="$HOME/Android"
export PATH="$ANDROID_HOME/emulator:$ANDROID_HOME/platform-tools:$PATH"

echo "Starting Android Emulator (Fossify_Test)..."
echo "This may take a few minutes on first launch..."
echo ""

# Start the emulator
"$ANDROID_HOME/emulator/emulator" -avd Fossify_Test -no-snapshot-load
