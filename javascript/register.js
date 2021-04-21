
var email, username, password, confirmpassword, usernameIsNotExist


function Username_IsNotExist()
{
        console.log(username)
        $.ajax({
        type: 'POST',
        url: 'http://localhost/Metaforums/servers/server.check_username.php',
        data: {
            username 
        },
        success: function(data)
        {
            data = JSON.parse(data);
            console.log(data['isNotExist'])

            usernameIsNotExist = data['isNotExist']
            console.log(usernameIsNotExist);
            
        }
    
    })
}

function submitRegisterForm()
{
    console.log(username + " " + email + " " + password)

    $.ajax({
        type: 'POST',
        url: 'http://localhost/Metaforums/servers/server.register.php',
        data: {
            username,
            email,
            password
        },
        success: function(data)
        {
            data = JSON.parse(data);
            if(data['status'] == 'success')
            {
                alert('User Successfully Registered')
                window.location = 'http://localhost/Metaforums/views/auth/Login.php'
                
            }
            else if(data['status'] == 'failed')
            {
                document.getElementById('errorMessage').innerHTML = data['error_message']
            }
        }
    })

}



function handleRegisterForm() {

    email = document.getElementById("email").value
    username = document.getElementById("username").value
    password = document.getElementById("password").value 
    confirmpassword = document.getElementById("confirmpassword").value

    Username_IsNotExist()

    // var patt1 ini adalah regex untuk ngecek apakah username sudah alphanumeric atau belum
    var patt1 = /^[a-z0-9-\'_\.,:\(\)&\[\]\/+=\?#@ \xC0-\xFF]+$/i

    if(email == "" || email.indexOf(".") == -1 || email.indexOf("@") == -1 ){
        document.getElementById('errorMessage').innerHTML = "Invalid e-mail format" 
        //$('#errorMessage').text = "Invalid e-mail format"
        // alert("Invalid e-mail format")
        
    }
    else if(usernameIsNotExist == 'false' || ( username.length < 6 || username.length > 20 ) || username.match(patt1) != username )
    {
        document.getElementById('errorMessage').innerHTML = "Username is already taken/ Username must only contain alphanumeric characters / Username must be between 6 and 20 characters long"
    }
    else if(password.length < 8)
    {
        document.getElementById('errorMessage').innerHTML = "Password must be at least 8 characters long"
    }
    else if(password != confirmpassword)
    {
        document.getElementById('errorMessage').innerHTML = "Please correctly confirm the password"
    }
    else
    {
        submitRegisterForm()
    }

}

