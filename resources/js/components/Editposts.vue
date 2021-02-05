<template id="edit-post">
  <div>
    <h3>Add New Post</h3>
    <form v-on:submit.prevent = "updatePost">
      <div class="form-group">
        <label for="edit-title">Title</label>
        <input type="text" class="form-control" v-model="post.title" name="title" id="edit-title" required/>
      </div>
      <div class="form-group">
        <label for="edit-body">Body</label>
        <textarea class="form-control" rows="10" v-model="post.body"></textarea>
      </div>
      <button type="submit" class="btn btn-xs btn-primary">Update Post</button>
      <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
    </form>
  </div>
</template>

<script>
  export default{

    data:function(){
      return {post:
          {title:'',
          body:''
      }}
    },

    created:function(){
      let uri = "posts/"+this.$route.params.id;
      Axios.get(uri).then((response) => {
        this.post = response.data;
      });
    },
    methods:{
      updatePost:function(){
        let uri = "updatePost/"+this.$route.params.id;
        Axios.patch(uri, this.post).then((response) => {
          this.$router.push({name: 'Listposts'});
        });
      }
    }
  }
</script>
