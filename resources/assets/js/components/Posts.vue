<template>
    <div>
        <div class="panel panel-default" v-for="post in posts">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-calendar" id="visit"></span> {{ post.date }} |
                <span class="glyphicon glyphicon-user" id="start"></span>
                <label id="started">By</label> {{ post.user }}
            </div>
            <div class="panel-body">
                <h3>{{post.title}}</h3>
                <p>{{post.body}}</p>
            </div>
            <div class="panel-footer">
                <span class="glyphicon glyphicon-flag" id="comment"></span>
                <a href="#" id="comments" @click="report(post)">Comment</a>
            </div>
        </div>
        <paginate
                :page-count="pageCount"
                :click-handler="fetch"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination'">
        </paginate>
    </div>
</template>

<script>
    export default {
        name: 'posts',
        data() {
            return {
                posts: [],
                pageCount: 1,
                endpoint: 'api/posts?page='
            };
        },

        created() {
            this.fetch();
        },

        methods: {
            fetch(page = 1) {
                axios.get(this.endpoint + page)
                    .then(({data}) => {
                        this.posts = data.data;
                        this.pageCount = data.meta.last_page;
                    });
            },

            report(id) {
                    axios.put('api/signatures/'+id+'/report')
                        .then(response => this.removeSignature(id));
            },

        }
    }
</script>
