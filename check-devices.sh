#!/bin/bash

export ANDROID_HOME="$HOME/Android"
export PATH="$ANDROID_HOME/platform-tools:$PATH"

echo "======================================"
echo "  Android Devices Status"
echo "======================================"
echo ""

"$ANDROID_HOME/platform-tools/adb" devices -l

echo ""
echo "Status Legend:"
echo "  • device    = Ready to use"
echo "  • offline   = Booting (wait a bit)"
echo "  • no devices = Not connected/running"
echo ""
echo "======================================"
