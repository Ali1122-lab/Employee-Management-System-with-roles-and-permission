

# Step 1: Clone the repository
git clone git@github.com:Ali1122-lab/Employee-Management-System-with-Roles-and-Permissions.git

# Step 2: Move into the project directory
cd Employee-Management-System-with-Roles-and-Permissions

# Step 3: Install Composer dependencies
composer install

# Step 4: Copy .env file and generate app key
cp .env.example .env
php artisan key:generate

# Step 5: Configure your database in the .env file
# DB_DATABASE=your_db_name
# DB_USERNAME=your_username
# DB_PASSWORD=your_password

# Step 6: Run migrations (and optionally seed data)
php artisan migrate
# php artisan db:seed

# Step 7: Install NPM dependencies and compile frontend assets
npm install && npm run dev

# Step 8: Start the Laravel development server
php artisan serve





Additional Artisan Commands
# Cache routes, config, views
php artisan route:cache
php artisan config:cache
php artisan view:cache

# Clear cached data
php artisan optimize:clear
