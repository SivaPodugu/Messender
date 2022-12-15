function ajaxpost(){
	var form=document.getElementById("form");
	var formdata=new FormData(form);
	fetch("res.html",{method:"POST",body:formdata})
	.then(res=>res.text())
	.then((response)=>{
		console.log(response);
		if(response=="Success"){
			alert("Successfully created");
		}
		else{

		}
	})
	.catch((err)=>{console.log(err);});
	return false;
}