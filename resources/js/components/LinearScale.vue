<section>
	{{info.label}}
	<label v-for="n in info.max" >
		<input type="radio" :value="n" @change="reportVal" v-model="val">
		<span>{{n}}</span>
	</label>
</section>

<script>
	export default {
			props: ['info'],
			data() {
				return {
					val: '',
				}
			},

			methods: {
				reportVal() {
					this.$emit('setVal', this.val)
				}
			},

			computed: {
				listId() {
					return 'list' + this._uid;
				}
			}

	}
</script>