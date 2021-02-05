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
                                        <th>Pick a bank and see how people have been rating it ...</th>
                                        <th></th>
                                        <th></th>
                                      </thead>
                                      <tbody>
                                          <tr v-for="(form, index) in forms">
                                            <td>{{ form.formName}}</td>
                                            <td>
                                              <a class="btn btn btn-block btn-custom" :href="'/resultsSum/'+form.formId">
                                                <span>Summary</span>
                                              </a>
                                            </td>
                                            <td>
                                              <a class="btn btn btn-block btn-custom" :href="'/resultsDet/'+form.formId">
                                                  <span>Details</span>
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

      forms: []

    }
    
  },

  created: function(){

         axios.get('getForms')
                    .then(function (resp) {

                        console.log('8974 >>> resp: ' + resp);

                        this.forms = resp.data;

                    }
                    .bind(this))
                    .catch((error) => {
                        alert("11 getting forms Something wrong happended\n"+error)
                        console.log(error)
                    }) ;

  }

}
</script>

