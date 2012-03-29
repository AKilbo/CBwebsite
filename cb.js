

function gradient(id, level)
{
  var box = document.getElementById(id);
  box.style.opacity = level;
  box.style.MozOpacity = level;
  box.style.KhtmlOpacity = level;
  box.style.filter = "alpha(opacity=" + level * 100 + ")";
  box.style.display="block";
  return;
}


function fadein(id) 
{
  var level = 0;
  while(level <= 1)
  {
    setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
    level += 0.01;
  }
}


// Open the lightbox


function openbox(fadin, forum)
{
  var whichbox = forum;
  var box = document.getElementById(box); 
  document.getElementById('shadowing').style.display='block';
  
  if(fadin)
  {
   gradient(forum, 0);
   fadein(forum);
  }
  else
  {   
    box.style.display='block';
  }   
}


// Close the lightbox

function closebox(forum)
{
   document.getElementById(forum).style.display='none';
   document.getElementById('shadowing').style.display='none';
}


