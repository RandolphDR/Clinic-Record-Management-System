# Clinic Record Management System

This is a fully functional web application developed using HTML, CSS, JavaScript, PHP, and MySQL. It allows users to securely create accounts, log in, and manage patient records. The features include:

- **Account Creation & Login**: Secure user registration and authentication.
- **Patient Record Management**: Add, view, edit, update, and delete patient records.
- **Data Security**: Unauthorized access to the admin page is restricted. If you try to access the admin page directly without logging in, you will be automatically logged out and prevented from accessing patient data.

### Features
- **Account Management**: Users can securely create accounts and log in.
- **Patient Record Management**: After login, the admin can securely add, view, edit, update, and delete patient records, including personal details such as name, age, gender, contact information, and medical history.
- **Data Security**: If you try to access the admin page (e.g., `http://localhost:3000/web/admin.php`) without being logged in, you will be logged out automatically, ensuring patient data remains secure.
- **Data Integrity**: All user and patient data are securely stored in MySQL.

### Installation & Setup

1. **Download the ZIP file** of the project from the repository.
   
2. **Extract the ZIP file**:
   - Extract the contents inside the `htdocs` directory of your XAMPP installation (typically located at `C:\xampp\htdocs`).

3. **Set up the database**:
   - Open **phpMyAdmin** by navigating to `http://localhost/phpmyadmin` in your browser.
   - Create a new database named `Clinic_Management_System_DB`.
   - Import the database schema:
     - The SQL file is included with the ZIP file. Open the file, copy its contents, and paste it into the SQL tab of your new database in phpMyAdmin. Run the query to create the necessary tables (`Administrator_Table` and `Patient_Records_Table`).

4. **Configure the environment**:
   - Make sure you have **XAMPP** installed, including **PHP** and **MySQL**.
   - If needed, adjust the database connection settings in the project (e.g., in `config.php`) to match your local MySQL configuration.

5. **Run the application**:
   - After extracting the files to `htdocs`, open your browser and go to `http://localhost:3000/index.php` to access the login page.

### Usage
1. **Create an Account**: On the login page, create a new user account.
2. **Login**: After account creation, log in using your credentials.
3. **Access the Admin Page**: Once logged in, you will have access to the admin page (`http://localhost:3000/web/admin.php`), where you can securely add, view, edit, update, and delete patient records.
   - **Note**: Directly accessing the admin page without logging in (e.g., via `http://localhost:3000/web/admin.php`) will log you out and deny access to the system.

### Credits
- **Developed by**: RandolphDR and team.
- **Course**: Successfully defended in the Database Administration course, showcasing our ability to design and implement a comprehensive system.

### License
This project is licensed under the MIT License.
