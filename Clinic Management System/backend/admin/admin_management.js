document.addEventListener("DOMContentLoaded", () => {
  const admin_management_connection_php = "http://localhost:3000/backend/admin/admin_management.php";
  const Admin_Table = document.getElementById("Admin-Record-Table");

  function fetchAdminRecords() {
    fetch(`${admin_management_connection_php}`)
      .then((response) => response.json())
      .then((data) => {
        Admin_Table.innerHTML = "";

        data.forEach((admin) => {
          const row = document.createElement("tr");
          row.setAttribute("data-account-no", admin.Account_No);
          row.innerHTML = `
              <td>${admin.Account_No}</td>
              <td>${admin.Account_Name}</td>
              <td>${admin.Username}</td>
              <td>${admin.Email}</td>
              <td class="password-cell">${admin.Password}</td>
              <td><button class="Admin-Edit-Button">Edit</button></td>
              <td><button class="Admin-Delete-Button">Delete</button></td>
            `;
          row.querySelector(".Admin-Delete-Button").addEventListener("click", () => {
            deleteAdmin(admin.Account_No, row);
          });
          Admin_Table.appendChild(row);
        });

        Open_Edit_Admin_Information();
        Hide_Admin_Passwords();
      })
      .catch((error) => console.error("Error fetching admin accounts:", error));
  }

  function searchAdminAccounts(query) {
    if (query === "") {
      fetchAdminRecords();
      return;
    }

    fetch(`${admin_management_connection_php}?search=${query}`)
      .then((response) => response.json())
      .then((data) => {
        Admin_Table.innerHTML = "";

        if (data.length === 0) {
          alert("No results found. Please refine your search and try again");
          fetchAdminRecords();
          return;
        } else {
          data.forEach((admin) => {
            const row = document.createElement("tr");
            row.setAttribute("data-account-no", admin.Account_No);
            row.innerHTML = `
              <td>${admin.Account_No}</td>
              <td>${admin.Account_Name}</td>
              <td>${admin.Username}</td>
              <td>${admin.Email}</td>
              <td class="password-cell">${admin.Password}</td>
              <td><button class="Admin-Edit-Button">Edit</button></td>
              <td><button class="Admin-Delete-Button">Delete</button></td>
            `;
            row.querySelector(".Admin-Delete-Button").addEventListener("click", () => {
              deleteAdmin(admin.Account_No, row);
            });
            Admin_Table.appendChild(row);
          });

          Open_Edit_Admin_Information();
          Hide_Admin_Passwords();
        }
      })
      .catch((error) => console.error("Error searching admin accounts:", error));
  }

  function deleteAdmin(accountNo, row) {
    if (confirm("Are you sure you want to delete this account?")) {
      fetch(`${admin_management_connection_php}?account_no=${accountNo}`, { method: "GET" })
        .then((response) => response.text())
        .then((result) => {
          alert(result);
          row.remove();
        })
        .catch((error) => console.error("Error deleting admin account:", error));
    }
  }

  const Search_Box = document.getElementById("admin-search-box");
  const Search_Button = document.getElementById("admin-search-button");
  const Refresh_Button = document.getElementById("admin-refresh-button");

  fetchAdminRecords();

  Refresh_Button.addEventListener("click", () => {
    fetchAdminRecords();
    Search_Box.value = "";
    setTimeout(() => {
      alert("Admin Records has been refreshed!");
    }, 300);
  });

  Search_Button.addEventListener("click", () => {
    const searchValue = Search_Box.value.trim();
    searchAdminAccounts(searchValue);
  });

  function Hide_Admin_Passwords() {
    const rows = Admin_Table.querySelectorAll("tr");

    rows.forEach((row, index) => {
      if (index === -1) return;

      const passwordCell = row.querySelector(".password-cell");
      const passwordText = passwordCell.innerText;

      passwordCell.dataset.originalPassword = passwordText;
      passwordCell.innerText = "•".repeat(passwordText.length);
    });
  }

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

  function Edit_Account_Form(row_data) {
    const AccountNo_Field = document.getElementById("Admin-Edit-AccountNo");
    const AccountName_Field = document.getElementById("Admin-Edit-Account-Name");
    const Username_Field = document.getElementById("Admin-Edit-Username");
    const Email_Field = document.getElementById("Admin-Edit-Email");
    const Password_Field = document.getElementById("Admin-Edit-Password");
    const Save_Button = document.getElementById("Admin-Save-Edit");
    const Cancel_Button = document.getElementById("Admin-Cancel-Edit");

    // Set initial values
    AccountNo_Field.value = row_data.children[0].innerText;
    AccountName_Field.value = row_data.children[1].innerText;
    Username_Field.value = row_data.children[2].innerText;
    Email_Field.value = row_data.children[3].innerText;
    Password_Field.value = row_data.children[4].dataset.originalPassword || row_data.children[4].innerText;

    function saveChanges(event) {
      // Gather original and current values for comparison
      const originalData = {
        accountNo: row_data.children[0].innerText,
        accountName: row_data.children[1].innerText,
        username: row_data.children[2].innerText,
        email: row_data.children[3].innerText,
        password: row_data.children[4].dataset.originalPassword || row_data.children[4].innerText,
      };

      const currentData = {
        accountNo: AccountNo_Field.value,
        accountName: AccountName_Field.value,
        username: Username_Field.value,
        email: Email_Field.value,
        password: Password_Field.value,
      };

      // Check if any changes exist
      const hasChanges = Object.keys(originalData).some((key) => originalData[key] !== currentData[key]);

      if (!hasChanges) {
        event.preventDefault();
        alert("No changes detected. Please make modifications before saving.");
        return;
      }

      if (confirm("Are you sure you want to save these changes? This action cannot be undone.")) {
        if (Validate_Form(Admin_Edit_Form)) {
          Close_Admin_Edit_Form();
        }
      } else {
        event.preventDefault();
      }
    }

    function Close_Admin_Edit_Form() {
      Close_Form(Admin_Edit_Form);
      Save_Button.removeEventListener("click", saveChanges);
      Cancel_Button.removeEventListener("click", Close_Admin_Edit_Form);
    }

    Save_Button.addEventListener("click", saveChanges);
    Cancel_Button.addEventListener("click", Close_Admin_Edit_Form);
  }

  function Open_Edit_Admin_Information() {
    const row_Admin_Edit_Button = document.querySelectorAll(".Admin-Edit-Button");
    row_Admin_Edit_Button.forEach((button) => {
      button.addEventListener("click", () => {
        const get_data = button.closest("tr");
        Close_All_Forms(Admin_Add_Form, Patient_Add_Form, Patient_Edit_Form);
        Open_Form(Admin_Edit_Form);
        Edit_Account_Form(get_data);
      });
    });
  }
});
