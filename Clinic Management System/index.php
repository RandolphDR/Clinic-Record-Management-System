<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clinic Management System</title>
  <link rel="stylesheet" href="style/main.css" />
  <script type="text/javascript" src="backend/script/main.js"></script>
</head>

<body>
  <header class="System-Header">
    <h1>CLINIC MANAGEMENT SYSTEM</h1>
  </header>
  <main class="System-Main-Container">
    <nav class="System-Navigation">
      <button type="button" id="Admin_Button"><img src="arts/admin-icon.png" alt="error" />ADMIN</button>
      <button type="button" id="Patient_Button"><img src="arts/patient-icon.png" alt="error" />PATIENTS</button>
    </nav>
    <form action="backend/index/login_admin_account.php" class="Admin-Form" id="Admin-Form" method="POST">
      <button type="button" class="form_close_button" id="admin_close_button">✕</button>
      <header>
        <img src="arts/admin-icon.png" alt="error" />
        <span>
          <h4>ADMIN</h4>
          <p>Login Account</p>
        </span>
      </header>
      <section>
        <div class="Input_Container">
          <label for="Username_Email_Field">Username / Email</label>
          <input type="text" id="Username_Email_Field" name="Username_Email_Field" required />
        </div>
        <div class="Input_Container">
          <label for="Password_Field">Password</label>
          <input type="password" id="Password_Field" name="Password_Field" required />
        </div>
      </section>
      <button type="submit" class="admin_login_button" id="admin_login_button">LOGIN</button>
      <footer>
        <p>No Account yet?</p>
        <button type="button" id="Create_Button">Create Here</button>
      </footer>
    </form>
    <form action="backend/index/create_admin_account.php" method="POST" class="Create-Admin-Form"
      id="Create-Admin-Form">
      <button type="button" class="form_close_button" id="create_close_button">✕</button>
      <header>
        <img src="arts/admin-icon.png" alt="error" />
        <span>
          <h4>ADMIN</h4>
          <p>Create Account</p>
        </span>
      </header>
      <section>
        <div class="Input_Container">
          <label for="New_Admin_Name">Name (Last Name, First Name, MI)</label>
          <input type="text" name="New_Admin_Name" id="New_Admin_Name" required />
        </div>
        <div class="Input_Container">
          <label for="New_Admin_Username">Username</label>
          <input type="text" name="New_Admin_Username" id="New_Admin_Username" required />
        </div>
        <div class="Input_Container">
          <label for="New_Admin_Email">Email</label>
          <input type="email" name="New_Admin_Email" id="New_Admin_Email" required />
        </div>
        <div class="Input_Container">
          <label for="New_Admin_Password">Password</label>
          <input type="password" name="New_Admin_Password" id="New_Admin_Password"
            pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$"
            title="Password must be at least 8 characters long, contain at least 1 number and 1 special character."
            required />
        </div>
      </section>
      <button type="submit" class="create_login_button" id="Create_Admin_Account">CREATE ACCOUNT</button>
      <footer>
        <p>Already have an Account?</p>
        <button type="button" id="Login_Here_Button">Login Here</button>
      </footer>
    </form>
  </main>
  <form action="backend/index/create_patient_record.php" class="Patient-Form" id="Patient-Form" method="POST"
    enctype="multipart/form-data">
    <main class="Patient-Information">
      <button type="button" class="Close_Patient_Form" id="Close_Patient_Form">✕</button>
      <header>
        <img src="arts/patient-icon.png" alt="error" />
        <h5>PATIENTS RECORD</h5>
      </header>
      <section class="Patients-Information-Container">
        <label for="image-upload" class="Patient-Image">
          <span>Patient Image</span>
          <input type="file" id="image-upload" name="image-upload" accept="image/*" />
        </label>
        <aside>
          <div class="Patient-Input-Container">
            <label for="Patient-Name">Name:</label>
            <input type="text" id="Patient-Name" name="Patient-Name" required />
          </div>
          <div class="Patient-Input-Container">
            <label for="Patient-Age">Age:</label>
            <input type="number" id="Patient-Age" name="Patient-Age" required />
          </div>
          <div class="Patient-Input-Container">
            <label for="Patient-Gender">Gender:</label>
            <select id="Patient-Gender" name="Patient-Gender" required>
              <option value="0" disabled selected hidden>Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Others">Others</option>
            </select>
          </div>
          <div class="Patient-Input-Container">
            <label for="Patient-Birthdate">Birthdate:</label>
            <input type="date" id="Patient-Birthdate" name="Patient-Birthdate" required />
          </div>
          <div class="Patient-Input-Container">
            <label for="Patient-StudentNo">Student Number:</label>
            <input type="text" id="Patient-StudentNo" name="Patient-StudentNo" required />
          </div>
          <div class="Patient-Input-Container">
            <label for="Patient-Yearlvl">Student Year Level:</label>
            <select id="Patient-Yearlvl" name="Patient-Yearlvl" required>
              <option value="" disabled selected hidden>Year Level</option>
              <option value="1st Year">1st Year</option>
              <option value="2nd Year">2nd Year</option>
              <option value="3rd Year">3rd Year</option>
              <option value="4th Year">4th Year</option>
            </select>
          </div>
          <div class="Patient-Input-Container">
            <label for="Patient-Section">Section:</label>
            <select id="Patient-Section" name="Patient-Section" required>
              <option value="0" disabled selected hidden>Section</option>
              <optgroup label="CCS">
                <option value="CCS-A">CCS - A</option>
                <option value="CCS-B">CCS - B</option>
                <option value="CCS-C">CCS - C</option>
                <option value="CCS-D">CCS - D</option>
                <option value="CCS-E">CCS - E</option>
                <option value="CCS-F">CCS - F</option>
                <option value="CCS-G">CCS - G</option>
                <option value="CCS-H">CCS - H</option>
                <option value="CCS-I">CCS - I</option>
                <option value="CCS-J">CCS - J</option>
                <option value="CCS-K">CCS - K</option>
                <option value="CCS-L">CCS - L</option>
                <option value="CCS-M">CCS - M</option>
                <option value="CCS-N">CCS - N</option>
                <option value="CCS-O">CCS - O</option>
                <option value="CCS-P">CCS - P</option>
                <option value="CCS-Q">CCS - Q</option>
                <option value="CCS-R">CCS - R</option>
                <option value="CCS-S">CCS - S</option>
              </optgroup>
              <optgroup label="BSIT">
                <option value="BSIT-A">BSIT - A</option>
                <option value="BSIT-B">BSIT - B</option>
                <option value="BSIT-C">BSIT - C</option>
                <option value="BSIT-D">BSIT - D</option>
                <option value="BSIT-E">BSIT - E</option>
                <option value="BSIT-F">BSIT - F</option>
                <option value="BSIT-G">BSIT - G</option>
                <option value="BSIT-H">BSIT - H</option>
                <option value="BSIT-I">BSIT - I</option>
                <option value="BSIT-J">BSIT - J</option>
                <option value="BSIT-K">BSIT - K</option>
                <option value="BSIT-L">BSIT - L</option>
                <option value="BSIT-M">BSIT - M</option>
                <option value="BSIT-N">BSIT - N</option>
                <option value="BSIT-O">BSIT - O</option>
                <option value="BSIT-P">BSIT - P</option>
                <option value="BSIT-Q">BSIT - Q</option>
                <option value="BSIT-R">BSIT - R</option>
                <option value="BSIT-S">BSIT - S</option>
              </optgroup>
            </select>
          </div>
        </aside>
      </section>
      <section class="Patient-Illness-Container">
        <h3>Patient Illness</h3>
        <div class="Patient-Illness-Input-Container">
          <input type="text" class="Patient-Illness" name="Patient-Illness-1" />
          <input type="date" class="Patient-Illness-Date" name="Patient-Illness-Date-1" />
        </div>
        <div class="Patient-Illness-Input-Container">
          <input type="text" class="Patient-Illness" name="Patient-Illness-2" />
          <input type="date" class="Patient-Illness-Date" name="Patient-Illness-Date-2" />
        </div>
        <div class="Patient-Illness-Input-Container">
          <input type="text" class="Patient-Illness" name="Patient-Illness-3" />
          <input type="date" class="Patient-Illness-Date" name="Patient-Illness-Date-3" />
        </div>
      </section>
      <button type="submit" class="Patient-Submit-Button" id="Patient-Submit-Button">SAVE RECORD</button>
    </main>
    <aside class="Patient-Contacts-Section">
      <section class="Contact-Section">
        <h5>Contacts</h5>
        <div class="Contact-Input-Container">
          <label for="Patient-PhoneNumber">Phone Number</label>
          <input type="text" id="Patient-PhoneNumber" name="Patient-PhoneNumber" required />
        </div>
        <div class="Contact-Input-Container">
          <label for="Patient-Email">Email</label>
          <input type="email" id="Patient-Email" name="Patient-Email" required />
        </div>
        <div class="Contact-Input-Container">
          <label for="Patient-Address">Address</label>
          <input type="text" id="Patient-Address" name="Patient-Address" required />
        </div>
      </section>
      <section class="Height-Section">
        <header>
          <img src="arts/height-icon.png" alt="error" />
          <h5>Height</h5>
        </header>
        <input type="number" class="Patient-Height" name="Patient-Height" placeholder="00 cm" step="0.1" min="0" />
      </section>
      <section class="Weight-Section">
        <header>
          <img src="arts/weight-icon.png" alt="error" />
          <h5>Weight</h5>
        </header>
        <input type="number" class="Patient-Weight" name="Patient-Weight" placeholder="00 kg" step="0.1" min="0" />
      </section>
    </aside>
    <aside class="Patient-Prescription">
      <main class="Patient-Prescription-Container">
        <header>
          <h5>Prescriptions</h5>
        </header>
        <input type="text" class="Patient-Prescription-Input" name="Patient-Prescription-1" />
        <input type="text" class="Patient-Prescription-Input" name="Patient-Prescription-2" />
        <input type="text" class="Patient-Prescription-Input" name="Patient-Prescription-3" />
      </main>
    </aside>
  </form>
</body>

</html>