# 👨‍💻 Mini Admin System

A clean and modular Laravel 11 project for managing developer data, built with best practices such as the Repository, Service, and Interface patterns. The system supports importing developers via Excel, status management with Enums, and clean API responses using helpers.

---

## 🧩 Features

- ✅ Manage developers with full CRUD operations
- ✅ Upload, update, and delete logos using a reusable Trait
- ✅ Import developers via Excel (`.xlsx`) files
- ✅ Status management (Active / Inactive) using `Enum` class
- ✅ Laravel Form Request validation for all forms
- ✅ Clean API response formatting with a custom `ResponseHelper`
- ✅ Modular code structure using:
    - Repository & Interface pattern
    - Service layer
    - Console Commands to auto-generate Interfaces, Repositories, and Services

---

## 🛠 Tech Stack

- **Laravel 11**
- **PHP 8.3**
- **maatwebsite/excel** for Excel file imports
- **Enum Handling** for developer statuses
- **Custom Traits** for image upload
- **Repository / Service / Interface Pattern**
- **Artisan Console Commands**

---

## 📁 Folder Structure Highlights

```bash
app/
├── Console/Commands/
│   ├── MakeInterfaceCommand.php
│   ├── MakeRepositoryCommand.php
│   └── MakeServiceCommand.php
├── Enums/
│   └── DeveloperStatus.php
├── Helpers/
│   └── ResponseHelper.php
├── Http/
│   ├── Controllers/DeveloperController.php
│   ├── Requests/StoreDeveloperRequest.php
│   └── Requests/UpdateDeveloperRequest.php
├── Interfaces/
│   └── DeveloperInterface.php
├── Repositories/
│   └── DeveloperRepository.php
├── Services/
│   └── DeveloperService.php
├── Traits/
│   └── ImageUploadTrait.php
⚙️ Installation
Clone the repo

git clone https://github.com/Muhammed2024Salama/Mini_Admin_System
cd Mini_Admin_System
Install dependencies

composer install
npm install && npm run dev
Environment setup

cp .env.example .env
php artisan key:generate
Run migrations

php artisan migrate
Start the server

php artisan serve
🔁 Import Developers from Excel
You can upload .xlsx files containing developer data. The system will:

Validate and format the data

Avoid inserting duplicates

Save uploaded images

Assign default Inactive status if not provided

🧪 Developer Status Enum

enum DeveloperStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}
Used to manage and validate developer status across the app.

🖼️ Image Upload Trait

use App\Traits\ImageUploadTrait;

$this->uploadImage($file, 'uploads/developers');
Reusable trait to handle storing and replacing logos.

🧰 Custom Artisan Commands
Generate boilerplate code quickly:

php artisan make:interface DeveloperInterface
php artisan make:repository DeveloperRepository
php artisan make:service DeveloperService
📎 License
This project is open-sourced under the MIT license.

🙋 Author
Muhammed Salama
🔗 LinkedIn
📧 https://www.linkedin.com/in/mohamed2050/
