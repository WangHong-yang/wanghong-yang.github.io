/**
 * Get elements
 */
var form = document.getElementsByTagName("form")[0];
var tableName = document.getElementById("inputTableName");
var selectSourceVnOp = document.getElementById("selectSourceVnOp");

/**
 * Data validation by binding blur event
 */
// merge HTML collections to get all inputs and selects fields
var inputs = form.getElementsByTagName("input");
var selects = form.getElementsByTagName("select");
var inputsAndSelects = [];
inputsAndSelects = Array.prototype.concat.apply(inputsAndSelects, inputs);
inputsAndSelects = Array.prototype.concat.apply(inputsAndSelects, selects);
// loop and check data when blur 
for(var i = 0; i < inputsAndSelects.length; i++) {
	var curr = inputsAndSelects[i];
	curr.addEventListener('blur', function() {
		if(this.value === '') {
			this.style.borderColor = 'red';
		} else {
			this.style.borderColor = '';
		}
	})
}

/**
 * Submit control
 */
var submitBtn = document.getElementById("submitBtn");
var txtArea = document.getElementsByTagName('textarea')[0];
submitBtn.addEventListener('click', function(e) {
	// prevent default
	e.preventDefault();

	// data not filling, return
	var ifAllFilled = true;
	for(var i = 0; i < inputsAndSelects.length; i++) {
		var curr = inputsAndSelects[i];
		if(curr.value === "") {
			ifAllFilled = false;
			break;
		}
	}
	if(!ifAllFilled) {
		alert("went wrong");
		return;
	}

	// generate JSON
	var obj = {
		outcome: "hello",
		input: "whatever",
		someLoop: {
			loop1: "1",
			loop2: "2"
		}
	}
	var jsonstring = JSON.stringify(obj);
	var jsonobj = JSON.parse(jsonstring);
	txtArea.value = JSON.stringify(jsonobj,null,'\t');
})



// fail:
	// show red border

	// clear red border

// success:
	// show JSON

// convert time