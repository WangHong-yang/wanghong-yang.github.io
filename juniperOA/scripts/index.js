/**
 * Get form
 */
var form = document.getElementsByTagName("form")[0];

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
// get data
var submitBtn = document.getElementById("submitBtn");
var txtArea = document.getElementsByTagName('textarea')[0];
var tableName = document.getElementById("inputTableName");
var startTime = document.getElementById("inputStartTime");
var endTime = document.getElementById("inputEndTime");
var selectFileds = document.getElementById("selectFields");
var selectSourceVnOp = document.getElementById("selectSourceVnOp");
var selectSourceVnName = document.getElementById("selectSourceVnName");
var selectSourcePortOp = document.getElementById("selectSourcePortOp");
var selectSourcePortName = document.getElementById("selectSourcePortName");
var selectDestinationVnOp = document.getElementById("selectDestinationVnOp");
var selectDestinationVnName = document.getElementById("selectDestinationVnName");
var selectDestinationPortOp = document.getElementById("selectDestinationPortOp");
var selectDestinationPortName = document.getElementById("selectDestinationPortName");

// submit button click
submitBtn.addEventListener('click', function(e) {
	// prevent default
	e.preventDefault();

	// verift that all data are filled
	var ifAllFilled = true;
	for(var i = 0; i < inputsAndSelects.length; i++) {
		var curr = inputsAndSelects[i];
		if(curr.value === "") {
			ifAllFilled = false;
			break;
		}
	}
	if(!ifAllFilled) {
		alert("Please fill all required fields. :)");
		return;
	}

	// generate JSON
	var obj = {
		table_name: tableName.value,
		start_time: convertTime(startTime.value),
		end_time: convertTime(endTime.value),
		select_fields: getSelectValues(selectFileds),
		where_clause: [
			[{
				name: "source_vn", 
				value: selectSourceVnName.value, 
				operator: selectSourceVnOp.value
			},{
				name: "source_port", 
				value: selectSourcePortName.value, 
				operator: selectSourcePortOp.value
			}],
			[{
				name: "destination_vn", 
				value: selectDestinationVnName.value, 
				operator: selectDestinationVnOp.value
			},{
				name: "destination_port", 
				value: selectDestinationPortName.value,
				operator: selectDestinationPortOp.value
			}]
		]
	}
	var jsonstring = JSON.stringify(obj);
	var jsonobj = JSON.parse(jsonstring);

	// show JSON
	txtArea.value = JSON.stringify(jsonobj,null,'\t');
})


/*********************** Utility *************************/
/**
 * Convert time to UNIX Epoch format
 * @param {String} time - format: yyyy-mm-ddThh:mm
 * @return {String} unixtime - in millisecond
 */
var convertTime = function(time) {
	// verify format
	if(time.length !== 16) {return 0;}
	
	var yyyy = time.substring(0,4);
	var mm = time.substring(5,7);
	var dd = time.substring(8,10);
	var hour = time.substring(11,13);
	var min = time.substring(14,17);
	var unixtime = Date.UTC(yyyy, mm-1, dd, hour, min);
	return unixtime;
}

/**
 * Get all options in multiselect 
 * @param {selectDOM} select - select DOM Node
 * @return {Array} result - an array with all options
 */
function getSelectValues(select) {
	var result = [];
	var options = select && select.options;
	var opt;

	for (var i=0, iLen=options.length; i<iLen; i++) {
		opt = options[i];

		if (opt.selected) {
			result.push(opt.value || opt.text);
		}
	}
	return result;
}