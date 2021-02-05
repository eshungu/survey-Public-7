<template>
  <div>    

      <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0">
          <h3 class="card-title font-weight-bolder text-dark">What is that new bank in Rwanda ... ?</h3>
         
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
			

					<form id="app" @submit.prevent="saveNewTraining" v-if="!submissionStatus">
	  
						<p v-if="errors.length">
							<b>Please fill in correctly ... </b>
							<ul>
							<label v-for='error in errors'>{{ error }}</label>
							</ul>
						</p>
						
						   	<p>
								<label for="name">Bank Name:</label>
								<input type="text" name="trainingSubject" id="trainingSubject" v-model="trainingSubject">
							</p>

							<p>
								<label for="name">CEO names:</label>
								<input type="text" name="trainerNames" id="trainerNames" v-model="trainerNames">
							
							
							</p>
 

						<p>
							<input type="submit" value=" Save ">  
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

					errors:[],
					
					trainingSubject:null,

					trainerNames:null,
					
					bimezegute: false,

					submissionStatus: false,

					difference: 0

			    };

		  },

	

		  watch: {
				
				trainingSubject(value1){
				this.trainingSubject = value1;
				this.validateTrainingSubject(value1);
				},

				trainerNames(value2){
				this.trainerNames = value2;
				this.validateTrainerNames(value2);
				}

			},	

		  methods:{

			validateTrainingSubject(value1){

					this.difference = 10 - value1.length;

						if (value1.length<10) {
							
							this.errors.splice(0, this.errors.length);
							this.errors.push(' ... your input should be at least 10 characters long ... '+ difference + ' characters left');
						

						} else {

						    this.errors.splice(0, this.errors.length);
							this.errors.push(' ');							
						
							this.bimezegute = true;
					
						}
				},

					validateTrainerNames(value2){

					let difference2 = 10 - value2.length;

						if (value2.length<10) {
							
							this.errors.splice(0, this.errors.length);
							this.errors.push(' ... your input should be at least 10 characters long ... '+ difference + ' characters left');
						

						} else {

						    this.errors.splice(0, this.errors.length);
							this.errors.push(' ');							
						
							this.bimezegute = true;
					
						}
				},

			
		saveNewTraining(){

			console.log('uko bimeze: ' + this.bimezegute);

		

				if(this.bimezegute == true)
				{

					console.log('uko bimeze: ' + this.bimezegute);

					$.post("http://127.0.0.1:8000/saveNewTrainingSession", {

					'trainingSubject': this.trainingSubject,

					'trainerNames': this.trainerNames

				}, (res) => {

					console.log("1126 >>> " + res);

					this.form = res
					this.submissionStatus = true

					this.$router.push({name: 'Home'});

				});

			}else{

				this.errors.splice(0, this.errors.length);
				this.errors.push('please fill in the form correctly');
						
			}
			
		}

		  }
	};

</script>