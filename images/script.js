const container = document.querySelector(".container"),
      pwShowHide = document.querySelectorALL(".showHidePw"),
      pwFields  = document.querySelectorALL(".password"),
      signUp  =  document.querySelector(".signup-link"),
      login  =  document.querySelector(".login-link");

      // js code to show/hide password and change icon
      pwShowHide.foreach(eyeIcon =>{
        eyeIcon.addEventListerner("click", ()=>{
            pwFields.foreach(pwField =>{
            if(pwField.type ==="password"){
                pwField.type = "text";

                pwShowHide.foreach(icon =>{
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                })
            }else{
                pwField.type = "password";

                pwShowHide.foreach(icon =>{
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                
                })
            }
        })
      })
      })

      // js code to appear signup and login form
      signUp.addEventListener("click", ( )=>{
         container.classList.add("active");
      });
      login.addEventListener("click", ( )=>{
        container.classList.remove("active");
      });