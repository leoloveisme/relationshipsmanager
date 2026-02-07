# Relationshipsmanager Development Plan

## Project Overview
Relationshipsmanager extends Fossify Contacts into a relationship management tool that helps users stay in touch with their contacts through visual urgency indicators, reminders, and contact history tracking.

**Base:** Fossify Contacts (Android/Kotlin)  
**Target Platforms:** Android (primary), Web, Desktop (future)

---

## Phase 1: Core Data Model & Database Extensions
**Goal:** Extend the existing contact data model to support relationship tracking.

### 1.1 Database Schema Extensions
Create new Room database entities and migrations:

- **ContactUrgencySettings** entity
  - `contactId: Int` (FK to Contact)
  - `greenThresholdDays: Int` (default: 7)
  - `yellowThresholdDays: Int` (default: 14)
  - `orangeThresholdDays: Int` (default: 21)
  - `redThresholdDays: Int` (default: 30)
  - `enabled: Boolean` (default: true)

- **GroupUrgencySettings** entity (default settings for groups)
  - `groupId: Int` (FK to Group)
  - `greenThresholdDays: Int`
  - `yellowThresholdDays: Int`
  - `orangeThresholdDays: Int`
  - `redThresholdDays: Int`

- **ContactInteraction** entity (contact history)
  - `id: Int` (PK, auto-generated)
  - `contactId: Int` (FK to Contact)
  - `interactionType: String` (CALL_IN, CALL_OUT, SMS_IN, SMS_OUT, EMAIL, SOCIAL, MANUAL)
  - `timestamp: Long`
  - `source: String` (optional - e.g., "WhatsApp", "Phone")
  - `notes: String` (optional)

- **SyncSettings** entity
  - `id: Int` (PK)
  - `syncEnabled: Boolean`
  - `cloudProvider: String` (nullable)
  - `lastSyncTimestamp: Long`

### 1.2 DAO Interfaces
- `ContactUrgencySettingsDao`
- `GroupUrgencySettingsDao`
- `ContactInteractionDao`
- `SyncSettingsDao`

### 1.3 Repository Layer
Create `RelationshipRepository` to handle:
- CRUD operations for urgency settings
- Contact interaction logging
- Day count calculations
- Urgency status computation

---

## Phase 2: Urgency Color System
**Goal:** Implement the visual urgency indicator system.

### 2.1 Urgency Calculator
Create `UrgencyCalculator` helper class:
- Calculate days since last interaction for a contact
- Determine urgency level (GREEN, YELLOW, ORANGE, RED) based on thresholds
- Handle contacts with no interaction history
- Support both contact-specific and group-inherited settings

### 2.2 Color Definitions
Add to `Constants.kt`:
```kotlin
enum class UrgencyLevel {
    GREEN,   // All good
    YELLOW,  // Contact soon
    ORANGE,  // Need to contact / Due
    RED      // Overdue
}
```

Define color resources in `colors.xml`:
- `urgency_green`
- `urgency_yellow`
- `urgency_orange`
- `urgency_red`

### 2.3 UI Integration
Modify `ContactsAdapter`:
- Add urgency indicator (colored dot/bar) to contact list items
- Update `item_contact_with_number.xml` and related layouts
- Implement real-time urgency status updates

Modify `ViewContactActivity`:
- Display urgency status prominently
- Show days since last contact
- Add "Mark as Contacted" quick action button

---

## Phase 3: Settings & Configuration UI
**Goal:** Allow users to configure urgency thresholds per contact and per group.

### 3.1 Contact Urgency Settings Dialog
Create `ContactUrgencySettingsDialog`:
- Four input fields for threshold days (green, yellow, orange, red)
- Toggle to enable/disable tracking for this contact
- Option to inherit settings from group
- Preview of current urgency status

### 3.2 Group Urgency Settings Dialog
Create `GroupUrgencySettingsDialog`:
- Set default thresholds for all contacts in group
- Toggle to apply to existing contacts

### 3.3 Global Settings
Extend `SettingsActivity`:
- Default urgency thresholds for new contacts
- Enable/disable urgency system globally
- Color customization options

### 3.4 Edit Contact Integration
Modify `EditContactActivity`:
- Add "Relationship Settings" section
- Link to urgency settings dialog
- Display current urgency status

---

## Phase 4: Contact Interaction History
**Goal:** Track and display contact interaction history.

### 4.1 Interaction Logging
Create `InteractionLogger` service:
- Manual interaction logging
- Integration points for automatic logging (Phase 6)

### 4.2 History UI
Create `ContactHistoryActivity`:
- Timeline view of all interactions
- Filter by interaction type
- Add manual interaction entries
- Edit/delete existing entries

### 4.3 Quick Actions
Add to contact views:
- "Log Contact" floating action button
- Quick interaction type selector (call, message, email, etc.)
- Manual day count reset button

---

## Phase 5: Reminders System
**Goal:** Notify users when contacts need attention.

### 5.1 Notification Infrastructure
- Create `ReminderNotificationChannel`
- Design notification layouts for urgency alerts

### 5.2 Background Service
Create `UrgencyCheckWorker` (WorkManager):
- Periodic check of all contacts' urgency status
- Generate notifications for YELLOW, ORANGE and RED contacts
- Configurable check frequency

### 5.3 Reminder Settings
Add to settings:
- Enable/disable reminders
- Notification frequency
- Quiet hours configuration
- Per-contact reminder preferences

### 5.4 Notification Actions
- "Mark as Contacted" action
- "Snooze" action
- "Call Now" / "Message Now" quick actions

---

## Phase 6: Automatic Interaction Detection
**Goal:** Automatically detect and log interactions.

### 6.1 Call Log Integration
Create `CallLogObserver`:
- Monitor Android call log for incoming/outgoing calls
- Match with contacts
- Auto-reset day count on detected calls

### 6.2 SMS Integration
Create `SmsObserver`:
- Monitor SMS inbox/sent for messages
- Match with contacts
- Log SMS interactions

### 6.3 Permissions Handling
- Request CALL_LOG permission
- Request SMS permission
- Graceful fallback if permissions denied
- Settings toggle for each integration

---

## Phase 7: Social Media & Email Integration
**Goal:** Connect external communication channels.

### 7.1 Email Integration
- Integration with email providers (OAuth)
- Parse email threads for contact interactions
- Settings for connected accounts

### 7.2 Social Media Integration (Optional/Advanced)
- WhatsApp, Telegram, Signal detection (where API available)
- Facebook Messenger integration
- LinkedIn messaging

### 7.3 Integration Manager
Create `IntegrationManager`:
- Manage connected accounts
- Sync interaction data from external sources
- Handle authentication/re-authentication

---

## Phase 8: Sync & Cloud Storage
**Goal:** Enable data synchronization across devices.

### 8.1 Local Export/Import
Extend existing VCF export:
- Include urgency settings in export
- Include interaction history
- Custom file format for full data

### 8.2 Cloud Sync Infrastructure
Create `SyncManager`:
- Support for cloud storage providers
- Conflict resolution strategy
- Offline queue for pending changes

### 8.3 Sync Providers
Implement sync adapters for:
- Local file sync (manual)
- Cloud storage (Google Drive, Dropbox, etc.)
- Self-hosted options

### 8.4 Sync Settings UI
- Connect cloud accounts
- Sync frequency settings
- Manual sync trigger
- Sync status display

---

## Phase 9: Enhanced Groups Feature
**Goal:** Extend group functionality for relationship management.

### 9.1 Group Enhancements
- Group-level urgency overview (dashboard)
- Batch urgency settings for group
- Group interaction statistics

### 9.2 Smart Groups
- Auto-groups based on urgency status
- "Needs Attention" smart group
- "Recently Contacted" smart group

---

## Phase 10: Web & Desktop Apps (Future)
**Goal:** Multi-platform support.

### 10.1 Backend API
- Design REST API for sync
- User authentication
- Data encryption

### 10.2 Web Application
- React/Vue.js frontend
- Responsive design
- Feature parity with mobile

### 10.3 Desktop Application
- Electron or native app
- System tray integration
- Desktop notifications

---

## Technical Considerations

### Architecture
- Follow existing Fossify codebase patterns
- Use Room for local database
- WorkManager for background tasks
- MVVM pattern for new features

### Testing Strategy
- Unit tests for calculators and repositories
- Integration tests for database operations
- UI tests for critical flows

### Migration Strategy
- Non-destructive database migrations
- Maintain backward compatibility
- Preserve existing Fossify Contacts functionality

### Performance
- Efficient urgency calculations (cache results)
- Optimize list rendering with urgency indicators
- Background processing for intensive operations

---

## Milestones & Priority

| Priority | Phase | Description | Est. Effort |
|----------|-------|-------------|-------------|
| P0 | 1 | Core Data Model | 1-2 weeks |
| P0 | 2 | Urgency Color System | 1-2 weeks |
| P0 | 3 | Settings & Configuration | 1-2 weeks |
| P1 | 4 | Contact History | 1 week |
| P1 | 5 | Reminders | 1-2 weeks |
| P2 | 6 | Auto Interaction Detection | 1-2 weeks |
| P2 | 9 | Enhanced Groups | 1 week |
| P3 | 7 | Social/Email Integration | 2-3 weeks |
| P3 | 8 | Sync & Cloud | 2-3 weeks |
| P4 | 10 | Web & Desktop | TBD |

---

## Next Steps
1. Set up development branch
2. Implement Phase 1 database schema
3. Create basic urgency calculation logic
4. Add visual indicators to contact list
5. Iterate based on testing and feedback
