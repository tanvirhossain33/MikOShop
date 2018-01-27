<html xmns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
<title>Website payment standard</title>
<script type="text/javascript" language="javascript">
function paypal_submit(){

			var actionName='http://www.sandbox.paypal.com/cgi-bin/webscr';
			
			document.forms.frmOrderAutoSubmit.action=actionName;
			document.forms.frmOrderAutoSubmit.submit();

}
</script>
</head>
<body onload="paypal_submit();">
<form style="padding:0px;margin:0px;" name="frmOrderAutoSubmit" method="post">
		<input type="hidden" name="return" value="{{URL::to('/success-url')}}}">
		<input type="hidden" name="cancel_return" value="{{URL::to('/cancel-url')}}}">
		
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="cmd" value="_xclick">
		<input type="hidden" name="business" value="kowshiq.asfat@gmail.com">
		
		<input type="hidden" name="quantity" value="1">
		<input type="hidden" name="item_name" value="PC">
		<input type="hidden" name="amount" value="500">

		<input type="hidden" name="rm" value="2">
		<input type="hidden" name="address_override" value="0">
		<input type="hidden" name="first_name" value="">
		<input type="hidden" name="last_name" value="">
		
		<input type="hidden" name="address1" value="">
		<input type="hidden" name="address2" value="">
		<input type="hidden" name="city" value="">
		<input type="hidden" name="state" value="">
		<input type="hidden" name="zip" value="">
</form>
</body
		
</html>