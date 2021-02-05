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
                                        <th>Bank Services</th>
                                        <th></th>
                                        <th></th>
                                      </thead>
                                      <tbody>
                                          <tr v-for="(question, index) in questions">
                                            <td>
                                              <a class="btn btn btn-block btn-custom">
                                                <span>{{ question.questionContent}}</span>
                                              </a>
                                            </td>
                                            <td>
                                              <a class="btn btn btn-block btn-custom" :href="'/ComparativeSum/'+question.questionId">
                                                <span>Comparative Summary</span>
                                              </a>
                                            </td>
                                            <td>
                                              <a class="btn btn btn-block btn-custom">
                                                  <span>
                                                      <router-link v-bind:to="'comparativeChart/'+question.questionId">Comparative Chart</router-link>
                                                  </span>
                                              </a>
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

  // name: 'Home',
  
  data(){

    return {

      questions: []

    }
    
  },


  created: function(){

         axios.get('getListOfServices')
                    .then(function (resp) {

                        console.log('89**74 >>> resp: ' + resp);

                        this.questions = resp.data;

                        this.questions.forEach((question, q) => {

                              console.log("1620 >>>> questionContent: " + question.questionContent );
                              console.log("1621 >>>> questionId: " + question.questionId );
                              console.log("1622 >>>> formSectionId: " + question.formSectionId );

                              console.log(" ~~~~~~~~~~~ "); 

                          })

                    }
                    .bind(this))
                    .catch((error) => {
                        alert("11*789 getting questions Something wrong happended\n"+error)
                        console.log(error)
                    }) ;

  }

}
</script>

