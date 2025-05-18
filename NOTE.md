# INSTALL
- composer install
- npm install
- php artisan migrate:refresh --seed
- php artisan storage:link

# STRUCTURES
- Dashboard
- Messages
- Notifications
- Datatables
- (x) Sessions

# TO DO
- (x) File Manager
- Managements
- Administrative Apps

<!-- CONTROLLER CONSTRUCT -->
$this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
$this->middleware('permission:product-create', ['only' => ['create','store']]);
$this->middleware('permission:product-edit', ['only' => ['edit','update']]);
$this->middleware('permission:product-delete', ['only' => ['destroy']]);
