<template id="post-list">
    <div class="row container">
        <div class="pull-right">
          <router-link class="btn btn-xs btn-primary btn-custom" v-bind:to="{ path:'/add-posts' }">
            <span class="glyphicon glyphicon-plus"></span>
            Add New Post
          </router-link>
          <br><br>
        </div>   
        
        <table class="table table-striped">
          <thead>
            <th>#</th>
            <th>Title</th>
            <th>Body</th>
            <th class="col-md-1">Action</th>
          </thead>
          <tbody>
            <tr v-for="(posts, index) in filteredPosts">
              <td>{{ index + 1 }}</td>
              <td>{{ posts.title }}</td>
              <td>{{ posts.body }}</td>
              <td>
                <router-link class="btn btn btn-info btn-block btn-custom" v-bind:to="{ name: 'Viewposts', params: {id: posts.id} }">
                  <span class=""><i class="fas fa-edit"></i></span>
                  <span>View</span>
                </router-link>
                <router-link class="btn btn btn-warning btn-block btn-custom" v-bind:to="{ name: 'Editposts', params: {id: posts.id} }">
                  <span class="glyphicon glyphicon-pencil"></span>
                   <span>Edit</span>
                </router-link>
                <router-link class="btn btn btn-danger btn-block btn-custom" v-bind:to="{ name: 'Deleteposts', params: {id: posts.id} }">
                  <span class="glyphicon glyphicon-trash"></span>
                  <span>Delete</span>
                </router-link>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
</template>

<script>

    export default {

        data:function(){
          return { posts:'' };
        },

        created:function(){

          let uri = 'posts';

          Axios.get(uri)
          .then((response) => {
            this.posts = response.data;
            //this.$router.push({name: 'Listposts'});
          })
          .catch((error) => {
            alert("Something wrong happended")
            console.log(error)
          }) 


        },

        computed: {
          filteredPosts: function(){
            if(this.posts.length){
              return this.posts;
            }
          }
        }
    }
</script>

<style>
  .btn-custom {
    margin-bottom: 5px;
    padding: 10px 10px;
  }
</style>
