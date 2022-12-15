
function openMenu() {
	var dis=document.getElementsByClassName("side-menu")[0].style.display;
	if(dis=="none"){
		document.getElementsByClassName("side-menu")[0].style.display="inline-block";
		// document.getElementsByClassName("side-head")[0].style.marginTop="-150px";
		// document.getElementsByClassName("side-head")[0].style.marginBottom="10px";
	}
	else{
		document.getElementsByClassName("side-menu")[0].style.display="none";
		// document.getElementsByClassName("side-head")[0].style.marginTop="0px";
	}
}
function openMenu2() {
	var dis=document.getElementsByClassName("main-menu")[0].style.display;
	if(dis=="none"){
		document.getElementsByClassName("main-menu")[0].style.display="inline-block";
		document.getElementById("tick").style.zIndex=-1;
	}	
	else{
		document.getElementsByClassName("main-menu")[0].style.display="none";
		document.getElementById("tick").style.zIndex=0;
	}
}
function openSearch() {
	var dis=document.getElementById("main-search").style.display;
	if(dis=="none")
	{
		document.getElementById("main-search").style.display="block";
		document.getElementById("3dots").className="3-dots";
	}
	else{
		document.getElementById("main-search").style.display="block";
		document.getElementById("3dots").className="";

	}
}

