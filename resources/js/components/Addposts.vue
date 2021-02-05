<template id="add-post">
  <div>
    <router-view></router-view>
    <h3>Add New Post</h3>
    <form v-on:submit.prevent="createPost">
      <!-- <input type="hidden" name="_token" :value="csrf"> -->

      <div class="form-group">
        <label for="add-title">Title</label>
        <input type="text" class="form-control" v-model="post.title" name="title" id="add-title" required/>
      </div>

      <div class="form-group">
        <label for="add-body">Body</label>
        <textarea class="form-control" rows="10" v-model="post.body"></textarea>
      </div>

      <button type="submit" class="btn btn-xs btn-primary">Create Post</button>
      <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
      
    </form>
  </div>
</template>

<script>
export default {
  data: function(){
    return {
      // csrf: document.head.querySelector('meta[name="csrf-token"]').content,
      post: {
        title:'', 
        body:''
      }
    }
  },
  methods:{
    createPost:function(){
      let uri = 'addPost';
      Axios.post(uri, this.post, {
        headers: {
            'Content-Type': 'application/json',
        }
      }).then((response) => {
        this.$router.push({name: 'Listposts'});
      });
    }
  }
}
</script>
