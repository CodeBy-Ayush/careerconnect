# CareerConnect SaaS 🚀

CareerConnect is a modern intelligent job and course matching platform built with Laravel 12.
The platform automates career discovery by matching users with relevant jobs and learning opportunities based on their professional skills, interests, and career goals.

---

# ✨ Features

## 🔍 Smart Matching Engine

* Automatically recommends jobs and courses based on user skills and interests.
* Personalized career suggestions for every user.

## 🔔 Real-Time Notifications

* In-app dashboard notifications for matched opportunities.
* Unread notification system with notification center.

## 📧 Automated Email Alerts

* SMTP-powered email alerts using Laravel Notifications & Queues.
* Instant alerts when new matching jobs or courses are posted.

## 👨‍💼 Admin Dashboard

* Manage jobs, courses, users, and applications.
* Monitor platform activity and analytics.

## 📄 Resume Management

* Upload and manage resumes.
* Track job application status.

## 💾 Saved Opportunities

* Bookmark jobs and courses for later access.

## 📱 Responsive UI

* Fully responsive modern interface built with Bootstrap 5.
* Optimized for desktop, tablet, and mobile devices.

----

# 🛠️ Tech Stack

| Technology      | Description                        |
| --------------- | ---------------------------------- |
| Laravel 12      | Backend Framework                  |
| PHP 8.3+        | Server-side Language               |
| Bootstrap 5     | Frontend UI Framework              |
| Blade Templates | Laravel Templating Engine          |
| MySQL           | Relational Database                |
| Laravel Queue   | Background Job Processing          |
| SMTP / Mailtrap | Email Notification System          |
| Alpine.js       | Lightweight Frontend Interactivity |

----

# 📂 Project Architecture

The project follows Laravel MVC architecture with:

* Controllers
* Models
* Blade Views
* Service Layer
* Middleware
* Notifications
* Queues
* Role-Based Access Control

---

# 🚀 Installation Guide

## 1️⃣ Clone Repository

```bash
git clone https://github.com/CodeBy-Ayush/careerconnect.git
cd careerconnect
```

---

## 2️⃣ Install Dependencies

```bash
composer install
npm install
npm run dev
```

---

## 3️⃣ Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

---

## 4️⃣ Configure Database

Update `.env` file:

```env
DB_DATABASE=careerconnect
DB_USERNAME=root
DB_PASSWORD=
```

---

## 5️⃣ Run Migrations & Seeders

```bash
php artisan migrate --seed
```

---

## 6️⃣ Create Storage Link

```bash
php artisan storage:link
```

---

## 7️⃣ Run Queue Worker

```bash
php artisan queue:work
```

---

## 8️⃣ Start Development Server

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

---

# 🔐 Security Features

* Role-Based Access Control (RBAC)
* CSRF Protection
* Secure File Upload Validation
* Middleware Protected Routes
* Form Validation using Laravel Requests
* Password Hashing
* Secure Authentication System

---

# 📧 Email Notification System

CareerConnect uses Laravel Notifications and SMTP services to send:

* Job Match Alerts
* Course Match Alerts
* Application Updates
* Deadline Reminders

---

# 🧠 Smart Matching Workflow

```text
Admin Posts Job/Course
        ↓
System Checks User Skills & Interests
        ↓
Matching Users Identified
        ↓
Dashboard Notification Created
        ↓
Email Alert Sent
```

---

# 👨‍💻 User Roles

## Candidate

* Manage profile
* Upload resume
* Apply for jobs
* Save opportunities
* Receive notifications

## Admin

* Manage jobs
* Manage courses
* Manage users
* Track applications
* Monitor analytics

---

# 📸 Screenshots

<img width="1906" height="919" alt="image" src="https://github.com/user-attachments/assets/e77f6ce5-94d4-4eee-b3fd-b5d3d3c02685" />


---

# 🌐 Future Improvements

* AI-based recommendation engine
* Real-time chat system
* Resume scoring system
* Advanced analytics dashboard
* REST API integration
* Mobile application support

---

# 💡 Author

## Ayush Kumar

Full Stack Laravel Developer

GitHub:

```text
https://github.com/CodeBy-Ayush
```

LinkedIn:

```text
https://www.linkedin.com/in/ayush111/
```

---

# 📜 License

This project is developed for educational and portfolio purposes.
