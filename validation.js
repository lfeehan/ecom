function validateForm()
{
  var fn=document.getElementById("firstname").value;
  var sn=document.getElementById("lastname").value;
  var addr1=document.getElementById("address1").value;
  var addr2=document.getElementById("address2").value;
  var city=document.getElementById("city").value;
  var country=document.getElementById("country").value;
  var email=document.getElementById("email").value;
    
     //Check each input
  if(isAlphabet(fn, "Please Enter a Valid Name"))
  {
    if(isAlphabet(sn, "Please Enter a Valid Name"))
    {
      if(isAlphanumeric(addr1, "Please Enter a Valid Address"))
      {
        if(isAlphanumeric(addr2, "Please Enter a Valid Address"))
        {
          if(isAlphanumeric(city, "Please Enter a Valid Address"))
          {    
            if(isAlphanumeric(country, "Please Enter a Valid Address"))  
            {
              if(emailValidator(email, "Please Enter a Valid Email Address"))
              {
                return true;
              }
             } 
           }   
        }   
      }
    }
  }
  return false;
}
   
function notEmpty(elem, helperMsg)
{
  if(elem.length==0)
  {
      alert(helperMsg);
      elem.focus();
      return false;
  }
  return true;
}
    
function isAlphabet(elem, helperMsg)
{
  var alphaExp=/^[a-zA-Z]+$/;
  if(elem.match(alphaExp))
  {
      return true;
  }
  else
  {
      alert(helperMsg);
      elem.focus;
      return false;
  }
}
    
function isAlphanumeric(elem, helperMsg)
{

  var alphaExp=/^[0-9a-zA-Z ]+$/;

  if(elem.match(alphaExp))
  {
      return true;
  }
  else
  {
      alert(helperMsg);
      elem.focus;
      return false;
  }
}
    
function emailValidator(elem, helperMsg)
{
  var emailExp=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
  if(elem.match(emailExp))
  {
      return true;
  }
  else
  {
      alert(helperMsg+elem);
      elem.focus;
      return false;
  }
}
