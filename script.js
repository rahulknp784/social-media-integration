$(document).ready(function(){   
 
    // add event listener on the login button
    
    $("#loginfb").click(function(){
   
       facebookLogin();
   
      
    });
   
    // add event listener on the logout button
   
    $("#logout").click(function(){
   
      $("#contener").hide();
      $("#loginfb").show();
      $("#status").empty();
      facebookLogout();
   
    });
   
   
    function facebookLogin()
    {
      FB.getLoginStatus(function(response) {
          console.log(response);
          statusChangeCallback(response);
      });
    }
   
    function statusChangeCallback(response)
    {
        console.log(response);
        if(response.status === "connected")
        {  $("#contener").hide();
           $("#loginfb").show();
           $("#logout").show(); 
           fetchUserProfile();
        }
        else{
            // Logging the user to Facebook by a Dialog Window
            facebookLoginByDialog();
        }
    }
   
    function fetchUserProfile()
    {
      console.log('Welcome!  Fetching your information.... ');
      FB.api('/me', {locale: 'en_US', fields: 'id,name,email,link,gender,locale,picture'}, function(response) {
        console.log(response);
        console.log('Successful login for: ' + response.name);
        var profile = `<h1>Welcome ${response.name}<h1>
         <h2>Your email is ${response.email}</h2>
         <img src="${response.picture.data.url}">
           <a href="index.php">Logout</a>`;

        $("#status").append(profile);
      });
    }
   
    function facebookLoginByDialog()
    {
      FB.login(function(response) {
         
          statusChangeCallback(response);
         
      }, {scope: 'public_profile,email'});
    }
   
    // logging out the user from Facebook
   
    function facebookLogout()
    {
      FB.logout(function(response) {
          statusChangeCallback(response);
      });
    }
   
   
   });