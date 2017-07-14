// JavaScript Document

function selAll()

{

	var   e=document.getElementsByTagName("input"); 

    for(var   i=0;i <e.length;i++) 

    { 

        if   (e[i].type== "checkbox") 
 
        { 

            if(document.getElementById( "selall").checked==true) 

            {

                e[i].checked=true; 

            }

            else 

            {

                e[i].checked=false; 

            }

        } 

    } 

}

function selselect()

{

	var   e=document.getElementsByTagName("select"); 

    for(var   i=0;i <e.length;i++) 

    { 

        

            if(document.getElementById( "selall1").selected==true) 

            {

                e[i].selected=document.getElementById( "selall1").value; 

            }

            else 

            {

                e[i].selected=false; 

            }

      
    } 

}