<template>
  <div>    

      <div class="card card-custom card-stretch gutter-b">
        
               <!--begin::Container-->
                <div class="d-flex flex-row flex-column-fluid container">
                    <!--begin::Content Wrapper-->
                    <div class="main d-flex flex-column flex-row-fluid">

                        <div class="content flex-column-fluid" id="kt_content">

                            <!--begin::Card-->
                            <div class="card">

                                <div class="card-body">
                                    <!--begin: Datatable-->

                                    <table id="exportTable" class="table table-hover">
                                      <thead>
                                        <th>Comments on: "{{form.formName}}"</th>                                      
                                      </thead>
                                      <tbody>
                                          <tr v-for="(comment, index) in form.comments">
                                            <td>
                                              <a><span>{{comment.traineeNames}}: </span></a>
                                            </td> 
                                            <td>
                                              <a><span>" {{comment.responseText}} "</span></a>
                                            </td>                                           
                                          </tr>
                                      </tbody>
                                    </table>
                                </div>

                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--begin::Content Wrapper-->
                </div>
                <!--end::Container-->

      </div>   
  </div>
</template>


<script>
export default {
	
	data(){

		return {

			formId: '',
			
			userId: null,
						
			form: []
		
		}
	
	},

	created: function(){
	// async created() {

			this.formId = this.$route.params.id;

			// this.userId = this.$route.params.userId

			console.log('10571222*33 >>> formId: ' + this.formId);

			// console.log('10571111 >>> userId: ' + this.$route.params.userId);	
			
			this.getComments();

	},

	//--------------------------------------------------------------

	methods: {

  
    getComments: function(){

		console.log('10571222*44 >>> formId: ' + this.formId);

           axios.get('getComments/', {

						params: {
							formId: this.formId,
							questionId: 17					
						}
						
      }).then(function(response){

             console.log('78965 >>> response: ' + response.data);

						this.form = response.data;					
						
      }
				.bind(this))
				.catch((error) => {
					alert("25 getting form Sections Something wrong happended")
					console.log(error)
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

