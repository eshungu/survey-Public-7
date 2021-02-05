<template id="questInsert">

<div>

        <div>
        <!--begin::Form-->
        
                <form ref="form" class="form" @submit.prevent="insertQuestion">

                        <!-- formId -->

                            <div class="form-group">
                            
                                <label>Select form:</label>
                    
                                <select class='form-control' id="zeForm" v-model='question.formId' @change='ZanaAmaFormSections()'>
                                    
                                    <option value='0' >Select form:</option>
                                    
                                    <option v-for='formm, key in forms' :value="key">{{ key }}</option>
                                                            
                                </select>

                            </div>

                        <!-- formSectionId -->

                            <div class="form-group">
                                <label>Select form section:</label>
                    
                                <!-- <select class='form-control' v-model='formSection.formSectionId'> 
                                <select class='form-control' v-model='thisFormElements.formSectionId'> -->
                                <select class='form-control' v-model='question.formSectionId'>
                                
                                    <option value='0' >Select form Section</option>
                                                                
                                    <option v-for='formmmm, key in formSections' :value="key">{{ key }}</option>

                            </select>
                            </div>

                            <!-- questionType -->
                    
                        <div class="form-group">

                                <label for="add-questionType">Select question type:</label>
                    
                                <select id="questionTypes" name="questionTypes" class='form-control' v-model='question.questionType'>     

                                    <option value='0'>Select question type</option>          
                            
                                    <option value="text">text</option>
                                    <option value="select">select</option>
                                    <option value="radio">radio</option>

                                </select>

                        </div>                

                            <!-- questionContent -->

                            <div class="form-group">
                                <label for="add-questionContent">question Content: </label>
                                <input type="text" class="form-control" v-model="question.questionContent" name="questionContent" id="add-questionContent" required/>
                            </div>

                            <div class="form-group">
                                <label for="add-response1Content">response 1 Content: </label>
                                <input type="text" class="form-control" v-model="question.response1Content" name="response1Content" id="add-response1Content" required/>
                            </div>

                            <div class="form-group">
                                <label for="add-response2Content">response 2 Content: </label>
                                <input type="text" class="form-control" v-model="question.response2Content" name="response2Content" id="add-response2Content" required/>
                            </div>

                            <div class="form-group">
                                <label for="add-response3Content">response 3 Content: </label>
                                <input type="text" class="form-control" v-model="question.response3Content" name="response3Content" id="add-response3Content" required/>
                            </div>

                            <div class="form-group">
                                <label for="add-response4Content">response 4 Content: </label>
                                <input type="text" class="form-control" v-model="question.response4Content" name="response4Content" id="add-response4Content" required/>
                            </div>

                            <div class="form-group">
                                <label for="add-response5Content">response 5 Content: </label>
                                <input type="text" ref="response5Content" class="form-control" v-model="question.response5Content" name="response5Content" id="add-response5Content" required/>
                            </div>

                        <!-- </div> -->

                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>   
                                <!-- <router-link class="btn btn-secondary" v-bind:to="'/'">Cancel</router-link> -->
                                <!-- <button type="reset" class="btn btn-secondary">Cancel</button> -->
                        </div>

                </form>

        </div>

 </div>

 <!--end::Form-->
<!-- 
</div> -->

</template> 

<script>

console.log('>>> inside questionInsert.vue');

    export default {

        data(){
            
            return {

                info: null,             

                eyala: '',

                selectedStuff:'',

                form: {
                    formId:0,
                    formName:''
                },

                forms: [],

                formSection: {
                    formSectionId:0,
                    formId:0,
                    formSectionName:''
                },

                formSections: [],

                question:{
                    formId:0,
                    formSectionId:0,
                    // questionType:'',
                    // questionCategory:'',                    
                    questionContent:'',
                    response1content:'',
                    response1value:0.00,
                    response2content:'',	
                    response2value:0.00,	
                    response3content:'',	
                    response3value:0.00,
                    response4content:'',	
                    response4value:0.00,
                    response5content:'',	
                    response5value:0.00,
                },

                questions: [],
                info:null
            }
        },

        //-----------------------------------------------------------------

        computed: {

         getFormId: function () {

         if(Object.keys(this.forms).length>0){

                console.log('question.formId : ' + this.question.formId);  //question        

             console.log('this is the formId nkuruye: ' + this.forms[this.question.formId].formId);
             
          return this.forms[this.question.formId].formId //form
            }
         },

         getFormSectionId: function () {

         if(Object.keys(this.formSections).length>0){

             console.log('question.formSectionId : ' + this.question.formSectionId);  //question  

             console.log('this is the formSectionId nkuruye: ' + this.formSections[this.question.formSectionId].formSectionId);

          return this.formSections[this.question.formSectionId].formSectionId //formSection

            }

         },



        },

        //-----------------------------------------------------------------------------

        created: function(){

            console.log('>>> reached the "created" section');

            //=====================================================================================

            //https://codepen.io/team/Vue/pen/9d59319c09eaccfaf35d9e9f11990f0f/

            // axios.get('https://api.coindesk.com/v1/bpi/currentprice.json')

            axios.get('https://cat-fact.herokuapp.com/facts')
            
                // , {
                    // headers: {
                    //     Host: anywhere.com,
                    //     Origin: 'https://javascript.info'
                    // }
                // } 

            .then(function(response){

                // console.log('mutzig');

                this.info = response;

                    console.log(info);

            })
            .catch(error => console.log(error));

            //=====================================================================================

                axios.get('getForms')
                    .then(function (resp) {

                        console.log('1288 >>> resp: ' + resp.data);

                        this.forms = resp.data;

                    }
                    .bind(this))
                    .catch((error) => {
                        alert("12 getting forms Something wrong happended\n"+error)
                        console.log(error)
                    }) ;

                

            // this.getFormSections();
            // this.insertQuestion();

        },

        //--------------------------------------------------------------------------------

        methods:{

            insertQuestion: function() {
                            
                console.log('>>> inside insertquestion()');

                // this.question.formId = this.forms[this.question.formId].formId;
                this.question.formSectionId = this.formSections[this.question.formSectionId].formSectionId;
    
                this.question.questionContent = document.getElementById('add-questionContent').value;

                this.question.questionType = questionTypes.options[questionTypes.selectedIndex].value;

                this.question.response1content = document.getElementById('add-response1Content').value;
                this.question.response2content = document.getElementById('add-response2Content').value;
                this.question.response3content = document.getElementById('add-response3Content').value;
                this.question.response4content = document.getElementById('add-response4Content').value;
                this.question.response5content = document.getElementById('add-response5Content').value;

                axios.post('questionInsert', this.question, {
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }).then(function(response){

                    this.questions = response.data;

                    console.log('>>> ' + response);

                }
                .bind(this))
                .catch((error) => {
                        alert("Something wrong happended")
                        console.log('>>> error inside insertquestion()' + error)
                });
            },

            ZanaAmaFormSections: function() {
          
                axios.get('getFormSections',{
                    params: {
                        //formIddd: this.selectedStuff   
                        formIddd: this.getFormId                     
                    }
                    //console.log('formId: ' + formIddd);

                }).then(function (response) {

                        console.log('1247 >>> response: ' + response.data);

                        this.formSections = response.data;

                    }
                    .bind(this))
                    .catch((error) => {
                        alert("getting form Sections Something wrong happended")
                        console.log(error)
                    }) ;
            }
            
        }

    }
     
</script>