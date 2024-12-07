document.addEventListener("DOMContentLoaded", () => {
  const System_Navigation = document.querySelector(".System-Navigation");
  const Admin_Button = document.getElementById("Admin_Button");
  const Admin_Close_Button = document.getElementById("admin_close_button");
  const Admin_Form = document.getElementById("Admin-Form");

  const Login_Here_Button = document.getElementById("Login_Here_Button");
  const Create_Here_Button = document.getElementById("Create_Button");

  const Create_Close_Button = document.getElementById("create_close_button");
  const Create_Form = document.getElementById("Create-Admin-Form");

  const Close_Patient_Form = document.getElementById("Close_Patient_Form");
  const Patient_Button = document.getElementById("Patient_Button");
  const Patient_Form = document.getElementById("Patient-Form");

  const imageUpload = document.getElementById("image-upload");
  const patientLabel = document.querySelector(".Patient-Image");
  function patient_background_set() {
    imageUpload.addEventListener("change", function () {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
          patientLabel.style.backgroundImage = `url(${e.target.result})`;
          patientLabel.style.backgroundSize = "cover";
          patientLabel.style.backgroundPosition = "center";
          patientLabel.querySelector("span").style.display = "none";
        };
        reader.readAsDataURL(file);
      }
    });
  }

  Admin_Button.addEventListener("click", () => {
    System_Navigation.style.display = "none";
    Admin_Form.style.display = "flex";
    Admin_Form.reset();
  });

  Admin_Close_Button.addEventListener("click", () => {
    Admin_Form.style.display = "none";
    System_Navigation.style.display = "flex";
    Admin_Form.reset();
  });

  Create_Here_Button.addEventListener("click", () => {
    Admin_Form.style.display = "none";
    Create_Form.style.display = "flex";
    Create_Form.reset();
  });

  Create_Close_Button.addEventListener("click", () => {
    Create_Form.style.display = "none";
    System_Navigation.style.display = "flex";
    Create_Form.reset();
  });

  Login_Here_Button.addEventListener("click", () => {
    Create_Form.style.display = "none";
    Admin_Form.style.display = "flex";
    Admin_Form.reset();
  });

  Patient_Button.addEventListener("click", () => {
    System_Navigation.style.display = "none";
    Patient_Form.style.display = "flex";
  });

  Close_Patient_Form.addEventListener("click", () => {
    Patient_Form.style.display = "none";
    System_Navigation.style.display = "flex";
  });

  patient_background_set();
});
