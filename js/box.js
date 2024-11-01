// JavaScript Document

function getValue(col)
{
	var column=col;
	for (i = 1; i <= 4; i++) 
	{ 
	
		document.getElementById("mainbox"+i).style.display = "none";
		
	}
	document.getElementById("mainbox"+column).style.display = "block";
	}