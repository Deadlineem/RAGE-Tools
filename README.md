# RAGE Engine NativeDB's + Tools

A comprehensive web-based toolkit for exploring, managing, converting, and working with native function data across multiple **RAGE Engine games**.

The project provides searchable NativeDB explorers, list conversion utilities, and script generation tools designed for developers and mod-menu creators working with Rockstar Games titles.

## 🎮 Supported Games

The NativeDB currently supports six RAGE Engine games:

| Game                           | NativeDB    |    Natives |
| ------------------------------ | ----------- | ---------: |
| **Red Dead Redemption**        | `rdr.php`   |      3,496 |
| **Red Dead Redemption 2**      | `rdr2.php` |      7,132 |
| **Grand Theft Auto IV**        | `gta4.php`  |      2,630 |
| **Grand Theft Auto V**         | `gta5.php`   |      6,701 |
| **Midnight Club: Los Angeles** | `mncla.php` |      1,267 |
| **Max Payne 3**                | `mp3.php`   |      3,813 |
| **Total**                      |             | **25,039** |

Each NativeDB provides searchable native functions along with available information such as:

* Native names
* Hashes
* Namespaces
* Parameters
* Return types
* Comments
* Build information
* Game-specific hash information where available

The goal is to provide a centralized NativeDB resource covering multiple generations of Rockstar's **RAGE Engine**.

---

## 📦 Features

### 📋 NativeDB Explorers

Browse and search native functions for all supported RAGE Engine games through a modern, responsive interface.

NativeDB explorers support:

* Live searching
* Native name searching
* Hash searching
* Namespace searching
* Comment searching
* Namespace filtering
* Detailed native information
* Parameter information
* Return types
* Native signatures
* Native hash copying
* Complete native copying with parameters
* Signature-only copying
* Pagination
* Parameter editing before copying
* Custom parameter values

Each game has its own dedicated NativeDB page while sharing the same core functionality.

### 🔄 List Converter — `converter.php`

Convert lists between multiple formats without manually rewriting them.

The converter supports importing lists from either URLs or pasted content.

#### Supported Input Formats

* URL
* JSON
* INI
* C++
* Lua
* Plain Text

#### Supported Output Formats

* Plain Text (`.txt`)
* JSON (`.json`)
* INI (`.ini`)
* Lua (`.lua`)
* C++ Array (`.cpp`)
* CSV (`.csv`)
* PHP Array (`.php`)

Example JSON input:

```json
{
    "items": [
        "item1",
        "item2",
        "item3"
    ]
}
```

The converter can be useful for converting native lists, ped lists, vehicle lists, object hashes, and other development data.

### ⚡ Script Generator — `creator.php`

Generate ready-to-use command classes for supported mod-menu codebases.

Available command templates include:

* Looped Command
* Basic Command
* Player Command
* Vehicle Command

The generator allows you to specify command information, required includes, and custom implementation code before generating the final source.

---

# 🚀 Installation

## 1. Database Setup

NativeDB database usage is optional.

If you do **want** to use the databases, set:

```php
define('USE_DATABASE', true);
```

in the applicable NativeDB PHP page.  Otherwise, the Natives fetch from URL json files (Slower, Less reliable)

If you are using the databases:

1. Locate the NativeDB `.sql` files included with the repository.
2. Import the database for the game you want to use.
3. Repeat for each game database you want to host.

Example:

```bash
mysql -u your_username -p your_database < rdr_nativedb.sql
```

The imported database contains the native function information used by the corresponding NativeDB explorer.

> **Note:** Database filenames may vary depending on the version of the NativeDB data included with the repository.

---

## 2. Database Configuration

Edit the database credentials in:

```text
assets/php/connect.php
```

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_CHARSET', 'utf8mb4');
```

There is no need to manually configure individual table names if the included database connection system handles the game/database selection.

---

## 3. Web Server Setup

Upload the project files to your web server.

### Requirements

* PHP 7.4 or higher
* MySQL/MariaDB
* PDO extension
* PDO MySQL driver
* `allow_url_fopen` enabled for URL imports in the List Converter

The `.sql` files do not need to be uploaded to the public web directory.

---

## 4. File Permissions

The web server must have read access to the PHP, CSS, JavaScript, and other application files.

If any feature requires temporary files or writable directories, ensure the web server has the appropriate write permissions.

---

# 📖 Usage Guide

## NativeDB Explorer

Choose the game you want to work with and open its corresponding NativeDB page.

### Search

Enter a native name, namespace, hash, or keyword from a native's comments.

For example:

```text
GET_PLAYER
```

or:

```text
PLAYER
```

or a native hash.

The search interface updates the native list without requiring a full page reload.

### Namespace Filtering

Use the namespace dropdown to restrict results to a specific namespace.

This is especially useful when searching large NativeDBs such as RDR2 or GTA5.

### View Native Details

Select a native to view its available information, including:

* Namespace
* Native name
* Hash
* Return type
* Parameters
* Comments
* Build information
* Additional game-specific hashes

### Copy Native Hash

Use the hash copy action to copy the native hash directly to your clipboard.

### Copy Native With Parameters

Copy the complete native call including its parameters.

Example:

```cpp
PLAYER::GET_PLAYER_PED_SCRIPT_INDEX(player)
```

### Copy Native Signature

Copy the native's type signature for use when implementing the function.

Example:

```cpp
PLAYER::GET_PLAYER_PED_SCRIPT_INDEX(Player player)
```

### Custom Parameters

Where supported, parameter values can be edited before copying the generated native call.

This makes it possible to quickly create a ready-to-use native invocation without manually replacing every parameter.

---

# 🔄 List Converter

Open:

```text
converter.php
```

### 1. Input

Paste your list into the input field or provide a URL.

Supported sources include:

* `.cpp`
* `.lua`
* `.json`
* `.ini`
* `.txt`
* Other supported text-based formats

### 2. Select Input Format

Choose the appropriate format or use:

```text
Auto Detect
```

### 3. Select Output Format

Choose the format you want to generate.

### 4. Convert

Click **Convert** to generate the converted list.

### 5. Copy or Download

Use the available actions to copy the converted data or download it as a file.

---

# ⚡ Script Generator

Open:

```text
creator.php
```

## 1. Choose a Template

Select the command type you want to generate:

* Looped Command
* Basic Command
* Player Command
* Vehicle Command

## 2. Fill In Command Details

### Command Name

The internal command identifier.

Example:

```text
godmode
```

### Display Name

The name displayed to the user.

Example:

```text
God Mode
```

### Description

A short description of what the command does.

### Command Prefix

An optional prefix can be used to construct command names.

For example:

```text
toggle
```

combined with:

```text
godmode
```

can produce:

```text
togglegodmode
```

## 3. Select Includes

Add the header files required by your implementation.

## 4. Add Custom Code

Enter the code that should be placed inside the generated command's implementation.

## 5. Generate

Click **Generate** to create the command source.

## 6. Copy or Download

Copy the generated source code or download it for use in your project.

### Example Generated Code

```cpp
#include "core/commands/LoopedCommand.hpp"
#include "game/backend/Self.hpp"

namespace YimMenu::Features
{
    class Godmode : public LoopedCommand
    {
        using LoopedCommand::LoopedCommand;

        virtual void OnTick() override
        {
            // Your custom code here
        }

        virtual void OnDisable() override
        {
            // Cleanup code here
        }
    };

    static Godmode _Godmode{"godmode", "God Mode", "Blocks all incoming damage"};
}
```

---

# 🎯 Supported Mod Menus

The Script Generator currently supports code generation for:

* **YimMenuV2** — YimMenu's updated codebase for GTA5 Enhanced
* **Helix** — RDR2 open-source/updated mod menu based on YimMenuV2 and HorseMenu
* **HorseMenu (Terminus)** — RDR2 open-source mod menu based on YimMenuV2
* **ChronixV2** — Alternative YimMenuV2 mod menu for GTA5 Enhanced

Additional mod-menu templates and codebases may be added in the future.

---

# 💡 Tips

* Use the NativeDB Explorer to quickly locate natives by name, hash, namespace, or comment.
* Copy the complete native signature when implementing a native in your project.
* Use the parameter information provided by the NativeDB when constructing native calls.
* Use the custom parameter editor to quickly generate calls with specific values.
* The List Converter is useful for converting ped, vehicle, object, native, and other hash lists between formats.
* Use the Script Generator to quickly scaffold new features for supported mod-menu projects.
* Each supported game has its own NativeDB while sharing the same overall toolkit.
* When working across different RAGE Engine games, always verify that a native exists in the NativeDB for the specific game you are targeting.

---

# 📊 NativeDB Coverage

The project currently contains **25,039 native functions** across six supported RAGE Engine games.

```text
Red Dead Redemption          3,496
Red Dead Redemption 2        7,132
Grand Theft Auto IV          2,630
Grand Theft Auto V           6,701
Midnight Club: Los Angeles   1,267
Max Payne 3                  3,813
────────────────────────────────
Total                       25,039
```

This collection brings native information from multiple Rockstar titles together into a single web-based toolkit.

---

# 🔧 Troubleshooting

## Database Connection Failed

Check the following:

* Database credentials in `assets/php/connect.php`
* MySQL/MariaDB is running
* The required database has been imported
* The database user has permission to access the database
* PHP PDO is enabled
* The PDO MySQL driver is installed

## NativeDB Is Empty

Verify that the correct NativeDB database has been imported for the game you are trying to use.

Each game has its own native dataset.

## Search Is Not Working

Check:

* PHP errors
* Database connectivity
* Browser developer-console errors
* That the native database contains records
* That JavaScript is loading correctly

## Converter URL Import Fails

Verify:

* `allow_url_fopen` is enabled
* The URL is publicly accessible
* The server can reach the URL
* The content is in a supported format

If URL importing is unavailable, paste the content directly into the converter.

## Script Generator Output Issues

Make sure:

* Required fields are filled in
* Command Name is provided
* Display Name is provided
* Required includes are selected
* Custom code does not contain syntax errors
* The selected template matches the mod-menu codebase you are targeting

---

# 📄 License

This project is for **educational purposes only**.

Use responsibly and in accordance with Rockstar Games' applicable terms of service.

---

# ⚠️ Redistribution

You are free to fork, modify, contribute to, and redistribute this repository as your own project.

All that is asked is that you **PLEASE keep the project FREE + OPEN SOURCED**.

There is no official Rockstar Games branding or copyrighted/trademarked material intended to be claimed as part of this project.

If you redistribute this project or create a derivative work, crediting this repository and its contributors would be greatly appreciated.

---

# 🤝 Contributing

Found a bug, incorrect native, missing data, or want to add a feature?

Feel free to:

* Open an issue
* Submit a pull request
* Improve existing tools
* Add NativeDB support
* Improve NativeDB data
* Add additional game support
* Improve converter functionality
* Add new script-generator templates
* Improve performance or usability

Contributions that expand support for additional **RAGE Engine games** are especially welcome.

---

## ⭐ Project Goal

The long-term goal of this project is to provide a centralized, free, open-source toolkit for working with **RAGE Engine native functions and development data across Rockstar Games titles**.

From classic RAGE Engine releases to newer games, the project aims to make native research, game development, list manipulation, and mod-menu development easier from a single location.
