function ajaxload(url)       ///////////////////////////asynchronous cALL//////////////
      {
          if(window.XMLHttpRequest)
          {
              httprequest = new XMLHttpRequest();
          }
          else
          {
            httprequest = new ActiveXObject("Microsoft.XMLHttp");
          }
          
                           
      }
function availability(f)
{
    if(f.user.value=="")
          {
                  document.getElementById("av").innerHTML = "* Must not be blank";
                  document.frm.im1.src = "document images/system image/wrong.jpg";
                  return false;
          }
    else
    {
    ///////send to check////////
    var url = "check_availability.php?usr="+f.user.value;
    ajaxload(url);
    httprequest.open("GET",url,true);
          httprequest.send(null);
          httprequest.onreadystatechange = function()
          {
               if(httprequest.readyState!=4)

                   ///////////////while catching request executes/////////
                   {
                       document.frm.im1.src = "document images/system image/small circle.gif";
                       document.getElementById("av").innerHTML = "Checking....";
                   }
              else  ////////////after getting request readystate== 4//////////////
                  {
                      var response = httprequest.responseText;
                      if(response=="User already exist")
                      document.frm.im1.src = "document images/system image/wrong.jpg";
                      else
                      document.frm.im1.src = "document images/system image/big-tick.jpg";
                      //alert(response);
                      document.getElementById("av").innerHTML = response;
                      //return response;
                  }
          }
          
    }
}
function match(f)
{
    if(document.frm.pass.value != document.frm.cnfrmpass.value)
        document.getElementById("cnfrm").innerHTML = "Password & Confirm Password must match";
    else
        document.getElementById("cnfrm").innerHTML = " ";
}
function chkemail(f)
{/////////////////////////copy paste kora///////////////////
   // var str=f.email.value;
   // var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  //  if (filter.test(str)!=1)
   // document.getElementById("email").innerHTML = "Invalid E-mail";
  //  else
  //  document.getElementById("email").innerHTML = " ";
  ////////////////////////amar kora code - soumya mondal////////////////////////////////
    ///////////////////programming sikhte chaile ph korun : 9231260134//////////////////
    var str=f.email.value;
    var attherateof = str.indexOf("@");
    var dot = str.indexOf(".",attherateof);
    if(attherateof != -1 && dot != -1 && attherateof < dot)
            document.getElementById("email").innerHTML = " ";
    else
            document.getElementById("email").innerHTML = "Invalid E-mail";
}
function ext(f)
{
    var e = f.img.value;    /////////////selected link////////////
   // alert(e.indexOf(".JPG"));
    if(e.indexOf(".jpg")== -1 && e.indexOf(".gif")== -1 && e.indexOf(".JPG")== -1 && e.indexOf(".GIF")== -1)
        {
            document.getElementById("ext").innerHTML ="You Must Upload .jpg Or .Gif";
            //alert(e.indexOf(".JPG"));
        }
     else
        {
        document.getElementById("ext").innerHTML =" ";
        }
}
function checkall(f)
{
    ///////////////////////check every thing //////////////////////
    /////////////////////copy right soumya/////////////
    if(document.getElementById("av").innerHTML =="User already exist" || document.getElementById("cnfrm").innerHTML == "Password &amp; Confirm Password must match" || document.getElementById("email").innerHTML == "Invalid E-mail" || document.getElementById("ext").innerHTML =="You Must Upload .jpg Or .Gif")
        {
            document.getElementById("chkall").innerHTML = "Please fill all the information";
            return false;
        }
    else
    {
    
    ///////////////////////this is not successfull//////////////////////
 /*   var message = " ";
    if(f.pass.value == " ")
        {
            message = "Please provide password <br/>";            
            //alert(message);
        }
    else if(f.firstname.value == " ")
        {
            message += "Please provide First name <br/>";
            alert(message);
        }
    else if(f.lastname.value == " ")
        {
            message += "Please provide Last name <br/>";
            
        }
     else if(f.jumpMenu.value == " ")
        {
            message += "Please provide Your Gender <br/>";
            
        }
     else if(f.city.value == " ")
        {
            message += "Please provide Your City <br/>";
            
        }
      else if(f.state.value == " ")
        {
            message += "Please provide Your State <br/>";
            
        }
      if(message== " ")
          return true;
      else
          {
          document.getElementById("chkall").innerHTML = message;
          return false;
          }
*/

//////////////////////////another code//////////////////copyright soumya mondal//////////////
        var i,val = "";
        for(i = 0;i<f.sex.length;i++)
            {
                if(f.sex[i].checked)
                   {
                    val = f.sex[i].value;
                   }                
            }
        //alert(val);
       if(f.pass.value == "" ||f.firstname.value == "" || f.lastname.value == "" || val == "" || f.city.value == ""  || f.state.value == "" ||f.img.value =="")
       {
          document.getElementById("chkall").innerHTML = "All * fields are mendatory";
          //alert("soumya");
          return false;
       }
       else
           return true;
   }

}