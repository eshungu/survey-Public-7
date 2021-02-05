

<template>
 
  <div class="layout-form">
    <div class="form-group" :class="{error: validation.hasError('email')}">
      <div class="label">* Email</div>
      <div class="content"><input type="text" class="form-control" v-model="email"/></div>
      <div class="message">{{ validation.firstError('email') }}</div>
    </div>
    <div class="form-group">
      <div class="actions">
        <button type="button" class="btn btn-primary" @click="submit">Submit</button>
      </div>
    </div>
  </div>


</template>


<script>
export default {

 data: function () {
      return {
        email: ''
      };
    },
    validators: {
      email: function (value) {
        return Validator.value(value).required().email();
      }
    },
    methods: {
      submit: function () {
        this.$validate()
          .then(function (success) {
            if (success) {
              alert('Validation succeeded!');
            }
          });
      }
	}
	
}
</script>

<style scoped>
h3 {
	margin: 40px 0 0;
}
ul {
	list-style-type: none;
	padding: 0;
}
li {
	display: inline-block;
	margin: 0 10px;
}
a {
	color: #42b983;
}
</style>

