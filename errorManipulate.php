<script type="text/javascript">
	var msg = getQueryVariable("msg");
	alert(decodeURIComponent(msg));
	var param1var = getQueryVariable("userID");

function getQueryVariable(variable) {
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
    if (pair[0] == variable) {
      return pair[1];
    }
  } 
  alert('Query Variable ' + variable + ' not found');
}
	window.location = 'edit.php?userID='+param1var;
</script>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>