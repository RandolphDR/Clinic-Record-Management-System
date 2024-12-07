document.addEventListener("DOMContentLoaded", () => {
  // Change the link of this according to the localhost of your dashboard.php
  const dashboard_connection_php = "http://localhost:3000/backend/admin/dashboard.php";
  var Account_Name_Display = document.getElementById("Account-Name");
  var Admin_Count_Display = document.getElementById("Total-Admin-Account");
  var Patient_Count_Display = document.getElementById("Total-Patient-Record");

  function Auto_Logout() {
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

  function update_Counts() {
    fetch(dashboard_connection_php)
      .then((response) => response.json())
      .then((data) => {
        console.log(data);

        if (data.account_name) {
          Account_Name_Display.textContent = "Welcome, " + data.account_name + "!";
        } else {
          alert("Invalid user access credentials found. You will be forced to logged out.");
          setTimeout(() => {
            Auto_Logout();
          }, 100);
        }

        if (!data.error) {
          Admin_Count_Display.textContent = data.admin_count;
          Patient_Count_Display.textContent = data.patient_count;
        } else {
          console.error(data.error);
        }
      })
      .catch((error) => console.error("Error fetching data:", error));
  }

  update_Counts();
  setInterval(update_Counts, 5000);
});
