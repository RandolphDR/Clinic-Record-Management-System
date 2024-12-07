document.addEventListener("DOMContentLoaded", () => {
  const Adminpage_Sections = {
    "Dashboard-Button": ".Adminpage-Dashboard-Section",
    "Admin-Button": ".Adminpage-Admin-Section",
    "Patient-Button": ".Adminpage-Patient-Section",
  };

  const TimeDate_Elements = [
    document.querySelector(".Admin-Section-Date-Time p"),
    document.querySelector(".Patient-Section-Date-Time p"),
  ];

  const Form_Backdrop = document.getElementById("Popover-Backdrop-Container");
  const Admin_Add_Form = document.getElementById("Admin-Add-Form");
  const Admin_Edit_Form = document.getElementById("Admin-Edit-Form");
  const Patient_New_Image_Label = document.getElementById(
    "Patient-New-Image-Label"
  );
  const Patient_Edit_Image_Label = document.getElementById(
    "Patient-Edit-Image-Label"
  );
  const Patient_Add_Form = document.getElementById("Patient-Add-Form");
  const Patient_Edit_Form = document.getElementById("Patient-Edit-Form");

  function Toggle_Active_Menu(containerSelector, activeClass, sectionsMap) {
    const container = document.querySelector(containerSelector);

    container.addEventListener("click", (event) => {
      const selectedButton =
        event.target.tagName === "BUTTON"
          ? event.target
          : event.target.closest("button");
      if (!selectedButton) return;

      container.querySelector(`.${activeClass}`)?.classList.remove(activeClass);
      selectedButton.classList.add(activeClass);

      Object.entries(sectionsMap).forEach(([buttonId, sectionSelector]) => {
        const section = document.querySelector(sectionSelector);
        section.style.display =
          selectedButton.id === buttonId ? "flex" : "none";
      });
    });
  }

  document.querySelector(Adminpage_Sections["Dashboard-Button"]).style.display =
    "flex";
  Object.values(Adminpage_Sections).forEach((sectionSelector) => {
    if (sectionSelector !== Adminpage_Sections["Dashboard-Button"]) {
      document.querySelector(sectionSelector).style.display = "none";
    }
  });

  function updateDateTime() {
    const now = new Date();
    const date_format = {
      weekday: "long",
      year: "numeric",
      month: "long",
      day: "numeric",
      hour: "2-digit",
      minute: "2-digit",
      second: "2-digit",
    };
    TimeDate_Elements.forEach((element) => {
      element.textContent = now.toLocaleString("en-US", date_format);
    });
  }

  function Close_All_Forms(...Form_ID) {
    Form_ID.forEach((form) => {
      form.style.display = "none";
    });
  }

  function Open_Form(Form_ID) {
    Patient_New_Image_Label.style.backgroundImage = "none";
    Patient_Edit_Image_Label.style.backgroundImage = "none";
    Patient_New_Image_Label.querySelector("span").style.display = "flex";
    Patient_Edit_Image_Label.querySelector("span").style.display = "flex";
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

  function Create_Account_Form() {
    const Create_Account_Button = document.getElementById(
      "Admin-Create-Account"
    );
    const Cancel_Button = document.getElementById("Admin-Cancel-Account");

    Create_Account_Button.addEventListener("click", () => {
      if (Validate_Form(Admin_Add_Form)) {
        Close_Form(Admin_Add_Form);
      }
    });
    Cancel_Button.addEventListener("click", () => Close_Form(Admin_Add_Form));
  }

  function Open_Add_Admin_Information() {
    const Admin_Add_Button = document.getElementById("admin-add-button");
    Admin_Add_Button.addEventListener("click", () => {
      Close_All_Forms(Admin_Edit_Form, Patient_Add_Form, Patient_Edit_Form);
      Open_Form(Admin_Add_Form);
      Create_Account_Form();
    });
  }

  function Create_Record_Form() {
    const Create_Record_Button = document.getElementById("Patient-Create-New");
    const Cancel_Button = document.getElementById("Patient-Cancel-New");

    Create_Record_Button.addEventListener("click", () => {
      if (Validate_Form(Patient_Add_Form)) {
        Close_Form(Patient_Add_Form);
      }
    });
    Cancel_Button.addEventListener("click", () => Close_Form(Patient_Add_Form));
  }

  function Open_Add_Patient_Record() {
    const Patient_Add_Button = document.getElementById("patient-add-button");
    Patient_Add_Button.addEventListener("click", () => {
      Close_All_Forms(Admin_Add_Form, Admin_Edit_Form, Patient_Edit_Form);
      Open_Form(Patient_Add_Form);
      Create_Record_Form();
    });
  }

  Toggle_Active_Menu(
    ".Navigation-Menu-Container",
    "Navigation-Menu-Selected",
    Adminpage_Sections
  );
  setInterval(updateDateTime, 1000);
  updateDateTime();
  Open_Add_Admin_Information();
  Open_Add_Patient_Record();

  const Logout = document.getElementById("Logout-Button");
  function Logout_Account() {
    fetch("http://localhost:3000/backend/admin/logout.php", { method: "POST" })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          location.replace("../index.php");
        } else {
          alert("Logout failed. Please try again.");
        }
      })
      .catch((error) => console.error("Logout error:", error));
  }

  function Testing_Brackets() {}

  Logout.addEventListener("click", () => {
    if (confirm("Logout your account?")) {
      Logout_Account();
    }
  });
});
