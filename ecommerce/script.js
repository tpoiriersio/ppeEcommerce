// fonction qui r�cup�re un objet xmlHttpRequest
function getRequeteHttp()
{
	var requeteHttp;
	if (window.XMLHttpRequest)
	{	// Mozilla
		requeteHttp=new XMLHttpRequest();
		if (requeteHttp.overrideMimeType)
		{ // probl�me firefox
			requeteHttp.overrideMimeType('text/xml');
		}
	}
	else
	{
		if (window.ActiveXObject)
		{	// C'est Internet explorer < IE7
			try
			{
				requeteHttp=new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(e)
			{
				try
				{
					requeteHttp=new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(e)
				{
					requeteHttp=null;
				}
			}
		}
	}
	return requeteHttp;
}

// 
function envoyerRequete()
{
	var requeteHttp=getRequeteHttp();
	if (requeteHttp==null)
	{
		alert("Impossible d'utiliser Ajax sur ce navigateur");
	}
	else
	{
		// pour une r�ception en mode texte
		requeteHttp.open('GET','requete.php',true);
		
		requeteHttp.onreadystatechange=function(){recevoirReponse(requeteHttp);};
		requeteHttp.send(null);
	}
	return;
}

// pour les differents etats possibles : http://www.xul.fr/xml-ajax.html
function recevoirReponse(requeteHttp)
{
	if (requeteHttp.readyState==4)
	{
		if (requeteHttp.status==200)
		{
			traiterReponse(requeteHttp.responseText);
		}
		else
		{
			alert("La requ�te ne s'est pas correctement ex�cut�e");
		}
	}
}
function traiterReponse(reponse)
{
	document.getElementById("monDiv").innerHTML=reponse;
}