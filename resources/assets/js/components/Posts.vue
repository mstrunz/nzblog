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
                <div v-for="comment in post.comments" class="form-control comment">
                    <p><span class="glyphicon glyphicon-comment"></span> {{comment.body}}</p>
                </div>
                <textarea class="form-control"
                          id="body"
                          v-model="comments[post._id]"
                          rows="2"
                          placeholder="Comment this Post"></textarea>
                <a href="#" id="comments" @click="comment(post._id)">Save Comment</a>
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
                endpoint: 'api/posts?page=',
                currentPage: 1,
                comments: []
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
                        this.currentPage = data.meta.current_page
                    });
            },

            comment(id) {
                axios.put('api/posts/' + id + '/comment', {'comment': this.comments[id]})
                    .then(response => {
                        this.comments[id] = '';
                        this.fetch(this.currentPage);
                    });
            },

        }
    }
</script>
