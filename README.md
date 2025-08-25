# Applicant Management System

An **Applicant Management System** built with **Laravel** that streamlines the applicant evaluation process.  
The system has two main parts:  

- **Applicant Portal** – where applicants can complete assigned tasks and submit their work.  
- **Admin Dashboard** – where administrators can manage tasks, applicants, and track their progress.  

---

## 🚀 Features

### Applicant Portal (Front-End)
- **Welcome Screen**
  - Dynamic applicant name display.
  - Time limit notice: *8 hours (+1 hour extension)*.
  - "Start Test" button starts the timer and redirects to the next step.
- **Task Instructions Screen**
  - Displays task details assigned by admin.
  - Navigation with **Next** button.
- **Submission Screen**
  - Input fields for Git repo link or file uploads.
  - Text area for notes/comments.
  - **Prev** button to return to instructions.
  - **Submit** button to confirm submission.
- **Submission Confirmation**
  - Final confirmation message: *"You've successfully submitted your evaluation."*
- **Persistent Progress**
  - The portal remembers the applicant’s current stage, even after page refresh.

### Admin Dashboard
- **Authentication**
  - Simple login (hard-coded or configurable).
- **Task Management**
  - Create, view, edit, and delete tasks.
  - Store multiple tasks with title & description.
- **Applicant Management**
  - Add new applicants (email, first name, last name).
  - Assign tasks via dropdown selection.
  - Generate & copy applicant test URL.
  - Track applicant progress:
    - Email Sent
    - Under Review
    - Submitted
  - Review applicant submissions from the dashboard.

---

## 🛠️ Tech Stack
- **Backend:** Laravel (PHP 8+ recommended)  
- **Frontend:** Blade Templates / Vue.js (optional)  
- **Database:** MySQL / MariaDB  
- **Authentication:** Laravel Auth (simple login for Admin)  
- **Styling:** TailwindCSS / Bootstrap (developer’s choice)  

---

## 📦 Installation & Setup

### Prerequisites
- PHP 8.1+  
- Composer  
- MySQL or MariaDB  
- Node.js & NPM/Yarn  

### Steps
1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/applicant-management-system.git
   cd applicant-management-system
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Set up environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Update your `.env` file with database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=ams_db
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

4. **Run migrations & seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Serve the application**
   ```bash
   php artisan serve
   ```

   App will run at: `http://127.0.0.1:8000`

---

## 📊 Project Structure
```
applicant-management-system/
├── app/            # Core application code
├── database/       # Migrations & seeders
├── resources/      # Blade views, frontend assets
├── routes/         # Web routes
├── public/         # Public assets
└── tests/          # Unit & feature tests
```

---

## ✅ Deliverables
- Complete, runnable Laravel application.
- Fully functional **Applicant Portal** & **Admin Dashboard**.
- Repository includes this **README.md** with setup instructions.
- Code structured for maintainability and clarity.

---

## ⚠️ Notes (if incomplete)
If certain features are not implemented, please document them here with reasons (time, complexity, dependencies, etc.).

---

## 📧 Contact
For any questions or issues regarding this project, please reach out to:  
**Your Name** – [your.email@example.com]  
