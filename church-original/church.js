hideChurch();
function hideChurch(){
	var church=document.getElementById('church');
	var churchselect=document.getElementById('churchselect');
	var status=document.getElementById('status');
	
	if (status.value!='ambassador') {
		church.style.display='none';
		churchselect.required=false;
		// document.write(church.value);
	}else{
		church.style.display='block';
		church.value="";
		churchselect.required=true;
	}
}

