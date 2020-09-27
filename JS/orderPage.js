const form = document.getElementById('form');
const fname = document.getElementById('fname');
const lname = document.getElementById('lname');
const email = document.getElementById('email');
const city = document.getElementById('inputCity');
const address = document.getElementById('inputAddress');
const tel = document.getElementById('inputTel');
const zip = document.getElementById('inputZip');
const date = document.getElementById('inputDate');
const hnum = document.getElementById('inputhnum');


function checkInputs() {
	const fnameValue = fname.value.trim();
    const lnameValue = lname.value.trim();
	const emailValue = email.value.trim();
	const cityValue = city.value.trim();
	const addressValue = address.value.trim();
    const telValue = tel.value.trim();
	const zipValue = zip.value.trim();
	const dateValue = date.value.trim();
    const hnumValue = hnum.value.trim();
    
    if(fnameValue === '') {
		setErrorFor(fname, 'יש להקליד שם פרטי');
    } else if (!validate(fnameValue)) {
		setErrorFor(fname, 'יש להקליד שם פרטי בעברית');
    } else {
		setSuccessFor(fname);
	}
    
    if(lnameValue === '') {
		setErrorFor(lname, 'יש להקליד שם משפחה');
    } else if (!validate(lnameValue)) {
		setErrorFor(lname, 'יש להקליד שם משפחה בעברית');
    } else {
		setSuccessFor(lname);	
	}
    
    if(emailValue === '') {
		setErrorFor(email, 'יש להקליד כתובת אימייל');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'כתובת אימייל לא תקינה');
	} else {
		setSuccessFor(email);
	}
    
    if(cityValue === '') {
		setErrorFor(city, 'יש להקליד עיר');
    } else if (!validate(cityValue)) {
		setErrorFor(city, 'יש להקליד עיר בעברית');
    } else {
		setSuccessFor(city);	
	}
    
    if(addressValue === '') {
		setErrorFor(address, 'יש להקליד כתובת ');
    } else if (!validate(addressValue)) {
		setErrorFor(address, 'יש להקליד כתובת בעברית');
    } else {
		setSuccessFor(address);   
	}
    
    if(hnumValue === '') {
		setErrorFor(hnum, 'יש להקליד מספר בית  ');
	} else {
		setSuccessFor(hnum);   
    }
    
    if(telValue === '') {
		setErrorFor(tel, 'יש להקליד טלפון  ');
	} else {
		setSuccessFor(tel);   
    }
    
     if(zipValue === '') {
		setErrorFor(zip, 'יש להקליד מיקוד  ');
	} else {
		setSuccessFor(zip);   
    }
    
     if(dateValue === '') {
		setErrorFor(date, 'יש לבחור תאריך');
	} else {
		setSuccessFor(date);   
    }
    
	
}

function setErrorFor(input, message) {
	const formGroup = input.parentElement;
	const small = formGroup.querySelector('small');
	formGroup.className = 'form-group error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formGroup = input.parentElement;
	formGroup.className = 'form-group success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function validate(x){
   return /^[\u0590-\u05FF ,.'-]+$/i.test(x);    			
}

function test(){
    location.replace("http://meravalis.mtacloud.co.il/paymentPage.html");
}

 function validateForm() {
    var a = document.forms["myForm"]["fname"].value;
    var b = document.forms["myForm"]["lname"].value;
    var c = document.forms["myForm"]["email"].value;
    var d = document.forms["myForm"]["tel"].value;
	var e = document.forms["myForm"]["city"].value;
    var f = document.forms["myForm"]["address"].value;
    var g = document.forms["myForm"]["hnum"].value;
    var j = document.forms["myForm"]["zip"].value;
    var k = document.forms["myForm"]["date"].value;

    if (a === null || a === "", b === null || b === "", c === null || c === "", d === null || d === "", e === null || e === "", f === null || f === "", g === null || g === "",j === null || j === "", k === null || k === "") {
		alert("יש למלא את כל השדות");
    } 
 }
 
 function redirectfinalpage() {
  window.location.replace("https://meravalis.mtacloud.co.il/Includes/finalPage.html");
} 
 