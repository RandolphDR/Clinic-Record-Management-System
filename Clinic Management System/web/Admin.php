<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clinic Management System: Administrator</title>
  <link rel="stylesheet" href="../style/admin.css" />
  <script type="text/javascript" src="../backend/admin/dashboard.js"></script>
  <script type="text/javascript" src="../backend/admin/admin_management.js"></script>
  <script type="text/javascript" src="../backend/admin/patient_management.js"></script>
  <script type="text/javascript" src="../backend/script/admin.js"></script>
</head>

<body>
  <section class="Popover-Backdrop-Container" id="Popover-Backdrop-Container">
    <form action="../backend/admin/create_admin_account.php" method="POST" class="Admin-Add-Form" id="Admin-Add-Form">
      <header>
        <h2>Add New Account</h2>
      </header>
      <div class="Admin-Input-Container-Group">
        <div class="Input-Container">
          <label for="Admin-New-AccountName">Account Name</label>
          <input type="text" id="Admin-New-Account-Name" name="Admin-New-AccountName" required
            placeholder="Last Name, First Name, MI" />
        </div>
        <div class="Input-Container">
          <label for="Admin-New-Username">Username</label>
          <input type="text" id="Admin-New-Username" name="Admin-New-Username" required placeholder="Username" />
        </div>
        <div class="Input-Container">
          <label for="Admin-New-Email">Email</label>
          <input type="email" id="Admin-New-Email" name="Admin-New-Email" required placeholder="e.g user@example.com" />
        </div>
        <div class="Input-Container">
          <label for="Admin-New-Password">Password</label>
          <input type="text" id="Admin-New-Password" name="Admin-New-Password" required placeholder="Password" />
        </div>
      </div>
      <nav class="Form-Navigation">
        <button type="submit" id="Admin-Create-Account">Create Account</button>
        <button type="button" id="Admin-Cancel-Account">Cancel</button>
      </nav>
    </form>
    <form action="../backend/admin/update_admin_account.php" class="Admin-Edit-Form" id="Admin-Edit-Form" method="POST">
      <header>
        <h2>Edit Account</h2>
      </header>
      <div class="Admin-Input-Container-Group">
        <div class="Input-Container">
          <label for="Admin-Edit-AccountNo">Account No</label>
          <input type="text" id="Admin-Edit-AccountNo" name="Admin-Edit-AccountNo" required placeholder="Account No"
            readonly title="Account number cannot be edited as it is a fixed identifier for the user." />
        </div>
        <div class="Input-Container">
          <label for="Admin-Edit-AccountName">Account Name</label>
          <input type="text" id="Admin-Edit-Account-Name" name="Admin-Edit-Account-Name" required
            placeholder="Account Name" />
        </div>
        <div class="Input-Container">
          <label for="Admin-Edit-Username">Username</label>
          <input type="text" id="Admin-Edit-Username" name="Admin-Edit-Username" required placeholder="Username" />
        </div>
        <div class="Input-Container">
          <label for="Admin-Edit-Email">Email</label>
          <input type="email" id="Admin-Edit-Email" name="Admin-Edit-Email" required
            placeholder="e.g user@example.com" />
        </div>
        <div class="Input-Container">
          <label for="Admin-Edit-Password">Password</label>
          <input type="text" id="Admin-Edit-Password" name="Admin-Edit-Password" required placeholder="Password" />
        </div>
      </div>
      <nav class="Form-Navigation">
        <button type="submit" id="Admin-Save-Edit">Apply Changes</button>
        <button type="button" id="Admin-Cancel-Edit">Discard Changes</button>
      </nav>
    </form>
    <form action="../backend/admin/create_patient_record.php" class="Patient-Add-Form" id="Patient-Add-Form"
      method="POST" enctype="multipart/form-data">
      <main class="Patient-Information">
        <header>
          <img src="../arts/patient-icon.png" alt="error" />
          <h5>Add New Record</h5>
        </header>
        <section class="Patients-Information-Container">
          <label for="Patient-New-Image" id="Patient-New-Image-Label" class="Patient-Image">
            <span>Patient Image</span>
            <input type="file" id="Patient-New-Image" name="Patient-New-Image" accept="image/*" />
          </label>
          <aside>
            <div class="Patient-Input-Container">
              <label for="Patient-New-Name">Name:</label>
              <input type="text" id="Patient-New-Name" name="Patient-New-Name" required />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-New-Age">Age:</label>
              <input type="number" id="Patient-New-Age" name="Patient-New-Age" required />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-New-Gender">Gender:</label>
              <select id="Patient-New-Gender" name="Patient-New-Gender" required>
                <option value="0" disabled selected hidden>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
              </select>
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-New-Birthdate">Birthdate:</label>
              <input type="date" id="Patient-New-Birthdate" name="Patient-New-Birthdate" required />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-New-StudentNumber">Student Number:</label>
              <input type="text" id="Patient-New-StudentNumber" name="Patient-New-StudentNumber" required />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-New-YearLevel">Student Year Level:</label>
              <select id="Patient-New-YearLevel" name="Patient-New-YearLevel" required>
                <option value="" disabled selected hidden>Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
              </select>
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-New-Section">Section:</label>
              <select id="Patient-New-Section" name="Patient-New-Section" required>
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
            <input type="text" class="Patient-Illness" id="Patient-New-Illness-1" name="Patient-New-Illness-1" />
            <input type="date" class="Patient-Illness-Date" id="Patient-New-Illness-Date-1"
              name="Patient-New-Illness-Date-1" />
          </div>
          <div class="Patient-Illness-Input-Container">
            <input type="text" class="Patient-Illness" id="Patient-New-Illness-2" name="Patient-New-Illness-2" />
            <input type="date" class="Patient-Illness-Date" id="Patient-New-Illness-Date-2"
              name="Patient-New-Illness-Date-2" />
          </div>
          <div class="Patient-Illness-Input-Container">
            <input type="text" class="Patient-Illness" id="Patient-New-Illness-3" name="Patient-New-Illness-3" />
            <input type="date" class="Patient-Illness-Date" id="Patient-New-Illness-Date-3"
              name="Patient-New-Illness-Date-3" />
          </div>
        </section>
        <nav class="Patient-Form-Navigation">
          <button type="submit" id="Patient-Create-New">Create Record</button>
          <button type="button" id="Patient-Cancel-New">Cancel</button>
        </nav>
      </main>
      <aside class="Patient-Contacts-Section">
        <section class="Contact-Section">
          <h5>Contacts</h5>
          <div class="Contact-Input-Container">
            <label for="Patient-New-Phonenumber">Phone Number</label>
            <input type="text" id="Patient-New-Phonenumber" name="Patient-New-Phonenumber" required />
          </div>
          <div class="Contact-Input-Container">
            <label for="Patient-New-Email">Email</label>
            <input type="email" id="Patient-New-Email" name="Patient-New-Email" required />
          </div>
          <div class="Contact-Input-Container">
            <label for="Patient-New-Address">Address</label>
            <input type="text" id="Patient-New-Address" name="Patient-New-Address" required />
          </div>
        </section>
        <section class="Height-Section">
          <header>
            <img src="../arts/height-icon.png" alt="error" />
            <h5>Height</h5>
          </header>
          <input type="number" class="Patient-Height" id="Patient-New-Height" name="Patient-New-Height"
            placeholder="00 cm" step="0.1" min="0" />
        </section>
        <section class="Weight-Section">
          <header>
            <img src="../arts/weight-icon.png" alt="error" />
            <h5>Weight</h5>
          </header>
          <input type="number" class="Patient-Weight" id="Patient-New-Weight" name="Patient-New-Weight"
            placeholder="00 kg" step="0.1" min="0" />
        </section>
      </aside>
      <aside class="Patient-Prescription">
        <main class="Patient-Prescription-Container">
          <header>
            <h5>Prescriptions</h5>
          </header>
          <input type="text" class="Patient-Prescription-Input" id="Patient-New-Prescription-1"
            name="Patient-New-Prescription-1" />
          <input type="text" class="Patient-Prescription-Input" id="Patient-New-Prescription-2"
            name="Patient-New-Prescription-2" />
          <input type="text" class="Patient-Prescription-Input" id="Patient-New-Prescription-3"
            name="Patient-New-Prescription-3" />
        </main>
      </aside>
    </form>
    <!-- Edit Patient Record Form -->
    <form action="../backend/admin/update_patient_record.php" class="Patient-Edit-Form" id="Patient-Edit-Form"
      method="POST" enctype="multipart/form-data">
      <main class="Patient-Information">
        <header>
          <img src="../arts/patient-icon.png" alt="error" />
          <h5>Edit Patient Records</h5>
        </header>
        <section class="Patients-Information-Container">
          <label for="Patient-Edit-Image" id="Patient-Edit-Image-Label" class="Patient-Image">
            <span>No Patient Image Set</span>
            <input type="file" id="Patient-Edit-Image" name="Patient-Edit-Image" accept="image/*" />
          </label>
          <aside>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-RecordNo">Record No</label>
              <input type="number" id="Patient-Edit-RecordNo" name="Patient-Edit-RecordNo" required
                placeholder="Record No" readonly
                title="Record number cannot be edited as it is a fixed identifier for the user." />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-Name">Patient Name</label>
              <input type="text" id="Patient-Edit-Name" name="Patient-Edit-Name" required placeholder="Patient Name" />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-Age">Age</label>
              <input type="number" id="Patient-Edit-Age" name="Patient-Edit-Age" required placeholder="Age" />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-Gender">Gender:</label>
              <select id="Patient-Edit-Gender" name="Patient-Edit-Gender" required>
                <option value="0" disabled selected hidden>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
              </select>
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-Birthdate">Birthdate:</label>
              <input type="date" id="Patient-Edit-Birthdate" name="Patient-Edit-Birthdate" required />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-StudentNumber">Student Number:</label>
              <input type="text" id="Patient-Edit-StudentNumber" name="Patient-Edit-StudentNumber" required />
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-YearLevel">Student Year Level:</label>
              <select id="Patient-Edit-YearLevel" name="Patient-Edit-YearLevel" required>
                <option value="" disabled selected hidden>Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
              </select>
            </div>
            <div class="Patient-Input-Container">
              <label for="Patient-Edit-Section">Section:</label>
              <select id="Patient-Edit-Section" name="Patient-Edit-Section" required>
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
            <input type="text" class="Patient-Illness" id="Patient-Edit-Illness-1" name="Patient-Edit-Illness-1" />
            <input type="date" class="Patient-Illness-Date" id="Patient-Edit-Illness-Date-1"
              name="Patient-Edit-Illness-Date-1" />
          </div>
          <div class="Patient-Illness-Input-Container">
            <input type="text" class="Patient-Illness" id="Patient-Edit-Illness-2" name="Patient-Edit-Illness-2" />
            <input type="date" class="Patient-Illness-Date" id="Patient-Edit-Illness-Date-2"
              name="Patient-Edit-Illness-Date-2" />
          </div>
          <div class="Patient-Illness-Input-Container">
            <input type="text" class="Patient-Illness" id="Patient-Edit-Illness-3" name="Patient-Edit-Illness-3" />
            <input type="date" class="Patient-Illness-Date" id="Patient-Edit-Illness-Date-3"
              name="Patient-Edit-Illness-Date-3" />
          </div>
        </section>
        <nav class="Patient-Form-Navigation">
          <button type="submit" id="Patient-Save-Edit">Apply Changes</button>
          <button type="button" id="Patient-Cancel-Edit">Discard Changes</button>
        </nav>
      </main>
      <aside class="Patient-Contacts-Section">
        <section class="Contact-Section">
          <h5>Contacts</h5>
          <div class="Contact-Input-Container">
            <label for="Patient-Edit-Phonenumber">Phone Number</label>
            <input type="text" id="Patient-Edit-Phonenumber" name="Patient-Edit-Phonenumber" required />
          </div>
          <div class="Contact-Input-Container">
            <label for="Patient-Edit-Email">Email</label>
            <input type="email" id="Patient-Edit-Email" name="Patient-Edit-Email" required />
          </div>
          <div class="Contact-Input-Container">
            <label for="Patient-Edit-Address">Address</label>
            <input type="text" id="Patient-Edit-Address" name="Patient-Edit-Address" required />
          </div>
        </section>
        <section class="Height-Section">
          <header>
            <img src="../arts/height-icon.png" alt="error" />
            <h5>Height</h5>
          </header>
          <input type="number" class="Patient-Height" id="Patient-Edit-Height" name="Patient-Edit-Height"
            placeholder="00 cm" step="0.1" min="0" />
        </section>
        <section class="Weight-Section">
          <header>
            <img src="../arts/weight-icon.png" alt="error" />
            <h5>Weight</h5>
          </header>
          <input type="number" class="Patient-Weight" id="Patient-Edit-Weight" name="Patient-Edit-Weight"
            placeholder="00 kg" step="0.1" min="0" />
        </section>
      </aside>
      <aside class="Patient-Prescription">
        <main class="Patient-Prescription-Container">
          <header>
            <h5>Prescriptions</h5>
          </header>
          <input type="text" class="Patient-Prescription-Input" id="Patient-Edit-Prescription-1"
            name="Patient-Edit-Prescription-1" />
          <input type="text" class="Patient-Prescription-Input" id="Patient-Edit-Prescription-2"
            name="Patient-Edit-Prescription-2" />
          <input type="text" class="Patient-Prescription-Input" id="Patient-Edit-Prescription-3"
            name="Patient-Edit-Prescription-3" />
        </main>
      </aside>
    </form>
  </section>
  <aside class="Adminpage-Navigation">
    <header class="Navigation-Header">
      <img src="../arts/Adminpage/logo-ptc.png" alt="error" />
      <p>Pateros Technological College</p>
      <h4 id="role">ADMINISTRATOR</h4>
    </header>
    <nav class="Navigation-Menu-Container">
      <button class="Navigation-Menu Navigation-Menu-Selected" id="Dashboard-Button">
        <img src="../arts/Adminpage/dashboard-menu-icon.png" alt="error" class="Navigation-Menu-Icon" />
        Dashboard
      </button>
      <button class="Navigation-Menu" id="Admin-Button">
        <img src="../arts/Adminpage/admin-menu-icon.png" alt="error" class="Navigation-Menu-Icon" />
        Administrator Management
      </button>
      <button class="Navigation-Menu" id="Patient-Button">
        <img src="../arts/Adminpage/patient-menu-icon.png" alt="error" class="Navigation-Menu-Icon" />
        Patient Management
      </button>
    </nav>
    <button class="Navigation-Menu" id="Logout-Button">
      <img src="../arts/Adminpage/logout-menu-icon.png" alt="error" class="Navigation-Menu-Icon" />
      Logout
    </button>
  </aside>
  <main class="Adminpage-Dashboard-Section">
    <header class="Section-Header">
      <h1 id="Account-Name">Welcome, Administrator!</h1>
      <p>Here’s a summary overview of your system for today.</p>
    </header>
    <section class="System-Count-Summary">
      <div class="Count-Summary">
        <p>Total Admin Account</p>
        <h2 id="Total-Admin-Account">0</h2>
      </div>
      <div class="Count-Summary">
        <p>Total Patient Records</p>
        <h2 id="Total-Patient-Record">0</h2>
      </div>
    </section>
  </main>
  <main class="Adminpage-Admin-Section">
    <header class="Section-Header">
      <h1>Administrator Account Information</h1>
      <p>Manage administrator accounts and make necessary adjustments to the system.</p>
    </header>
    <section class="Record-Container">
      <header>
        <aside class="Admin-Section-Date-Time">
          <p>Current date and time information is unavailable</p>
        </aside>
        <aside class="Search-Container">
          <button id="admin-add-button" title="Create Account?">Add New Account</button>
          <input type="text" placeholder="Search for administrator accounts..." id="admin-search-box" />
          <button id="admin-search-button" title="Search">Search</button>
          <button id="admin-refresh-button" title="Refresh">↻</button>
        </aside>
      </header>
      <main class="Admin-Record-Table-Container">
        <table class="Admin-Table-Data-Header">
          <tr>
            <th>Account_No</th>
            <th>Account Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Manage Accounts</th>
          </tr>
        </table>
        <div class="Admin-Table-Data-Container">
          <table class="Admin-Record-Table" id="Admin-Record-Table">
            <tr>
            </tr>
          </table>
        </div>
      </main>
    </section>
  </main>
  <main class="Adminpage-Patient-Section">
    <header class="Section-Header">
      <h1>Patient Management</h1>
      <p>View and manage patient records efficiently.</p>
    </header>
    <section class="Record-Container">
      <header>
        <aside class="Patient-Section-Date-Time">
          <p>Current date and time information is unavailable</p>
        </aside>
        <aside class="Search-Container">
          <button id="patient-add-button" title="Add Patient?">Add New Record</button>
          <input type="text" placeholder="Search for patient records..." id="patient-search-box" />
          <button id="patient-search-button" title="Search">Search</button>
          <button id="patient-refresh-button" title="Refresh">↻</button>
        </aside>
      </header>
      <main class="Patient-Record-Table-Container">
        <table class="Patient-Table-Data-Header">
          <tr>
            <th>Record_No</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th>Student Number</th>
            <th>Student Year Level</th>
            <th>Section</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Address</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Manage Records</th>
          </tr>
        </table>
        <div class="Patient-Table-Data-Container">
          <table class="Patient-Record-Table" id="Patient-Record-Table">
            <tr>
            </tr>
          </table>
        </div>
      </main>
    </section>
  </main>
</body>

</html>