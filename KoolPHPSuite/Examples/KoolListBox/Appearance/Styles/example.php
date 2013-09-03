<?php
	/*
	 * This file is ready to run as standalone example. However, please do:
	 * 1. Add tags <html><head><body> to make a complete page
	 * 2. Change relative path in $KoolControlFolder variable to correctly point to KoolControls folder 
	 */

	$KoolControlsFolder = "../../../../KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder

	require $KoolControlsFolder."/KoolListBox/koollistbox.php";
	
	
	//Get selected style
	$selectStyle = "default";
	if(isset($_POST["selectStyle"]))
	{
		$selectStyle = $_POST["selectStyle"];
	}


	
	$listbox = new KoolListBox("listbox");
	$listbox->styleFolder =$selectStyle;
	$listbox->AddItem(new ListBoxItem("Agentina"));
	$listbox->AddItem(new ListBoxItem("Australia"));
	$listbox->AddItem(new ListBoxItem("Brazil"));
	$listbox->AddItem(new ListBoxItem("Canada"));
	$listbox->AddItem(new ListBoxItem("Chile"));
	$listbox->AddItem(new ListBoxItem("China"));
	$listbox->AddItem(new ListBoxItem("Egypt"));
	$listbox->AddItem(new ListBoxItem("England"));
	$listbox->AddItem(new ListBoxItem("France"));
	$listbox->AddItem(new ListBoxItem("Germany"));
	$listbox->AddItem(new ListBoxItem("India"));
	$listbox->AddItem(new ListBoxItem("Indonesia"));
	$listbox->AddItem(new ListBoxItem("Kenya"));
	$listbox->AddItem(new ListBoxItem("Mexico"));
	$listbox->AddItem(new ListBoxItem("New Zealand"));
	$listbox->AddItem(new ListBoxItem("South Africa"));
	$listbox->AddItem(new ListBoxItem("USA"));
	
	$listbox->ButtonSettings->ShowDelete = true;
	$listbox->ButtonSettings->ShowReorder = true;
	
	$listbox->Init();
?>

<form id="form1" method="post">

	<div style="width:650px;">
	
		<div style="float:right;">
			Select style:
			<select id="selectStyle" name="selectStyle" onchange="submit();">
				<option <?php echo ($selectStyle=="default")?"selected":""; ?> value="default">Default</option>
				<option <?php echo ($selectStyle=="forest")?"selected":""; ?> value="forest">Forest</option>
				<option <?php echo ($selectStyle=="office2007")?"selected":""; ?> value="office2007">Office2007</option>
				<option <?php echo ($selectStyle=="office2010blue")?"selected":""; ?> value="office2010blue">Office 2010 Blue</option>
				<option <?php echo ($selectStyle=="office2010black")?"selected":""; ?> value="office2010black">Office 2010 Black</option>
				<option <?php echo ($selectStyle=="office2010silver")?"selected":""; ?> value="office2010silver">Office 2010 Silver</option>
				<option <?php echo ($selectStyle=="outlook")?"selected":""; ?> value="outlook">Outlook</option>
				<option <?php echo ($selectStyle=="sunset")?"selected":""; ?> value="sunset">Sunset</option>
				<option <?php echo ($selectStyle=="vista")?"selected":""; ?> value="vista">Vista</option>
				<option <?php echo ($selectStyle=="web20")?"selected":""; ?> value="web20">Web 2.0</option>
				<option <?php echo ($selectStyle=="windows7")?"selected":""; ?> value="windows7">Windows 7</option>
			</select>
		</div>	
		<div style="padding-top:10px;">
			<?php echo $listbox->Render();?>
		</div>
	</div>
	
</form>