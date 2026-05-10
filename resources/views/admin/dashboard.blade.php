
<!DOCTYPE html>
<html lang="en">

		<!-- ================== SECTION HEAD ================== -->
		@include("sections/admin.head")

<body>
		<!-- ================== SECTION LOADER ================== -->
		@include("sections/admin.loader")


	<!-- ================== SECTION page-container ================== -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">

		<!-- ================== SECTION MENU HAUTE ================== -->
		@include("sections/admin.menuhaut")


		<!-- ================== SECTION MENU GAUCHE ================== -->
		@include("sections/admin.menuGauche")


		<!-- ================== SECTION BASE CONTENT ================== -->
		@include("sections/admin.baseContent")


		<!-- ================== SECTION CONFIG ================== -->
		@include("sections/admin.config")


		<!-- ================== SECTION SCROLL TOP ================== -->
		@include("sections/admin.scroll")

	</div>

		<!-- ================== SECTION BASE JS ================== -->
		@include("sections/admin.script")

</body>
</html>
