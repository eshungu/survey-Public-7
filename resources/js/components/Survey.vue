<template>
  <div>  

      <div class="card card-custom card-stretch gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0">
          <h3 class="card-title font-weight-bolder text-dark">Bank Services Rating</h3>
          <div class="card-toolbar">
            <div class="dropdown dropdown-inline">
             <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <!--begin::Navigation-->
                <ul class="navi navi-hover">
                  <li class="navi-header pb-1">
                    <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon2-shopping-cart-1"></i>
                      </span>
                      <span class="navi-text">Order</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon2-calendar-8"></i>
                      </span>
                      <span class="navi-text">Event</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon2-graph-1"></i>
                      </span>
                      <span class="navi-text">Report</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon2-rocket-1"></i>
                      </span>
                      <span class="navi-text">Post</span>
                    </a>
                  </li>
                  <li class="navi-item">
                    <a href="#" class="navi-link">
                      <span class="navi-icon">
                        <i class="flaticon2-writing"></i>
                      </span>
                      <span class="navi-text">File</span>
                    </a>
                  </li>
                </ul>
                <!--end::Navigation-->
              </div>
            </div>
          </div>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body pt-2">
          
			<form @submit.prevent="submitSurvey" v-if="!submissionStatus">
				
					<h1>{{form.formName}}</h1>

					</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
													
					<div v-for="(formSection, index) in form.formSections">
					
						<h2>{{formSection.formSectionName}}</h2>
					
						<div class="question" v-for="(question, qIndex) in formSection.questions">
							
							<label style="opacity:0">------------------------------------------------------------------------------------------------------------------</label>
			
							<p>{{question.questionContent}}</p>

								<!-- ===================================================== -->
						
								<div v-if="question.questionType == 'text' && question.questionId == 17">

									<div class="col-lg-4 col-md-9 col-sm-12">
										<textarea class="form-control" 
										id="kt_maxlength_5" 
										maxlength="300" placeholder="" rows="6" 
										:name="question.questionId"  
										v-model="questions[question.questionId]"></textarea>
										
									</div>

								</div>

								<!-- ===================================================== -->
						
								<div v-else-if="question.questionType == 'radio'">
							
									<div class="radio-inline">								

										<div v-for="(response, index) in question.responses">								
							
											<label>	

												{{response.responseContent}}&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

												<input type="radio" 
												:name="question.questionId" 
												:value="response.responseId" 
												v-model="questions[question.questionId]">
												
							
											</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									
										</div>		

									</div>

										
								
									<label>_________________________________________________________________________________</label>	
								
								</div>

								<!-- ===================================================== -->

								<div v-else-if="question.questionType == 'select'">

									<select v-model="questions[question.questionId]">

										<option v-for="(response, index) in question.responses" :value="response.responseId">{{response.responseContent}}</option>

									</select>

								</div>

						</div>

					</div>

					<button style="margin-top:20px;">Submit</button>

				</form>

			<div v-else>

				<h2 style="color: green">thanks a lot for giving us your feedback ...</h2>
				<h2 style="color: green">Have a great day !</h2>

			</div>
		  
      
        </div>
        <!--end::Body-->
      </div>   
  </div>
</template>


<script>
export default {
	
	data(){
		return {

			formId: '',
			
			userId: null,
			
			questions: [],
			
			form: [],
			
			submissionStatus: false,

			coffee: [],

			i: 0,
			j: 1,
			k: 1,

			kwestion: '',
			bimezegute: true,

			overAllComment: ''
		
		}
	
	},

	created: function(){

			this.formId = this.$route.params.formIddd;

			this.userId = this.$route.params.userId

			console.log('10571222 >>> formId: ' + this.formId);

			console.log('10571111 >>> userId: ' + this.$route.params.userId);	  
			  
				axios.get('getForm/'+this.formId).then(function (response) {

                        console.log('78965 >>> response: ' + response.data);

						this.form = response.data;						

						this.form.formSections.forEach((formSectionN, s) => {
							// loop through questions
							formSectionN.questions.forEach((questionN, q) => {
								this.questions[questionN.questionId] = null

								console.log("650 >>>> k: " + this.k );
								console.log("651 >>>> content: " + this.questions[questionN.questionId] );
								console.log("652 >>>> questionId: " + questionN.questionId);

								console.log(" ~~~~~~~~~~~ ");

								this.k++;
								
							})
						})
						
						
				}
				.bind(this))
				.catch((error) => {
					alert("16 getting form Sections Something wrong happended")
					console.log(error)
				}) ;

				//----------------------------------666

	

	},

	//--------------------------------------------------------------

	methods: {		

		changed(){
			alert("jsdsn")
		},

		submitSurvey(){
			
					//--------------------666

				 this.form.formSections.forEach((formSectionN, s) => {
							// loop through questions

							formSectionN.questions.forEach((questionN, q) => {
								
								console.log("653 >>>> j: " + this.j );
								console.log("654 >>>> content: " + this.questions[questionN.questionId] );
								console.log("655 >>>> questionId: " + questionN.questionId);

								console.log("656 >>>> twinjiye bimezegute : " + this.bimezegute );								

								if(this.questions[questionN.questionId] == null && questionN.questionId < 17){										

										this.bimezegute = false;

								}
								
								// else if(true){



								else if(this.questions[questionN.questionId] == null && questionN.questionId == 17 && this.bimezegute == false ){

										this.bimezegute = false;
										
								}else if(this.questions[questionN.questionId] == null && questionN.questionId == 17 && this.bimezegute == true ){

									this.bimezegute = true;

								}else if(this.questions[questionN.questionId] != null && questionN.questionId == 17 && this.bimezegute == true ){

									this.bimezegute = true;

								}

								console.log("657 >>>> dusohotse bimezegute : " + this.bimezegute );

								console.log(" ############# ");

								this.j++;

							})

						});

				//----------------------666

				this.overAllComment = document.getElementById('kt_maxlength_5').value;


		if(this.bimezegute == true){//wtf
			

			$.post("http://127.0.0.1:8000/submitForm", {

				'formId': this.formId,
				'userId': this.userId,
				'questions': this.questions,
				'finalComment': this.overAllComment


			}, (res) => {
		        this.form = res
		        this.submissionStatus = true
			})
			
		}else{//wtf

				alert("please answer to all the questions here below ...");

				location.reload();
						
		}


		}//wtf
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

