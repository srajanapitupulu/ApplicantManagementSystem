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
- **Database:** SQLite
- **Styling:** TailwindCSS and Vanilla CSS

---

## 📦 Installation & Setup

### Prerequisites
- PHP 8.1+  
- Composer  

### Steps
1. **Clone the repository**
   using HTTPS:
   ```bash
   git clone https://github.com/srajanapitupulu/ApplicantManagementSystem.git
   cd ApplicantManagementSystem
   ```

   Using SSH:
   ```bash
   git clone git@github.com:srajanapitupulu/ApplicantManagementSystem.git
   cd ApplicantManagementSystem
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Set up environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Update your `.env` file with database credentials:
   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=database/database.sqlite
   DB_FOREIGN_KEYS=true
   ```

4. **Run migrations & seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Link storage for uploads**
   ```bash
   php artisan storage:link
   ```

6. **Serve the application**
   ```bash
   php artisan serve
   ```

   App will run at: `http://127.0.0.1:8000`

7. **Login Credentials**
   ```bash
   username: admin@demo.com
   password: password123
   ```
---

## 📊 Project Structure
```
ApplicantManagementSystem/
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

## 📧 Contact
For any questions or issues regarding this project, please reach out to:  
**Samuel Napitupulu** – [srajanapitupulu@example.com]  
