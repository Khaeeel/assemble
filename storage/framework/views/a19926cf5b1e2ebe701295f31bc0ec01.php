<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Barangay Daang Bakal Health Center</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #AEC4F5;
      display: flex;
    }

    /* Sidebar */
    .sidebar {
      width: 250px;
      background-color: #ffffff;
      height: 100vh;
      padding: 20px;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
      font-family: 'Poppins', sans-serif;
      align-items: center;
    }

      .sidebar .nav-link {
        color: #103D87; /* this sets the font color */
      }

    .nav-link {
      display: block;
      padding: 10px 15px;
      color: #333;
      margin-bottom: 10px;
      border-radius: 8px;
      text-decoration: none;
    }
/* Eto yong hover dun sa may sidebar*/
    .nav-link.active,
    .nav-link:hover {
      background-color:rgb(149, 173, 252);
      color: white;
    }

    /* Main content */
    .main {
      flex: 1;
      padding: 20px;
    }

    .topbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .searchbar input {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      width: 300px;
    }

    .user-info {
      font-size: 14px;
    }

    .overview-title {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .flex-row {
      display: flex;
      gap: 20px;
    }

    .flex-col {
      flex: 1;
    }

    .stat-card {
      flex: 1;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      text-align: center;
    }

    .stat-card h4 {
      margin: 0;
      color: #555;
    }

    .stat-card h2 {
      margin-top: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      border-bottom: 1px solid #eee;
      text-align: left;
       background-color: #CDE0FF;
    }

    th {
      background-color:rgb(255, 255, 255);
    }
/* Eto yong nakahighlight sa choosen sidebar*/
.nav-link.active {
    font-weight: bold;
    background-color:#103D87 ;
}
/* Eto yong dun sa may Patient Health Records Overview*/
.overview-title {
    font-family: 'Poppins', sans-serif;
    font-weight: 600; /* Semi-bold */
    font-size: 32px;
    color: #103D87;
}
/* eto yong sa mga buttons dun sa action */
.action-btn {
  padding: 6px 12px;
  margin-right: 5px;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  color: white;
}

.view {
  background-color: #103D87; /* blue */
}

.edit {
  background-color: #103D87; /* orange */
}

.add {
  background-color: #103D87; /* green */
}
.sidebar-logo {
    width: 60px;
  height: auto;
  display: block;
  margin: 0 auto 10px auto;
}
.sidebar h2 {
  font-family: 'Poppins', sans-serif;
  color: #103D87;
  font-weight: 600;
  font-size: 18px;
  margin: 0;
  line-height: 1.2;
}

.sidebar-header {
  display: flex;
  align-items: center;
  padding: 10px;
  gap: 10px; /* Adds space between logo and text */
}
/* Modal backdrop container */
.modal {
  display: none; /* Hidden by default */
  position: fixed;
  z-index: 999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.6);
  align-items: center;
  justify-content: center;
}

/* Modal content box (you already had this part mostly) */
.modal-content {
  border-radius: 8px;
  padding: 20px 30px;
  width: 90%;
  max-width: 600px;
  max-height: 90vh;
  font-family: 'Segoe UI', sans-serif;
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 10px;
  overflow-y: auto;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

/* Header */
.modal-content h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #123A63;
}

/* Form fields */
.modal-content input,
.modal-content textarea {
  width: 100%;
  padding: 10px;
  margin: 8px 0 16px 0;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 16px;
}

/* Placeholders */
.modal-content input::placeholder,
.modal-content textarea::placeholder {
  color: #999;
}

.modal-content label {
  display: block;
  margin-bottom: 4px;
  font-weight: 600;
  color: #123A63;
}

/* Submit button */
.btn-submit {
  background-color: #123A63;
  color: white;
  padding: 12px 24px;
  border-radius: 8px;
  border: none;
  cursor: pointer;
  /* Other styles specific to Submit */
}
/* Add button */
.add-btn {
  width: 20%;
  padding: 2px;
  background-color: #123A63;
  color: white;
  font-size: 16px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
}

.add-btn:hover {
  background-color: #0f2e4e;
}

/* Optional note */
.optional-note {
  font-size: 12px;
  color: #888;
  margin-top: -12px;
  margin-bottom: 16px;
}

/* Close button */
.close {
  position: absolute;
  top: 12px;
  right: 20px;
  font-size: 24px;
  cursor: pointer;
  color: #888;
}

.close:hover {
  color: #333;
}
.alert-success {
  background-color: #d4edda;
  color: #155724;
  padding: 12px;
  border-radius: 6px;
  margin-bottom: 16px;
  border: 1px solid #c3e6cb;
}
/* eto yong sa may Age dun sa form kasi may dropdown so tinanggal ko eto yong css nun */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
/* ETO YONG SA CONFIRMATION NUNG SA ADD ANG EDIT BUTTON BAGO ADD*/
.modal-content.confirm-box {
  background-color: #fff;
  border-radius: 10px;
  padding: 30px;
  width: 90%;
  max-width: 400px;
  text-align: center;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  animation: fadeInScale 0.3s ease-out;
}

/* Align confirm buttons */
.confirm-actions {
  display: flex;
  justify-content: center;
  gap: 15px;
  margin-top: 20px;
}

/* Yes button */
.confirm-yes {
  background-color: #103D87;
  color: white;
  padding: 10px 20px;
  font-weight: 600;
  border-radius: 6px;
  font-size: 16px;
}

/* No button */
.confirm-no {
  background-color: #e4e8f3;
  color: #333;
  padding: 10px 20px;
  font-weight: 600;
  border-radius: 6px;
  font-size: 16px;
}

/* Entrance animation */
@keyframes fadeInScale {
  from {
    opacity: 0;
    transform: scale(0.85);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}



/* eto yong sa page */
.pagination-wrapper {
  margin-top: 20px;
  text-align: center;
}

.pagination {
  display: inline-flex;
  border: 1px solid #103D87;
  border-radius: 4px;
  overflow: hidden;
}

.pagination-button, .pagination-page {
  padding: 8px 16px;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  text-decoration: none;
  display: inline-block;
  border: none;
  cursor: pointer;
}

.pagination-button {
  color: #103D87;
  background-color: white;
}

.pagination-button:hover:not(.disabled) {
  background-color: #e6eefc;
}

.pagination-button.disabled {
  color: #999;
  background-color: #f0f0f0;
  cursor: not-allowed;
  pointer-events: none;
}

.pagination-page.current {
  background-color: #103D87;
  color: white;
  font-weight: bold;
}

/* Style the select element */
/*  eto yong CSS sa gender na drop down at sa visit purpose,gender and medical diagnosis*/
#gender, #visit_purpose, #medical_diagnosis,
#editGender, #editVisitPurpose, #editMedicalDiagnosis  { 
  width: 100%;
  padding: 10px 12px;
  border: 1.5px solid #103D87; /* dark blue border */
  border-radius: 6px;
  background-color: #fff;
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  color: #103D87;
  cursor: pointer;
  transition: border-color 0.3s ease;
  appearance: none; /* removes default arrow */
  background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20width%3D%2210%22%20height%3D%227%22%20viewBox%3D%220%200%2010%207%22%20xmlns%3D%22http://www.w3.org/2000/svg%22%3E%3Cpath%20d%3D%22M0%200l5%207%205-7z%22%20fill%3D%22%23103D87%22/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 12px center;
  background-size: 10px 7px;
  box-sizing: border-box;
  margin-bottom: 16px; /* space below */
}

#editVisitPurpose:focus, #editMedicalDiagnosis:focus {
  outline: none;
  border-color: #0f2e4e;
  box-shadow: 0 0 5px rgba(16, 61, 135, 0.5);
}
/* Dropdown sa gender both add and eddit reocrd */
#gender:focus, #visit_purpose:focus,#medical_diagnosis:focus {
  outline: none;
  border-color: #0f2e4e;
  box-shadow: 0 0 5px rgba(16, 61, 135, 0.5);
}

#editGender:focus, #editVisitPurpose:focus, #editMedicalDiagnosis:focus {
  outline: none;
  border-color: #0f2e4e;
  box-shadow: 0 0 5px rgba(16, 61, 135, 0.5);
}

/* The wrapper for other purpose input */
#otherPurposeWrapper {
  margin-top: -8px; /* slightly closer */
  margin-bottom: 16px;
}

/* Text input for other purpose */
#other_purpose {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 16px;
  font-family: 'Segoe UI', sans-serif;
  box-sizing: border-box;
}


select#gender:focus {
  outline: none;
  border-color: #0f2e4e;
  box-shadow: 0 0 5px rgba(16, 61, 135, 0.5);
}

/* Style options (optional) */
select#gender option {
  font-weight: normal;
  color: #103D87;
}

.height-weight-row {
  display: flex;
  justify-content: space-between;
}

.height-weight-row label,
.height-weight-row input {
  width: 48%; /* about half, with some margin */
  box-sizing: border-box;
}

.height-weight-row input {
  padding: 0.4rem;
  font-size: 1rem;
}


.input-group {
  flex: 1;            /* both inputs take equal space */
  display: flex;
  flex-direction: column;
}

.input-group input {
  width: 100%;        /* input fills container */
  box-sizing: border-box;
  padding: 0.4rem;
  font-size: 1rem;
}
/* ADD MODAL */
.add-modal .modal-content {
  background-color: #fff;
  padding: 20px 30px;
  border-radius: 8px;
  width: 90%;
  max-width: 600px;
  max-height: 90vh;
  overflow-y: auto;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
  font-family: 'Segoe UI', sans-serif;
}

/* EDIT MODAL */
.edit-modal .modal-content {
  background-color:rgb(255, 255, 255);
  padding: 20px 30px;
  border-radius: 8px;
  width: 90%;
  max-width: 600px;
  overflow-y: auto;
  font-family: 'Segoe UI', sans-serif;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

/* VIEW MODAL */
.view-modal .modal-content {
  background-color: #f4f8ff;
  padding: 20px 30px;
  border-radius: 8px;
  width: 90%;
  max-width: 500px;
  font-family: 'Segoe UI', sans-serif;
  overflow-y: auto;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}
.view-modal .modal-content p {
  margin: 8px 0;
}

.view-btn, .edit-btn {
  padding: 6px 12px;
  font-family: 'Poppins', sans-serif;
  font-size: 14px;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  color: white;
  margin-right: 5px;
}

.view-btn {
  background-color: #103D87; /* or a slightly different blue */
}

.edit-btn {
  background-color: #1A5DAB; /* a slightly different blue if you want */
}


#viewOtherPurposeBlock,
#viewOtherDiagnosisBlock {
  display: none;
}

.view-records-container {
  background-color: #ffffff;
  border-radius: 12px;
  box-shadow: 0 2px 10px rgba(0,0,0,0.05);
  padding: 24px;
  max-width: 800px;
  margin: 0 auto;
  font-family: 'Segoe UI', sans-serif;
}

.view-records-header {
  font-size: 28px;
  font-weight: 600;
  color: #103D87;
  margin-bottom: 20px;
  border-bottom: 2px solid #f0f0f0;
  padding-bottom: 8px;
}

.record-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: start;
  gap: 10px;
  margin-bottom: 12px;
  padding: 8px 0;
  border-bottom: 1px solid #eee;
}

.record-label {
  color: #5e6d81;
  font-weight: 500;
  font-size: 15px;
}

.record-value {
  font-weight: 600;
  color: #103D87;
  font-size: 15px;
  word-wrap: break-word;
}


.choices__inner {
  padding: 10px 12px;
  border: 1.5px solid #103D87;
  border-radius: 6px;
  background-color: #fff;
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  color: #103D87;
  cursor: pointer;
  transition: border-color 0.3s ease;
}
/* eto yong design dus visit purpose na nakakapagselect ng multiple*/
.choices__inner:focus, 
.choices__list--dropdown, 
.is-focused .choices__inner {
  border-color: #0f2e4e;
  box-shadow: 0 0 5px rgba(16, 61, 135, 0.5);
}

.choices__list--multiple .choices__item {
  background-color: #103D87;
  color: white;
  border-radius: 12px;
  padding: 5px 10px;
  margin: 4px 4px 0 0;
  font-size: 14px;
  font-weight: 500;
}

.choices__item--selectable.is-highlighted {
  background-color: #AEC4F5;
  color: #103D87;
}

.choices[data-type*="select-multiple"] .choices__button {
  color: white;
  border-left: 1px solid rgba(255,255,255,0.3);
}

.choices[data-type*="select-multiple"] .choices__button:hover {
  background-color: #0f2e4e;
}

.choices__placeholder {
  color: #aaa;
}



/* Overlay */
.modal-delete {
  display: none;
  position: fixed;
  z-index: 9999;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4);
  justify-content: center;
  align-items: center;
  font-family: sans-serif;
}

/* Modal box */
.modal-delete-content {
  background-color: #fff;
  padding: 30px;
  border-radius: 10px;
  max-width: 480px;
  width: 90%;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  position: relative;
  text-align: left;
}

/* Close button */
.modal-delete-close {
  position: absolute;
  top: 15px;
  right: 20px;
  font-size: 22px;
  cursor: pointer;
  color: #888;
}

/* Header */
.modal-delete-content h2 {
  color: #e74c3c;
  text-align: center;
  margin-bottom: 20px;
}

/* Message */
#deletePatientMessage {
  font-size: 15px;
  color: #333;
  line-height: 1.5;
  margin-bottom: 30px;
}

/* Button group */
.modal-delete-buttons {
  display: flex;
  justify-content: center;
  gap: 10px;
}

/* Red Delete button */
.delete-btn {
  background-color: #e74c3c;
  color: white;
  padding: 10px 16px;
  border-radius: 6px;
  border: none;
  font-size: 14px;
  cursor: pointer;
  white-space: nowrap;
}

/* Gray Cancel button */
.cancel-btn {
  background-color: #bdc3c7;
  color: black;
  padding: 10px 16px;
  border-radius: 6px;
  border: none;
  font-size: 14px;
  cursor: pointer;
  white-space: nowrap;
}


  </style>
</head>
<body> 
  <div class="sidebar"> 
    <div class="sidebar-header"></div>
    <img src="<?php echo e(asset('images/logo1.png')); ?>" alt="Barangay Logo" class="sidebar-logo">
     <h2>Barangay Daang Bakal<br>Health Center</h2>
     <!-- Sidebar naten,wag nyo na galawin hehe-->
    <a href="<?php echo e(route('dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">Dashboard</a>
    <a href="<?php echo e(route('health.records')); ?>" class="nav-link <?php echo e(request()->routeIs('health.records') ? 'active' : ''); ?>">Patient Health Records</a>
    <a href="<?php echo e(route('prediction.model')); ?>" class="nav-link <?php echo e(request()->routeIs('prediction.model') ? 'active' : ''); ?>">Prediction Model</a>
    <a href="<?php echo e(route('reports')); ?>" class="nav-link <?php echo e(request()->routeIs('reports') ? 'active' : ''); ?>">Reports</a>
    
    <a href="#" class="nav-link" onclick= "event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>
  </div>

  <div class="main">
    <div class="topbar">
      <div class="searchbar">
        <input type="text" id="searchInput" placeholder="Search by ID, First or Last Name...">
      </div>
      <div class="user-info">
        <img src="user-icon.png" alt="User Icon" width="30"> Physician Sheree
      </div>
    </div>
  
    <div class="overview-title">Patient Health Records</div>
                  <div id="addModal" class="modal add-modal">
           <div class="modal-content">
                  <span class="close" onclick="closeModal()">&times;</span>
                  <h2>Add Patient Record</h2>
                  <!-- Eto yong code sa ADD patient form-->
                  <form id="patientForm" action="<?php echo e(route('health.records.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <label for="first_name">First Name</label>
                          <input type="text" name="first_name" />
                          <label for="last_name">Last Name</label>
                          <input type="text" name="last_name" />

                          <label for="age">Age</label>
                          <input type="number" id="age" name="age" placeholder="Enter age" required>

                          <label for="gender">Gender</label>
                              <select id="gender" name="gender" required>
                                  <option value="" disabled selected>Select gender</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                              </select>

                              <label for="birth_date">Birth Date</label>
                              <input type="text" id="birth_date" name="birth_date" placeholder="e.g. August 25, 2003" required>

                              <div class="height-weight-row">
                                  <label for="height">Height (cm)</label>
                                  <label for="weight">Weight (kg)</label>
                                </div>
                                <div class="height-weight-row">
                                  <input type="number" step="0.01" name="height" id="height" placeholder="Enter height in cm">
                                  <input type="number" step="0.01" name="weight" id="weight" placeholder="Enter weight in kg">
                                </div>
                              <label for="contact_number">Contact Number</label>
                              <input type="text" id="contact_number" name="contact_number" value="<?php echo e(old('contact_number')); ?>">

                          <label for="address">Address</label>
                          <input type="text" id="address" name="address" placeholder="Enter address" required>

                          <label for="visit_purpose">Visit Purpose</label>
                            <select id="visit_purpose" name="visit_purpose[]" multiple>
                                <option value="Check-up">Check-up</option>
                                <option value="Prenatal Check">Prenatal Check</option>
                                <option value="Dental Check-up">Dental Check-up</option>
                                <option value="Immunization">Immunization</option>
                                <option value="Wound Care">Wound Care</option>
                                <option value="Blood Pressure Monitoring">Blood Pressure Monitoring</option>
                                <option value="Others">Others</option>
                              </select>

                            <div id="otherPurposeWrapper" style="display: none; margin-top: 10px;">
                                  <label for="other_purpose">Please specify</label>
                                  <textarea id="other_purpose" name="other_purpose" rows="4" placeholder="Specify other purpose..."></textarea>
                                </div>

                          <label for="medical_diagnosis">Medical Diagnosis</label>
                            <select id="medical_diagnosis" name="medical_diagnosis[]" multiple>
                                  <option value="Dengue">Dengue</option>
                                  <option value="Flu">Flu</option>
                                  <option value="Chickenpox">Chickenpox</option>
                                  <option value="Diarrhea">Diarrhea</option>
                                  <option value="Headache">Headache</option>
                                  <option value="Fever">Fever</option>
                                  <option value="Others">Others</option>
                                </select>

                            <div id="otherDiagnosisWrapper" style="display: none; margin-top: 10px;">
                                    <label for="other_diagnosis">Please specify</label>
                                    <textarea id="other_diagnosis" name="other_diagnosis" rows="4" placeholder="Specify other diagnosis..."></textarea>
                                  </div>


                          <label for="given_medicine">Given Medicine</label>
                          <textarea id="given_medicine" name="given_medicine" rows="3" placeholder="Enter medicine (if any)"></textarea>
                          <div class="optional-note">*Only fill if a medicine was prescribed.</div>
                    <button type="submit" class="btn-submit">Submit</button>        
                  </form>
                                      
                    
                  <!-- Eto yong sa confirmation bago mag submit -->
                        <div id="confirmModal" class="modal">
                          <div class="modal-content confirm-box">
                            <span class="close" onclick="closeConfirmModal()">&times;</span>
                            <h2>Confirm Submission</h2>
                            <p>Are you sure you want to add this patient record?</p>
                            <div class="confirm-actions">
                              <button class="add-btn confirm-yes" onclick="submitForm()">Yes</button>
                              <button class="add-btn confirm-no" onclick="closeConfirmModal()">No</button>
                            </div>
                          </div>
                        </div>


                </div>
          </div>
            <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

          
          <!-- Eto yong message pop up sucess after mag submit -->
                      <?php if(session('success')): ?>
                        <div class="alert alert-success">
                          <?php echo e(session('success')); ?>

                        </div>
                      <?php endif; ?>

    <div class="card">
          <table>
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>
                          <div class="flex items-center gap-2">
                            <span class="font-bold">Actions</span>
                            <button onclick="openModal()" class="add-btn">Add</button>
                          </div>
                        </th>
                      </tr>
                    </thead>
                    <tbody id="patientTable">
                          <?php $__currentLoopData = $healthRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                              <td><?php echo e($record->id); ?></td>
                              <td><?php echo e(\Carbon\Carbon::parse($record->created_at)->format('m/d/y')); ?></td>
                              <td><?php echo e($record->first_name ?? '—'); ?></td>
                              <td><?php echo e($record->last_name ?? '—'); ?></td>
                              <td><?php echo e($record->age ?? '—'); ?></td>
                              <td><?php echo e($record->gender ?? '—'); ?></td>
                              <td><?php echo e($record->address ?? '—'); ?></td>
                              <td>
                                <button class="action-btn view" onclick="openViewModalFromData(this)" data-record='<?php echo json_encode($record, 15, 512) ?>'>View</button>
                                <button class="edit-btn" onclick="openEditModalFromData(this)" data-record='<?php echo json_encode($record, 15, 512) ?>'>Edit</button>
                                <button class="delete-btn" onclick="openDeletePatientModal('<?php echo e($record->id); ?>', '<?php echo e($record->first_name); ?>', '<?php echo e($record->last_name); ?>')">Delete</button>
                                
                              </td>
                            </tr>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                  </table>

                    <!-- DeletePatient Record Modal -->
                          <div id="deletePatientModal" class="modal-delete">
    <div class="modal-delete-content">
      <span class="modal-delete-close" onclick="closeDeletePatientModal()">&times;</span>

      <h2>Confirm Deletion</h2>

      <p id="deletePatientMessage">
        Are you sure you want to delete the record for <strong>Firstname Lastname</strong>?<br><br>
        This action cannot be undone. Deleting this record will permanently remove all related information about this patient from the system.<br><br>
        Please confirm only if you're absolutely sure.
      </p>

      <form id="deletePatientForm" method="POST" action="">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <div class="modal-delete-buttons">
          <button type="submit" class="delete-btn">Yes, Delete Permanently</button>
          <button type="button" class="cancel-btn" onclick="closeDeletePatientModal()">Cancel</button>
        </div>
      </form>
    </div>
  </div>


                  <!-- View Patient Record Modal -->
<div id="viewModal" class="modal view-modal">
  <div class="modal-content view-records-container">
    <span class="close" onclick="closeViewModal()">&times;</span>
    <h2 class="view-records-header">Patient Record</h2>

    <div id="viewContent">
      <div class="record-row"><div class="record-label">First Name:</div><div class="record-value" id="viewFirstName"></div></div>
      <div class="record-row"><div class="record-label">Last Name:</div><div class="record-value" id="viewLastName"></div></div>
      <div class="record-row"><div class="record-label">Age:</div><div class="record-value" id="viewAge"></div></div>
      <div class="record-row"><div class="record-label">Gender:</div><div class="record-value" id="viewGender"></div></div>
      <div class="record-row"><div class="record-label">Birth Date:</div><div class="record-value" id="viewBirthDate"></div></div>
      <div class="record-row"><div class="record-label">Height:</div><div class="record-value" id="viewHeight"></div></div>
      <div class="record-row"><div class="record-label">Weight:</div><div class="record-value" id="viewWeight"></div></div>
      <div class="record-row"><div class="record-label">Contact Number:</div><div class="record-value" id="viewContact"></div></div>
      <div class="record-row"><div class="record-label">Address:</div><div class="record-value" id="viewAddress"></div></div>
      <div class="record-row"><div class="record-label">Visit Purpose:</div><div class="record-value" id="viewVisitPurpose"></div></div>
      <div class="record-row" id="viewOtherPurposeBlock" style="display: none;"><div class="record-label">Other Purpose:</div><div class="record-value" id="viewOtherPurpose"></div></div>
      <div class="record-row"><div class="record-label">Medical Diagnosis:</div><div class="record-value" id="viewDiagnosis"></div></div>
<div class="record-row" id="viewOtherDiagnosisBlock" style="display: none;"><div class="record-label">Other Diagnosis:</div><div class="record-value" id="viewOtherDiagnosis"></div></div>
      <div class="record-row"><div class="record-label">Given Medicine:</div><div class="record-value" id="viewMedicine"></div></div>
    </div>
  </div>
</div>




<!-- Edit Patient Record Modal -->
<div id="editModal" class="modal edit-modal">
  <div class="modal-content">
    <span class="close" onclick="closeEditModal()">&times;</span>
    <h2>Edit Patient Record</h2>
    <form id="editPatientForm" method="POST" action="">

      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <input type="hidden" id="editRecordId" name="id">

      <label for="first_name">First Name</label>
      <input type="text" id="editFirstName" name="first_name" placeholder="Enter first name" required>

      <label for="editLastName">Last Name</label>
      <input type="text" id="editLastName" name="last_name" placeholder="Enter last name" required>

      <label for="editBirthDate">Birth Date</label>
      <input type="text" id="editBirthDate" name="birth_date" placeholder="e.g. August 25, 2003" required>


      <label for="editAge">Age</label>
      <input type="number" id="editAge" name="age" required>

      <label for="editGender">Gender</label>
      <select id="editGender" name="gender" required>
        <option value="" disabled>Select gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>

      <div class="height-weight-row">
        <label for="editHeight">Height (cm)</label>
        <label for="editWeight">Weight (kg)</label>
      </div>
      <div class="height-weight-row">
        <input type="number" step="0.01" id="editHeight" name="height">
        <input type="number" step="0.01" id="editWeight" name="weight">
      </div>

      <label for="editContactNumber">Contact Number</label>
      <input type="text" id="editContactNumber" name="contact_number">

      <label for="editAddress">Address</label>
      <input type="text" id="editAddress" name="address" required>
      <label for="editVisitPurpose">Visit Purpose</label>
      <select id="editVisitPurpose" name="visit_purpose[]" multiple>
        <option value="Check-up">Check-up</option>
        <option value="Prenatal Check">Prenatal Check</option>
        <option value="Dental Check-up">Dental Check-up</option>
        <option value="Immunization">Immunization</option>
        <option value="Wound Care">Wound Care</option>
        <option value="Blood Pressure Monitoring">Blood Pressure Monitoring</option>
        <option value="Others">Others</option>
      </select>

              <!-- Shown only if Others is selected -->
        <div id="editOtherPurposeWrapper" style="display: none; margin-top: 10px;">
          <label for="editOtherPurpose">Please specify</label>
          <textarea id="editOtherPurpose" name="other_purpose" rows="4"></textarea>
        </div>

      <label for="editMedicalDiagnosis">Medical Diagnosis</label>
      <select id="editMedicalDiagnosis" name="medical_diagnosis[]" multiple>
          <option value="Dengue">Dengue</option>
          <option value="Flu">Flu</option>
          <option value="Chickenpox">Chickenpox</option>
          <option value="Diarrhea">Diarrhea</option>
          <option value="Headache">Headache</option>
          <option value="Fever">Fever</option>
          <option value="Others">Others</option>
        </select>

                <!-- Shown only if Others is selected -->
          <div id="editOtherDiagnosisWrapper" style="display: none; margin-top: 10px;">
            <label for="editOtherDiagnosis">Please specify</label>
            <textarea id="editOtherDiagnosis" name="other_diagnosis" rows="4"></textarea>
          </div>

      <label for="editGivenMedicine">Given Medicine</label>
      <textarea id="editGivenMedicine" name="given_medicine" rows="3"></textarea>
      <div class="optional-note">*Only fill if a medicine was prescribed.</div>

      <button type="button" class="btn-submit" onclick="showUpdateConfirm()">Update</button>
    </form>
  </div>
</div>
        <!-- Eto yong sa Confirmation bago iupdate sa edit-->
        <div id="editConfirmModal" class="modal">
          <div class="modal-content confirm-box">
            <span class="close" onclick="closeEditConfirmModal()">&times;</span>
            <h2>Confirm Update</h2>
            <p>Are you sure you want to update this record?</p>
            <div class="confirm-actions">
              <button class="add-btn" onclick="submitEditForm()">Yes</button>
              <button class="add-btn confirm-no" onclick="closeEditConfirmModal()">No</button>
            </div>
          </div>
        </div>
    

          <!-- Eto yong sa page-->
          <div class="pagination-wrapper">
            <div class="pagination">
                <?php if($healthRecords->onFirstPage()): ?>
                    <span class="pagination-button disabled">Previous</span>
                <?php else: ?>
                    <a href="<?php echo e($healthRecords->previousPageUrl()); ?>" class="pagination-button">Previous</a>
                <?php endif; ?>

                <span class="pagination-page current"><?php echo e($healthRecords->currentPage()); ?></span>

                <?php if($healthRecords->hasMorePages()): ?>
                    <a href="<?php echo e($healthRecords->nextPageUrl()); ?>" class="pagination-button">Next</a>
                <?php else: ?>
                    <span class="pagination-button disabled">Next</span>
                <?php endif; ?>
            </div>
        </div>
        </div>
      </div>
<script>
  // --- ADD MODAL ---
  function openModal() {
    document.getElementById('addModal').style.display = 'flex';
  }

  function closeModal() {
    document.getElementById('addModal').style.display = 'none';
  }

  // --- VIEW MODAL ---
  function openViewModalFromData(button) {
    const record = JSON.parse(button.getAttribute('data-record'));
    console.log(record);

    document.getElementById('viewModal').style.display = 'flex';
    document.getElementById('viewFirstName').textContent = record.first_name || '—';
    document.getElementById('viewLastName').textContent = record.last_name || '—';
    document.getElementById('viewAge').textContent = record.age || '—';
    document.getElementById('viewGender').textContent = record.gender || '—';
    document.getElementById('viewBirthDate').textContent = record.birth_date || '—';
    document.getElementById('viewHeight').textContent = record.height || '—';
    document.getElementById('viewWeight').textContent = record.weight || '—';
    document.getElementById('viewContact').textContent = record.contact_number || '—';
    document.getElementById('viewAddress').textContent = record.address || '—';
    document.getElementById('viewVisitPurpose').textContent = (Array.isArray(record.visit_purpose) ? record.visit_purpose.join(', ') : record.visit_purpose) || '—';
    document.getElementById('viewOtherPurpose').textContent = record.other_purpose || '—';
    document.getElementById('viewDiagnosis').textContent = (Array.isArray(record.medical_diagnosis) ? record.medical_diagnosis.join(', ') : record.medical_diagnosis) || '—';
    document.getElementById('viewOtherDiagnosis').textContent = record.other_diagnosis || '—';
    document.getElementById('viewMedicine').textContent = record.given_medicine || '-';
    
    


    const otherPurposeBlock = document.getElementById('viewOtherPurposeBlock');
  if (record.other_purpose && record.other_purpose.trim() !== '') {
    document.getElementById('viewOtherPurpose').textContent = record.other_purpose;
    otherPurposeBlock.style.display = 'grid';
  } else {
    otherPurposeBlock.style.display = 'none';
  }

  // Conditionally show Other Diagnosis
  const otherDiagnosisBlock = document.getElementById('viewOtherDiagnosisBlock');
  if (record.other_diagnosis && record.other_diagnosis.trim() !== '') {
    document.getElementById('viewOtherDiagnosis').textContent = record.other_diagnosis;
    otherDiagnosisBlock.style.display = 'grid';;
  } else {
    otherDiagnosisBlock.style.display = 'none';
  }
  }

  function closeViewModal() {
    document.getElementById('viewModal').style.display = 'none';
  }

    let editVisitPurposeChoices;
  let editMedicalDiagnosisChoices;

  document.addEventListener('DOMContentLoaded', () => {
    editVisitPurposeChoices = new Choices('#editVisitPurpose', {
      removeItemButton: true,
      placeholderValue: 'Select reason for visit'
    });

    editMedicalDiagnosisChoices = new Choices('#editMedicalDiagnosis', {
      removeItemButton: true,
      placeholderValue: 'Select diagnosis'
    });
  });

  // --- EDIT MODAL ---
  function openEditModalFromData(button) {
    const record = JSON.parse(button.getAttribute('data-record'));
    const modal = document.getElementById('editModal');
   const form = document.getElementById('editPatientForm');



    // Reset previous values
  editVisitPurposeChoices.removeActiveItems();
  editMedicalDiagnosisChoices.removeActiveItems();

  // If stored as JSON string, convert to array
  const visitPurposeArray = typeof record.visit_purpose === 'string'
    ? JSON.parse(record.visit_purpose)
    : record.visit_purpose || [];

  const diagnosisArray = typeof record.medical_diagnosis === 'string'
    ? JSON.parse(record.medical_diagnosis)
    : record.medical_diagnosis || [];

  visitPurposeArray.forEach(value => {
    editVisitPurposeChoices.setChoiceByValue(value);
  });

  diagnosisArray.forEach(value => {
    editMedicalDiagnosisChoices.setChoiceByValue(value);
  });

    document.getElementById('editRecordId').value = record.id;
    document.getElementById('editFirstName').value = record.first_name || '';
    document.getElementById('editLastName').value = record.last_name || '';
    document.getElementById('editAge').value = record.age || '';
    document.getElementById('editBirthDate').value = record.birth_date || '';
    document.getElementById('editHeight').value = record.height || '';
    document.getElementById('editWeight').value = record.weight || '';
    document.getElementById('editContactNumber').value = record.contact_number || '';
    document.getElementById('editAddress').value = record.address || '';
    document.getElementById('editVisitPurpose').value = record.visit_purpose || '';
    document.getElementById('editOtherPurpose').value = record.other_purpose || '';
    document.getElementById('editMedicalDiagnosis').value = record.medical_diagnosis || '';
    document.getElementById('editOtherDiagnosis').value = record.other_diagnosis || '';
    document.getElementById('editGivenMedicine').value = record.given_medicine || '';
    document.getElementById('editGender').value = record.gender || '';

    if (record.birth_date) {
    const date = new Date(record.birth_date);
  const formatted = (date.getMonth() + 1).toString().padStart(2, '0') + '/' +
                    date.getDate().toString().padStart(2, '0') + '/' +
                    date.getFullYear().toString().slice(2);
  document.getElementById('editBirthDate').value = formatted;
    }

    document.getElementById('editPatientForm').addEventListener('submit', function () {
  // Manually sync Choices selections back to the <select> element
  const vp = editVisitPurposeChoices.getValue(true);  // returns array of values
  const md = editMedicalDiagnosisChoices.getValue(true); 

  // If no value is selected, set to empty arrays to ensure they're included
  const visitPurposeInput = document.createElement("input");
  visitPurposeInput.type = "hidden";
  visitPurposeInput.name = "visit_purpose[]";
  visitPurposeInput.value = vp.length ? vp[0] : "";  // if multi, duplicate for each?

  const diagnosisInput = document.createElement("input");
  diagnosisInput.type = "hidden";
  diagnosisInput.name = "medical_diagnosis[]";
  diagnosisInput.value = md.length ? md[0] : "";

  this.appendChild(visitPurposeInput);
  this.appendChild(diagnosisInput);
});



    // Show or hide "Other" fields
    document.getElementById('editOtherPurposeWrapper').style.display =
      record.visit_purpose === 'Others' ? 'block' : 'none';

    document.getElementById('editOtherDiagnosisWrapper').style.display =
      record.medical_diagnosis === 'Others' ? 'block' : 'none';

    // Set form action for update
    document.getElementById('editPatientForm').action = `/health-records/${record.id}`;


    // Show modal
    document.getElementById('editModal').style.display = 'flex';
  }

  function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
  }

  // --- CLICK OUTSIDE TO CLOSE ---
  window.onclick = function (event) {
    const add = document.getElementById("addModal");
    const view = document.getElementById("viewModal");
    const edit = document.getElementById("editModal");

    if (event.target === add) closeModal();
    if (event.target === view) closeViewModal();
    if (event.target === edit) closeEditModal();
  };
</script>


<!-- Eto yong script dun choosing multiple sa adding records-->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const visitPurpose = new Choices('#visit_purpose', {
    removeItemButton: true,
    placeholder: true,
    placeholderValue: 'Select reason for visit'
  });

  const medicalDiagnosis = new Choices('#medical_diagnosis', {
    removeItemButton: true,
    placeholder: true,
    placeholderValue: 'Select diagnosis'
  });

  // Monitor for "Others" in Visit Purpose
  document.querySelector('#visit_purpose').addEventListener('change', function () {
    const selected = Array.from(this.selectedOptions).map(o => o.value);
    document.getElementById('otherPurposeWrapper').style.display = selected.includes('Others') ? 'block' : 'none';
  });

  // Monitor for "Others" in Medical Diagnosis
  document.querySelector('#medical_diagnosis').addEventListener('change', function () {
    const selected = Array.from(this.selectedOptions).map(o => o.value);
    document.getElementById('otherDiagnosisWrapper').style.display = selected.includes('Others') ? 'block' : 'none';
  document.querySelector('#editVisitPurpose').addEventListener('change', function () {
  const selected = Array.from(this.selectedOptions).map(o => o.value);
  document.getElementById('editOtherPurposeWrapper').style.display = selected.includes('Others') ? 'block' : 'none';
});

  });
});
</script>

<!-- Eto yong script dun sa confirmation bago mag submit sa edit records-->
<script>

  
  function showUpdateConfirm() {
    document.getElementById('editConfirmModal').style.display = 'flex';
  }

  function closeEditConfirmModal() {
    document.getElementById('editConfirmModal').style.display = 'none';
  }

function submitEditForm() {
  document.getElementById('editPatientForm').submit();
  const form = document.getElementById('editForm'); // or 'editPatientForm' if you use that
  const visitPurposeValues = editVisitPurposeChoices.getValue(true); // true returns array of values
  const diagnosisValues = editMedicalDiagnosisChoices.getValue(true);

  // Clear old injected values if any
  const oldHiddenInputs = form.querySelectorAll('input[name="visit_purpose[]"], input[name="medical_diagnosis[]"]');
  oldHiddenInputs.forEach(input => input.remove());

  // Inject hidden visit_purpose[] inputs
  visitPurposeValues.forEach(val => {
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'visit_purpose[]';
    hiddenInput.value = val;
    form.appendChild(hiddenInput);
  });

  // Inject hidden medical_diagnosis[] inputs
  diagnosisValues.forEach(val => {
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = 'medical_diagnosis[]';
    hiddenInput.value = val;
    form.appendChild(hiddenInput);
  });

  form.submit();
}

  // Optional: Close modal when clicking outside
  window.onclick = function(event) {
    const modal = document.getElementById("editConfirmModal");
    if (event.target === modal) {
      closeEditConfirmModal();
    }
  }
</script>


<!-- Eto yong script dun sa confirmation bago mag submit add-->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('patientForm');
  const confirmModal = document.getElementById('confirmModal');

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    confirmModal.style.display = 'flex';
  });

  window.submitForm = function () {
    form.submit();
  };

  window.closeConfirmModal = function () {
    confirmModal.style.display = 'none';
  };

  window.onclick = function(event) {
    if (event.target === confirmModal) {
      closeConfirmModal();
    }
  };
});
</script>

<!-- Eto yong script dun sa others pag cinilick sa visit purpose-->
<script>
    function toggleOtherPurpose(select) {
const wrapper = document.getElementById(wrapperId);
  const selectedOptions = Array.from(selectElement.selectedOptions).map(opt => opt.value);
  if (selectedOptions.includes("Others")) {
    wrapper.style.display = "block";
  } else {
    wrapper.style.display = "none";
    wrapper.querySelector("textarea").value = "";  // Clear input
  }
}


</script>
<!-- Eto yong script dun sa others pag cinilick sa medical diagnosis-->
<script>
  function toggleOtherDiagnosis(select) {
    const wrapper = document.getElementById(wrapperId);
  const selectedOptions = Array.from(selectElement.selectedOptions).map(opt => opt.value);
  if (selectedOptions.includes("Others")) {
    wrapper.style.display = "block";
  } else {
    wrapper.style.display = "none";
    wrapper.querySelector("textarea").value = "";  // Clear input
  }
}

  
</script>

<script>
  function toggleEditOtherPurpose(select) {
  const wrapper = document.getElementById("editOtherPurposeWrapper");
  const selected = Array.from(select.selectedOptions).map(opt => opt.value);
  wrapper.style.display = selected.includes("Others") ? "block" : "none";

  
}

function toggleEditOtherDiagnosis(select) {
  const wrapper = document.getElementById("editOtherDiagnosisWrapper");
  const selected = Array.from(select.selectedOptions).map(opt => opt.value);
  wrapper.style.display = selected.includes("Others") ? "block" : "none";
}
</script>

<!-- Eto yong script dun sa search bar-->
<script>
  document.getElementById('searchInput').addEventListener('input', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#patientTable tr');

    rows.forEach(row => {
      const id = row.cells[0].textContent.toLowerCase();
      const firstName = row.cells[2].textContent.toLowerCase();
      const lastName = row.cells[3].textContent.toLowerCase();

      if (id.includes(filter) || firstName.includes(filter) || lastName.includes(filter)) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  });
</script>

<!-- Eto yong script dun sa Delete Record-->
<script>
  function openDeletePatientModal(id, firstName, lastName) {
  const modal = document.getElementById("deletePatientModal");
  const form = document.getElementById("deletePatientForm");
  const message = document.getElementById("deletePatientMessage");

  if (!modal || !form || !message) {
    console.error("Delete modal elements not found.");
    return;
  }

  form.action = `/health-records/${id}`;
  message.innerHTML = `
    Are you sure you want to delete the record for <strong>${firstName} ${lastName}</strong>?<br><br>
    This action cannot be undone. Deleting this record will permanently remove all related information about this patient from the system.<br><br>
    Please confirm only if you're absolutely sure.
  `;

  modal.style.display = "flex";
}

function closeDeletePatientModal() {
  const modal = document.getElementById("deletePatientModal");
  if (modal) modal.style.display = "none";
}

window.onclick = function (event) {
  const modal = document.getElementById("deletePatientModal");
  if (event.target === modal) {
    closeDeletePatientModal();
  }
};

</script>
<link rel="stylesheet" href="<?php echo e(asset('css/delete-modal.css')); ?>">
<script src="<?php echo e(asset('js/delete-modal.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\AssembleP2\resources\views/health_records.blade.php ENDPATH**/ ?>