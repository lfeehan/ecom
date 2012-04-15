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
        if(isAlphabet(fn, "Letters Only in Name"))
        {
          if(isAlphabet(sn, "Letters Only in Name"))
          {
            if(isAlphanumeric(addr1, "Letters and Numbers Only in Addresss"))
            {
              if(isAlphanumeric(addr2, "Letters and Numbers Only in Addresss"))
              {
                if(isAlphanumeric(city, "Letters and Numbers Only in Addresss"))
                {    
                  if(isAlphanumeric(country, "Letters and Numbers Only in Addresss"))  
                  {
                    if(emailValidator(email, "Please Check Your Email"))
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
