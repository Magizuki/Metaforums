
var email, username, password, confirmpassword, usernameIsNotExist, flag

$('#spinner').hide()

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
    $('#spinner').show()
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
                $('#spinner').hide()
                document.getElementById('errorMessage').innerHTML = data['error_message']
            }
        }
    })

}

function handleRegisterForm() {

    
    document.getElementById('errorMessage').innerHTML = ""

    email = document.getElementById("email").value
    username = document.getElementById("username").value
    Username_IsNotExist()
    password = document.getElementById("password").value 
    confirmpassword = document.getElementById("confirmpassword").value

    // var patt1 ini adalah regex untuk ngecek apakah username sudah alphanumeric atau belum
    var patt1 = /^[a-z0-9-\'_\.,:\(\)&\[\]\/+=\?#@ \xC0-\xFF]+$/i

    if(email == "" || email.indexOf(".") == -1 || email.indexOf("@") == -1){
        
        document.getElementById('errorMessage').innerHTML = "Invalid e-mail format"
        return 
        //$('#errorMessage').text = "Invalid e-mail format"
        // alert("Invalid e-mail format")
        
    }
    if((username.length < 6 || username.length > 20 ) || username.match(patt1) != username )
    {        
        document.getElementById('errorMessage').innerHTML = "Username is already taken/ Username must only contain alphanumeric characters / Username must be between 6 and 20 characters long"
        return 
    }
    if(password.length < 8 )
    {   document.getElementById('errorMessage').innerHTML = "Password must be at least 8 characters long"
        return
    }
    if(password != confirmpassword )
    {        
        document.getElementById('errorMessage').innerHTML = "Please correctly confirm the password"
        return
    }
    else
    {        
        submitRegisterForm()
        return
    }

}

