# INSTALL
- composer install
- npm install
- php artisan migrate:refresh --seed
- php artisan storage:link

# STRUCTURES
- (x) Dashboard
- (x) Datatables
- (x) Sessions
- (x) File Manager
- (x) Managements
- (X) Administrative Apps
- Messages
- Notifications

# TO DO
- Generate Datatables
- Check Login For User Verified / Inactive
- Page Register, Login & Forgot Password

<!-- CONTROLLER CONSTRUCT -->
$this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
$this->middleware('permission:product-create', ['only' => ['create','store']]);
$this->middleware('permission:product-edit', ['only' => ['edit','update']]);
$this->middleware('permission:product-delete', ['only' => ['destroy']]);
