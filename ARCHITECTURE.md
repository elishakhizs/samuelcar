# Samuel Car — System Architecture

## 1. Architecture Overview

Samuel Car follows the Laravel MVC (Model-View-Controller) architecture.

The application separates:

- Presentation/UI
- Application logic
- Database/data access
- Routing
- Authentication
- Business functionality

This structure makes the application easier to maintain, debug and extend.

---

## 2. High-Level Application Flow

```text
                    USER
                     |
                     v
              WEB BROWSER
                     |
                     v
               Laravel Routes
                     |
                     v
                Controllers
                     |
          +----------+----------+
          |                     |
          v                     v
       Models              Application Logic
          |
          v
       Database
          |
          v
       Eloquent
          |
          v
       Controllers
          |
          v
      Blade / Livewire
          |
          v
      Web Interface
```

## 3. database relationship flow
``` text
User
 |
 +---- Competition Entries
 |
 +---- User-specific application activity


Competition
 |
 +---- Competition Entries


Product
 |
 +---- Product Media
```
## 4. lifecycle flow
```text
User Request
     |
     v
Laravel Route
     |
     v
Controller
     |
     v
Validation / Business Logic
     |
     v
Eloquent Model
     |
     v
Database
     |
     v
Controller
     |
     v
Blade / Livewire View
     |
     v
User
```

next cycle to be implemented
```deployment phase 

                 USERS
                   |
                   v
              HTTPS / SSL
                   |
                   v
             Web Server
                   |
                   v
             Laravel App
                   |
          +--------+--------+
          |                 |
          v                 v
       Database          Storage

```
