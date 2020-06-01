function ajax(url)       ///////////////////////////asynchronous cALL//////////////
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
 function gen()
       {
           //alert("soumya");
           var url = "general.php";
           ajax(url);
           httprequest.open("GET",url,true);
          httprequest.send(null);
          httprequest.onreadystatechange = function()
          {
               if(httprequest.readyState!=4)

                   ///////////////while catching request executes/////////
                   {
                       document.getElementById("body").innerHTML = " ";
                       document.getElementById("load").innerHTML = "<strong>Loading....</strong>";
                   }
              else  ////////////after getting request readystate== 4//////////////
                  {
                      var response = httprequest.responseText;
                      document.getElementById("body").innerHTML = response;
                      document.getElementById("load").innerHTML = " ";
                  }
          }

    }
    function pro()         /////////////////professional retrieve///////////////
       {
           //alert("soumya");
           var url = "professional.php";
           ajax(url);
           httprequest.open("GET",url,true);
          httprequest.send(null);
          httprequest.onreadystatechange = function()
          {
               if(httprequest.readyState!=4)

                   ///////////////while catching request executes/////////
                   {
                       document.getElementById("body").innerHTML = " ";
                       document.getElementById("load").innerHTML = "<strong>Loading....</strong>";
                   }
              else  ////////////after getting request readystate== 4//////////////
                  {
                      var response = httprequest.responseText;
                      document.getElementById("body").innerHTML = response;
                      document.getElementById("load").innerHTML = " ";
                  }
          }

    }
    function per()          ///////////////////personal retrieve/////////////////
       {
           //alert("soumya");
           var url = "personal.php";
           ajax(url);
           httprequest.open("GET",url,true);
          httprequest.send(null);
          httprequest.onreadystatechange = function()
          {
               if(httprequest.readyState!=4)

                   ///////////////while catching request executes/////////
                   {
                       document.getElementById("body").innerHTML = " ";
                       document.getElementById("load").innerHTML = "<strong>Loading....</strong>";
                   }
              else  ////////////after getting request readystate== 4//////////////
                  {
                      var response = httprequest.responseText;
                      document.getElementById("body").innerHTML = response;
                      document.getElementById("load").innerHTML = " ";
                  }
          }

    }
       