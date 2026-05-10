<!DOCTYPE html>
<html lang="en">

<!-- ================== SECTION HEAD ================== -->
@include("sections.auth.head")

<body class="pace-top">

	<!-- ================== SECTION LOADER ================== -->
    @include("sections.auth.loader")



	<!-- begin #page-container -->
	<div id="page-container" class="fade">
        

		<!-- ================== SECTION FORM ================== -->
        @include("sections.auth.form")


		<!-- ================== SECTION CONFIG ================== -->
        @include("sections.auth.config")


		<!-- ================== SECTION SCROLL TOP ================== -->
        @include("sections.auth.scroll")
	</div>

	<!-- ================== SECTION BASE JS ================== -->
    @include("sections.auth.script")

</body>
</html>
