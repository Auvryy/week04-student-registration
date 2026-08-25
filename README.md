# ITST 302: Client-Server Technologies
## Week 4 Laboratory Activity: Student Registration System with Laravel Forms, Validation, and File Upload

### Course Information
* Course: ITST 302 (Client-Server Technologies)
* Week: Week 4
* Module: Module 1 (Client Requests and Form Processing)
* Activity: Mini Project 03 (Student Registration System)

---

## 1. Project Title
Student Registration System with Laravel Forms, Validation, and File Upload

---

## 2. Introduction
The Student Registration System is a web application built using Laravel to replace manual, paper-based student enrollment. In colleges and universities, collecting student information through physical forms often causes problems like lost files, duplicate student records, and spelling mistakes. This project solves those problems by giving students a digital form where they can enter their details and upload their profile picture.

Data validation is important in this project because it stops wrong or bad data from entering the database. When someone submits the form, the server checks if all required fields are filled out, if the email format is correct, if the student ID is already taken, and if the uploaded file is an actual image. In real-world enterprise applications like school portals, online banking, and government websites, registration systems are always the first step to create user accounts safely.

---

## 3. Objectives
During this activity, the following objectives were accomplished:
* Created HTML registration forms using Laravel Blade templates.
* Processed form data using Laravel controllers and resource routing.
* Added server-side validation rules to stop invalid submissions.
* Added flash messages to notify users after successful registration.
* Handled file uploads and stored images in Laravel Storage with a public link.
* Created a students table using Laravel database migrations.
* Created feature tests to verify form submission and validation.
* Maintained clean Git version control with meaningful commits.

---

## 4. Laravel Request Lifecycle
When a user registers a student, the request moves through several stages in Laravel before a response is sent back:

1. Browser: The user fills out the form, picks an image, and clicks submit. This sends an HTTP POST request to /students.
2. Routing: Laravel checks routes/web.php and matches the POST /students request to the store method in StudentController.
3. Controller: StudentController takes the incoming request and starts the process.
4. Validation: The controller runs validation rules on all fields. If any field fails, Laravel stops and sends the user back to the form with error messages.
5. Storage: If validation passes and a file is attached, Laravel saves the image to the storage/app/public/profile_pictures folder.
6. Model: The Student model is used to create a new record with the validated text data and the image path.
7. Database: Laravel inserts the new row into the students table in the database.
8. Response: The controller sends a redirect to the student profile page with a success flash message.

### Request Lifecycle Diagram

```
User (Browser)
      |
      v
 routes/web.php
      |
      v
StudentController
      |
      v
 Validation ($request->validate)
   /          \
(Fails)     (Passes)
  |             |
  v             v
Redirect Back  Laravel Storage (Upload Photo)
with Errors     |
                v
               Student Model (Eloquent)
                |
                v
               MySQL Database Table
                |
                v
               Redirect to Profile with Flash Message
```

---

## 5. Validation Rules
The following validation rules are used in the application:

| Field | Rules | Why It Is Important |
| :--- | :--- | :--- |
| student_id | required, unique | Stops duplicate student ID numbers from being saved in the database. |
| first_name | required, max:100 | Makes sure the student provides their first name and avoids extra long text. |
| middle_name| nullable, max:100 | Allows students without a middle name to submit while limiting length. |
| last_name | required, max:100 | Makes sure the student's family name is provided. |
| email | required, email, unique | Checks that the email is valid and has not been used by another student. |
| mobile_number | required, numeric | Makes sure only numbers are entered for contact numbers. |
| gender | required | Makes sure a gender option is chosen. |
| date_of_birth | required, date | Ensures a valid date is submitted. |
| program | required | Makes sure the student selects an academic course. |
| year_level | required | Makes sure the student picks their current year level. |
| address | required | Collects home address information for student records. |
| profile_picture | required, image, mimes:jpg,jpeg,png, max:2048 | Makes sure only safe images under 2MB are uploaded to the server. |

---

## 6. Database Design

### Entity Relationship Diagram (ERD)

```
+---------------------------------------------------------+
|                        STUDENTS                         |
+---------------------------------------------------------+
| id                  : BIGINT (Primary Key, Auto Inc)    |
| student_id          : VARCHAR(50) (Unique)              |
| first_name          : VARCHAR(100)                      |
| middle_name         : VARCHAR(100) (Nullable)           |
| last_name           : VARCHAR(100)                      |
| email               : VARCHAR(150) (Unique)             |
| mobile_number       : VARCHAR(20)                       |
| gender              : VARCHAR(20)                       |
| date_of_birth       : DATE                              |
| program             : VARCHAR(100)                      |
| year_level          : VARCHAR(50)                       |
| address             : TEXT                              |
| profile_picture     : VARCHAR(255)                      |
| created_at          : TIMESTAMP                         |
| updated_at          : TIMESTAMP                         |
+---------------------------------------------------------+
```

### Table Structure
* Table Name: students
* Primary Key: id
* Unique Keys: student_id, email
* Engine: InnoDB (MySQL) / SQLite

---

## 7. Flowchart
The flowchart below shows what happens when someone registers:

```
[Start: User Opens Registration Page]
                 |
                 v
        [Fill in the Form]
                 |
                 v
       [Select Profile Photo]
                 |
                 v
      [Click Submit Button]
                 |
                 v
       <Is Data Valid?>
        /            \
     (No)            (Yes)
      |                |
      v                v
[Show Error      [Save Photo to Storage]
 Messages on           |
 Form Fields]          v
      |          [Insert Record to Database]
      |                |
      |                v
      |          [Set Success Flash Message]
      |                |
      +---------> [Redirect to Profile Page]
                       |
                       v
                     [End]
```

---

## 8. Screenshots

-- Registration Form --
-- Validation Errors on Form Submission --
-- Successful Registration Submission --
-- Flash Message Notification Banner --
-- Uploaded Profile Picture Display --
-- Database Table Records --
-- Student Profile Details Page --
-- Project Directory Structure in Editor --
-- Public GitHub Repository --

---

## 9. Problems Encountered
1. Profile pictures showed broken images after upload: When I first uploaded an image and went to the student profile page, the image was not loading. I found out that files stored in storage/app/public cannot be seen directly by the browser until a symbolic link is created.
2. All form text disappeared when validation failed: When I submitted the form with one missing field, all other fields I already typed became empty. This was annoying because I had to type everything again.
3. Uploaded picture was not being saved: When submitting the form, the picture field was giving a required error even though I chose a file. This happened because the HTML form tag was missing the multipart attribute.

---

## 10. Solutions
1. Solved the image display problem by running `php artisan storage:link` in the terminal. This linked the public folder to the storage folder so images load properly with `asset('storage/' . $student->profile_picture)`.
2. Solved the disappearing text problem by adding `value="{{ old('field_name') }}"` to every input field in the Blade template. Now, when validation fails, Laravel keeps what was already typed.
3. Solved the file upload issue by adding `enctype="multipart/form-data"` to the `<form>` tag in `create.blade.php`. This allows the browser to send binary image files to the server.

---

## 11. Reflection
During this laboratory activity, I learned a lot about how web applications handle user input and keep data safe. Form validation is one of the most important parts of web development because you can never trust what a user types into a form. If a form does not have validation, users might enter incomplete information, wrong email formats, or even malicious files that can break the whole website.

One of the biggest lessons I learned is the difference between client-side validation and server-side validation. In the beginning, it is easy to think that adding the required attribute in HTML is enough. But client-side validation can easily be turned off or bypassed by anyone using browser developer tools. Server-side validation in Laravel is what actually protects the database because the server checks every field before running any database query.

I also learned how file uploads work in Laravel. Uploading files is risky if not done carefully. If a website allows any file to be uploaded, someone could upload a harmful script and run it on the server. By using Laravel validation rules like image, mimes:jpg,jpeg,png, and max:2048, we make sure that only real images with a safe file size are accepted. Storing the files inside the storage folder and using a storage link also keeps the project organized and secure.

In real-world software, user registration is used everywhere. Whether it is a school portal, an online store, a bank, or a social network, every system needs a way to register users and store their profile information correctly. Learning how Laravel routes requests, validates data, saves records to the database, and shows flash messages gives me a strong foundation for building bigger web projects in the future.

---

## 12. References
* Laravel. (2026). Validation. Laravel Documentation. https://laravel.com/docs/validation
* Laravel. (2026). File Storage. Laravel Documentation. https://laravel.com/docs/filesystem
* Laravel. (2026). Blade Templates. Laravel Documentation. https://laravel.com/docs/blade
* Mozilla Developer Network. (2026). Sending form data. MDN Web Docs. https://developer.mozilla.org/en-US/docs/Learn/Forms/Sending_and_retrieving_form_data
* MySQL. (2026). MySQL 8.0 Reference Manual. Oracle. https://dev.mysql.com/doc/refman/8.0/en/
