<?php
$cash="Amount of cash";
$price="Product Price";
$count="Sales count";
$rate="Conversation rate";
$click="Visitors/clicks";

$heading="Calculator";
$on='ON';
$off='OFF';
$fix='FIX';
$unit='$';
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/slider.css"/>
<link rel="stylesheet" type="text/css" href="css/mydesign.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap-switch.min.css"/>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<style>

.tooltip {
  position: absolute;
  z-index: 1030;
  display: block;
  visibility: visible;
  font-size: 12px;
  line-height: 1.4;
  opacity: 0;
  filter: alpha(opacity=0);
}

.tooltip.in {
  opacity: .9;
  filter: alpha(opacity=90);
}
.tooltip.top {
  margin-top: -3px;
  padding: 5px 0;
}

.tooltip.top .tooltip-arrow {
  bottom: 0;
  left: 50%;
  margin-left: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000;
}

.tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid;
}

.tooltip-inner {
  max-width: 200px;
  padding: 3px 8px;
  color: #fff;
  text-align: center;
  text-decoration: none;
  background-color: #000;
  border-radius: 4px;
}


.input-container {
   position: relative;
    width: 130px;
	font-size:20px;
	font-weight:bold;
	 color: #000000;
}
.input-container input {
    width: 100%;
	height:50px;
	font-size:20px;
	font-weight:bold;
	border: 2px solid #3366FF;
	text-align: right;
  padding-right: 25px;
}

.input-container .unit {
    position: absolute;
    display: block;
    top: 30px;
    right: 15px;
   
    padding-left: 5px;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="js/bootstrap-switch.min.js"></script>
<script type="text/javascript">

function isNumberKey(evt,strng)
  {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31
    && (charCode < 48 || charCode > 57))
 {
        return false;
 }
 
 else
 {
	multiply(strng);
 }
}

jQuery(document).ready(function($){

var scash = new Slider('#scash', {
       tooltip: 'always',
	   scale:'logarithmic',
 	   formatter: function(value) {
	  
		$('#cash').val(value);
		 multiply('cash');
  		return  value;
 }
});
var sprice = new Slider('#sprice',{
	tooltip: 'always',
	precision:3,
	formatter: function(value) {
		$('#price').val(value);
		multiply('price');
		return value;
	}
});
var scount = new Slider('#scount', {
       tooltip: 'always',
	   
	   scale:'logarithmic',
 	   formatter: function(value) {
		$('#count').val(value);
		multiply('count');
  		return  value;
 }
});

var srate = new Slider('#srate',{
	tooltip: 'always',
	precision:3,
	formatter: function(value) {
		$('#rate').val(value);
		multiply('rate');
		return value;
	}
});
var sclick = new Slider('#sclick',{
	tooltip: 'always',
	min:0,
	scale:'logarithmic',
	formatter: function(value) {
		$('#vclick').val(value);
		multiply('vclick');
		return value;
	}
});
$('#fcash').bootstrapSwitch({
             onColor: 'success',
             offColor: 'info'
              });
$('#fprice').bootstrapSwitch({
             onColor: 'success',
             offColor: 'info'
              });
$('#fcount').bootstrapSwitch({
             onColor: 'success',
             offColor: 'info'
              });
$('#frate').bootstrapSwitch({
             onColor: 'success',
             offColor: 'info'
              });
$('#fclick').bootstrapSwitch({
             onColor: 'success',
             offColor: 'info'
              });


$('#fcash').on('switchChange.bootstrapSwitch', function(event, state) {

  if($('#fprice').is(":checked")==true)
	{
		$('#fprice').bootstrapSwitch('toggleState');
	}
	
	if($('#fcount').is(":checked")==true)
	{
		$('#fcount').bootstrapSwitch('toggleState');
	}
	

	return false;
});


$('#fprice').on('switchChange.bootstrapSwitch', function(event, state) {

  if($('#fcash').is(":checked")==true)
	{
		$('#fcash').bootstrapSwitch('toggleState');
	}
	
	if($('#fcount').is(":checked")==true)
	{
		$('#fcount').bootstrapSwitch('toggleState');
	}
	

	return false;
});


$('#fcount').on('switchChange.bootstrapSwitch', function(event, state) {

  
  if($('#fcount').is(":checked")==true)
  {
  	if($('#fcash').is(":checked")==true)
	{
		$('#fcash').bootstrapSwitch('toggleState');
	}
	
	if($('#fprice').is(":checked")==true)
	{
		$('#fprice').bootstrapSwitch('toggleState');
	}
	
	if($('#fclick').is(":checked")==true)
	{
		$('#fclick').bootstrapSwitch('toggleState');
	}
	
	if($('#frate').is(":checked")==true)
	{
		$('#frate').bootstrapSwitch('toggleState');
	}
  }

	return false;
});



$('#frate').on('switchChange.bootstrapSwitch', function(event, state) {

	
	if($('#fclick').is(":checked")==true)
	{
		$('#fclick').bootstrapSwitch('toggleState');
	}
	
	
	if($('#fcount').is(":checked")==true)
	{
		$('#fcount').bootstrapSwitch('toggleState');
	}
  
	return false;
});



$('#fclick').on('switchChange.bootstrapSwitch', function(event, state) {

	
	if($('#frate').is(":checked")==true)
	{
		$('#frate').bootstrapSwitch('toggleState');
	}
	
	
	if($('#fcount').is(":checked")==true)
	{
		$('#fcount').bootstrapSwitch('toggleState');
	}
  
	return false;
});

$('#cash').keyup(function(e)
{
	e.preventDefault();
	scash.setValue(parseInt(this.value));
	return false;
});


$('#price').keyup(function(e)
{
	e.preventDefault();
	sprice.setValue(parseInt(this.value));
	return false;
});


$('#count').keyup(function(e)
{
	e.preventDefault();
	scount.setValue(parseInt(this.value));
	return false;
});

$('#rate').keyup(function(e)
{
	e.preventDefault();
	srate.setValue(parseInt(this.value));
	return false;
});


$('#click').keyup(function(e)
{
	e.preventDefault();
	sclick.setValue(parseInt(this.value));
	return false;
});


function scashset(strng)
{
 scash.setValue(parseInt(strng));
}


function spriceset(strng)
{
 sprice.setValue(parseInt(strng));
}


function scountset(strng)
{
 scount.setValue(parseInt(strng));
}


function srateset(strng)
{
 srate.setValue(parseInt(strng));
}


function sclickset(strng)
{
 sclick.setValue(parseInt(strng));
}

});

function multiply(string1)
{
	//var cash=document.getElementById('cash').value;
//	if(cash>=500)
//		{
//			document.getElementById('cash').value=50;
//			
//		}

	var cash=document.getElementById('cash').value;
	
//	var price=document.getElementById('price').value;
//	if(price>500)
//		{
//			document.getElementById('price').value=50;
//			
//		}
	
	var price=document.getElementById('price').value;
	
	//var count=document.getElementById('count').value;
//	if(count>2)
//		{
//			document.getElementById('count').value=2;
//			
//		}
	
	var count=document.getElementById('count').value;
	
	//var rate=document.getElementById('rate').value;
//	if(rate>75)
//		{
//			document.getElementById('rate').value=75;
//			
//		}
		
	var rate=document.getElementById('rate').value/100;
	
	//var vclick=document.getElementById('vclick').value;
//	if(vclick>10)
//		{
//			document.getElementById('vclick').value=10;
//			var vclick=document.getElementById('vclick').value;
//		}
		var vclick=document.getElementById('vclick').value;


		
if(cash==0)
{
	
}

		
if(price==0)
{
	price=1;
}

		
if(count==0)
{
	count=1;
}
		
if(rate==0)
{
	rate=0.01;
}
		
if(vclick==0)
{
	vclick=1;
}

	switch (string1)
		{
 		 case 'cash':
					 if($('#fprice').is(":checked")==false)
					 {
						document.getElementById('price').value=Math.round((document.getElementById('cash').value)/count,3);
								
								function callJqueryFunction()
     							{
									spriceset(Math.round((document.getElementById('cash').value)/count,3));
								}
					}
					
					if($('#fcount').is(":checked")==false) 
					{
						document.getElementById('count').value=Math.round((document.getElementById('cash').value)/price);
						//scountset(Math.round((document.getElementById('cash').value)/count,3));
						
						if($('#fclick').is(":checked")==false) 
						{
							document.getElementById('vclick').value=Math.round((document.getElementById('count').value)/rate,3);
						}
					
						if($('#frate').is(":checked")==false)
						{
							document.getElementById('rate').value= Math.round((document.getElementById('count').value)/vclick,3);
						}
					}
					  break;
					  
					  
  		case 'price':  if($('#fcash').is(":checked")==false) 
						{
							document.getElementById('cash').value=Math.round(count*(document.getElementById('price').value),3);
									 
						}
						
						if($('#fcount').is(":checked")==false) 
						{
							document.getElementById('count').value=Math.round(cash/(document.getElementById('price').value),3);
							
							if($('#fclick').is(":checked")==false) 
							{
								document.getElementById('vclick').value=Math.round((document.getElementById('count').value)/rate,3);
							}
							
							if($('#frate').is(":checked")==false)
							{
								document.getElementById('rate').value= Math.round((document.getElementById('count').value)/vclick,3);
							}		 
						}
						
						break;			 
					 
 		case 'count':
					if($('#fclick').is(":checked")==false) 
					{
						document.getElementById('vclick').value=Math.round(count/rate,3);
					}
					
					if($('#frate').is(":checked")==false)
					{
						document.getElementById('rate').value= Math.round(count/vclick,3);
					}
					 
					 if($('#fcash').is(":checked")==false) 
					{
						 document.getElementById('cash').value=Math.round(count*price,3);
					}
					
					 if($('#fprice').is(":checked")==false)
					 {
						document.getElementById('price').value=Math.round(cash/count,3);
						
								function callJqueryFunction()
     							{
									spriceset(Math.round(cash/count,3));
								}
					}
					
					 break;
					 
					 
		case 'vclick':
					if($('#fcount').is(":checked")==false) 
					{
						document.getElementById('count').value=Math.round(rate*(document.getElementById('vclick').value));
						
						if($('#fcash').is(":checked")==false) 
						{
							 document.getElementById('cash').value=Math.round((document.getElementById('count').value)*price,3);
						}
						
						 if($('#fprice').is(":checked")==false)
					 	{
								document.getElementById('price').value=Math.round(cash/(document.getElementById('count').value),3);
								
								
								function callJqueryFunction()
     							{
									spriceset(Math.round(cash/(document.getElementById('count').value),3));
								}
						}
					}
					
					if($('#frate').is(":checked")==false)
					{
						document.getElementById('rate').value= Math.round(count/(document.getElementById('vclick').value),3);
					}

					 break;
					 
					 
		case 'rate': if($('#fcount').is(":checked")==false) 
					{
						document.getElementById('count').value=Math.round(rate*vclick);
						
						if($('#fcash').is(":checked")==false) 
						{
							 document.getElementById('cash').value=Math.round((document.getElementById('count').value)*price,3);
						}
						
						 if($('#fprice').is(":checked")==false)
					 	{
								document.getElementById('price').value=Math.round(cash/(document.getElementById('count').value),3);
								
								function callJqueryFunction()
     							{
									spriceset(Math.round(cash/(document.getElementById('count').value),3));
								}
						}
						
					}
					
					if($('#fclick').is(":checked")==false)
					{
						document.getElementById('vclick').value= Math.round(count/rate,3);
					}
					
					 break;
	 	
		}
}


</script>
</head>
<body><br/>
<div style="width:960px; margin:0 auto;">
<h1><?php echo $heading; ?></h1>
<table>
	<th>&nbsp;</th>
    <th><?php echo $fix; ?></th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>


    <tr>
        <td><h3><?php echo $cash;?></h3></td>
        <td><input id="fcash" type="checkbox" data-on-color="Success" data-on-text="<?php echo $on; ?>" data-off-color="Success" data-off-text="<?php echo $off; ?>" ></td>
        <td><input id="scash" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="500000" data-slider-step="1" data-slider-value="1"/></td>
        <td class="input-container"><input type="text" value="" id="cash" onKeyPress="return isNumberKey(event,'cash')" /> <span class="unit"><?php echo $unit; ?></span></td>
    </tr>

    <tr>
        <td><h3><?php echo $price;?></h3></td>
        <td><input id="fprice" type="checkbox" data-on-color="Success" data-on-text="<?php echo $on; ?>" data-off-color="Success" data-off-text="<?php echo $off; ?>" ></td>
        <td><input id="sprice" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="500" data-slider-step="1" data-slider-value="1"/></td>
        <td class="input-container"><input type="text" value="" id="price" onKeyPress="return isNumberKey(event,'price')"/> <span class="unit"><?php echo $unit; ?></span></td><tr/>
    </tr>
    
    <tr>
        <td><h3><?php echo $count;?></h3></td>
        <td><input id="fcount" type="checkbox" data-on-color="Success" data-on-text="<?php echo $on; ?>" data-off-color="Success" data-off-text="<?php echo $off; ?>" checked="checked"></td>
        <td><input id="scount" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1000" data-slider-step="1" data-slider-value="1"/></td>
        <td class="input-container"><input type="text" value="" id="count" onKeyPress="return isNumberKey(event,'count')" /></td><tr/>
    </tr>
    
    <tr>
        <td><h3><?php echo $rate;?></h3></td>
        <td><input id="frate" type="checkbox" data-on-color="Success" data-on-text="<?php echo $on; ?>" data-off-color="Success" data-off-text="<?php echo $off; ?>" ></td>
        <td><input id="srate" data-slider-id='ex1Slider' type="text" data-slider-min="0.1" data-slider-max="75" data-slider-step="0.01" data-slider-value="0.01"/></td>
        <td class="input-container"><input type="text" value="" id="rate" onKeyPress="return isNumberKey(event,'rate')"  /><span class="unit">%</span></td></tr>
    </tr>
    
    <tr>
        <td><h3><?php echo $click;?></h3></td>
        <td><input id="fclick" type="checkbox" data-on-color="Success" data-on-text="<?php echo $on; ?>" data-off-color="Success" data-off-text="<?php echo $off; ?>" ></td>
        <td><input id="sclick" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="10000" data-slider-step="1" data-slider-value="5"/></td>
        <td class="input-container"><input type="text" value="" id="vclick" onKeyPress="return isNumberKey(event,'vclick')"  /></td></tr>
    </tr>
</table>
</div>


</body>


</html>
