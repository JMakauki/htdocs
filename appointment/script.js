function generatePDF(){
	const element=document.getElementById('print');

	html2pdf().set({ html2canvas: { scale:4} }).from(element).save();
}