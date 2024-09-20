window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});

// JavaScript code 
// function search_animal() { 
// 	let input = document.getElementById('datatablesSimple').value 
// 	input=input.toLowerCase(); 
// 	let x = document.getElementsByClassName('card-body'); 
	
// 	for (i = 0; i < x.length; i++) { 
// 		if (!x[i].innerHTML.toLowerCase().includes(input)) { 
// 			x[i].style.display="none"; 
// 		} 
// 		else { 
// 			x[i].style.display="list-item";				 
// 		} 
// 	} 
// } 

