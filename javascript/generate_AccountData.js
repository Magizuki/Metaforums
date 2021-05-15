
function generate_Data(evt, target)
{

    var Profile = document.getElementById("Profile")
    var AccountManagement = document.getElementById("Account_Management")
    var navlinks = document.getElementsByClassName("nav-link")

    for(var i = 0; i < navlinks.length; i++)
    {
        navlinks[i].className = navlinks[i].className.replace(" active", "")
    }

    Profile.style.display = "none"
    AccountManagement.style.display = "none"

    var ActiveTab = document.getElementById(target)
    ActiveTab.style.display = "inline-block"

    if (target == "Profile")
    {
        navlinks[0].className += " active"
    }
    else
    {
        navlinks[1].className += " active"
    }

}
