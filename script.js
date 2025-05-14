/*
function myFunction() {
    alert("Hello from external JS file!");
    return false;
  }

*/

function validateForm() {
    const checkbox = document.getElementById('privacy');
    const errorMessage = document.getElementById('error-message');
  
    if (!checkbox.checked) {
      errorMessage.textContent = "⚠️ لازم توافق على الشروط قبل ما تسجل!";
      checkbox.classList.add('glow-red', 'shake');
  
      setTimeout(() => {
        checkbox.classList.remove('glow-red', 'shake');
      }, 500);
  
      return false; // ما يخلي الفورم ينرسل
    }
  
    errorMessage.textContent = "";
    return true; // كلشي تمام
}



function loginWithGoogle() {
    alert("Sign in with Google isn't enabled yet.");
  }


/* Eye 

  function togglePassword() {
    var passwordField = document.getElementById("password");
    var eyeIcon = document.getElementById("eye");

    // إذا كانت كلمة المرور مخفية، غيرها إلى نص عادي
    if (passwordField.type === "password") {
        passwordField.type = "text";
        eyeIcon.textContent = "🙈";  // غير العين إلى إغلاق
    } else {
        passwordField.type = "password";
        eyeIcon.textContent = "👁️";  // غير العين إلى عرض
    }
} 



function toggleConfirmPassword() {
  var confirmpasswordField = document.getElementById("Confirm password");
  var eyeIcon = document.getElementById("eye");

  // إذا كانت كلمة المرور مخفية، غيرها إلى نص عادي
  if (confirmpasswordField.type === "Confirm password") {
      confirmpasswordField.type = "text";
      eyeIcon.textContent = "🔒";  // غير العين إلى إغلاق
  } else {
      confirmpasswordField.type = "Confirm password";
      eyeIcon.textContent = "🔓";  // غير العين إلى عرض
  }
} 
*/

/*
function togglePassword(inputId, icon) {
  const passwordField = document.getElementById(inputId);

  if (passwordField.type === "password") {
      passwordField.type = "text";
      icon.textContent = "🔒";
  } else {
      passwordField.type = "password";
      icon.textContent = "🔓";
  }
}


*/



function togglePassword() {
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eye");

    // toggle النوع
    const isPassword = passwordField.type === "password";
    passwordField.type = isPassword ? "text" : "password";

    // حدث الأيقونة حسب الحالة الجديدة
    eyeIcon.textContent = isPassword ? "🔓" : "🔒";
}

// ✨ تزامن مبدئي عند تحميل الصفحة
window.onload = function() {
    const passwordField = document.getElementById("password");
    const eyeIcon = document.getElementById("eye");
    eyeIcon.textContent = passwordField.type === "password" ? "🔒" : "🔓";
};