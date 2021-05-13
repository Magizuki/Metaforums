function generateSubTopic(evt, targetClass) {
  // Declare all variables
  var i, tablinks;
  console.log(subtopics);
  tablinks = document.getElementsByClassName("tablinks");
  
   
  // Get all subtopic element and hide them
  for (i = 0; i < subtopics.length; i++) {
      var subtopic_element = document.getElementsByClassName(subtopics[i]);
      
      for(j = 0; j <  subtopic_element.length; j++)
      {
          subtopic_element[j].style.display = "none";
      }
 
  }

  //reset thread display
  
  for (i = 0; i < topics.length; i++) {
      console.log(topics[i])
      var topic_element = document.getElementsByClassName(topics[i]);
      for(j = 0; j <  topic_element.length; j++)
      {
          topic_element[j].style.display = "none";
      }
  }

  // Get all elements with class="tablinks" and remove the class "active"
 
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  for (i = 0; i < topics.length; i++) {
      var topic_element = document.getElementsByClassName(topics[i]);
      for(j = 0; j <  topic_element.length; j++)
      {
          topic_element[j].className = topic_element[j].className.replace(" active", "");
      }
      
  }

  var ActiveTab = document.getElementsByClassName(targetClass);
  console.log(targetClass);
  for(i = 0; i<ActiveTab.length; i++)
  {
    ActiveTab[i].style.display="block"
  }

  evt.currentTarget.className += " active";
  
}

function generateThread(evt, targetClass)
{
   // Declare all variables
  var i, tablinks;

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < subtopics.length; i++) {
      var subtopic_element = document.getElementsByClassName(subtopics[i]);
      
      for(j = 0; j <  subtopic_element.length; j++)
      {
          subtopic_element[j].style.display = "none";
      }
 
  }
  console.log(topics);
  for (i = 0; i < topics.length; i++) {
      var topic_element = document.getElementsByClassName(topics[i]);
      for(j = 0; j <  topic_element.length; j++)
      {
          
          topic_element[j].className = topic_element[j].className.replace(" active", "");
      }
      
  }

  var ActiveTab = document.getElementsByClassName(targetClass);
  for(i = 0; i<ActiveTab.length; i++)
  {
      ActiveTab[i].style.display="block"
  }
  evt.currentTarget.className += " active";
      
}

