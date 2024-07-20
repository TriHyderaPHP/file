# Namespace: Trihydera\File

## Class: FileInfo

Retrieves information about files in a directory, including file details like size, hash, and modification time.

### Constructor

#### `__construct($dir)`

- **Description:** FileInfo constructor.
- **Parameters:**
  - `$dir` (string): The directory path to retrieve file information from.

### Methods

#### `getInfo()`

- **Description:** Get information about files in the directory.
- **Returns:** An array containing details of files in the directory.

#### `listFilesRecursively($dir, &$details)`

- **Description:** Recursively list files in a directory and gather details.
- **Parameters:**
  - `$dir` (string): The directory path to list files from.
  - `$details` (array): Reference to an array to store file details.

#### `formatSize($bytes)`

- **Description:** Format file size in human-readable format.
- **Parameters:**
  - `$bytes` (int): The size of the file in bytes.
- **Returns:** The formatted file size with appropriate units.

---

## Class: FileTypes

Defines different file types along with their categories and purposes.

### Properties

#### `$types`

- **Description:** Array containing file types with their categories and purposes.
- **Type:** array
- **Values:**
  - `exe`: Windows - Executable file
  - `msi`: Windows - Windows Installer Package
  - `jpg`: Image - JPEG Image
  - `png`: Image - PNG Image
  - `txt`: Text - Plain Text File
  - `pdf`: Document - PDF Document
  - `doc`: Document - Microsoft Word Document
  - `xlsx`: Document - Microsoft Excel Spreadsheet
  - `zip`: Archive - Compressed Archive
  - `mp3`: Audio - MP3 Audio File

---

## Class: JsonFile

Handles reading and writing JSON data to files.

### Methods

#### `read($file)`

- **Description:** Read JSON data from a file.
- **Parameters:**
  - `$file` (string): The path to the JSON file.
- **Returns:** The decoded JSON data.
- **Throws:** `\Exception` If the file path is invalid.

#### `write($file, $data)`

- **Description:** Write JSON data to a file.
- **Parameters:**
  - `$file` (string): The path to the JSON file.
  - `$data` (array): The data to be encoded as JSON and written to the file.
- **Throws:** `\Exception` If the file path is invalid.