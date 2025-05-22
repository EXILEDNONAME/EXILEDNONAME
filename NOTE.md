# REQUIREMENT
- PHP Version 8.2.4 (php, file, glob, data, http, ftp, compress.zlib, compress.bzip2, https, ftps, zip, phar)
- Node.js v18.14.2

# INSTALL
- composer install
- npm install
- php artisan migrate:refresh --seed
- php artisan storage:link

- Copy .env.example. to .env
- Setting Database

# STRUCTURES
- (x) Dashboard
- (x) Datatables
- (x) Sessions
- (x) File Manager
- (x) Managements
- (X) Administrative Apps
- (x) Filter Relation Datatables
- Messages
- Notifications

# TO DO
- Selected Delete Save to Activities
- Page Invoices Menu Side
- Generator Simple Datatables
- Check Login For User Verified / Inactive
- Page Register, Login & Forgot Password

<!-- CONTROLLER CONSTRUCT -->
$this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
$this->middleware('permission:product-create', ['only' => ['create','store']]);
$this->middleware('permission:product-edit', ['only' => ['edit','update']]);
$this->middleware('permission:product-delete', ['only' => ['destroy']]);
