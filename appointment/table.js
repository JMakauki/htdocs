function table(){
	var tr=document.getElementsByTagName('tr');
	tr[0].style.backgroundColor='#777';
	tr[0].style.color='#eee';

	for(var i=1;i<tr.length;i++){
		
		if ((i%2)==1) {
			tr[i].style.backgroundColor='#ddd';
		}
	}
	var tableheading=document.getElementById('tableheading');
	tableheading.style.backgroundColor='#777';
	tableheading.style.color='#eee';

}

table();
