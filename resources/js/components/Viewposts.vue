<template id="post">
  <div class="container">
    <h3>{{ post.title }}</h3>
    <strong>Body : </strong>
    <br>
    <div>
      {{ post.body }}
    </div>
    <br>
    <router-link v-bind:to="'/'" class="btn btn-xs btn-warning">
      <span class="glyphicon glyphicon-arrow-left"></span>
      Back to List Post
    </router-link>
  </div>
</template>

<script>
export default {
  data:function(){
    return {post:{title:'',body:''}}
  },
  created:function(){
    let uri = "posts/"+this.$route.params.id;
    Axios.get(uri).then((response) => {
      this.post = response.data;
    });
  }
}
</script>
