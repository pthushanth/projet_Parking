
		function date()
		{
   			var aujourdhui = new Date(); 
   		    var annee = aujourdhui.getFullYear();          // YYYY
   		    var mois = aujourdhui.getMonth()+1;  // janvier=0
   		    var jour = aujourdhui.getDate();  
   		
   		    if(jour<10)
   		    {
                jour='0'+jour
            } 
        	if(mois<10)
        	{
            	mois='0'+mois
       		}         
            var minDate = (annee +"-"+ mois +"-"+ jour);
            //var maxDate = (annee +"-"+ mois +"-"+ jour);
            document.getElementById("debutD").setAttribute("min", minDate);  
            document.getElementById("finD").setAttribute("min", minDate);  
		}

		function verifierDate()
		{

			var debutDate=document.getElementById("debutD").value;
			var finDate=document.getElementById("finD").value;
			
         if(finDate<debutDate)
			   {
				    alert("Impossible car la date fin doit être égale ou postérieure à la date début");
				   event.preventDefault()
		    	}

		}