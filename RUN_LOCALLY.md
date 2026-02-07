# Running Fossify Contacts Locally

## Setup Complete! ✅

The development environment has been configured with:
- ✅ OpenJDK 21 JDK installed
- ✅ Android SDK (API 36) installed at `~/Android`
- ✅ Android Emulator installed
- ✅ Virtual device "Fossify_Test" created (Pixel 6, Android 36)
- ✅ App built successfully (3 APK variants created)

## Running the App

### Option 1: Using the Helper Scripts (Recommended)

**Step 1: Start the Emulator**
```bash
cd "/home/leoforce/Fossify contacts"
./start-emulator.sh
```

Wait for the emulator to fully boot (you'll see the Android home screen). This can take 2-5 minutes on the first launch.

**Step 2: Install and Launch the App** (in a new terminal)
```bash
cd "/home/leoforce/Fossify contacts"
./install-app.sh
```

### Option 2: Manual Commands

**Start the emulator:**
```bash
export ANDROID_HOME="$HOME/Android"
$ANDROID_HOME/emulator/emulator -avd Fossify_Test
```

**Install the app** (in a new terminal):
```bash
export ANDROID_HOME="$HOME/Android"
cd "/home/leoforce/Fossify contacts"
$ANDROID_HOME/platform-tools/adb install -r app/build/outputs/apk/foss/debug/contacts-13-foss-debug.apk
$ANDROID_HOME/platform-tools/adb shell am start -n org.fossify.contacts.debug/org.fossify.contacts.activities.MainActivity
```

## Building the App

To rebuild the app after making changes:

```bash
cd "/home/leoforce/Fossify contacts"
./gradlew assembleDebug
```

This creates 3 APK variants:
- **core-debug**: Core variant (minimal features)
- **foss-debug**: FOSS variant (recommended for development)
- **gplay-debug**: Google Play variant (with Play Services)

APK location: `app/build/outputs/apk/[variant]/debug/`

## Running on Physical Android Devices

### Prerequisites
1. Enable Developer Options on your Android device:
   - Go to Settings → About Phone
   - Tap "Build Number" 7 times
   
2. Enable USB Debugging:
   - Settings → Developer Options → USB Debugging

### Install the App
1. Connect your Android device via USB
2. Run:
   ```bash
   cd "/home/leoforce/Fossify contacts"
   ./install-app.sh
   ```

## Useful Commands

**List connected devices:**
```bash
$HOME/Android/platform-tools/adb devices
```

**View app logs:**
```bash
$HOME/Android/platform-tools/adb logcat | grep Fossify
```

**Uninstall the app:**
```bash
$HOME/Android/platform-tools/adb uninstall org.fossify.contacts.debug
```

**Build specific variant:**
```bash
./gradlew assembleFossDebug    # FOSS variant only
./gradlew assembleCoreDebug    # Core variant only
./gradlew assembleGplayDebug   # Google Play variant only
```

## Performance Note

For better emulator performance, add your user to the `kvm` group:
```bash
sudo usermod -aG kvm $USER
```

Then log out and log back in for the changes to take effect.

## Troubleshooting

**Emulator won't start:**
- Make sure no other emulator is running
- Check available disk space
- Try: `$HOME/Android/emulator/emulator -avd Fossify_Test -wipe-data`

**App won't install:**
- Make sure the emulator is fully booted
- Try uninstalling first: `adb uninstall org.fossify.contacts.debug`
- Rebuild the app: `./gradlew clean assembleDebug`

**Build fails:**
- Clean and rebuild: `./gradlew clean assembleDebug`
- Stop Gradle daemon: `./gradlew --stop`
