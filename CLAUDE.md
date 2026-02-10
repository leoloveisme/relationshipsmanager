# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Relationshipsmanager extends **Fossify Contacts** (an open-source Android contacts app) into a relationship management tool. It adds urgency-based color indicators showing how long since a user last contacted someone, with configurable thresholds per contact and per group.

**Package:** `org.fossify.contacts` (debug suffix: `.debug`)
**Language:** Kotlin, **Min SDK:** 26, **Target SDK:** 36, **Java/Kotlin target:** 17

## Build Commands

```bash
# Build FOSS debug variant (recommended for development)
./gradlew assembleFossDebug

# Build all debug variants (core, foss, gplay)
./gradlew assembleDebug

# Build + install + launch on connected device/emulator
./dev-cycle.sh

# Run detekt static analysis
./gradlew detekt

# Run Android lint
./gradlew lintFossDebug

# Clean build
./gradlew clean assembleFossDebug

# View app logs
adb logcat | grep Fossify
```

APK output: `app/build/outputs/apk/foss/debug/contacts-<versionCode>-foss-debug.apk`

**Note:** `dev-cycle.sh` hardcodes the version code in the APK filename (currently `contacts-13-foss-debug.apk`). Update the script when `VERSION_CODE` changes in `gradle.properties`.

**No tests exist yet.** Test infrastructure (`app/src/test/`, `app/src/androidTest/`) has not been set up.

## Product Flavors

Three flavors in the `variants` dimension, each with only resource overrides (no Kotlin source differences):
- **foss** - F-Droid/open-source distribution (recommended for dev)
- **core** - minimal variant
- **gplay** - Google Play variant (with Play Services references)

## Architecture

### Fossify Commons Dependency

The app heavily depends on `org.fossify:commons` (version catalog: `libs.fossify.commons`). This library provides:
- Base activities, theming, permission handling, contact helpers (`ContactsHelper`, `ContactsDatabase`)
- The `Contact` model class (`org.fossify.commons.models.contacts.Contact`)
- Tab constants (`TAB_CONTACTS`, `TAB_FAVORITES`, `TAB_GROUPS`)
- Extension functions used throughout the app

Many classes referenced in this codebase (e.g., `ContactsHelper`, `ContactsDatabase`, view extensions) come from commons, not from this repo. Commons also provides `ensureBackgroundThread { }` used throughout for off-main-thread work.

### Source Layout (all under `app/src/main/kotlin/org/fossify/contacts/`)

- **activities/** - Android Activities. `SimpleActivity` is the base class. `MainActivity` uses a `ViewPager` with tab fragments.
- **fragments/** - `MyViewPagerFragment` is the abstract base. `ContactsFragment`, `FavoritesFragment`, `GroupsFragment` are the three tabs.
- **adapters/** - RecyclerView adapters. `ContactsAdapter` renders contact list items. `ViewPagerAdapter` manages tab fragments.
- **dialogs/** - UI dialog classes for sorting, filtering, import/export, etc.
- **helpers/** - Business logic: `Config` (SharedPreferences wrapper), `VcfExporter`/`VcfImporter` (vCard handling), `Constants.kt` (constants and `UrgencyLevel` enum).
- **extensions/** - Kotlin extensions on `Context` and `Activity`. `Context.config` and `Context.relationshipRepository` are convenience accessors.
- **interfaces/** - Callback interfaces (`RefreshContactsListener`, `RemoveFromGroupListener`).
- **receivers/** - `BootCompletedReceiver`, `AutomaticBackupReceiver`.
- **contentproviders/** - `MyContactsContentProvider` exposes contacts to other Fossify apps.

### Relationship Management Layer (new code on top of Fossify Contacts)

This is the custom extension being built. Key components:

- **`databases/RelationshipDatabase.kt`** - Room database (`relationship_manager.db`, version 1) with singleton pattern. Contains four entities and their DAOs.
- **`models/`** - Room entities: `ContactUrgencySettings`, `GroupUrgencySettings`, `ContactInteraction`, `SyncSettings`.
- **`databases/`** - Room DAOs: `ContactUrgencySettingsDao`, `GroupUrgencySettingsDao`, `ContactInteractionDao`, `SyncSettingsDao`.
- **`helpers/RelationshipRepository.kt`** - Repository wrapping all DAO operations. Includes `getDaysSinceLastInteraction()` helper.
- **`helpers/UrgencyCalculator.kt`** - Computes `UrgencyLevel` (GREEN/YELLOW/ORANGE/RED/NONE) for contacts based on days since last interaction. Supports per-contact thresholds, group-inherited thresholds, and batch calculation.
- **`UrgencyLevel` enum** (in `Constants.kt`) - Maps urgency levels to color resources (`R.color.urgency_green`, etc.).

**Threshold resolution order:** Contact-specific settings > Group settings (first matching group) > Defaults (7/14/21/30 days).

**Urgency UI injection pattern:** `ContactsAdapter` dynamically injects a 4dp colored bar into contact list items at runtime (no XML layout changes needed). It holds an `urgencyMap: Map<Int, UrgencyLevel>`, recalculates in batch via `UrgencyCalculator.calculateBatchUrgency()` on a background thread whenever the contact list updates, then calls `notifyDataSetChanged()` on the UI thread. The bar is a plain `View` constrained to the start edge of each item's `ConstraintLayout`, identified by the tag `"urgency_indicator"`.

Room schemas are exported to `app/schemas/`.

### Two Separate Databases

The app uses two Room databases simultaneously:
1. `ContactsDatabase` (from Fossify Commons) - standard contact storage
2. `RelationshipDatabase` (this repo) - urgency settings, interactions, sync settings

Both are destroyed in `MainActivity.onDestroy()`.

## Development Plan

See `Relationshipsmanager development plan.md` for the phased roadmap. Current state: Phase 1 (data model) is complete and Phase 2 (urgency color system) is partially implemented — urgency calculation logic, color resources, and the contact list indicator bar are done. Remaining Phase 2 work includes `ViewContactActivity` urgency display (layout exists but logic not wired). Upcoming: Phase 3 (settings/configuration dialogs), Phase 4 (interaction history UI), Phase 5 (reminders), Phase 6 (auto-detection of calls/SMS).

## Static Analysis

- **Detekt** with custom config at `detekt.yml` and baseline at `app/detekt-baseline.xml`. Includes Compose rules from `io.nlopez.compose.rules`.
- **Android Lint** config at `lint.xml` with baseline at `app/lint-baseline.xml`. Key: `abortOnError = true`.
- Max line length: 120 characters.
- Max method length: 120 lines (Composable/Preview exempted).
- Function naming: `[a-z][A-Za-z0-9]*` (Composable/Preview exempted).

## Versioning

Version properties are in `gradle.properties`: `VERSION_NAME`, `VERSION_CODE`, `APP_ID`.

## Key Libraries

- **Room** (2.8.4) with KSP annotation processing
- **Ez-vcard** - vCard import/export
- **Joda-Time** - date/time handling (via commons)
- **ViewBinding** enabled (no data binding)
