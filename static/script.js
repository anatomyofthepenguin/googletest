$("#myForm").submit( function(event) {
	return event.preventDefault();
});
$("button#upload").click( function() {
    var data = $("#myForm").serialize();
    $.ajax({
        type: "POST",
        url: "ajax_upload.php",
        data: data,
        success: function(data){
        	alert(data);
    	},
    });
});

$("button#unloading").click( function() {
    $.ajax({
        type: "POST",
        url: "unloading.php",
        success: function(data){
        	alert(data);
    	},
    });
});