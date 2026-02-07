# Quick Start Guide

## ✅ Setup Complete!

Your Fossify Contacts development environment is ready to go!

## 🚀 Run the App Now

### Method 1: Quick Test (2 Commands)

**Terminal 1 - Start Emulator:**
```bash
cd "/home/leoforce/Fossify contacts"
./start-emulator.sh
```

**Terminal 2 - Install & Run App:**
```bash
cd "/home/leoforce/Fossify contacts"
./install-app.sh
```

### Method 2: Development Workflow (1 Command)

After the emulator is running:
```bash
cd "/home/leoforce/Fossify contacts"
./dev-cycle.sh
```
This will build, install, and launch the app automatically.

## 📱 Run on Your Android Phone

1. Enable USB Debugging on your phone:
   - Settings → About Phone → Tap "Build Number" 7 times
   - Settings → Developer Options → Enable "USB Debugging"

2. Connect phone via USB and run:
```bash
cd "/home/leoforce/Fossify contacts"
./install-app.sh
```

## 🛠️ Development Commands

**Rebuild after code changes:**
```bash
./gradlew assembleFossDebug
```

**Build + Install + Launch in one command:**
```bash
./dev-cycle.sh
```

**Check connected devices:**
```bash
adb devices
```

**View logs:**
```bash
adb logcat | grep Fossify
```

## 📚 Full Documentation

See `RUN_LOCALLY.md` for complete documentation including:
- Detailed setup information
- Troubleshooting guide
- All available build variants
- Advanced commands

## 💡 Pro Tips

1. **Faster Emulator**: Add yourself to the `kvm` group:
   ```bash
   sudo usermod -aG kvm $USER
   ```
   Then log out and back in.

2. **New Terminal Sessions**: After opening a new terminal, the Android SDK commands will be available automatically (adb, emulator, etc.)

3. **Multiple Devices**: If you have both emulator and phone connected, use:
   ```bash
   adb -s <device-id> install <apk>
   ```

## 🎯 What's Installed

- ✅ OpenJDK 21 JDK
- ✅ Android SDK API 36
- ✅ Android Build Tools 36.1.0
- ✅ Android Emulator
- ✅ Android Platform Tools (adb)
- ✅ Virtual Device "Fossify_Test" (Pixel 6, Android 36)
- ✅ App built and ready (30MB FOSS variant)

## 📦 APK Locations

- **FOSS variant** (recommended): `app/build/outputs/apk/foss/debug/contacts-13-foss-debug.apk`
- **Core variant**: `app/build/outputs/apk/core/debug/contacts-13-core-debug.apk`
- **Google Play variant**: `app/build/outputs/apk/gplay/debug/contacts-13-gplay-debug.apk`

---

**Ready to start developing!** 🎉
