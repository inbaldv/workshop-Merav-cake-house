const form = document.getElementById('form');
const ссname = document.getElementById('ссname');
const ccid = document.getElementById('ccid');
const ccnum = document.getElementById('ccnum');
const ccdate = document.getElementById('ccdate');
const cvv = document.getElementById('cvv');


function checkInputs() {
	const ссnameValue = ссname.value.trim();
    const ccidValue = ccid.value.trim();
	const ccnumValue = ccnum.value.trim();
	const ccdateValue = ccdate.value.trim();
	const cvvValue = cvv.value.trim();
    
    if(ссnameValue === '') {
		setErrorFor(ссname, 'יש להקליד שם בעל הכרטיס');
    } else if (!validate(ссnameValue)) {
		setErrorFor(ссname, 'יש להקליד שם בעל הכרטיס בעברית');
    } else {
		setSuccessFor(ссname);
	}
    
    if(ccidValue === '') {
		setErrorFor(ccid, 'יש להקליד מספר תעודת זהות  ');
	} else {
		setSuccessFor(ccid);   
    }
    
    if(ccnumValue === '') {
		setErrorFor(ccnum, 'יש להקליד מספר כרטיס אשראי  ');
	} else {
		setSuccessFor(ccnum);   
    }
    
     if(ccdateValue === '') {
		setErrorFor(ccdate, 'יש להקליד תוקף  ');
	} else {
		setSuccessFor(ccdate);   
    }
    
     if(cvvValue === '') {
		setErrorFor(cvv, 'יש להקליד CVV ');
	} else {
		setSuccessFor(cvv);   
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

function validate(x){
   return /^[\u0590-\u05FF ,.'-]+$/i.test(x);    			
}

function redirectfinal() {
    var a = document.forms["myForm"]["ссname"].value;
    var b = document.forms["myForm"]["ccid"].value;
    var c = document.forms["myForm"]["ccnum"].value;
    var d = document.forms["myForm"]["ccdate"].value;
	var e = document.forms["myForm"]["cvv"].value;
  
    if (a === null || a === "", b === null || b === "", c === null || c === "", d === null || d === "", e === null || e === "") {
		alert("יש למלא את כל השדות");
    } 
 }