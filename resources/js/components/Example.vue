<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to our blog</div>

                    <div class="panel-body">
                    <router-link class="btn btn-xs btn-primary btn-custom" v-bind:to="{ path:'/add-posts' }">
                        <span class="glyphicon glyphicon-plus"></span>
                        List Posts
                    </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Example',
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
