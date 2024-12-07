document.addEventListener("DOMContentLoaded", () => {
  const patient_management_connection_php = "http://localhost:3000/backend/admin/patient_management.php";
  const Patient_Table = document.getElementById("Patient-Record-Table");

  const Patient_New_Image_Label = document.getElementById("Patient-New-Image-Label");
  const Patient_Edit_Image_Label = document.getElementById("Patient-Edit-Image-Label");
  const Patient_New_Image = document.getElementById("Patient-New-Image");
  const Patient_Edit_Image = document.getElementById("Patient-Edit-Image");

  const imageElements = [
    { input: Patient_New_Image, label: Patient_New_Image_Label },
    { input: Patient_Edit_Image, label: Patient_Edit_Image_Label },
  ];

  function patient_background_set() {
    const handleImageUpload = (inputElement, labelElement) => {
      inputElement.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function (e) {
            labelElement.style.backgroundImage = `url(${e.target.result})`;
            labelElement.style.backgroundSize = "cover";
            labelElement.style.backgroundPosition = "center";
            labelElement.querySelector("span").style.display = "none";
          };
          reader.readAsDataURL(file);
        }
      });
    };

    imageElements.forEach(({ input, label }) => {
      handleImageUpload(input, label);
    });
  }

  function fetchPatientRecords() {
    fetch(`${patient_management_connection_php}`)
      .then((response) => response.json())
      .then((data) => {
        Patient_Table.innerHTML = "";

        data.forEach((patient) => {
          const row = document.createElement("tr");
          row.setAttribute("data-record-no", patient.Record_No);
          row.innerHTML = `
                <td style="display: none;">
                  <img src="${patient.Image}" alt="Patient Image" style="display: none;">
                </td>
                <td>${patient.Record_No}</td> 
                <td>${patient.Name}</td>     
                <td>${patient.Age}</td>      
                <td>${patient.Gender}</td>   
                <td>${patient.Birthdate}</td>
                <td>${patient.Student_Number}</td>
                <td>${patient.Student_Year_Level}</td>
                <td>${patient.Section}</td>  
                <td>${patient.Phone_Number}</td> 
                <td>${patient.Email}</td>    
                <td>${patient.Address}</td>  
                <td>${patient.Height}</td>   
                <td>${patient.Weight}</td>
                <td style="display: none;">${patient.Illness1}</td>
                <td style="display: none;">${patient.Illness1_Date}</td>
                <td style="display: none;">${patient.Illness2}</td>
                <td style="display: none;">${patient.Illness2_Date}</td>
                <td style="display: none;">${patient.Illness3}</td>
                <td style="display: none;">${patient.Illness3_Date}</td>
                <td style="display: none;">${patient.Prescription1}</td>
                <td style="display: none;">${patient.Prescription2}</td>
                <td style="display: none;">${patient.Prescription3}</td>
                <td><button class="Patient-Edit-Button">Edit</button></td>
                <td><button class="Patient-Delete-Button">Delete</button></td>
              `;
          row.querySelector(".Patient-Delete-Button").addEventListener("click", () => {
            deletePatient(patient.Record_No, row);
          });
          Patient_Table.appendChild(row);
        });

        Open_Edit_Patient_Record();
      })
      .catch((error) => console.error("Error fetching patient record:", error));
  }

  function searchPatientRecords(query) {
    if (query === "") {
      fetchPatientRecords();
      return;
    }
    fetch(`${patient_management_connection_php}?search=${query}`)
      .then((response) => response.json())
      .then((data) => {
        Patient_Table.innerHTML = "";
        if (data.length === 0) {
          alert("No results found. Please refine your search and try again");
          fetchPatientRecords();
          return;
        } else {
          data.forEach((patient) => {
            const row = document.createElement("tr");
            row.setAttribute("data-record-no", patient.Record_No);
            row.innerHTML = `
                <td style="display: none;">
                  <img src="${patient.Image}" alt="Patient Image" style="display: none;">
                </td>
                <td>${patient.Record_No}</td>
                <td>${patient.Name}</td>     
                <td>${patient.Age}</td>      
                <td>${patient.Gender}</td>   
                <td>${patient.Birthdate}</td>
                <td>${patient.Student_Number}</td>
                <td>${patient.Student_Year_Level}</td>
                <td>${patient.Section}</td>  
                <td>${patient.Phone_Number}</td> 
                <td>${patient.Email}</td>    
                <td>${patient.Address}</td>  
                <td>${patient.Height}</td>   
                <td>${patient.Weight}</td>
                <td style="display: none;">${patient.Illness1}</td>
                <td style="display: none;">${patient.Illness1_Date}</td>
                <td style="display: none;">${patient.Illness2}</td>
                <td style="display: none;">${patient.Illness2_Date}</td>
                <td style="display: none;">${patient.Illness3}</td>
                <td style="display: none;">${patient.Illness3_Date}</td>
                <td style="display: none;">${patient.Prescription1}</td>
                <td style="display: none;">${patient.Prescription2}</td>
                <td style="display: none;">${patient.Prescription3}</td>
                <td><button class="Patient-Edit-Button">Edit</button></td>
                <td><button class="Patient-Delete-Button">Delete</button></td>
              `;
            row.querySelector(".Patient-Delete-Button").addEventListener("click", () => {
              deletePatient(patient.Record_No, row);
            });
            Patient_Table.appendChild(row);
          });
          Open_Edit_Patient_Record();
        }
      })
      .catch((error) => console.error("Error fetching patient record:", error));
  }

  function deletePatient(recordNo, row) {
    if (confirm("Are you sure you want to delete this patient record?")) {
      fetch(`${patient_management_connection_php}?record_no=${recordNo}`, {
        method: "GET",
      })
        .then((response) => response.text())
        .then((result) => {
          alert(result);
          row.remove();
        })
        .catch((error) => console.error("Error deleting patient record:", error));
    }
  }

  const Search_Box = document.getElementById("patient-search-box");
  const Search_Button = document.getElementById("patient-search-button");
  const Refresh_Button = document.getElementById("patient-refresh-button");

  patient_background_set();
  fetchPatientRecords();

  Refresh_Button.addEventListener("click", () => {
    fetchPatientRecords();
    Search_Box.value = "";
    setTimeout(() => {
      alert("Patient Records have been refreshed!");
    }, 300);
  });

  Search_Button.addEventListener("click", () => {
    const searchValue = Search_Box.value.trim();
    searchPatientRecords(searchValue);
  });

  const Form_Backdrop = document.getElementById("Popover-Backdrop-Container");
  const Admin_Add_Form = document.getElementById("Admin-Add-Form");
  const Admin_Edit_Form = document.getElementById("Admin-Edit-Form");
  const Patient_Add_Form = document.getElementById("Patient-Add-Form");
  const Patient_Edit_Form = document.getElementById("Patient-Edit-Form");

  function Close_All_Forms(...Form_ID) {
    Form_ID.forEach((form) => {
      form.style.display = "none";
    });
  }

  function Open_Form(Form_ID) {
    Form_Backdrop.style.display = "flex";
    Form_ID.style.display = "flex";
    Form_ID.reset();
  }

  function Close_Form(Form_ID) {
    Form_Backdrop.style.display = "none";
    Form_ID.style.display = "none";
  }

  function Validate_Form(Form_ID) {
    if (!Form_ID.checkValidity()) {
      Form_ID.reportValidity();
      return false;
    } else {
      return true;
    }
  }

  function Edit_Patient_Form(row_data) {
    const RecordNo_Field = document.getElementById("Patient-Edit-RecordNo");
    const Name_Field = document.getElementById("Patient-Edit-Name");
    const Age_Field = document.getElementById("Patient-Edit-Age");
    const Gender_Field = document.getElementById("Patient-Edit-Gender");
    const Birthdate_Field = document.getElementById("Patient-Edit-Birthdate");
    const StudentNumber_Field = document.getElementById("Patient-Edit-StudentNumber");
    const YearLevel_Field = document.getElementById("Patient-Edit-YearLevel");
    const Section_Field = document.getElementById("Patient-Edit-Section");
    const PhoneNumber_Field = document.getElementById("Patient-Edit-Phonenumber");
    const Email_Field = document.getElementById("Patient-Edit-Email");
    const Address_Field = document.getElementById("Patient-Edit-Address");
    const Height_Field = document.getElementById("Patient-Edit-Height");
    const Weight_Field = document.getElementById("Patient-Edit-Weight");
    const Illness1_Field = document.getElementById("Patient-Edit-Illness-1");
    const Illness1Date_Field = document.getElementById("Patient-Edit-Illness-Date-1");
    const Illness2_Field = document.getElementById("Patient-Edit-Illness-2");
    const Illness2Date_Field = document.getElementById("Patient-Edit-Illness-Date-2");
    const Illness3_Field = document.getElementById("Patient-Edit-Illness-3");
    const Illness3Date_Field = document.getElementById("Patient-Edit-Illness-Date-3");
    const Prescription1_Field = document.getElementById("Patient-Edit-Prescription-1");
    const Prescription2_Field = document.getElementById("Patient-Edit-Prescription-2");
    const Prescription3_Field = document.getElementById("Patient-Edit-Prescription-3");
    const Save_Button = document.getElementById("Patient-Save-Edit");
    const Cancel_Button = document.getElementById("Patient-Cancel-Edit");

    RecordNo_Field.value = row_data.children[1].innerText;
    Name_Field.value = row_data.children[2].innerText;
    Age_Field.value = row_data.children[3].innerText;
    Gender_Field.value = row_data.children[4].innerText;
    Birthdate_Field.value = row_data.children[5].innerText;
    StudentNumber_Field.value = row_data.children[6].innerText;
    YearLevel_Field.value = row_data.children[7].innerText;
    Section_Field.value = row_data.children[8].innerText;
    PhoneNumber_Field.value = row_data.children[9].innerText;
    Email_Field.value = row_data.children[10].innerText;
    Address_Field.value = row_data.children[11].innerText;
    Height_Field.value = row_data.children[12].innerText;
    Weight_Field.value = row_data.children[13].innerText;
    Illness1_Field.value = row_data.children[14].innerText;
    Illness1Date_Field.value = row_data.children[15].innerText;
    Illness2_Field.value = row_data.children[16].innerText;
    Illness2Date_Field.value = row_data.children[17].innerText;
    Illness3_Field.value = row_data.children[18].innerText;
    Illness3Date_Field.value = row_data.children[19].innerText;
    Prescription1_Field.value = row_data.children[20].innerText;
    Prescription2_Field.value = row_data.children[21].innerText;
    Prescription3_Field.value = row_data.children[22].innerText;

    const get_Patient_Image = row_data.children[0].querySelector("img");
    if (get_Patient_Image.src != "http://localhost:3000/web/Admin.php") {
      Patient_Edit_Image_Label.style.backgroundImage = `url('${get_Patient_Image.src}')`;
      Patient_Edit_Image_Label.style.backgroundSize = "cover";
      Patient_Edit_Image_Label.style.backgroundPosition = "center";
      Patient_Edit_Image_Label.querySelector("span").style.display = "none";
    } else {
      Patient_Edit_Image_Label.style.backgroundImage = "none";
      Patient_Edit_Image_Label.querySelector("span").style.display = "flex";
    }

    function saveChanges(event) {
      const originalData = {
        image: row_data.children[0].querySelector("img").src,
        recordNo: row_data.children[1].innerText,
        name: row_data.children[2].innerText,
        age: row_data.children[3].innerText,
        gender: row_data.children[4].innerText,
        birthdate: row_data.children[5].innerText,
        studentNumber: row_data.children[6].innerText,
        yearLevel: row_data.children[7].innerText,
        section: row_data.children[8].innerText,
        phoneNumber: row_data.children[9].innerText,
        email: row_data.children[10].innerText,
        address: row_data.children[11].innerText,
        height: row_data.children[12].innerText,
        weight: row_data.children[13].innerText,
        illness1: row_data.children[14].innerText,
        illness1Date: row_data.children[15].innerText,
        illness2: row_data.children[16].innerText,
        illness2Date: row_data.children[17].innerText,
        illness3: row_data.children[18].innerText,
        illness3Date: row_data.children[19].innerText,
        prescription1: row_data.children[20].innerText,
        prescription2: row_data.children[21].innerText,
        prescription3: row_data.children[22].innerText,
      };

      const currentData = {
        image: Patient_Edit_Image.files[0],
        recordNo: RecordNo_Field.value,
        name: Name_Field.value,
        age: Age_Field.value,
        gender: Gender_Field.value,
        birthdate: Birthdate_Field.value,
        studentNumber: StudentNumber_Field.value,
        yearLevel: YearLevel_Field.value,
        section: Section_Field.value,
        phoneNumber: PhoneNumber_Field.value,
        email: Email_Field.value,
        address: Address_Field.value,
        height: Height_Field.value,
        weight: Weight_Field.value,
        illness1: Illness1_Field.value,
        illness1Date: Illness1Date_Field.value,
        illness2: Illness2_Field.value,
        illness2Date: Illness2Date_Field.value,
        illness3: Illness3_Field.value,
        illness3Date: Illness3Date_Field.value,
        prescription1: Prescription1_Field.value,
        prescription2: Prescription2_Field.value,
        prescription3: Prescription3_Field.value,
      };

      const hasChanges = Object.keys(originalData).some((key) => originalData[key] !== currentData[key]);

      if (!hasChanges) {
        event.preventDefault();
        alert("No changes detected. Please make modifications before saving.");
        return;
      }

      if (confirm("Are you sure you want to save these changes? This action cannot be undone.")) {
        if (Validate_Form(Patient_Edit_Form)) {
          Close_Patient_Edit_Form();
        }
      } else {
        event.preventDefault();
      }
    }

    function Close_Patient_Edit_Form() {
      Close_Form(Patient_Edit_Form);
      Save_Button.removeEventListener("click", saveChanges);
      Cancel_Button.removeEventListener("click", saveChanges);
    }

    Save_Button.addEventListener("click", saveChanges);
    Cancel_Button.addEventListener("click", Close_Patient_Edit_Form);
  }

  function Open_Edit_Patient_Record() {
    const row_Patient_Edit_Button = document.querySelectorAll(".Patient-Edit-Button");
    row_Patient_Edit_Button.forEach((button) => {
      button.addEventListener("click", () => {
        const get_data = button.closest("tr");
        Close_All_Forms(Admin_Add_Form, Admin_Edit_Form, Patient_Add_Form);
        Open_Form(Patient_Edit_Form);
        Edit_Patient_Form(get_data);
      });
    });
  }
});
