
var email, username, password, confirmpassword, usernameIsNotExist, flag


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
            console.log(data);
            data = JSON.parse(data);

            usernameIsNotExist = data['isNotExist']

            if(usernameIsNotExist == 'false')
            {
                document.getElementById('errorMessage').innerHTML = "Username is already taken/ Username must only contain alphanumeric characters / Username must be between 6 and 20 characters long"
                window.stop()
            }

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
            console.log(data)
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

    flag = 0
    document.getElementById('errorMessage').innerHTML = ""

    email = document.getElementById("email").value
    username = document.getElementById("username").value
    Username_IsNotExist()
    password = document.getElementById("password").value 
    confirmpassword = document.getElementById("confirmpassword").value

    // var patt1 ini adalah regex untuk ngecek apakah username sudah alphanumeric atau belum
    var patt1 = /^[a-z0-9-\'_\.,:\(\)&\[\]\/+=\?#@ \xC0-\xFF]+$/i

    if(email == "" || email.indexOf(".") == -1 || email.indexOf("@") == -1 && flag == 0){
        flag = 1
        document.getElementById('errorMessage').innerHTML = "Invalid e-mail format" 
        //$('#errorMessage').text = "Invalid e-mail format"
        // alert("Invalid e-mail format")
        
    }
    if((username.length < 6 || username.length > 20 ) || username.match(patt1) != username && flag == 0 )
    {
        flag = 1
        console.log("Hello World")
        document.getElementById('errorMessage').innerHTML = "Username is already taken/ Username must only contain alphanumeric characters / Username must be between 6 and 20 characters long"
    }
    if(password.length < 8 && flag == 0)
    {
        flag = 1
        document.getElementById('errorMessage').innerHTML = "Password must be at least 8 characters long"
    }
    if(password != confirmpassword && flag == 0)
    {
        flag = 1
        document.getElementById('errorMessage').innerHTML = "Please correctly confirm the password"
    }
    else
    {
        flag = 1
        console.log(usernameIsNotExist)
        submitRegisterForm()
    }

}

