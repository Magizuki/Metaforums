
function createThread(IdSubTopic, IdUser)
{

    var title = document.getElementById('title').value
    var message = document.getElementById('message').value
    
    if(title == "" || message == "")
    {
        alert("Title or Message cannot be empty")
        return
    }

    $.ajax({
        type: 'POST',
        url:"http://localhost/Metaforums/Servers/server.create_thread.php",
        data:
        {
            title,
            message,
            IdSubTopic,
            IdUser
        },
        success: function(data)
        {
            console.log(data)
            data = JSON.parse(data)

            if(data['status'] == 'success')
            {
                alert('Success Creating Thread')
                window.location = 'http://localhost/Metaforums/views/Home.php'
            }
            else if(data['status'] == 'failed')
            {
                alert('Create Thread Failed')
            }

        }
    })


}