<template>
	<div class="container">


		<h1>this is from Layout.vue and is static</h1>
		<h1>... and it ends here</h1>
		<h1>... stuffs below are from some other dot vue files</h1>
		
		<router-view></router-view>
		

	</div>
</template>

<script>
	export default {
		mounted() {
			console.log('Component mounted.')
		}
	}
</script>
