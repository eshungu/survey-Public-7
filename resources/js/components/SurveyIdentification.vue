<template>
  <div>    

      <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0">
          <h3 class="card-title font-weight-bolder text-dark">Please Let us know who you are ...</h3>
         
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
          <!--begin::Item-->
            <div class="d-flex align-items-center">
              <!--begin::Bullet-->
              <span class="bullet bullet-bar bg-success align-self-stretch"></span>
              <!--end::Bullet-->
              <!--begin::Checkbox-->
              <label class="checkbox checkbox-lg checkbox-light-success checkbox-single flex-shrink-0 m-0 mx-4"></label>
              <!--end::Checkbox-->
              <!--begin::Text-->
              <div class="d-flex flex-column flex-grow-1">         
			

					<form id="app" @submit.prevent="submitIdentity" v-if="!submissionStatus">
	  
						<p v-if="errors.length">
							<b>Please fill in correctly ... </b>
							<ul>
							<label v-for='error in errors'>{{ error }}</label>
							</ul>
						</p>
						
						<p>
							<label for="name">Names:</label>
							<input type="text" name="name" id="name" v-model="name">
						</p>

						<p>
							<label for="email">Email:</label>
							<input type="email" name="email" id="email" v-model="email">
						</p>	 

						<p>
							<input type="submit" value="Next >>> ">  
						</p>

					</form>

              </div>
              <!--end::Text-->
        
            </div>
          <!--end:Item-->
      
        </div>
        <!--end::Body-->
      </div>   
  </div>
</template>

<script>

	export default {
	  
		  name:'app',

		  data (){

			    return{

					formId: '',

					userId: 0,

					errors:[],

					form: [],
					
					name:null,
					
					email:null,
					
					bimezegute: false,

					submissionStatus: false
					
			    };

		  },

		  watch: {
				email(value){
				// binding this to the data value in the email input
				this.email = value;
				this.validateEmail(value);
				},
				name(value){
				this.name = value;
				this.validateName(value);
				}
			},

		  created: function(){

			  console.log('9998888555 >>> formId: ' + this.$route.params.id);

			this.formId = this.$route.params.id;			  
			  
			  console.log('8888555111 >>> formId: ' + this.formId);	

		  },

		  methods:{

			   validateEmail(value){
							if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value))
						{
							// this.msg['email'] = '';
							this.bimezegute = true;

						} else{
							// this.msg['email'] = 'Invalid Email Address';

							// this.bimezegute = false;
							this.errors.splice(0, this.errors.length);
							this.errors.push("Valid email required.");  
							
						} 
				},
				validateName(value){

					let difference = 10 - value.length;

						if (value.length<10) {
							
							this.errors.splice(0, this.errors.length);
							this.errors.push(' ... your names should be at least 10 characters long ... '+ difference + ' characters left');
						

						} else {

						    this.errors.splice(0, this.errors.length);
							this.errors.push(' ');							
						
							this.bimezegute = true;
					
						}
				},

			
		submitIdentity(){

				if(this.bimezegute == true)
				{

						$.post("http://127.0.0.1:8000/submitIdentification", {

						// 'formId': this.formId,

						'name': this.name,

						'email': this.email

					}, (res) => {

						this.form = res
						this.submissionStatus = true;

						const formIddd = this.formId;

						const userId = res;

						console.log("112666 >>> formIddd: " + formIddd);					

						console.log("125333 >>> userId: "+ userId)

						this.$router.push({name: 'Survey', params: { userId, formIddd }});

						// this.$router.push({name: 'Survey1', params: { userId, formIddd }});

							// this.$router.push({name: 'Survey2', params: { userId, formIddd }});

					});

			}else{

				this.errors.splice(0, this.errors.length);
				this.errors.push('please fill in the form correctly');
						
			}
			
		}

		  }
	};

</script>