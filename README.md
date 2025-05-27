# 🕋 Umrah Travel Website – KBIH AS-SYAMIAH

This website is built using the following technologies:
- **Laravel** as the backend framework
- **MySQL** as the database
- **Tailwind CSS** for styling
- **Laravel Breeze** as the starter kit for authentication
- **Cloudinary** for image storage and management

---

## 🚀 How to Run This Project

1. **Clone or Download the Repository**  
   Open your terminal and run:
   ```bash
   git clone https://github.com/MichaelJD-MJD/Travel-Umroh.git
   cd Travel-Umroh
   ```

2. **Create .env File and Configure Cloudinary**  
   Copy .env.example to .env, then add the following Cloudinary configuration:
   ```env
   CLOUDINARY_URL=
   CLOUDINARY_CLOUD_NAME=
   CLOUDINARY_API_KEY=
   CLOUDINARY_API_SECRET=
   ```
   > 📌 Note: Please create an account at https://cloudinary.com to obtain your API key and secret.

3. **Install PHP Dependencies**  
   Run the following command:
   ```bash
   composer install
   ```

4. **Generate Application Key**  
   Run the command below to generate your Laravel app key:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seed the Database**  
   Set up the database by running:
   ```bash
   php artisan migrate
   php artisan migrate:fresh --seed
   ```

6. **Install Node.js Dependencies**  
   Install JavaScript dependencies:
   ```bash
   npm install
   ```

7. **Build Frontend Assets**  
   Compile the frontend assets:
   ```bash
   npm run build
   ```

8. **Start the Development Server**  
   Launch the Laravel development server:
   ```bash
   php artisan serve
   ```
   > ⚠️ Make sure XAMPP is running and MySQL is active.

9. **Login Credentials for Testing**  
   Use the following accounts to log in:

   **Admin Account:**
   ```
   Email: admin@assyamiah.com
   Password: admin123
   ```

   **Regular User Account:**
   ```
   Email: ahmad@example.com
   Password: password123
   ```

---

Feel free to open issues or contribute to the project!
