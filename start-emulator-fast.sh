#!/bin/bash

# Set Android SDK location
export ANDROID_HOME="$HOME/Android"
export PATH="$ANDROID_HOME/emulator:$ANDROID_HOME/platform-tools:$PATH"

echo "Starting Android Emulator (Optimized for speed)..."
echo "Note: This will be MUCH faster after you log out/in (KVM acceleration)"
echo ""

# Check if user is in kvm group
if groups | grep -q kvm; then
    echo "✓ KVM acceleration is available"
    ACCEL_ARG=""
else
    echo "⚠ KVM not active yet. Emulator will be slow."
    echo "  To fix: Log out and log back in, then restart emulator."
    ACCEL_ARG="-no-accel"
fi

# Start with performance optimizations
"$ANDROID_HOME/emulator/emulator" \
    -avd Fossify_Fast \
    -no-snapshot-load \
    -no-boot-anim \
    -gpu swiftshader_indirect \
    -memory 2048 \
    -cores 2 \
    $ACCEL_ARG
