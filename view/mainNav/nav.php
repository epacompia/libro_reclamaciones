<?php

if ($_SESSION["rol_id"] == 1) {
?>
<nav class="side-menu">
	<ul class="side-menu-list">
		<!-- <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Dashboard</span>
	            </span>
	            <ul>
	                <li><a href="index.html"><span class="lbl">Default</span><span class="label label-custom label-pill label-danger">new</span></a></li>
	                <li><a href="dashboard-top-menu.html"><span class="lbl">Top menu</span></a></li>
	                <li><a href="side-menu-compact-full.html"><span class="lbl">Compact menu</span></a></li>
	                <li><a href="dashboard-addl-menu.html"><span class="lbl">Submenu</span></a></li>
	                <li><a href="side-menu-avatar.html"><span class="lbl">Menu with avatar</span></a></li>
	                <li><a href="side-menu-avatar.html"><span class="lbl">Compact menu with avatar</span></a></li>
	                <li><a href="dark-menu.html"><span class="lbl">Dark menu</span></a></li>
	                <li><a href="dark-menu-blue.html"><span class="lbl">Blue dark menu</span></a></li>
	                <li><a href="dark-menu-green.html"><span class="lbl">Green dark menu</span></a></li>
	                <li><a href="dark-menu-green-compact.html"><span class="lbl">Green compact dark menu</span></a></li>
	                <li><a href="dark-menu-ultramarine.html"><span class="lbl">Ultramarine dark menu</span></a></li>
	                <li><a href="asphalt-menu.html"><span class="lbl">Asphalt top menu</span></a></li>
	                <li><a href="side-menu-big-icon.html"><span class="lbl">Big menu</span></a></li>
	            </ul>
	        </li>
	        <li class="brown with-sub">
	            <span>
	                <i class="font-icon glyphicon glyphicon-tint"></i>
	                <span class="lbl">Skins</span>
	            </span>
	            <ul>
	                <li><a href="theme-side-ebony-clay.html"><span class="lbl">Ebony Clay</span></a></li>
	                <li><a href="theme-side-madison-caribbean.html"><span class="lbl">Madison Caribbean</span></a></li>
	                <li><a href="theme-side-caesium-dark-caribbean.html"><span class="lbl">Caesium Dark Caribbean</span></a></li>
	                <li><a href="theme-side-tin.html"><span class="lbl">Tin</span></a></li>
	                <li><a href="theme-side-litmus-blue.html"><span class="lbl">Litmus Blue</span></a></li>
	                <li><a href="theme-rebecca-purple.html"><span class="lbl">Rebecca Purple</span></a></li>
	                <li><a href="theme-picton-blue.html"><span class="lbl">Picton Blue</span></a></li>
	                <li><a href="theme-picton-blue-white-ebony.html"><span class="lbl">Picton Blue White Ebony</span></a></li>
	            </ul>
	        </li>
	        <li class="purple with-sub">
	            <span>
	                <i class="font-icon font-icon-comments active"></i>
	                <span class="lbl">Messages</span>
	            </span>
	            <ul>
	                <li><a href="messenger.html"><span class="lbl">Messenger</span></a></li>
	                <li><a href="chat.html"><span class="lbl">Messages</span><span class="label label-custom label-pill label-danger">8</span></a></li>
	                <li><a href="chat-write.html"><span class="lbl">Write Message</span></a></li>
	                <li><a href="chat-index.html"><span class="lbl">Select User</span></a></li>
	            </ul>
	        </li>
	        <li class="red">
	            <a href="mail.html">
	                <i class="font-icon glyphicon glyphicon-send"></i>
	                <span class="lbl">Mail</span>
	            </a>
	        </li>
	        <li class="gold with-sub"> -->
		<span>
			<i class="font-icon font-icon-edit"></i>
			<span class="lbl">Forms</span>
		</span>
		<ul>
			<li><a href="ui-form.html"><span class="lbl">Basic Inputs</span></a></li>
			<li><a href="ui-buttons.html"><span class="lbl">Buttons</span></a></li>
			<li><a href="ui-select.html"><span class="lbl">Select &amp; Tags</span></a></li>
			<li><a href="ui-checkboxes.html"><span class="lbl">Checkboxes &amp; Radios</span></a></li>
			<li><a href="ui-form-validation.html"><span class="lbl">Validation</span></a></li>
			<li><a href="typeahead.html"><span class="lbl">Typeahead</span></a></li>
			<li><a href="steps.html"><span class="lbl">Steps</span></a></li>
			<li><a href="ui-form-input-mask.html"><span class="lbl">Input Mask</span></a></li>
			<li><a href="form-flex-labels.html"><span class="lbl">Flex Labels</span></a></li>
			<li><a href="ui-form-extras.html"><span class="lbl">Extras</span></a></li>
		</ul>
		</li>
		<li class="blue-dirty">
			<a href="..\Home\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Inicio</span>
			</a>
		</li>
		<li class="blue-dirty">
			<a href="..\NuevoCaso\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Nuevo Caso</span>
			</a>
		</li>
		<li class="blue-dirty">
			<a href="..\ConsultarCaso\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Consultar Caso</span>
			</a>
		</li>


		</section>
</nav><!--.side-menu-->
<?php

} else {
?>
<nav class="side-menu">
	<ul class="side-menu-list">
		<!-- <li class="grey with-sub">
	            <span>
	                <i class="font-icon font-icon-dashboard"></i>
	                <span class="lbl">Dashboard</span>
	            </span>
	            <ul>
	                <li><a href="index.html"><span class="lbl">Default</span><span class="label label-custom label-pill label-danger">new</span></a></li>
	                <li><a href="dashboard-top-menu.html"><span class="lbl">Top menu</span></a></li>
	                <li><a href="side-menu-compact-full.html"><span class="lbl">Compact menu</span></a></li>
	                <li><a href="dashboard-addl-menu.html"><span class="lbl">Submenu</span></a></li>
	                <li><a href="side-menu-avatar.html"><span class="lbl">Menu with avatar</span></a></li>
	                <li><a href="side-menu-avatar.html"><span class="lbl">Compact menu with avatar</span></a></li>
	                <li><a href="dark-menu.html"><span class="lbl">Dark menu</span></a></li>
	                <li><a href="dark-menu-blue.html"><span class="lbl">Blue dark menu</span></a></li>
	                <li><a href="dark-menu-green.html"><span class="lbl">Green dark menu</span></a></li>
	                <li><a href="dark-menu-green-compact.html"><span class="lbl">Green compact dark menu</span></a></li>
	                <li><a href="dark-menu-ultramarine.html"><span class="lbl">Ultramarine dark menu</span></a></li>
	                <li><a href="asphalt-menu.html"><span class="lbl">Asphalt top menu</span></a></li>
	                <li><a href="side-menu-big-icon.html"><span class="lbl">Big menu</span></a></li>
	            </ul>
	        </li>
	        <li class="brown with-sub">
	            <span>
	                <i class="font-icon glyphicon glyphicon-tint"></i>
	                <span class="lbl">Skins</span>
	            </span>
	            <ul>
	                <li><a href="theme-side-ebony-clay.html"><span class="lbl">Ebony Clay</span></a></li>
	                <li><a href="theme-side-madison-caribbean.html"><span class="lbl">Madison Caribbean</span></a></li>
	                <li><a href="theme-side-caesium-dark-caribbean.html"><span class="lbl">Caesium Dark Caribbean</span></a></li>
	                <li><a href="theme-side-tin.html"><span class="lbl">Tin</span></a></li>
	                <li><a href="theme-side-litmus-blue.html"><span class="lbl">Litmus Blue</span></a></li>
	                <li><a href="theme-rebecca-purple.html"><span class="lbl">Rebecca Purple</span></a></li>
	                <li><a href="theme-picton-blue.html"><span class="lbl">Picton Blue</span></a></li>
	                <li><a href="theme-picton-blue-white-ebony.html"><span class="lbl">Picton Blue White Ebony</span></a></li>
	            </ul>
	        </li>
	        <li class="purple with-sub">
	            <span>
	                <i class="font-icon font-icon-comments active"></i>
	                <span class="lbl">Messages</span>
	            </span>
	            <ul>
	                <li><a href="messenger.html"><span class="lbl">Messenger</span></a></li>
	                <li><a href="chat.html"><span class="lbl">Messages</span><span class="label label-custom label-pill label-danger">8</span></a></li>
	                <li><a href="chat-write.html"><span class="lbl">Write Message</span></a></li>
	                <li><a href="chat-index.html"><span class="lbl">Select User</span></a></li>
	            </ul>
	        </li>
	        <li class="red">
	            <a href="mail.html">
	                <i class="font-icon glyphicon glyphicon-send"></i>
	                <span class="lbl">Mail</span>
	            </a>
	        </li>
	        <li class="gold with-sub"> -->
		<span>
			<i class="font-icon font-icon-edit"></i>
			<span class="lbl">Forms</span>
		</span>
		<ul>
			<li><a href="ui-form.html"><span class="lbl">Basic Inputs</span></a></li>
			<li><a href="ui-buttons.html"><span class="lbl">Buttons</span></a></li>
			<li><a href="ui-select.html"><span class="lbl">Select &amp; Tags</span></a></li>
			<li><a href="ui-checkboxes.html"><span class="lbl">Checkboxes &amp; Radios</span></a></li>
			<li><a href="ui-form-validation.html"><span class="lbl">Validation</span></a></li>
			<li><a href="typeahead.html"><span class="lbl">Typeahead</span></a></li>
			<li><a href="steps.html"><span class="lbl">Steps</span></a></li>
			<li><a href="ui-form-input-mask.html"><span class="lbl">Input Mask</span></a></li>
			<li><a href="form-flex-labels.html"><span class="lbl">Flex Labels</span></a></li>
			<li><a href="ui-form-extras.html"><span class="lbl">Extras</span></a></li>
		</ul>
		</li>
		<li class="blue-dirty">
			<a href="..\Home\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Inicio</span>
			</a>
		</li>
		<!-- <li class="blue-dirty">
			<a href="..\NuevoCaso\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Nuevo Caso</span>
			</a>
		</li> -->
		<li class="blue-dirty">
			<a href="..\ConsultarCaso\">
				<span class="glyphicon glyphicon-th"></span>
				<span class="lbl">Consultar Caso</span>
			</a>
		</li>


		</section>
</nav><!--.side-menu-->
<?php
}

?>



